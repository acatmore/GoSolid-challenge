<html>
<body>
<?php
//add subordinates column
$subordinate_add = mysqli_query($link,"ALTER TABLE employees ADD (".subordinates." VARCHAR(10)");

//caluclate a subordinate by if the next person's bossId is them,
//and then if the next person's bossId is that person and so on

//calulate subrodinates
foreach($subordinates_col as $row) {
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
?>
</body>
</html>