<?php

function register( array &$errors ) : bool {
    $username           = $_POST[ 'username' ] ?? NULL;
    $email              = $_POST[ 'email' ] ?? NULL;
    $password           = $_POST[ 'password' ] ?? NULL;
    $password_repeat    = $_POST[ 'password_repeat' ] ?? NULL;

    $validate_username  = validate_username( $errors, $username );
    $validate_email     = validate_email( $errors, $email );
    $validate_password  = validate_password( $errors, $password, $password_repeat );

    if ( $validate_username && $validate_email && $validate_password ) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

function validate_email( array &$errors, ?string $email ) : bool {
    // Überprüfen ob eine E-Mail Adresse angegeben wurde
    if ( is_null( $email ) ){
        $errors[ 'email' ][] = _( 'Please type in a valid E-Mail address' );
    }
    // Überprüfen ob die E-Mail Adresse valide ist
    if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        $errors[ 'email' ][] = _( 'E-Mail address should be valid' );
    }

    return isset( $errors[ 'email' ] ) === FALSE || count( $errors[ 'email' ] ) === 0;
}

function validate_username( array &$errors, ?string $username ) : bool {
    // Überprüfen ob ein Nutzername eingegeben wurde
    if ( is_null( $username ) ){
        $errors[ 'username' ][] = _( 'Please type in a valid username' );
    }
    // Überprüfen ob der Nutzername mindestens 4 Zeichen hat
    if ( strlen( $username ) < 4 ) {
        $errors[ 'username' ][] = _( 'Username should be minimum 4 Characters long.' );
    }
    // Überprüfen ob der Nutzername maximal 16 Zeichen hat
    if ( strlen( $username ) > 16 ) {
        $errors[ 'username' ][] = _( 'Username should be maximum 16 Characters long' );
    }

    return isset( $errors[ 'username' ] ) === FALSE || count( $errors[ 'username' ] ) === 0;
}

function validate_password( array &$errors, ?string $password, ?string $password_repeat ) : bool {
    // Überprüfen ob ein Passwort angegeben wurde
    if ( is_null( $password ) ) {
        $errors[ 'password' ][] = _( 'Please type in a valid password' );
    }
    // Überprüfen ob das Passwort wiederholt wurde
    if ( is_null( $password_repeat ) ) {
        $errors[ 'password' ][] = _( 'Please repeat your valid password' );
    }
    // Überprüfen ob das Passwort mindestens 8 Zeichen hat
    if ( strlen( $password ) < 8 ) {
        $errors[ 'password' ][] = _( 'Password should be minimum 8 Characters long.' );
    }
    // Überprüfen ob das Passwort und die Wiederholung übereinstimmen
    if ( $password === $password_repeat ) {
        $errors[ 'password' ][] = _( 'Your password doesn\'t match the repeated password' );
    }

    return isset( $errors[ 'password' ] ) === FALSE || count( $errors[ 'password' ] ) === 0;
}
