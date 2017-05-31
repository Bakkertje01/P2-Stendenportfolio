<html>

<head>
    <link rel="icon" type="image/png" href="fav.png"/>
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
        $voornaam = "";
        $achternaam = "";
        $email = "";
        $bericht = "";

        $errVoornaam = "";
        $errAchternaam = "";
        $errBericht = "";
        $emailErr = "";

        if(isset($_POST['submit'])){
            $voornaam = $_POST['firstname'];
            $achternaam = $_POST['lastname'];
            $email = $_POST['email'];
            $bericht = $_POST['subject'];

        }

        if (isset($_POST["submit"])) {


            if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))) {
                echo "<div class='correctText'>Alle velden zijn ingevuld </div>";



            } else {

                if(empty($_POST["firstname"])){
                    $errVoornaam =  "<div class='errorText'>&emsp; Voornaam is verplicht</div>";
                }

                if(empty($_POST["lastname"])){
                    $errAchternaam =  "<div class='errorText'>&emsp; Achternaam is verplicht</div>";
                }

                if(empty($_POST["subject"])) {
                    $errBericht = "<div class='errorText'>&emsp; Een bericht is verplicht</div>";
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


            <label for="subject">Bericht</label>
            <?php echo $errBericht; ?>
            <textarea class="inputForm" id="subject" name="subject" placeholder="Typ hier..."
                      style="height:200px"><?php echo $bericht; ?></textarea>

            <input type="submit" name="submit" value="Verzenden">

        </form>

        <?php




        ?>


    </div>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
