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

 <!-- Uitgelichte Producten -->
<div class="grid-container2">
<div class="uitgelichteproducten">
  <p>De nieuwe website, grote aanbiedingen!</p>
  <canvas id="canvas"></canvas>
  <div class="aanbieding-product">
    <p style="float:left;">Bo</p>
    <p style="float:right">34,55</p>
    <p style="float:right;text-decoration: line-through;">49,99  </p>
    <p>test </p>
  </div>
  <div class="aanbieding-product">
    <p style="float:left;">Succes</p>
    <p style="float:right">34,55</p>
    <p style="float:right;text-decoration: line-through;">49,99  </p>
    <p>test </p>
  </div>
  <div class="aanbieding-product">
    <p style="float:left;">Met</p>
    <p style="float:right">34,55</p>
    <p style="float:right;text-decoration: line-through;">49,99  </p>
    <p>test </p>
  </div>
  <div class="aanbieding-product">
    <p style="float:left;">Aanpassen</p>
    <p style="float:right">34,55</p>
    <p style="float:right;text-decoration: line-through;">49,99  </p>
    <p>test </p>
  </div>
  <button style="float:left; margin-top:-13vh; z-index:5; position:relative;" onclick="plusDivs(-1)">&#10094;</button>
  <button style="float:right; margin-top:-13vh; z-index:5; position:relative;" onclick="plusDivs(1)">&#10095;</button>
</div>
</div>

<?php
// Laden van functies uit 'functions.php'
include("functions.php");
// Later een terugfunctie door op de geselecteerde categorie te klikken?
laadCategorie();
laadProducten();
?>

<script>
let W = window.innerWidth;
let H = window.innerHeight;
const canvas = document.getElementById("canvas");
const context = canvas.getContext("2d");
const maxConfettis = 150;
const particles = [];

const possibleColors = [
  "SlateBlue",
  "LightBlue",
  "Gray"
];

function randomFromTo(from, to) {
  return Math.floor(Math.random() * (to - from + 1) + from);
}

function confettiParticle() {
  this.x = Math.random() * W; // x
  this.y = Math.random() * H - H; // y
  this.r = randomFromTo(11, 33); // radius
  this.d = Math.random() * maxConfettis + 11;
  this.color =
    possibleColors[Math.floor(Math.random() * possibleColors.length)];
  this.tilt = Math.floor(Math.random() * 33) - 11;
  this.tiltAngleIncremental = Math.random() * 0.07 + 0.05;
  this.tiltAngle = 0;

  this.draw = function() {
    context.beginPath();
    context.lineWidth = this.r / 2;
    context.strokeStyle = this.color;
    context.moveTo(this.x + this.tilt + this.r / 3, this.y);
    context.lineTo(this.x + this.tilt, this.y + this.tilt + this.r / 5);
    return context.stroke();
  };
}

function Draw() {
  const results = [];

  // Magical recursive functional love
  requestAnimationFrame(Draw);

  context.clearRect(0, 0, W, window.innerHeight);

  for (var i = 0; i < maxConfettis; i++) {
    results.push(particles[i].draw());
  }

  let particle = {};
  let remainingFlakes = 0;
  for (var i = 0; i < maxConfettis; i++) {
    particle = particles[i];

    particle.tiltAngle += particle.tiltAngleIncremental;
    particle.y += (Math.cos(particle.d) + 3 + particle.r / 2) / 2;
    particle.tilt = Math.sin(particle.tiltAngle - i / 3) * 15;

    if (particle.y <= H) remainingFlakes++;

    // If a confetti has fluttered out of view,
    // bring it back to above the viewport and let if re-fall.
    if (particle.x > W + 30 || particle.x < -30 || particle.y > H) {
      particle.x = Math.random() * W;
      particle.y = -30;
      particle.tilt = Math.floor(Math.random() * 10) - 20;
    }
  }

  return results;
}

window.addEventListener(
  "resize",
  function() {
    W = window.innerWidth;
    H = window.innerHeight;
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  },
  false
);

// Push new confetti objects to `particles[]`
for (var i = 0; i < maxConfettis; i++) {
  particles.push(new confettiParticle());
}

// Initialize
canvas.width = W;
canvas.height = H;
Draw();

</script>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("aanbieding-product");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>


</body>

</html>
