<?php

/*
 * PHP-Net:
 * Global Keyword:
 * https://www.php.net/manual/en/language.variables.scope.php
 */

$fruits = [ 'apple', 'banana', 'cherry' ];

// global   Erlaubt uns auf Globale Variablen von außerhalb zuzugreifen.
function addSomeFruits( string ...$new_fruits ) : void {
    global $fruits;

    foreach ( $new_fruits as $fruit ) {
        $fruits[] = $fruit;
    }
}

addSomeFruits( 'pineapple', 'strawberry' );

var_dump( $fruits );
