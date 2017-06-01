<!doctype html>
<!--   Naam: Myrren van Belkom  Studentnummer: 21031487  -->
<html>
<head>
    <title>Guest Book</title>
</head>
<body>
<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "gastenboek"); // host, username, wachtwoord, waar komen de gegevens vandaan
if (!$conn)
{
    DIE("Geen connectie: " . mysqli_connect_error()); // check of de verbinding is gemaakt
}
echo "Je bent verbonden";

if (!postValueset("email") || !postValueset("voornaam") || !postValueset("achternaam") ||
    !postValueset("bericht"))    // zijn de formulieren ingevuld
    echo "<p>Alle velden moeten worden ingevuld!</p>";
else
{
    $email = getPost('email');    // de input die wordt verzonden
    $voornaam = getPost('voornaam');
    $achternaam = getPost('achternaam');
    $bericht = getPost('bericht');
    $date = date('Y-m-d');
    $time = date('H:i:s'); //datum en tijd


    $retrieve = "INSERT INTO portfolio(date, time, email, voornaam, achternaam, bericht) " // uit het formulier naar de database versturen
        . "VALUES ('$date','$time','$email','$voornaam','$achternaam','$bericht')";
    $result = mysqli_query($conn, $retrieve);
    header("Location: toongastenboek.php");    // verwijst terug naar de main page als je op report drukt
}

function postValueset($key)
{
    if (isset($_POST) && isset($_POST[$key]) && !empty($_POST[$key]))
        return true;
    return false;
}

function getPost($key)
{
    if (postValueset($key))
    {
        return $_POST[$key];
    }
}
?>
</body>
</html>