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

</head>

<body>
<?php

include 'hidden.header.php';
include 'hidden.menu.php';
?>



<div class="jumbotron">
	<div class="container text-center">
		<h1>Login</h1>

		<p>Als u gebruik wil maken van deze dienst moet u eerst inloggen. Als dit de eerste keer is dat u <br>
			deze site bezoekt moet u zich eerst registreren. Na het registreren kunt u inloggen en gebruik <br>
			maken van onze dienst.<br></p>
		<form id='login' action='hidden.login.php' method='post'>
			<label for='Gebruikersnaam'>Gebruikersnaam*:</label><br/>
			<input type='text' name='un' id='Gebruikersnaam' maxlength="50" value=""/><br/>

			<label for='password'>Wachtwoord*:</label><br/>
			<input type='password' name='pw' id='password' maxlength="50"/><br/>
			<br/>
			<input id="submit" type='submit' name='submit' value='Aanmelden'/><br>
			<a href="hidden.register.php">Registreren</a>
		</form>
	</div>
</div>

</html>



<?php

include 'hidden.footer.php';

?>

</body>


<div id=''>


</div>

