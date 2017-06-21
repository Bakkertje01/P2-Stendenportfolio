<?php
include_once ('include/session.php');

include "hidden.style.php";

?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Portfolio</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">


            <?php

            echo '<ul class="nav navbar-nav">';

            if (isset($_SESSION['Gebruiker_ID'])) {

                if ($_SESSION['Type'] == 'admin') {
                    echo " <li><a href='hidden.admin_landing.php'><span class=''></span> Admin menu</a></li>";
                    echo " <li><a href='hidden.admin_register.php'><span class=''></span> Registratie slb/leraar</a></li>";
                    echo " <li><a href='hidden.AdminOverview.php'><span class=''></span> Users aanpassen</a></li>";
                    echo " <li><a href='hidden.admin_contact.php'><span class=''></span> Admin Contact</a></li>";
                } elseif ($_SESSION['Type'] == 'student') {
                    echo " <li><a href='profiel.php'><span class=''></span> Edit profiel</a></li>";
                    echo " <li><a href='JouwGastenboek.php'><span class=''></span> Gastenboek</a></li>";
                    echo " <li><a href='Mijn Uploads.php'><span class=''></span> Mijn profiel</a></li>";
                    echo " <li><a href='contact.php'><span class=''></span>Contact</a></li>";
                    echo " <li><a href='studentfind.php'><span class=''></span>Zoek student</a></li>";
                } elseif ($_SESSION['Type'] == 'slb') {
                    echo " <li><a href=''><span class=''></span>SLB menu</a></li>";
                    echo " <li><a href='contact.php'><span class=''></span>Contact</a></li>";
                    echo " <li><a href='studentfind.php'><span class=''></span>Zoek student</a></li>";
                } elseif ($_SESSION['Type'] == 'docent') {
                    echo " <li><a href=''><span class=''></span>Docent menu</a></li>";
                    echo " <li><a href='contact.php'><span class=''></span>Contact</a></li>";
                    echo " <li><a href='studentfind.php'><span class=''></span>Zoek student</a></li>";
                } else {

                }
            }
            else{
                echo " <li><a href='contact.php'><span class=''></span>Contact</a></li>";
            }
            echo "</ul>";

            ?>

            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['Gebruiker_ID'])) { ?>
                    <li><a href="hidden.logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                <?php } else { ?>
                    <li><a href="hidden.login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>





