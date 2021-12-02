<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.string.php
 * Preg Replace:
 * https://www.php.net/manual/en/function.preg-replace.php
 */

$lorem_ipsum = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

$blacklist = [ 'Lorem', 'dolor', 'in', 'id', 'est' ];

/**
 * Ersetzt die Wörter aus dem Argument $blacklist mit einer zensierten Schreibweise von diesen.
 *
 * @param   string  $text
 * @param   array   $blacklist
 * @return  string
 */
function cleanUpText( string $text, array $blacklist ) : string {
    foreach ( $blacklist as $word ) {
        $word_length = strlen( $word );
        $first_letter = $word[ 0 ];
        $censor = $first_letter . str_repeat( '*', $word_length - 1 );
        $text = preg_replace( "/{$word}\s/", "{$censor} ", $text );
    }

    return $text;
}

$clean_text = cleanUpText( $lorem_ipsum, $blacklist );

var_dump( $clean_text );
