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
		<ul>
            <li><a href="auth/signupArtist.php">Artist Account</a></li>
            <li><a href="auth/signupUser.php">User Account</a></li>
        </ul>
		</div>
	</body>
</html>