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

// ==   Überprüfen von Wertegleichheit ( 1 entspricht dem selben Wert wie TRUE, 0 entspricht dem selben Wert wie FALSE)
// !=   Überprüfen von Wertungleichheit
// ===  Überprüfen von Werte- und Typgleichheit ( 1 enspricht dem selben wie TRUE, aber nicht dem selben Typ)
// !==  Überprüfen von Werte- und Typungleichheit
// <    Überprüfen ob ein Wert kleiner ist (Für Integer oder Floats verwenden)
// <=   Überprüfen ob ein Wert kleiner oder gleich ist (Für Integer oder Floats verwenden)
// >    Überprüfen ob ein Wert größer ist (Für Integer oder Floats verwenden)
// >=   Überprüfen ob ein Wert größer oder gleich ist (Für Integer oder Floats verwenden)
// <=>  Überprüfen ob ein Wert größer oder kleiner ist (Für Integer oder Floats) [>PHP 7.0]

if ( $condition_var1 ===  TRUE ) {
    echo "Comparison1 = TRUE (if)";
}
elseif ( $condition_var2 === TRUE ) {
    echo "Comparison2 = TRUE (elseif)";
}
else {
    echo "Comparisons = FALSE (else)";
}