<?php

/*
 * PHP-Net:
 * https://www.php.net/manual/de/functions.user-defined.php
 */

// Error Handling
// error_reporting  Welche Fehler sollen Ausgegeben werden
error_reporting( E_ALL );
// ini_set          Überschreiben einer Konfiguration zur Ausgabe von Errormeldungen
ini_set( 'display_errors', '1' );

//  ?string     Return Type ist String oder NULL
//  ?array      Return Type ist Array oder NULL

/**
 * Gibt einen Array vom Nutzer wieder, falls dieser vorhanden ist, wenn nicht dann geben wir NULL zurück.
 *
 * @param   array   $users
 * @param   string  $name
 * @return  array|null
 */
function getUserByName( array $users, string $name ) : ?array {
    //    if ( isset( $users[ $name ] ) ) {
    //
    //        return $users[ $name ];
    //    }
    //    else {
    //
    //        return NULL;
    //    }

    // Kurzschreibweise von If & Else
    // ?    If
    // :    Else
    //    return isset( $users[ $name ] ) ? $users[ $name ] : NULL;

    // Kurzschreibeweise mit ??
    return $users[ $name ] ?? NULL;
};

$users = [
    'John' => [],
    'May' => [],
    'Grispin' => [],
    'Sandra' => []
];

$john = getUserByName( $users, 'John' );
$kevin = getUserByName( $users, 'Kevin' );

var_dump( $john );
var_dump( $kevin );
