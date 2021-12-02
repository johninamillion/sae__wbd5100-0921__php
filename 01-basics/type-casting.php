<?php

/**
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.type-juggling.php
 * Type Casting:
 * https://www.php.net/manual/en/language.types.type-juggling.php#language.types.typecasting
 */

$value = '1.2';

$int = (int) $value;        // Type Cast als Integer
var_dump( $int );

$float = (float) $value;    // Type Cast als Float
var_dump( $float );

$array = (array) $value;    // Type Cast als Array
var_dump( $array );

$boolean = (bool) $value;    // Type Cast als Boolean
var_dump( $boolean );
