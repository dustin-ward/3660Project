<?php
require_once "config.php";

$album = $conn->query("SELECT * FROM ALBUM WHERE id = $_GET[id]")->fetch_assoc();
$lib = $conn->query("SELECT * FROM LIBRARY WHERE album = $_GET[id]")->fetch_assoc();
$artist = $conn->query("SELECT * FROM ARTIST WHERE id = $lib[artist]")->fetch_assoc();

if($_SESSION['id'] != $artist['id']) {
    header('Location: index.php');
}
?>
<html>
<head>
    <title>Edit Album</title>
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
    <form action="editAlbum_Form.php" method="post">
        Title: <input type="text" name="name" size="30" value="<?=$album['name']?>" required><br><br>
        Genre: <input type="text" name="genre" size="30" value="<?=$album['genre']?>"><br><br>
        Artwork: <input type="file" name="artwork" value="<?=$album['artwork']?>"><br><br>
        <input type="hidden" name="id" value="<?=$album['id']?>"></input>
        <input type="submit" name="submit" value="Update">
    </form>
    </div>
</body>
</html>