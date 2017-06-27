
<?php


include_once('include/session.php');

if (isset($_POST['bekijk'])) {

    $datumin = $_POST['date'];

    if (empty($_POST['map'])) {
        $map = NULL;
    } else {
        $map = $_POST['map'];
    }
}

function dateSelect($datum, $folder, $verified)
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

                    echo $verified;

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

                    echo "<a href='$file1' target='_blank'><img src='thumbnails/$thumbnail' title='$deftitle' class='img-responsive' style=\"width:100%\" alt=\"$file1\"></a>";

                    echo $verified;

                    echo "</div>";
                }

            }
        } else {
            echo "<p>Deze map bevat geen bestanden</p>";
            $numberOfFiles = NULL;
            exit();
        }

    }


}

if (isset($_POST['reset'])) {

    $datumin = NULL;
    $mapin = NULL;

}

//V-Uit de Session Halen-V


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
    <div class="container text-center">
        <h3>Bestanden van <?php echo "$studentnaam $studentachter"; ?></h3>

        <?php
        $student_ID = $_SESSION['Gebruiker_ID'];
        $SQLgetfiles = ("SELECT * FROM files where Gebruiker_ID  = '$student_ID'");
        $Getfiles = mysqli_query($connection, $SQLgetfiles);
        $row = mysqli_fetch_assoc($Getfiles);
        $filepath = $row['Files_path'].$row['Filename'];
        $filetype = $row['Filetype'];



        // echo "<div class='avatar'><img class='img-responsive' src='$filepath' width='200px' height='100px' alt='Profielfoto'></div>";
        ?>

       <img width="20%" <?php echo "src='".$filepath."'" ?> alt="profielfoto" title="Profielfoto">
          <p><i>'<?php echo $studentquote; ?>'</i></p>
        </div>
    <div class="container text-center">

        <p><?php

            $subdirs = array('CV','Documenten','Afbeeldingen');
            $x =0;

            //foreach ($subdirs as $subdir) {

            while ($row = mysqli_fetch_assoc($Getfiles)) {
                echo "<div class='container text-center'><p>";
                echo "<h4>$subdirs[$x] van $studentnaam</h4>";
                echo "<a href = '".$row['Files_path'].$row['Filename']."'><img  src = ".($filetype == 'Documenten' ||$filetype == 'CV')? :  ." alt = 'bestand'></a>";
                //echo dateSelect($studentnumber, $subdir, $waarmerk);
                $x++;
            }

                echo "</p><br><br></div>";
           // }

            ?>



        <p><i>'<?php echo $studentquote; ?>'</i></p>

        </p>
    </div>

</div>


<?php

include_once 'hidden.footer.php';
?>

</body>

</html>










