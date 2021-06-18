<?php
	session_start();
	
	include_once 'include/check_user.php';
	include_once 'db/db_conn_pdo.php';
	
	$r_id = $_POST["rid"];
	
	$sql = "select username, is_active, prof_img from users where user_id= ?";
	$result = $conn->prepare($sql);
	$result->execute([$r_id]);
	$row = $result->fetch(PDO::FETCH_OBJ);

	$sql_user = "select user_id, is_active, prof_img from users where user_id= ?";
	$result_user = $conn->prepare($sql_user);
	$result_user->execute([$_SESSION["usr_id"]]);
	$row_user = $result_user->fetch(PDO::FETCH_OBJ);
	
	$sql = "select * from messages where 
			(CASE
			when sender_id= ? and sender_flag=0x01
			then receiver_id= ? 
			when sender_id= ? and receiver_flag=0x01
			then receiver_id= ?
			END) order by time ASC";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$_SESSION["usr_id"], $r_id, $r_id, $_SESSION["usr_id"]]);
	
	$upsql = "update messages set sender_flag = 0x00 where sender_id= ? and receiver_id= ?";
			
	$stmt_update = $conn->prepare($upsql);
	$stmt_update->execute([$_SESSION["usr_id"], $r_id]);
	
	$upslt = "update messages set receiver_flag = 0x00 where sender_id= ? and receiver_id= ?";
	$stmt_update = $conn->prepare($upslt);
	$stmt_update->execute([$r_id, $_SESSION["usr_id"]]);
		
	if ( $stmt->rowCount() ) {
		$data=array();
		array_push($data,$row);
		array_push($data,$row_user);
		while ( $row = $stmt->fetch(PDO::FETCH_OBJ) ) {
			array_push( $data,$row );
		}
		
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
