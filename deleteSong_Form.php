<?php

 // Database connection parameters
 $DB_HOST = 'vconroy.cs.uleth.ca';
 $DB_USER = 'ward3660';
 $DB_PASS = 'qzegwe'; // blank or new_password
 $DB_NAME = 'ward3660'; // database instance name

 $conn = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);

 $sql = "DELETE FROM SONG WHERE id='$_POST[id]'";
 if($conn->query($sql)) {
   echo "<h3> Song deleted!</h3>";
 }
 else {
    $err = $conn->errno;
    $errtxt = $conn->error;
    if($err == 1451) {
      echo "<h3>Cannot delete song $_POST[id]!</h3>";
      echo "One or more $_POST[id] courses have sections assigned to them.";
    }
    else {
      echo "you got an error code of $err. $errtxt";
    }
 }
 echo "<br><br><a href=\"index.html\">Return</a> to Home Page.";
?>
