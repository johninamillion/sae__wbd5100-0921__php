
<form method="POST">
    <h1><?= _( 'Login' ) ?></h1>
    <div>
        <label><?= _( 'Username' ) ?>:</label>
        <input type="text" name="username" maxlength="16" minlength="4">
    </div>
    <div>
        <label><?= _( 'Password' ) ?>:</label>
        <input type="password" name="password" minlength="8">
    </div>
    <div>
        <input type="submit" value="<?= _( 'Login' ) ?>"?>
    </diV>
</form>
