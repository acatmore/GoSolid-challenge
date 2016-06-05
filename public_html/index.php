<html>
<head></head>
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

	//create html output of employees
	require_once("employeesTable.php");
	$conn->close();



?>


</body>
</html>