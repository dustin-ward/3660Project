<?php
require_once "config.php";
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}

$sql = "INSERT INTO ALBUM (name, genre, artwork) VALUES ('$_POST[albumName]', '$_POST[albumGenre]', '$_POST[albumArtwork]');";

if($conn->query($sql)) {
    $albumID = $conn->insert_id;
    $num = $_POST['albumNumSongs'];
    for($i = 0; $i < $num; $i++) {
        $name = $_POST['songName'][$i];
        $length = $_POST['songLength'][$i];
        $sql = "INSERT INTO SONG (name, length) VALUES ('$name', '$length');";
        $conn->query($sql);

        $songID = $conn->insert_id;
        $sql = "INSERT INTO LIBRARY VALUES ('$albumID', '$_SESSION[id]', '$songID');";
        $conn->query($sql);
    }
}
else {
    $err = $conn->errno;
    echo "Album not created. Error Code $err";
}

echo "<a href=\"index.php\">Return</a> to Home Page.";
?>