<html>
<head><h>Update A Recipe</h>
<br></br>
</head>
<body>

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>

<form method="post" action="update.php">

<label for="rid">Recipe ID</label>
<input type="text" id="rid" name="recipe_id" placeholder="Enter the ID"/><br />
<label>Table to Update</label>
  <select id = "table_id" name="table">
  <option value = "recipe">recipe</option>
  <option value = "ingredient">ingredient</option>
  <option value = "nutrition">nutrition</option>
</select><br />
<label for="attribute">Attribute</label>
<input type="text" id="attribute" name="attribute" placeholder="Enter the attribute"/>
<br />
<label for="rid">Ingredient Name (If Applicable)</label>
<input type="text" id="ing" name="ing_name" placeholder="Enter the ingredient to edit"/><br />
<label for="value">Value</label>
<input type="text" id="value" name="value" placeholder="Enter the value"/><br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php

  include 'db_connection.php';
  $db_found = mysqli_select_db($db_handle, $database);

  if(!empty($_POST['submit']) && $_POST['table'] != 'ingredient'){
    $r_id = $_POST['recipe_id'];
    $table_name = $_POST['table'];
    $attribute = $_POST['attribute'];
    $value = $_POST['value'];

    $update_sql = "UPDATE $table_name SET $attribute = '$value' WHERE r_id = '$r_id'";

    if(mysqli_query($db_handle, $update_sql)){
      echo "Recipe update successful.";
    } 
	else{
      echo "ERROR" . mysqli_error($update_sql);
    }
  }
	else if(!empty($_POST['submit']) && $_POST['table'] = 'ingredient'){
		$r_id = $_POST['recipe_id'];
		$table_name = $_POST['table'];
		$attribute = $_POST['attribute'];
		$value = $_POST['value'];
		$ing_name = $_POST['ing_name'];
		
		$update_sql = "UPDATE $table_name INNER JOIN is_in
		ON ingredient.name = is_in.name 
		AND ingredient.name = '$ing_name'
		AND is_in.r_id = '$r_id'
		SET $attribute = '$value'";

		if(mysqli_query($db_handle, $update_sql)){
		  echo "Recipe update successful.";
		} 
		else{
		  echo "ERROR" . mysqli_error($update_sql);
		}	
	}
?>

</body>
</html>
