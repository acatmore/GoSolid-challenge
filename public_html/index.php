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
	$dbhost = "127.0.0.1";
	$dbuser = "myuser";
	$dbpass = "xxxx";
	$dbname = "GoSolid";

	// Create connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	//rows per page
	$employees_per_page = 100;

	//convert all col to html col 
	$sql = "SELECT e.id as id, boss.id as idOfBoss, e.name as name, 
	boss.name as boss, e.bossId as bossId, boss.bossId as idOfBossId FROM employees as e JOIN 
	employees as boss ON e.bossId = boss.id LIMIT $employees_per_page";
?>
<form action="index.php" method="Get">
	Employee Name <input type="text" name="submit"value="search">
	<input type="submit" value="Go">
</form>

 <form action="index.php" method="Get">
 	jump to page <input type="text" name="page">
 	<input type= "submit" value="Go">
 </form>

<?php

	 // build url with search submission
	if (isset($_GET['search'])) {
		$search=$_GET['search']; 
		 //add query string search for like words
		 $sql .=" WHERE name LIKE '%' . $mysqli->real_escape_string(trim($search)) . '%'";
		 $result = $conn->query($sql);
	} else {
		echo "<p>please enter a search query</p>";
	}
	//build url with page number submission
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
		// $sql .= " WHERE "
	} else {
		$page=1;
	}
	//Requested page
	$start = $employees_per_page * ($page -1);

	//pagination
	$sql_employees = "SELECT * FROM `employees`"; 
	if ($rs_result = mysqli_query($conn, $sql_employees)) {
		//return number of employees
		$total_employees = mysqli_num_rows($rs_result);  

	}
?>
 <table>
	<tr class= "template">
		<th class="template">Id</th>
		<th class="template">Employee Name</th>
		<th class="template">Boss Name</th>
		<th class="template">Distance from CEO</th>
	<tr>

<?php
	// if ($page) { 
	// $sql .= "OFFSET $page * $employees_per_page" 
	// }
// if ($sql_search) { 
// 	$sql .= 'WHERE name LIKE "%' . $sql_search . '%"'; 
// }
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
 //calculate $total pages
 	$total_pages = ceil($total_employees / $employees_per_page);
 	$next = $page += 1;
 	$prev = $page -= 2;
 	if ($total_pages >= 1 && $page <= $total_pages) {
 	 	if (0 < $page) {
 	 		//back one page view
 	 		$prev_button = "<a href=\"?page=" .$prev."\">".'prev'." </a>";
 	 		echo $prev_button;
 	 	}
 	 	if ($total_pages - 1 > $page) {
 	 		//forward one page view
 	 		$next_button = "<a href=\"?page=" .$next."\">".'next'." </a>";
 	 		echo $next_button;
 	 	}

 	}

	//close connection
	$conn->close();
?>

</body>
</html>