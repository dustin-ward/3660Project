<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Songs </title>
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
    <h1> Song List </h1>
    <?php
    echo "<table>";
    echo "<tr>";
    echo "<th>Play</th>";
    echo "<th>Title</th>";
    echo "<th>Album</th>";
    echo "<th>Artist</th>";
    echo "<th>Genre</th>";
    echo "<th>Length</th>";
    echo "<th>Plays</th>";
    if(isset($_SESSION['loggedin']) and !$_SESSION['artist']) {
      echo "<th>Add/Remove</th>";
    }
    echo "</tr>";
    $libResult = $conn->query("SELECT * FROM LIBRARY");
    if($libResult->num_rows > 0) {
      
      while($lib = $libResult->fetch_assoc()) {
        $songResult = $conn->query("SELECT * FROM SONG WHERE id='$lib[song]'");
        $song = $songResult->fetch_assoc();
        $albumResult = $conn->query("SELECT * FROM ALBUM WHERE id='$lib[album]'");
        $album = $albumResult->fetch_assoc();
        $artistResult = $conn->query("SELECT * FROM ARTIST WHERE id='$lib[artist]'");
        $artist = $artistResult->fetch_assoc();

        echo "<tr>";
        echo "<td><a class='play' href='play.php?id=$song[id]&next=library'>Play</a></td>";
        echo "<td>$song[name]</td>";
        echo "<td><a class='album' href='album.php?id=$album[id]'>$album[name]</a></td>";
        echo "<td><a class='artist' href='artist.php?id=$artist[id]'>$artist[username]</a></td>";
        echo "<td>$album[genre]</td>";
        echo "<td>$song[length]</td>";
        echo "<td>$song[plays]</td>";
        if(isset($_SESSION['loggedin']) and !$_SESSION['artist']) {
          $check = $conn->query("SELECT * FROM USERLIBRARY WHERE user = '$_SESSION[id]' AND song = $lib[song]");
          if($check->num_rows == 0) {
            echo "<td><a href='addSong.php?id=$lib[song]&next=library'>Add Song</a></td>";
          }
          else {
            echo "<td><a href='removeSong.php?id=$lib[song]&next=library'>Remove Song</a></td>";
          }
        }
        echo "</tr>";

      }
      echo "</table>";
      echo "<br>";
    }



    ?>
    </div>
  </body>
</html>
