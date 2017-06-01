<html>

<head>
    <link rel="icon" type="image/png" href="fav.png"/>
</head>

<body>
<?php

include_once 'hidden.header.php';
include_once 'hidden.menu.php';
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
