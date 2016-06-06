<html>
<head>
 <style type = "text/css">
  table, th, td {border: 1px solid black; background-color: #8AC5E0;};

 </style>
</head>
<body>

<?php
	// check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	//add bossnames
	require_once("bossName.php");

	//add distance to CEO
	require_once("distanceTOCEO.php");

	//add subordinates
	require_once("subordinatesCol.php");
?>
<table>
	<tr>
		<th>Employee Name</th>
		<th>Boss Name</th>
		<th>Distance from CEO</th>
		<th>Subordinates</th>
	<tr>
<?php

	//convert names col to html col
	$sql_names = "SELECT name FROM `employees` LIMIT $start, $employees_per_page";
	$names_result = $conn->query($sql_names);
	$row = $names_result->fetch_assoc();

	if ($names = $conn->query($sql_names)) {
		while ($user = $names->fetch_assoc()) {
			foreach ($names as $row) {
				?>
				<tr>
					<?php
					foreach($row as $name=>$value) {

						echo "<td>$value</td> \n";

					}
					?>
				</tr>
				<?php
			}
		}
	}
?>

<?php

	//convert bossId to boss name col
	$sql_bosses = "SELECT boss FROM `employees` LIMIT $start, $employees_per_page";
	$bosses_result = $conn->query($sql_bosses);
	$row = $bosses_result->fetch_assoc();

	if ($bosses = $conn->query($sql_bosses)) {
		while ($user = $bossId->fetch_assoc()) {
			foreach ($bossId as $row) {
				?>
				<tr>
					<?php
					foreach($row as $bosses_result=>$value)

						echo "<td>$value</td> \n";

					?>
				</tr>
<?php
			}
		}
	}
?>

<?php
	//convert bossId and id into CEO distance col
	// $sql_boss_distance = "SELECT distance FROM `employees` LIMIT $start, $employees_per_page";
	// $distance_result = $conn->query($sql_boss_distance);
	// $row = $distance_result->fetch_assoc();
?>

<?php
	//convert bossId and id into subordinates col
	// $sql_subs = "SELECT subordinates FROM `employees` LIMIT $start, $employees_per_page";
	// $subs_result = $conn->query($sql_subs);
	// $row = $subs_result->fetch_assoc();


?>
</table>
<?php

	//get field names as headers
	//NEED TO REMOVE BOSSID AND REPLACE IT AND COLUMN WITH DISTANCE TO CEO
	// $row = $result->fetch_assoc();
	// echo "<tr> \n";
	// foreach ($row as $field => $value) {
	// 	echo " <th>$field</th> \n";
	// }
	// echo " </tr> \n";

	// //second query gets data
	// if ($data = $conn->query($sql_data)) {
 //    	while ($user = $data->fetch_assoc()) {
 //    		// output data of each row
	// 		foreach($data as $row) {
	// 			echo " <tr> \n";
	// 			foreach($row as $name=>$value) {
	// 				echo " <td>$value</td> \n";
	// 			}
	// 			echo " </tr> \n";
	// 		}
	//  	} 
    //}

?>


</body>
</html>