<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/de/functions.user-defined.php
 */

/**
 * Sucht Früchte aus einem Array mit der Farbe welche im zweiten Parameter gesucht wird
 *
 * @param   array   $fruits
 * @param   string  $color
 * @return  array
 */
function grabFruitsByColor( array $fruits, string $color ) : array {
    $fruits_by_color = [];

    foreach ( $fruits as $fruit => $fruit_color ) {
        if ( $fruit_color === $color ) {
            $fruits_by_color[] = $fruit;
        }
    }

    return $fruits_by_color;
}

$fruits = [
    'apple'         =>  'red',
    'banana'        =>  'yellow',
    'orange'        =>  'orange',
    'pineapple'     =>  'yellow',
    'strawberry'    =>  'red'
];

$red_fruits = grabFruitsByColor( $fruits, 'red' );
$yellow_fruits  = grabFruitsByColor( $fruits, 'yellow' );
$blue_fruits  = grabFruitsByColor( $fruits, 'blue' );

var_dump( $red_fruits );
var_dump( $yellow_fruits );
var_dump( $blue_fruits );