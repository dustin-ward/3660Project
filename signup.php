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
		<title>Create an Account</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class='header'>
      		<a href='index.php' class='logo'>SpotTheFly</a>
    	</div>
		<div class='main'>
		<h1>Create an Account</h1>
            <a class='button' href="auth/signupArtist.php">Artist Account</a>
            <a class='button' href="auth/signupUser.php">User Account</a>
		</div>
	</body>
</html>