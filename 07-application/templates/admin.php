
<form method="POST" action="?template=admin&controller=admin">
    <h1>Blog Post erstellen</h1>
    <div>
        <label><?= _( 'Titel' ) ?></label>
        <input type="text" name="title">
        <?php print_error( 'title' ); ?>
    </div>
    <div>
        <label><?= _( 'Content' ) ?></label>
        <textarea name="content"></textarea>
        <?php print_error( 'content' ); ?>
    </div>
    <div>
        <input type="submit" value="<?= _( 'Create Post!' ) ?>">
    </div>
</form>
