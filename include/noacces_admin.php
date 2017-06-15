<?php
if(!isset($_SESSION['Gebruiker_ID']) || empty($_SESSION['Gebruiker_ID'])) {
	header("refresh: index.php");
}/*
if(!isset($_SESSION['Type']) || empty($_SESSION['Type'])) {
	header("refresh: index.php");
}
if ($_SESSION['Type'] != 'admin'){
	header("refresh: index.php");
}*/
?>