<?php

function login( string $username, string $password ) : bool {
    $user_data = get_user_data( $username );

    if ( $user_data !== NULL ) {
        $hashed_password = hash( 'sha512', $password );

        if ( $hashed_password === $user_data[ 'password' ] ) {
            $_SESSION[ 'login' ] = $username;
        }
    }

    return FALSE;
}

function logout() : bool {
    unset( $_SESSION[ 'login' ] );

    return TRUE;
}

function is_logged_in() : bool {

    return isset( $_SESSION[ 'login' ] ) === TRUE;
}
