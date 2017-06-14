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

            $files = glob("./" . "*");

            echo '<ul class="nav navbar-nav">';

            foreach ($files as $link) {

                $heh = explode('.', $link);

                if (!empty($heh[2])) {
                    if ($heh[2] == 'php' || $heh[2] == 'html') {
                        $friendlylink = preg_replace('/[^A-Za-z0-9\-]/', '', $heh[1]);

                        if ($friendlylink !== 'index') {
                            if ($ID > 0) {

                                echo "<li><a href='$link'>" . ucfirst($friendlylink) . "</a></li>";
                            } else {
                                if ($friendlylink === 'alleProfielen' ||$friendlylink === 'contact') {
                                    echo "<li><a href='$link'>" . ucfirst($friendlylink) . "</a></li>";
                                }

                            }
                        }

                    } else {
                        echo '';
                    }
                }
            }

            echo '</ul>';

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





