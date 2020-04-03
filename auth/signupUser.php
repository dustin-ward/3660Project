<!DOCTYPE html>
<html>
  <head>
    <title> Sign Up As A User </title>
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <div class='header'>
      <a href='../index.php' class='logo'>SpotTheFly</a>
    </div>
    <div class='main'>
    <h1> Sign Up as a User </h1>
    <form action="signupUser_Form.php" method="post">
      Userame: <input type="text" name="username" size="30" required><br><br>
      Email: <input type="text" name="email" size="30" required><br><br>
      Password: <input type="password" name="password" size="30" required><br><br>
      Profile Picture: <input type="file" name="profilePic"><br><br>
      <input type="submit" name="submit" value="Sign Up">
    </form>
    </div>
  </body>
</html>