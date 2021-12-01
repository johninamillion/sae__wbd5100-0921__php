<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/control-structures.elseif.php
 * Vergleichs Operatoren:
 * https://www.php.net/manual/en/language.operators.comparison.php
 * Logische Operatoren:
 * https://www.php.net/manual/en/language.operators.logical.php
 * Typenvergleich:
 * https://www.php.net/manual/en/types.comparisons.php
 */

$condition_var1 = FALSE;
$condition_var2 = TRUE;

$comparison1 = $condition_var1 === TRUE; // Vergleiche lassen sich aus in Variablen speichern als Typ Boolean.
$comparison2 = $condition_var2 === TRUE;

// &&   Überprüft ob zwei oder mehrere Vergleiche erfüllt sind
// ||   Überprüft ob einer von zwei oder mehreren Vergleich erfüllt ist

if ( $comparison1 && $comparison2 ) {
    echo "AND-Comparison = TRUE (if)";
}
elseif ( $comparison1 || $comparison2 ) {
    echo "OR-Comparsion = TRUE (elseif)";
}
else {
    echo "Comparison = FALSE (else)";
}