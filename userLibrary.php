<?php
require_once "config.php";
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> User Library </title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php
    echo "<h1>$_SESSION[username]'s Library</h1>";

    $libResult = $conn->query("SELECT * FROM LIBRARY WHERE song IN (SELECT song FROM USERLIBRARY WHERE user = $_SESSION[id])");
    if($libResult->num_rows > 0) {
      while($lib = $libResult->fetch_assoc()) {
        $songResult = $conn->query("SELECT * FROM SONG WHERE id='$lib[song]'");
        $song = $songResult->fetch_assoc();
        $albumResult = $conn->query("SELECT * FROM ALBUM WHERE id='$lib[album]'");
        $album = $albumResult->fetch_assoc();
        $artistResult = $conn->query("SELECT * FROM ARTIST WHERE id='$lib[artist]'");
        $artist = $artistResult->fetch_assoc();
        echo "<table border=1>";

        echo "<tr>";
        echo "<td>$song[name]</td>";
        echo "<td>$song[length]</td>";
        echo "<td>$artist[username]</td>";
        echo "<td>$album[name]</td>";
        echo "<td>$album[genre]</td>";
        echo "<td><a href='removeSong.php?id=$lib[song]'>Remove Song</a></td>";
        echo "</tr>";

        echo "</table>";
        echo "<br>";
      }
    }



    ?>
  </body>
</html>