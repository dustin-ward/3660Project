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
    $conn = new mysqli("vconroy.cs.uleth.ca",ward3660,qzegwe,ward3660);
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
