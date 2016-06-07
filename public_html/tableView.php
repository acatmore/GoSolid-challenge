<html>
<head>
 <style type = "text/css">
  th, td .template {background-color: #8AC5E0;};
 </style>
 <style type = "text/css">
   table, th, td {border: 1px solid black;};
 </style>
</head>
<body>

<?php
	// check connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}

	//add bossnames
	// require_once("bossName.php");

?>
<table>
	<tr class= "template">
		<th class="template">Id</th>
		<th class="template">Employee Name</th>
		<th class="template">Boss Name</th>
		<th class="template">Distance from CEO</th>
	<tr>
<?php
	//convert all col to html col 
	$sql = "SELECT e.id as id, boss.id as idOfBoss, e.name as name, 
boss.name as boss, e.bossId as bossId, boss.bossId as idOfBossId FROM employees as e JOIN 
employees as boss ON e.bossId = boss.id LIMIT $employees_per_page";


if ($page) { 
	$sql .= "OFFSET $pageParameter * $employees_per_page" 
}
if ($sql_search) { 
	$sql .= 'WHERE name LIKE "' . $sql_search . '"'; 
}
	$data = $conn->query($sql);
	$row = $data->fetch_assoc();
		while ($record = $data->fetch_assoc()) {
			echo "<tr>";
			echo "<td>" . $record['id'] . "</td>";
			echo "<td>" . $record['name'] . "</td>";
			echo "<td>" . $record['boss'] . "</td>";
			echo "<td>" . $record['bossId'] . "</td>";
			echo "</tr>";
		}
?>
</table>

</body>
</html>