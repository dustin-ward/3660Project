<?php
require_once "config.php";

$song = $conn->query("SELECT * FROM SONG WHERE id =  $_GET[id]")->fetch_assoc();

$plays = $song['plays'];
$plays++;

$conn->query("UPDATE SONG SET plays = $plays WHERE id = $_GET[id]");

if(isset($_GET[nextID])) {
    header("Location: {$_GET[next]}.php?id={$_GET[nextID]}");
}
else {
    header("Location: {$_GET[next]}.php");
}
?>