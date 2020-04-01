<?php
require_once "config.php";

if ($stmt = $conn->prepare('SELECT password FROM ARTIST WHERE name = ?')) {
	$stmt->bind_param('s', $_POST['name']);
	$stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($password);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['name'];
            echo 'Welcome ' . $_SESSION['name'] . '!';
            echo "<a href=\"index.html\">Return</a> to Home Page.";
        } else {
            echo 'Incorrect password!';
        }
    } else {
        echo 'Incorrect username!';
    }

	$stmt->close();
}

?>