<html>

<head>

</head>

<body>
<?php

include 'hidden.header.php';
include 'hidden.menu.php';
?>


<div class="container-fluid bg-3 text-center">
    <h3>Upload hier uw bestanden</h3><br>

    <form action="Upload.php" method="post" enctype="multipart/form-data">

        <center>
            <table>


                <td>
                    <center><input type="file"
                                   name="upload" multiple="multiple"></center>
                </td>

                <td>
                    Meme ->
                    <input type="radio" value="meme" checked="checked"
                           name="dirselect">

                    Huiswerk ->
                    <input type="radio" value="huiswerk"
                           name="dirselect">
                </td>

                <tr>
                    <td><input class="infield" type="text" name="Titel" placeholder="Titel!"></td>

                    <td><input class="infield" type="text" name="Poster" placeholder="Naam Poster!">
                    </td>
                </tr>


                <tr>

                    <td><input class="infield" type="submit" name="turbo" value="Uploaden!"></td>
                    <td><input class="infield" type="submit" name="reset" value="Reset"></td>
                </tr>


            </table>


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

        <p>Upload hier de bestanden die je met de wereld wil delen! <br>
        Zorg dat je de juiste map selecteert.
        </p>


    </form>


</div>
<br>


<?php

include 'hidden.footer.php';

?>

</body>

</html>
