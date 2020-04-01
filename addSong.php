<?php
require_once "config.php";
if (!isset($_SESSION['loggedin'])) {
	header('Location: library.php');
	exit;
}
$check = $conn->query("SELECT * FROM USERLIBRARY WHERE user = $_SESSION[id] AND song = $_GET[id]");
if($check->num_rows == 0) {
    $conn->query("INSERT INTO USERLIBRARY VALUES ($_SESSION[id], $_GET[id])");
}
header('Location: library.php');
?>