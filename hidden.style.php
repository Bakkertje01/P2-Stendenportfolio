<?php
include_once 'include/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="hide/fav.png"/>
    <title>Stenden portfolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>


        body {
            background-color: #eeeeee;
        }

        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        /*Style voor contact pagina */
        #contactFormulier {
            width: 100%;
            float: left;

        }

        label {
            float: left;
        }

        input[type=text], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=number], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        input[type=email], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: none;
        }

        input[type=password] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            float: left;
            background-color: #3c75af;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .profile {
            float: left;
            margin-top: 5px;
            margin-right: 10%;
            margin-left: 10%;
            margin-bottom: 5px;
            width: 80%;
            background-color: aqua;

        }

        #profile-pic {
            border-radius: 5px;
            border: 5px;
            border-color: #000000;
            float: left;
            margin:;
            width: 250px;
            height: 250px;
            background-color: #009e13;
        }

        #profileinfo {
            float: left;
            width: 250px;
            height: 250px;
            background-color: yellow;
        }

        #bekijkup {
            float: inherit;
            background-color: #3c75af;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #0a53a0;
        }
        .blok{
            width: 500px;
            height: 250px;
            margin: 0 auto;
        }

        .blokjes {
            width: 200px;
            height: 200px;
            float: left;
            margin: 15px;
            background-color: 0a53a0;
            color: white;
        }
        .blokjes:hover{
            border: 2px solid black;
        }
        /*Errors*/

        .errorText {
            color: red;
            font-weight: bold;
            float: left;
        }

        .correctText {
            color: #009e13;
        }

        #foot {
            height: 100%;
            bottom: 0;
            width: 100%;
            height: 50px;
            position: absolute;
        }
        .profielcenter{
            height: 100%;
            width: 1400px;
            margin: 0 auto;
        }
        .profiel{
            height: 450px;
            width: 350px;
            padding: 15px;
            margin: 15px;
            background-color: lightgrey;
            border: 1px solid black;
            float: left;
        }
        .select{
            width: 100px;
            background-color: red;
        }


        <?php

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

        ?>


</style>
</head>
<body>
</body>
</html>