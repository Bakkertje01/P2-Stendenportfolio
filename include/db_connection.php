<?php
// DATABASE CONNECTION
include_once ('include/Databases/contstants.php');
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

//Test connection
if (mysqli_connect_errno()) {
    die ("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
}

else {
    //echo "connected";
}

?>