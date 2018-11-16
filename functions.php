<?php
// Aangeroepen in index.php
function laadCategorie(){
	// Verbinden met database
	include("connect.php");
	// Kijk of er een categorie is geselecteerd
	$groupName = "";
	if(filter_input(INPUT_GET, 'categorie') != ""){
		$groupName = filter_input(INPUT_GET, 'naamCategorie');

	}
	//Verkrijg alle productgroepen
	$groupQuery = "SELECT StockGroupName, StockGroupID FROM stockgroups";
	$resultGroups = mysqli_query($connect, $groupQuery);
	if (mysqli_num_rows($resultGroups) > 0) {
	    // Maak categorie menu
	    echo "<div class=\"vertical-menu\">";
	    while($row = mysqli_fetch_assoc($resultGroups)) {
	    	$class = "";
	    	// Als er een categorie is geselecteerd controlleer of dat deze is
	    	if($groupName == $row['StockGroupName']){
	    		// Als deze categorie is geselecteerd is krijgt de link de class 'inUse' van toepassing (zie style.css)
	    		$class = "inUse";
	    	}else{
	    		// In het geval de de klasse niet is geselecteerd krijgt de link de class 'notInUse' (zie style.css)
	    		$class = "notInUse";
	    	}
	    	// Print de rij met de class die eerder is geset
	    	echo "<a href=\"index.php?categorie=".$row['StockGroupID']."&naamCategorie=".$row['StockGroupName']."\" class='$class'>".$row['StockGroupName']."</a>";
	    }
	    if($groupName != ""){
	    	echo "<a href=\"index.php\" class='clear'>See all</a>";
	    }
	    echo "</div>";
	} else {
	    echo "No groups yet!<br>";
	}

}
// Aangeroepen in index.php
function laadCategorieZoekpagina(){
	// Verbinden met database
	include("connect.php");
	$searchID = htmlspecialchars(mysqli_real_escape_string($connect, filter_input(INPUT_GET, 'search')));
	// Kijk of er een categorie is geselecteerd
	$groupName = "";
	if(filter_input(INPUT_GET, 'categorie') != ""){
		$groupName = filter_input(INPUT_GET, 'categorie');

	}
	//Verkrijg alle productgroepen
	$groupQuery = "SELECT StockGroupName, StockGroupID FROM stockgroups";
	$resultGroups = mysqli_query($connect, $groupQuery);
	if (mysqli_num_rows($resultGroups) > 0) {
	    // Maak categorie menu
	    echo "<div class=\"vertical-menu\">";
	    while($row = mysqli_fetch_assoc($resultGroups)) {
	    	$class = "";
	    	// Als er een categorie is geselecteerd controlleer of dat deze is
	    	if($groupName == $row['StockGroupID']){
	    		// Als deze categorie is geselecteerd is krijgt de link de class 'inUse' van toepassing (zie style.css)
	    		$class = "inUse";
	    	}else{
	    		// In het geval de de klasse niet is geselecteerd krijgt de link de class 'notInUse' (zie style.css)
	    		$class = "notInUse";
	    	}
	    	// Print de rij met de class die eerder is geset
	    	echo "<a href=\"action_search.php?search=".$searchID."&categorie=".$row['StockGroupID']."\" class='$class'>".$row['StockGroupName']."</a>";
	    }
	    if($groupName != ""){
	    	echo "<a href=\"index.php\" class='clear'>See all</a>";
	    }
	    echo "</div>";
	} else {
	    echo "No groups yet!<br>";
	}

}

// Wordt aangeroepen in index.php
function laadProducten(){
	// Verbinden met database
	include("connect.php");
	// Kijk of er een categorie is geselecteerd
	if(filter_input(INPUT_GET, 'categorie') != ""){
		// Verkrijg ID van de categorie uit de GET en maak een query die alle producren verkrijgt met dat speciale categorie ID
		$groupID = filter_input(INPUT_GET, 'categorie');
		$groupQuery = "SELECT StockItemName, StockItemID, MarketingComments, StockGroupName, StockGroupID, Photo FROM stockitems JOIN stockitemstockgroups USING(StockItemID) JOIN stockgroups USING(StockGroupID) WHERE StockGroupID = ".$groupID." GROUP BY StockItemID";
		// Sla de naam van de groep op uit de GET
		$groupName = filter_input(INPUT_GET, 'naamCategorie');
	}else{
		// In het geval dat er geen categorie is geselecteerd alle producten laden
		$groupQuery = "SELECT StockItemName, StockItemID, MarketingComments, StockGroupID, Photo FROM stockitems JOIN stockitemstockgroups USING(StockItemID) GROUP BY StockItemID";
	}
	// Voer de groupQuery uit
	$resultGroups = mysqli_query($connect, $groupQuery);
	// Check of er data beschikbaar is:
	if (mysqli_num_rows($resultGroups) > 0) {
	    echo "<div class=\"grid-container\">";
	    // Voor elk gevangen resultaat een productweergave printen
	    while(($row = mysqli_fetch_assoc($resultGroups))) {
	    	echo "<a href='artikel.php?artikel=".$row['StockItemID']."&group=".$row['StockGroupID']."'>";
	    	echo "<div class=\"grid-item\">";
	    	echo "<h3>".$row['StockItemName']."</h3>";
	    	if($row['Photo'] != ""){
	    		echo "<img src='data:image/jpeg;base64,".base64_encode( $row['Photo'] )."' class='productImageHome'>";
	    	}else{
	    		echo "<img src='assets/geen.jpg' class='productImageHome'>";
	    	}
	    	echo "<p>".$row['MarketingComments']."</p>";
	    	echo "</div>";
	    	echo "</a>";
	    }
	    echo "</div>";
	} else {
	    echo "<div class='geenProducten'>Nog geen producten in deze categorie!</div>";
	}
}

