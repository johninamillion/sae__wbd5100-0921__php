<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.array.php
 * Unset:
 * https://www.php.net/manual/en/function.unset.php
 */

$users = [
    'John'      =>  NULL,
    'Sandar'    =>  [],
    'Grispin'   =>  [],
    'May'       =>  []
];

unset( $users[ 'John' ] );  // Unset entfernt einen Wert aus einem Array per Index oder Key

var_dump( $users );