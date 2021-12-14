<?php

// Error Reporting anschalten
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Configuration
define( 'BLOG_FILE',                __DIR__ . '/data/blog.txt' );
define( 'USERS_FILE',               __DIR__ . '/data/users.txt' );
define( 'USERS_FILE_PERMISSIONS',   'rw+' );
define( 'LOCALES_DIR',              __DIR__ . '/locales' );

// GetText Übersetzungen laden
//switch( $_GET[ 'lang' ] ?? NULL ) {
//    case 'de_DE':
//        $file_lang = 'de_DE';
//        break;
//    default:
//        $file_lang = 'en_US';
//        break;
//}
//
//// Serversprache wechseln
//putenv("LANG=$file_lang");
//// Serverzeit anpassen
//setlocale(LC_ALL, $file_lang.'.UTF-8');
//
//$a = bindtextdomain( 'messages', LOCALES_DIR . '/' . $file_lang . '/LC_MESSAGES/messages.mo' );
//$b = textdomain( 'messages' );
//$c = bind_textdomain_codeset( 'messages', 'UTF-8' );
//
//var_dump( $a );

// I18N support information here
$language = "de_DE";
putenv("LANG=" . $language);
putenv("LC_MESSAGES=" . $language.'.UTF-8');
//setlocale(LC_MESSAGES, $language. '.UTF-8');

// Set the text domain as "messages"
$domain = "messages";
textdomain($domain);
$a = bindtextdomain( $domain, 'locales' );
bind_textdomain_codeset($domain, 'UTF-8');

var_dump( $a );
var_dump(
    gettext( 'Username' )
);

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
require_once 'model/blog.php';
require_once 'model/login.php';
require_once 'model/user.php';
require_once 'model/register.php';

// Controller
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' && isset( $_GET[ 'controller' ] ) ) {
    switch( $_GET[ 'controller' ] ) {
        case 'admin':
            $create_post = create_post( $errors );
            break;
        case 'login':
            $login = login( $_POST[ 'username' ], $_POST[ 'password' ] );
            header( 'Location: /?template=admin&redirect=login' );
            break;
        case 'register':
            $register = register( $errors );
            header( 'Location: /?template=login&redirect=register' );
            break;
    }
}

if ( $_SERVER[ 'REQUEST_METHOD' ] === 'GET' && isset( $_GET[ 'controller' ] ) ) {
    switch( $_GET[ 'controller' ] ) {
        case 'logout':
            $logout = logout();
            header( 'Location: /?template=login&redirect=logout' );
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
            header( 'Location: /?template=login&redirect=admin' );
        }
        break;
    case 'blog':
        include_once 'templates/blog.php';
        break;
    case 'user':
        if ( isset( $_GET[ 'username' ] ) ) {
            include_once 'templates/user.php';
        }
        else {
            header( 'Location: /?template=blog&redirect=user' );
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
