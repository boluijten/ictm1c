<?php
include_once ("connect.php");


$sql = "SELECT * FROM film";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Id: " . $row["id"]. "Titel: " . $row["titel"]."Opmerking: " . $row["opmerking"]."Regisseur: " . $row["regisseur"]."Jaar: " . $row["jaar"]."Waardering: " . $row["waardering"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>