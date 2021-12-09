
<section>
    <h1>Blog</h1>
    <?php
        $blog_posts = get_blog_posts();

        foreach ( $blog_posts as $post ) :
            ?>

            <article>
                <h1><?= $post[ 'title' ] ?></h1>
                <a href="#"><?= $post[ 'username' ] ?></a> | <span><?= date( 'd.m.Y - h:i', $post[ 'timestamp' ] ) ?></span>
                <p><?= $post[ 'content' ] ?></p>
            </article>

            <?php
        endforeach;
    ?>
</section>
