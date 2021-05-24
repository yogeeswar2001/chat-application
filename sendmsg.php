<?php
	session_start();
	
	include_once 'db_conn.php';
	
	//reciving the the msg from newmsg() function in chatbox.php
	$msg = $_POST['msg'];
	$rid = $_POST['rid'];
	//inserting the msg into database here flagmsg is 1 by default
	$sql="insert into messages (sender_id,msg,receiver_id) values (".$_SESSION["usr_id"].",'$msg',".$rid.")";
	
	if(!mysqli_query($conn,$sql))
		echo "Error in sending to database";
	else 
		echo $msg;
?>
