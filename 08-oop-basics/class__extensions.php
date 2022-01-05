<?php

// public ist von außerhalb der Klasse aufrufbar und manipulierbar
// protected ist innerhalb der Klasse und seiner Erben aufrufbar und manipulierbar
// private ist innerhalb der Klasse aufrufbar und manipulierbar

class Vehicle {

    private bool $drives = FALSE;

    protected int $speed = 0;

    private int $max_speed = 0;

    protected ?string $manufactur = NULL;

    public function __construct( string $manufactur, int $max_speed ) {
        $this->manufactur = $manufactur;
        $this->max_speed = $max_speed;
    }

    public function drive( int $speed ) : void {
        if ( $speed > $this->max_speed ) {
            trigger_error( 'Value of $speed is not valid!' );

            return;
        }
        $this->drives = TRUE;
        $this->speed = $speed;
    }

    public function metersInSeconds() : void {
        $meters_in_seconds = $this->drives ? ( $this->speed * 1000 ) / 3600 : 0;

        echo "{$this->manufactur} drives {$meters_in_seconds} in a second!";
    }

}

class Car extends Vehicle {

    public function brakeDistance() : void {
        $brake_distance = ( $this->speed / 10 ) * ( $this->speed / 10 ) / 2;

        echo "{$this->manufactur} needs {$brake_distance} meters to brake!";
    }

}

class Bike extends Vehicle {

    public function brakeDistance() : void {
        $brake_distance = ( $this->speed / 10 ) * ( $this->speed / 10 );

        echo "{$this->manufactur} needs {$brake_distance} meters to brake!";
    }

}

$porsche = new Car( 'Porsche', 325 );
$mercedes = new Car( 'Mercedes', 250 );
$ducati = new Bike( 'Ducati', 330 );

$porsche->drive( 250 );
$mercedes->drive( 150 );
$ducati->drive( 180 );

echo "<pre>";
$porsche->metersInSeconds();
$porsche->brakeDistance();
echo "</pre>";
echo "<pre>";
$mercedes->metersInSeconds();
$mercedes->brakeDistance();
echo "</pre>";
echo "<pre>";
$ducati->metersInSeconds();
$ducati->brakeDistance();
echo "</pre>";