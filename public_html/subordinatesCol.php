<html>
<body>
<?php
//add subordinates column
$subordinate_add = mysqli_query($link,"ALTER TABLE `employees` ADD `subordinates` VARCHAR(10)")  or $conn->error;

//caluclate a subordinate by if the next person's bossId is them,
//and then if the next person's bossId is that person and so on

//calulate subrodinates
$bossId_data = "SELECT bossId FROM employees";
$bossId_result = $conn->query($bossId_data);

$row = $bossId_result->fetch_assoc();

if ($sub_result = $conn->query($bossId_data)) {
	while ($user = $sub_result->fetch_assoc()) {
		foreach($sub_result as $row) {

		if ($previous_value < $current_value) {
		$sub_number++;
		}
		//update subordinates column value
		$sql_update = "UPDATE employees SET subordinates=$sub_number";
			if ($conn->query($sql_update) === TRUE) {
    		echo "Subordinate Record updated successfully";
			} else {
    		echo "Error updating record: " . $conn->error;
		}
	}
	}

}


?>
</body>
</html>