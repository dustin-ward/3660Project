<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Songs </title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1> Song List </h1>
    <?php
    require_once "config.php";

    $libResult = $conn->query("SELECT * FROM LIBRARY");
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
        echo "<td><a href='addSong.php?id=$lib[song]'>Add Song</a></td>";
        echo "</tr>";

        echo "</table>";
        echo "<br>";
      }
    }



    ?>
  </body>
</html>
