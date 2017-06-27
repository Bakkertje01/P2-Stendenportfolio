<?php
include_once'include/session.php';
include_once 'include/noacces.php';

if($_SESSION["Type"] != "admin" && $_SESSION["Type"] != "slb" && $_SESSION["Type"] != "docent" && $_SESSION["Type"] != "gast") {
    header("Location: Mijn%20Uploads.php");
}

function dateSelect($datum, $folder, $verified)
{
    $numberOfFiles = 0;

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
			//$numberOfFiles = NULL;
			echo "<p>Deze map bevat geen bestanden</p>";
		}

	}


}

if (isset($_POST['reset'])) {

	$datumin = NULL;
	$mapin = NULL;

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



?>


<div class="jumbotron">
	<?php
if(isset($_GET['student'])) {
	$studentnr = $_GET['student'];

    $veriF = $row['Verified'];

	$sql = "SELECT Gebruiker_ID, Voornaam, Studentnr, Quote, Achternaam, img_path, color_path FROM user WHERE Studentnr = '$studentnr'";
	$result = $connection->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {

            $bgColor = $row['color_path'];
            $textColor = $row['img_path'];
			$studentnaam = $row["Voornaam"];
			$studentnumber = $row["Studentnr"];
			$studentquote = $row["Quote"];
			$studentachter2 = $row["Achternaam"];

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

    $profielfoto = "studentuploads/$studentnumber/Profielfoto/pf.jpg";
    $checkPf = "studentuploads/$studentnumber/Profielfoto/$PfNaam";
    if (!file_exists($checkPf)) {
        $profielfoto = "studentuploads/default/Profielfoto/$PfNaam";
    }
    echo "    <div class='container text-center'>
        <h3>Bestanden van  $studentnaam  $studentachter2</h3>
        <img width='20%' src='$profielfoto' alt='profielfoto'
             title='Profielfoto'>
        <p><i>' $studentquote'</i></p>
    </div>";



?>

<div class="container text-center">

<?php

			$subdirs = array('CV', 'Afbeeldingen', 'Documenten');

            switch ($indelingUser) {
                case "indeling1":
                    $subdirs = array('CV', 'Documenten', 'Afbeeldingen');
                    break;
                case "indeling2":
                    $subdirs = array('CV', 'Afbeeldingen', 'Documenten');
                    break;
                case "indeling3":
                    $subdirs = array('Documenten', 'CV', 'Afbeeldingen');
                    break;
                case "indeling4":
                    $subdirs = array('Documenten', 'Afbeeldingen', 'CV');
                    break;
                case "indeling5":
                    $subdirs = array('Afbeeldingen', 'Documenten', 'CV');
                    break;
                case "indeling6":
                    $subdirs = array('Afbeeldingen', 'CV', 'Documenten');
                    break;
            }



foreach ($subdirs as $subdir) {

				echo "<div class="container text-center"><p>";
				echo "<h4>$subdir van $studentnaam</h4>";
                echo dateSelect($studentnumber, $subdir, $veriF);
				echo "</p><br><br></div>";
			}


		}
	} else {
		$studentnaam = "Gast";

		$studentnumber = "default";
		$studentquote = "Ik ben hier nieuw!";

		echo "0 results";
	}

}


    include("hidden.guestbook.php");

?>



</div>

<div class="container text-center">

	<div>

		<p></p>
	</div>


</div>

<?php

include_once 'hidden.footer.php';
?>

</body>

</html>












