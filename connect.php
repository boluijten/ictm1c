<<<<<<< HEAD
<?php
	$dbname = 'wideworldimporters';
	$dbuser = 'root';
	$dbpass = '';
	$dbhost = 'localhost';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'");
	mysqli_select_db($connect, $dbname) or die("Could not open the database '$dbname'");
=======
<?php
	$dbname = 'wideworldimporters';
	$dbuser = 'root';
	$dbpass = '';
	$dbhost = 'localhost';
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to '$dbhost'");
	mysqli_select_db($connect, $dbname) or die("Could not open the database '$dbname'");
>>>>>>> d12ec5a09081db4839cbc207aed32ef4e20e890a
?>