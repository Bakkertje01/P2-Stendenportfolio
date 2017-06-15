<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php
require_once "db_connection.php";
include "noacces.php";
include 'hidden.header.php';
include 'hidden.menu.php';
?>


<div class="jumbotron">
    <div class="container text-center">
        <h1>administrator Overview</h1>
        <div id="wrapper">
            <div id='content'>


            <?php
            $DBname = "portfolio";
            $DBtable = "user";
            myqli_select_db($connection,$DBname);
            echo(!myqli_select_db($connection,$DBname))?"COULD NOT SELECT DATABASE": NULL;
            $DBcommand = "SELECT * FROM $DBtable";
            $DBresult = mysqli_query($connection,$DBcommand);
            echo($DBresult === false)?"COULD NOT EXECUTE STATEMENT": NULL;

            while($row = mysqli_fetch_asc($DBresult)){
                echo
            }
            ?>
            </div>
        </div>
    </div>
</div>






<?php

include_once 'hidden.footer.php';

?>

</body>

</html>
