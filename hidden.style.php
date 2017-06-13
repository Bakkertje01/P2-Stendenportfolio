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

        <?php

         echo "

body{
background-color: $bgColor;
}

.jumbotron{
background-color: $bgColor;
}

";


        ?>

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


    </style>
</head>
<body>
</body>
</html>