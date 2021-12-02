<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/de/functions.user-defined.php
 * Function Arguments (Defaults):
 * https://www.php.net/manual/en/functions.arguments.php#functions.arguments.default
 */

// int $i   Type Decleration, welchen Typ geben wir als Argument mit
// : bool   Return Type, welchen Typ gibt die Funktion zurück

/**
 * Überprüfen ob der Wert von $i durch $j teilbar ist, mit einem Rest von 0
 *
 * @param   int     $i
 * @param   int     $j
 * @return  bool
 */
function checkForModulo( int $i, int $j = 5 ) : bool {

    return $i % $j === 0;
}

$checkForModulo10_5 = checkForModulo( 10 );
$checkForModulo10_4 = checkForModulo( 10, 4 );

var_dump( $checkForModulo10_5 );
var_dump( $checkForModulo10_4 );