<html>
<head></head>
<body>

<?php
	// check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	//convert sql table to html table
	$sql_data = 'SELECT * FROM `employees`';
	$result = $conn->query($sql_data);

	print "<table> \n";
	//get field names as headers
	$row = $result->fetch(mysqli_result::fetch_assoc);
	print "<tr> \n";
	foreach ($row as $field => $value) {
		print " <th>$field</th> \n";
	}
	print " </tr> \n";

	//second query gets data
	if ($data = $mysqli->query($sql_data)) {
    	while ($user = $data->fetch(mysqli_result::fetch_assoc)) {
    		// output data of each row
			foreach($data as $row) {
				print " <tr> \n";
				foreach($row as $name=>$value) {
					print " <td>$value</td> \n";
				}
				print " </tr> \n";
			}
	 	} else {
	 		echo "0 results found";
	 	}
    }

?>
</body>
</html>