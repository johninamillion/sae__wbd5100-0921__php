<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.string.php
 * String Position:
 * https://www.php.net/manual/en/function.strpos.php
 */

$string = 'Hello Welt!';

$new_string = str_replace( 'Welt', 'World', $string );  // Wir ersetzen ein Wort in einem String und
                                                                      // speichern und den String in einer neuen Variable

var_dump( $new_string );
