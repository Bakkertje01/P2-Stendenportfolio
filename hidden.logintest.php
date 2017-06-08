<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "portfolio");

$message = "";
if (!empty($_POST["login"])) {
	$result = mysqli_query($conn, "SELECT * FROM students WHERE Email='" . $_POST["email"] . "' and Password = '" . $_POST["password"] . "'");
	$row = mysqli_fetch_array($result);
	if (is_array($row)) {
		$_SESSION["studentID"] = $row['studentID'];
	} else {
		$message = "Invalid Username or Password!";
	}
}
if (!empty($_POST["logout"])) {
	$_SESSION["studentID"] = "";
	session_destroy();
}
?>
<html>
<head>
    <title>User Login</title>

</head>
<body>
<?php
include 'hidden.header.php';
include 'hidden.menu.php';
?>
<div class='jumbotron'>
    <div class="container text-center">

		<?php if (empty($_SESSION["studentID"])) { ?>
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
			<?php
		} else {
			$result = mysqlI_query($conn, "SELECT * FROM students WHERE studentID='" . $_SESSION["studentID"] . "'");
			$row = mysqli_fetch_array($result);
			?>
            <form action="" method="post" id="frmLogout">
                Welcome <?php echo ucwords($row['FirstName']); ?>, You have successfully
                    logged in!<br>
                    Click to <input type="submit" name="logout" value="Logout" class="logout-button">.

            </form>

		<?php } ?>
    </div>
</div>
<?php

include 'hidden.footer.php';

?>
</body>
</html>