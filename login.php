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
	</head>
	<body>
		<h1>Login</h1>
		<ul>
            <li><a href="auth/artistLogin.html">Artist Login</a></li>
            <li><a href="auth/userLogin.html">User Login</a></li>
        </ul>
	</body>
</html>