<html>

<head>
  <link rel="stylesheet" type="text/css" href="style/style_main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
</style>

<body>
  <!-- Top Navigatie Balk -->
  <div class="navbar">

 <img style="width:auto; height:80px;" src="assets/logo.png">
  <a href="#contact"><img style="width:auto; height:30px;" src="assets/winkelmandje.png"></a>
  <a href="#news">Inloggen</a>

    <!-- De zoekbalk-->
  <div class="search-container">
  <form action="action_search.php" method="POST">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit"><i style="height:25px; width:auto;"class="fa fa-search"></i></button>
  </form>
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
