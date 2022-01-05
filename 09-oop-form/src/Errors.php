<?php

namespace Application;

abstract class Errors {

    /**
     * Ein Array welcher alle Fehlermeldungen enthält
     *
     * @access  private
     * @static
     * @var     array
     */
    private static array $data = [];

    /**
     * Speichert einer Fehlermeldung im Data Array.
     *
     * @param   string  $input_name
     * @param   string  $error_message
     * @return  void
     */
    public static function addError( string $input_name, string $error_message ) : void {
        self::$data[ $input_name ][] = $error_message;
    }

    /**
     * Gibt die Fehlermeldungen aus dem Data Array aus.
     *
     * Wenn kein Argument für den Parameter '$input_name' mitgegeben wurde, werden alle Fehlermeldungen zurückgegeben.
     *
     * @param   string|NULL $input_name
     * @return  array
     */
    public static function getErrors( ?string $input_name = NULL ) : array {

        return $input_name !== NULL ? self::$data[ $input_name ] : self::$data;
    }

    /**
     * Gibt TRUE zurück wenn Fehlermeldungen für den Key '$input_name' vorliegen.
     *
     * @param   string  $input_name
     * @return  bool
     */
    public static function hasErrors( string $input_name ) : bool {

        return isset( self::$data[ $input_name ] );
    }

    /**
     * Gibt Fehlermeldungen passend zu einem Input-Feld aus, wenn vorhanden.
     *
     * @param   string  $input_name
     * @return  void
     */
    public static function printInputErrors( string $input_name ) : void {
        if ( self::hasErrors( $input_name ) === FALSE ) {

            return;
        }

        foreach ( self::getErrors( $input_name ) as $error_message ) {
            echo "<p class=\"error\" style=\"color: red\">{$error_message}</p>";
        }
    }

}
