<?php

// Legger inn verdier fra skjema i variabler
$navn = $_POST["navn"];
$kommentar = $_POST["kommentar"];
echo $navn;
echo "<br>";
echo $kommentar;
echo "<br>";

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

// Lager SQL-spørring og kjører denne
// Legger data inn i databasen
$sql = "INSERT INTO person(navn, kommentar) VALUES ('$navn', '$kommentar')";
if ($conn->query($sql) === TRUE) {
echo "Data er lagt til! <br>";
} else {
echo "Noe gikk galt: " . $sql . "<br>" . $conn->error;
}

// Lukker tilkobling
$conn->close();
?>