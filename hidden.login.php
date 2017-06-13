<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "portfolio");
$connBackup = mysqli_connect("localhost", "root", "", "portfolio");

$message = "";
if (!empty($_POST["login"])) {
	$result = mysqli_query($conn, "SELECT * FROM user WHERE Email='" . $_POST["email"] . "' and Wachtwoord = '" . $_POST["password"] . "'");
	$row = mysqli_fetch_array($result);
	if (is_array($row)) {
		$_SESSION["Gebruiker_ID"] = $row['Gebruiker_ID'];
		ob_start();
		header('refresh:3;url=upload.php');
		ob_end_flush();
	} else {
		$message = "Invalid Username or Password!";
	}
}
if (!empty($_POST["logout"])) {
	$_SESSION["Gebruiker_ID"] = "";
	session_destroy();
}
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
            <form action="" method="post" id="frmLogin">
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
                    <div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
                </div>
            </form>
            <p><a href="hidden.register.php">registreren</a></p>
			<?php
		} else {
			$result = mysqlI_query($conn, "SELECT * FROM user WHERE Gebruiker_ID='" . $_SESSION["Gebruiker_ID"] . "'");
			$row = mysqli_fetch_array($result);



			?>
                Welcome <?php echo ucwords($row['Voornaam']); ?>, You have successfully
                logged in!



            <br>

		<?php } ?>
    </div>
</div>
<?php

include 'hidden.footer.php';

?>
</body>
</html>




