<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Login as LoginModel;

// Als Final deklariert, da wir keine Erben von dieser Klasse erwarten
// Erbt von Controller und verfügt über die Methoden von dieser Klasse
final class Login extends Controller {

    private ?LoginModel $LoginModel = NULL;

    public function __construct() {
        $this->LoginModel = new LoginModel();
    }

    /**
     * Index Template vom Login Controller, gibt die Loginseite aus
     *
     * @return  void
     */
    public function index(): void {
        // Überprüfen ob das Formular abgeschickt wurde
        if ( $this->isRequestMethod( self::REQUEST_METHOD_POST ) ) {
            if ( $this->LoginModel->login() ) {
                $this->redirect( '/?controller=admin' );
            }
        }

        // View
        $this->getTemplatePart( 'header' );
        $this->getTemplatePart( 'login' );
        $this->getTemplatePart( 'footer' );
    }

}
