<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.array.php
 * Array Push:
 * https://www.php.net/manual/en/function.array-push.php
 */

$user_list = [
    'John',
    'Sandra',
    'Gripsin',
];

$user_list[] = 'May';   // Fügt einen Wert zu einem Array hinzu (Kettet hinten an)
$user_list[ 0 ] = 'Bekas'; // Überschreiben einen Wert aus einem Array per Index (An eine Stelle überschreiben)
array_push( $user_list, 'John', 'Ashwan', 'Kevin' ); // Fügt beliebig viele Werte zu einem Array hinzu (Kettet hinten an)

var_dump( $user_list );
