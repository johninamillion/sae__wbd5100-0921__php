<?php

function get_user_data( string $username ) : ?array {
    $users_data = get_users_data();

    foreach ( $users_data as $user_data ) {
        if ( $user_data[ 'username' ] === $username ) {

            return $user_data;
        }
    }

    return NULL;
}

function get_users_data() : array {
    $users_data = [];

//    // Wir öffnen unsere Textdatei
//    $file = fopen( USERS_FILE, USERS_FILE_PERMISSIONS );
//    // Wir holen uns die Dateiinhalte
//    $data = fread( $file, filesize( USERS_FILE ) ?? 1 );
//    // Datei schließen
//    fclose( $file );

    // Nutzerdaten aus Datei holen
    $data = file_get_contents( USERS_FILE );
    // Wir zerlegen den String in ein Array, getrennt bei jeder neuen Zeile (\n)
    $explode_lines = explode( "\n", $data );

    foreach ( $explode_lines as $user_data ) {
        $explode_data = explode( '|', $user_data );

        // Überprüfen das die Nutzerdaten valide sind und es sich nicht um eine Leerzeile handelt
        if ( count( $explode_data ) === 3 ) {
            $users_data[] = [
                'username'  =>  $explode_data[ 0 ],
                'email'     =>  $explode_data[ 1 ],
                'password'  =>  $explode_data[ 2 ]
            ];
        }
    }

    return $users_data;
}

function username_exists( string $username ) : bool {
    $users = get_users_data();

    foreach ( $users as $user ) {
        if ( $user[ 'username' ] === $username ) {

            return TRUE;
        }
    }

    return FALSE;
}

function email_exists( string $email ) : bool {
    $users = get_users_data();

    foreach ( $users as $user ) {
        if ( $user[ 'email' ] === $email ) {

            return TRUE;
        }
    }

    return FALSE;
}
