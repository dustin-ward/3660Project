<?php
$conn = new mysqli("vconroy.cs.uleth.ca",ward3660,qzegwe,ward3660);
if($mysqli->connect_errno) {
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
