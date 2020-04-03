<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> SpotTheFly </title>
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
      <h1>Welcome To SpotTheFly!</h1>
      <h2> Links </h2>
        <a class='button' href="library.php">View the Global Library</a><br><br>
        <?php
        if(isset($_SESSION['loggedin'])) {
          echo "<a class='button' href='myAccount.php'>My Account</a><br><br>";
          if($_SESSION['artist']) {
            echo "<a class='button' href='myMusic.php'>View Your Music</a><br><br>";
            echo "<a class='button' href='createAlbum.php'>Create an Album</a><br><br>";          
          }
          else {
            echo "<a class='button' href='userLibrary.php'>View Your Library</a><br><br>";
          }
          echo "<a class='button' href='logout.php'>Logout</a><br><br>";
        }
        else {
          echo "<a class='button' href='login.php'>Login</a><br><br>";
          echo "<a class='button' href='signup.php'>Create an Account</a><br><br>";
        }
        ?>
        <!-- <li><a href="uploadSong.html"> Upload Song </a></li>
        <li><a href="updateSong.php"> Update A Song </a></li>
        <li><a href="deleteSong.php"> Delete Song </a></li>
        <li><a href="songs.php"> View all Songs </a></li> -->
      </ul>
    </div>
  </body>
</html>
