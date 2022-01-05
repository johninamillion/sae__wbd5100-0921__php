<?php

/**
 * PHP OOP Interfaces:
 * https://www.php.net/manual/en/language.oop5.interfaces.php
 */

// Interfaces definieren aufbau von Funktion welche in einer Klasse vorhanden sein müssen, ohne ein Funktionskörper
interface doSomething {

    public function doSomething( string $name ) : void;

}

interface doSomethingMore {

    public function doSomethingMore( string $name ) : void;

}

// implements   zum implementieren von Interfaces, es können mehrere Interfaces implementiert werden
class justDoIt implements doSomething, doSomethingMore {

    public function doSomething(string $name) : void  {
        echo "$name";
    }

    public function doSomethingMore(string $name) : void {
        echo "$name";
    }

}

$justdoit = new justDoIt();

if ( $justdoit instanceof doSomething ) {
    $justdoit->doSomething( 'Something' );
}

if ( $justdoit instanceof doSomethingMore ) {
    $justdoit->doSomethingMore( 'Something More!' );
}
