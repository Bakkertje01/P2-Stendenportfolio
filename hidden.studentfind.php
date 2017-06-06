<html>

<head>
    <link rel="icon" type="image/png" href="fav.png"/>

</head>

<body>
<?php
include "db_connection.php";
include 'hidden.header.php';
include 'hidden.menu.php';
?>

<form  action = "hidden.studentfind.php" method = "POST" >
    <input type = "text" name = "voornaam" value = 0 >
    <input type = "text" name = "achternaam" value = 0 >
    <input type = "submit" name = "submit" value = "Zoek">
</form>
<?php

// doet het nog niet moet nog table hebben en link van portfolio van student


if(empty($_POST['voornaam' ])|| empty($_POST['achternaam'])){
     echo " fill in all fields";
}else{
    $DBtable = 0 // naam van table in database
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    if(!mysqli_select_db($connection,DB_NAME)){
        echo" COULD NOT SELECT DATABASE ".mysqli_errno($connection)." : ".mysqli_error($connection);
    }else{
        mysqli_select_db($connection,DB_NAME);
        $DBcommand = "SELECT * FROM $DBtable WHERE Lastname = '$voornaam' AND Firstname = '$achternaam'";
        $DBresult = mysqli_query($connection,$DBcommand);
        if($DBresult === FALSE){
            echo "COULD NOT SELECT FROM TABLE ".mysqli_errno($connection)." : ".mysqli_error($connection);
        }else{
            if(mysqli_num_rows($DBresult)  == 0){
                echo "There was no student found by the name of ".$voornaam." ".$achternaam."";
            }else{
                echo "student by the name of  ".$voornaam." ".$achternaam." was found";
                // https.portfolio.$voornaam.$achternaam  //hier komt link van site met naam naar pagina van student
            }
        }
    }
}

?>


    display studentnummer, firstname, lastname, portfolio link;
    link append phpname append .php


<?php

include 'hidden.footer.php';

?>

</body>

</html>
