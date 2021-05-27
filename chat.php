<?php
	//include_once "include/check_user.php";
	session_Start();
	
	if( !isset($_SESSION["usr_id"]) )
		header("location:index.php");
	include_once "db/db_conn.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>
	chat
</title>

<link rel="stylesheet" href="css/chat.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/chat.js"></script>

</head>
<body onload="contact_poll();">
	<main class="wrapper">
		<div class="element1 grid-box">
			<div class="subelement11 round-img">
			<?php 
				$sql = "select prof_img, username from users where user_id=".$_SESSION["usr_id"];
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				
				echo "
				<img src=\"img/profile_imgs/{$row["prof_img"]}\" style=\"width:100%;height:100%;\">
			</div>
			<div class=\"subelement12\">
				<h1>{$row["username"]}</h1>";
			?>
			</div>
			<div class="subelement13"> 
				<a href="logout.php">
					<button style="width:100%;height:100%;" id="logout">
						LOGOUT
					</button>
				</a>
			</div>
			<div class="subelement14">
				<a href="delete_account.php"> 
					<button style="width:100%;height:100%;" id="delete_account">
						DELETE ACCOUNT
					</button>
				</a>
			</div>
		</div>
		
		<div class="element2 grid-box vertical-menu round-img">
			<ul id="contacts">
			</ul>
		</div>
		
		<div class="element3 grid-box" id="box3">
		</div>
		
		
		<div class="element4 grid-box" id="box4">
		</div>
		
		<div class="element5 grid-box">
			<div class="subelement51 "><input type="text" id="msg" style="width:99%;height:90%;"></div>
			<div class="subelement52">
				<button style="width:100%;height:100%;" id="send_button">
					<i class="fa fa-paper-plane" aria-hidden="true" style="font-size:52px;"></i>
				</button>
			</div>
		</div>
		
		<div class="element6 grid-box" id="search-bar">
			<div class="subelement61"><input type="text" id="search" style="width:99%;height:90%;" placeholder="search a person"></div>
			<div class="subelement62">
				<button style="width:100%;height:100%;" id="send_button" onclick="search();">
					<i class="fa fa-search" aria-hidden="true" style="font-size:20px;"></i>
				</button>
			</div>
			<div class="subelement63">
				<button style="width:100%;height:100%;" id="back_button" onclick="exit_search();">
					<i class="fa fa-chevron-circle-left" style="font-size:20px"></i>
				</button>
			</div>
		</div>
		
	</main>
</body>
 <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</html>
