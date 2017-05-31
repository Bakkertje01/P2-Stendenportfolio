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


            <label for="fname">Voornaam</label>
            <input type="text" id="fname" name="firstname" placeholder="Uw voornaam..">


            <label for="lname">Achternaam</label>
            <input type="text" id="lname" name="lastname" placeholder="Uw achternaam..">

            <label for="email">E-mail adres</label>
            <input type="text" id="email" name="email" placeholder="Uw e-mail adres..">


            <label for="subject">Bericht</label>
            <textarea class="inputForm" id="subject" name="subject" placeholder="Typ hier..."
                      style="height:200px"></textarea>

            <input type="submit" name="submit" value="Verzenden">

        </form>

        <?php

        if (isset($_POST["submit"])) {


            echo"broer";

        }

        ?>


    </div>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
