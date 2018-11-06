<?php
/*	$dbname = 'wideworldimporters';
	$dbuser = 'root';
	$dbpass = 'Fasha2808';
	$dbhost = '127.0.0.1';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'");
	mysqli_select_db($connect, $dbname) or die("Could not open the database '$dbname'");

*/

$servername = "127.0.0.1";
$username = "root";
$password = "Fasha2808";
$dbname = "wideworldimporters";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





?>





