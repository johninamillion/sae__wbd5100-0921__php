<?php

namespace Application\Controller;

use Application\Controller;
use Application\Session;

// Als Final deklariert, da wir keine Erben von dieser Klasse erwarten
// Erbt von Controller und verfügt über die Methoden von dieser Klasse
final class Logout extends Controller {

    /**
     * Index Template vom Logout Controller, Logt den Nutzer aus und leitet zum Login weiter
     *
     * @return  void
     */
    public function index(): void {
        Session::logout();
        $this->redirect( '/?controller=login' );
    }

}
