<?php
/**
 * Created by PhpStorm.
 * User: Ernst-Jan Bakker
 * Date: 24-5-2017
 * Time: 11:34
 */

$rob = 'oeps, fo niet ingeleverd';

if($rob == 'oeps, fo niet ingeleverd'){
echo 'shit<br>';
}

echo "hello world my name is Alie<br><br>";

$files = glob("./" ."*");

foreach ($files as $link) {

    $heh = explode('.', $link);


    $friendlylink = preg_replace('/[^A-Za-z0-9\-]/', '', $heh[1]);

    echo "<a href='$link'>-> $friendlylink</a><br>";
}

?>
