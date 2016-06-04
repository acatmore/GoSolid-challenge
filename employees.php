<!-- $ sed -n -e '/CREATE TABLE.*emplyees/' mysql.dump > mytable.dump -->

<!-- create new sql file from dumpfile -->
<!-- DUMPFILE=/acatmore/repos/GoSolid-Challenge/mysqldump.sql
MYSQL_USER=root
MYSQL_PASS=rootpassword
MYSQL_CONN="-u${MYSQL_USER} -p${MYSQL_PASS}"
mysqldump ${MYSQL_CONN} mysqldump | sed 's/mysqldump/mysqlcopy' > ${DUMPFILE}
mysql ${MYSQL_CONN} -Dmydb < ${DUMPFILE}
rm -f ${DUMPFILE -->
<?php
$servername = "localhost";
$username = "root";
$password = "xxxx";
$dbname = "GoSolid";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//sql to create table
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

$conn->close();
?>