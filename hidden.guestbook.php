<div class="jumbotron">
    <div class="container text-center">
        <h2>Plaats een bericht!</h2>
        <form class="form-style" method="POST" >
            <ul>
                <li>
                    <label for="bericht">Bericht</label>
                    <textarea cols="50" name="bericht" rows="5"> </textarea>
                    <span>Vertel het eens!</span>
                </li>
                <li>
                    <input name="submit" value="submit" type="submit">
                    <input type="submit" name="reset" value="Reset">
                </li>
            </ul>
        </form>

        <?php

        if(!isset($studentnr)){
            $studentnr = $_SESSION["Gebruiker_ID"];
        }

        //$host = "127.0.0.1:8889"; //host, meestal localhost
        //$user = "root"; //user die op DB connecteert
        //$pass = ""; //Password van de user die op DB connecteert
        //$dbname = "portfolio"; //Naam Database
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if (mysqli_connect_errno($connection)) // connectie maken met de database
        {
            echo "Connectie Database mislukt: " . mysqli_connect_error();
        }
        if (isset($_SESSION['Gebruiker_ID']) && $_SESSION['Gebruiker_ID'] == true) // is de gebruiker ingelogd?
        {
            echo "Welkom op de pagina";
        } else
        {
            echo "Je moet inloggen voor je een bericht kunt plaatsen.";
        }

        if (isset($_POST['submit'])){
            $bericht = mysqli_escape_string($connection, htmlspecialchars($_POST["bericht"])); // haal uit bericht
            $gebruiker_id = $_SESSION['Gebruiker_ID'];
            $date = date('Y:m:d:H:i');
            $sql = "INSERT INTO bericht(`Bericht`, `Gebruiker_ID`, `Datum_tijd`, `Portfolio_ID`) VALUES('$bericht', $gebruiker_id, '$date', '$studentnr')"; // haal uit bericht en zet in de database
            if (!mysqli_query($connection, $sql))
            {
                mysqli_close($connection);
                die('Error: ' . mysqli_error($connection)); //  indien het niet lukt het in de database toe te voegen
            }
        }

        $result = mysqli_query($connection, "SELECT `Voornaam` ,`Bericht` FROM `Bericht` INNER JOIN `user` ON Bericht.Gebruiker_ID = user.Gebruiker_ID WHERE Portfolio_ID = " . $studentnr); // haal uit de database //AANVULLEN JOIN ON user.id = bericht.userid


        if (mysqli_num_rows($result) == 0) // staat er al iets in
        { // gastenboek is nog leeg
            echo 'Schrijf als eerste in het gastenboek!';
        } else
        {

        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <div class="velden"> <!-- voor styling van alle echo's; zie CSS -->
            <div class="header"><br>
                <div class="Voornaam"><?php echo ($row['Voornaam']); ?></div> <!-- echo bericht-->
                <div class="Bericht"><?php echo ($row['Bericht']); ?></div> <!-- echo bericht-->
            </div>
            <?php } ?>
            <?php
            }
            mysqli_close($connection); // sluit connectie
            ?>
        </div>
    </div>
    </body>
    <style>
        /*form-style is de formulier class*/
        .Voornaam{
            border: solid 1px #707070;
            box-shadow: 0 0 5px 1px #969696;
            padding: 10px;
            border: solid 1px #dcdcdc;
            background-color: #cccccc;
        }
        .Bericht{
            border: solid 1px #707070;
            box-shadow: 0 0 5px 1px #969696;
            padding: 10px;
            border: solid 1px #dcdcdc;
        }
        .form-style{ /*balkbreedte en het font*/
            max-width:400px;
            margin:50px auto;
            padding:20px;
            font-family: Georgia, "Times New Roman", Times, serif;
        }
        .form-style ul{ /*puntjes van de lijst verwijderen*/
            list-style:none;
            padding:0;
            margin:0;
        }
        .form-style li{ /*afstand tussen de balkjes creeren en een border om de invoervelden*/
            padding: 9px;
            border:1px solid #DDDDDD;
            margin-bottom: 30px;
        }
        .form-style li:last-child{ /*border verwijderen om de reset en verzend knop*/
            border:none;
        }
        .form-style li > label{ /*de labels stylen*/
            margin-top: -19px;
            padding: 2px 5px 2px 5px;
            color: #B9B9B9;
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .form-style input[type="voornaam"]{
            border: 1px solid black;

        }/*invoervelden*/
        .form-style input[type="achternaam"]{}
        .form-style input[type="email"],
        .form-style textarea,
        .form-style select
        {
            width: 100%;
            display: block;
            border: none;
            line-height: 25px;
            font-size: 16px;
            font-family: Georgia, "Times New Roman", Times, serif;

        }
        .form-style li > span{  /*de tekst onderin de invoervelden*/
            background: #F3F3F3;
            display: block;
            padding: 3px;
            margin: 0 -9px -9px -9px;
            text-align: center;
            color: #C0C0C0;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;

        }
        .form-style textarea{ /*textarea een vast grootte geven kan niet groter dan de pagina worden gemaakt*/
            resize:none;
        }
        .form-style input[type="submit"], /*stijl van de buttons*/
        .form-style input[type="reset"]{
            background: #2471FF;
            border: none;
            padding: 10px 20px 10px 20px;
            border-bottom: 3px solid #5994FF;
            border-radius: 3px;
            color: #D2E2FF;
        }
    </style>
    </html>
