<?php

namespace Application;

?>

<form method="POST" action="?controller=register">
    <h1><?= _( 'Registration' ) ?></h1>
    <div>
        <label><?= _( 'Country' ) ?></label>
        <select name="country">
            <option value="austria"><?= _( 'Austria' ) ?></option>
            <option value="luxembourg"><?= _( 'Luxembourg' ) ?></option>
            <option value="germany"><?= _( 'Germany' ) ?></option>
            <option value="swiss"><?= _( 'Swiss' ) ?></option>
        </select>
        <?php Errors::printInputErrors( 'country' ); ?>
    </div>
    <div>
        <input type="radio" name="gender" value="female">
        <label><?= _( 'Female' ) ?>:</label>
        <input type="radio" name="gender" value="male">
        <label><?= _( 'Male' ) ?>:</label>
        <?php Errors::printInputErrors( 'gender' ); ?>
    </div>
    <div>
        <label><?= _( 'Username' ) ?>:</label>
        <input type="text" name="username">
        <?php Errors::printInputErrors( 'username' ); ?>
    </div>
    <div>
        <label><?= _( 'E-Mail' ) ?>:</label>
        <input type="text" name="email">
        <?php Errors::printInputErrors( 'email' ); ?>
    </div>
    <div>
        <label><?= _( 'Password' ) ?>:</label>
        <input type="password" name="password">
        <?php Errors::printInputErrors( 'password' ); ?>
    </diV>
    <div>
        <label><?= _( 'Password Repeat' ) ?>:</label>
        <input type="password" name="password_repeat">
        <?php Errors::printInputErrors( 'password_repeat' ); ?>
    </diV>
    <div>
        <input type="checkbox" name="terms">
        <label><?= _( 'Accept Terms and Conditions' ) ?>:</label>
        <?php Errors::printInputErrors( 'terms' ); ?>
    </diV>
    <div>
        <input type="submit" value="<?= _( 'Register' ) ?>"?>
    </diV>
</form>
