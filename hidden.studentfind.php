<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>

</head>

<body>
<?php
include "db_connection.php";
include 'hidden.header.php';
include 'hidden.menu.php';
?>

<form  action = "hidden.studentfind.php" method = "POST">
    <p>vul het naamveld in van de student van wie je het portofolio wilt zien.</p><br>
    <p>Naam : <input type = "text" name = "voornaam" value = <?php echo $voornaam ?>></p>
    <input type = "submit" name = "submit" value = "Search">
</form>

<?php

// doet het nog niet moet nog portofolio van student hebben


if(empty($_POST['voornaam' ])){
     echo "Please Fill in your Surname ";
}else{
    $DBtable = "gebruiker";
    $voornaam = $_POST["voornaam"];
    // filter van input spaces,kommas,quotes
    if(!mysqli_select_db($connection,DB_NAME)){
        echo" COULD NOT SELECT DATABASE ".mysqli_errno($connection)." : ".mysqli_error($connection);
    }else{
        mysqli_select_db($connection,DB_NAME);
        $DBcommand = "SELECT Voornaam FROM $DBtable WHERE Voornaam Like '%$voornaam%'";
        $DBresult = mysqli_query($connection,$DBcommand);
        if($DBresult === FALSE){
            echo "COULD NOT SELECT FROM TABLE ".mysqli_errno($connection)." : ".mysqli_error($connection);
        }else{
            if(mysqli_num_rows($DBresult)  == 0){
                echo "There was no student found by the name of ".$voornaam."";
            }else{
                if($row = mysqli_fetch_assoc($DBresult)) {
                    echo "students by the name of  ".$row["Voornaam"] ." was found";
                    // https.portfolio.$voornaam. //hier komt link van site met naam naar pagina van student
                }
            }
        }
    }
}

?>





<?php

include 'hidden.footer.php';

?>

</body>

</html>
