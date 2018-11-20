<?php
ob_start();
session_start();
include("connect.php");
include("loginFunctions.php");
?>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="style/style_main.css">
  <link rel="stylesheet" type="text/css" href="style/navbar.css">
  <link rel="stylesheet" type="text/css" href="style/style_login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
</style>

<body>


    <br>
    <br>
    <br>
    <br>
    <!-- Login form -->
    <form method="POST" >
        <h3>Login</h3>
        <input type="text" name="emailLoginTXT" placeholder="Email" required>
        <input type="password" name="passwordLoginTXT" placeholder="Password" required><br>
        <input type="submit" name="submitLoginBTN" value="Login">
    
    </form>
    <!-- Register form -->
    <form method="POST">
        <h3>Register</h3>
        <input type="text" name="voornaamRegisterTXT" placeholder="Voornaam" required>
        <input type="text" name="achternaamRegisterTXT" placeholder="Achternaam" required><br>
        <input type="email" name="emailRegisterTXT" placeholder="Email" required>
        <input type="tel" name="telnrRegisterTXT" placeholder="Phone number" required><br>
        <input type="text" name="woonplaatsRegisterTXT" placeholder="Woonplaats" required>
        <input type="text" name="straatRegisterTXT" placeholder="Straatnaam" required><br>
        <input type="text" name="huisnummerRegisterTXT" placeholder="Huisnummer (inc. toevoeging)" required>
        <input type="text" name="postcodeRegisterTXT" placeholder="Postcode" required><br>
        <input type="password" name="passwordRegisterTXT" placeholder="Wachtwoord" required>
        <input type="password" name="passwordRetypeRegisterTXT" placeholder="Controlleer wachtwoord" required><br>

        <input type="submit" name="submitRegisterBTN" value="Registreer">
    </form>



</body>
<?php  
include("header.php");
?>

</html>
