<?php
// DATABASE CONNECTION
define("DB_SERVER", "localhost");//database host
define("DB_USER", "root");                //database login name
define("DB_PASS", "");                //database login password
define("DB_NAME", "portfolio");        //database name
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

//Test connection
if (mysqli_connect_errno()) {
    die ("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
}

else {
    echo "connected";
}

?>