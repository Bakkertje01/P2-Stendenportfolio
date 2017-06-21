<?php
include 'include/session.php';
include 'include/db_connection.php';
//if(isset($_SESSION)&& $_SESSION['Type']==)
?>
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
        <h2>Plaats een bericht!</h2>
        <form class="form-style" method="POST" >
            <ul>
                <li>
                    <label for="bericht">Bericht</label>
                    <textarea cols="50" name="bericht" rows="5"> </textarea>
                </li>
                <li>
                    <input name="submit" value="submit" type="submit">
                    <input type="submit" name="reset" value="Reset">
                </li>
            </ul>
        </form>
        <?php
        //$host = "127.0.0.1:8889"; //host, meestal localhost
        //$user = "root"; //user die op DB connecteert
        //$pass = ""; //Password van de user die op DB connecteert
        //$dbname = "portfolio"; //Naam Database
        $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        if (mysqli_connect_errno($connection)) // connectie maken met de database
        {
            echo "Connectie Database mislukt: " . mysqli_connect_error();
        }
        if (isset($_SESSION['Gebruiker_ID']) && $_SESSION['Gebruiker_ID'] == true) // is de gebruiker ingelogd?
        {
            echo "<h3>Welkom op de pagina</h3>";
        } else
        {
            echo "Je moet inloggen voor je een bericht kunt plaatsen.";
        }

        if (isset($_POST['submit'])){

            $bericht = mysqli_escape_string($connection, htmlspecialchars($_POST["bericht"]));; // haal uit bericht
            $gebruiker_id = $_SESSION['Gebruiker_ID'];
            $date = date('Y:m:d:H:i');
            $sql = "INSERT INTO bericht(`Bericht`, `Gebruiker_ID`, `Datum_tijd`, `Portfolio_ID`) VALUES('$bericht', $gebruiker_id, '$date', '$studentnumber')";  // haal uit bericht en zet in de database

            if (!mysqli_query($connection, $sql))
            {
                mysqli_close($connection);
                die('Error: ' . mysqli_error($connection)); //  indien het niet lukt het in de database toe te voegen
            }
        }

        $result = mysqli_query($connection, "SELECT `Voornaam` ,`Bericht` FROM `Bericht` INNER JOIN `user` ON Bericht.Gebruiker_ID = user.Gebruiker_ID WHERE Portfolio_ID = " . $studentnumber); // haal uit de database //AANVULLEN JOIN ON user.id = bericht.userid


        if (mysqli_num_rows($result) == 0) // staat er al iets in
        { // gastenboek is nog leeg
            echo 'Schrijf als eerste in het gastenboek!';
        } else
        {

        while ($row = mysqli_fetch_array($result))
        {
        ?>

        <div class="velden"> <!-- voor styling van alle echo's; zie CSS -->
            <div class="header"><br>
                <div class="Voornaam"><?php echo ($row['Voornaam']); ?></div> <!-- echo bericht-->
                <div class="Bericht"><?php echo ($row['Bericht']); ?></div> <!-- echo bericht-->
            </div>
            <?php } ?>
            <?php
            }
            mysqli_close($connection); // sluit connectie
            ?>
        </div>
    </div>
</body>
<style>
    /*form-style is de formulier class*/
    .Voornaam{
        border: solid 1px #707070;
        box-shadow: 0 0 5px 1px #969696;
        padding: 10px;
        border: solid 1px #dcdcdc;
        background-color: #cccccc;
    }
    .Bericht{
        border: solid 1px #707070;
        box-shadow: 0 0 5px 1px #969696;
        padding: 10px;
        border: solid 1px #dcdcdc;
    }
    .form-style ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
</style>
</html>
