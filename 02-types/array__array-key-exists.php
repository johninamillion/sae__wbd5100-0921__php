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

$john_exists = array_key_exists( 'John', $users );  // Überprüft ob ein Key in einem Assoziativen Array existiert
var_dump( $john_exists );

$john_isset = isset( $users[ 'John' ] ); // Überprüft ob der Wert für ein Key in einem Assoziativen oder Numerischen Array existiert.
var_dump( $john_isset );
