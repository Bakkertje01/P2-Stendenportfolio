
<html>

<head>
	<link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php
require_once "include/db_connection.php";
include_once 'include/session.php';
include_once 'include/noacces_gast.php';
include 'hidden.header.php';
include 'hidden.menu.php';
?>


<div class="jumbotron">
	<div class="container text-center">
		<h3>Gast pagina</h3>
		<div id="wrapper">
			<div id='content'>

				<?php
/*
				$result = mysqlI_query($connection, "SELECT * FROM user WHERE Gebruiker_ID='" . $_SESSION["Gebruiker_ID"] . "'")
				or die ('error: '. mysqli_error($connection));
				$row = mysqli_fetch_array($result);
*/


				?>
				<p>Welkom <?php echo ucwords($row['Voornaam']); ?> <?php echo ucwords($row['Achternaam']); ?></p>



				<div class="list-group">

					<?php




					$query = "select Achternaam, Voornaam, Studentnr FROM user where Type ='student' order by Voornaam";
					//echo $query;

					$result = mysqli_query($connection, $query);
					if (mysqli_num_rows($result) == 0){
						echo "Er zit niks in de database";
					}
					else {

						while($Row = mysqli_fetch_assoc($result)){
							echo "<a href = 'hidden.foundstudent.php?student=$Row[Studentnr]' class='list-group-item'>".$Row["Voornaam"]," ", $Row["Achternaam"]."</a>";
						}



						//$Row = mysqli_fetch_assoc($result);

						//var_dump($Row);

					}


					?>
				</div>


			</div>
		</div>
	</div>




</div>


<?php

include_once 'hidden.footer.php';

?>

</body>

</html>
