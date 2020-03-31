<html>
<head><title>Update A Song</title></head>
<body>

<?php
   echo "<form action=\"updateSong2.php\" method=post>";

   // Database connection parameters
   $DB_HOST = 'vconroy.cs.uleth.ca';
   $DB_USER = 'ward3660';
   $DB_PASS = 'qzegwe'; // blank or new_password
   $DB_NAME = 'ward3660'; // database instance name

   $conn = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

   $sql = "SELECT id, name FROM SONG";
   $result = $conn->query($sql);
   if($result->num_rows != 0) {
      echo "Song Name: <select name=\"id\">";

      while($val = $result->fetch_assoc()) {
	       echo "<option value='$val[id]'>$val[name]</option>";
      }
      echo "</select>";
      echo "<input type=submit name=\"submit\" value=\"View\">";
   }
   else
   {
      echo "<p> There aren't any songs! Please upload some. </p>";
   }

   echo "</form>";
?>



</body>
</html>
