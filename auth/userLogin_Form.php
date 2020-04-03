<?php
require_once "../config.php";

if ($stmt = $conn->prepare('SELECT id, password, username FROM USER WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $username);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['artist'] = FALSE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;
        }
    }

    $stmt->close();
    header('Location: ../index.php');
}

?>