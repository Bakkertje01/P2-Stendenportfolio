<?php


session_start();

include('include/db_connection.php');

$ID = $_SESSION["Gebruiker_ID"];

$sql = "SELECT Gebruiker_ID, Voornaam, Studentnr, Quote, Achternaam, img_path, color_path FROM User WHERE Gebruiker_ID = $ID";
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
    }
} else {
    $studentnaam = "Gast";
    $studentachter = ", Coole";
    $studentnumber = "default";
    $studentquote = "Ik ben hier nieuw!";
    $bgColor = NULL;
    $textColor =  NULL;
}

$PfNaam = 'pf.jpg';
$profielfoto = "studentuploads/$studentnumber/Profielfoto/$PfNaam";


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