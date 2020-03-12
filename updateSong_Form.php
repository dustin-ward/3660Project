<?php

$conn = new mysqli("vconroy.cs.uleth.ca",ward3660,qzegwe,ward3660);
$sql = "UPDATE SONG SET name='$_POST[name]', length='$_POST[length]', plays='$_POST[plays]' WHERE id='$_POST[id]'";

if($conn->query($sql)) {
	echo "<h3> Song updated!</h3>";
}
else {
   $err = $conn->errno();
   if($err == 1062) {
      echo "<p>Song id $_POST[id] already exists! This shouldnt happen</p>";
   }
	 else {
      echo "error code $err";
   }
}
echo "<a href=\"index.html\">Return</a> to Home Page.";
?>
