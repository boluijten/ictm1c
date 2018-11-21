<?php
ob_start();
include("functions.php");

?>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="style/style_art.css">
  <link rel="stylesheet" type="text/css" href="style/navbar.css">
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

<body onload="currentDiv(1)">

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

function setPrice(aantal){
  var prijs = parseFloat(document.getElementById('prijsBegin').innerHTML);
  var nieuwePrijs = aantal * prijs;
  var nieuwePrijsRound = nieuwePrijs.toFixed(2);
  document.getElementById("prijs").innerHTML = nieuwePrijsRound;

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
      RandomProduct();
    ?>


</div>
</div>
</div>

<?php

include("header.php");

?>
</body>

</html>
