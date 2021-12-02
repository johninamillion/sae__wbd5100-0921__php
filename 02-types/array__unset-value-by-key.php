<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.array.php
 * Array Key Exists:
 * https://www.php.net/manual/en/function.array-key-exists.php
 * Isset:
 * https://www.php.net/manual/en/function.isset.php
 */

$users = [
    'John'      =>  NULL,
    'Sandar'    =>  [],
    'Grispin'   =>  [],
    'May'       =>  []
];

unset( $users[ 'John' ] );  // Unset entfernt einen Wert aus einem Array per Index oder Key

var_dump( $users );