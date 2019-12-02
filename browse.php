<html>
<head><h>Browse All Recipes</h>
<br></br>
</head>
<body>
<?php
	//Here I'm including the db connection file so I don't have to keep connecting in each file
	include 'db_connection.php';
	
	$db_found = mysqli_select_db($db_handle, $database);
	
	if($db_found){
		$SQL = "SELECT * FROM recipe";
		$result = mysqli_query($db_handle, $SQL);
			
		while ( $db_field = mysqli_fetch_assoc($result) ) {
			print "<BR>";
			print "<b>Recipe: </b>" . $db_field['name'] . " ";
			print "Author: " . $db_field['author'] . " ";
			print "Prep Time: " . $db_field['preptime'] . "<BR>";
		}
	}
?>

</body>
</html>