<?php

 $conn = new mysqli("vconroy.cs.uleth.ca",ward3660,qzegwe,ward3660);

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
