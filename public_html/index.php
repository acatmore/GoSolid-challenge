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
//database info, change for your setup
$dbhost = "127.0.0.1";
$dbuser = "myuser";
$dbpass = "xxxx";
$dbname = "GoSolid";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

?>
<form method="Get">
	Employee Name <input type="text" name="search">
	<input type="submit" value="Go">
</form>

 <form method="Get">
 	jump to page <input type="text" name="page">
 	<input type= "submit" value="Go">
 </form>

<?php
//pagination variables
$employees_per_page = 100;
$page               = 1;
$sql_employees      = "SELECT * FROM `employees`";

if ($rs_result = mysqli_query($conn, $sql_employees)) {
    //return number of employees
    $total_employees = mysqli_num_rows($rs_result);
    
}

//calculate $total pages
$total_pages = ceil($total_employees / $employees_per_page);
?>
 <table>
	<tr class= "template">
		<!-- <th class="template">Id</th> -->
		<th class="template">Employee Name</th>
		<th class="template">Boss Name</th>
		<th class="template">Distance from CEO</th>
	<tr>
<?php
//convert sql col to html col 
$sql = "SELECT e.id as id, boss.id as idOfBoss, e.name as name, 
	boss.name as boss, e.bossId as bossId, boss.bossId as idOfBossId FROM employees as e JOIN 
	employees as boss ON e.bossId = boss.id ";

//url of search submission turned into sql query
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    //add query string search for like words
    $sql .= "WHERE e.name LIKE '%" . $search . "%' ";
    $search_result = $conn->query($sql);
}

// if order is needed to be set
// order by id
// $sql .= "ORDER BY id";

//only pull the number of rows you've set
$sql .= "LIMIT $employees_per_page ";

//url of page submission turned into query
if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
    $page   = trim($_GET["page"]);
    $offset = (($page - 1) * $employees_per_page);
    $sql .= "OFFSET " . $offset . " ";
} else {
    $page = 1;
}

/* while ($i = 1; $i) */

$data = $conn->query($sql);
//if can't find query
if (!$data) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
while ($record = mysqli_fetch_array($data)) {
    echo "<tr>";
    // echo "<td>" . $record['id'] . "</td>"; // id column if you want
    echo "<td>" . $record['name'] . "</td>";
    echo "<td>" . $record['boss'] . "</td>";
    
    $current_boss_id = $record['id'];
    $distance_to_ceo = 0;
    
    while ($current_boss_id != "1") {
        $current_employee = "SELECT bossId FROM employees WHERE id =" . $current_boss_id . " ";
        $employee_query   = $conn->query($current_employee);
        $employee_array   = mysqli_fetch_array($employee_query);
        $current_boss_id  = $employee_array['bossId'];
        $distance_to_ceo += 1;
    }
    echo "<td>" . $distance_to_ceo . "</td>";
    echo "</tr>";
}

$next = $page += 1;
$prev = $page -= 2;
// if ($total_pages >= 1 && $page <= $total_pages) {
//previous page view controls
if (isset($_GET["search"])) {
    $prev_button = "<a href=\"?search=" . $search . "\"?page=" . $prev . "\">" . 'prev' . " </a>";
} else if (0 < $page) {
    //back one page view
    $prev_button = "<a href=\"?page=" . $prev . "\">" . 'prev' . " </a>";
    echo $prev_button;
}
//next page view controls
if (isset($_GET["search"])) {
    $next_button = "<a href=\"?search=" . $search . "\"?page=" . $next . "\">" . 'next' . " </a>";
} else if ($total_pages - 1 > $page) {
    //forward one page view
    $next_button = "<a href=\"?page=" . $next . "\">" . 'next' . " </a>";
    echo $next_button;
}

// }

//close connection
$conn->close();
?>

</body>
</html>