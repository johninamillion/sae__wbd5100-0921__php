<?php

/*
 * PHP Net:
 * https://www.php.net/manual/en/function.echo.php
 */

$string_var1 = 'Hallo Welt!';
$string_var2 = "Hallo Welt!";
$int = 1;
$float = 1.2;
$array = [ 'Apfel', 'Banane', 1, 1.2 ];
$null = NULL;
$boolean_true = TRUE;
$boolean_false = FALSE;

echo $string_var1;          // Gibt den String aus
echo $string_var2;          // Gibt den String aus
echo $int;                  // Gibt den Integer aus
echo $float;                // Gibt den Float aus
echo $array;                // Kann den Array nicht darstellen und gibt 'Array' als string aus
echo $null;                 // Hat keine Ausgabe
echo $boolean_true;         // Gibt 1 aus
echo $boolean_false;        // Hat keine Ausgabe
