<?php
include_once 'include/session.php';
include_once 'include/db_connection.php';
include "include/noacces_admin.php";

?>
<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php
//$connection = mysqli_connect("127.0.0.1","root","");
include 'hidden.header.php';

include 'hidden.menu.php';
?>


<div class="jumbotron">
    <div class="container text-center">
        <h2>SLB / Docent registratie</h2>
            <div id="wrapper">
                <div id='content'>
                <form id='register' action='hidden.admin_register.php' method='post'>
                    <label for='firstname' >Voornaam*: </label><br/>
                    <input type='text' name='Firstname' id='firstname' maxlength="50" /><br/>

                    <label for='lastname' >Achternaam*: </label><br/>
                    <input type='text' name='Lastname' id='lastname' maxlength="50" /><br/>

                    <label for='email' >Email Address*:</label><br/>
                    <input type='text' name='Email' id='email' maxlength="50" /><br/>

                    <label for='password' >Wachtwoord*:</label><br/>
                    <input type='password' name='Password' id='password' maxlength="50" /><br/>

                    <label for='password1' >Wachtwoord ter controle*:</label><br/>
                    <input type='password' name='Password1' id='password1' maxlength="50" /><br/>

                    <p>Selecteer een rol </p><br>
                    <select name = "rol" >
                        <option  value = "docent" >Docent</option>
                        <option  value = "slb" >SLB</option>
                    </select><br>
                </div>


    <input id='submit'type='submit' name='Submit' value='Registreren' /><br/>

</form>

<?php

if(isset($_POST["Submit"])) {
    $DBname = "portfolio";
    $DBtable = "user";
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $password1 = $_POST['Password1'];
    $rol = $_POST['rol'];
    $firstname = str_replace(array('\'', '"','<','>'), '', $firstname);
    $lastname = str_replace(array('\'', '"','<','>'), '', $lastname);
    $email = str_replace(array('\'', '"','<','>'), '', $email);
    $password = str_replace(array('\'', '"','<','>'), '', $password);

   /* $email = trim($_POST['Email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['Password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $password = trim($_POST['Password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);*/


    if (empty ($_POST['Firstname'])
        || empty ($_POST['Lastname'])
        || empty ($_POST['Email'])
        || empty ($_POST['Password'])
        || empty ($_POST['Password1'])
        || empty ($_POST['rol'])
    ) {
        echo "<h3>please fill in all fields<h3>";


    } else {

        if ($password != $password1) {
            echo "Passwords moeten hetzelfde zijn<br>";

        } else {

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Enter a Valid email";
            } else {

                if (strlen($password) <= 5) {
                    echo "Choose a password longer then 6 character";

                } else {


                    mysqli_select_db($connection, $DBname);
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "INSERT INTO $DBtable (Voornaam, Achternaam, Email, Wachtwoord, Studentnr, Verified,`Type`,img_path,color_path,Quote) 
        VALUES ('$firstname', '$lastname', '$email', '$password',NULL,Null,'$rol',NULL,NULL,NULL)";
                    $DBresult = mysqli_query($connection, $sql);
                    echo ($result === false) ? "ERROR" . mysqli_errno($connection) . " : " . mysqli_error($connection) : "<br><br><h3>Bedankt voor het registreren<h3>";
                }

            }
        }
    }
}

?>
</div>
</div>
</div>






<?php

include_once 'hidden.footer.php';

?>

</body>

</html>
