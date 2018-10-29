<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Robert Hofker</title>
    <link rel="stylesheet" href="style.css">
    <?php include("check.php")?>
    <script type="javascript" rel="javascript.js"></script>


</head>
<body

        class="achtergrond">

<?php
$mail = "";

if(isset($_POST['submit'])){
    if (filter_input(INPUT_GET, "titel") == ""){
        print("<h2 class='fancy'> Titel is niet ingevuld</h2>");
    }else {
        print(filter_input(INPUT_GET, "titel"));
    }
    if (filter_input(INPUT_GET, "opmerking") == ""){
        print("<h2 class='fancy'> Opmerking is niet ingevuld</h2>");
    }else {
        print(filter_input(INPUT_GET, "opmerking"));
    }
    if (filter_input(INPUT_GET, "regisseur") == ""){
        print("<h2 class='fancy'> regisseur is niet ingevuld</h2>");
    }else {
        print(filter_input(INPUT_GET, "regisseur"));
    }
    if (filter_input(INPUT_GET, "jaar") == ""){
        print("<h2 class='fancy'>Jaar is niet ingevuld</h2>");
    }else {
        print(filter_input(INPUT_GET, "jaar"));
    }
    $mail = filter_input(INPUT_GET,"jaar");
    if (filter_input(INPUT_GET, "waardering") == ""){
        print("<h2 class='fancy'> Waardering is niet ingevuld</h2>");
    }else {
        print(filter_input(INPUT_GET, "waardering"));
    }
};
?>
<h1>Film databeesje</h1>
<form action="send.php" method="POST">

    Titel: <input type="text" name="titel" value="<?php print($titel);?>">
    <span class="error">* <?php echo $titelErr;?></span>
    <br>
    Opmerking:<textarea type="text" name="opmerking" value="<?php print($opmerking);?>"rows="5" cols="40"></textarea>
    <br>
    Regisseur: <input type="text" name="regisseur" value="<?php print($regisseur);?>">
    <span class="error">* <?php echo $regisseurErr;?></span>
    <br/>
    Jaar: <input type="number" name="jaar" min="1800" max="2300" value="<?php print($jaar);?>">
    <span class="error">* <?php echo $jaarErr;?></span>
    <br/>
    Waardering: <input type="number" name="waardering" min="0" max="10" value="<?php print($waardering);?>">
    <span class="error">* <?php echo $waarderingErr;?></span>
    <br/>

    <br>


    <button type="submit" name="submit" value="Submit">Submit</button>
</form>

<a href="filmlijst.php"><h1>Klik hier voor de lijst</h1></a>

</body>
</html>

