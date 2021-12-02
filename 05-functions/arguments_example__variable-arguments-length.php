<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/de/functions.user-defined.php
 * Function Arguments (Reference):
 * https://www.php.net/manual/en/functions.arguments.php#functions.arguments.by-reference
 * Function Arguments (Variable-Length Arguments):
 * https://www.php.net/manual/en/functions.arguments.php#functions.variable-arg-list
 */

// Error Handling
// error_reporting  Welche Fehler sollen Ausgegeben werden
error_reporting( E_ALL );
// ini_set          Überschreiben einer Konfiguration zur Ausgabe von Errormeldungen
ini_set( 'display_errors', '1' );

// &$users  Ein Parameter aus einer Referenz nehmen, wir manipulieren eine Variable außerhalb der Funktion,
//          Welche als Argument mitgegeben wurde, ohne diese aus der Funktion über Return zurückzugeben.
// ...$name Variable Länge von Argumenten, der Funktion können unendlich viele Argumente vom Typ string mitgegeben werden,
//          Welche in der Funktion in einem Array zur Verfügung stehen.
// : void   Sagt das eine Funktion kein Rückgabewert

/**
 * Füge Nutzer per Name in einen Array hinzu
 *
 * @param   array   $users
 * @param   string  ...$names
 * @return  void
 */
function addUsersByNames( array &$users, string ...$names ) : void {
    foreach ( $names as $user_name ) {
        $users[ $user_name ] = [];
    }
}

$users = [
    'John'  =>  []
];

addUsersByNames( $users, 'Sandra', 'Grispin', 'May' );

var_dump( $users );
