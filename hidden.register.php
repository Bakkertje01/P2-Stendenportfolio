<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>

<?php include_once 'include/db_connection.php'; ?>
<?php include_once 'include/functions.php'; ?>
<?php include_once 'include/session.php'; ?>
<?php
include_once 'hidden.header.php';
ob_start();
include_once 'hidden.menu.php';

?>

<div class="jumbotron">
    <div class="container text-center">
        <h1>My Portfolio</h1>
        <p>
            <div id="wrapper">
                <!-- CONTENT -->
                <div id='content'>
                    <h1> Registratie </h1>

                    <form id='register' action='hidden.register.php' method='post'>
                        <label for='firstname'>Voornaam*: </label><br/>
                        <input type='text' name='Voornaam' id='Voornaam' maxlength="30"/><br/>

                        <label for='lastname'>Achternaam*: </label><br/>
                        <input type='text' name='Achternaam' id='Achternaam' maxlength="30"/><br/>

                        <label for='email'>Email Adres*:</label><br/>
                        <input type='email' name='Email' id='Email' maxlength="50"/><br/>

                        <label for='password'>Wachtwoord*:</label><br/>
                        <input type='password' name='Wachtwoord' id='Wachtwoord' maxlength="50"/><br/>

                        <label for='password1'>Wachtwoord ter controle*:</label><br/>
                        <input type='password' name='Wachtwoord1' id='Wachtwoord1' maxlength="50"/><br/>

                        <label for='Studentnr'>Student nummer*:</label><br/>
                        <input type='number' name='Studentnr' id='Studentnr' maxlength="6" placeholder="Alleen getallen!"/><br/>

        <p>* Verplicht in te vullen.</p>
        <input id='submit' type='submit' name='Submit' value='Registreren'/><br/>
        </form>
    </div>

</div>

<?php
//Registration script
if (isset($_POST["Submit"])) {
    //The post values have to be the same as the form <name> tag
    $firstname = $_POST['Voornaam'];
    $lastname = $_POST['Achternaam'];
    $email = $_POST['Email'];
    $password = $_POST['Wachtwoord'];
    $password1 = $_POST['Wachtwoord1'];
    $studentnr = $_POST['Studentnr'];

    $firstname = str_replace(array('\'','"'),"",$firstname);


    //Verifcation
    if (empty ($_POST['Voornaam']) || empty ($_POST['Achternaam']) || empty ($_POST['Email']) || empty ($_POST['Wachtwoord']) || empty ($_POST['Wachtwoord1']) || empty ($_POST['Studentnr'])) {
        echo "please fill in all fields";
    } else {

        /* Password Matching Validation */
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

?>

</p>
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
