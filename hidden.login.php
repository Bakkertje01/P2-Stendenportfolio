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
include 'hidden.header.php';
include 'hidden.menu.php';
?>

<?php
if (isset($_POST['submit'])) {

	//check if username and password are correct
	if ($_POST['un'] == "test user" && $_POST['pw'] == "test123") {
		$_SESSION['loggedIn'] = true;
		echo "<p>you are logged in</p>";
		echo "<a href='index.php'>back to home</a>";
	} else {
		echo "<p style='color: red;'>wrong username and/or password</p>";
	}
} else {
	include ("hidden.inlogform.html");
}

?>





<?php

include 'hidden.footer.php';

?>

</body>

</html>

