<?php session_start(); ?>
<html>

<head>

</head>

<body>
<?php

include 'hidden.header.php';
include 'hidden.menu.php';
?>



<div class="jumbotron">


	<?php


	if(isset($_GET['page'])){
		include("hidden." . $_GET['page']. ".php");
	}
	else{


		if(isset($_SESSION['loggedIn'])){

			var_dump($_SESSION['loggedIn']);
			echo "<p>U bent ingelogd</p>";
			echo "<a href='hidden.loggedin.php?page=logout'>klik hier om uit te loggen</a>";

		}
		else{

			echo "U bent niet ingelogd<br /><br />";
			//include ("hidden.login.php");
		}


	}

	?>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
