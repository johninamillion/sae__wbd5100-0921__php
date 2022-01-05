<?php

/**
 * PHP Singleton:
 * https://designpatternsphp.readthedocs.io/de/latest/Creational/Singleton/README.html
 */

// VERWENDUNG NICHT EMPFOHLEN!

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

class Singleton {

    private bool $instanced = FALSE;

    private static $instance;

    public function __construct() {
        $this->instanced = TRUE;
        self::$instance = $this;
    }

    public static function Instance() {
        return self::$instance ?? new self();
    }

}

Singleton::Instance()->test = 'test';   // Wir rufen die statische Methode Instance auf und kriegen eine Instanz der Klasse zurück
var_dump( Singleton::Instance() );      // Über den weiteren Aufruf der Methode erhalten wir immer wieder die selbe Instanz
var_dump( Singleton::Instance() );
