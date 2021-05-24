<!DOCTYPE html>
<html>
<head>

<title>
	sign-up
</title>

<body>
<center>
<h2>SIGN-UP</h2>
 <form id="signup" action="success.php" method="post">
 Name:
 <input type="text" placeholder="Name" id="uname" name="uname" required>
 <br><br>
 Email:
 <input type="text" placeholder="Email" id="email" name="email" required>
 <br><br>
 Password
 <input type="password" placeholder="Password" id="pwd" name="pwd" required>
 <br><br>
 Retype password
 <input type="password" placeholder="retype password" id="rpwd" name="rpwd" required>
  <br><br>
 upload profile image
 <input type="file" name="file" />
   <br><br> 
<input type="submit" value="sign-up" name="signup">
</center>
</body>
</html>
