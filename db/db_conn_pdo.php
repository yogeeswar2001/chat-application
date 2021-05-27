<?php
	$host = 'localhost';
	$db = 'chat_app';
	$username = 'root';
	$pwd = 'yogeeswar';
	$dns = "mysql:host=$host;dbname=$db";
	
	try {
		$conn = new PDO($dns, $username, $pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e) {
		echo "connection failed: ".$e->getMessage();
	}
?>
