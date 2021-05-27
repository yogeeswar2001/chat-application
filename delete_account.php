<?php
	session_start();
	
	include_once 'include/check_user.php';
	include_once 'db/db_conn_pdo.php';
	
	$sql = "delete from users where user_id= ?";
	//echo $sql;
	$stmt = $conn->prepare($sql);
	$stmt->execute([$_SESSION["usr_id"]]);
	
	unset($_SESSION["usr_id"]); 
	session_unset();
	session_destroy();

	$conn = null;
	header("location: index.php");
?>
