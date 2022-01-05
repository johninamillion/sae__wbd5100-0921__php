<?php

namespace Application;

abstract class Controller {

    const REQUEST_METHOD_GET = 'GET';
    const REQUEST_METHOD_POST = 'POST';

    /**
     * Erben benötigen eine public function index mit dem Rückgabewert 'void'
     */
    abstract public function index() : void;

    /**
     * Einbindung von einem Template Part
     *
     * @param   string  $template_part
     * @return  void
     */
    protected function getTemplatePart( string $template_part ) : void {
        $template_file = TEMPLATES_DIR . DIRECTORY_SEPARATOR . "{$template_part}.php";

        if ( file_exists( $template_file ) ) {
            include_once $template_file;
        }
    }

    /**
     * Überprüfen auf übereinstimmung der REQUEST_METHOD in der superglobalen $_SERVER variable
     *
     * @param   string  $method
     * @return  bool
     */
    protected function isRequestMethod( string $method ) : bool {

        return $_SERVER[ 'REQUEST_METHOD' ] === $method;
    }

    /**
     * Weiterleitung
     *
     * @param   string  $target
     * @return  void
     */
    protected function redirect( string $target ) : void {
        header( "Location: {$target}" );
    }

}
