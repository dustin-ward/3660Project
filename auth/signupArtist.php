<?php
require_once "../config.php";

$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO ARTIST (username, email, password, bio, profilePic) VALUES ('$_POST[username]', '$_POST[email]', '$password', '$_POST[bio]', '$_POST[profilePic]')";
if($conn->query($sql)) {
	echo "<h3> Account Created</h3>";
}
else {
    $err = $conn->errno;
    echo "<p>MySQL error code $err </p>";
}

echo "<a href=\"../index.php\">Return</a> to Home Page.";
?>