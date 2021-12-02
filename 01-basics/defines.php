<?php

// Variablen
// Variablen lassen sich überschreiben

$a = 'I am no fix value!';
$a = 2; // Die Variable A wird mit dem Wert 2 überschrieben

var_dump( $a );

// Konstanten
// Konstanten lassen sich nicht überschreiben
// Konstanten schreiben wir Groß und Sprechen wir ohne ein $ an.
// Konstanten sollten keine Array oder Objekte enthalten

define( 'OUR_DEFINE',   'I am a fix value!' );

var_dump( OUR_DEFINE );
