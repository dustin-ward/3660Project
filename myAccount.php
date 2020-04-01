<?php
require_once "config.php";
if (!isset($_SESSION['loggedin'])) {
	header('Location: auth/login.php');
	exit;
}

if ($_SESSION['artist']) {
    $stmt = $conn->prepare('SELECT bio, createdAt, profilePic FROM ARTIST WHERE id = ?');
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($bio, $createdAt, $profilePic);
}
else {
    $stmt = $conn->prepare('SELECT createdAt, profilePic FROM USER WHERE id = ?');
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($createdAt, $profilePic);
}
$stmt->fetch();
$stmt->close();
?>

<html>
    <head>
        <title>Account Information</title>
    </head>
    <body>
        <h1>Account Information</h1>
        <?=$profilePic?>
        <p><?=$_SESSION['username']?></p>
        <p><?=$_SESSION['email']?></p>
        <p>Account Created On: <?=$createdAt?></p>
        <?php if($_SESSION['artist']) {echo "<p>$bio</p>";} ?>
    </body>
</html>