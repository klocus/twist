<article id="post-<?php the_ID(); ?>" <?php post_class('main__article'); ?>>
    <h2><?php the_title(); ?></h2>
    <time><?php the_date(get_option('date_format')); ?></time>
    <?php the_post_thumbnail('large'); ?>
    <?php the_content(); ?>
</article>