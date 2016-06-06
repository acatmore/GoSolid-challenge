<html>
<head>
<!-- <script src="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
</head>
<body>
<?php
	$dbhost = "127.0.0.1";
	$dbuser = "myuser";
	$dbpass = "xxxx";
	$dbname = "GoSolid";

	// Create connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	//create table
	require_once("createTable.php");

	//insert values into table
	require_once("loadDump.php");

	//add subordinates
	//require_once("subordinatesCol.php");

	//create html output of employees
	require_once("tableView.php");

	//close connection
	$conn->close();



?>

</body>
</html>