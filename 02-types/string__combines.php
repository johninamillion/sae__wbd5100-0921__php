<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/en/language.types.string.php
 */

//  \t  tab
//  \n  new line    (Console)

$username = 'John';

$welcome_text_var1 = 'Hallo ' . $username . ', freut uns dich zu sehen <br>' . "\n";    // Kombinieren von Strings durch ein '.' (eq. JavaScript '+')
$welcome_text_var2 = "Hallo {$username}, freut uns dich zu sehen <br> \n";          // Nutzen von doppelten Anführungszeichen um Zugriff auf Variable zu gestatten

echo $welcome_text_var1;
echo $welcome_text_var2;
