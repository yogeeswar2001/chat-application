<?php
	session_start();
		
	include_once 'include/check_user.php';
	include_once "db/db_conn_pdo.php";

	
	$sql = "select t.user_id from (select sender_id as user_id,time from messages where receiver_id= ? union select receiver_id as user_id,time from messages where sender_id= ? order  by time desc) as t group by user_id";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$_SESSION["usr_id"], $_SESSION["usr_id"]]);

	$sql = "select user_id,username,prof_img,msg_count,is_active from (select ut.user_id,ut.username,ut.prof_img,ut.is_active from users as ut where ut.user_id = :sender_id) as fu left join (select sender_id, count(*) as msg_count from messages where receiver_flag=1 group by sender_id,receiver_id having receiver_id= :receiver_id) as fr on fu.user_id=fr.sender_id";
	
	$stmt_info = $conn->prepare($sql);
	$stmt_info->bindParam(':receiver_id', $receiver_id);
	$stmt_info->bindParam(':sender_id', $sender_id);
	
	$data = array();
	
	if( $stmt->rowCount() ) {
		while( $row = $stmt->fetch() ) {
			
			$receiver_id = $_SESSION["usr_id"];
			$sender_id = $row["user_id"];
			$stmt_info->execute();
			
			$result = $stmt_info->fetch(PDO::FETCH_OBJ);
			array_push($data, $result);
		}
		echo json_encode($data);
	}
	else {
		$emp_data=array("");
		echo json_encode($emp_data);
	}
?>
