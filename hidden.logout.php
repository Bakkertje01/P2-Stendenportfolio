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

    echo"<P>U bent Uitgelogd. <a href='index.php'>Ok!</a></P>";

    ?>
</div>




</body>

</html>
