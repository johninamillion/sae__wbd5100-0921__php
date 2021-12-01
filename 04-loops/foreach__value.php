<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/control-structures.foreach.php
 */

$array = [ 'Apfel', 'Ananas', 'Apfelsine', 'Banane', 'Birne', 'Orange' ];

//echo $array[0]; // Ausgabe von Apfel (Index 0)
//echo $array[1]; // Ausgabe von Ananas (Index 1)

foreach ( $array as $value ) {
    $str_begins_with_a = $value[0] === 'A'; // Überprüfen ob der erste Buchstabe vom String A entspricht
    $str_begins_with_b = $value[0] === 'B'; // Überprüfen ob der erste Buchstabe vom String B entspricht

    switch ( TRUE ) {
        // Ausgabe von Werten die mit A beginnen in Rot
        case $str_begins_with_a:
            echo "<span style=\"color: red\">{$value}</span> <br>\n";
            break;
        // Ausgabe von Werten die mit B beginnen in Orange
        case $str_begins_with_b:
            echo "<span style=\"color: orange\">{$value}</span> <br>\n";
            break;
        // Ausgabe aller andere Werte in Grau
        default:
            echo "<span style=\"color: grey\">{$value}</span> <br>\n";
            break;
    }
}