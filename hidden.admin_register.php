<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php
$connection = mysqli_connect("127.0.0.1","root","");
include 'hidden.header.php';
include 'hidden.menu.php';
?>


<div class="jumbotron">
    <div class="container text-center">
        <h1>administrator registration</h1>
            <div id="wrapper">
                <div id='content'>
                <form id='register' action='hidden.admin_register.php' method='post'>
                    <label for='firstname' >Voornaam*: </label><br/>
                    <input type='text' name='Firstname' id='firstname' maxlength="50" /><br/>

                    <label for='lastname' >Achternaam*: </label><br/>
                    <input type='text' name='Lastname' id='lastname' maxlength="50" /><br/>

                    <label for='email' >Email Address*:</label><br/>
                    <input type='text' name='Email' id='email' maxlength="50" /><br/>

                    <label for='password' >Password*:</label><br/>
                    <input type='password' name='Password' id='password' maxlength="50" /><br/>

                    <p>Please pick a role to determined which authorisation you will be given upon registration</p><br>
                    <select name = "rol" >
                        <option  value = "docent" >Docent</option>
                        <option  value = "slb" >SLB</option>
                    </select><br>
                </div>


    <input id='submit'type='submit' name='Submit' value='Registreren' /><br/>

</form>

<?php

if(isset($_POST["Submit"])){
    $DBname = "portfolio";
    $DBtable = "user";
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $rol = $_POST['rol'];
    $firstname = str_replace(array('\'', '"'), '', $firstname);
    $lastname = str_replace(array('\'', '"'), '', $lastname);
    $email = str_replace(array('\'', '"'), '', $email);
    $password = str_replace(array('\'', '"'), '', $password);

    if (empty ($_POST['Firstname'])
        || empty ($_POST['Lastname'])
        || empty ($_POST['Email'])
        || empty ($_POST['Password'])
        || empty ($_POST['rol'])) {
        echo "<h3>please fill in all fields<h3>";

    }else{
        mysqli_select_db($connection,$DBname);
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql  = "INSERT INTO $DBtable (Voornaam, Achternaam, Email, Wachtwoord, Studentnr, Verified,`Type`,img_path,color_path,Quote) 
        VALUES ('$firstname', '$lastname', '$email', '$password',NULL,Null,'$rol',NULL,NULL,NULL)";
        $DBresult = mysqli_query($connection, $sql);
        echo($result === false)?"ERROR".mysqli_errno($connection)." : ".mysqli_error($connection): "<h3> Thanks for submiting<h3>";
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
