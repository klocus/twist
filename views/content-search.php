<article id="post-<?php the_ID(); ?>" <?php post_class('main__article'); ?>>
    <?php the_title('<h2><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
    <?php the_excerpt(); ?>
</article>