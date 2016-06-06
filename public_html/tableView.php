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
	//rows per page
	$employees_per_page = 100;

	//page 
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	}
	else {
		$page=1;
	}
	//Requested page
	$start = $employees_per_page * ($page - 1);

	//convert sql table to html table
	$sql_data = "SELECT * FROM `employees` LIMIT $start, $employees_per_page";
	$result = $conn->query($sql_data);

	echo "<table > \n";
	//get field names as headers
	$row = $result->fetch_assoc();
	echo "<tr> \n";
	foreach ($row as $field => $value) {
		echo " <th>$field</th> \n";
	}
	echo " </tr> \n";

	//second query gets data
	if ($data = $conn->query($sql_data)) {
    	while ($user = $data->fetch_assoc()) {
    		// output data of each row
			foreach($data as $row) {
				echo " <tr> \n";
				foreach($row as $name=>$value) {
					echo " <td>$value</td> \n";
				}
				echo " </tr> \n";
			}
	 	} 
    }

?>
<?php
	//pagination
	$sql_employees = "SELECT * FROM `employees`"; 
	if ($rs_result = mysqli_query($conn, $sql_employees)) {
		//return number of employees
		$total_employees = mysqli_num_rows($rs_result);  
		// Free result set
  		mysqli_free_result($rs_result);
	} //run the query
 	$total_pages = ceil($total_employees / $employees_per_page);

	// echo "<a href='pagination.php?page=1'>".'|<'."</a> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
            //echo "<a href='pagination.php?page=".$i."'>".$i."</a> "; 
    	?>
    		<a href="pagination.php?page=<?php echo $i ?>"><?php echo $i ?></a>
    	<?php
	}; 
	// echo "<a href='pagination.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>
</body>
</html>