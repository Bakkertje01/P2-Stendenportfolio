<?php

if (isset($_POST['bekijk'])) {

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

    if (!empty($folder)) {
        foreach (array_reverse($files1) as $file1) {
            $numberOfFiles = count($file1);
        }

        if ($numberOfFiles > 0) {

            foreach (array_reverse($files1) as $file1) {
                $filetypes = explode('.', $file1);
                $fileTitle = explode('--', $file1);


                if ($filetypes[2] == 'jpg' || $filetypes[2] == 'png' || $filetypes[2] == 'jpeg' || $filetypes[2] == 'JPG' || $filetypes[2] == 'gif') {

                    $deftitle = ucfirst($fileTitle[1]);


                    echo " <div class='col-sm-3'><h5>$deftitle</h5>";

                    echo "<a href='$file1' download><img src='$file1' title='$deftitle' class='img-responsive' style='width:100%' alt='$file1'></a>";

                    echo "</div>";


                }
                if ($filetypes[2] == 'doc' || $filetypes[2] == 'docx' || $filetypes[2] == 'pdf' || $filetypes[2] == 'xls' || $filetypes[2] == 'xlsx') {

                    $deftitle = ucfirst($fileTitle[1]);


                    if ($filetypes[2] == 'doc' || $filetypes[2] == 'docx' || $filetypes[2] == 'xls' || $filetypes[2] == 'xlsx') {
                        $thumbnail = 'woex.jpg';
                    }
                    if ($filetypes[2] == 'pdf') {
                        $thumbnail = 'pdf.jpg';
                    }

                    echo " <div class='col-sm-3'><h5>$deftitle ($filetypes[2])</h5>";

                    echo "<a href='$file1' download><img src='thumbnails/$thumbnail' title='$deftitle' class='img-responsive' style=\"width:100%\" alt=\"$file1\"></a>";

                    echo "</div>";
                }

            }
        } else {
            echo "Deze map bevat geen bestanden";
        }

    }


}

if (isset($_POST['reset'])) {

    $datumin = NULL;
    $mapin = NULL;

}


//V-Uit de Session Halen-V

$naam = "Henk";
$studentquote = "Ik houd erg veel van vlaflip en macaroni";


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
    <div class="container text-center">
        <h3>Bestanden van <?php echo $naam; ?></h3>
        <p><i>'<?php echo $studentquote; ?>'</i></p>
    </div>
</div>

<div class="container text-center">


    <form action="Mijn%20Uploads.php" method="post" enctype="multipart/form-data">


        <h3>Selecteer map:</h3>

        <?php

        $dropoptions = array('CV', 'Afbeeldingen', 'Documenten');

        echo "<select name='date'>";
        foreach ($dropoptions as $item) {


            $finalnameoffolder = str_replace($exlude, '', $item);


            echo "<option value='$finalnameoffolder'>$finalnameoffolder</option>";
        }
        echo "</select>";

        ?>


        <p>
        <center><input id="bekijkup" type="submit" name="bekijk"
                       value="Verstuur">
            <input id="bekijkup" type="submit" name="reset" value="Reset"></center>
        </p>


    </form>

    <div>

        <p><?php

            if (isset($_POST['bekijk'])) {

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










