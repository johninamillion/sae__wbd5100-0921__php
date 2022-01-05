<?php

namespace Application;

use Application\Controller\Admin as AdminController;
use Application\Controller\Login as LoginController;
use Application\Controller\Logout as LogoutController;
use Application\Controller\Register as RegisterController;

// Autoloader einbinden
include_once 'autoload.php';
// Configuration einbinden
include_once 'config.php';

switch( $_GET[ 'controller' ] ?? NULL ) {
    case 'admin':
        ( new AdminController() )->index();
        break;
    case 'login':
        ( new LoginController() )->index();
        break;;
    case 'logout':
        ( new LogoutController() )->index();
        break;
    case 'register':
        ( new RegisterController() )->index();
        break;
    default:
        echo "404 - Page not Found!";
        break;
}

var_dump( $_SESSION );