<?php
	include_once 'db_conn.php';
	
	$sql="";

	$uname=$_POST["uname"];
	$email=$_POST["email"];
	$pwd=$_POST["pwd"];
	$rpwd=$_POST["rpwd"];
	
	if(empty($email)||empty($pwd)) {
		echo "<script type='text/javascript'>alert('fill all the fields');</script>";
	 	header("location:index.php");
	}
	
	if($pwd==$rpwd) {
		$hash = password_hash($pwd, PASSWORD_DEFAULT);
		$rand_no = rand(2000,9999);
		$sql="INSERT INTO users(user_id,username,pwd,email_id) VALUES ($rand_no,'$uname','$hash','$email')";
     		if(mysqli_query($conn,$sql))
			echo "Signed Up Succesfully";
		else
		 	echo "ERORR : ".mysqli_error($conn);
   	}
	else 
		echo "Your password does not macth";
   
    mysqli_close($conn);
    header("location:index.php");
?>
