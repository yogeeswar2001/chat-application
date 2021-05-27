<?php
	include_once 'db/db_conn_pdo.php';
 	
 	if(isset($_POST["loginbtn"])) {
	 	$uname=$_POST["uname"];
	 	$pwd=$_POST["pass"];
	 
	 	session_start();
	 	
	   	$sql="select * from users where username= ?";
	   	$stmt = $conn->prepare($sql);
	   	$stmt->execute([$uname]);
	   	 	  
	   	$result= $stmt->fetch(PDO::FETCH_ASSOC);
	   	
	   	if( $stmt->rowCount() && password_verify($pwd, $result["pwd"]) ) {
			$_SESSION["usr_id"]=$result["user_id"];
		
			$sql = "update users set is_active=1 where user_id= ?";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$_SESSION["usr_id"]]);
			
			header("location:chat.php");
	   	}
	   	else
			echo "INVALID LOGIN";
	 
	  	$conn = null;
  	}
  	else 
  		header("location:index.php");
?>
	  
