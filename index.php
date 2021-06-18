<!DOCTYPE html>
<head>
<title>
	chat
</title>

<link rel="stylesheet" href="css/index.css">
<script src="js/index.js"></script>

</head>
<body onload="hidesignup();">
    <div class="container">
      
      <div class="login" id="login_btn" onclick="hidesignup()">LOGIN</div>
      <div class="signup" id="signup_btn" onclick="hidelogin()">SIGN UP</div>
      
      <div class="login-form" id="login_form">
          <form id="login" name="login" action="login.php" id="login" method="post">
			<input type="text" placeholder="username" class="input" id="login-uname" name="uname" required><br>
 			<input type="password" placeholder="password" class="input" id="pass" name="pass" required><br>
 			<input type="submit" value="LOGIN" name="loginbtn" class="btn"><br>
 		  </form>
        <center><span><a href="#"> FORGOT PASSWORD </a></span></center>
       </div>
      
       <div class="signup-form" id="signup_form">
       		<form id="signup" action="signup.php" method="post" enctype="multipart/form-data">
				<input type="text" placeholder="Name" class="input" id="signup-uname" name="uname" required><br>
				<input type="text" placeholder="Email" class="input" id="email" name="email" required><br>
				<input type="password" placeholder="Password" class="input" id="pwd" name="pwd" required><br>
				<input type="password" placeholder="retype password" class="input" id="rpwd" name="rpwd" required><br>
				profile picture: <input type="file" name="file" placeholder="profile picture"/><br>
				<input type="submit" value="CREATE ACCOUNT" name="signupbtn" class="btn">
			</form>
       </div>   
       
       <div id="error" class="errorcontainer"></div>
          
    </div>
</body>
</html>
