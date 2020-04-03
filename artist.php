<?php
require_once "config.php";
$artist = $conn->query("SELECT * FROM ARTIST WHERE id = $_GET[id]")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php echo "<title> $artist[username] </title>"; ?>
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
    echo "<h1>$artist[username]'s Music</h1>";
    echo "<p>$artist[bio]</p>";

    $libResult = $conn->query("SELECT * FROM LIBRARY WHERE artist = $_GET[id]");
    if($libResult->num_rows > 0) {
        $lib = $libResult->fetch_assoc();
        
        $songResult = $conn->query("SELECT * FROM SONG WHERE id='$lib[song]'");
        $song = $songResult->fetch_assoc();
        $albumResult = $conn->query("SELECT * FROM ALBUM WHERE id='$lib[album]'");
        $album = $albumResult->fetch_assoc();

        $albumName = $album['name'];
        echo "<br><h2>$albumName</h2>";
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
        echo "<td><a class='play' href='play.php?id=$song[id]&next=artist&nextID=$_GET[id]'>Play</a></td>";
        echo "<td>$song[name]</td>";
        echo "<td>$song[length]</td>";
        echo "<td>$song[plays]</td>";
        if(isset($_SESSION['loggedin']) and !$_SESSION['artist']) {
          $check = $conn->query("SELECT * FROM USERLIBRARY WHERE user = '$_SESSION[id]' AND song = $song[id]");
          if($check->num_rows == 0) {
            echo "<td><a href='addSong.php?id=$song[id]&next=artist&nextID=$artist[id]'>Add Song</a></td>";
          }
          else {
            echo "<td><a href='removeSong.php?id=$song[id]&next=artist&nextID=$artist[id]'>Remove Song</a></td>";
          }
        }
        echo "</tr>";

        $last;
        while($lib = $libResult->fetch_assoc()) {
            $songResult = $conn->query("SELECT * FROM SONG WHERE id='$lib[song]'");
            $song = $songResult->fetch_assoc();
            $albumResult = $conn->query("SELECT * FROM ALBUM WHERE id='$lib[album]'");
            $album = $albumResult->fetch_assoc();
            if($album['name'] != $albumName) {
                $albumName = $album['name'];
                echo "</table>";
                echo "<br>";
                echo "<br><h2>$albumName</h2>";
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
                echo "<td><a class='play' href='play.php?id=$song[id]&next=artist&nextID=$_GET[id]'>Play</a></td>";
                echo "<td>$song[name]</td>";
                echo "<td>$song[length]</td>";
                echo "<td>$song[plays]</td>";
                if(isset($_SESSION['loggedin']) and !$_SESSION['artist']) {
                  $check = $conn->query("SELECT * FROM USERLIBRARY WHERE user = '$_SESSION[id]' AND song = $song[id]");
                  if($check->num_rows == 0) {
                    echo "<td><a href='addSong.php?id=$song[id]&next=artist&nextID=$artist[id]'>Add Song</a></td>";
                  }
                  else {
                    echo "<td><a href='removeSong.php?id=$song[id]&next=artist&nextID=$artist[id]'>Remove Song</a></td>";
                  }
                }
                echo "</tr>";
            }
            else {
                echo "<tr>";
                echo "<td><a class='play' href='play.php?id=$song[id]&next=artist&nextID=$_GET[id]'>Play</a></td>";
                echo "<td>$song[name]</td>";
                echo "<td>$song[length]</td>";
                echo "<td>$song[plays]</td>";
                if(isset($_SESSION['loggedin']) and !$_SESSION['artist']) {
                  $check = $conn->query("SELECT * FROM USERLIBRARY WHERE user = '$_SESSION[id]' AND song = $song[id]");
                  if($check->num_rows == 0) {
                    echo "<td><a href='addSong.php?id=$song[id]&next=artist&nextID=$artist[id]'>Add Song</a></td>";
                  }
                  else {
                    echo "<td><a href='removeSong.php?id=$song[id]&next=artist&nextID=$artist[id]'>Remove Song</a></td>";
                  }
                }
                echo "</tr>";
            }
            $last = $lib['album'];
        }
        echo "</table>";
        echo "<br>";
    }

    ?>
    </div>
  </body>
</html>