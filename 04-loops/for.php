<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/control-structures.for.php
 * Arithmetic Operatoren:
 * https://www.php.net/manual/en/language.operators.arithmetic.php
 */

for ( $i = 1; $i < 100; $i++ ) {
    $modulo_5 = $i % 5 === 0; // Wir speichern uns einen Boolean
    $modulo_3 = $i % 3 === 0; // Wir speichern uns einen Boolean

    switch( TRUE ) { // Daher nehmen wir im Switch TRUE als Wert
        // Ausgabe von Zahlen die durch 5 und 3 Teilbar sind in der Farbe Rot
        case $modulo_5 && $modulo_3:
            echo "<span style=\"color: red;\">$i</span> <br>\n";
            break;

        // Ausgabe von Zahlen die durch 5 Teilbar sind in der Farbe Orange
        case $modulo_5:
            echo "<span style=\"color: orange;\">$i</span> <br>\n";
            break;

        // Ausgabe von Zahlen die durch 3 Teilbar sind in der Farbe Gelb
        case $modulo_3:
            echo "<span style=\"color: yellow;\">$i</span> <br>\n";
            break;

        // Ausgabe aller weiteren Zahlen in der Farbe Grau
        default:
            echo "<span style=\"color: grey;\">$i</span> <br>\n";
            break;
    }
}
