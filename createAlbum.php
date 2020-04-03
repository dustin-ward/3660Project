<html>
<head>
    <title>Create an Album</title>
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
    <h2>Album Details</h2>
    <form action="createAlbum2.php" method="post">
        Title: <input type="text" name="name" size="30" required><br><br>
        Genre: <input type="text" name="genre" size="30"><br><br>
        Artwork: <input type="file" name="artwork"><br><br>
        # of Songs: <input type="int" name="numSongs" size="30" required><br><br>
        <input type="submit" name="submit" value="Next">
    </form>
    </div>
</body>
</html>