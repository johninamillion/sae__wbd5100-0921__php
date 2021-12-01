<?php

/*
 * PHP Net:
 * https://www.php.net/manual/en/function.print.php
 */

$string_var1 = 'Hallo Welt!';
$string_var2 = "Hallo Welt!";
$int = 1;
$float = 1.2;
$array = [ 'Apfel', 'Banane', 1, 1.2 ];
$null = NULL;
$boolean_true = TRUE;
$boolean_false = FALSE;

print($string_var1);          // Gibt den String aus
print($string_var2);          // Gibt den String aus
print($int);                  // Gibt den Integer aus
print($float);                // Gibt den Float aus
print($array);                // Kann den Array nicht darstellen und gibt 'Array' als string aus
print($null);                 // Hat keine Ausgabe
print($boolean_true);         // Gibt 1 aus
print($boolean_false);        // Hat keine Ausgabe
