<html>
<head>
	<script type="text/javascript">
	function go() {
		var urlInput=document.getElementsByName("page");
		window.location.href= "index.php/" +urlInput(0).value;
	}
	</script>
</head
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
	$start = $employees_per_page * ($page -1);

?>
<?php
	//pagination
	$sql_employees = "SELECT * FROM `employees`"; 
	if ($rs_result = mysqli_query($conn, $sql_employees)) {
		//return number of employees
		$total_employees = mysqli_num_rows($rs_result);  

	} //run the query
 	$total_pages = ceil($total_employees / $employees_per_page);
?>

<form action="index.php" method="Get">
	Employee Name <input type="text" id="page" value="search">
	<input type="submit" value="Go">
</form>

<?php

if (isset($_POST['submit'])) {
	if (isset($_GET['go'])) {
		if(preg_match("/[A-Z  | a-z]+/", $_POST['name'])){ 
	  		$name=$_POST['name']; 
	  		$conn;
	  		//query table for similar words
	  		$sql_search="SELECT name FROM emplpyees 
	  		WHERE  name LIKE '%' . $name . '%'";
	  		$result = $conn->query($sql_search);
		}
	} else {
	echo "<p>please enter a search query</p>";
		}
	}

?>

 <form action="index.php" method="Get">
 	jump to page <input type="text" name="page" value=" number 1 - 200">
 	<input type= "submit" value="Go">
 </form>


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