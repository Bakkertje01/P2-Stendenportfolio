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
        <h1>My Portfolio</h1>
        <p>Some text that represents "Me"...</p>
        <h2>Plaats een bericht!</h2>
        <form method="POST" action="guestbook.php">
            <p>E-mailadres</p> <input type="email" name="email">
            <p>Voornaam</p> <input type="text" name="voornaam" required/>
            <p>Achternaam</p> <input type="text" name="achternaam" required/>
            <p>Type hier uw bericht</p><textarea name="bericht" rows="10" cols="50" maxlengt="50" required></textarea>
            <br><input type="checkbox" name="verplicht" required>Ik ben geen robot</input>
            <p><button class="button" name="submit" type="submit">Plaats bericht</button><input type="reset" value="Reset"></p>
        </form>
    </div>
</div>

<div class="container-fluid bg-3 text-center">

</div><br>

<div class="container-fluid bg-3 text-center">

</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
