<?php

/**
 * PHP OOP Traits:
 * https://www.php.net/manual/en/language.oop5.traits.php
 */

// Eine Trait enthält Methoden welche in Klassen genutzt werden können.
trait validateUser {

    public function validateUsername( string $username ) : bool {

        return $username !== NULL;
    }

}

class Register {

    // Den Trait benutzen, die Klasse Register verfügt jetzt über die Methoden des Traits
    use validateUser;

    public function register() : void {
        if ( $this->validateUsername() ) {
            // ..
        }
    }

}

class Login {

    // Den Trait benutzen, die Klasse Login verfügt jetzt über die Methoden des Traits
    use validateUser;

    public function login() : void {
        if ( $this->validateUsername() ) {
            // ..
        }
    }

}
