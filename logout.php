<?php
	session_start();
	
	include_once 'db_conn.php';
	
	$sql="update users set is_active=0 where user_id=".$_SESSION["usr_id"];
	mysqli_query($conn,$sql);
	
	unset($_SESSION["usr_id"]); 
	//unset($_SESSION["sender_roll"]); 
	unset($_SESSION["reciver_roll"]); 
	session_unset();
	session_destroy();

//session_start();
//session_destroy();

	mysqli_close($conn);
	header("location: index.php");
?>
