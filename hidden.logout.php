<?php
include 'include/session.php';
session_destroy();

?>
<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php

include 'hidden.header.php';
ob_start();
include 'hidden.menu.php';
?>



<div class="jumbotron">
	<?php

	echo"<P>U bent Uitgelogd</P>";
	header('refresh:3;index.php');
	ob_end_flush();
	?>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
