<?php 
$server = "localhost";
$user = "root";
$password = "";
$db = "hospitals";
$conn = mysqli_connect($server, $user, $password, $db);
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
} 
?>
