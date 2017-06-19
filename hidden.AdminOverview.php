<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php
require_once "include/db_connection.php";
//include "include/noacces.php";
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
            mysqli_select_db($connection,$DBname);
            echo(!mysqli_select_db($connection,$DBname))?"COULD NOT SELECT DATABASE": NULL;
            $DBcommand = "SELECT * FROM $DBtable";
            $DBresult = mysqli_query($connection,$DBcommand);
            echo($DBresult === false)?"COULD NOT EXECUTE STATEMENT": NULL;
            $TH = array("Gebruiker_ID","Voornaam","Achternaam","Email","Studentnr","Verified","Type","img_path","color_path","Quote");
            $X = 0;
            $count = count($TH);
            echo "<table width = 100%  height = 200 >";
            echo "<form action = 'hidden.AdminOverview.php' method = 'POST'>";
            echo "<tr>";
           while($X < $count ){
               echo "<th>".$TH[$X]."</th>";
               $X++;
           }
            echo "</tr>";
            while($row = mysqli_fetch_assoc($DBresult)){
                echo "<tr>";
                echo "<td>".$row["Gebruiker_ID"]."</td>";
                echo "<td>".$row["Voornaam"]."</td>";
                echo "<td>".$row["Achternaam"]."</td>";
                echo "<td>".$row["Email"]."</td>";
                echo "<td>".$row["Studentnr"]."</td>";
                echo "<td>".$row["Verified"]."</td>";
                echo "<td>".$row["Type"]."</td>";
                echo "<td>".$row["img_path"]."</td>";
                echo "<td>".$row["color_path"]."</td>";
                echo "<td>".$row["Quote"]."</td>";
                echo "<td><input type = 'submit' name = 'edit' value = '".$row['Gebruiker_ID']."'></td>";
                echo "<tr>";
            }
            echo "</form>";
            echo "</table>";
            echo "<br><br>";

            if(isset($_POST['edit'])){
                $CID = $row["Gebruiker_ID"];
                echo $CID;
                $DBcommand = "SELECT * FROM $DBtable WHERE Gebruiker_ID = '$CID'";
                $DBresult = mysqli_query($connection,$DBcommand);
                echo ($DBresult === false)? "COULD NOT EXECUTE QUERY".mysqli_errno($connection)." : ".mysqli_error($connection): NULL;

                    echo "<table border = 1% width = 100% height = 200>";
                    echo "<form action = 'hidden.AdminOverview.php' method = 'POST'>";
                    while ($row = mysqli_fetch_assoc($DBresult)) {
                        echo "<tr>";
                        echo "<td><input type = 'text' name = 'GID' value = '" . $row['Gebruiker_ID'] . "'></td>";
                        echo "<td><input type = 'text' name = 'voornaam' value ='" . $row["Voornaam"] . "'</td>";
                        echo "<td><input type = 'text' name = 'achternaam' value ='" . $row["Achternaam"] . "'</td>";
                        echo "<td><input type = 'text' name = 'email' value ='" . $row["Email"] . "'</td>";
                        echo "<td><input type = 'text' name = 'studentnr' value ='" . $row["Studentnr"] . "'</td>";
                        echo "<td><input type = 'text' name = 'verified' value ='" . $row["Verified"] . "'</td>";
                        echo "<td><input type = 'text' name = 'type' value ='" . $row["Type"] . "'</td>";
                        echo "<td><input type = 'text' name = 'imgpath' value ='" . $row["img_path"] . "'</td>";
                        echo "<td><input type = 'text' name = 'colorpath' value ='" . $row["color_path"] . "'</td>";
                        echo "<td><input type = 'text' name = 'quote' value ='" . $row["Quote"] . "'</td>";
                        echo "<td><input type = 'submit' name = 'update' value = 'Update'></td>";
                        echo "<td><input type = 'submit' name = 'delete' value = 'delete'></td>";
                        echo "<tr>";
                    }

                    echo "</form>";
                    echo "</table>";
                    echo $CID;
                if(isset($_POST['update'])){

                    $voornaam= $_POST['voornaam'];
                    $achternaam= $_POST['achternaam'];
                    $email= $_POST['email'];
                    $studentnr= $_POST['studentnr'];
                    $verified= $_POST['verified'];
                    $type= $_POST['type'];
                    $imgpath= $_POST['imgpath'];
                    $colorpath= $_POST['colorpath'];
                    $quote= $_POST['quote'];
                    $DBcommand = "UPDATE $DBtable SET Voornaam = '$voornaam',Achternaam = '$achternaam',Email = '$email',Studentnr = 'studentnr',
                    Verified = '$verified',`Type` = '$type',img_path = '$imgpath',color_path = '$colorpath',Quote = '$quote' WHERE Gebruiker_ID = '$CID'";
                    $DBresult = mysqli_query($connection,$DBcommand);
                    echo ($DBresult === false)? "COULD NOT EXECUTE QUERY".mysqli_errno($connection)." : ".mysqli_error($connection): 'UPDATE HAS BEEN APPLIED';
                }elseif(isset($_POST['delete'])){
                    $DBcommand = "DELETE FROM $DBtable WHERE userid = '$CID'";
                    $DBresult = mysqli_query($connection,$DBcommand);
                    echo ($DBresult === false)? "COULD NOT EXECUTE QUERY".mysqli_errno($connection)." : ".mysqli_error($connection): 'DELETION HAS BEEN APPLIED';
                }

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
