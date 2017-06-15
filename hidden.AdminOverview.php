<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php
require_once "include/db_connection.php";
include "include/noacces.php";
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
            $TH = array("Voornaam","Achternaam","Email","Studentnr","Verified","Type","img_path","color_path","Quote");
            $X = 0;
            $count = count($TH);
            echo "<table width = 100% border = 1% height = 100 >";
            echo "<form action = 'hidden.AdminOverview.php'>"
            echo "<tr>";
           while($X < $count ){
               echo "<th>".$TH[$X]."</th>";
               $X++;
           }
            echo "</tr>";
            while($row = mysqli_fetch_assoc($DBresult)){
                echo "<tr>";
                echo "<td>".$row["Voornaam"]."</td>";
                echo "<td>".$row["Achternaam"]."</td>";
                echo "<td>".$row["Email"]."</td>";
                echo "<td>".$row["Studentnr"]."</td>";
                echo "<td>".$row["Verified"]."</td>";
                echo "<td>".$row["Type"]."</td>";
                echo "<td>".$row["img_path"]."</td>";
                echo "<td>".$row["color_path"]."</td>";
                echo "<td>".$row["Quote"]."</td>";
                echo "<td><a href = ''>Edit</a></td>";
                echo "<tr>";
            }
            echo "</table>";

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
