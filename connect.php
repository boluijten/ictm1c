<?php
$servername = "localhost";
$username = "boluijten_com_database1";
$password = "XkWZ4ZK63ykj";
$dbname = "boluijten_com_database1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
Sjoerd heeft hem aangepast!
