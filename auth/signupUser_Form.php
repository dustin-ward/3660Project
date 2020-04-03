<?php
require_once "../config.php";

$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO USER (username, email, password, profilePic) VALUES ('$_POST[username]', '$_POST[email]', '$password', '$_POST[profilePic]')";
$conn->query($sql);

header('Location: userLogin.php');
?>