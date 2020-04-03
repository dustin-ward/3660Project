<?php
require_once "config.php";
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}

$check = $conn->query("SELECT * FROM LIBRARY WHERE album = $_GET[id]");
if($check->num_rows > 0) {
    $arr = array();
    while($song = $check->fetch_assoc()) {
        array_push($arr, $song[song]);
    }

    $conn->query("DELETE FROM LIBRARY WHERE album = $_GET[id]");
    
    foreach($arr as $song) {
        $conn->query("DELETE FROM USERLIBRARY WHERE song = $song");
        $conn->query("DELETE FROM SONG WHERE id = $song");
    }

    $conn->query("DELETE FROM ALBUM WHERE id = $_GET[id]");
    
}
header('Location: myMusic.php');
?>