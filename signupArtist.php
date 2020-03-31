<?php
require_once "config.php";

$password = hash('sha512',$_POST['password']);

$sql = "INSERT INTO ARTIST (name, email, password, bio, profilePic) VALUES ('$_POST[name]', '$_POST[email]', '$password', '$_POST[bio]', '$_POST[profilePic]')";
if($conn->query($sql)) {
	echo "<h3> Account Created</h3>";
}
else {
    $err = $conn->errno;
    echo "<p>MySQL error code $err </p>";
}

echo "<a href=\"index.html\">Return</a> to Home Page.";
?>