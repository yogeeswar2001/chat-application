<?php 
	include_once "db_conn.php";
	session_start();
	
	$r_id = $_POST["rid"];

	$sql = "select username, is_active, prof_img from users where user_id=".$r_id;
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_object($result);

	$sql_user = "select user_id, is_active, prof_img from users where user_id=".$_SESSION["usr_id"];
	$result_user = mysqli_query($conn, $sql_user);
	$row_user = mysqli_fetch_object($result_user);
	
	$msgsql = "select * from messages where (CASE when sender_id=".$_SESSION["usr_id"]." and sender_flag=0 then receiver_id=".$r_id." when sender_id=".$r_id." and receiver_flag=0 then receiver_id=".$_SESSION["usr_id"]." END) order by time ASC";
	$msgresult = mysqli_query($conn, $msgsql);

	$data = array();
	array_push($data, $row);
	array_push($data, $row_user);

	if( mysqli_num_rows($msgresult)>0 ) {
		while( $row = mysqli_fetch_object($msgresult) ) {
			array_push($data, $row);
		}
	}
	echo json_encode($data);
?>	