// Wordt aangeroepen in de zoekbalk en stuurt je door naar 'action_search.php' pagina
function zoekProduct(){
	// Verbinden met database
	include("connect.php");
	// Verkrijg de zoekterm
	$searchID = htmlspecialchars(mysqli_real_escape_string($connect, filter_input(INPUT_GET, 'search')));
	// Zoekterm zonder escape string voor weergeven op pagina
	$searchHTML = htmlspecialchars(filter_input(INPUT_GET, 'search'));
	$categorieID = htmlspecialchars(filter_input(INPUT_GET, 'categorie'));

	$onCategory = false;
	if($searchID != ""){

		if($categorieID != ""){
			$searchQuery = "SELECT StockItemName, StockItemID, MarketingComments, StockGroupID, Photo FROM stockitems JOIN stockitemstockgroups USING(StockItemID) WHERE SearchDetails LIKE '%$searchID%' AND StockGroupID = $categorieID GROUP BY StockItemID";
			$onCategory = true;
		}else{
			$searchQuery = "SELECT StockItemName, StockItemID, MarketingComments, StockGroupID, Photo FROM stockitems JOIN stockitemstockgroups USING(StockItemID) WHERE SearchDetails LIKE '%$searchID%' GROUP BY StockItemID";
		}
		// Zoek in de database naar producten die de zoekterm in de naam hebben
		

		// Haal naam id en comments uit de database
		$resultSearch = mysqli_query($connect, $searchQuery);
		// Check of er data beschikbaar is:
		if (mysqli_num_rows($resultSearch) > 0) {
			echo "<div class='search'><h2>Resultaten voor \"".htmlentities($searchHTML)."\"</h2></div>";
			echo "<br><br><br><br><br><br><br><br><br>";
		    echo "<div class=\"grid-container\">";
		    // Voor elk gevangen resultaat een productweergave printen
		    while($row = mysqli_fetch_assoc($resultSearch)) {
		    	echo "<a href='artikel.php?artikel=".$row['StockItemID']."&group=".$row['StockGroupID']."'>";
		    	echo "<div class=\"grid-item\">";
		    	echo "<h3>".$row['StockItemName']."</h3>";
		    	if($row['Photo'] != ""){
		    		echo "<img src='data:image/jpeg;base64,".base64_encode( $row['Photo'] )."' class='productImageHome'>";
		    	}else{
		    		echo "<img src='assets/geen.jpg' class='productImageHome'>";
		    	}
		    	echo "<p>".$row['MarketingComments']."</p>";
		    	echo "</div>";
		    	echo "</a>";
		    }
		    echo "</div>";
		} else {
			if($onCategory){
				echo "<div class='geenProducten'>Nog geen producten met de zoekterm \"$searchID\" in this category!</div>";
			}else{
				echo "<div class='geenProducten'>Nog geen producten met de zoekterm \"$searchID\"!</div>";
			}
		    
		}
	}else{
		header("location: index.php");

	}
	

}

