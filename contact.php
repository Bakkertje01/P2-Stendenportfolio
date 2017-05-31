<html>

<head>

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

        if(isset($_POST['submit'])){
            $voornaam = $_POST['firstname'];
            $achternaam = $_POST['lastname'];
            $email = $_POST['email'];
            $bericht = $_POST['subject'];

        }

        ?>

        <form id="contactFormulier" action="contact.php" method="POST">


            <label for="fname">Voornaam</label>
            <input type="text" id="fname" name="firstname" placeholder="Uw voornaam.." value="<?php echo $voornaam; ?>">


            <label for="lname">Achternaam</label>
            <input type="text" id="lname" name="lastname" placeholder="Uw achternaam.." value="<?php echo $achternaam; ?>">

            <label for="email">E-mail adres</label>
            <input type="text" id="email" name="email" placeholder="Uw e-mail adres.." value="<?php echo $email; ?>">


            <label for="subject">Bericht</label>
            <textarea class="inputForm" id="subject" name="subject" placeholder="Typ hier..."
                      style="height:200px"><?php echo $bericht; ?></textarea>

            <input type="submit" name="submit" value="Verzenden">

        </form>

        <?php


        if (isset($_POST["submit"])) {




            if (!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))) {
                echo "alle velden zijn ingevuld";



            } else {

                echo "<div class='errorText'>Niet alle velden zijn(correct) ingevoerd. </div>";

                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                    echo"<div class='errorText'><br>Vul een geldig e-mailadres in.<br></div>";
                }
            }
        }

        ?>


    </div>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
