<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

class StaticExample {
    private static string $string = '';
    public static int $int = 0;
    public static float $float = 0;

    public static function setString( string $value ) : void {
        self::$string = $value;
    }

    public static function getString() : string {
        return self::$string;
    }
}

class Example {
    private string $string = '';
    public int $int = 0;
    public float $float = 0;

    public function setString( string $value ) : void {
        $this->string = $value;
    }

    public function getString() : string {
        return $this->string;
    }
};

$example = new Example();
$example2 = new Example();

$staticExample = new StaticExample();
$staticExample2 = new StaticExample();

// Wir schreiben die Werte für das Objekt
$example->setString( 'Not Static!' );
$example->int = 1;
$example->float = 1.1;

// Wir schreiben die Werte statisch für die Klasse
StaticExample::setString( 'Static!' );
StaticExample::$int = 1;
StaticExample::$float = 1.1;

echo "<pre>";
var_dump( $example->getString() );
echo "</pre>";
echo "<pre>";
var_dump( $example2->getString() );
echo "</pre>";

echo "<pre>";
var_dump( $staticExample::getString() );
echo "</pre>";
echo "<pre>";
var_dump( $staticExample2::getString() );
echo "</pre>";
