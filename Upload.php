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


        <label for='Titel'>Naam van je bestand:</label>


        <input type='text' name='Titel' id='email'/>

        <input type='submit' name='verstuur' id='phone' value='Upload'/>


        <input type='submit' name='reset' style="float: right" value="Reset"/>

        </form>
    </div>


</div>


</p>
</div>

<p><?php


    if (isset($_POST['verstuur'])) {


        if (isset($_FILES['upload']) && !empty($_FILES['upload']['name'])) {


            $errors = array();

            if (!empty($_POST['Titel'])) {

                $contains = strpos($_POST['Titel'], '--');

                if (!$contains) {
                    $fileTitle = $_POST['Titel'];
                }
                if ($contains) {
                    $fileTitle = str_replace('--', '_', $_POST['Titel']);
                }
            } else {
                $fileTitle = 'Geen naam opgegeven';
            }


            if (!empty($_POST['dirselect'])) {
                $selectedDir = $_POST['dirselect'];
            } else {
                $selectedDir = 'dank';
            }


            $filePoster = 'henk';

            $file_name = "--$fileTitle--" . $_FILES['upload']['name'];
            $file_size = $_FILES['upload']['size'];
            $file_tmp = $_FILES['upload']['tmp_name'];
            $file_type = $_FILES['upload']['type'];

            $fileTitleup = explode('--', $file_name);

            $ext = explode('.', $file_name);
            $acceptedFiles = array('doc', 'docx', 'xls', 'xlsx', 'pdf', 'jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG');

            if (strpos($ext[1], $acceptedFiles) == false) {
                $errors[] = 'Bestandsformaat niet juist!';

            }

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
                        echo "<center>Nieuwe map voor $dirname aangemaakt</center>";
                    }
                }


                if (is_dir("$StudentDir/$dirname")) {

                    if (!is_dir("$StudentDir/$dirname/$selectedDir")) {
                        mkdir("$StudentDir/$dirname/$selectedDir", 0777);
                        echo "<center>Nieuwe map voor $dirname aangemaakt</center>";
                    }
                }
                $dots = substr_count($file_name, '.');
                if ($dots <= 1) {
                    move_uploaded_file($file_tmp, "$StudentDir/$dirname/$selectedDir/" . $file_name);
                } else {
                    echo "<br><p style='text-align:center;'>Bestandsnaam bevat meer dan 1 punt!<br>Upload Mislukt, verander je bestandsnaam</p>";
                    $file_name = NULL;
                }
                if (strpos($file_name, '.')) {
                    echo "<br><p style='text-align:center;'>Bestand: '$fileTitleup[1]' in de map $selectedDir geplaatst! </p><br>";

                }
            } else {
                foreach ($errors as $error) {
                    echo '<center>' . $error . '</center><br>';
                }
            }
        } else {
            echo "<center><p>Geen bestand gekozen!</p></center>";
        }


    }

    ?></p>
</center>


</form>

<center><p>Upload hier de bestanden die je met de wereld wil delen! <br>
        Zorg dat je de juiste map selecteert.
    </p></center>


</div>


<?php

include 'hidden.footer.php';

?>

</body>

</html>






