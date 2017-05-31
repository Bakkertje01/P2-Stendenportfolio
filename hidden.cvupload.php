<form action ="hidden.cvupload.php" method ="POST" enctype = "multipart/form-data">
    <input type ="file" name = "upload" id = "upload" >
    <input type = "submit" name = "submit" value = "upload">
    </form>

<?php

    $Tdir = "CV/";
    $Tfile = $Tdir . basename($_FILES["upload"]["name"]);
    $Finfo = pathinfo($Tfile, PATHINFO_EXTENSION);

    if(isset($_POST["submit"])){
        if ($Finfo != "PDF"){
            echo "invalid file type : please upload a PDF file";
        }else{
            echo "file is pdf";
            if(file_exists($Ffile)) {
                echo "file already exist, file was not uploaded";
           }else{
                echo "file added";
            }
        }
    }
 ?>