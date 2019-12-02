<html>
<head><h>Recipes</h>
<br></br>
</head>

<body>
	<title>MY WEBSITE PAGE</title>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>

	
	<form method="post" action="index.php">
	<label for="rname">Recipe Name</label>
	<input type="text" id="rname" name="recipe_name" placeholder="Enter the recipe name" 
	
	<label for="aname">Author</label>
	<input type="text" id="aname" name="author_name" placeholder="Enter your name" 
	
	<label for="pname">Prep Time (In Minutes)</label>
	<input type="text" id="pname" name="prep_time" placeholder="Enter prep time" /><br />
	
	Ingredients: <br />
	
	<div id="ingredientdiv">
	<label for="iname">Ingredient Name</label>
	<input type="text" id="iname" name="ingredient[]" placeholder="Enter ingredient name" /><br />
	
	<label for="iamount">Amount</label>
	<input type="text" id="iname" name="amount[]" placeholder="Enter ingredient amount" /><br />
	
	<label for="iunit">Unit</label>
	<input type="text" id="iunit" name="unit[]" placeholder="Enter ingredient unit" /><br />
	</div>
	<div id="add_ingr"></div>
	<h1><a href="javascript:;" id="addfield">ADD NEW INGREDIENT</a></h1>
	
	<script type="text/javascript">
	$("#addfield").click(function(){
		var form=$("#ingredientdiv").html();

		$('#add_ingr').append(form); 

	});
	</script>
	
	Nutritional Info: <br />
	
	<label for="f_amt">Fat</label>
	<input type="text" id="f_amt" name="fat" placeholder="Enter ingredient name" /><br />
	
	<label for="sod_amt">Sodium</label>
	<input type="text" id="sod_amt" name="sodium" placeholder="Enter ingredient style" /><br />
	
	<label for="c_amt">Carbs</label>
	<input type="text" id="c_amt" name="carbs" placeholder="Enter ingredient amount" /><br />
	
	<label for="p_amt">Protein</label>
	<input type="text" id="p_amt" name="protein" placeholder="Enter ingredient amount" /><br />
	
	<label for="s_amt">Sugar</label>
	<input type="text" id="s_amt" name="sugar" placeholder="Enter ingredient unit" /><br />
	
	Directions: <br />
	
	<label for="dirs">Directions</label>
	<input type="text" id="dirs" name="directions" placeholder="Enter directions..." /><br />
	
	<input type="submit" name="submit" value="Submit" />
	</form>
	


	<?php
	//Here I'm including the db connection file so I don't have to keep connecting in each file
	include 'db_connection.php';
	
	$db_found = mysqli_select_db($db_handle, $database);
	
	if(!empty($_POST['submit'])){
		if($db_found){
			$SQL = "SELECT * FROM recipe";
			$result = mysqli_query($db_handle, $SQL);
			
			while ( $db_field = mysqli_fetch_assoc($result) ) {

			print "<BR>";
			print $db_field['name'] . "<BR>";
			print $db_field['author'] . "<BR>";
			}
		}
		else{
			print "Database not found";
		}
		
		$r_name = $_POST['recipe_name'];	
		$a_name = $_POST['author_name'];
		$p_time = $_POST['prep_time'];	
		
		$recipe_sql = "INSERT INTO recipe(name, author, preptime) VALUES ('$r_name', '$a_name', '$p_time')";
		
		 if(mysqli_query($db_handle, $recipe_sql)){
			echo "Recipe info added successfully.";
		} else{
			echo "ERROR" . mysqli_error($link);
		}
		
		print "the name is: ";
		print $r_name;
		
		$i_name = $_POST['ingredient'];	
		$i_amount = $_POST['amount'];	
		$i_unit = $_POST['unit'];	
		
		#$ingredient_sql = "INSERT INTO ingredient(name,  amount, unit) VALUES ('$i_name', '$i_amount', '$i_unit')";	
		
		foreach($_POST['ingredient'] as $value)
		{
			$ingredient_sql = "INSERT INTO ingredient(name) VALUES ('$value')";
			mysqli_query($db_handle, $ingredient_sql);
		}
		
		foreach($_POST['amount'] as $value)
		{
			$ingredient_sql = "INSERT INTO ingredient(amount) VALUES ('$value')";
			mysqli_query($db_handle, $ingredient_sql);
		}
		
		foreach($_POST['unit'] as $value)
		{
			$ingredient_sql = "INSERT INTO ingredient(unit) VALUES ('$value')";
			mysqli_query($db_handle, $ingredient_sql);
		}
		
		
		
		
		$fat = $_POST['fat'];	
		$sodium = $_POST['sodium'];
		$carbs = $_POST['carbs'];
		$protein = $_POST['protein'];	
		$sugar = $_POST['sugar'];	
		
		$nutrition_sql = "INSERT INTO nutrition(fat, sodium, carbs, protein, sugar) VALUES ('$fat', '$sodium', '$carbs', '$protein', '$sugar')";
		
		if(mysqli_query($db_handle, $nutrition_sql)){
			echo "Nutritional info added successfully.";
		} else{
			echo "ERROR" . mysqli_error($link);
		}
		
		$dirs = $_POST['directions'];
		
		$dirs_sql = "INSERT INTO recipe(directions) VALUES ('$dirs')";
		
		if(mysqli_query($db_handle, $dirs_sql)){
			echo "Direction info added successfully.";
		} else{
			echo "ERROR" . mysqli_error($link);
		}
	}
	?>
	
</body>	
</html>