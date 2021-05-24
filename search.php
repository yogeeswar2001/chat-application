<?php
	include_once "db_conn.php";
	
	session_start();
	
	$key = $_POST["key"];
	
	$sql = "select user_id,username,prof_img,is_active from users where username like '".$key."%'";
	//echo $sql;
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
	/*close($conn);*/
?>
