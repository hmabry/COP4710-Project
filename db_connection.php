<?PHP
//This file sets up the connection between the database and my PHP files
//The username is root and I didn't set up a password for my DB, which is called recipes
$host_name = "root";
$password = "";
$database = "recipes";
$server = "127.0.0.1";

$db_handle = mysqli_connect($server, $host_name, $password);

?>