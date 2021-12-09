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
                <?php if ( is_logged_in() === FALSE ) : ?><li><a href="?template=register"><?= _( 'Registration' ) ?></a></li><?php endif; ?>
                <?php if ( is_logged_in() === FALSE ) : ?><li><a href="?template=login"><?= _( 'Login' ) ?></a></li><?php endif; ?>
                <?php if ( is_logged_in() === TRUE ) : ?><li><a href="?controller=logout"><?= _( 'Logout' ) ?></a></li><?php endif; ?>
            </ul>
        </nav>
