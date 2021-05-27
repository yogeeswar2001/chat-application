<?php 
	session_start();
	
	include_once 'include/check_user.php';
	include_once "db/db_conn_pdo.php";
	
	$r_id = $_POST["rid"];

	$sql = "select username, is_active, prof_img from users where user_id= ?";
	$result = $conn->prepare($sql);
	$result->execute([$r_id]);
	$row = $result->fetch(PDO::FETCH_OBJ);

	$sql_user = "select user_id, is_active, prof_img from users where user_id= ?";
	$result_user = $conn->prepare($sql_user);
	$result_user->execute([$_SESSION["usr_id"]]);
	$row_user = $result_user->fetch(PDO::FETCH_OBJ);
	
	$msgsql = "select * from messages where (CASE when sender_id= ? and sender_flag=0 then receiver_id= ? when sender_id= ? and receiver_flag=0 then receiver_id= ? END) order by time ASC";
	$msgresult = $conn->prepare($msgsql);
	$msgresult->execute([$_SESSION["usr_id"], $r_id, $r_id, $_SESSION["usr_id"]]);

	$data = array();
	array_push($data, $row);
	array_push($data, $row_user);

	if( $msgresult->rowCount() ) {
		while( $row = $msgresult->fetch(PDO::FETCH_OBJ) ) {
			array_push($data, $row);
		}
	}
	echo json_encode($data);
?>	
