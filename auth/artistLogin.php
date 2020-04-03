<!DOCTYPE html>
<html>
	<head>
		<title>Artist Login</title>
		<link rel="stylesheet" href="../style.css">
	</head>
	<body>
		<div class='header'>
      		<a href='../index.php' class='logo'>SpotTheFly</a>
    	</div>
		<div class='main'>
		<h1>Artist Login</h1>
		<form action="artistLogin_Form.php" method="post">
			<input type="text" name="email" placeholder="Artist Email" id="email" required>
			<input type="password" name="password" placeholder="Password" id="password" required>
			<input type="submit" value="Login">
		</form>
		</div>
	</body>
</html>
