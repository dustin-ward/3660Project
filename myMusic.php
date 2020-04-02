<?php
require_once "config.php";
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
if (!$_SESSION['artist']) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Your Music </title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
    echo "<h1>$_SESSION[username]'s Music</h1>";

    $libResult = $conn->query("SELECT * FROM LIBRARY WHERE artist = $_SESSION[id]");
    if($libResult->num_rows > 0) {
        $albumName = "";
        while($lib = $libResult->fetch_assoc()) {
            $songResult = $conn->query("SELECT * FROM SONG WHERE id='$lib[song]'");
            $song = $songResult->fetch_assoc();
            $albumResult = $conn->query("SELECT * FROM ALBUM WHERE id='$lib[album]'");
            $album = $albumResult->fetch_assoc();
            // $artistResult = $conn->query("SELECT * FROM ARTIST WHERE id='$lib[artist]'");
            // $artist = $artistResult->fetch_assoc();
            if($album['name'] != $albumName) {
                $albumName = $album['name'];
                echo "<br><h2>$albumName</h2>";
                echo "<a href='deleteAlbum.php?id=$lib[album]'>Delete</a><br><br>";
            }
            echo "<table border=1>";
            echo "<tr>";
            echo "<td>$song[name]</td>";
            echo "<td>$song[length]</td>";
            echo "</tr>";

            echo "</table>";
            echo "<br>";
        }
    }



    ?>
  </body>
</html>