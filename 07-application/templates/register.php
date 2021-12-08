
<form method="POST">
    <h1><?= _( 'Registration' ) ?></h1>
    <div>
        <label><?= _( 'Username' ) ?>:</label>
        <input type="text" name="username" maxlength="16" minlength="4">
    </div>
    <div>
        <label><?= _( 'E-Mail' ) ?>:</label>
        <input type="email" name="email">
    </div>
    <div>
        <label><?= _( 'Password' ) ?>:</label>
        <input type="password" name="password" minlength="8">
    </diV>
    <div>
        <label><?= _( 'Password Repeat' ) ?>:</label>
        <input type="password" name="password_repeat" minlength="8">
    </diV>
    <div>
        <input type="submit" value="<?= _( 'Register' ) ?>"?>
    </diV>
</form>
