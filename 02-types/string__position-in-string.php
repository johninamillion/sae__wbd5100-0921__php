<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.string.php
 * String Position:
 * https://www.php.net/manual/en/function.strpos.php
 */

$string = 'Hallo Welt!';

$str_pos_int = strpos( $string, 'Welt' );       // Position einer Nadel in einem Heuhaufen wieder (string in string)
$str_pos_false = strpos( $string, 'World' );    // Gibt FALSE zurück, wenn die Nadel nicht gefunden wurde

var_dump( $str_pos_int );
var_dump( $str_pos_false );
