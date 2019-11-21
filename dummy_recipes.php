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
		$SQL = "SELECT * FROM recipe";
		$result = mysqli_query($db_handle, $SQL);
		
		while ( $db_field = mysqli_fetch_assoc($result) ) {

		print "<BR>";
		print $db_field['name'] . "<BR>";
		print $db_field['author'] . "<BR>";
		print $db_field['preptime'] . "<BR>";
		}
	}
	else{
		print "Database not found";
	}
	
	$name = ($recipe['name']);
	$author = ($recipe['author']);
	$preptime = ($recipe['cookTime']);
	
	echo nl2br("\n");
	print "the name is: ";
	print $name;
	echo nl2br("\n");
	print "the author is: ";
	print $author;
	echo nl2br("\n");
	print "the prep time is: ";
	print $preptime;
	echo nl2br("\n");
	
	#$sql = "INSERT INTO user(username) VALUES ('$author')";
	$sql = "INSERT INTO recipe(author) VALUES ('$author')";
	
	 if(mysqli_query($db_handle, $sql)){
        echo "Username added successfully.";
    } else{
        echo "ERROR";
    }
	
	
	
	?>
	
</body>	
</html>