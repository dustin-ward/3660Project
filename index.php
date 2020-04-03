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
      <ul>
        <li><a href="library.php">View the Global Library</a></li>
        <?php
        if(isset($_SESSION['loggedin'])) {
          echo "<li><a href='myAccount.php'>My Account</a></li>";
          if($_SESSION['artist']) {
            echo "<li><a href='myMusic.php'>View Your Music</a></li>";
            echo "<li><a href='createAlbum.php'>Create an Album</a></li>";          
          }
          else {
            echo "<li><a href='userLibrary.php'>View Your Library</a></li>";
          }
          echo "<li><a href='logout.php'>Logout</a></li>";
        }
        else {
          echo "<li><a href='login.php'>Login</a></li>";
          echo "<li><a href='signup.php'>Create an Account</a></li>";
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
