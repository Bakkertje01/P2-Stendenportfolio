<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php

include_once 'hidden.header.php';
include_once 'hidden.menu.php';
?>



<div class="jumbotron">
	<?php
	if (!empty($_POST["logout"])) {
		$_SESSION["studentID"] = "";
		session_destroy();
	}
	echo"<P>U bent Uitgelogd</P>";
	echo "<a href='index.php'>terug</a>";
	?>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
