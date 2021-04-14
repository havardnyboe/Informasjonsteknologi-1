<!DOCTYPE html>
<html lang="nb">

<head>
    <!-- 
------------------------------------------------
                             /`*_
                            /    `-_
                 _.,  _.   /        `-_
             _,-` __`-_ `-/            `-_
          ,-  .,~`  /  `-/               .`
         :_ -`     "    /`-@             /
                  /`\  ;    `-_         /
               |-`.. `-\  |    `-_     / `-_
            _-`  `_.`\  `-_ |;\   @-_ / `-_/
           -  .__.,,;___o  `-_|      /`-__-_
          - 1`-_ .~--` _~` o   `-_   ;   `   -
        .`Q W 2 `-_ `,`. /- - o   `-_\  `     `
       - A S  E  3 `-_  . / .|   _ ..`-_;     :
    _-` Z X  D F R T 4`-_  ;  ;   `_ `_-`.-_,`
 .-`--_     C   G   Y  5 `-_ i    _-`    ;
:  `-_//`-_   V  H J U I 6  `-_.-`       *
-_    `-_  `-_    B N K L O 7 -          :
  `-_    `-_  `-_    M . ; P .`      es  ;
     `-_    `-_  `-_     ,  -           _`
        `-_    `-_ /     -`         _-`
           `-_    `-_/-_`        _-`
              `-_    `-.      _-`
                 `-_   .   .-`
                    `-_:_-`  
                       `
------------------------------------------------
    -->
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
            <div id="innledning">
                <h1 class="heading">Velkommen til !IMDb</h1>
                <p>
                    Her kan du legge til dine favoritt bøker, filmer og tv-serier. Fyll inn informasjon på 'Legg til'
                    siden, last opp et bilde av boken, filmen eller serien og send inn skjemaet. Du kan finne de
                    forskjellige mediene under de ulike kategoriene i menyen, søke i søkefeltet, eller finne et
                    tilfeldig valgt medie fra utvalget
                    under.
                </p>
            </div>
        </section>
        <div class="randomFrontPage">
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
            $sql = "SELECT tittel, bilde_navn FROM medie_tabell ORDER BY RAND() LIMIT 6"; // Henter en tilfeldig rad fra databasen
            $resultat = $conn->query($sql);
            if ($resultat->num_rows > 0) {
              while ($rad = $resultat->fetch_assoc()) {
                echo 
                "<section id='frontPage'>" .
                "<img src='../img/" . $rad["bilde_navn"] . "' alt='" . $rad["tittel"] . "'><br><br>" .
                "<em>" . $rad["tittel"] . "</em>" .
                "</section>"; //ikke linjeskift i denne echo-en!
              }
            } else {
                echo "Databasen er tom!";
            }
            // Lukker tilkobling
            $conn->close();

      ?>
        </div>

    </main>
    <?php include("../template/footer.php") ?>
</body>

</html>