<!DOCTYPE html>
<html>
  <head>
    <title> Sign Up As An Artist </title>
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <div class='header'>
      		<a href='../index.php' class='logo'>SpotTheFly</a>
    </div>
    <div class='main'>
    <h1> Sign Up as an Artist </h1>
    <form action="signupArtist_Form.php" method="post">
      Email: <input type="text" name="email" size="30" required><br><br>
      Password: <input type="password" name="password" size="30" required><br><br>
      Artist Name: <input type="text" name="username" size="30" required><br><br>
      Bio: <textarea name="bio" id="bio" cols="30" rows="10"></textarea><br><br>
      Profile Picture: <input type="file" name="profilePic"><br><br>
      <input type="submit" name="submit" value="Sign Up">
    </form>
    </div>
  </body>
</html>