<?php
include_once 'include/session.php';
function deletefiles($datum, $folder)
{

    $dirnamez = "./studentuploads/" . $datum;

    $files1 = glob("$dirnamez/" . "$folder/" . "*");


    if (!empty($folder)) {

        foreach ($files1 as $file1) {
            $fileTitle = explode('--', $file1);
            $deftitle = ucfirst($fileTitle[1]);
            echo "<option value='$file1'>$deftitle</option>";
        }

    }


}

?>

<html>

<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
</head>

<body>
<?php

include_once 'hidden.header.php';
include_once 'hidden.menu.php';


if (isset($_POST['kleursub']) && isset($_POST['textkleur'])) {

    $bgColor = $_POST['bgkleur'];
    $textColor = $_POST['textkleur'];
    $sql = "UPDATE User SET color_path = '$bgColor', img_path = '$textColor' WHERE Gebruiker_ID = $ID";
    $result = $connection->query($sql);

    $kleurgekozen = "<p>Kleuren gekozen! <a href='profiel.php'>Ok!</a></p>";

    echo "<style>
    


body{
background-color: $bgColor;
}
.jumbotron{
background-color: $bgColor;
}
.container text-center{
background-color: $bgColor;
}
.container-fluid bg-3 text-center{
background-color: $bgColor;
}
.row{
background-color: $bgColor;
}
.col-sm-3{
background-color: $bgColor;
}
.img-responsive{
background-color: $bgColor;
}
p{
color: $textColor;
}
h1{
color: $textColor;
}h2{
color: $textColor;
}h3{
color: $textColor;
}h4{
color: $textColor;
}h5{
color: $textColor;
}h6{
color: $textColor;
}
input{
color: $textColor;
}
label{
color: $textColor;
}



</style>";

}


