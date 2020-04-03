<?php
require_once "../config.php";

$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO ARTIST (username, email, password, bio, profilePic) VALUES ('$_POST[username]', '$_POST[email]', '$password', '$_POST[bio]', '$_POST[profilePic]')";
$conn->query($sql);

header('Location: artistLogin.php');
?>