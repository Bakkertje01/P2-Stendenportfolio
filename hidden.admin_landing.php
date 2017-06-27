<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php
require_once "include/db_connection.php";
include_once 'include/session.php';
include "include/noacces_admin.php";
include 'hidden.header.php';
include 'hidden.menu.php';
?>


<div class="jumbotron">
    <div class="container text-center">
        <h2>Administrator pagina</h2>
        <div id="wrapper">
            <div id='content'>
            <div class="blok">

                <a href="hidden.AdminOverview.php" >
                    <div class="blokjes">
                        <h2>Aanpassen users</h2>
                    </div>
                </a>

                <a href="hidden.admin_register.php" >
                    <div class="blokjes">
                        <h2>Docent + SLB registratie</h2>
                    </div>
                </a>
                <a href="hidden.admin_contact.php" >
                    <div class="blokjes">
                        <h2>Admin <br>contact</h2>
                    </div>

                <a href="hidden.admin_gast_register.php" >
                    <div class="blokjes">
                        <h2>Gast registratie</h2>
                    </div>
                </a>
            </div>

            </div>
        </div>
    </div>




</div>


<?php

include_once 'hidden.footer.php';

?>

</body>

</html>
