<?php
	include_once 'db_conn.php';
	
	session_start();
	$r_id = $_POST["rid"];
	
	$sql = "select username, is_active, prof_img from users where user_id=".$r_id;
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_object($result);

	$sql_user = "select user_id, is_active, prof_img from users where user_id=".$_SESSION["usr_id"];
	$result_user = mysqli_query($conn, $sql_user);
	$row_user = mysqli_fetch_object($result_user);
	
	$sql = "select * from messages where 
			(CASE
			when sender_id=".$_SESSION["usr_id"]." and sender_flag=0x01
			then receiver_id=".$r_id." 
			when sender_id=".$r_id." and receiver_flag=0x01
			then receiver_id=".$_SESSION["usr_id"]."
			END) order by time ASC";
	
	//after selecting the new msg flagmsg is updated to 0
	
	$upsql = "update messages 
			set sender_flag = 0x00 where
			(CASE
			when sender_id=".$_SESSION["usr_id"]." 
			then receiver_id=".$r_id."
			END)";
			
	$upslt = "update messages 
			set receiver_flag = 0x00 where
			(CASE
			when sender_id=".$r_id."
			then receiver_id=".$_SESSION["usr_id"]."
			END)";
			
	$result = mysqli_query($conn,$sql);
		mysqli_query($conn,$upsql);
		mysqli_query($conn,$upslt);
		
	if ( mysqli_num_rows($result)>=1 ) {
		$data=array();
		array_push($data,$row);
		array_push($data,$row_user);
		while ( $row = mysqli_fetch_object( $result )) {
			array_push( $data,$row );
		}
		
	//converting the array into json 
		echo json_encode($data);
		exit();
	}
	else {
		$myArr = array("");
		$myJSON = json_encode($myArr);
		echo $myJSON;
		exit();
	}	
?>	
