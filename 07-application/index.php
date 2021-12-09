<?php

// Error Reporting anschalten
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Configuration
define( 'USERS_FILE',               __DIR__ . '/data/users.txt' );
define( 'USERS_FILE_PERMISSIONS',   'rw+' );

// Session
session_start();

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

// Models einbinden
require_once 'model/login.php';
require_once 'model/user.php';
require_once 'model/register.php';

// Controller
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' && isset( $_GET[ 'controller' ] ) ) {
    switch( $_GET[ 'controller' ] ) {
        case 'login':
            $login = login( $_POST[ 'username' ], $_POST[ 'password' ] );
            break;
        case 'register':
            $register = register( $errors );
            header( 'Location: /?template=login' );
            break;
    }
}

if ( $_SERVER[ 'REQUEST_METHOD' ] === 'GET' && isset( $_GET[ 'controller' ] ) ) {
    switch( $_GET[ 'controller' ] ) {
        case 'logout':
            $logout = logout();
            header( 'Location: /?template=login' );
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
    case 'admin':
        // Wenn der Nutzer eingeloggt stellen wir ihm die Seite da
        if ( is_logged_in() ) {
            include_once 'templates/admin.php';
        }
        // Wenn der Nutzer nicht eingeloggt ist leiten wir ihn zum login weiter
        else {
            header( 'Location: /?template=login' );
        }
        break;
    default:
        echo "<h1>Home</h1>";
        break;
}

echo "<pre>";
var_dump( $_SESSION );
echo "</pre>";

include_once 'templates/footer.php';
