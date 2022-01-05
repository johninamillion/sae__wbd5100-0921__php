<?php

namespace Application\Model\Traits;

// Beinhaltet Funktionen die im Login und Register Model verwendet werden (sich geteilt werden)
trait Users {

    /**
     * Gibt die Nutzerdaten nach Nutzernamen aus, wenn dieser Nutzer vorhanden ist.
     *
     * @param   string  $username
     * @return  array|NULL
     */
    public function getUserDataByUsername( string $username ) : ?array {
        /** @var array $users_data */
        $users_data = $this->getUsersData();

        foreach( $users_data as $user_data ) {
            if ( $user_data[ 'username' ] === $username ) {

                return $user_data;
            }
        }

        return NULL;
    }

    /**
     * Gibt die Nutzerdaten nach E-Mail Adresse aus, wenn dieser Nutzer vorhanden ist.
     *
     * @param   string  $email
     * @return  array|NULL
     */
    public function getUserDataByEmail( string $email ) : ?array {
        /** @var array $users_data */
        $users_data = $this->getUsersData();

        foreach( $users_data as $user_data ) {
            if ( $user_data[ 'email' ] === $email ) {

                return $user_data;
            }
        }

        return NULL;
    }

    /**
     * Gibt die Nutzerdaten aus der 'users.txt' aus.
     *
     * @return  array
     */
    public function getUsersData() : array {
        /** @var array $users_data */
        $users_data = [];

        /** @var string $data */
        $data = file_get_contents( USERS_FILE );
        /** @var array $explode_lines */
        $explode_lines = explode( "\n", $data );

        foreach ( $explode_lines as $user_data ) {
            /** @var array $explode_data */
            $explode_data = explode( '|', $user_data );

            // Überprüfen das die Nutzerdaten valide sind und es sich nicht um eine Leerziele handelt
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

    /**
     * Überprüft ob die E-Mail Adresse bereits registriert ist.
     *
     * @param   string  $email
     * @return  bool
     */
    public function emailExists( string $email ) : bool {

        return $this->getUserDataByEmail( $email ) !== NULL;
    }

    /**
     * Überprüft ob der Nutzername bereits registriert ist.
     *
     * @param   string  $username
     * @return  bool
     */
    public function usernameExists( string $username ) : bool {

        return $this->getUserDataByUsername( $username ) !== NULL;
    }

}
