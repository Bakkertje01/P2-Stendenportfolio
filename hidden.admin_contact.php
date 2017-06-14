<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php

include_once 'hidden.header.php';
include_once 'hidden.menu.php';

?>


<div class="jumbotron">

    <div class="container text-center">
        <h2>Contact berichten</h2>
        <?php

                //Connectie maken met DB en testen
                $DBConnect = mysqli_connect("localhost", "root", "");
                if ($DBConnect === FALSE) {
                    echo "<p>Unable to connect to the database server.</p>"
                        . "<p>Error code " . mysqli_errno() . ": " . mysqli_error()
                        . "</p>";
                } else {
                    $DBName = "portfolio";
                    if (!mysqli_select_db($DBConnect, $DBName)) {
                        echo "<p>Er zijn geen berichten vertuurd via het contactformulier.</p>";
                    }else {
                        $TableName = "contact";
                        $SQLstring = "SELECT * FROM $TableName";
                        $QueryResult = mysqli_query($DBConnect, $SQLstring);
                        if (mysqli_num_rows($QueryResult) == 0){
                            echo "<p>There are no reports!</p>";
                        }
                        else {
                            echo "<p>Dit zijn de contactformulieren die zijn toegevoegd</p>";
                            while($Row = mysqli_fetch_assoc($QueryResult))
                            {
                                $idPrint = $Row['Contactg_ID'];
                                $voornaamPrint = $Row['Voornaam'];
                                $achternaamPrint = $Row['Achternaam'];
                                $emailPrint = $Row['Email'];
                                $datumPrint = $Row['Datum'];
                                $onderwerpPrint = $Row['Onderwerp'];
                                $berichtPrint = $Row['Bericht'];
                                $berichtPrint = str_replace("\n","<br>",$berichtPrint);


                                echo "<table class='table table-hover table-striped table-bordered'>";
                                echo    "<tr class='info'><th width='200'>Bericht nummer</th>" . "<th>$idPrint</th></tr>"
                                    . "<tr><td width='200'><b>Voornaam</b></td>" . "<td>$voornaamPrint</td></tr>"
                                    . "<tr><td width='200'><b>Achternaam</b></td>" . "<td>$achternaamPrint</td></tr>"
                                    . "<tr><td width='200'><b>E-Mail</b></td>" . "<td>$emailPrint</td></tr>"
                                    . "<tr><td width='200'><b>Datum</b></td>" . "<td>$datumPrint</td></tr>"
                                    . "<tr><td width='200'><b>Onderwerp</b></td>" . "<td>$onderwerpPrint</td></tr>"
                                    . "<tr><td width='200'><b>Bericht</b></td>" . "<td>$berichtPrint</td></tr>"
                                    . "<tr><td width='200'><a href='mailto:$emailPrint'><input type='submit' name='submit' value='Beantwoord bericht'></a></td></tr>";

                                    echo '</table>';
                                    echo '<hr>';

                            }

                        }
                        mysqli_free_result($QueryResult);
                    }
                    mysqli_close($DBConnect);
                }


/*
                    //////////////////////////////////////////////////////////////////
                    //Kijken of database 'bugReports' al bestaat en anders een nieuwe aanmaken.
                    $DBName = "portfolio";

                    mysqli_select_db($DBConnect, $DBName);

                    //Dit is voor het testen
                    //echo "<h1>Datbase connectie is gelukt! </h1>";

                    //
                    $TableName = "contact";
                    $SQLstring = "SHOW TABLES LIKE '$TableName'";
                    $QueryResult = mysqli_query($DBConnect, $SQLstring);


                    $SQLstring2 = "INSERT INTO $TableName VALUES(NULL,'$voornaam', '$achternaam', '$email', '$bericht', '$datum')";
                    $QueryResult2 = mysqli_query($DBConnect, $SQLstring2);
                    if ($QueryResult2 === FALSE) {
                        echo "<p>Unable to execute the query.</p>"
                            . "<p>Error code " . mysqli_errno($DBConnect)
                            . ": " . mysqli_error($DBConnect) . "</p>";
                    } else {


                        echo "<h2>Bedankt voor uw bericht!</h2>";
                    }
                    mysqli_close($DBConnect);
                }*/


        ?>


    </div>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
