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
		<h1>Login</h1>
		<ul>
            <li><a href="auth/artistLogin.php">Artist Login</a></li>
            <li><a href="auth/userLogin.php">User Login</a></li>
        </ul>
	</body>
</html>