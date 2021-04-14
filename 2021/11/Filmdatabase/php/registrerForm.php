<!DOCTYPE html>
<html lang="nb">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <?php include("../template/link.php") ?>
    <title>Filmdatabase - Hjem</title>
</head>

<body>
    <header>
        <?php include("../template/header.php") ?>
    </header>
    <main>
        <section class="card">
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

            if (in_array($bildeExt, $allowed)) { // Sjekker om filtypen er en tillat type
                if ($bildeError === 0) {
                    $bildeDest = '../img/'.$bildeNavn;
                    if (move_uploaded_file($bildeTmpDest, $bildeDest)) { // Laster bilde-filen opp på serveren
                        echo "<br><br><br><br><br>"."Bildet er lastet opp!"."<br><br>";
                    } else {
                        echo "<br><br><br><br><br>"."Bildet ble ikke lastet opp :("."<br><br>";
                    }
                } else {
                    echo "Noe gikk galt når du lastet opp filen"."<br><br>";
                }
            } else {
                echo "Filtypen er ikke tillat"."<br><br>";
            }

            // Lager parameterisert SQL-spørring for å forhindre sql-injeksjon (forhindre at apostrof bryter spørringen)
            $stmt = $conn->prepare("INSERT INTO medie_tabell(tittel, skaper, utgiver, beskrivelse, bilde_navn, medie_type) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $tittel, $forfatter, $utgiver, $beskrivelse, $bildeNavn, $medie);
            
            // Legger inn verdier fra skjema i variabler
            $medie = $_POST["medie"];
            $tittel = $_POST["tittel"];
            $forfatter = $_POST["forfatter"];
            $beskrivelse = $_POST["beskrivelse"];
            $utgiver = $_POST["utgiver"];
            
            // Legger data inn i databasen og kjører SQl-spørring
            if ($conn->query($stmt->execute())) {
                echo "";
            }
            else { 
                echo "Data er lagt til!"."<br><br>";
                // echo "Noe gikk galt: " . "<br>" . $conn->error;
            }

            // Lukker tilkobling
            $conn->close();

            ?>
        </section>
    </main>
    <?php include("../template/footer.php") ?>
</body>

</html>