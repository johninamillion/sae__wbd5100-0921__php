<?php

/*
 * PHP Superglobals:
 * https://www.php.net/manual/en/language.variables.superglobals.php
 * PHP $_SESSION:
 * https://www.php.net/manual/en/reserved.variables.session.php
 */

// <?=      kurzschreibweise für <?php echo

session_start();                // startet eine Session

//$_SESSION[ 'login' ] = TRUE;  // ein Wert in der Session speichern

// session_destroy();           // zerstört eine Session
// session_unset();             // Leert eine Session
// session_reset();             // zerstört eine Session und startet eine neue Session

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Superglobale SESSION</title>
    </head>
    <body>
        <main>
            <pre>
                <?php var_dump( $_SESSION ) ;?>
            </pre>
        </main>
    </body>
</html>
