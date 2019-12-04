<html>
<head><h>Update A Recipe</h>
<br></br>
</head>
<body>

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
<label for="value">Value</label>
<input type="text" id="value" name="value" placeholder="Enter the value"/><br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php

  include 'db_connection.php';
  $db_found = mysqli_select_db($db_handle, $database);

  if(!empty($_POST['submit'])){
    $r_id = $_POST['recipe_id'];
    $table_name = $_POST['table'];
    $attribute = $_POST['attribute'];
    $value = $_POST['value'];

    $update_sql = "UPDATE $table_name SET $attribute = '$value' WHERE r_id = '$r_id'";

    if(mysqli_query($db_handle, $update_sql)){
      echo "Recipe update successful.";
    } else{
      echo "ERROR" . mysqli_error($link);
    }
  }
?>

</body>
</html>
