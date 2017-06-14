<?php
if(!isset($_SESSION['Gebruiker_ID']) || empty($_SESSION['Gebruiker_ID'])) {
	header("refresh: index.php");
}
?>