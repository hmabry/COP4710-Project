<html>
<head><h>Recipes</h>
<br></br>
</head>

<body>

	<form method="post" action="index.php">
	Username: <input type="text" name = "user_name" placeholder="Enter your username" /><br />
	<input type="submit" value="Submit" />
	</form>

	<?php
	//Here I'm including the db connection file so I don't have to keep connecting in each file
	include 'db_connection.php';
	include 'scraper_setup.php';
	
	$db_found = mysqli_select_db($db_handle, $database);

	if($db_found){
		$SQL = "SELECT * FROM user";
		$result = mysqli_query($db_handle, $SQL);
		
		while ( $db_field = mysqli_fetch_assoc($result) ) {

		print "<BR>";
		print $db_field['u_id'] . "<BR>";
		print $db_field['username'] . "<BR>";
		print $db_field['password'] . "<BR>";
		}
	}
	else{
		print "Database not found";
	}
	
	$u_name = ($recipe['author']);
	
	$sql = "INSERT INTO user(username) VALUES ('$u_name')";
	
	 if(mysqli_query($db_handle, $sql)){
        echo "Username added successfully.";
    } else{
        echo "ERROR" . mysqli_error($link);
    }
	echo nl2br("\n");
	print "the name is: ";
	print $u_name;
	
	
	?>
	
</body>	
</html>