<html>

<head>
    <link rel="icon" type="image/png" href="fav.png"/>
</head>

<body>



<?php



include 'hidden.header.php';
include 'hidden.menu.php';
?>




<div class="jumbotron">
    <div class="container text-center">
        <h1>My Portfolio</h1>
        <p>
            <div id="wrapper">

                <!-- CONTENT -->
                <div id='content'>
                    <h1> Registratie </h1>
                    <?php //echo message(); ?>
                    <?php //$errors = errors(); ?>
                   <?php //echo form_errors($errors); ?>
                    <form id='register' action='hidden.register.php' method='post'>
                        <label for='firstname' >Voornaam*: </label><br/>
                        <input type='text' name='Firstname' id='firstname' maxlength="50" /><br/>

                        <label for='lastname' >Achternaam*: </label><br/>
                        <input type='text' name='Lastname' id='lastname' maxlength="50" /><br/>

                        <label for='email' >Email Address*:</label><br/>
                        <input type='text' name='Email' id='email' maxlength="50" /><br/>

                        <label for='password' >Password*:</label><br/>
                        <input type='password' name='Password' id='password' maxlength="50" /><br/>

                        <label for='phone' >Telefoon*: </label><br/>
                        <input type='text' name='Phone' id='phone' maxlength="10" /><br/>

                        <label for='city' >Woonplaats*: </label><br/>
                        <input type='text' name='City' id='city' maxlength="50" /><br/>

                        <label for='adress' >Adres*: </label><br/>
                        <input type='text' name='StreetAddress' id='adress' maxlength="50" /><br/>

                        <label for='zipcode' >Postcode*: </label><br/>
                        <input type='text' name='Postalcode' id='zipcode' maxlength="6" /><br/>

        <p>* Verplicht in te vullen.</p>
        <input id='submit'type='submit' name='Submit' value='Registreren' /><br/>
        </form>
    </div>


</div>

<?php //require_once("include/session.php") ?>

<?php include 'include/db_connection.php';
//include 'include/functions.php';

?>
<?php
//Registration script
if(isset($_POST["Submit"])){
    //The post values have to be the same as the form <name> tag
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $phone = $_POST['Phone'];
    $city = $_POST['City'];
    $streetaddress = $_POST['StreetAddress'];
    $postalcode = $_POST['Postalcode'];
    //validaton
    $required_fields = array("Firstname", "Lastname", "Email", "Password", "Phone", "City", "StreetAddress", "Postalcode");
    //validate_presences($required_fields);
    //if (!empty($errors)) {
    //    $_SESSION["errors"] = $errors;
     //   redirect_to('hidden.register.php');
    //}
    //hasing the password
    //$password = password_encrypt($_POST["Password"]);
    //defining the query
    $sql  = "INSERT INTO customer ";
    $sql .= "(Firstname, Lastname, Email, Password, Phone, City, StreetAddress, Postalcode) ";
    $sql .= "VALUES ('$firstname', '$lastname', '$email', '$password', '$phone', '$city', '$streetaddress', '$postalcode')";
    $result = mysqli_query($connection, $sql);
    //check_query($result);
    //message when registration passes or fails
    if($result){
        $_SESSION["message"] = "Registratie succesvol. U kunt nu direct inloggen.";
        //redirect_to("hidden.login.php");
    }else{
        $_SESSION["message"] = "Registratie mislukt. Probeer het nogmaals.";
    }
}
?>

</p>
    </div>
</div>

<div class="container-fluid bg-3 text-center">
    <h3>Some of my Work</h3><br>
    <div class="row">
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
    </div>
</div><br>

<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Some text..</p>
            <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
        </div>
    </div>
</div><br><br>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
