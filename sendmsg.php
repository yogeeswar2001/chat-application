<?php
	session_start();

	include_once 'include/check_user.php';
	include_once 'db/db_conn_pdo.php';
	
	//reciving the the msg from newmsg() function in chatbox.php
	$msg = $_POST['msg'];
	$rid = $_POST['rid'];
	//inserting the msg into database here flagmsg is 1 by default
	
	$sql="insert into messages (sender_id,msg,receiver_id) values (?, ?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$_SESSION["usr_id"], $msg, $rid]);
	
	$conn = null;
?>
