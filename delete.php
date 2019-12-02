<html>
<head><h>Delete A Recipe</h>
<br></br>
</head>
<body>

<form method="post" action="delete.php">
	
<label for="rname">Recipe ID</label>
<input type="text" id="rid" name="recipe_id" placeholder="Enter the ID"/>
<input type="submit" name="submit" value="Submit" />
</form> 

<?php
	//Here I'm including the db connection file so I don't have to keep connecting in each file
	include 'db_connection.php';
	$db_found = mysqli_select_db($db_handle, $database);
	
	if(!empty($_POST['submit'])){
		$r_id = $_POST['recipe_id'];
		
		$delete_sql = "DELETE FROM recipe WHERE r_id = '$r_id'";
			
		if(mysqli_query($db_handle, $delete_sql)){
				echo "Recipe deleted successfully.";
		} else{
				echo "ERROR" . mysqli_error($link);
		}
	}
?>
	
</body>	
</html>