<?php

/*
 * PHP Net:
 * https://www.php.net/manual/en/function.var-dump.php
 */

$string_var1 = 'Hallo Welt!';
$string_var2 = "Hallo Welt!";
$int = 1;
$float = 1.2;
$array = [ 'Apfel', 'Banane', 1, 1.2 ];
$null = NULL;
$boolean_true = TRUE;
$boolean_false = FALSE;

print_r($string_var1);          // Gibt Typ (String), Länge (11) und Wert (Hallo Welt!) aus
print_r($string_var2);          // Gibt Typ (String), Länge (11) und Wert (Hallo Welt!) aus
print_r($int);                  // Gibt Typ (Integer) und Wert (1) aus
print_r($float);                // Gibt Typ (Float) und Wert (1.2) aus
print_r($array);                // Gibt Typ (Array), Anzahl der Werte (4), Werte und ihre Typen aus
print_r($null);                 // Gibt NULL aus
print_r($boolean_true);         // Gibt Typ (Boolean) und Wert (TRUE) vom Boolean aus
print_r($boolean_false);        // Gibt Typ (Boolean) und Wert (FALSE) vom Boolean aus
