<?php
session_start();

$productIndicator = 0;
if(isset($_SESSION['cart'])){
	$productIndicator = array_sum($_SESSION['cart']);
}

echo "
<!-- Top Navigatie Balk -->
  <div class=\"navbar\">
 <a href=\"index.php\"><img style=\"width:auto; height:80px;\" src=\"assets/logo.png\"></a>

 <!-- Winkelwagentje + Aantal artikelen -->
  <div class = navbar-text>
  <a href=\"winkelwagen.php\"><img style=\"width:auto; height:25px;\" src=\"assets/winkelmandje.png\"><span class=\"badge\">$productIndicator</span></a></li></a>
</div>
  <div class = navbar-text>
  <a style=\"text-decoration: none;\" href=\"#news\">Inloggen</a>
</div>

    <!-- De zoekbalk-->
  <div class = navbar-text>
  <div class=\"search-container\">
  <form action=\"action_search.php\" method=\"GET\">
    <input type=\"text\" placeholder=\"Search..\" name=\"search\">
    <button type=\"submit\"><i style=\"height:25px; width:auto;\" class=\"fa fa-search\"></i></button>
  </form>
  </div>
</div>
</div>



";

?>