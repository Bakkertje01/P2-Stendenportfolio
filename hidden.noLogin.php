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
    <div class="container text-center">
        <h1>Sorry!</h1>
        <p>U bent niet ingelogd</p>
        <p>Zonder in te loggen heeft u geen toegang tot de portfolio's</p>
        <p><a href="hidden.login.php">Login</a></p>
        <img src="homepic/whoops.png" style="margin:0 auto; width: 40%;" alt="niet ingelogd">
    </div>
</div>


<?php

include_once 'hidden.footer.php';
?>

</body>

</html>
<?php
die;
?>