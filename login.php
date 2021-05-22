<?php
	include_once 'db_conn.php';
 	
 	$uname=$_POST["uname"];
 	$pwd=$_POST["pass"];
 
 	session_start();
 	
   	$slq="select * from users where username='{$uname}'"; 	  
   	$result=mysqli_query($conn,$slq);
   	#echo mysqli_num_rows($result);
   	
   	if(mysqli_num_rows($result)<1) 
	   echo "<h1>username dose not exists<h1>";
   	else {
    		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    		if( password_verify($pwd, $row["pwd"]) ) {
			$_SESSION["usr_id"]=$row["user_id"];
			$sql="update users set is_active=1 where user_id=\"".$_SESSION["usr_id"]."\"";
			mysqli_query($conn,$sql);
			header("location:profile.php");
		}
		else
			echo "<h1>username and password dose not match<h1>";
   	}
 
  	mysqli_close($conn);
?>
	  
