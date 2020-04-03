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
        echo "<td>$song[name]</td>";
        echo "<td>$song[length]</td>";
        echo "</tr>";

        while($lib = $libResult->fetch_assoc()) {
            $songResult = $conn->query("SELECT * FROM SONG WHERE id='$lib[song]'");
            $song = $songResult->fetch_assoc();

            echo "<tr>";
            echo "<td>$song[name]</td>";
            echo "<td>$song[length]</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    ?>
    </div>
  </body>
</html>