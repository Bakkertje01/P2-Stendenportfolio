<?php
include 'include/session.php';
$_SESSION = array();
session_unset();

?>
<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php

include 'hidden.header.php';

include 'hidden.menu.php';
?>



<div class="jumbotron">
    <?php

    echo"<P>U bent Uitgelogd</P>";

    ?>
</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
