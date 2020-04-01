<?php
require_once "config.php";

if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}

$stmt = $conn->prepare('SELECT email, bio, createdAt, profilePic FROM ARTIST WHERE name = ?');
$stmt->bind_param('s', $_SESSION['name']);
$stmt->execute();
$stmt->bind_result($email, $bio, $createdAt, $profilePic);
$stmt->fetch();
$stmt->close();
?>

<html>
    <head>
        <title>Account Information</title>
    </head>
    <body>
        <h1>Account Information</h1>
        <p><?php $_SESSION['name']?></p>
        <p><?php $email?></p>
        <p><?php $bio?></p>
        <p><?php $createdAt?></p>
        <?php $profilePic?>
    </body>
</html>