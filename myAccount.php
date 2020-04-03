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
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class='header'>
            <a href='index.php' class='logo'>SpotTheFly</a>
            <div class="header-right">
                <?php
                if(!isset($_SESSION['loggedin'])) {
                    echo "<a href='signup.php'>Create Account</a>";
                    echo "<a class='active' href='login.php'>Login</a>";
                }
                else {
                    echo "<a href='myAccount.php'>Account</a>";
                    echo "<a class='active' href='logout.php'>Logout</a>";
                }
                ?>
            </div>
        </div>
        <div class='main'>
        <h1>Account Information</h1>
        <?php 
        echo $profilePic;
        if($_SESSION['artist']) {
            echo "<p>ARTIST ACCOUNT</p>";
        }
        else {
            echo "<p>USER ACCOUNT</p>";
        }
        ?>
        <p><?=$_SESSION['username']?></p>
        <p><?=$_SESSION['email']?></p>
        <p>Account Created On: <?=$createdAt?></p>
        <?php if($_SESSION['artist']) {echo "<p>$bio</p>";} ?>
        </div>
    </body>
</html>