<?php
	$dbname = 'wideworldimporters';
	$dbuser = 'root';
	$dbpass = '';
	$dbhost = 'localhost';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'");
	mysqli_select_db($connect, $dbname) or die("Could not open the database '$dbname'");
?>