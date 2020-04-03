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
    <div class='header'>
      <a href='index.php' class='logo'>SpotTheFly</a>
      <div class="header-right">
          <?php
          if(!isset($_SESSION['loggedin'])) {
            echo "<a href='signup.php'>Create Account</a>";
              echo "<a class='active' href='login.php'>Login</a>";
          }
          else {
              echo "<a href='myAccount.php'>Account</a>";
              echo "<a class='active' href='logout.php'>Logout</a>";
          }
          ?>
      </div>
    </div>
    <div class='main'>
    <?php
    echo "<h1>$_SESSION[username]'s Library</h1>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Play</th>";
    echo "<th>Title</th>";
    echo "<th>Album</th>";
    echo "<th>Artist</th>";
    echo "<th>Genre</th>";
    echo "<th>Length</th>";
    echo "<th>Plays</th>";
    echo "<th>Remove</th>";
    echo "</tr>";
    $libResult = $conn->query("SELECT * FROM LIBRARY WHERE song IN (SELECT song FROM USERLIBRARY WHERE user = $_SESSION[id])");
    if($libResult->num_rows > 0) {
      while($lib = $libResult->fetch_assoc()) {
        $songResult = $conn->query("SELECT * FROM SONG WHERE id='$lib[song]'");
        $song = $songResult->fetch_assoc();
        $albumResult = $conn->query("SELECT * FROM ALBUM WHERE id='$lib[album]'");
        $album = $albumResult->fetch_assoc();
        $artistResult = $conn->query("SELECT * FROM ARTIST WHERE id='$lib[artist]'");
        $artist = $artistResult->fetch_assoc();

        echo "<tr>";
        echo "<td><a class='play' href='play.php?id=$song[id]&next=userLibrary'>Play</a></td>";
        echo "<td>$song[name]</td>";
        echo "<td><a class='album' href='album.php?id=$album[id]'>$album[name]</a></td>";
        echo "<td><a class='artist' href='artist.php?id=$artist[id]'>$artist[username]</a></td>";
        echo "<td>$album[genre]</td>";
        echo "<td>$song[length]</td>";
        echo "<td>$song[plays]</td>";
        echo "<td><a href='removeSong.php?id=$lib[song]&next=userLibrary'>Remove Song</a></td>";
        echo "</tr>";

        
      }
      echo "</table>";
      echo "<br>";
    }



    ?>
    </div>
  </body>
</html>