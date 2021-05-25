<?php
	include_once 'db_conn.php';
	
	$sql="";

	$uname=$_POST["uname"];
	$email=$_POST["email"];
	$pwd=$_POST["pwd"];
	$rpwd=$_POST["rpwd"];
	
	if(empty($email)||empty($pwd)) {
		echo "<script type='text/javascript'>alert('fill all the fields');</script>";
	 	header("location:index.php");
	 	exit();
	}
	
	if($pwd==$rpwd) {
		$hash = password_hash($pwd, PASSWORD_DEFAULT);
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			if(isset($_FILES["file"])){

				$errors= array();

				$file_name = $_FILES["file"]["name"];
				$file_size =$_FILES["file"]["size"];
				$file_tmp =$_FILES["file"]["tmp_name"];
				$file_type=$_FILES["file"]["type"];
			
				$array1=explode('.',$file_name);
				$file_ext=strtolower(end($array1));
			
				$expensions= array("jpeg","jpg","png");

				if(in_array($file_ext,$expensions)=== false){
					$errors[]="extension not allowed, please choose a JPEG or PNG file";
				}

				if($file_size> 2097152){
					$errors[]='File size must be excately 2 MB';
				}
				if(empty($errors)===true){
				    //echo "<h1>hollo</h1>";
					$file_name = $uname.".".$file_ext;
					$uploads_dir = 'img/profile_imgs/';
					move_uploaded_file($file_tmp,$uploads_dir.$file_name);
					$sql="INSERT INTO users(username,pwd,email_id,prof_img) VALUES ('$uname','$hash','$email','$file_name')";
				}
				else{
				    $sql="INSERT INTO users(username,pwd,email_id,prof_img) VALUES ('$uname','$hash','$email','default_prof_img.jpg')";
				}
			}
			else 
				$sql="INSERT INTO users(username,pwd,email_id,prof_img) VALUES ('$uname','$hash','$email','default_prof_img.jpg')";
		}
     		mysqli_query($conn,$sql);
   	}
	else 
		echo "Your password does not macth";
   
    mysqli_close($conn);
    
    header("location:index.php");
    exit();
?>

