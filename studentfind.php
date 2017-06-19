<?php
include_once 'include/session.php';
include  'include/db_connection.php';
include_once 'include/noacces.php';

?>
<!DOCTYPE html>
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
        <h3>Zoek student</h3>
            <div id="wrapper">
                <div id='content'>
                <form action = "studentfind.php" method = "POST">
                    <p>Vul de voornaam of achternaam van de student in.</p><br>
                    <p>Naam : <input type = "text" name = "voornaam" pattern="[a-zA-Z]{1,}" value = '<?php echo (isset($_POST["submit"])) && !empty($_POST['voornaam'])? $_POST['voornaam'] : null ?>'></p>
                    <input type = "submit" name = "submit" value = "Search">
                </form>

<?php

// doet het wel maar moet nog portofolio van student hebben


if(!isset($_POST["submit"])){
     //echo "<h2>Please Fill in your Surname<h2>";
}else{
    if (!empty($_POST['voornaam'])) {
    $DBtable = "user";
    $voornaam = $_POST["voornaam"];
    $voornaam = str_replace(array('\'','"','.',','), '', $voornaam);

        $voornaam = trim($_POST['voornaam']);
        $voornaam = strip_tags($voornaam);
        $voornaam = htmlspecialchars($voornaam);

        $DBcommand = "SELECT Voornaam,Achternaam,Email,Studentnr,`Type`,img_path,color_path,Quote FROM $DBtable WHERE Voornaam Like '%$voornaam%' OR Achternaam Like '%$voornaam%' HAVING `TYPE` = 'student'";
        $DBresult = mysqli_query($connection,$DBcommand);
        if($DBresult === FALSE){
            echo "COULD NOT SELECT FROM TABLE ".mysqli_errno($connection)." : ".mysqli_error($connection);
        }else{
            if(mysqli_num_rows($DBresult)  == 0){
                echo "There were no students found by the name of ".$voornaam."";
            }else{
                echo "<h3>Gevonden studenten</h3>";
                while($row = mysqli_fetch_assoc($DBresult)) {
                    echo "<h4><a href = 'hidden.foundstudent.php?student=$row[Studentnr]' >".$row["Voornaam"]." ".$row["Achternaam"] ."</a></h4>";

                    // https.portfolio.$voornaam. //hier komt link van site met naam naar pagina van student
                }
            }
        }
}


    else {
        echo "<br><br><h3>Vul een naam, of een gedeelte daarvan in.</h3>";
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