?>
<div class="jumbotron">
    <div class="container text-center">


        <p>
        <div id="wrapper">
            <div id='content'>
                <h3>Profiel van <?php echo "$studentnaam $studentachter"; ?> </h3>
                <div class="">
                    <div class="profiel">

                        <form id='register' action='profiel.php' method='post' enctype="multipart/form-data">

                            <label for='upload'><h3>Huidige Profielfoto:</h3> </label><br><br><br><br>
                            <img style='float: left' width="20%" <?php echo "src='$profielfoto'"; ?> alt="profielfoto"
                                 title="Profielfoto"><br><br><br><br><br><br><br><br>
                            <label>Kies nieuwe Profielfoto: </label><br><br>
                            <input type='file' name='pfupload' id='firstname'/><br/>
                            <input type='submit' name='pfsubmit' id='phone' value='Upload Profielfoto'/>


                        </form>

                        <?php


                        if (isset($_POST['pfsubmit'])) {


                            if (isset($_FILES['pfupload']) && !empty($_FILES['pfupload']['name'])) {

                                $student_ID = $_SESSION['Gebruiker_ID'];
                                $description = 1;

                                $errors = array();

                                $oldName = $_FILES['pfupload']['name'];

                                $file_size = $_FILES['pfupload']['size'];
                                $file_tmp = $_FILES['pfupload']['tmp_name'];
                                $file_type = pathinfo($oldName, PATHINFO_EXTENSION);

                                $fileTitle = 'pf';

                                $selectedDir = 'Profielfoto';

                                $file_name = "$fileTitle.$file_type";







                                $ext = explode('.', $oldName);
                                $acceptedFiles = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG');

                               $pfDir = "studentuploads/$studentnumber/Profielfoto/$PfNaam";
              //nodig

                                if (file_exists($profielfoto) && isset($_FILES['pfupload'])) {
                                    unlink($profielfoto);
                                }


                                if (!in_array($ext[1], $acceptedFiles)) {
                                    $errors[] = 'Bestandsformaat niet juist!';

                                }

                                if ($file_size > 8388608) {
                                    $errors[] = 'Bestand is te groot!(8 MB max)';
                                }

                                if (empty($studentnumber)) {
                                    $errors[] = 'Geen file poster!';
                                }

                                if (empty($errors) == true) {
                                    $StudentDir = 'studentuploads';
                                    $dirname = $studentnumber;

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
                                        if (!file_exists("$StudentDir/$dirname/$selectedDir/" . $file_name)) {
                                            move_uploaded_file($file_tmp, "$StudentDir/$dirname/$selectedDir/" . $file_name);


                                            $checkpf = "SELECT File_ID FROM files where Filetype = 'profielfoto' AND Gebruiker_ID  = '$student_ID'";
                                            $row = mysqli_query($connection, $checkpf);
                                            if (!mysqli_num_rows($row) == 0){

                                                $filepf = mysqli_fetch_assoc($row);
                                                $query = "UPDATE files SET Filename = '$file_name' WHERE File_ID = " . $filepf['File_ID'] . ";";

                                            }
                                            else {
                                                $query = "INSERT INTO files(Files_path, Filename, Filetype, Gebruiker_ID) VALUES('$StudentDir/$dirname/$selectedDir/','$file_name','profielfoto','$student_ID')";
                                            }
                                            mysqli_query($connection, $query);





                                        } else {
                                            echo "Bestand bestaat al";
                                        }
                                    } else {
                                        echo "<br><p style='text-align:center;'>Bestandsnaam bevat meer dan 1 punt!<br>Upload Mislukt, verander je bestandsnaam</p>";
                                        $file_name = NULL;
                                    }
                                    if (strpos($file_name, '.')) {
                                        echo "<br><p style='text-align:center;'>Upload Gelukt</p><br>";

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

                        ?>

                        <br>
                        <br>
                        <br>
        </p>
    </div>


    <div class="profiel">
        <p>

<!--BESTANDEN UPLOADEN-->

        <h3>Bestanden uploaden:</h3>


        <form id='register' action='profiel.php' method='post' enctype="multipart/form-data">
            <label for='upload'>Bestand:</label><br/><br/>
            <input type='file' name='upload' id='firstname'/><br/>
            <p>Type:</p>

            <?php
            $foldersForUpload = array('CV', 'Afbeeldingen', 'Documenten');

            echo "<select name='dirselect'>";
            foreach ($foldersForUpload as $item) {
                echo "<option value='$item'>$item</option>";

            }
            echo "</select><p></p>";

            ?>
            <label for='Titel'>Naam van je bestand:</label>


            <input type='text' name='Titel' id='email'/>

            <input type='submit' name='verstuur' id='phone' value='upload'/>

            <input type='submit' name='reset' style="margin-left: 10;" value="Reset"/>

        </form>
    </div>


    </p>



<div class="profiel">
    <p><?php

        if (isset($_POST['verstuur'])) {

            if (isset($_FILES['upload']) && !empty($_FILES['upload']['name']) && !empty($_POST['Titel'])) {

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
                    $fileTitle = 'pf';
                }

                if (!empty($_POST['dirselect'])) {
                    $selectedDir = $_POST['dirselect'];
                } else {
                    $selectedDir = 'dank';
                }

                $student_ID = $_SESSION['Gebruiker_ID'];
                $type = $_POST['dirselect'];

                $file_name = "--$fileTitle--" . $_FILES['upload']['name'];


                $file_size = $_FILES['upload']['size'];
                $file_tmp = $_FILES['upload']['tmp_name'];
                $file_type = $_FILES['upload']['type'];

                $fileTitleup = explode('--', $file_name);

                $ext = explode('.', $file_name);
                $acceptedFiles = array('doc', 'docx', 'xls', 'xlsx', 'pdf', 'jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG');


                if (!in_array($ext[1], $acceptedFiles)) {
                    $errors[] = 'Bestandsformaat niet juist!';

                }

                if ($file_size > 8388608) {
                    $errors[] = 'Bestand is te groot!(8 MB max)';
                }

                if (empty($studentnumber)) {
                    $errors[] = 'Geen file poster!';
                }

                if (empty($errors) == true) {
                    $StudentDir = 'studentuploads';
                    $dirname = $studentnumber;


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
                    if ($dots <= 1)
                    {
                        if (!file_exists("$StudentDir/$dirname/$selectedDir/" . $file_name)) {
                            if (move_uploaded_file($file_tmp, "$StudentDir/$dirname/$selectedDir/" . $file_name)){

                                $query = "INSERT INTO files(Files_path, Filename, Filetype, Gebruiker_ID) VALUES('$StudentDir/$dirname/$selectedDir/','$file_name','$type','$student_ID')";
                                mysqli_query($connection, $query);

                                if (strpos($file_name, '.')) {
                                    echo "<br><p style='text-align:center;'>Bestand: '$fileTitleup[1]' in de map $selectedDir geplaatst! </p><br>";

                                }
                            }
                            else {
                                echo "upload mislukt";
                            }
                        }
                        else {
                            if (move_uploaded_file($file_tmp, "$StudentDir/$dirname/$selectedDir/" . "--Duplicate" . $file_name)){

                                $query = "INSERT INTO files(Files_path, Filename, Filetype, Gebruiker_ID) VALUES('$StudentDir/$dirname/$selectedDir/','$file_name','$type','$student_ID')";
                                mysqli_query($connection, $query);

                                if (strpos($file_name, '.')) {
                                    echo "<br><p style='text-align:center;'>Bestand: '$fileTitleup[1]' in de map $selectedDir geplaatst! </p><br>";

                                }
                            }
                            else {
                                echo "upload mislukt";
                            }


                        }
                    } else
                    {
                            echo "<br><p style='text-align:center;'>Bestandsnaam bevat meer dan 1 punt!<br>Upload Mislukt, verander je bestandsnaam</p>";
                            $file_name = NULL;
                    }

                } else {
                    foreach ($errors as $error) {
                        echo '<center>' . $error . '</center><br>';
                    }
                }
            } else {
                echo "<center><p>Geen bestand gekozen of geen naam toegewezen!</p></center>";
            }


        }

        ?></p>
    </center>

    <!--BESTANDEN UPLOADEN-->

    </form>

    <center>

        <form action="profiel.php" method="post">
            <h3>Kleuren:</h3>

            <p>Achtergrond:</p>
            <select name="bgkleur">
                <option value="#f44242">Rood</option>
                <option value="#118e1d">Groen</option>
                <option value="#ffea32">Geel</option>
                <option value="#6d68ff">Blauw</option>
                <option value="#ffaa00">Oranje</option>
                <option value="#ffffff">Wit</option>
                <option value="#000000">Zwart</option>
                <option value="#00faff">Cyaan</option>
                <option value="#eeeeee" selected="selected">Standaard</option>
            </select><br>
            <p>Text:</p>
            <select name="textkleur">
                <option value="#f44242">Rood</option>
                <option value="#118e1d">Groen</option>
                <option value="#ffea32">Geel</option>
                <option value="#6d68ff">Blauw</option>
                <option value="#ffaa00">Oranje</option>
                <option value="#ffffff">Wit</option>
                <option value="#000000" selected="selected">Zwart</option>
                <option value="#00faff">Cyaan</option>
                <option value="#eeeeee">Grijs</option>
            </select><br>
            <input type='submit' id='phone' name='kleursub' value='Kies kleur!'/>


        </form>
        <br><br><br><br>
        <?php if (isset($_POST['kleursub'])) {
            echo $kleurgekozen;


        } ?>
        </p></center>

</div>

<div class="profiel">

    <h3> Mijn Quote </h3>

    <form id='register' action='profiel.php' method='post'>

        <label for='upload'>Huidige Quote: </label><br><br><br><br>
        <?php echo "<p>$studentquote</p>" ?><br><br><br><br>
        <label>Kies nieuwe Quote: </label><br><br>
        <input type='text' name='quote' id='firstname'/><br/>
        <input type='submit' name='quotesubmit' id='phone' value='Bewerk Quote'/>
    </form>

    <?php

    if (isset($_POST['quotesubmit']) && !empty($_POST['quote'])) {
        $nieuweQuote = $_POST['quote'];
        $sql = "UPDATE User SET Quote = '$nieuweQuote' WHERE Gebruiker_ID = $ID";
        $result = $connection->query($sql);
        echo "<p>Quote bijgewerkt naar '$nieuweQuote' <a href='profiel.php'> Ok! </a></p>";


    }

    ?>

</div>
<div class="profiel">


    <h3> Bestanden verwijderen </h3>

    <form id='register' action='profiel.php' method='post'>

        <label for='upload'>Bestanden: </label><br><br><br><br>
        <label>Kies te verwijderen bestand: </label><br><br>
        <?php
        //$subdirs = array('CV', 'Afbeeldingen', 'Documenten');

        echo "<select name='selectdelete'>";

        echo "<option value=''>Selecteer je bestand</option>";
        $SQLgetfiles = "select * from files where Filetype != 'profielfoto'";
        $Getfiles = mysqli_query($connection, $SQLgetfiles);
        if (!mysqli_num_rows($row) == 0){
            echo "geen bestanden";
        }
        else{
            while($fileoption = mysqli_fetch_assoc($Getfiles)){
                echo "<option value=" . $fileoption['File_ID']. ">" . $fileoption['Filename'] . "</option>";
            }

        }

//        foreach ($subdirs as $subdir) {
//
//            deletefiles($studentnumber, $subdir);
//
//        }
        echo "</select>";

        ?>
        <input type='submit' name='deletefile' id='phone' value='Verwijder'/>
    </form>

    <?php

    if (isset($_POST['deletefile'])) {
        $deleteFile = $_POST['selectdelete'];

        $querysell="SELECT Files_path, Filename FROM Files WHERE File_ID = '$deleteFile'";
        $queryselect = mysqli_query($connection, $querysell);
        $row = mysqli_fetch_assoc($queryselect);
        $filepath = $row['Files_path'].$row['Filename'];


        if (!empty($deleteFile)) {

           $query="DELETE FROM Files WHERE File_ID = '$deleteFile'";
           mysqli_query($connection, $query);

            echo $deleteFile;

            unlink($filepath);

            echo "<p>Het bestand is verwijderd.</p>";
        }

    }

    ?>
</div>
</div>
</div></div>
</div>



<?php

include_once 'hidden.footer.php';

?>


</body>

</html>






