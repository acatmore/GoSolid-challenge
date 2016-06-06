<html>
<body>
<?php
//add subordinates column
$bosses_create = mysqli_query($conn, "ALTER TABLE `employees` ADD `boss` VARCHAR(10)")  or $conn->error;

// $boss = mysqli_query($conn, "SELECT * FROM employees where id IN (
// 	SELECT a.id FROM employees a
// 	JOIN employees b on b.id = a.id AND b.bossId <> a.bossId
// 	)") or $conn->error;

$boss = mysqli_query($conn, "SELECT name FROM employees WHERE name = (name of bossId for this id)");

//sudo code: select all id where bossid=id

$boss_insert = mysqli_query($conn, "INSERT INTO `employees` ")
?>
</body>
</html>