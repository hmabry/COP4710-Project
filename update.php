<html>
<head><h>Update A Recipe</h>
<br></br>
</head>
<body>

<form method="post" action="update.php">

<label for="rid">Recipe ID</label>
<input type="text" id="rid" name="recipe_id" placeholder="Enter the ID"/><br />
<label for="rname">Recipe Name</label>
<input type="text" id="rname" name="recipe_name" placeholder="Enter new name"/>
<br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php

  include 'db_connection.php';
  $db_found = mysqli_select_db($db_handle, $database);

  if(!empty($_POST['submit'])){
    $r_id = $_POST['recipe_id'];
    $r_name = $_POST['recipe_name'];

    $update_sql = "UPDATE recipe SET name = '$r_name' WHERE r_id = '$r_id'";

    if(mysqli_query($db_handle, $update_sql)){
      echo "Recipe update successful.";
    } else{
      echo "ERROR" . mysqli_error($link);
    }
  }
?>

</body>
</html>
