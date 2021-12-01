<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/control-structures.foreach.php
 * Associative Array:
 * https://www.php.net/manual/en/language.types.array.php
 */

$array = [
    'Apfel' => 'red',
    'Ananas' => 'yellow',
    'Apfelsine' => 'orange',
    'Banane' => 'yellow',
    'Birne' => 'green',
    'Orange' => 'orange'
];

//echo $array[0]; // Ausgabe von red (Index 0)
//echo $array['Apfel']; // Ausgabe von red (Index 0)
//echo $array[1]; // Ausgabe von yellow (Index 1)
//echo $array['Ananas']; // Ausgabe von yellow (Index 1)

foreach ( $array as $key => $value ) {
    echo "<span style=\"color: {$value}\">{$key}</span><br>\n";
}
