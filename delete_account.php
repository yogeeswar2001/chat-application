<?php
	include_once 'db_conn.php';
	session_start();
	
	$sql = "delete from users where user_id=".$_SESSION["usr_id"];
	//echo $sql;
	mysqli_query($conn, $sql);
	
	unset($_SESSION["usr_id"]); 
	session_unset();
	session_destroy();

	mysqli_close($conn);
	header("location: index.php");
?>
