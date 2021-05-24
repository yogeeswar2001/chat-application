<?php
	session_Start();
	include_once "db_conn.php";
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
				<img src=\"profile_imgs/{$row["prof_img"]}\" style=\"width:100%;height:100%;\">
			</div>
			<div class=\"subelement12\">
				<h1>{$row["username"]}</h1>";
			?>
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
	</main>
</body>
 <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</html>
