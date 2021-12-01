<?php

/*
 * PHP Net:
 * https://www.php.net/manual/en/function.print-r.php
 */

$string_var1 = 'Hallo Welt!';
$string_var2 = "Hallo Welt!";
$int = 1;
$float = 1.2;
$array = [ 'Apfel', 'Banane', 1, 1.2 ];
$null = NULL;
$boolean_true = TRUE;
$boolean_false = FALSE;

print_r($string_var1);          // Gibt den String aus
print_r($string_var2);          // Gibt den String aus
print_r($int);                  // Gibt den Integer aus
print_r($float);                // Gibt den Float aus
print_r($array);                // Gibt die Werte aus dem Array gemeinsam mit dem Index aus
print_r($null);                 // Hat keine Ausgabe
print_r($boolean_true);         // Gibt 1 aus
print_r($boolean_false);        // Hat keine Ausgabe
