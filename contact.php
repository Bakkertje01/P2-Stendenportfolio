<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php

include 'hidden.header.php';
include 'hidden.menu.php';

?>


<div class="jumbotron">

    <div class="container text-center">
        <h2>Contact</h2>
        <?php

        //Variabelen aanmaken die later worden gebruikt voor het invullen van de values en errors
        $voornaam = "";
        $achternaam = "";
        $email = "";
        $onderwerp = "";
        $bericht = "";

        $statusBootstrap = "";

        $errVoornaam = "";
        $errAchternaam = "";
        $errBericht = "";
        $errOnderwerp = "";
        $emailErr = "";


        if (isset($_POST["submit"])) {



            //Variabelen zetten naar de ingevoerde waarden om de ingevoerde waarden te laten staan.
            $voornaam = $_POST['firstname'];
            $achternaam = $_POST['lastname'];
            $email = $_POST['email'];
            $onderwerp = $_POST['onderwerp'];
            $bericht = $_POST['subject'];
            $datum = date('y-m-d');


            //Kijken of er wel/geen lege velden zijn en foutmeldingen aanmaken
            if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))) {

                echo "<div class='correctText'>Alle velden zijn correct ingevuld </div>";

                //Connectie maken met DB en testen
                    $DBConnect = mysqli_connect("localhost", "root", "");
                    if ($DBConnect === FALSE) {
                        echo "<p>Unable to connect to the database server.</p>"
                            . "<p>Error code " . mysqli_errno() . ": " . mysqli_error()
                            . "</p>";
                    } else {
                        //Kijken of database 'bugReports' al bestaat en anders een nieuwe aanmaken.
                        $DBName = "portfolio";

                        mysqli_select_db($DBConnect, $DBName);

                        //Dit is voor het testen
                        //echo "<h1>Datbase connectie is gelukt! </h1>";

                        //
                        $TableName = "contact";
                        $SQLstring = "SHOW TABLES LIKE '$TableName'";
                        $QueryResult = mysqli_query($DBConnect, $SQLstring);


                        $SQLstring2 = "INSERT INTO $TableName VALUES(NULL,'$voornaam', '$achternaam', '$email', '$onderwerp', '$bericht', '$datum')";
                        $QueryResult2 = mysqli_query($DBConnect, $SQLstring2);
                        if ($QueryResult2 === FALSE) {
                            echo "<p>Unable to execute the query.</p>"
                                . "<p>Error code " . mysqli_errno($DBConnect)
                                . ": " . mysqli_error($DBConnect) . "</p>";
                        } else {


                            echo "<h2>Bedankt voor uw bericht!</h2>";
                        }
                        mysqli_close($DBConnect);
                    }



            } else {


                if (empty($_POST["firstname"])) {
                    $errVoornaam = "<div class='errorText'>&emsp; Voornaam is verplicht</div>";
                }

                if (empty($_POST["lastname"])) {
                    $errAchternaam = "<div class='errorText'>&emsp; Achternaam is verplicht</div>";
                }

                if (empty($_POST["subject"])) {
                    $errBericht = "<div class='errorText'>&emsp; Een bericht is verplicht</div>";
                }

                if (empty($_POST["onderwerp"])) {
                    $errOnderwerp = "<div class='errorText'>&emsp; Een onderwerp is verplicht</div>";
                }

                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "<div class='errorText'>&emsp; Vul een geldig e-mailadres in.</div>";
                }
            }
        }


        ?>

        <form id="contactFormulier" action="contact.php" method="POST">


            <label for="fname">Voornaam</label>
            <?php echo $errVoornaam; ?>
            <input type="text" id="fname" name="firstname" placeholder="Uw voornaam.." value="<?php echo $voornaam; ?>">


            <label for="lname">Achternaam</label>
            <?php echo $errAchternaam; ?>
            <input type="text" id="lname" name="lastname" placeholder="Uw achternaam.." value="<?php echo $achternaam; ?>">

            <label for="email">E-mail adres</label>
            <?php echo $emailErr; ?>
            <input type="text" id="email" name="email" placeholder="Uw e-mail adres.." value="<?php echo $email; ?>">

            <label for="onderwerp">Onderwerp</label>
            <?php echo $errOnderwerp; ?>
            <input type="text" id="onderwerp" name="onderwerp" placeholder="Het onderwerp.." value="<?php echo $onderwerp; ?>">

            <label for="subject">Bericht</label>
            <?php echo $errBericht; ?>
            <textarea class="inputForm" id="subject" name="subject" placeholder="Typ hier..." style="height:200px"><?php echo $bericht; ?></textarea>

            <input type="submit" name="submit" value="Verzenden">

        </form>
    </div>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
