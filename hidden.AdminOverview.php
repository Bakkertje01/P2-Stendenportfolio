<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php
require_once "include/db_connection.php";
include "include/noacces_admin.php";
include 'hidden.header.php';
ob_start();
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
            echo "<table width = 100%  height = 200px >";
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
                echo "<td><a href = 'hidden.AdminOverview.php?CID=".$row['Gebruiker_ID']."'>Edit</a></td>";
                echo "<tr>";
            }

            echo "</table>";
            echo "<br><br>";
            if(isset($_GET['CID'])){
                $CID = $_GET['CID'];
                $DBcommand = "SELECT * FROM $DBtable WHERE Gebruiker_ID = '$CID'";
                $DBresult = mysqli_query($connection, $DBcommand);
                echo ($DBresult === false) ? "COULD NOT EXECUTE QUERY" . mysqli_errno($connection) . " : " . mysqli_error($connection) : NULL;

                echo "<table border = 1% width = 100% height = 200px>";
                echo "<form action = '' method = 'POST'>";
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
                    echo "<td><input type = 'submit' name = 'update' value = 'update'></td>";
                    echo "<td><input type = 'submit' name = 'delete' value = 'delete'></td>";
                    echo "<tr>";
                }
                echo "</form>";
                echo "</table>";
                if (isset($_POST['update'])) {
                    $CID = $_GET['CID'];
                    echo $CID;
                    $voornaam = $_POST['voornaam'];
                    $achternaam = $_POST['achternaam'];
                    $email = $_POST['email'];
                    $verified = $_POST['verified'];
                    $type = $_POST['type'];
                    $imgpath = $_POST['imgpath'];
                    $colorpath = $_POST['colorpath'];
                    $quote = $_POST['quote'];
                    $DBcommand = "UPDATE $DBtable SET Voornaam = '$voornaam',Achternaam = '$achternaam',Email = '$email',
                    Verified = '$verified',`Type` = '$type',img_path = '$imgpath',color_path = '$colorpath',Quote = '$quote' WHERE Gebruiker_ID = '$CID'";
                    $DBresult = mysqli_query($connection, $DBcommand);
                    echo ($DBresult === false) ? "COULD NOT EXECUTE QUERY" . mysqli_errno($connection) . " : " . mysqli_error($connection) : 'UPDATE HAS BEEN APPLIED';
                    header("Location: hidden.adminOverview.php");
                } elseif (isset($_POST['delete'])) {
                    $CID = $_GET['CID'];
                    $DBcommand = "DELETE FROM $DBtable WHERE Gebruiker_ID = '$CID'";
                    $DBresult = mysqli_query($connection, $DBcommand);
                    echo ($DBresult === false) ? "COULD NOT EXECUTE QUERY" . mysqli_errno($connection) . " : " . mysqli_error($connection) : 'DELETION HAS BEEN APPLIED';
                    header("Location: hidden.adminOverview.php");
                }
            }

            ?>

            </div>
        </div>
</div>




</div>


<?php
ob_flush();
include_once 'hidden.footer.php';

?>

</body>

</html>
