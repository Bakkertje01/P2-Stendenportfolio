<?php
include 'include/session.php';
include 'include/db_connection.php';

$message = "";
if (!empty($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];


	$result = mysqli_query($connection, "SELECT * FROM user WHERE Email='$email' and Wachtwoord = '$password'")
	or die ('error: '. mysqli_error($connection));
	$row = mysqli_fetch_array($result);
	if (is_array($row)) {
		$_SESSION["Gebruiker_ID"] = $row['Gebruiker_ID'];
		$_SESSION["Type"] = $row['Type'];
		header('refresh:3;url=profiel.php');
	} else {
		$message = "Invalid Username or Password!";
	}
}
if (!empty($_POST["logout"])) {
	$_SESSION["Gebruiker_ID"] = "";
	session_destroy();
}

if (!empty($_POST["gast"])){
    $_SESSION ["Gast_ID"] = $row['Gebruiker_ID'];

	header('refresh:3;url=index.php');

}
?>
<html>
<head>
    <title>Login</title>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>
<body>
<?php
include_once 'hidden.header.php';
include_once 'hidden.menu.php';
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
                    <div><label for="password">Password</label></div>
                    <div><input name="password" type="password"></div>
                </div>
                <div class="field-group">
                    <div><input type="submit" name="login" value="Login"></span></div>
                </div>
                <div class="field-group">
                    <div><input type="submit" name="gast" value="Gast"></span></div>
                </div>
            </form>
            <p><a href="hidden.register.php">registreren</a></p>
			<?php
		} else {
			$result = mysqlI_query($connection, "SELECT * FROM user WHERE Gebruiker_ID='" . $_SESSION["Gebruiker_ID"] . "'")
			or die ('error: '. mysqli_error($connection));
			$row = mysqli_fetch_array($result);



			?>
                Welkom <?php echo ucwords($row['Voornaam']); ?>, U bent ingelogd. U wordt doorgestuurd naar uw
                <a href="profiel.php">profielpagina</a>.



            <br>

		<?php } ?>
    </div>
</div>
<?php

include_once 'hidden.footer.php';

?>
</body>
</html>




