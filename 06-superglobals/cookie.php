<?php

/*
 * PHP Superglobals:
 * https://www.php.net/manual/en/language.variables.superglobals.php
 * PHP $_COOKIE:
 * https://www.php.net/manual/en/reserved.variables.cookies.php
 */

// <?=      kurzschreibweise für <?php echo

$content = $_POST[ 'content' ] ?? $_COOKIE[ 'content' ];

setcookie( 'content', $content, time() + ( 60 * 60 * 24 ) );

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Superglobale COOKIE</title>
    </head>
    <body>
        <main>
            <h1>Achtung der Cookie, wird erst nach einem Reload dargestellt, wenn dieser Gesetzt wurde</h1>
            <pre>
                <?php var_dump( $_COOKIE ) ;?>
            </pre>
        </main>
        <form method="post">
            <div>
                <label>Cookie:</label>
                <input type="text" name="content" placeholder="Content">
            </div>
            <div>
                <input type="submit" value="Save Cookie!">
            </div>
        </form>
    </body>
</html>
