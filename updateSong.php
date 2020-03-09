<html>
<head><title>Update A Song</title></head>
<body>

<?php
echo "<form action=\"updatedept2.php\" method=post>";

$conn = new mysqli("vconroy.cs.uleth.ca",ward3660,qzegwe,ward3660);
if($conn->connect_errno) {
   echo "Connection Problem!";
   exit;
}

$sql = "select * from SONG where name='$_POST[name]'";

$result = $conn->query($sql);
if(!$result)
{
   echo "Problem executing select!";
   exit;
}
      if($result->num_rows!= 0)
{
   $rec=$result->fetch_assoc();
   echo "Department Name: <input type=text name=\"dname\" value=\"$rec[dname]\"><br><br>";
   echo "Department Location: <input type=text name=\"loc\" value=\"$rec[loc]\"><br><br>";
   echo "Department Chair: <input type=text name=\"id\" value=\"$rec[id]\"><br><br>";
   echo "<input type=hidden name=\"oldname\" value=\"$_POST[dname]\">";
   echo "<input type=submit name=\"submit\" value=\"Update\">";

}
else
{
	echo "<p>Umm...you may want to enter some data. ;) </p>";
}

echo "</form>";
?>



</body>
</html>
