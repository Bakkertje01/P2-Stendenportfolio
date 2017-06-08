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



/*
function message() {
    if (isset($_SESSION["message"])) {
        $output = "<div class=\"message\">";
        $output .= htmlentities($_SESSION["message"]);
        $output .= "</div>";

        //clear message
        $_SESSION["message"] = null;
        return $output;
    }
}
function errors(){
    if (isset($_SESSION["errors"])) {
        $errors = $_SESSION["errors"];

        //clear message
        $_SESSION["errors"] = null;
        return $errors;
    }
}
*/
?>