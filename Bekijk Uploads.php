<?php

if (isset($_POST['klik'])) {

    $datumin = $_POST['date'];

    if (empty($_POST['map'])) {
        $map = NULL;
    } else {
        $map = $_POST['map'];
    }
}

function dateSelect($datum, $folder)
{

    $dirnamez = "./studentuploads/" . $datum;

    $files1 = glob("$dirnamez/" . "$folder/" . "*");

    if (empty($folder)) {
        foreach (array_reverse($files1) as $file1) {
            echo "<a href='$file1'>-> $file1</a><br>";
        }
    }

    if (!empty($folder)) {
        foreach (array_reverse($files1) as $file1) {
            $numberOfFiles = count($files1);
        }


        foreach (array_reverse($files1) as $file1) {
            $filetypes = explode('.', $file1);
            $fileTitle = explode('(+)', $file1);
            $filePoster = explode('{-}', $file1);


            if ($filetypes[2] == 'jpg' || $filetypes[2] == 'png' || $filetypes[2] == 'jpeg' || $filetypes[2] == 'JPG' || $filetypes[2] == 'gif') {
                if (!empty($fileTitle[1])) {
                    $deftitle = ucfirst($fileTitle[1]);

                    $numberOfFiles = count($files1);


                    echo " <div class='col-sm-3'><h5>$deftitle</h5>";

                    echo "<img src='$file1' class='img-responsive' style='width:100%' alt='$file1'>";

                    echo "</div>";


                }

            } elseif ($filetypes[1] == 'mp4') {
                if (!empty($fileTitle[1])) {
                    $deftitle = ucfirst($fileTitle[1]);
                    echo "<center><h3>$deftitle</h3><br>";
                    echo "<video width='70%' controls><source src='$file1' type='video/mp4'></video><br><a href='$file1' download>^Download video^</a>";

                }

                if (!empty($filePoster[1])) {
                    $defposter = ucfirst($filePoster[1]);
                    echo "<h4>Gepost door: $defposter</h4></center>";
                    echo "<hr style='width: 90%; margin: 0 auto;'>";
                }
            } else {
                if (!empty($fileTitle[1])) {
                    $deftitle = ucfirst($fileTitle[1]);
                    echo "<center><h3>$deftitle</h3><br>";
                }
                echo "<a href='$file1' download>-> $filePoster[2]</a><br>";
                $defposter = ucfirst($filePoster[1]);
                echo "<h4>Gepost door: $defposter</h4></center>";
                echo "<hr style='width: 90%; margin: 0 auto;'>";
                $numberOfFiles = count($files1);
            }


        }

    }

}

if (isset($_POST['reset'])) {

    $datumin = NULL;
    $mapin = NULL;

}


$dropdown = glob("./" . "*");


?>


<html>

<head>
    <link rel="icon" type="image/png" href="fav.png"/>
</head>

<body>
<?php

include 'hidden.header.php';
include 'hidden.menu.php';
?>


<div class="jumbotron">
    <div class="container text-center">
        <h1>Bestanden van [Naam]</h1>
        <p><i>"Zieke quote van [Naam]"</i></p>
    </div>
</div>

<div class="container text-center">

    <h3>Selecteer map:</h3>


    <form action="Bekijk%20Uploads.php" method="post" enctype="multipart/form-data">


        <?php

        $dropoptions = array('CV', 'Afbeeldingen', 'Documenten');

        echo "<select name='date'>";
        foreach ($dropoptions as $item) {


            $finalnameoffolder = str_replace($exlude, '', $item);


            echo "<option value='$finalnameoffolder'>$finalnameoffolder</option>";
        }
        echo "</select>";

        ?>

        <br><br>
        <center><input id="bekijkup" type="submit" name="klik"
                       value="Verstuur">
            <input id="bekijkup" type="submit" name="reset" value="Reset"></center>
        <br><br><br>


    </form>

    <div>

        <p><?php

            if (isset($_POST['klik'])) {

                $studentnumber = 'henk/'; //DIT MOET UIT DE SESSION KOMEN!!!

                $finalnameoffolder = $studentnumber;

                $Typefolder = $_POST['date'];

                $testTheFolder = $finalnameoffolder . $Typefolder;

                echo dateSelect($studentnumber, $Typefolder);

            }

            ?></p>
    </div>


</div>

<?php

include 'hidden.footer.php';
?>

</body>

</html>










