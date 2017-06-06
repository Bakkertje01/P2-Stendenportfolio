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


        $homePicture = fileToArray('homepic/afb.txt', 0);
        $homePicture1 = fileToArray('homepic/afb1.txt', 0);
        $homePicture2 = fileToArray('homepic/afb2.txt', 0);
        $homePicture3 = fileToArray('homepic/afb3.txt', 0);

        ?>
    </div>
</div>

<div class="container-fluid bg-3 text-center">
    <div class="row">
        <div class="col-sm-3">
            <p>Landingpage object</p>
            <img src="<?php echo $homePicture?>" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Landingpage object</p>
            <img src="<?php echo $homePicture1?>" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Landingpage object</p>
            <img src="<?php echo $homePicture2?>" class="img-responsive" style="width:100%" alt="Image">
        </div>
        <div class="col-sm-3">
            <p>Dingo</p>
            <img src="<?php echo $homePicture3?>" class="img-responsive" style="width:100%" alt="Image">
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


