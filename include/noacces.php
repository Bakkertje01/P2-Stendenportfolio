<?php

function redirect_to($new_location)
{
	header("Location: " . $new_location);
	exit;
}

if(!isset($_SESSION['Gebruiker_ID']) || empty($_SESSION['Gebruiker_ID'])) {
	redirect_to("index.php");
}
?>