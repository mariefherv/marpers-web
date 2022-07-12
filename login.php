<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>marpers web</title>

<link href="./CSS/marper-login.css" rel="stylesheet" type="text/css">
<link href="./CSS/bootstrap.css" rel="stylesheet" type="text/css">
<!--	script for jquery-->
<script type="text/javascript" src="./JavaScript/jquery-3.6.0.js"></script>

</head>
<body>
	<div class= "top">
		<img class="logo" src="./assets/assets-01.png" alt="marpers web logo" height="100px" width="100px">
		<div class="homepage-btn">
			<a href="index.php" type="button" class="btn-dark-custom">Back to Homepage</a>
		</div>
		</login-btn>
	</div>
<!--	for the login form-->
	<div class="home">
		<form id="login-form">
			<div class="login-box">
				<h1 align="center" class="title">Login</h1>
				<div class="inputContainer">
				<div class="form_message form_message-error"></div>
				<label for="username" class="labelText">Username</label>
				<input type="text" autofocus name="Username" id="usr">
				</div>
				
				<div class="inputContainer">
					<label for="pw" class="labelText">Password</label>
					<input type="password" name="pw" id="pw">
				</div>
				<div class="login-btn">
					<button type="submit" class="btn-login" id="login-btn">Log In</button>
				</div>
				<br>
				<p>Don't have an account? <span class="click-signUp" id="click-signUp"><b>Sign Up</b></span></p>
			</div>
		</form>
<!--	for the signup form-->
		<form id="signup-form" class="form-hidden">
			<div class="signup-box">
				<h1 align="center" class="title">Create Account</h1>
				<div class="inputContainer-signup">
					<label for="email" class="labelText">Email</label>
					<input type="email" class="form_input" autofocus name="email" id="email-signup">
					<div class="form_input-error-message"></div>
					<div class="form_input-success-message"></div>
				</div>
				<div class="inputContainer-signup">
					<label for="username" class="labelText">Username</label>
					<input type="text" class="form_input" name="Username" minlength="4" id="usr-signup" >
					<div class="form_input-error-message"></div>
					<div class="form_input-success-message"></div>
				</div>
				

				<div class="inputContainer-signup">
					<label for="pw" class="labelText">Password</label>
					<input type="password" class="form_input" name="pw" id="pw-signup">
					<div class="form_input-error-message"></div>
					<div class="form_input-success-message"></div>
				</div>
					<div class="inputContainer-signup">
					<label for="pw" class="labelText">Confirm Password</label>
					<input type="password" class="form_input" name="pw-confirm" id="pw-signup-confirm">
					<div class="form_input-error-message"></div>
					<div class="form_input-success-message"></div>
				</div>
				
				<div class="signup-btn">
					<button type="button" class="btn-signup" id="signup-btn">Create Account</button>
				</div>
				<br>
				<p class="alr">Already have an account? <span class="click-signIn" id="click-signIn"><b>Sign In</b></span></p>
			</div>
			</div>
		</form>
	</div>
	<footer>
		<p align="center">Copyright &copy; Mariefher Villanueva. All rights reserved.</p>
	</footer>
<!--	script for carousel-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
<!--	script for scroll and modal-->
	<script src="./JavaScript/marper-login.js"></script>
	
<!--ajax-->
<script>
	$(document).ready(function(){
		$('#signup-btn').on('click', function() {
		var email = $('#email-signup').val();
		var usr = $('#usr-signup').val();
		var pw = $('#pw-signup').val();
		var pwconf = $('#pw-signup-confirm').val();
		
		var valid_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		var valid_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

		if(email.match(valid_email) && usr.length>3 && pw.match(valid_password) && pw == pwconf){	
		// if everything is good
			$.ajax({
				url: "signup.php",
				type: "POST",
				data: {
					email: email,
					usr: usr,
					pw: pw,
				},
				cache: false,
				success: function(){
						alert("Account created, congratulations!");
						window.location='index.php';	//redirect to homepage
					}
			});
		}else{
				alert("Invalid input. Please check your entries.");
			}	
	});
});

</script>


	
</body>
</html>
