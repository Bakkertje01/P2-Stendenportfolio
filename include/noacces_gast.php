<?php
function redirect_to($new_location)
{
	header("Location: " . $new_location);
	exit;
}
if ($_SESSION['Type'] != 'gast'){
	redirect_to("index.php");
}
if(!isset($_SESSION['Gebruiker_ID']) || empty($_SESSION['Gebruiker_ID'])) {
	redirect_to("index.php");
}
if(!isset($_SESSION['Type']) || empty($_SESSION['Type'])) {
	redirect_to("index.php");
}

?>