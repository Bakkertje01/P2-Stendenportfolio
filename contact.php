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


        <form id="contactFormulier" action="contact.php" method="POST">


            <label class="contactLabel" for="fname">Voornaam</label>
            <input class="inputForm" type="text" id="fname" name="firstname" placeholder="Uw voornaam..">


            <label class="contactLabel" for="lname">Achternaam</label>
            <input class="inputForm" type="text" id="lname" name="lastname" placeholder="Uw achternaam..">

            <label class="contactLabel" for="email">E-mail adres</label>
            <input class="inputForm" type="text" id="email" name="email" placeholder="Uw e-mail adres..">


            <label class="contactLabel" for="subject">Bericht</label>
            <textarea class="inputForm" id="subject" name="subject" placeholder="Typ hier..."
                      style="height:200px"></textarea>

            <input id="submitContact" type="submit" name="submit" value="Verzenden">

        </form>

        <?php

        if (isset($_POST["submit"])) {
            echo "hois";
        }

        ?>


    </div>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
