<?php

namespace Application\Controller;

use Application\Controller;

// Als Final deklariert, da wir keine Erben von dieser Klasse erwarten
// Erbt von Controller und verfügt über die Methoden von dieser Klasse
final class Admin extends Controller {

    /**
     * Index Template vom Admin Controller, gibt die Adminseite aus
     *
     * @return  void
     */
    public function index(): void {
        // View
        $this->getTemplatePart( 'header' );
        echo "Admin!";
        $this->getTemplatePart( 'footer' );
    }

}
