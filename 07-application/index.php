<?php

// Error Reporting anschalten
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Configuration
define( 'USERS_FILE',               __DIR__ . '/data/users.txt' );
define( 'USERS_FILE_PERMISSIONS',   'rw+' );

// Error Variable und Funktion für Formulare
$errors = [];

function print_error( string $input_name ) : void {
    global $errors;

    if ( isset( $errors[ $input_name ] ) ) {
        foreach( $errors[ $input_name ] as $error ) {
            echo "<p class=\"error\">{$error}</p>";
        }
    }
}

// Controller
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' && isset( $_GET[ 'controller' ] ) ) {
    switch( $_GET[ 'controller' ] ) {
        case 'login':
            break;
        case 'register':
            include_once 'model/user.php';
            include_once 'model/register.php';
            $register = register( $errors );
            break;
    }
}

// Templates einbinden
include_once 'templates/header.php';

switch( $_GET[ 'template' ] ) {
    case 'login':
        include_once "templates/login.php";
        break;
    case 'register':
        include_once 'templates/register.php';
        break;
    default:
        echo "<h1>Home</h1>";
        break;
}

include_once 'templates/footer.php';

