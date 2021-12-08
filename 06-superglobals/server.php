<?php

/*
 * PHP Superglobals:
 * https://www.php.net/manual/en/language.variables.superglobals.php
 * PHP $_SERVER:
 * https://www.php.net/manual/en/reserved.variables.server.php
 */

// <?=      kurzschreibweise für <?php echo

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Superglobale SERVER</title>
    </head>
    <body>
        <main>
            <dl>
                <dt>HTTP Host</dt>
                <dd><?= $_SERVER[ 'HTTP_HOST' ] ?></dd>
                <dt>HTTP Accept</dt>
                <dd><?= $_SERVER[ 'HTTP_ACCEPT' ] ?></dd>
                <dt>Server Name</dt>
                <dd><?= $_SERVER[ 'SERVER_NAME' ] ?></dd>
                <dt>Server Admin</dt>
                <dd><?= $_SERVER[ 'SERVER_ADMIN' ] ?></dd>
                <dt>Request Mode</dt>
                <dd><?= $_SERVER[ 'REQUEST_METHOD' ] ?></dd>
                <dt>Request URI</dt>
                <dd><?= $_SERVER[ 'REQUEST_URI' ] ?></dd>
                <dt>Request Time</dt>
                <dd><?= $_SERVER[ 'REQUEST_TIME' ] ?></dd>
            </dl>
            <pre>
                <?php var_dump( $_SERVER ) ;?>
            </pre>
        </main>
    </body>
</html>
