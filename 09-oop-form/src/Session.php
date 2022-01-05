<?php

namespace Application;

abstract class Session {

    public static function login( string $username ) : void {
        $_SESSION[ 'login' ] = $username;
    }

    public static function logout() : void {
        unset( $_SESSION[ 'login' ] );
    }

    public static function start() : void {
        session_start();
    }

}
