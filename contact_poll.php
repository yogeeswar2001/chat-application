<?php
	include_once "db_conn.php";
	
	session_start();

	$sql = "select user_id,username,prof_img,msg_count,is_active from (select ut.user_id,ut.username,ut.prof_img,ut.is_active from users as ut, (select t.user_id from (select sender_id as user_id,time from messages where receiver_id={$_SESSION["usr_id"]} union select receiver_id as user_id,time from messages where sender_id={$_SESSION["usr_id"]} order  by time desc) as t group by user_id) as a where ut.user_id = a.user_id) as fu left join (select sender_id, count(*) as msg_count from messages where receiver_flag=1 group by sender_id,receiver_id having receiver_id={$_SESSION["usr_id"]}) as fr on fu.user_id=fr.sender_id";
	$result = mysqli_query($conn, $sql);
	if( mysqli_num_rows($result)>0 ) {
		$data = array();
		while( $row = mysqli_fetch_object($result) ) {
			array_push($data, $row);
		}
		echo json_encode($data);
	}
	else {
		$emp_data=array("");
		echo json_encode($emp_data);
	}
?>
