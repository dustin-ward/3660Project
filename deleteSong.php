<html>
<head><title>Delete A Song</title></head>
<body>
<?php

 echo "<form action=\"deleteSong_Form.php\" method=post>";

 $conn = new mysqli("vconroy.cs.uleth.ca",ward3660,qzegwe,ward3660);

 $sql = "SELECT id, name FROM SONG";
 $result = $conn->query($sql);
 if($result->num_rows != 0) {
    echo "Song Name: <select name=\"id\">";

    while($val = $result->fetch_assoc()) {
      echo "<option value='$val[id]'>$val[name]</option>";
    }

    echo "</select>";
    echo "<input type=submit name=\"submit\" value=\"Delete\">";
 }
 else {
    echo "<p>Error Message</p>";
 }

 echo "</form>";
?>
</body>
</html>
