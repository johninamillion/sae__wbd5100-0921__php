<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/control-structures.switch.php
 */

$var = 6;

$array = [];

// case     legt eine Bedingung fest
// break    Beendet den Switch nach einem erfolgreichen Case
// default  legt ein Standardverhalten fest

switch ( TRUE ) {
    case $var <= 4:
        $array[] = "$var is equal to 4 or smaller";
        break;
    case $var > 6:
        $array[] = "$var is greater than 6";
        break;
    case $var === 5:
        $array[] = "$var is equal to 5";
        break;
    default:
        $array[] = "$var is equal to 6";
        break;
}

var_dump( $array );