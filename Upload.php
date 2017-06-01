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
        <p>
            <div id="wrapper">
                <div id='content'>
                    <h3> Bestanden Uploaden </h3>

                    <form id='register' action='Upload.php' method='post' enctype="multipart/form-data">
                        <label for='upload'>Bestand: </label><br/>
                        <input type='file' name='upload' id='firstname'/><br/>
        <p>Type:</p>

        <?php
        $foldersForUpload = array('CV', 'Afbeeldingen', 'Documenten');

        echo "<select name='dirselect'>";
        foreach ($foldersForUpload as $item) {
            echo "<option value='$item'>$item</option>";

        }
        echo "</select>";

        ?>


        <label for='Titel'>Titel:</label>


        <input type='text' name='Titel' id='email'/><br/>

        <label for='Poster'>Studentnummer: MOET UIT DE SESSION GEHAALD WORDEN</label>
        <input type='text' name='Poster' id='password'/><br/>


        <input type='submit' name='turbo' id='phone' value="Upload" " />


        <input type='submit' name='reset' style="float: right" value="Reset"/><br/><br/>

        </form>
    </div>


</div>


</p>
</div>

<p><?php


    if (isset($_POST['turbo'])) {


        if (isset($_FILES['upload'])) {


            $errors = array();

            if (!empty($_POST['Titel'])) {
                $fileTitle = $_POST['Titel'];
            } else {
                $fileTitle = 'Naamloos geval';
            }

            if (!empty($_POST['Poster'])) {
                $filePoster = $_POST['Poster'];
            } else {
                $filePoster = 'Anoniem';
            }

            if (!empty($_POST['dirselect'])) {
                $selectedDir = $_POST['dirselect'];
            } else {
                $selectedDir = 'dank';
            }


            $file_name = time('h-m-s') . "(+)$fileTitle(+){-}$filePoster{-}" . $_FILES['upload']['name'];
            $file_size = $_FILES['upload']['size'];
            $file_tmp = $_FILES['upload']['tmp_name'];
            $file_type = $_FILES['upload']['type'];

            $fileTitleup = explode('(+)', $file_name);


            if ($file_size > 8388608) {
                $errors[] = 'Bestand is te groot!(8 MB max)';
            }
            if (empty($errors) == true) {
                $StudentDir = 'studentuploads';
                $dirname = "$filePoster";


                if (!is_dir("./$StudentDir")) {
                    mkdir("./$StudentDir", 0777);
                }

                if (!is_dir("$StudentDir/$dirname")) {
                    mkdir("$StudentDir/$dirname", 0777);
                    if (!is_dir("$StudentDir/$dirname/$selectedDir")) {
                        mkdir("$StudentDir/$dirname/$selectedDir", 0777);
                        echo "<center>Map voor $selectedDir aangemaakt</center>";
                    }
                }


                if (is_dir("$StudentDir/$dirname")) {

                    if (!is_dir("$StudentDir/$dirname/$selectedDir")) {
                        mkdir("$StudentDir/$dirname/$selectedDir", 0777);
                        echo "<center>Map voor $dirname aangemaakt</center>";
                    }
                }
                $pupe = substr_count($file_name, '.');
                if ($pupe <= 3) {
                    move_uploaded_file($file_tmp, "$StudentDir/$dirname/$selectedDir/" . $file_name);
                } else {
                    echo "<br><p style='text-align:center;'>Bestandsnaam bevat meer dan 1 punt!<br>Upload gefaald</p>";
                    $file_name = NULL;
                }
                if (strpos($file_name, '.')) {
                    echo "<br><p style='text-align:center;'>Bestand: $fileTitleup[1] in $selectedDir Succes </p><br>";

                }
            } else {
                foreach ($errors as $error) {
                    echo '<center>' . $error . '</center><br>';
                }
            }
        }


    }

    ?></p>
</center>


</form>

<center><p>Upload hier de bestanden die je met de wereld wil delen! <br>
        Zorg dat je de juiste map selecteert.
    </p></center>


</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php

include 'hidden.footer.php';

?>

</body>

</html>






