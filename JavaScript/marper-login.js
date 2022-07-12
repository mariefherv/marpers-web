//function for setting messages in the login form
function setFormMessage(formElement, message){
	const messageElement = formElement.querySelector(".form_message");
	
	messageElement.textContent = message;
	messageElement.classList.remove("form_message-error");
	messageElement.classList.add(`form_message-error`);
}
//function for setting error messages in the sign up form
function setInputError(inputElement, message){
	inputElement.classList.add("form_input-error");
	inputElement.parentElement.querySelector(".form_input-error-message").textContent = message;
	
	$('#signup-btn').attr("disabled",true);	//disables button
}

//function if entries are valid
function setInputSuccess(inputElement, message){
	inputElement.classList.add("form_input-success");
	inputElement.parentElement.querySelector(".form_input-success-message").textContent = message;
	$('#signup-btn').attr("disabled",false);
}

//clears any messages
function clearInputError(e,inputElement){
	inputElement.classList.remove("form_input-error");
	inputElement.parentElement.querySelector(".form_input-error-message").textContent = " ";
	inputElement.classList.remove("form_input-success");
	inputElement.parentElement.querySelector(".form_input-success-message").textContent = " ";
	
}

document.addEventListener("DOMContentLoaded", () => {

var signInForm = document.querySelector('#login-form');
var signUpForm = document.querySelector('#signup-form');

var clickSignUp = document.querySelector('.click-signUp');
var clickSignIn = document.querySelector('.click-signIn');

//if user wants to login instead of sign up
clickSignIn.addEventListener('click',function(e){
	e.preventDefault();
	signUpForm.classList.add('form-hidden');
	signInForm.classList.remove('form-hidden');
});

//if user wants to sign up instead of login
clickSignUp.addEventListener('click',function(e){
	e.preventDefault();
	signUpForm.classList.remove('form-hidden');
	signInForm.classList.add('form-hidden');
});

//for logging in
signInForm.addEventListener("submit", e => {
	e.preventDefault();
	var usr = $('#usr').val();
	var pw = $('#pw').val();
	
		// if everything is good
		$.ajax({
			url: "existing.php",
			type: "POST",
			data: {
				username: usr,
				password: pw,
			},
			cache: false,
			success: function(result){
					if(result == '1'){
						alert("Successful logged in!");
						window.location='index.php';	//redirect to homepage

					}
					else{
						setFormMessage(signInForm, "Invalid username/password.");	
					}
			}
			});				 
	
});
	
var pass_value = "Fill up password";
function getValuePass(value){		//for password verification later
	pass_value = value;
}

//for every input in the sign up form
document.querySelectorAll(".form_input").forEach(inputElement =>{
	var valid_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var valid_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
	
	inputElement.addEventListener("blur", e=> {
		//for validating username
		if(e.target.id === "usr-signup" && e.target.value.length>0 && e.target.value.length<4){
			setInputError(inputElement, "Username must be at least 4 characters in length.");
		}
		//check if username already exists
		else if(e.target.id === "usr-signup" && e.target.value.length>3){
			var usr = e.target.value;
			$.ajax({
				url: "users.php",
				method: "POST",
				data:{
					username: usr,		
				},
				dataType: "json",
				success: function(result){
					if(result == '0'){
						setInputSuccess(inputElement, "Username available");
	
					}
					else{
						setInputError(inputElement, "Username is already taken");
							
					}
				}			
			});
		}
			
		//for validating email
		else if(e.target.id === "email-signup" && !(e.target.value.match(valid_email)) && e.target.value.length>0){
			setInputError(inputElement, "Please enter a valid e-mail address.");
		}
		
		//check if email already exists
		else if(e.target.id === "email-signup" && e.target.value.match(valid_email)){
			var email = e.target.value;
			$.ajax({
				url: "email.php",
				method: "POST",
				data:{
					email: email,		
				},
				dataType: "json",
				success: function(result){
					if(result == "0"){
						setInputSuccess(inputElement, "E-mail address not in use");
					}
					else{
						setInputError(inputElement, "An account with this e-mail address already exists");
							
					}
				}			
			});
		}
		
		//for validating password
		else if(e.target.id === "pw-signup" && !(e.target.value.match(valid_password)) && e.target.value.length>0){
			setInputError(inputElement, "Password must be 8 characters in length and contain at least 1 uppercase letter (A-Z), 1 number (1-9), and 1 special character (!@#$#%^&*()).");
			getValuePass(e.target.value);
		}
		else if(e.target.id === "pw-signup" && e.target.value.match(valid_password)){
			getValuePass(e.target.value);
			setInputSuccess(inputElement, "Password is valid");
		}
		
		else if(e.target.id === "pw-signup-confirm" && !(e.target.value.match(pass_value)) && e.target.value.length>0){
			setInputError(inputElement, "Passwords must match.");
	}
		else if(e.target.id === "pw-signup-confirm" && e.target.value.match(pass_value)){
			setInputSuccess(inputElement, "Passwords match");
		}	
	});
	
	inputElement.addEventListener("input", e=> {
		clearInputError(e,inputElement);
	});
	});

});



	



