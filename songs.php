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

    $result = $conn->query("SELECT * FROM SONG");
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<table border=1>";

        echo "<tr>";
        echo "<td>$row[name]</td>";
        echo "<td>$row[length]</td>";
        echo "<td>$row[plays]</td>";
        echo "</tr>";

        echo "</table>";
        echo "<br>";
      }
    }



    ?>
  </body>
</html>
