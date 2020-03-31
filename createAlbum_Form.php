<?php

// Database connection parameters
$DB_HOST = 'vconroy.cs.uleth.ca';
$DB_USER = 'ward3660';
$DB_PASS = 'qzegwe'; // blank or new_password
$DB_NAME = 'ward3660'; // database instance name

$conn = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
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
        $sql = "INSERT INTO LIBRARY VALUES ('$albumID', 'TestArtist', '$songID');";
        $conn->query($sql);
    }
}
else {
    $err = $conn->errno;
    echo "Album not created. Error Code $err";
}

echo "<a href=\"index.html\">Return</a> to Home Page.";
?>