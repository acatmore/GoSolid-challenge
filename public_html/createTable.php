<html>
<head></head>
<body>
<?php

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
		//create employees table
		$sql = 'CREATE TABLE `employees` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(64) DEFAULT NULL,
		  `bossId` int(11) DEFAULT NULL,
		  PRIMARY KEY (`id`),
		  KEY `name` (`name`),
		  KEY `bossId` (`bossId`)
		)';

		if ($conn->query($sql) === TRUE) {
		    echo "Table employees created successfully";
		} else {
		    echo "Error creating table: " . $conn->error;
		}
?>


</body>
</html>