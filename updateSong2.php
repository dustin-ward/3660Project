<html>
<head><title>Update A Song</title></head>
<body>

<?php
  echo "<form action=\"updateSong_Form.php\" method=post>";

	// Database connection parameters
	$DB_HOST = 'vconroy.cs.uleth.ca';
	$DB_USER = 'ward3660';
	$DB_PASS = 'qzegwe'; // blank or new_password
	$DB_NAME = 'ward3660'; // database instance name
   
	$conn = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
	if($conn->connect_errno) {
	   echo "Connection Problem!";
	   exit;
	}

	$sql = "SELECT * FROM SONG WHERE id='$_POST[id]'";

	$result = $conn->query($sql);
	if(!$result) {
	   echo "Problem executing select!";
	   exit;
	}
  if($result->num_rows!= 0){
	   $rec=$result->fetch_assoc();
	   echo "Song Name: <input type=text name=\"name\" value=\"$rec[name]\"><br><br>";
	   echo "Song Length: <input type=text name=\"length\" value=\"$rec[length]\"><br><br>";
	   echo "Plays: <input type=text name=\"plays\" value=\"$rec[plays]\"><br><br>";
     echo "<input type=hidden name=\"id\" value=\"$_POST[id]\">";
	   echo "<input type=submit name=\"submit\" value=\"Update\">";
  }
	else {
		echo "<p> Entry doesn't exist! Please try again. </p>";
	}

	echo "</form>";
?>

</body>
</html>
