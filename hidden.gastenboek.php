<!doctype html>
<!--   Naam: Myrren van Belkom  Studentnummer: 21031487  -->
<html>
<head>
    <title>Guest Book</title>
</head>
<body>
<?php
if(!isset($_SESSION)) session_start();
$conn = mysqli_connect("127.0.0.1", "root", "", "portfolio"); // host, username, wachtwoord, waar komen de gegevens vandaan
if (!$conn)
{
    DIE("Geen connectie: " . mysqli_connect_error()); // check of de verbinding is gemaakt
}
echo "Je bent verbonden";

if (isset($_SESSION['Gebruiker_ID']) && $_SESSION['Gebruiker_ID'] == true) // is de gebruiker ingelogd?
{
    echo "Welkom op de pagina " . $_SESSION['Voornaam'] . "!";
} else
{
    echo "Je moet inloggen voor je een bericht kunt plaatsen.";
}

if (!postValueset("Bericht"))    // zijn de formulieren ingevuld
    echo "<p>Alle velden moeten worden ingevuld!</p>";
else
{
    $Bericht = mysqli_escape_string($con, htmlspecialchars($_POST["Bericht"]));; // haal uit bericht
    $sql = "INSERT INTO portfolio(bericht) VALUES('$Bericht')"; // haal uit bericht en zet in de database
    if (!mysqli_query($con, $sql))
    {
        die('Error: ' . mysqli_error($con)); //  indien het niet lukt het in de database toe te voegen
    } else
        mysqli_close($con);

    function postValueset($key) // functie om te kijken of er iets in bericht staat en deze gezet is
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

}
?>
</body>
</html>