<?php

namespace Application;

/**
 * Ermöglicht das automatisierte Laden von Klassen, Interfaces und Traits
 *
 * @param   string  $class
 * @return  void
 */
function autoload( string $class ) : void {
    /** @var string $src_directory */
    $src_directory = APPLICATION_ROOT . DIRECTORY_SEPARATOR . 'src';
    /** @var string $replace_namespace */
    $replace_namespace = str_replace( 'Application', $src_directory, $class );
    /** @var string $replace_separator */
    $replace_separator = str_replace( '\\', DIRECTORY_SEPARATOR, $replace_namespace );
    /** @var string $file */
    $file = "{$replace_separator}.php";

    if ( file_exists( $file ) ) {
        require_once $file;
    }
}

spl_autoload_register( __NAMESPACE__ . '\\autoload' );
