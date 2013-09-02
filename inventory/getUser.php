<?php


include("../include/database.php");
$q=$_GET['q'];
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM client WHERE c_id = '".$q."'";

$result = mysqli_query($con,$sql);

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row[1] . "</td>";
  echo "<td>" . $row[2] . "</td>";
  echo "<td>" . $row[3] . "</td>";
  echo "<td>" . $row[4] . "</td>";
  echo "<td>" . $row[5] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>