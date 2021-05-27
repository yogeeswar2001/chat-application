<?php
	session_start();
		
	include_once 'include/check_user.php';
	include_once "db/db_conn_pdo.php";
	
	$key = "{$_POST["key"]}%";
	
	$sql = "select user_id,username,prof_img,is_active from users where username like ?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$key]);

	if( $stmt->rowCount() ) {
		$data = array();
		while( $row = $stmt->fetch(PDO::FETCH_OBJ) ) {
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
