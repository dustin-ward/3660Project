<?php
require_once "config.php";
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

$check = $conn->query("SELECT * FROM USERLIBRARY WHERE user = $_SESSION[id] AND song = $_GET[id]");
if($check->num_rows > 0) {
    $conn->query("DELETE FROM USERLIBRARY WHERE user = $_SESSION[id] AND song = $_GET[id]");
}
if(isset($_GET[nextID])) {
    header("Location: {$_GET[next]}.php?id={$_GET[nextID]}");
}
else {
    header("Location: {$_GET[next]}.php");
}
?>