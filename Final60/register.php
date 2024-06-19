<?php
    include 'connection.php';
    include 'navigation.php';
    include 'functions.php';
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="register.php" method="post">
			<h1>Create Account</h1>
			<input type="text" name="username" placeholder="Name" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
            <input type="submit" name="register">
		</form>
	</div>
	<div class="form-container sign-in-container">
    <form action="register.php" method="post" >
        <h1>Log-In</h1>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
            <input type="submit" name="login" value="login">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Log-In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details to know more about us</p>
				<button class="ghost" id="signUp">Register</button>
			</div>
		</div>
	</div>
</div>

<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>

</body>
</html>


