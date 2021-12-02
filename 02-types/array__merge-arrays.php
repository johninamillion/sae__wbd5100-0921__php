<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.array.php
 * Unset:
 * https://www.php.net/manual/en/function.unset.php
 */

$user_list1 = [
    'John',
    'Sandra',
    'Grispin',
    'May'
];

$user_list2 = [
    'John',
    'Bekas',
    'Kevin',
    'Rezon'
];

$complete_user_list = array_merge( $user_list1, $user_list2 ); // Einfaches zusammenführen von Arrays, doppelte Werte werden doppelt vorkommen

var_dump( $complete_user_list );
