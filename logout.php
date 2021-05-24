<?php
	session_start();
	
	include_once 'db_conn.php';
	
	$sql="update users set is_active=0 where user_id=".$_SESSION["usr_id"];
	mysqli_query($conn,$sql);
	
	unset($_SESSION["usr_id"]); 
	session_unset();

	mysqli_close($conn);
	header("location: index.php");
?>
