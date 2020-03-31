<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Songs </title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1> Song List </h1>
    <?php
    // Database connection parameters
    $DB_HOST = 'vconroy.cs.uleth.ca';
    $DB_USER = 'ward3660';
    $DB_PASS = 'qzegwe'; // blank or new_password
    $DB_NAME = 'ward3660'; // database instance name

    $conn = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
    if($conn->connect_errno) {
       echo "Connection issues";
       exit;
    }

    $libResult = $conn->query("SELECT * FROM LIBRARY");
    if($libResult->num_rows > 0) {
      while($lib = $libResult->fetch_assoc()) {
        $songResult = $conn->query("SELECT * FROM SONG WHERE id='$lib[song]'");
        $song = $songResult->fetch_assoc();
        $albumResult = $conn->query("SELECT * FROM ALBUM WHERE id='$lib[album]'");
        $album = $albumResult->fetch_assoc();
        echo "<table border=1>";

        echo "<tr>";
        echo "<td>$song[name]</td>";
        echo "<td>$song[length]</td>";
        echo "<td>$lib[artist]</td>";
        echo "<td>$album[name]</td>";
        echo "<td>$album[genre]</td>";
        echo "<td>$album[artwork]</td>";
        echo "</tr>";

        echo "</table>";
        echo "<br>";
      }
    }



    ?>
  </body>
</html>
