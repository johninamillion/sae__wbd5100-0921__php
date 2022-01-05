<?php

/*
 * PHP Magic Methods:
 * https://www.php.net/manual/en/language.oop5.magic.php
 */

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

final class MagicMethods {

    private array $data = [];

    public string $test = 'Hallo!';

    // Überschreiben des Standardverhalten beim aufrufen von Objektvariablen
    public function __get( string $key ) {

        return $this->data[ $key ] ?? NULL;
    }

    // Überschreiben des Standardverhaltens zum schreiben und überschreiben von Objektvariablen
    // Betrifft nicht bereits definierte und vorhandene Klassenvariablen
    public function __set( string $key, $value ) {
        $this->data[ $key ] = $value;
    }

    // Überschrieben des Standardverhaltens zum überprüfen ob eine Objektvariable besteht
    public function __isset( string $key ) : bool {

        return isset( $this->data[ $key ] );
    }

    // Überschreiben des Standardverhaltens zum löschen von Objektvariablen
    // Betrifft nicht bereits definierte und vorhandene Klassenvariablen
    public function __unset( string $key ) {
        unset( $this->data[ $key ] );
    }

}

$magicMethods = new MagicMethods();

// Überschreiben einer bereits definierten Klassenvariable
$magicMethods->test = 'Tschüß!';

// Löschen einer bereits definierten Klassenvariable
unset( $magicMethods->test );

// Schreiben oder überschreiben einer Objektvariable
$magicMethods->int = 10;                    // Setzen von einem Wert mit dem Key 'int' im Data Array
$magicMethods->float = 1.1;                 // Setzen von einem Wert mit dem Key 'float' im Data Array
$magicMethods->string = 'Hallo';            // Setzen von einem Wert mit dem Key 'string' im Data Array

// Löschen einer Objektvariable
unset( $magicMethods->string );             // Löschen von dem Wert mit dem Key 'string' im Data Array

// Überprüfen ob eine Wert vorhanden ist
var_dump( isset( $magicMethods->float ) );  // Gibt TRUE zurück da der Wert mit dem Key 'float' im Data Array vorhanden ist
var_dump( isset( $magicMethods->string ) ); // Gibt FALSE zurück da der Wert mit dem Key 'string' im Data Array gelöscht wurde

echo "<pre>";
var_dump( $magicMethods );
echo "</pre>";
