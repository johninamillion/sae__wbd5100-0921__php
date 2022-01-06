<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

$errors = [];

function register( &$errors ) : void {
    /** @var ?string $username */
    $username = filter_input( INPUT_POST, 'username' );
    /** @var ?string $password */
    $password = filter_input( INPUT_POST, 'password' );

    $validate_username = validate_username( $username, $errors );
    $validate_password = validate_password( $password, $errors );

    if ( $validate_username && $validate_password ) {
        // Nutzer Registrierung
    }
}

function print_input_errors( string $input_name ) : void {
    global $errors;

    if ( isset( $errors[ $input_name ] ) ) {
        foreach ( $errors[ $input_name ] as $error ) {
            echo "<p class=\"error\">{$error}</p>";
        }
    }
}

function validate_username( ?string $username, array &$errors ) : bool {
    if ( is_null( $username ) || $username === '' ) {
        $errors[ 'username' ][] = 'Please type in a Username';
    }

    return isset( $errors[ 'username' ] ) === FALSE;
}

function validate_password( ?string $password, array &$errors ) : bool {
    if ( is_null( $password ) || $password === '' ) {
        $errors[ 'password' ][] = 'Please type in a Password';
    }

    return isset( $errors[ 'password' ] ) === FALSE;
}

// Überprüfen ob der Nutzer Daten abgeschickt hat
if ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) ) {
    register( $errors );
}

?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div>
            <?php
                if ( count( $errors ) > 0 ) {
                    echo "<h1>Du hast ein Fehler gemacht!</h1>";
                }
            ?>
        </div>
        <form method="post" action="index.php">
            <div>
                <label>Username</label>
                <input type="text" name="username">
                <?php print_input_errors( 'username' ); ?>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password">
                <?php print_input_errors( 'password' ); ?>
            </div>
            <div>
                <input type="submit" value="Abschicken">
            </div>
        </form>
    </body>
</html>