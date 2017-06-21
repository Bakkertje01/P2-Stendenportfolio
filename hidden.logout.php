<?php
include_once 'include/session.php';
$_SESSION = array();
session_unset();

?>
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

    echo"<P>U bent uitgelogd, <a href='index.php'>Klik hier om naar de hoofdpagina te gaan.</a></P>";

    ?>
</div>




</body>

</html>
