<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Register as RegisterModel;

// Als Final deklariert, da wir keine Erben von dieser Klasse erwarten
// Erbt von Controller und verfügt über die Methoden von dieser Klasse
final class Register extends Controller {

    private ?RegisterModel $RegisterModel = NULL;

    public function __construct() {
        $this->RegisterModel = new RegisterModel();
    }

    /**
     * Index Template vom Register Controller, gibt die Registrierungsseite aus
     *
     * @return  void
     */
    public function index(): void {
        // Überprüfen ob das Formular abgeschickt wurde
        if ( $this->isRequestMethod( self::REQUEST_METHOD_POST ) ) {
            // Überprüfen ob die Registrierung geklappt hat
            if ( $this->RegisterModel->register() ) {
                // Weiterleiten zum Login
                $this->redirect( '/?controller=login' );
            }
        }

        // View
        $this->getTemplatePart( 'header' );
        $this->getTemplatePart( 'register' );
        $this->getTemplatePart( 'footer' );
    }

}
