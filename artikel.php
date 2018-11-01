<html>

<head>
  <link rel="stylesheet" type="text/css" href="style/style_art.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
/* De Horizontale Lijn Blauw Maken*/
hr {

    border-width: 2px;
    border-top: 1px solid rgba(0, 174, 239, 0.8);
}
</style>

<body>
  <!-- Top Navigatie Balk -->
  <div class="navbar">

  <href="index.html"><img style="width:auto; height:80px;" src="assets/logo.png">
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

<!-- De Div Waarin Het Product Zit -->
<!-- De container van de hele pagina-->
<div class="grid-container-artikelpagina">
  <!--Item in de container van de hele pagina -->
<div class="grid-item-artikelpagina">
  <!--Container van het artikel zelf. -->
<div class="grid-container-artikel">
  <!-- Item van het artikel zelf.-->
  <div class="grid-item-artikel">
    
<?php
include("functions.php");
laadProductPagina();
?>

</div>
</div>
</div>
<!-- Script Voor Image Slider -->
<script>
function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}


</script>

  <div class="grid-item-artikelpagina">
<!-- Voorgestelde Producten Rechts -->
<div class="grid-container-voorgesteld">
<!-- Voorgestelde Producten -->
<div class="grid-item-Voorgesteldeproducten">
<h2>Voorgestelde Producten:</h2>

</div>

    <?php
    function RandomProduct(){
        include("connect.php");
        $itemID = filter_input(INPUT_GET, 'artikel');
        $sql = "SELECT StockItemName FROM stockitems JOIN stockitemstockgroups USING(StockItemID) WHERE StockGroupID = '$itemID' ORDER BY rand(), StockItemName ASC LIMIT 6";
        $resultAanbevolen = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultAanbevolen) > 0){
            while($row = mysqli_fetch_assoc($resultAanbevolen)){
                echo "<div class=\"grid-item-artikel\">
                          <p>".$row['StockItemName']."</p>
                        </div>";
            }
        }
    }
    RandomProduct();
    ?>


</div>
</div>
</div>


</body>

</html>
