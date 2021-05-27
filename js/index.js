function hidelogin() {
	var login = document.getElementById("login_form");
	var signup = document.getElementById("signup_form");
	var login_btn = document.getElementById("login_btn");
	var signup_btn = document.getElementById("signup_btn");
	
	login.style.display = "none";
	login_btn.style.backgroundColor = "rgba(255, 0, 0, 0.1)";
	signup.style.display = "block";
	signup_btn.style.backgroundColor = "#fff";
}	

function hidesignup() {
	var login = document.getElementById("login_form");
	var signup = document.getElementById("signup_form");
	var login_btn = document.getElementById("login_btn");
	var signup_btn = document.getElementById("signup_btn");
	
	signup.style.display = "none";
	signup_btn.style.backgroundColor = "rgba(255, 0, 0, 0.1)";
	login.style.display = "block";
	login_btn.style.backgroundColor = "#fff";
}
