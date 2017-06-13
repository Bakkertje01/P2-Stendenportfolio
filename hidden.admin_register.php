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
        <p>
            <div id="wrapper">

                <!-- CONTENT -->
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
                        <option  value = "admin" >Admin</option>
                        <option  value = "docent" >Docent</option>
                        <option  value = "slb" >SLB</option>
                    </select><br>

    <p>* Verplicht in te vullen.</p>
    <input id='submit'type='submit' name='Submit' value='Registreren' /><br/>

</form>
</div>

<?php
if(isset($_POST["Submit"])){
    //The post values have to be the same as the form <name> tag
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $rol = $_POST['rol'];


    if (empty ($_POST['Firstname'])
        || empty ($_POST['Lastname'])
        || empty ($_POST['Email'])
        || empty ($_POST['Password'])
        || empty ($_POST['Phone'])
        || empty ($_POST['City'])
        || empty ($_POST['StreetAddress'])
        || empty ($_POST['Postalcode'])
        || empty ($_POST['rol']))
    {
        echo "<h3>please fill in all fields<h3>";

    }
    else
    {
        //hasing the password
        $password = password_encrypt($_POST["Password"]);
        //defining the query

        $sql  = "INSERT INTO customer (Firstname, Lastname, Email, Password) 
        VALUES ('$firstname', '$lastname', '$email', '$password')";
        $result = mysqli_query($connection, $sql);


        if($result === false){
            echo"ERROR".mysqli_errno()." : ".mysqli_error();
        }
        if($rol == "admin"){        /// waarden die ingevoerd worden moet unique zijn
            $rol = "INSERT INTO user_type (Admin) Values ('') ";
        }elseif ($rol == "docent"){
            $rol = "INSERT INTO user_type (Docent) Values ('') ";
        }elseif ($rol == "slb"){
            $rol = "INSERT INTO user_type (SLB) Values ('') ";
        }

    }

}
?>
</div>
</div>






<?php

include 'hidden.footer.php';

?>

</body>

</html>
