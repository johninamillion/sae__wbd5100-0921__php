<?php

namespace Application\Model;

use Application\Model;
use Application\Model\Traits\Users;
use Application\Session;

// Als Final deklariert, da wir keine Erben von dieser Klasse erwarten
// Erbt von Model und verfügt über die Methoden von dieser Klasse
// Verwendet den Users Trait und verfügt über die Methoden von diesem Trait
final class Login extends Model {

    use Users;

    public function login() : bool {
        /** @var ?string $username */
        $username   = filter_input( INPUT_POST, 'username' );
        /** @var ?string $password */
        $password   = filter_input( INPUT_POST, 'password' );

        /** @var ?array $user_data */
        $user_data  = $this->getUserDataByUsername( $username );

        // Überprüfen ob der Nutzername existiert
        if ( $user_data !== NULL ) {
            /** @var string $hashed_password */
            $hashed_password = hash( 'sha512', $password );

            // Überprüfen ob das Passwort übereinstimmt
            if ( $hashed_password === $user_data[ 'password' ] ) {
                Session::login( $username );

                return TRUE;
            }
        }

        return FALSE;
    }
    
}
