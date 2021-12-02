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

$john_exists = in_array( 'John', $users ); // Überprüfen ob ein Wert in einem Array vorhanden ist

var_dump( $john_exists );
