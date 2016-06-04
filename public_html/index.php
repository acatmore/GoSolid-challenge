<html>
<head></head>
<body>
<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "xxxx";
	$dbname = "GoSolid";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	//sql to create table if it doesn't exist, otherwise return false
	$val = mysql_query("DESCRIBE `employees`");

	if($val !== FALSE) {
	   echo "employees table already exists";
	   	// put sqldump file data into employees table
		$file = 'acatmore/repos/GoSolid-Challenge/mysqldump.txt';
		$result = mysql_query("LOAD DATA INFILE '$file' INTO TABLE 'employees'");
	}
	else
	{
		$sql = "CREATE TABLE `employees` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(64) DEFAULT NULL,
		  `bossId` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `name` (`name`),
		  KEY `bossId` (`bossId`)
		)";

		if ($conn->query($sql) === TRUE) {
		    echo "Table employees created successfully";
		} else {
		    echo "Error creating table: " . $conn->error;
		}
	}


	$conn->close();
?>

</body>
</html>