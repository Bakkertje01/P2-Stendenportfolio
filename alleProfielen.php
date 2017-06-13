<?php

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

                    echo "<a href='$file1' target='_blank'><img src='thumbnails/$thumbnail' title='$deftitle' class='img-responsive' style=\"width:100%\" alt=\"$file1\"></a>";

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


/*
include('include/db_connection.php');


$sql = "SELECT Gebruiker_ID, Voornaam, Studentnr FROM User";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {


        echo "";


        echo "id: " . $row["Gebruiker_ID"] . " <br>- Name: " . $row["Voornaam"] . " <br>Studentnr: " . $row["Studentnr"] . "<br>";
        $studentnaam = $row["Voornaam"];
        $studentnumber = $row["Studentnr"];
        $studentquote = $row["Quote"];

    }
} else {
    $studentnaam = "Gast";

    $studentnumber = "default";
    $studentquote = "Ik ben hier nieuw!";
    echo "0 results";
}

?>

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

                    echo "<a href='$file1' target='_blank'><img src='thumbnails/$thumbnail' title='$deftitle' class='img-responsive' style=\"width:100%\" alt=\"$file1\"></a>";

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
*/

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

    include('include/db_connection.php');


    $sql = "SELECT Gebruiker_ID, Voornaam, Studentnr FROM User";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {


            $studentnaam = $row["Voornaam"];
            $studentnumber = $row["Studentnr"];
            $studentquote = $row["Quote"];

            $profielfoto = "studentuploads/$studentnumber/Profielfoto/pf.jpg";

            echo "    <div class='container text-center'>
        <h3>Bestanden van  $studentnaam</h3>

        <img width='20%' src='$profielfoto' alt='profielfoto'
             title='Profielfoto'>
        <p><i>' $studentquote'</i></p>
    </div>";


            $subdirs = array('CV', 'Afbeeldingen', 'Documenten');


            foreach ($subdirs as $subdir) {

                echo "<div class=\"container text-center\"><p>";
                echo "<h4>$subdir van $studentnaam</h4>";
                echo dateSelect($studentnumber, $subdir);
                echo "</p><br><br></div>";
            }



        }
    } else {
        $studentnaam = "Gast";

        $studentnumber = "default";
        $studentquote = "Ik ben hier nieuw!";
        echo "0 results";
    }




    ?>



</div>

<div class="container text-center">

    <div>

        <p></p>
    </div>


</div>

<?php

include 'hidden.footer.php';
?>

</body>

</html>


<?php


if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $studentnaam = $row["Voornaam"];
        $studentnumber = $row["Studentnr"];
        $studentquote = $row["Quote"];

        echo "    <div class='container text-center'>
        <h3>Bestanden van  $studentnaam</h3>

        <img width='20%' src='$profielfoto' alt='profielfoto'
             title='Profielfoto'>
        <p><i>' $studentquote'</i></p>
    </div>";


        echo "id: " . $row["Gebruiker_ID"] . " <br>- Name: " . $row["Voornaam"] . " <br>Studentnr: " . $row["Studentnr"] . "<br>";


    }
} else {
    $studentnaam = "Gast";

    $studentnumber = "default";
    $studentquote = "Ik ben hier nieuw!";
    echo "0 results";
}


?>









