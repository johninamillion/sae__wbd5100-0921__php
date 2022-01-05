<?php

/*
 * PHP OOP Variables (Properties):
 * https://www.php.net/manual/en/language.oop5.properties.php
 * PHP OOP Class Constants:
 * https://www.php.net/manual/en/language.oop5.constants.php
 * PHP OOP Scope Resolution Operator:
 * https://www.php.net/manual/en/language.oop5.paamayim-nekudotayim.php
 */

// self     bezieht sich auf die eigene Klasse
// static   bezieht sich auf die eigene Klasse und Elternelemente
// parent   bezieht sich auf das Elternelement

// -> bedeuten einen Aufruf von einem Objekt
// :: bedeuten einen Statischen Aufruf (Klasse)

// abstract damit wir keine Instanz von Vehicle erstellen können
abstract class Vehicle {

    // protected damit wir auch in den Erben auf diese Variable Zugreifen können
    protected ?string $manufactur = NULL;

    protected ?int $tires = 0;

    public function __construct( string $manufactur ) {
        $this->manufactur = $manufactur;
    }

}

final class Bike extends Vehicle {

    const TIRES = 2;

    public function __construct(string $manufactur, int $tires = self::TIRES) {
        // statischer Aufruf vom Konstruktor der Elternklasse
        parent::__construct( $manufactur );
        $this->tires = $tires;
    }

}

final class Car extends Vehicle {

    const TIRES = 4;

    public function __construct(string $manufactur, int $tires = self::TIRES ) {
        parent::__construct( $manufactur );
        $this->tires = $tires;
    }

}

// Erstellen der Objekte
$porsche = new Car( 'Porsche' );
$ducati = new Bike( 'Ducati' );

// Ausgabe der Objekte
var_dump( $porsche );
var_dump( $ducati);

// Ausgeben von Klassenkonstanten
var_dump( Bike::TIRES );
var_dump( Car::TIRES );
