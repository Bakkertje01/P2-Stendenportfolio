<?php require_once("include/session.php") ?>
<?php require_once("include/db_connection.php") ?>
<?php require_once("include/functions.php") ?>
<?php //include "include/repeats/header.php";?>

<?php
$email = "";
if (isset($_POST['submit'])) {
	$required_fields = array("Email", "Password");
	validate_presences($required_fields);
	if (empty($errors)) {
		// Attempt Login
		$email = $_POST["Email"];

		$professor = $_POST["Email"];
		$admin = $_POST["Email"];
		$SLB = $_POST["Email"];
		$password = $_POST["Password"];
		$found_student = attempt_student_login($email, $password);
		$found_professor = attempt_professor_login($professor, $password);
		$found_admin = attempt_admin_login($admin, $password);
		$found_SLB = attempt_slb_login($SLB, $password);
		if ($found_student) {
			// Success
			// Mark user as logged in
			$_SESSION["student_id"] = $found_student["studentID"];
			$_SESSION["firstname"] = $found_student["Firstname"];
			$_SESSION["email"] = $found_student["Email"];
			redirect_to("hidden.student.php");
		} elseif ($found_professor) {
			$_SESSION["professor_id"] = $found_professor["professorID"];
			$_SESSION["firstname"] = $found_professor["Firstname"];
			$_SESSION["professor"] = $found_professor["User"];
			redirect_to("hidden.professor.php");
		} elseif ($found_admin) {
			$_SESSION["admin_id"] = $found_admin["adminID"];
			$_SESSION["firstname"] = $found_admin["Firstname"];
			$_SESSION["admin"] = $found_admin["User"];
			redirect_to("hidden.admin.php");
		} elseif ($found_SLB) {
			$_SESSION["slb_id"] = $found_SLB["slbID"];
			$_SESSION["firstname"] = $found_SLB["Firstname"];
			$_SESSION["slb"] = $found_SLB["User"];
			redirect_to("hidden.slb.php");
		} else {
			$_SESSION["message"] = "Onjuist gebruikersnaam en/of wachtwoord.";
		}
	}
} else {
	// This is probably a GET request

} // end: if (isset($_POST['submit']))
?>
<body>
<!-- MENU -->
<?php
include 'hidden.header.php';
include 'hidden.menu.php';
?>

<!-- CONTENT -->
<div class='jumbotron'>
    <div class="container text-center">

        <h1>Login</h1>
		<?php echo message(); ?>
		<?php echo form_errors($errors); ?>
        <p>Als u gebruik wil maken van het portfolio moet u eerst inloggen. Als dit de eerste keer is dat u <br>
            deze site bezoekt moet u zich eerst registreren. Na het registreren kunt u inloggen en gebruik <br>
            maken van onze dienst.<br></p>
        <form id='login' action='hidden.login.php' method='post'>
            <label for='email'>Email Address*:</label><br/>
            <input type='text' name='Email' id='email' maxlength="50" value="<?php echo htmlentities($email); ?>"/><br/>

            <label for='password'>Password*:</label><br/>
            <input type='password' name='Password' id='password' maxlength="50"/><br/>
            <br/>
            <table>
                <tr>
                    <td>
                        <input id="submit" type='submit' name='submit' value='Aanmelden'/>
                        <p><a href="hidden.register.php">Student registratie</a></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

include 'hidden.footer.php';

?>
</body>