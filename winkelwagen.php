<?php
session_start();
$productIndicator = 0;
  if(isset($_SESSION['cart'])){
    $productIndicator = array_sum($_SESSION['cart']);
  }
//
?>
<html>

<head>
  <title>WWI</title>
  <link rel="stylesheet" type="text/css" href="style/style_winkelwagen.css">
  <link rel="stylesheet" type="text/css" href="style/navbar.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
</head>

<style>
hr {

    border-width: 2px;
    border-top: 1px solid rgba(0, 174, 239, 0.8);
}
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

<!--De WinkelWagen -->
<!-- Tekst boven winkelvak-->
<h2 style="margin-top: 20vh; width:100vw; text-align: center;">Winkelmandje:</h2>
<!-- Winkelvak Zelf-->
<div class="winkelvak">
<div class="winkelvak2">
<!-- 1 Item in het winkelvak-->

<?php

  function verkrijgWinkelwagen(){
    if(isset($_SESSION['cart'])){
      $cart = $_SESSION['cart'];
      foreach ($cart as $itemID => $aantal) {
          include("connect.php");
          $sql = "SELECT * FROM stockitems WHERE StockItemID = $itemID";
          $resultGetInfo = mysqli_query($connect, $sql);
          if(mysqli_num_rows($resultGetInfo) > 0){
            while($row = mysqli_fetch_assoc($resultGetInfo)){
                echo "<div class=\"winkelvak-item\">
                <form>
                <!-- Text -->
                ".$row['StockItemName']."  - &euro;".$row['UnitPrice']." - &euro;". number_format($row['UnitPrice'] * $aantal, 2, ',', ' ')."
                <!-- De delete button -->
                <button type=\"submit\" value=\"Submit\" id=\"submitButton\" style=\"float:right; height:28px;\" />
                  <i class=\"fas fa-trash-alt\"></i>
                </button>
                <!--Aantal -->
                <input type=\"number\" name=\"aantal_".$itemID."\" min=\"1\" max=\"99\" value=\"".$aantal."\" maxlength=\"4\" size=\"4\" style=\"float: right;\"/>
                </form>
                <!-- Blauwe Streep eronder -->
                <hr>
                </div>";
            }
          }
      }
    }else{
      echo "Nog geen artikelen in het winkelmandje!";
    }
  }


  function totaalPrijs(){
    $totaalprijs = 0;
    if(isset($_SESSION['cart'])){
      $cart = $_SESSION['cart'];
      foreach ($cart as $itemID => $aantal) {
          include("connect.php");
          $sql = "SELECT UnitPrice FROM stockitems WHERE StockItemID = $itemID";
          $resultGetInfo = mysqli_query($connect, $sql);
          if(mysqli_num_rows($resultGetInfo) > 0){
            while($row = mysqli_fetch_assoc($resultGetInfo)){
                $totaalprijs += $row['UnitPrice'] * $aantal;
            }
          }
      }
      
    }else{
      $totaalprijs = 0.00;
    }
    return number_format($totaalprijs, 2, ',', ' ');
  }
  

  
  verkrijgWinkelwagen();
?>









</div>
<div class="winkelvak-samenvatting">
<p style="font-size: 15px;margin-top:0; padding-left: 5px;float:left; position:relative;">totale prijs: <?php echo "&euro;".totaalPrijs(); ?></p>
<p style="font-size: 15px;margin-top:0; padding-right: 5px;float:right; position:relative;">totaal aantal: <?php echo $productIndicator; ?></p>
</div>
</div>
<!-- De Knop om verder te gaan met winkelen -->
<div style="margin-top:.7vh;" class="winkelvak-buttons">
<button onclick="goBack()" style="float:left;"><i class="fas fa-backspace"></i> Terug gaan</button>

<!-- De Knop om verder te gaan naar afrekenpagina -->
<button onclick="location.href='afrekenen.php';"   style="float:right;"><i class="fas fa-forward"></i> Afrekenen</button>
</div>
<script>
function goBack() {
    window.history.back();
}
</script>


</body>

</html>
