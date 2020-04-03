<?php
require_once "config.php";
$album = $conn->query("SELECT * FROM ALBUM WHERE id = $_GET[id]")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php echo "<title> $album[name] </title>"; ?>
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

    $libResult = $conn->query("SELECT * FROM LIBRARY WHERE album = $album[id]");
    if($libResult->num_rows > 0) {
        $lib = $libResult->fetch_assoc();
        
        $songResult = $conn->query("SELECT * FROM SONG WHERE id='$lib[song]'");
        $song = $songResult->fetch_assoc();
        $artistResult = $conn->query("SELECT * FROM ARTIST WHERE id = $lib[artist]");
        $artist = $artistResult->fetch_assoc();

        echo "<br><h2>$album[name]</h2><h3>By $artist[username]</h3>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Play</th>";
        echo "<th>Title</th>";
        echo "<th>Length</th>";
        echo "<th>Plays</th>";
        if(isset($_SESSION['loggedin']) and !$_SESSION['artist']) {
          echo "<th>Add/Remove</th>";
        }
        echo "</tr>";
        echo "<tr>";
        echo "<td><a class='play' href='play.php?id=$song[id]&next=album&nextID=$album[id]'>Play</a></td>";
        echo "<td>$song[name]</td>";
        echo "<td>$song[length]</td>";
        echo "<td>$song[plays]</td>";
        if(isset($_SESSION['loggedin']) and !$_SESSION['artist']) {
          $check = $conn->query("SELECT * FROM USERLIBRARY WHERE user = '$_SESSION[id]' AND song = $lib[song]");
          if($check->num_rows == 0) {
            echo "<td><a href='addSong.php?id=$song[id]&next=album&nextID=$album[id]'>Add Song</a></td>";
          }
          else {
            echo "<td><a href='removeSong.php?id=$song[id]&next=album&nextID=$album[id]'>Remove Song</a></td>";
          }
        }
        echo "</tr>";

        while($lib = $libResult->fetch_assoc()) {
            $songResult = $conn->query("SELECT * FROM SONG WHERE id='$lib[song]'");
            $song = $songResult->fetch_assoc();

            echo "<tr>";
            echo "<td><a class='play' href='play.php?id=$song[id]&next=album&nextID=$album[id]'>Play</a></td>";
            echo "<td>$song[name]</td>";
            echo "<td>$song[length]</td>";
            echo "<td>$song[plays]</td>";
            if(isset($_SESSION['loggedin']) and !$_SESSION['artist']) {
              $check = $conn->query("SELECT * FROM USERLIBRARY WHERE user = '$_SESSION[id]' AND song = $lib[song]");
              if($check->num_rows == 0) {
                echo "<td><a href='addSong.php?id=$song[id]&next=album&nextID=$album[id]'>Add Song</a></td>";
              }
              else {
                echo "<td><a href='removeSong.php?id=$song[id]&next=album&nextID=$album[id]'>Remove Song</a></td>";
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