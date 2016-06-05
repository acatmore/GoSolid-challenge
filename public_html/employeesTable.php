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
	// Requested page
	$requested_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

	//convert sql table to html table
	$sql_data = 'SELECT * FROM `employees` LIMIT 100 OFFSET 0';
	$result = $conn->query($sql_data);

	print "<table > \n";
	//get field names as headers
	$row = $result->fetch_assoc();
	print "<tr> \n";
	foreach ($row as $field => $value) {
		print " <th>$field</th> \n";
	}
	print " </tr> \n";

	//second query gets data
	if ($data = $conn->query($sql_data)) {
    	while ($user = $data->fetch_assoc()) {
    		// output data of each row
			foreach($data as $row) {
				print " <tr> \n";
				foreach($row as $name=>$value) {
					print " <td>$value</td> \n";
				}
				print " </tr> \n";
			}
	 	} 
    }

?>
</body>
</html>