// artikelpagina laadt de informatie van geselecteerde product (artikel.php)
function laadProductpagina(){
	// Verbinden met database
	include("connect.php");
	// Verkrijg de zoekterm
	$artikelID = filter_input(INPUT_GET, 'artikel');

	// Zoek in de database naar producten die overeen komen met het geselecteerde artikel
	// JOIN stockitemholdings USING('StockItemID')
	// , QuantityOnHand
	if($artikelID != ""){
		$artikelQuery = "SELECT StockItemName, StockItemID, MarketingComments, UnitPrice, QuantityOnHand, IsChillerStock FROM stockitems JOIN stockitemholdings USING(StockItemID) WHERE StockItemID = $artikelID";

		// Haal naam id en comments uit de database
		$resultArtikel = mysqli_query($connect, $artikelQuery);
		// Check of er data beschikbaar is:
		if (mysqli_num_rows($resultArtikel) > 0) {
			// Voor elk gevangen resultaat een productweergave printen
		    while($row = mysqli_fetch_assoc($resultArtikel)) {
			    echo "<h2>".$row['StockItemName']."</h2>";
			    echo "<hr>";
			    echo "
							<div class=\"grid-container-artikel-ondertitel\">
							<div class=\"grid-item-artikel-ondertitel\">
							<div class=\"w3-content\" style=\"max-width:20vw; margin-left:0vw;\">
		  				<img class=\"mySlides\" src=\"assets/artikelpag/russianbomb1.jpg\" style=\"width:300px; height:250px;display:none;\">
		  				<img class=\"mySlides\" src=\"assets/artikelpag/russianbomb2.jpg\" style=\"width:300px; height:250px;\">
		  				<img class=\"mySlides\" src=\"assets/artikelpag/russianbomb3.jpg\" style=\"width:300px; height:250px; display:none\">
		  			</div></div>";

						echo "<div class=\"grid-item-artikel-ondertitel\"><div class=\"prijspaneel\">";
				  		if($row['IsChillerStock'] == 1){
				  			echo "<p>Gekoeld product!</p>";
				  		}
						echo "<form method='post' action='addToCart.php'>
			  					<h2>&euro;<span id='prijs'>".$row['UnitPrice']."</span></h2>
			  					<input  type=\"number\" name=\"aantal\" min=\"1\" max=\"99\" value='1' onchange='setPrice(this.value)'>
			  					<span style='display: none;' id='prijsBegin'>".$row['UnitPrice']."</span>
			  					<input type='text' style='display: none;' name='artikelID' value='".$row['StockItemID']."'>
			  					<input type=\"image\" src=\"assets/artikelpag/winkelmandjegijs.png\" style=\"width:auto; height:40px; position:relative; \" align=\"middle\" border=\"0\" alt=\"Submit\" />
			  					<p>Only ".number_format($row['QuantityOnHand'], 0, ',', '.')." left in stock!</p>
			  				</form> </div></div></div>" ;


	  			echo "<hr>
					  <!-- SlideShow Van De Afbeeldingen -->
					  <div class=\"w3-row-padding w3-section\">
					    <div class=\"w3-col s4\">
					      <img class=\"demo w3-opacity w3-hover-opacity-off\" src=\"assets/artikelpag/russianbomb1.jpg\" style=\"width:170px;height:110px;cursor:pointer\" onclick=\"currentDiv(1)\">
					    </div>
					    <div class=\"w3-col s4\">
					      <img class=\"demo w3-opacity w3-hover-opacity-off\" src=\"assets/artikelpag/russianbomb2.jpg\" style=\"width:170px;height:110px;cursor:pointer\" onclick=\"currentDiv(2)\">
					    </div>
					    <div class=\"w3-col s4\">
					      <img class=\"demo w3-opacity w3-hover-opacity-off\" src=\"assets/artikelpag/russianbomb3.jpg\" style=\"width:170px;height:110px;cursor:pointer\" onclick=\"currentDiv(3)\">
					    </div>
					  </div>";
	  		}
		} else {
		    echo "<div class='geenProducten'>Sorry er ging iets mis met het vinden van het product</div>";
		}

	}else{
		echo "<div class='geenProducten'>Sorry er ging iets mis met het vinden van het product</div>";
	}


}

// Artikelpagina random product (artikel.php)
function RandomProduct(){
    include("connect.php");
    $groupID = filter_input(INPUT_GET, 'group');
    $itemID = filter_input(INPUT_GET, 'artikel');
    $sql = "SELECT StockItemName, StockGroupID, StockItemID, Photo FROM stockitems JOIN stockitemstockgroups USING(StockItemID) WHERE StockGroupID = $groupID ORDER BY rand(), StockItemName ASC LIMIT 6";
    $resultAanbevolen = mysqli_query($connect, $sql);
    if(mysqli_num_rows($resultAanbevolen) > 0){
        while($row = mysqli_fetch_assoc($resultAanbevolen)){
            echo "<a href='artikel.php?artikel=".$row['StockItemID']."&group=".$row['StockGroupID']."'><div class=\"grid-item-artikel-voorgesteld\">";
            if($row['Photo'] != ""){
		    		echo "<img src='data:image/jpeg;base64,".base64_encode( $row['Photo'] )."'>";
		    	}else{
		    		echo "<img src='assets/geen.jpg'>";
		    	}
            echo "<p class='voorgesteldTekst'>".$row['StockItemName']."</p>

                    </div></a>";
        }
    }
}



function laadDeals(){
	include("connect.php");
	$query = "SELECT * FROM discount LEFT JOIN stockitems USING(stockItemID)";
	$resultSpecialdeal = mysqli_query($connect, $query);
    if(mysqli_num_rows($resultSpecialdeal) > 0){
        while($row = mysqli_fetch_assoc($resultSpecialdeal)){
        	$nieuwprijs = "";
           echo "<div class=\"aanbieding-product\">
				    <p style=\"float:left;\">".$row['StockItemName']."</p>
				    <p style=\"float:right\">".number_format($row['UnitPrice'] * ((100-$row['discountPercentage'])/100), 2, ',', '.')."</p>
				    <sub><p style=\"float:right;text-decoration: line-through;\">".$row['UnitPrice']."  </p></sub>
				    <p>".$row['discountPercentage']."% korting! </p>
				  </div>";
        }
    }
}




?>
