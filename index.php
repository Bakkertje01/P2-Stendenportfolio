<html>

<head>
    <link rel="icon" type="image/png" href="fav.png"/>

    <?php

    function fileToArray($chooseFile, $arrayindex)
    {
        $f = fopen("$chooseFile", "r");


        while (!feof($f)) {
            $arrM = explode(",", fgets($f));

            shuffle($arrM);

            if ($arrM !== NULL) {
                return " $arrM[$arrayindex]";
            }
        }
        fclose($f);
    }

    ?>
</head>

<body>
<?php

include 'hidden.header.php';
include 'hidden.menu.php';
?>

<div class="jumbotron">
    <div class="container text-center">

        <?php
        $welcomeMssg = fileToArray('welkomberichten.txt', 0);
        echo "<h2>Welkom Bij Stenden Portfolio</h2>
        <p>$welcomeMssg</p>";


        ?>
    </div>
</div>

<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-3">
            <p>Landingpage object</p>
            <img src="pofo1.jpg" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Landingpage object</p>
            <img src="pofo3.jpg" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Landingpage object</p>
            <img src="pofo2.png" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Dingo</p>
            <img src="pofo4.jpg" class="img-responsive" style="width:100%" alt="Image">
        </div>
    </div>
</div>
<br><br>
<br>
<br>
<br>

<?php
include 'hidden.footer.php';


?>

</body>

</html>


