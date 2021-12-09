<?php

/*
 * PHP fopen
 * https://www.php.net/manual/en/function.fopen.php
 * PHP fread
 * https://www.php.net/manual/en/function.fclose.php
 * PHP fwrite
 * https://www.php.net/manual/en/function.fwrite.php
 * PHP file_get_contents
 * https://www.php.net/manual/en/function.file-get-contents.php
 * PHP file_put_contents:
 * https://www.php.net/manual/en/function.file-put-contents.php
 */

function register( array &$errors ) : bool {
    $username           = $_POST[ 'username' ] ?? NULL;
    $email              = $_POST[ 'email' ] ?? NULL;
    $password           = $_POST[ 'password' ] ?? NULL;
    $password_repeat    = $_POST[ 'password_repeat' ] ?? NULL;

    $validate_username  = validate_username( $errors, $username );
    $validate_email     = validate_email( $errors, $email );
    $validate_password  = validate_password( $errors, $password, $password_repeat );

    if ( $validate_username && $validate_email && $validate_password ) {
        // Passwort verschlüsseln
        $hashed_password = hash( 'sha512', $password );
        // Nutzerdaten string erstellen
        $data_string = "{$username}|{$email}|{$hashed_password}\n";

//        // Wir öffnen unsere Textdatei
//        $file = fopen( USERS_FILE, 'r' );
//        // Wir holen uns die Dateiinhalte
//        $content = fread( $file, filesize( USERS_FILE ) ?? 1 );
//        // Wir speichern die Datei
//        fclose( $file );
//
//        // Wir öffnen unsere Textdatei
//        $file = fopen( USERS_FILE, USERS_FILE_PERMISSIONS );
//        // Wir schreiben den neuen Nutzer ans Ende der Dateiinhalte
//        $write = fwrite( $file, $content . $data_string );
//        // Wir speichern die Datei
//        fclose( $file );

        // An das Ende der Datei schreiben
        $write = file_put_contents( USERS_FILE, $data_string, FILE_APPEND );

        return $write !== FALSE;
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
    // Überprüfen ob die E-Mail Adresse bereits verwendet wird
    if ( email_exists( $email ) === TRUE ) {
        $errors[ 'email' ][] = _( 'E-Mail address already exists' );
    }
    // Überprüfen ob die E-Mail Adresse valide ist
    if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) === FALSE ) {
        $errors[ 'email' ][] = _( 'E-Mail address should be valid' );
    }

    return isset( $errors[ 'email' ] ) === FALSE || count( $errors[ 'email' ] ) === 0;
}

function validate_username( array &$errors, ?string $username ) : bool {
    // Überprüfen ob ein Nutzername eingegeben wurde
    if ( is_null( $username ) ){
        $errors[ 'username' ][] = _( 'Please type in a valid username' );
    }
    // Überprüfen ob der Nutzername bereits verwendet wird
    if ( username_exists( $username ) === TRUE ) {
        $errors[ 'username' ][] = _( 'Username already exists' );
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
    if ( $password !== $password_repeat ) {
        $errors[ 'password' ][] = _( 'Your password doesn\'t match the repeated password' );
    }
    // Überprüfen ob das Passwort leerzeichen enthält
    // Wir vergleichen die Werte und nicht die Typen, preg_match gibt 0 zurück ( == anstatt === )
    if ( preg_match( '/\s/', $password ) == TRUE ) {
        $errors[ 'password' ][] = _( 'Password should not contain any whitespace' );
    }
    // Überprüfen ob das Passwort Kleinbuchstaben enthält
    // Wir vergleichen die Werte und nicht die Typen, preg_match gibt 0 zurück ( == anstatt === )
    if ( preg_match( '/[a-z]/', $password ) == FALSE ) {
        $errors[ 'password' ][] = _( 'Password should contain minimum one small letter' );
    }
    // Überprüfen ob das Passwort Großbuchstaben enthält
    // Wir vergleichen die Werte und nicht die Typen, preg_match gibt 0 zurück ( == anstatt === )
    if( preg_match( '/[A_Z]/', $password ) == FALSE ) {
        $errors[ 'password' ][] = _( 'Password should contain minimum one capital letter' );
    }
    // Überprüfen ob dsa Passwort Zahlen enthält
    // Wir vergleichen die Werte und nicht die Typen, preg_match gibt 0 zurück ( == anstatt === )
    if ( preg_match( '/\d/', $password ) == FALSE ) {
        $errors[ 'password' ][] = _( 'Password should contain minimum one digit' );
    }
    // Überprüfen ob dsa Passwort Sonderzeichen enthält
    // Wir vergleichen die Werte und nicht die Typen, preg_match gibt 0 zurück ( == anstatt === )
    if ( preg_match( '/\W/', $password ) == FALSE ) {
        $errors[ 'password' ][] = _( 'Passwourd should contain minimum one special character' );
    }

    return isset( $errors[ 'password' ] ) === FALSE || count( $errors[ 'password' ] ) === 0;
}
