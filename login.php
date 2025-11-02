<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
	<title>Vinogradov</title>
</head>
<body>
	<div class="container d-flex justify-content-center align-items-center vh-100">
		<div class="row">
			<div class="col-12 text-center">
				<h1 class="mb-r">Login!</h1>
				<form action="/login.php" method="POST" class="d-flex flex-column gap-3">
					<input type="text" name="login" class="form-control-hacker-input" placeholder="login">
					<input type="password" name="password" class="form-control-hacker-input" placeholder="password">
					<button class="btn btn-primary" type="submit" name="submit">Login</button>
					<p class="mt-3">Don't have an account? <a href="/registration.php">Register</a></p>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
require_once('db.php');

if (isset($_COOKIE['User'])){
	header("Location: /index.php");
	exit();
}

$link = mysqli_connect('db', 'root', 'Test123', 'web_app_db');

if (isset($_POST['submit'])) {
	$login = $_POST['login'];
	$pass = $_POST['password'];

	if (!$login || !$pass) die ("input all parameters");

	$sql = "SELECT * FROM users WHERE username='$login' AND pass='$pass'";

	$result = mysqli_query($link, $sql);

	if (mysqli_num_rows($result) == 1){
		setcookie("User", $login, time()+7200);
		header("Location: /index.php");
	}
	else {
		echo "Incorrect username or password";
	}


}



?>