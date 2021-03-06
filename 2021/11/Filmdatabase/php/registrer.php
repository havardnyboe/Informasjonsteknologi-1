<!DOCTYPE html>
<html lang="nb">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("../template/link.php") ?>
    <title>Filmdatabase - Registrer</title>
</head>

<body>
    <header>
        <?php include("../template/header.php") ?>
    </header>
    <main>

        <section class="card">
            <div>
                <h1 class="heading">Legg til innhold</h1>
                <!-- Code by w3codegenerator.com -->
                <form class="generated-form" method="POST" action="../php/registrerForm.php"
                    enctype="multipart/form-data">
                    <!-- <fieldset> -->
                    <legend><br><br>Velg medie:</legend>

                    <input type="radio" id="bok" name="medie" value="bok">
                    <label for="bok">Bok</label>

                    <input type="radio" id="film" name="medie" value="film">
                    <label for="film">Film</label>

                    <input type="radio" id="serie" name="medie" value="serie">
                    <label for="serie">Serie</label><br><br>

                    <label for="tittel">Tittel:</label><br>
                    <input type="text" id="tittel" name="tittel"><br><br>

                    <label for="forfatter">Forfatter/Regissør:</label><br>
                    <input type="text" id="forfatter" name="forfatter"><br><br>

                    <label for="utgiver">Forlag/Utgiver:</label><br>
                    <input type="text" id="utgiver" name="utgiver"><br><br>

                    <label for="bilde">Bilde:</label><br>
                    <input type="file" id="bilde" name="bilde"><br><br>

                    <label for="beskrivelse">Beskrivelse:</label><br>
                    <textarea id="beskrivelse" name="beskrivelse" rows="3" cols="30"></textarea>
                    <br><br>

                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset"><br><br>
                    <!-- </fieldset> -->
                </form>
            </div>
        </section>

    </main>
    <?php include("../template/footer.php") ?>
</body>

</html>