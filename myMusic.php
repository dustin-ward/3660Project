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
    echo "<h1>$_SESSION[username]'s Music</h1>";

    $libResult = $conn->query("SELECT * FROM LIBRARY WHERE artist = $_SESSION[id]");
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
        echo "<td>$song[name]</td>";
        echo "<td>$song[length]</td>";
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
                echo "<a class='button' href='deleteAlbum.php?id=$last'>Delete</a>";
                echo "<a class='button' href='editAlbum.php?id=$last'>Edit</a><br><br>";
                echo "<br><h2>$albumName</h2>";
                echo "<table>";
                echo "<tr>";
                echo "<td>$song[name]</td>";
                echo "<td>$song[length]</td>";
                echo "</tr>";
            }
            else {
                echo "<tr>";
                echo "<td>$song[name]</td>";
                echo "<td>$song[length]</td>";
                echo "</tr>";
            }
            $last = $lib['album'];
        }
        echo "</table>";
        echo "<br>";
        echo "<a class='button' href='deleteAlbum.php?id=$last'>Delete</a>";
        echo "<a class='button' href='editAlbum.php?id=$last'>Edit</a><br><br>";
    }

    ?>
    </div>
  </body>
</html>