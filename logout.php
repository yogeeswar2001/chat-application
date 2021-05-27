<?php
	session_start();
		
	include_once 'include/check_user.php';
	include_once 'db/db_conn_pdo.php';
	
	$sql="update users set is_active=0 where user_id= ?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$_SESSION["usr_id"]]);
	
	unset($_SESSION["usr_id"]); 
	session_unset();

	$conn = null;
	header("location: index.php");
?>
