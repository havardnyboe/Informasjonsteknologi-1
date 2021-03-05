<?php

// Informasjon for å koble til databasen
$servername="localhost";
$username="haa0110";
$password= "haa0";
$dbname ="haa0110";

// Kobler til databasen
$conn = new mysqli($servername, $username, $password, $dbname);
// Sjekker om tilkobling er ok
if ($conn->connect_error) {
    die("Feil i tilkobling: " . $conn->connect_error);
}

// Henter data ut fra databasen
echo "-------- Utskrift av DB ----------<br>";
$sql = "SELECT navn, kommentar FROM person"; // Tilpass
$resultat = $conn->query($sql);
if ($resultat->num_rows > 0) {
    // Utskrift av hver enkelt rad
    while($rad = $resultat->fetch_assoc()) {
    echo  "Navn: " . $rad["navn"] . "<br>Kommentar:  " . $rad["kommentar"] . "<br>"; //ikke linjeskift i denne echo-en!
}
} else {
    echo "Databasen er tom!";
}

// Lukker tilkobling
$conn->close();
?>