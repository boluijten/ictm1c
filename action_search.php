<?php
session_start();
ob_start();
$productIndicator = 0;
  if(isset($_SESSION['cart'])){
    $productIndicator = array_sum($_SESSION['cart']);
  }


?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style/style_main.css">
  <link rel="stylesheet" type="text/css" href="style/navbar.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
</style>


<body>
  <!-- Top Navigatie Balk -->
  <div class="navbar">
 <a href="index.php"><img style="width:auto; height:80px;" src="assets/logo.png"></a>

  <div class = navbar-text>
    <a href="winkelwagen.php"><img style="width:auto; height:25px;" src="assets/winkelmandje.png"><span class="badge"><?php echo $productIndicator; ?></span></a></li></a>
</div>
  <div class = navbar-text>
  <a style="text-decoration: none;" href="#news">Inloggen</a>
</div>

    <!-- De zoekbalk-->
  <div class = navbar-text>
  <div class="search-container">
  <form action="action_search.php" method="POST">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit"><i style="height:25px; width:auto;"class="fa fa-search"></i></button>
  </form>
  </div>
</div>
</div>



<div class="sorteerkolom">
Sorteren op:
<?php $zoekterm = filter_input(INPUT_POST, 'search'); ?>

  <form method='GET' action="action_search.php">
<select name="sorteer">
  <option value="Naam_a>z">Naam A-Z</option>
  <option value="Naam_z>a">Naam Z-A</option>
  <option value="Prijs_hoog>laag">Prijs hoog-laag</option>
  <option value="Prijs_laag>hoog">Prijs laag-hoog</option>
</select>
<br><br>
<input type="submit" value="sorteer">
</form>
</div>

<?php

include("functions.php");
zoekProduct();
sorteerProducten();



?>



</body>

</html>
