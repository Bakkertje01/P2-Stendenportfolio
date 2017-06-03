<?php //require_once("../include/session.php") ?>
<?php //require_once("../include/db_connection.php") ?>
<?php //require_once("../include/functions.php") ?>
<?php //require_once("../include/noacces.php") ?>
<html>

<head>
	<link rel="icon" type="image/png" href="fav.png"/>

</head>

<body>
<?php

include 'hidden.header.php';
include 'hidden.menu.php';
?>



<div class="jumbotron">
	<h1>Uw gegevens</h1>
	<h2>Persoonlijke gegevens</h2>
	<?php
	$sql = "SELECT Firstname, Lastname, Email, Phone, City, Postalcode, StreetAddress FROM Customer WHERE CustomerID =".$_SESSION['user_id']." LIMIT 1";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);
	if($row == false)
		echo $sql;
	?>
</div>
	<div id="profilepic">
		<img src="<?php ?>" title="<?php echo name; ?>" alt="<?php echo name; ?>">
	</div>
	<div id="profileinfo">
		<form id='change' action='changeUser.php' method='post'>
			<table style="width:75%">
				<tr>
					<td>Voornaam:</td>
					<td><?php echo $row['Firstname'] ."<br/>"; ?></td>
				</tr>
				<tr>
					<td>Achternaam:</td>
					<td><?php echo $row['Lastname'] ."<br/>"; ?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php echo $row['Email'] ."<br/>"; ?></td>
				</tr>
				<tr>
					<td>Telefoon:</td>
					<td><?php echo $row['Phone'] ."<br/>"; ?></td>
				</tr>
				<tr>
					<td>Woonplaats:</td>
					<td><?php echo $row['City'] ."<br/>"; ?></td>
				</tr>
				<tr>
					<td>Adres:</td>
					<td><?php echo $row['StreetAddress'] ."<br/>";?></td>
				</tr>
				<tr>
					<td>Postcode:</td>
					<td><?php echo $row['Postalcode'] ."<br/>"; ?></td>
				</tr>
			</table>

			<br/>
			<input id="submit" type='submit' name='update' value='Wijzigen' /><br/>
		</form>
	</div>
	<div id="profilecv">

	</div>

	<div class="container-fluid bg-3 text-center">
		<h3>Some of my Work</h3><br>
		<div class="row">
			<div class="col-sm-3">
				<p>Some text..</p>
				<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
			</div>
			<div class="col-sm-3">
				<p>Some text..</p>
				<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
			</div>
			<div class="col-sm-3">
				<p>Some text..</p>
				<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
			</div>
			<div class="col-sm-3">
				<p>Some text..</p>
				<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
			</div>
		</div>
	</div><br>

	<div class="container-fluid bg-3 text-center">
		<div class="row">
			<div class="col-sm-3">
				<p>Some text..</p>
				<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
			</div>
			<div class="col-sm-3">
				<p>Some text..</p>
				<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
			</div>
			<div class="col-sm-3">
				<p>Some text..</p>
				<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
			</div>
			<div class="col-sm-3">
				<p>Some text..</p>
				<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
			</div>
		</div>
	</div>

<?php

include 'hidden.footer.php';

?>

</body>

