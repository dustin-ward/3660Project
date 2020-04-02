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
    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <h2> Links </h2>
    <ul>
      <li><a href="library.php">View the Global Library</a></li>
      <?php
      if(isset($_SESSION['loggedin'])) {
        echo "<li><a href='myAccount.php'>My Account</a></li>";
        if($_SESSION['artist']) {
          echo "<li><a href='myMusic.php'>View Your Music</a></li>";
          echo "<li><a href='createAlbum.html'>Create an Album</a></li>";          
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
  </body>
</html>
