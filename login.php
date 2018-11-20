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
    <form method="POST" >
        <h2><b><pre>Inloggen</pre></b></h2>
            <table>
                <tr>
                    <td align = "left"><pre>    Gebruikersnaam: </pre></td>
                    <td align = "left"><input type = "text" name = "usernameLoginTXT" /></td>
                </tr>
                <tr>
                    <td align = "left"><pre>    Wachtwoord: </pre></td>
                    <td align = "left"><input type = "password" name = "passwordLoginTXT" /></td>
                </tr>
                <tr>
                <td align = "right"><pre>    <input type = "submit" value = "Inloggen en verder gaan" name="submitLoginBTN"></pre></td>
                </tr>
            </table>
        </form>
      <p><b><pre> Of:</pre></b></p>
    <h2><b><pre> Gegevens invoeren: </pre></b></h2>
      <form method="POST">
        <table>
            <tr>
                <td align = "left"><pre>    Voornaam: </pre></td>
                <td align = "left"><input type = "text" name = "voornaam" /></td>
                <td align = "left"><pre>    Achternaam: </pre></td>
                <td align = "left"><input type = "text" name = "achternaam" /></td>
            </tr>
            <tr>
                <td align = "left"><pre>    Emailadres: </pre></td>
                <td align = "left"><input type = "text" name = "emailadres" /></td>
                <td align = "left"><pre>    Telefoonnummer: </pre></td>
                <td align = "left"><input type = "text" name = "telefoonnummer" /></td>
            </tr>
            <tr>
                <td align = "left"><pre>    Woonplaats: </pre></td>
                <td align = "left"><input type = "text" name = "woonplaats"/></td>
                <td align = "left"><pre>    Straatnaam: </pre></td>
                <td align = "left"><input type = "text" name = "straatnaam"/></td>
            </tr>
            <tr>
                <td align = "left"><pre>    Huisnummer: </pre></td>
                <td align = "left"><input type = "text" name = "huisnummer"/></td>
                <td align = "left"><pre>    postcode: </pre></td>
                <td align = "left"><input type = "text" name = "postcode"/></td>
            </tr>
            <tr>
                <td align = "right"><pre>    <input type = "submit" value = "Verder gaan"></pre></td>
            </tr>
            <td align = "left"><pre>    <button type = "button">Terug</button></pre></td>
    </table>
</form>



</body>
<?php  
include("header.php");
?>

</html>
