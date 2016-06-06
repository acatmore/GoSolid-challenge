<html>
<body>
<?php
//add subordinates column
$bosses_add = mysqli_query($conn, "ALTER TABLE `employees` ADD `boss` VARCHAR(10)")  or $conn->error;
?>
</body>
</html>