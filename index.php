<<<<<<< HEAD
<?php
  session_start();
  $productIndicator = 0;
  if(isset($_SESSION['cart'])){
    $productIndicator = array_sum($_SESSION['cart']);
  }
?>
<html>

<head>
  <title>WWI</title>
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

 <!-- Winkelwagentje + Aantal artikelen -->
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



<?php
// Laden van functies uit 'functions.php'
include("functions.php");
// Later een terugfunctie door op de geselecteerde categorie te klikken?
laadCategorie();
laadProducten();
?>



</body>

</html>
=======
<?php
  session_start();
  $productIndicator = 0;
  if(isset($_SESSION['cart'])){
    $productIndicator = array_sum($_SESSION['cart']);
  }
?>
<html>

<head>
  <title>WWI</title>
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

 <!-- Winkelwagentje + Aantal artikelen -->
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



<?php
// Laden van functies uit 'functions.php'
include("functions.php");
// Later een terugfunctie door op de geselecteerde categorie te klikken?
laadCategorie();
laadProducten();
?>



</body>

</html>
>>>>>>> d12ec5a09081db4839cbc207aed32ef4e20e890a
