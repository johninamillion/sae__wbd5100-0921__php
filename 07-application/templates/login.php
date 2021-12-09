
<form method="POST" action="?template=login&controller=login">
    <?php
        switch( $_GET[ 'redirect' ] ?? NULL ) {
            case 'register':
                echo "<h1>" . _( 'Have fun!' ) . "</h1>";
                break;
            case 'logout':
                echo "<h1>" . _( 'See you later!' ) . "</h1>";
                break;
            case 'admin':
                echo "<h1>" . _( 'You must be logged in!' ) . "</h1>";
                break;
            default:
                echo "<h1>" . _( 'Login' ) . "</h1>";
                break;
        }
    ?>
    <div>
        <label><?= _( 'Username' ) ?>:</label>
        <input type="text" name="username" maxlength="16" minlength="4">
        <?php print_error( 'username' ); ?>
    </div>
    <div>
        <label><?= _( 'Password' ) ?>:</label>
        <input type="password" name="password" minlength="8">
        <?php print_error( 'password' ); ?>
    </div>
    <div>
        <input type="submit" value="<?= _( 'Login' ) ?>"?>
    </diV>
</form>
