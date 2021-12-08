<?php

/*
 * PHP Superglobals:
 * https://www.php.net/manual/en/language.variables.superglobals.php
 * PHP $_POST:
 * https://www.php.net/manual/en/reserved.variables.post.php
 */

// <?=      kurzschreibweise für <?php echo

var_dump( $_POST );

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Superglobale POST</title>
    </head>
    <body>
        <main>
            <h1>Hallo <?= $_POST[ 'firstname' ] ?? 'Unbekannte(r)' ?></h1>
        </main>
        <form method="post">
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
