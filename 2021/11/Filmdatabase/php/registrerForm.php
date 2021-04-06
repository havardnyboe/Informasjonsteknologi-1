<?php

// Legger inn verdier fra skjema i variabler
$medie = $_POST["medie"];
$tittel = $_POST["tittel"];
$forfatter = $_POST["forfatter"];
$utgiver = $_POST["utgiver"];
$beskrivelse = $_POST["beskrivelse"];

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

# bildeopplasting
$bilde = $_FILES["bilde"]; 
# Henter diverse info fra bildet
$bildeNavn = $_FILES['bilde']['name'];
$bildeTmpDest = $_FILES['bilde']['tmp_name'];
$bildeSize = $_FILES['bilde']['size'];
$bildeError = $_FILES['bilde']['error'];
$bildeType = $_FILES['bilde']['type'];
# Henter endelsen til bildet
$bildeSplit = explode('.', $bildeNavn);
$bildeExt = strtolower(end($bildeSplit));

$allowed = array('jpg', 'jpeg', 'gif', 'png');

if (in_array($bildeExt, $allowed)) {
    if ($bildeError === 0) {
        $bildeDest = '../img/'.$bildeNavn;
        if (move_uploaded_file($bildeTmpDest, $bildeDest)) {
            echo "Bildet er lastet opp!"."<br><br>";
        } else {
            echo "Bildet ble ikke lastet opp :("."<br><br>";
        }
    } else {
        echo "Noe gikk galt når du lastet opp filen"."<br><br>";
    }
} else {
    echo "Filtypen er ikke tillat"."<br><br>";
}

// Lager SQL-spørring og kjører denne
// Legger data inn i databasen
$sql = "INSERT INTO medie_tabell(tittel, skaper, utgiver, beskrivelse, bilde_navn, medie_type) VALUES ('$tittel', '$forfatter', '$utgiver', '$beskrivelse', '$bildeNavn', '$medie')";

if ($conn->query($sql) === TRUE) {
    echo "Data er lagt til!"."<br><br>";
} else {
    echo "Noe gikk galt: " . $sql . "<br>" . $conn->error;
}

// Lukker tilkobling
$conn->close();

header( "refresh:5;url=https://webkode.skit.no/~haa0110/filmdatabase/index.php" );
echo "Går tilbake til siden om 5 sekunder"."<br><br>"

?>