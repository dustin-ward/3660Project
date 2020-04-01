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
	</head>
	<body>
		<h1>Create an Account</h1>
		<ul>
            <li><a href="auth/signupArtist.html">Artist Account</a></li>
            <li><a href="auth/signupUser.html">User Account</a></li>
        </ul>
	</body>
</html>