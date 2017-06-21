<?php
    include_once 'include/db_connection.php';
    include_once 'include/functions.php';
    include_once 'include/session.php';
?>


<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>


<?php
include_once 'hidden.header.php';
ob_start();
include_once 'hidden.menu.php';

?>

<div class="jumbotron">
    <div class="container text-center">
        <h1>My Portfolio</h1>


        <?php

        $errVoornaam = "";
        $errVoornaam2 = "";
        $errAchternaam = "";
        $errAchternaam2 = "";
        $errBericht = "";
        $errBericht2 = "";
        $errWachtwoord = "";
        $errWachtwoord2 = "";
        $errWachtwoordControle = "";
        $errWachtwoordControle2 = "";
        $errEmail = "";
        $errEmail2 = "";
        $errStudentnummer = "";
        $errStudentnummer2 = "";

        ?>
        <div id="wrapper">
            <!-- CONTENT -->
            <div id='content'>
                <h1> Registratie </h1>
                <?php

                if (empty ($_POST['Voornaam']) || empty ($_POST['Achternaam']) || empty ($_POST['Email']) || empty ($_POST['Wachtwoord']) || empty ($_POST['Wachtwoord1']) || empty ($_POST['Studentnr'])) {

                    if (isset($_POST['Submit'])) {


                        if (empty($_POST["Voornaam"])) {
                            $errVoornaam = "<div class='errorText'>&emsp; Voornaam is verplicht</div>";
                            $errVoornaam2 = "bg-danger";
                        }

                        if (empty($_POST["Achternaam"])) {
                            $errAchternaam = "<div class='errorText'>&emsp; Achternaam is verplicht</div>";
                            $errAchternaam2 = "bg-danger";
                        }

                        if (empty($_POST["Studentnummer"])) {
                            $errStudentnummer = "<div class='errorText'>&emsp; Een studentnummer is verplicht</div>";
                            $errStudentnummer2 = "bg-danger";
                        }

                        if (empty($_POST["Wachtwoord"])) {
                            $errWachtwoord = "<div class='errorText'>&emsp; Een wachtwoord is verplicht (minimaal 6 tekens)</div>";
                            $errWachtwoord2 = "bg-danger";
                        }

                        if (empty($_POST["WachtwoordControle"])) {
                            $errWachtwoordControle = "<div class='errorText'>&emsp; Een wachtwoord controle is verplicht (minimaal 6 tekens)</div>";
                            $errWachtwoordControle2 = "bg-danger";
                        }

                        if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
                            $errEmail = "<div class='errorText'>&emsp; Vul een geldig e-mailadres in.</div>";
                            $errEmail2 = "bg-danger";
                        }
                    }
                }


                ?>
                <p>* Verplicht in te vullen.</p>
                <form id='register' action='hidden.register.php' method='post'>
                    <label for='firstname'>Voornaam*: </label>
                    <?php echo $errVoornaam; ?>
                    <input type='text' class="<?php echo $errVoornaam2; ?>" name='Voornaam' id='Voornaam'
                           maxlength="30"/>

                    <label for='lastname'>Achternaam*: </label>
                    <?php echo $errAchternaam; ?>
                    <input type='text' class="<?php echo $errAchternaam2; ?>" name='Achternaam' id='Achternaam'
                           maxlength="30"/>

                    <label for='email'>Email Adres*: </label>
                    <?php echo $errEmail; ?>
                    <input type='email' class="<?php echo $errEmail2; ?>" name='Email' id='Email' maxlength="50"/>

                    <label for='password'>Wachtwoord*: </label>
                    <?php echo $errWachtwoord; ?>
                    <input type='password' class="<?php echo $errWachtwoord2; ?>" name='Wachtwoord' id='Wachtwoord'
                           maxlength="50"/>

                    <label for='password1'>Wachtwoord ter controle*: </label>
                    <?php echo $errWachtwoordControle; ?>
                    <input type='password' class="<?php echo $errWachtwoordControle2; ?>" name='Wachtwoord1'
                           id='Wachtwoord1' maxlength="50"/>

                    <label for='Studentnr'>Student nummer*: </label>
                    <?php echo $errStudentnummer; ?>
                    <input type='number' class="<?php echo $errStudentnummer2; ?>" name='Studentnr' id='Studentnr'
                           maxlength="6" placeholder="Alleen getallen!"/>


                    <input id='submit' type='submit' name='Submit' value='Registreren'/><br/>
                </form>
            </div>

        </div>

        <?php

        ///Registration script
        if (isset($_POST["Submit"])) {
            //The post values have to be the same as the form <name> tag
            $firstname = $_POST['Voornaam'];
            $lastname = $_POST['Achternaam'];
            $email = $_POST['Email'];
            $password = $_POST['Wachtwoord'];
            $password1 = $_POST['Wachtwoord1'];
            $studentnr = $_POST['Studentnr'];
            $substring = substr($email, -20);

            $firstname = trim($_POST['Voornaam']);
            $firstname = strip_tags($firstname);
            $firstname = htmlspecialchars($firstname);

            $lastname = trim($_POST['Achternaam']);
            $lastname = strip_tags($lastname);
            $lastname = htmlspecialchars($lastname);

            $email = trim($_POST['Email']);
            $email = strip_tags($email);
            $email = htmlspecialchars($email);

            $password = trim($_POST['Wachtwoord']);
            $password = strip_tags($password);
            $password = htmlspecialchars($password);

            $password1 = trim($_POST['Wachtwoord1']);
            $password1 = strip_tags($password1);
            $password1 = htmlspecialchars($password1);

            $studentnr = trim($_POST['Studentnr']);
            $studentnr = strip_tags($studentnr);
            $studentnr = htmlspecialchars($studentnr);

            $firstname = str_replace(array('\'', '"'), "", $firstname);
            $lastname = str_replace(array('\'', '"'), "", $lastname);
            $email = str_replace(array('\'', '"'), "", $email);
            $password = str_replace(array('\'', '"'), "", $password);
            $password1 = str_replace(array('\'', '"'), "", $password1);
            $studentnr = str_replace(array('\'', '"'), "", $studentnr);


            //Verifcation
            if (empty ($_POST['Voornaam']) || empty ($_POST['Achternaam']) || empty ($_POST['Email']) || empty ($_POST['Wachtwoord']) || empty ($_POST['Wachtwoord1']) || empty ($_POST['Studentnr'])) {

                //


            } else {

                if ($substring != "@student.stenden.com") {
                    echo "het is geen student email adres";
                } else {

                    //Password Matching Validation
                    if ($password != $password1) {
                        echo "Passwords moeten hetzelfde zijn<br>";

                    } else {

                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo "Enter a Valid email";
                        } else {

                            if (strlen($password) <= 6) {
                                echo "Choose a password longer then 6 character";

                            } else {

                                $queryUsers = "SELECT Email FROM user WHERE Email='$email'";
                                $resultemail = mysqli_query($connection, $queryUsers);
                                if (mysqli_num_rows($resultemail) > 0) {
                                    echo '<div class="">' . '* Email adres bestaat al' . "</div>";
                                } else {

                                    $queryUsers = "SELECT Studentnr FROM user WHERE Studentnr='$studentnr'";
                                    $resultstnumber = mysqli_query($connection, $queryUsers);
                                    //$rowUsers = mysqli_fetch_array($resultUsers);
                                    if (mysqli_num_rows($resultstnumber) > 0) {
                                        echo '<div class="">' . '* Studentnumber bestaat al' . "</div>";
                                    } else {

                                        //hasing the password
                                        $password = password_hash($password, PASSWORD_BCRYPT);

                                        //$password = password_encrypt($_POST["Wachtwoord"]);

                                        $sql = "INSERT INTO user";
                                        $sql .= "(Voornaam, Achternaam, Email, Wachtwoord, Studentnr, Verified, Type) ";
                                        $sql .= "VALUES ('$firstname', '$lastname', '$email', '$password', '$studentnr', 1, 'student')";

                                        $result = mysqli_query($connection, $sql);
                                        header("Location: hidden.login.php");

                                        ob_end_flush();

                                        if ($result === false) {
                                            echo "ERROR" . mysqli_errno() . " : " . mysqli_error();


                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        ?>


    </div>
</div>

<div class="container-fluid bg-3 text-center">

</div>
<br>

<div class="container-fluid bg-3 text-center">
    <div class="row">

    </div>
</div>
<br><br>


<?php

include_once 'hidden.footer.php';

?>

</body>

</html>
