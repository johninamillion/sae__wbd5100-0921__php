<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.array.php
 * Unset:
 * https://www.php.net/manual/en/function.unset.php
 */

$users = [
    'John',
    'Sandra',
    'Grispin',
    'May'
];

unset( $users[ 0 ] );  // Unset entfernt einen Wert aus einem Array per Index oder Key (Im Beispiel per Index)

var_dump( $users );