<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>

</head>

<body>
<?php
///include "db_connection.php";
include_once 'hidden.header.php';
include_once 'hidden.menu.php';
?>
<div class="jumbotron">
    <div class="container text-center">
        <h3>Student Finder</h3>

            <div id="wrapper">

                <!-- CONTENT -->
                <div id='content'>

                <form  action = "hidden.studentfind.php" method = "POST">
                    <p>vul het naamveld in van de student van wie je het portofolio wilt zien.</p><br>
                    <p>Naam : <input type = "text" name = "voornaam" pattern="[a-zA-Z]{1,}" value = '<?php echo (isset($_POST["submit"])) && !empty($_POST['voornaam'])? $_POST['voornaam'] : null ?>'></p>
                    <input type = "submit" name = "submit" value = "Search">
                </form>

<?php
// connectie moet worden gemaakt
// doet het nog niet moet nog portofolio van student hebben


if(!isset($_POST["submit"]) || isset($_POST["submit"]) && empty($_POST['voornaam'])){
     echo "<h2>Please Fill in your Surname<h2>";
}else{
    $DBtable = "gebruiker";
    $voornaam = $_POST["voornaam"];
    $voornaam = str_replace(array('\'','"','.',','), '', $voornaam);



    if(!mysqli_select_db($connection,DB_NAME)){
        echo" COULD NOT SELECT DATABASE ".mysqli_errno($connection)." : ".mysqli_error($connection);
    }else{
        mysqli_select_db($connection,DB_NAME);
        $DBcommand = "SELECT Voornaam,Achternaam FROM $DBtable WHERE Voornaam Like '%$voornaam%'";
        $DBresult = mysqli_query($connection,$DBcommand);
        if($DBresult === FALSE){
            echo "COULD NOT SELECT FROM TABLE ".mysqli_errno($connection)." : ".mysqli_error($connection);
        }else{
            if(mysqli_num_rows($DBresult)  == 0){
                echo "There were no students found by the name of ".$voornaam."";
            }else{
                if($row = mysqli_fetch_assoc($DBresult)) {
                    echo "students by the name of  ".$row["Voornaam"] ." : ".$row["Achternaam"] ." were found";

                    // https.portfolio.$voornaam. //hier komt link van site met naam naar pagina van student
                }
            }
        }
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