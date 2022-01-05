<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

class Car {

    private bool $engine = FALSE;

    private bool $drive = FALSE;

    public function startEngine() : void {
        if ( $this->engineStarted() ) {
            trigger_error( 'You already started the engine!' );

            return;
        }

        $this->engine = TRUE;

        echo "Engine started \n";
    }

    public function drive() : void {
        if ( $this->engineStopped() ) {
            trigger_error( 'You need to start the engine before you are able to drive' );

            return;
        }

        $this->drive = TRUE;
        echo "Car drive! \n";
    }

    public function brake() : void {
        if ( $this->engineStopped() ) {
            trigger_error( 'You need to start the engine before you are able to brake' );

            return;
        }

        $this->drive = FALSE;
        echo "Car stopped! \n";
    }

    public function stopEngine() : void {
        if ( $this->drive === TRUE ) {
            trigger_error( 'You need to brake before you are able to stop the engine' );

            return;
        }

        $this->engine = FALSE;
        echo "Engine stopped! \n";
    }

    private function engineStarted() : bool {

        return $this->engine === TRUE;
    }

    private function engineStopped() : bool {

        return $this->engine === FALSE;
    }

}

$porsche = new Car();
$mercedes = new Car();

$porsche->startEngine();
$porsche->drive();
$porsche->brake();
$porsche->stopEngine();

$mercedes->startEngine();
$mercedes->startEngine(); // triggert einen Error, da die Engine von dem Objekt bereits gestartet wurde
