<html>
<body>
<?php
	//rows per page
	$employees_per_page = 100;

	//page 
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	}
	else {
		$page=1;
	}
	//Requested page
	$start = $employees_per_page * ($page - 1);

?>
<?php
	//pagination
	$sql_employees = "SELECT * FROM `employees`"; 
	if ($rs_result = mysqli_query($conn, $sql_employees)) {
		//return number of employees
		$total_employees = mysqli_num_rows($rs_result);  
		// Free result set
  		mysqli_free_result($rs_result);
	} //run the query
 	$total_pages = ceil($total_employees / $employees_per_page);
?>
 <p>
 <form action="index.php" method="Get">
 	Jump to page <input type="text" id="myUrl"><button>Go</button>
 </form>
 </p>


<?php
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
 ?>
</body>
</html>