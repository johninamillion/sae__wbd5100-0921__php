<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Eine als abstract deklarierte Klasse erlaubt uns eine Vererbung allerdings keine Instanziierung der Klasse
abstract class Student {

    protected ?string $name = NULL;

    protected bool $present = FALSE;

    public function __construct( string $name ) {
        $this->name = $name;
    }

    public function isPresent() : void {
        $this->present = TRUE;
    }

    public function doExam() : float {

        return $this->present === TRUE ? 100 * $this->presence : 0;
    }

}

// Wir erben von der Klasse Student
// Eine als final deklarierte Klasse erlaubt uns keine Erben mehr von dieser Klasse zu erstellen
final class FemaleStudent extends Student {

    protected float $presence = 0.9;

}

// Wir erben von der Klasse Student
// Eine als final deklarierte Klasse erlaubt uns keine Erben mehr von dieser Klasse zu erstellen
final class MaleStudent extends Student {

    protected float $presence = 0.8;

}

$jana = new FemaleStudent( 'Jana' );
$jan = new MaleStudent( 'Jan' );

$jana->isPresent();

echo "<pre>";
var_dump( $jana->doExam() );    // Jana hat ein Ergebnis von 90 Punkten basierend auf ihrer durschnittlichen Anwesenheit
echo "</pre>";

echo "<pre>";
var_dump( $jan->doExam() );     // Jan hat ein Ergebnis von 0 Punkten da er bei dem Exam nicht anwesend ist
echo "</pre>";
