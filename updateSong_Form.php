<?php

// Database connection parameters
$DB_HOST = 'vconroy.cs.uleth.ca';
$DB_USER = 'ward3660';
$DB_PASS = 'qzegwe'; // blank or new_password
$DB_NAME = 'ward3660'; // database instance name

$conn = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
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
