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


                        <input type='radio' style="float: left; margin-left: 1px" name='dirselect' value="meme"
                               checked="checked"/><br>
        <p style="float: inherit; text-align: justify">Meme</p>
        <input type='radio' style="float: left;" name='dirselect' value="huiswerk"/><br>
        <p style="float: inherit; text-align: justify">Huiswerk</p>
        <label for='Titel'>Titel:</label>
        <input type='text' name='Titel' id='email'/><br/>

        <label for='Poster'>Poster:</label>
        <input type='text' name='Poster' id='password'/><br/>


        <input type='submit' name='turbo' id='phone' value="Upload" " />


        <input type='submit' name='reset' style="float: right" value="Reset"/><br/><br/>

        </form>
    </div>


</div>


</p>
</div>

<p><?php

    //Map datum gaat veranderen naar uploader, de submappen in de type geuploadde bestanden:
    //Map 'CV', Map 'Opdrachten', Map 'Portfolio' enz..

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
                $errors[] = 'File too big (8 MB max)';
            }
            if (empty($errors) == true) {

                $dirname = "Ingevoerd op " . date('d-m-y');
                if (!is_dir("./$dirname")) {
                    mkdir("./$dirname", 0777);
                    if (!is_dir("./$dirname/$selectedDir")) {
                        mkdir("./$dirname/$selectedDir", 0777);
                        echo '<center>Map voor uploads aangemaakt</center>';
                    }
                }
                if (is_dir("./$dirname")) {

                    if (!is_dir("./$dirname/$selectedDir")) {
                        mkdir("./$dirname/$selectedDir", 0777);
                        echo "<center>Map voor $selectedDir aangemaakt</center>";
                    }
                }
                $pupe = substr_count($file_name, '.');
                if ($pupe <= 1) {
                    move_uploaded_file($file_tmp, "./$dirname/$selectedDir/" . $file_name);
                } else {
                    echo "<br><p style='text-align:center;'>Bestandsnaam bevat meer dan 1 punt!<br>Upload gefaald, net zoals jij.</p>";
                    $file_name = NULL;
                }
                if (strpos($file_name, '.')) {
                    echo "<br><p style='text-align:center;'>Bestand: $fileTitleup[1] in $dirname Succes </p><br>";

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






