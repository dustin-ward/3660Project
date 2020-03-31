<?php
// Database connection parameters
$DB_HOST = 'vconroy.cs.uleth.ca';
$DB_USER = 'ward3660';
$DB_PASS = 'qzegwe'; // blank or new_password
$DB_NAME = 'ward3660'; // database instance name

$conn = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
if($conn->connect_errno) {
   echo "Connection Issue!";
   exit;
}

$sql = "INSERT INTO SONG (name, length) VALUES ('$_POST[name]','$_POST[length]')";
if($conn->query($sql)) {
	echo "<h3> Song Uploaded </h3>";
}
else {
   $err = $conn->errno;
   if($err == 1062) {
      echo "<p>Song name $_POST[title] already exists!</p>";
   }
   else {
      echo "<p>MySQL error code $err </p>";
   }
}

echo "<a href=\"index.html\">Return</a> to Home Page.";
?>
