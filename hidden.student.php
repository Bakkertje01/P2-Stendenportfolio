<?php require_once("include/session.php") ?>
<?php require_once("include/db_connection.php") ?>
<?php require_once("include/functions.php") ?>
<?php //require_once("include/noacces.php") ?>
<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>

</head>

<body>
<?php

include 'hidden.header.php';
include 'hidden.menu.php';
?>


<div class="profile">
    <h1>Uw gegevens</h1>
    <h2>Persoonlijke gegevens</h2>
	<?php
	$sql = "SELECT Firstname, Lastname, Email, Phone, City, Postalcode, StreetAddress FROM students WHERE studentID =" . $_SESSION['student_id'] . " LIMIT 1";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($row == false)
		echo $sql;
	?>

    <div id="profile-pic">
        <img src="">
    </div>

    <div id="profileinfo">
        <form id='change' action='hidden.student.php' method='post'>
            <table style="width:75%">
                <tr>
                    <td>Voornaam:</td>
                    <td><?php echo $row['Firstname'] . "<br/>"; ?></td>
                </tr>
                <tr>
                    <td>Achternaam:</td>
                    <td><?php echo $row['Lastname'] . "<br/>"; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $row['Email'] . "<br/>"; ?></td>
                </tr>
                <tr>
                    <td>Telefoon:</td>
                    <td><?php echo $row['Phone'] . "<br/>"; ?></td>
                </tr>
                <tr>
                    <td>Woonplaats:</td>
                    <td><?php echo $row['City'] . "<br/>"; ?></td>
                </tr>
                <tr>
                    <td>Adres:</td>
                    <td><?php echo $row['StreetAddress'] . "<br/>"; ?></td>
                </tr>
                <tr>
                    <td>Postcode:</td>
                    <td><?php echo $row['Postalcode'] . "<br/>"; ?></td>
                </tr>
            </table>

            <br/>
            <input id="submit" type='submit' name='update' value='Wijzigen'/><br/>
        </form>
    </div>
	<?php
	if (isset($_POST["submit"])) {
		$firstname = $_POST['Firstname'];
		$lastname = $_POST['Lastname'];
		$email = $_POST['Email'];
		$phone = $_POST['Phone'];
		$city = $_POST['City'];
		$streetaddress = $_POST['StreetAddress'];
		$postalcode = $_POST['Postalcode'];
		$result = mysqli_query($connection, $sql);
		$row = mysqli_fetch_assoc($result);
		$sql = "UPDATE Customer ";
		$sql .= "SET Firstname='$firstname', Lastname='$lastname', Email ='$email', Phone ='$phone', City ='$city', Postalcode = '$postalcode', StreetAddress='$streetaddress' ";
		$sql .= "WHERE CustomerID =" . $_SESSION['user_id'] . " LIMIT 1";
		$result = mysqli_query($connection, $sql);
		check_query($result);
		//message when registration passes or fails
		if ($result) {
			$_SESSION["message"] = "Wijzigen succes.";
			redirect_to("hidden.student.php");
		} else {
			$_SESSION["message"] = "Wijzigen mislukt, probeert het nog eens";
		}
	}
	?>
</div>


<?php

include_once 'hidden.footer.php';

?>

</body>

