<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Application</title>

        <!-- Stylesheet Einbindung -->
        <link rel="stylesheet" href="<?= $_SERVER[ 'REQUEST_SCHEME' ] . '://' .  $_SERVER[ 'HTTP_HOST' ] ?>/assets/css/application.css">
    </head>
    <body>

        <nav>
            <ul>
                <li><a href="?template=login"><?= _( 'Login' ) ?></a></li>
                <li><a href="?template=register"><?= _( 'Registration' ) ?></a></li>
            </ul>
        </nav>
