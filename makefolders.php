<?php
require("connect.php");

$groupQuery = "SELECT StockItemID FROM stockitems";
	$resultGroups = mysqli_query($connect, $groupQuery);
	if (mysqli_num_rows($resultGroups) > 0) {
	    // Maak categorie menu
	    while($row = mysqli_fetch_assoc($resultGroups)) {

	    	mkdir("producten/". $row['StockItemID']);

	    }
	}


?>