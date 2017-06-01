<!doctype html>
<!--   Naam: Myrren van Belkom  Studentnummer: 21031487  -->
<link rel="stylesheet" type="text/css" href="stylesheetgastenboek.css">
<html>
<head>
    <title>Guest Book Posts</title>
</head>
<body>
<?php
$host = "localhost"; //host, meestal localhost
$user = "root"; //user die op DB connecteert
$pass = ""; //Password van de user die op DB connecteert
$dbname = "gastenboek"; //Naam Database
$con = mysqli_connect($host, $user, $pass, $dbname);

if (mysqli_connect_errno($con))
{
    echo "Connectie Database mislukt: " . mysqli_connect_error();
}
$result = mysqli_query($con, "SELECT * FROM portfolio");

if (mysqli_num_rows($result) == 0)
{ // gastenboek is nog leeg
    echo 'Schrijf als eerste in het gastenboek!';
} else
{

    while ($row = mysqli_fetch_array($result))
    {
        ?>

        <div class="velden"> <!-- voor styling van alle echo's; zie CSS -->
            <div class="header">
                <div class="voornaam"><?php echo ($row['voornaam']); ?></div><!-- echo voornaam-->
                <div class="achternaam"><?php echo ($row['achternaam']); ?></div><!-- echo achternaam-->
                <!--     <div class="email"><//?php echo ($row['email']); ?></div> <!-- echo email-->
                <div class="datetime">
                    <div class="date"><?php echo $row['date']; ?></div>  <!-- echo datum-->
                    <div class="tijd"><?php echo $row['time']; ?></div> <!-- echo tijd-->
                </div>
            </div>

            <div class="bericht"><?php echo ($row['bericht']); ?></div> <!-- echo bericht-->

        </div>
    <?php } ?>


    <?php
}
mysqli_close($con); // sluit connectie
?>
<div class="nieuw-bericht">
    <a class="button" href="guestbook.html">Plaats Nieuw Bericht</a> <!-- Nieuw bericht plaatsen -->
</div>
</body>
</html>