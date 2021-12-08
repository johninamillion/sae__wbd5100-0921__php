<?php

include_once 'templates/header.php';

switch( $_GET[ 'template' ] ) {
    case 'login':
        include_once "templates/login.php";
        break;
    case 'register':
        include_once 'templates/register.php';
        break;
    default:
        echo "<h1>Home</h1>";
        break;
}

include_once 'templates/footer.php';

