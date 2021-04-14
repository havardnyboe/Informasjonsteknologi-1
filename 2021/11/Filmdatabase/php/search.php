<!DOCTYPE html>
<html lang="nb">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../template/link.php") ?>
    <title>Filmdatabase - Søk</title>
</head>

<body>
    <header>
        <?php include("../template/header.php") ?>
    </header>
    <main>
        <section class="card">
            <h1 class="heading">Søkeresultater</h1>
        </section><br>
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
            
            $search = mysqli_real_escape_string($conn, $_POST['searchBox']); // Forhindrer at søket inneholder sql-kode
            // Lager spørring som sjekker om søket liker noe i databasen
            $sql = ("SELECT * FROM medie_tabell WHERE tittel LIKE '%$search%' OR skaper LIKE '%$search%' OR utgiver LIKE '%$search%' OR medie_type LIKE '%$search%'");
            
            $resultat = $conn->query($sql);
            $queryResultat = mysqli_num_rows($resultat);

            echo "<span id='searchResult'>Søket ga " .$queryResultat. " resultat(er)</span>";

            if ($queryResultat > 0) {
                while ($rad = mysqli_fetch_assoc($resultat)) {
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
                echo "Fant ingen resultater som likner søket.";
            }

            $conn->close();

        ?>
    </main>
    <footer>
        <?php include("../template/footer.php") ?>
    </footer>
</body>

</html>