<?php
if(!isset($_SESSION['studentID']) || empty($_SESSION['studentID'])) {
	redirect_to("index.php");
}
?>