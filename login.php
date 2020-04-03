<?php
require_once "config.php";
if (isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class='header'>
      		<a href='index.php' class='logo'>SpotTheFly</a>
    	</div>
		<div class='main'>
		<h1>Login</h1>
            <a class='button' href="auth/artistLogin.php">Artist Login</a>
        	<a class='button' href="auth/userLogin.php">User Login</a>
		</div>
	</body>
</html>