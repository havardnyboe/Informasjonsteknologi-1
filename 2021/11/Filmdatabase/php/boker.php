<!DOCTYPE html>
<html lang="nb">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("../template/link.php") ?>
    <title>Filmdatabase - Bøker</title>
</head>

<script>

</script>

<body>
    <header>
        <?php include("../template/header.php") ?>
    </header>
    <main>

        <section class="card">
            <h1 class="heading">Bøker</h1>
        </section>
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

            echo "<br>";

            $sql = "SELECT bilde_navn, tittel, skaper, utgiver, beskrivelse FROM medie_tabell WHERE medie_type='bok'"; // Tilpass

            $resultat = $conn->query($sql);

            if ($resultat->num_rows > 0) {
                // Utskrift av hver enkelt rad
                while($rad = $resultat->fetch_assoc()) {
                    echo 
                        "<section class='card'>" .
                        "<div><img src='../img/" . $rad["bilde_navn"] . "' alt='" . $rad["tittel"] . "'></div>" .
                        "<div class='card-text' ><h2 style='width: 100%; margin-bottom: 6px;'>" . $rad["tittel"] . "</h2>" .
                        "<span><u>Forfatter:</u> <br>" . $rad["skaper"] . "</span>" .
                        "<span><u>Utgiver:</u> <br>" . $rad["utgiver"] . "</span>" . 
                        "<span><u>Beskrivelse:</u> <br>" . $rad["beskrivelse"] . 
                        "</span></div></section>"; //ikke linjeskift i denne echo-en!
                }
            } else {
                echo "Databasen er tom!";
            }

            // Lukker tilkobling
            $conn->close();

            ?>
        <section>
        </section>

    </main>
    <?php include("../template/footer.php") ?>
</body>

</html>