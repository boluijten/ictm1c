<html>

<head>
<<<<<<< HEAD
<<<<<<< HEAD
    <meta charset="utf-8">
<<<<<<< HEAD
    <title>Gerlof</title>
=======
    <title>robert</title>
>>>>>>> 8fe44de6def91ca2de5b7ebfad422cf69aa49abe
    <link rel="stylesheet" href="style.css">
    <?php include("check.php")?>
    <script type="javascript" rel="javascript.js"></script>


=======
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
>>>>>>> dff5a95fe9c423ae8b6528e6209d1f7d5887ece2
=======
  <link rel="stylesheet" type="text/css" href="style/style_main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
>>>>>>> 775a9be2438f6855ba04d214ae3bb382d41e53c0
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
