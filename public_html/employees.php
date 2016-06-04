<!-- $ sed -n -e '/CREATE TABLE.*employees/' mysqldump.txt > mytable.dump -->
<html>
<head></head>
<body>

<?php
	//convert sql table to html table
	// connect to the db
	$conn
	// show tables
	$showTable = mysql_query('SHOW TABLES',$conn) or die('cannot show tables');
	while($tableName = mysql_fetch_row($showTable)) {

		$table = $tableName[0];
		
		echo '<h3>',$table,'</h3>';
		$result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
		if(mysql_num_rows($showTable2)) {
			echo '<table cellpadding="0" cellspacing="0" class="db-table">';
			echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
			while($row2 = mysql_fetch_row($showTable2)) {
				echo '<tr>';
				foreach($row2 as $key=>$value) {
					echo '<td>',$value,'</td>';
				}
				echo '</tr>';
			}
			echo '</table><br />';
		}
	}
?>
</body>
</html>