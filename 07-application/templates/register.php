
<form method="POST" action="?template=register&controller=register">
    <h1><?= _( 'Registration' ) ?></h1>
    <div>
        <label><?= _( 'Username' ) ?>:</label>
        <input type="text" name="username">
        <?php print_error( 'username' ); ?>
    </div>
    <div>
        <label><?= _( 'E-Mail' ) ?>:</label>
        <input type="email" name="email">
        <?php print_error( 'email' ); ?>
    </div>
    <div>
        <label><?= _( 'Password' ) ?>:</label>
        <input type="password" name="password">
        <?php print_error( 'password' ); ?>
    </diV>
    <div>
        <label><?= _( 'Password Repeat' ) ?>:</label>
        <input type="password" name="password_repeat">
        <?php print_error( 'password_repeat' ); ?>
    </diV>
    <div>
        <input type="submit" value="<?= _( 'Register' ) ?>"?>
    </diV>
</form>
