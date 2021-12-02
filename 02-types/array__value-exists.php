<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.array.php
 * In Array:
 * https://www.php.net/manual/en/function.in-array.php
 */

$users = [
    'John',
    'Sandra',
    'Grispin',
    'May'
];

$john_exists = in_array( 'John', $users ); // Überprüfen ob ein Wert in einem Array vorhanden ist

var_dump( $john_exists );
