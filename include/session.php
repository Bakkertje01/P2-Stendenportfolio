<?php

session_start();

include_once('db_connection.php');

if (isset($_SESSION['Gebruiker_ID'])) {
    $ID = $_SESSION["Gebruiker_ID"];
}else{
    $ID = 0;
}

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$sql = "SELECT Gebruiker_ID, Voornaam, Studentnr, Quote, Achternaam, img_path, color_path, Verified FROM User WHERE Gebruiker_ID = $ID";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $studentnaam = $row["Voornaam"];
        $studentachter = $row["Achternaam"];
        $studentnumber = $row["Studentnr"];
        $studentquote = $row["Quote"];
        $bgColor = $row["color_path"];
        $textColor =  $row["img_path"];
        $PfNaam = 'pf.jpg';
        $profielfoto = "studentuploads/$studentnumber/Profielfoto/$PfNaam";

    }
} else {
    $ID = 'gast';
    $studentnaam = "Gast";
    $studentachter = ", Coole";
    $studentnumber = "default";
    $studentquote = "Ik ben hier nieuw!";
    $bgColor = NULL;
    $textColor =  NULL;
    $PfNaam = 'pf.jpg';
    $profielfoto = "studentuploads/default/Profielfoto/$PfNaam";
}
$checkPf = "studentuploads/$studentnumber/Profielfoto/$PfNaam";

if (!file_exists($checkPf)){
    $profielfoto = "studentuploads/default/Profielfoto/$PfNaam";
}



$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

$sql2 = "SELECT Verified FROM User WHERE Gebruiker_ID = $ID";
//echo $sql;
$result2 = $connection->query($sql2);

//if ($result2['num_rows'] > 0) { dit werkt, bij het niet inloggen, als je inlogd gaat het alsnog fout
if ($result2->num_rows > 0) {
    // output data of each row
   $row2 = array();
    while ($row2 = $result2->fetch_assoc()) {
        $waarmerkCheck = $row2["Verified"];
        if ($waarmerkCheck = 1) {
            $waarmerk = "<p><img width='20%' src='waarmerk/approved.jpg'>Gewaarmerkt Door SLB/DOCENT</p>";
        }
        if ($waarmerkCheck != 1) {
            $waarmerk = "<p><img width='20%' src='waarmerk/progr.png'>In afwachting van waarmerk</p>";
        }

    }
}





//mysqli_close($connection);

/*
function message() {
    if (isset($_SESSION["message"])) {
        $output = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";

        //clear message
        $_SESSION["message"] = null;
        return $output;
    }
}
function errors(){
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];

        //clear message
        $_SESSION["errors"] = null;
        return $errors;
    }
}
*/
?>