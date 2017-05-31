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
	session_destroy();
	echo"<P>U bent Uitgelogd</P>";
	echo "<a href='index.php'>back to home</a>";
	?>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
