<html>
<body>
<?php
//add subordinates column
$subordinate_add = mysqli_query($conn, "ALTER TABLE `employees` ADD `subordinates` VARCHAR(10)")  or $conn->error;

//caluclate a subordinate by if the next person's bossId is them,
//and then if the next person's bossId is that person and so on

//calulate subrodinates
$sub_number = 0;
for ($y = $total_employees; $y > 0; $y-- ) {
	$previous = $y + 1;
	$bossId_data = "SELECT bossId FROM `employees` where id=$y";
	$prev_boss_data = "SELECT bossId FROM `employees` where id=$previous";
	// $bossId_result = $conn->query($bossId_data);
	if ($y < $total_employees) {
		if ($bossId_data > $prev_boss_data) {
			$sub_number++;
		}
	} else {
		$sub_number;	
	}
	$subordinates = "INSERT INTO `employees` (subordinates) VALUES ($sub_number)";
}




// $row = $bossId_result->fetch_assoc();

// if ($sub_result = $conn->query($bossId_data)) {
// 	while ($user = $sub_result->fetch_assoc()) {
// 		foreach($sub_result as $row) {

// 		if ($previous_value < $current_value) {
// 		$sub_number++;
// 		}
// 		//update subordinates column value
// 		$sql_update = "UPDATE employees SET subordinates=$sub_number";
// 			if ($conn->query($sql_update) === TRUE) {
//     		echo "Subordinate Record updated successfully";
// 			} else {
//     		echo "Error updating record: " . $conn->error;
// 		}
// 	}
// 	}

// }


?>
</body>
</html>