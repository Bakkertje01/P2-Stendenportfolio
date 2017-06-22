<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php
require_once "include/db_connection.php";
include_once 'include/session.php';
include_once 'include/noacces_docent.php';
include 'hidden.header.php';
include 'hidden.menu.php';
?>


<div class="jumbotron">
    <div class="container text-center">
        <h2>Docent pagina</h2>
        <div id="wrapper">
            <div id='content'>

                <?php

                $result = mysqlI_query($connection, "SELECT * FROM user WHERE Gebruiker_ID='" . $_SESSION["Gebruiker_ID"] . "'")
                or die ('error: '. mysqli_error($connection));
                $row = mysqli_fetch_array($result);



                ?>
                <p>Welkom <?php echo ucwords($row['Voornaam']); ?> <?php echo ucwords($row['Achternaam']); ?></p>

            </div>
        </div>
    </div>




</div>


<?php

include_once 'hidden.footer.php';

?>

</body>

</html>
