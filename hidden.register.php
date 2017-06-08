<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>


<?php include 'include/db_connection.php';?>
<?php include 'include/functions.php';?>
<?php include 'include/session.php';?>
<?php
include 'hidden.header.php';
ob_start(); include 'hidden.menu.php';
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
                        <label for='firstname' >Voornaam*: </label><br/>
                        <input type='text' name='Voornaam' id='Voornaam' maxlength="30" /><br/>

                        <label for='lastname' >Achternaam*: </label><br/>
                        <input type='text' name='Achternaam' id='Achternaam' maxlength="30" /><br/>

                        <label for='email' >Email Address*:</label><br/>
                        <input type='text' name='Email' id='Email' maxlength="50" /><br/>

                        <label for='password' >Password*:</label><br/>
                        <input type='password' name='Wachtwoord' id='Wachtwoord' maxlength="50" /><br/>

        <p>* Verplicht in te vullen.</p>
        <input id='submit'type='submit' name='Submit' value='Registreren' /><br/>
        </form>
    </div>


</div>



<?php
//Registration script
if(isset($_POST["Submit"])){
    //The post values have to be the same as the form <name> tag
    $firstname = $_POST['Voornaam'];
    $lastname = $_POST['Achternaam'];
    $email = $_POST['Email'];
    $password = $_POST['Wachtwoord'];

    if (empty ($_POST['Voornaam'])
        || empty ($_POST['Achternaam'])
        || empty ($_POST['Email'])
        || empty ($_POST['Wachtwoord']))
    {
        echo "please fill in all fields";

    }
    else
        {


        //hasing the password
        $password = password_encrypt($_POST["Wachtwoord"]);
        //defining the query
        $sql  = "INSERT INTO gebruiker ";
        $sql .= "(Voornaam, Achternaam, Email, Wachtwoord) ";
        $sql .= "VALUES ('$firstname', '$lastname', '$email', '$password')";
        $result = mysqli_query($connection, $sql);

        header("Location: hidden.login.php");

        ob_end_flush();

        if($result === false){
            echo"ERROR".mysqli_errno()." : ".mysqli_error();
        }


    }

}
?>

</p>
    </div>
</div>

<div class="container-fluid bg-3 text-center">

</div><br>

<div class="container-fluid bg-3 text-center">
    <div class="row">

    </div>
</div><br><br>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
