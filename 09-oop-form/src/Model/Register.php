<?php

namespace Application\Model;

use Application\Errors;
use Application\Model;
use Application\Model\Traits\Users;

// Als Final deklariert, da wir keine Erben von dieser Klasse erwarten
// Erbt von Model und verfügt über die Methoden von dieser Klasse
// Verwendet den Users Trait und verfügt über die Methoden von diesem Trait
final class Register extends Model {

    use Users;

    public function register() : bool {
        /** @var ?string $country */
        $country            = filter_input( INPUT_POST, 'country' );
        /** @var ?string $gender */
        $gender             = filter_input( INPUT_POST, 'gender' );
        /** @var ?string $username */
        $username           = filter_input( INPUT_POST, 'username' );
        /** @var ?string $email */
        $email              = filter_input( INPUT_POST, 'email' );
        /** @var ?string $password */
        $password           = filter_input( INPUT_POST, 'password' );
        /** @var ?string $password_repeat */
        $password_repeat    = filter_input( INPUT_POST, 'password_repeat' );
        /** @var ?string $terms */
        $terms              = filter_input( INPUT_POST, 'terms' );

        /** @var bool $validate_country */
        $validate_country   = $this->validateCountry( $country );
        /** @var bool $validate_gender */
        $validate_gender    = $this->validateGender( $gender );
        /** @var bool $validate_username */
        $validate_username  = $this->validateUsername( $username );
        /** @var bool $validate_email */
        $validate_email     = $this->validateEmail( $email );
        /** @var bool $validate_password */
        $validate_password  = $this->validatePassword( $password, $password_repeat );
        /** @var bool $validate_terms */
        $validate_terms     = $this->validateTerms( $terms );

        if (    $validate_country
            &&  $validate_gender
            &&  $validate_username
            &&  $validate_email
            &&  $validate_password
            &&  $validate_terms
        ) {
            /** @var string $hashed_password */
            $hashed_password = hash( 'sha512', $password );
            /** @var string $user_data_string */
            $user_data_string = "{$username}|{$email}|{$hashed_password}\n";
            /** @var int|bool $write */
            $write = file_put_contents( USERS_FILE, $user_data_string, FILE_APPEND );

            return $write !== FALSE;
        }

        return FALSE;
    }


    /**
     * Validieren des Landes (Select)
     *
     * @param   string|NULL $country
     * @return  bool
     */
    private function validateCountry( ?string $country ) : bool {
        // Überprüfen ob ein Land ausgewählt wurde
        if ( is_null( $country ) ) {
            Errors::addError( 'country', _( 'Please select a country' ) );
        }
        // Überprüfen ober der Wert valide ist
        if ( in_array( $country, [ 'austria', 'germany', 'luxembourg', 'swiss' ] ) === FALSE ) {
            Errors::addError( 'country', _( 'Please select a valid Country' ) );
        }

        return  Errors::hasErrors( 'country' ) === FALSE;
    }

