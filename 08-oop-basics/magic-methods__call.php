<?php

/*
 * PHP Magic Methods:
 * https://www.php.net/manual/en/language.oop5.magic.php
 */

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

final class MagicMethods {

    private array $callbacks = [];

    // Überschreiben des Standardverhaltens zum schreiben und überschreiben von Objektvariablen
    // Betrifft nicht bereits definierte und vorhandene Klassenvariablen
    public function __set( string $name, $value ) {
        $this->callbacks[ $name ] = $value;
    }

    // Überschreiben des Standardverhaltens zum aufrufen von Methoden
    // Methoden können über den Setter im Callbacks Array gespeichert werden und von außerhalb aufgerufen werden wie Klassenmethoden
    public function __call( string $name, array $arguments ) {
        // Überprüfen ob unsere Callback funktion im Array vorhanden ist
        if ( isset( $this->callbacks[ $name ] ) ) {
            call_user_func_array( $this->callbacks[ $name ], $arguments );
        }
    }

}

$magicMethods = new MagicMethods();

// Speichern einer Callback funktion im Callbacks Array über "__set"
$magicMethods->test = function( string $name ) {
    echo "I am {$name}!";
};

// Aufruf eines Callbacks über "__call"
$magicMethods->test( 'John' );
