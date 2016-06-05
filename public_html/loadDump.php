<html>
<head></head>
<body>
<?php
	//load dumpfile data into table
	$dump_file = "mysqldump.sql";
	$lines = file($dump_file); //file in to an array
	$sql_insert = $lines[40]; //line 41 -- populated data
	if ($conn->query($sql_insert) === TRUE) {
		echo "Table populated from dumpfile";
	} else {
		echo "Error inserting values from dumpfile" . $conn->error;
	}
?>
</body>
</html>