    /**
     * Validieren einer E-Mail Adresse
     *
     * @param   string|NULL $email
     * @return  bool
     */
    private function validateEmail( ?string $email ) : bool {
        // Überprüfen ob eine E-Mail Adresse angegeben wurde
        if ( is_null( $email ) ) {
            Errors::addError( 'email', _( 'Please type in a valid E-Mail address' ) );
        }
        // Überprüfen ob die E-Mail Adresse bereits registriert ist
        if ( $this->emailExists( $email ) === TRUE ) {
            Errors::addError( 'email', _( 'E-Mail address is already registered' ) );
        }
        // Überprüfen ob die E-Mail Adresse valide ist
        if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) === FALSE ) {
            Errors::addError( 'email', _( 'E-Mail address should be valid' ) );
        }

        return  Errors::hasErrors( 'email' ) === FALSE;
    }

    /**
     * Validieren des Geschlechtes (Radiobutton)
     *
     * @param   string|NULL $gender
     * @return  bool
     */
    private function validateGender( ?string $gender ) : bool {
        // Überprüfen ob ein Geschlecht ausgewählt wurde
        if ( is_null( $gender ) ) {
            Errors::addError( 'gender', _( 'Please select a gender.' ) );
        }
        // Überprüfen ob der Wert von Gender valide ist
        if ( in_array( $gender, [ 'male', 'female' ] ) === FALSE ) {
            Errors::addError( 'gender', _( 'Please select a valid gender' ) );
        }

        return  Errors::hasErrors( 'gender' ) === FALSE;
    }

    /**
     * Validieren des Passworts und der Passwort Wiederholung
     *
     * @param   string|NULL $password
     * @param   string|NULL $password_repeat
     * @return  bool
     */
    private function validatePassword( ?string $password, ?string $password_repeat ) : bool {
        // Überprüfen ob ein Passwort angegeben wurde
        if ( is_null( $password ) ) {
            Errors::addError( 'password', _( 'Please type in a valid password' ) );
        }
        // Überprüfen ob das Passwort wiederholt wurde
        if ( is_null( $password_repeat ) ) {
            Errors::addError( 'password', _( 'Please repeat your valid password' ) );
        }
        // Überprüfen ob das Passwort mindestens 8 Zeichen hat
        if ( strlen( $password ) < 8 ) {
            Errors::addError( 'password', _( 'Password should be minimum 8 Characters long.' ) );
        }
        // Überprüfen ob das Passwort und die Wiederholung übereinstimmen
        if ( $password !== $password_repeat ) {
            Errors::addError( 'password', _( 'Your password doesn\'t match the repeated password' ) );
        }
        // Überprüfen ob das Passwort leerzeichen enthält
        // Wir vergleichen die Werte und nicht die Typen, preg_match gibt 0 zurück ( == anstatt === )
        if ( preg_match( '/\s/', $password ) == TRUE ) {
            Errors::addError( 'password', _( 'Password should not contain any whitespace' ) );
        }
        // Überprüfen ob das Passwort Kleinbuchstaben enthält
        // Wir vergleichen die Werte und nicht die Typen, preg_match gibt 0 zurück ( == anstatt === )
        if ( preg_match( '/[a-z]/', $password ) == FALSE ) {
            Errors::addError( 'password', _( 'Password should contain minimum one small letter' ) );
        }
        // Überprüfen ob das Passwort Großbuchstaben enthält
        // Wir vergleichen die Werte und nicht die Typen, preg_match gibt 0 zurück ( == anstatt === )
        if( preg_match( '/[A_Z]/', $password ) == FALSE ) {
            Errors::addError( 'password', _( 'Password should contain minimum one capital letter' ) );
        }
        // Überprüfen ob dsa Passwort Zahlen enthält
        // Wir vergleichen die Werte und nicht die Typen, preg_match gibt 0 zurück ( == anstatt === )
        if ( preg_match( '/\d/', $password ) == FALSE ) {
            Errors::addError( 'password', _( 'Password should contain minimum one digit' ) );
        }
        // Überprüfen ob dsa Passwort Sonderzeichen enthält
        // Wir vergleichen die Werte und nicht die Typen, preg_match gibt 0 zurück ( == anstatt === )
        if ( preg_match( '/\W/', $password ) == FALSE ) {
            Errors::addError( 'password', _( 'Passwourd should contain minimum one special character' ) );
        }

        return  Errors::hasErrors( 'password' ) === FALSE
            &&  Errors::hasErrors( 'password_repeat' ) === FALSE;
    }

    /**
     * Validieren der AGBs (Checkbox)
     *
     * @param   string|NULL $terms
     * @return  bool
     */
    private function validateTerms( ?string $terms ) : bool {
        // Überprüfen ob der Nutzer die AGBs akzeptiert hat
        if ( is_null( $terms ) ) {
            Errors::addError( 'terms', _( 'Please accept the terms and conditions' ) );
        }

        return  Errors::hasErrors( 'terms' ) === FALSE;
    }

    /**
     * Validieren des Nutzernamens
     *
     * @param   string|NULL $username
     * @return  bool
     */
    private function validateUsername( ?string $username ) : bool {
        // Überprüfen ob ein Nutzername eingegeben wurde
        if ( is_null( $username ) ){
            Errors::addError(  'username', _( 'Please type in a valid username' ) );
        }
        // Überprüfen ob der Nutzername bereits registriert ist
        if ( $this->usernameExists( $username ) === TRUE ) {
            Errors::addError( 'username', _( 'Username is already registered' ) );
        }
        // Überprüfen ob der Nutzername mindestens 4 Zeichen hat
        if ( strlen( $username ) < 4 ) {
            Errors::addError(  'username', _( 'Username should be minimum 4 Characters long' ) );
        }
        // Überprüfen ob der Nutzername maximal 16 Zeichen hat
        if ( strlen( $username ) > 16 ) {
            Errors::addError(  'username', _( 'Username should be maximum 16 Characters long' ) );
        }

        return  Errors::hasErrors( 'username' ) === FALSE;
    }

}
