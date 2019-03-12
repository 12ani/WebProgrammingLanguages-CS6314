<?php

$hostname = 'localhost';
$dbname   = 'HW3';
$username = 'root';
$password = 'root';
$con = mysqli_connect($hostname, $username, $password) or DIE('Connection failed!');
mysqli_select_db($con,$dbname) or DIE('Error');


$d1=$_POST['yearsb'];
$d2=$_POST['gendersb'];

$query = "Select * from BabyNames where year>=2011 order by year, gender, ranking";

if ($d1=='All Years' && $d2!='Both') {
	$query="Select * from BabyNames where gender='$d2' AND year>=2011 order by year DESC";
} else if ($d1!='All Years' && $d2=='Both') {
	$query="Select * from BabyNames where year='$d1' order by gender, ranking";
} else if ($d1!='All Years' && $d2!='Both'){
	$query="Select * from BabyNames where gender='$d2' AND year='$d1' order by ranking ASC";
}

$result = mysqli_query($con,$query);
if (!$result) {
	printf("Error: %s\n", mysqli_error($con));
	exit();
}

echo "<table><tr><td>Name</td><td>Year</td><td>Ranking</td><td>Gender</td></tr>";

while ($row = mysqli_fetch_array($result))
{	echo "<tr>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['year']."</td>";
	echo "<td>".$row['ranking']."</td>";
	echo "<td>".$row['gender']."</td>";
	echo "</tr>";
}
echo "</table>";


?>
