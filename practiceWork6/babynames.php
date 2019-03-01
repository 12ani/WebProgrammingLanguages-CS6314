

<?php

	$hostname = 'localhost';
	$dbname   = 'HW3';
	$username = 'root';
	$password = 'root';
	$con=mysqli_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');
	mysqli_select_db($con,$dbname) or DIE('Database name is not available!');

	if (isset($_GET['babyYear']))
		$data1=$_GET['babyYear'];
	else
		$data1='';

	if (isset($_GET['babyGender']))
		$data2=$_GET['babyGender'];
	else
		$data2='';

	$query = "Select * from babynames where year>=2011 order by year, gender, ranking";

	if ($data1=='All Years' && $data2!='Both') {
		$query="Select * from babynames where gender='$data2' AND year>=2011 order by year DESC";
	} else if ($data1!='All Years' && $data2=='Both') {
		$query="Select * from babynames where year='$data1' order by gender, ranking";
	} else if ($data1!='All Years' && $data2!='Both'){
		$query="Select * from babynames where gender='$data2' AND year='$data1' order by ranking ASC";
	}

			$result = mysqli_query($con,$query);
			if (!$result) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}
?>


<html>
<head>
	<style>
		table, th, td {
		  border: 1px solid black;
		}
	</style>
</head>
<body>
	<div>
	<form action="babynames.php">

		<select id="search1" name="babyYear" placeholder="year">
			<option value="All Years"<?=$data1=='All Years' ? ' selected="selected"' : '';?>>All Years</option>
			<option value="2011"<?=$data1=='2011' ? ' selected="selected"' : '';?>>2011</option>
			<option value="2012"<?=$data1=='2012' ? ' selected="selected"' : '';?>>2012</option>
			<option value="2013"<?=$data1=='2013' ? ' selected="selected"' : '';?>>2013</option>
			<option value="2014"<?=$data1=='2014' ? ' selected="selected"' : '';?>>2014</option>
			<option value="2015"<?=$data1=='2015' ? ' selected="selected"' : '';?>>2015</option>
		</select>


		<select id="search2" name="babyGender" placeholder="gender">
			<option value="Both"<?=$data2 == 'Both' ? ' selected="selected"' : '';?>>Both</option>
			<option value="m"<?=$data2=='m' ? ' selected="selected"' : '';?>>m</option>
			<option value="f"<?=$data2=='f' ? ' selected="selected"' : '';?>>f</option>
		</select>

		<input type="submit" id="submit" value="SEARCH" name="searchsubmit">
	</form>
	<font color="white">


			<table>
				<tr>
					<thead>
						<td>Name</td>
						<td>Year</td>
						<td>Ranking</td>
						<td>Gender</td>
					</thead>
				</tr>
				<tbody>



		 		<?php
					while ($row = mysqli_fetch_array($result)) {
				?>
					<tr>
							<td><?php echo $row[0]?></td>
							<td><?php echo $row[1]?></td>
							<td><?php echo $row[2]?></td>
							<td><?php echo $row[3]?></td>
						<?php
							}
						?>
				    </tr>



				</tbody>
		</table>
</font>
</div>
</body>
</html>
