<?php

// Datenbankkonfiguration (config.php)
define( 'DB_NAME',  'sae_wbd0921_5100_cms' );
define( 'DB_USER',  'root' );
define( 'DB_PASS',  'root' );
define( 'DB_HOST',  'localhost' );
define( 'DB_PORT',  3306 );

// Error Handling
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Formular bearbeiten
if ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'email' ] ) && isset( $_POST[ 'password' ] ) ) {
    $username = filter_input( INPUT_POST, 'username' );
    $email = filter_input( INPUT_POST, 'email' );
    $password = filter_input( INPUT_POST, 'password' );
    $salt = hash( 'sha512', time() . rand( 1234, 9876 ) );

    // Wenn wir die Werte ungefiltert vom Nutzer übernehmen und in unsere Query einbauen, ermöglichen wir den Nutzer SQL-Injections
    // Hierrüber kann der Nutzer Datensätze manipulieren und löschen, wenn er über gewisse Information zur Datenbankstruktur verfügt.
    // $query = "INSERT INTO users (username, email, password, salt) VALUES ( '$username', '$email', '$password', '$salt' );";
    $db_connection = mysqli_connect( DB_HOST, DB_USER, DB_PASS, DB_NAME );

    // Mit der verwendung von mysqli_real_escape_string vermeiden wir diese Art von Angriffen durch den Nutzer
    $escape_username = mysqli_real_escape_string( $db_connection, $username );
    $escape_email = mysqli_real_escape_string( $db_connection, $email );
    $escape_password = mysqli_real_escape_string( $db_connection, $password );
    $escape_salt = mysqli_real_escape_string( $db_connection, $salt );

    // Wir verwenden die sicheren eingeben vom Nutzer welche wir mit mysqli_real_escape sichergestellt haben
    $query = "INSERT INTO users (username, email, password, salt) VALUES ( '$escape_username', '$escape_email', '$escape_password', '$escape_salt' );";

    $db_connection = mysqli_connect( DB_HOST, DB_USER, DB_PASS, DB_NAME );

    // Wir feuren unsere Query ab (In diesem Moment wird der Nutzer erstellt)
    mysqli_query( $db_connection, $query );

    // Über die Anzahl der bearbeiten Zeilen können wir erfahren ob die Aktion erfolgreich war.
    mysqli_affected_rows();

    echo "<pre>";
    var_dump( $db_connection );
    echo "</pre>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MySQL Connection</title>
    </head>
    <body>
        <form method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username">
            </div>
            <div>
                <label for="email">E-Mail</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="password">Passwort</label>
                <input type="password" name="password">
            </div>
            <input type="submit" value="Registrieren">
        </form>
    </body>
</html>
