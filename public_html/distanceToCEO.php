<html>
<body>
<?php
$ceo_distance_add = mysqli_query($conn, "ALTER TABLE `employees` ADD `distance` VARCHAR(10)")  or $conn->error;

?>
</body>
</html>