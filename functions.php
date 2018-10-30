<?php
function loadItems(){
	include("connect.php");
	//Verkrijg alle productgroepen
	$groupQuery = "SELECT StockGroupName, StockGroupID FROM stockgroups";
	$resultGroups = mysqli_query($connect, $groupQuery);
	if (mysqli_num_rows($resultGroups) > 0) {
	    // output data of each row
	    while($row = mysqli_fetch_assoc($resultGroups)) {
	    	echo "<!-- <div class=\"items\"> --><table>";
	    	echo "<tr><th>".$row['StockGroupName']."</th></tr>";
	    	//Verkrijg alle producten per productgroep
			$itemsQuery = "SELECT StockItemName 
							FROM stockitems 
							JOIN stockitemstockgroups USING(StockItemID) 
							WHERE StockGroupID = '".$row['StockGroupID']."' 
							";
			$resultItems = mysqli_query($connect, $itemsQuery);
			if (mysqli_num_rows($resultItems) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($resultItems)) {
			    	echo "<tr><td>".$row['StockItemName']."</td></tr>";
					
			    }
			    echo "</table>";
			} else {
			    echo "<tr><td>No items in this category yet!</td></tr>";
			    echo "</table>";
			}

			echo "<!-- </div> -->";
	    }
	} else {
	    echo "No groups yet!<br>";
	}
	
}

?>