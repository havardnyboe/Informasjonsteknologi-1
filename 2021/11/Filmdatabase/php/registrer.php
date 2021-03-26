<?php

// Legger inn verdier fra skjema i variabler
$medie = $_POST["medie"];
$tittel = $_POST["tittel"];
$forfatter = $_POST["forfatter"];
$utgiver = $_POST["utgiver"];
$beskrivelse = $_POST["beskrivelse"];

// echo $fornavn;
// echo "<br>";
// echo $telefon;
// echo "<br>";

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
$sql = "INSERT INTO medie_tabell(tittel, skaper, utgiver, beskrivelse, medie_type) VALUES ('$tittel', '$forfatter', '$utgiver', '$beskrivelse', '$medie')";

if ($conn->query($sql) === TRUE) {
    echo "Data er lagt til!";
} else {
    echo "Noe gikk galt: " . $sql . "<br>" . $conn->error;
}

// Lukker tilkobling
$conn->close();

?>