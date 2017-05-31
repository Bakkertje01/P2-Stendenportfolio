

<div class="menu">
    <?php


    //namen nog aanpassen uiteraard

    $files = glob("./" ."*");

    echo '<ul>';

    foreach ($files as $link) {

        $heh = explode('.', $link);

        if(!empty($heh[2])) {
            if ($heh[2] == 'php' || $heh[2] == 'html') {
                $friendlylink = preg_replace('/[^A-Za-z0-9\-]/', '', $heh[1]);

                echo "<li><a href='$link'>" . ucfirst($friendlylink) . "</a></li>";
            } else {
                echo '';
            }
        }
    }

    echo '</ul>';

    ?>

</div>