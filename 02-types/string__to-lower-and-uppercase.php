<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.string.php
 * String to Lower:
 * https://www.php.net/manual/en/function.strtolower.php
 * String to Upper:
 * https://www.php.net/manual/en/function.strtoupper.php
 */

$lorem_ipsum = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

$lower_case_text = strtolower( $lorem_ipsum ); // Verwandelt ein Text in ausschließlich Kleinbuchstaben

var_dump( $lower_case_text );

$upper_case_text = strtoupper( $lorem_ipsum ); // Verwandelt ein Text in ausschließlich Großbuchstaben

var_dump( $upper_case_text );
