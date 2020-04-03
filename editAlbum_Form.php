<?php
require_once "config.php";

$conn->query("UPDATE ALBUM SET name='$_POST[name]', genre='$_POST[genre]', artwork='$_POST[artwork]' WHERE id = '$_POST[id]'");

header('Location: myMusic.php');
?>
