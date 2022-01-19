<?php

// Datenbankconfiguration (config.php)
define( 'DB_NAME',  'sae_wbd0921_5100_cms' );
define( 'DB_USER',  'root' );
define( 'DB_PASS',  'root' );
define( 'DB_HOST',  'localhost' );
define( 'DB_PORT',  3306 );

// Error Reporting
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Database Klasse
class Database extends PDO {

    public function __construct() {
        $dsn = sprintf(
            'mysql:dbname=%1$s;host=%2$s;port=%3$s',
            DB_NAME,
            DB_HOST,
            DB_PORT
        );

        parent::__construct( $dsn, DB_USER, DB_PASS );
    }

}

// Formular auswerten
if ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'email' ] ) && isset( $_POST[ 'password' ] ) ) {
    $database = new Database();

    $username = filter_input( INPUT_POST, 'username' );
    $email = filter_input( INPUT_POST, 'email' );
    $password = filter_input( INPUT_POST, 'password' );
    $salt = hash( 'sha512', time() . rand( 1234, 9876 ) );

    // In unserer Query benutzen wir Platzhalter für unsere Werte die durch den Nutzer gegeben werden
    $query = 'INSERT INTO users (username, email, password, salt) VALUES ( :username, :email, :password, :salt )';

    // Wir bereiten unseren Query vor
    $statement = $database->prepare( $query );
    // Wir ersetzen die Platzhalter durch die Nutzereingaben
    $statement->bindValue( ':username', $username );
    $statement->bindValue( ':email', $email );
    $statement->bindValue( ':password', $password );
    $statement->bindValue( ':salt', $salt );
    // Abfeuern von unsere SQL query (In diesem Moment wird der Nutzer erstellt)
    $statement->execute();

    // Ausgabe wie viele Zeilen erstellen bzw. manipuliert wurden
    var_dump( $statement->rowCount() );

    // Ausgabe von Fehlermeldungen
    // var_dump( $statement->errorInfo() );
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
