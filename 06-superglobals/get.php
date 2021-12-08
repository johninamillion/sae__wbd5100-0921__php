<?php

/*
 * PHP Superglobals:
 * https://www.php.net/manual/en/language.variables.superglobals.php
 * PHP $_GET:
 * https://www.php.net/manual/en/reserved.variables.get.php
 */

// <?=      kurzschreibweise für <?php echo

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Superglobale GET</title>
    </head>
    <body>
        <main>
            <h1>Hallo <?= $_GET[ 'firstname' ] ?? 'Unbekannte(r)' ?></h1>
        </main>
        <form method="get">
            <div>
                <label>Vorname:</label>
                <input type="text" name="firstname" placeholder="Vorname">
            </div>
            <div>
                <input type="submit" value="Abschicken!">
            </div>
        </form>
    </body>
</html>
