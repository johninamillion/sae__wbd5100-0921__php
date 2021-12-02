<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.array.php
 * Array Unique:
 * https://www.php.net/manual/en/function.array-unique.php
 */

$user_list = [
    'John',
    'Sandra',
    'Gripsin',
    'May',
    'John',
    'Kevin',
    'Bekas',
    'Rezon',
    'Kevin'
];

$unique_user_list = array_unique( $user_list ); // Entfernt uns doppelte Werte aus einem Array

var_dump( $unique_user_list );
