<?php

abstract class ErrorReporting {

    const ALL       = E_ALL;
    const NOTICES   = E_NOTICE;
    const ERRORS    = E_ERROR;
    const WARNINGS  = E_WARNING;

    public static function displayErrors( ?int $error_level = self::ALL ) : void {
        error_reporting( $error_level );
        ini_set( 'display_errors', '1' );
    }

    public static function hideErrors() : void {
        ini_set( 'display_errors', '0' );
    }

}

class Example {

    public string $string = 'Hello!';

}

$example = new Example();

ErrorReporting::displayErrors();
ErrorReporting::hideErrors();

var_dump( $example );
