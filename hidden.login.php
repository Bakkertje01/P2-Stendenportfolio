<?php
/**
 * Created by Sander Paping.
 * User: Sander Paping
 * Date: 31-5-2017
 * Time: 11:19
 */

?>

<html>

<head>
    <link rel="icon" type="image/png" href="fav.png"/>
</head>

<body>
<?php
include_once 'hidden.header.php';
include_once 'hidden.menu.php';
?>

<?php
if (isset($_POST['submit'])) {

	//check if username and password are correct
	if ($_POST['un'] == "test user" && $_POST['pw'] == "test123") {
		$_SESSION['loggedIn'] = true;
		echo "<p>you are logged in</p>";
		// SUGGESTION : gebruik header() om meteen naar home to gaan inplaats van link
		echo "<a href='index.php'>back to home</a><br><br>";
		echo "<a href='hidden.loggedin.php?page=logout'>klik hier om uit te loggen</a>";
	} else {
		echo "<p style='color: red;'>wrong username and/or password</p>";
	}
} else {
	include_once ("hidden.inlogform.html");
}

?>





<?php

include_once 'hidden.footer.php';

?>

</body>

</html>

