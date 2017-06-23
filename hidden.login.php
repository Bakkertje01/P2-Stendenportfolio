<?php
include_once 'include/session.php';
include_once 'include/db_connection.php';

if(isset($_SESSION['Gebruiker_ID'])){
	header("location:index.php");
}

$message = "";
if (!empty($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);


	$result = mysqli_query($connection, "SELECT * FROM user WHERE Email='$email' LIMIT 1")
	or die ('error: '. mysqli_error($connection));

	$row = mysqli_fetch_array($result);
	if (is_array($row) && password_verify($password, $row['Wachtwoord']) ) {

		$_SESSION["Gebruiker_ID"] = $row['Gebruiker_ID'];
        $_SESSION["Type"] = $row['Type'];

		if($_SESSION['Type']== 'student'){
		header('refresh:3;url=profiel.php');
		}
		if($_SESSION['Type']== 'admin'){
			header('refresh:3;url=hidden.admin_landing.php');
		}
		if($_SESSION['Type']== 'slb'){
			header('refresh:3;url=hidden.slb_landing.php');
		}
		if($_SESSION['Type']== 'docent'){
			header('refresh:3;url=hidden.docent_landing.php');
		}

	} else {
		$message = "Invalid Username or Password!";
	}
}
/*
if (!empty($_POST["logout"])) {
	$_SESSION["Gebruiker_ID"] = "";
	session_destroy();
}
*/

?>
<html>
<head>
    <title>Login</title>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>
<body>
<?php
include 'hidden.header.php';
include 'hidden.menu.php';
?>
<div class='jumbotron'>
    <div class="container text-center">
		<?php
        if (empty($_SESSION["Gebruiker_ID"])) { ?>
            <form action="" method="post">
                <div class="error-message"><?php if (isset($message)) {
						echo $message;
					} ?></div>
                <p>Als u gebruik wil maken van het portfolio moet u eerst inloggen. Als dit de eerste keer is dat u <br>
                    deze site bezoekt moet u zich eerst registreren. Na het registreren kunt u inloggen en gebruik <br>
                    maken van onze dienst.<br></p>
                <div class="field-group">
                    <div><label for="login">Email</label></div>
                    <div><input name="email" type="text"></div>
                </div>
                <div class="field-group">
                    <div><label for="password">Wachtwoord</label></div>
                    <div><input name="password" type="password"></div>
                </div>
                <div class="field-group">
                    <div><input type="submit" name="login" value="Login"></span></div>
                </div>
            </form>
            <p><a href="hidden.register.php">Registreren</a></p>
			<?php
		} else {
			$result = mysqlI_query($connection, "SELECT * FROM user WHERE Gebruiker_ID='" . $_SESSION["Gebruiker_ID"] . "'")
			or die ('error: '. mysqli_error($connection));
			$row = mysqli_fetch_array($result);



			?>
                Welkom <?php echo ucwords($row['Voornaam']); ?>, U bent ingelogd als <?php echo ucwords($row['Type']); ?>. U wordt doorgestuurd naar uw <?php echo ucwords($row['Type']); ?>
                <!--<a href="profiel.php">-->pagina<!--</a>-->.



            <br>

		<?php } ?>
    </div>
</div>
<?php

include 'hidden.footer.php';

?>
</body>
</html>




