<?php
/**
 * The template is used for posts index at the root or static front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

    <main class="main main--home">
        <section class="main__content">
            <?php 
                while (have_posts()):
                    the_post();
                    get_template_part('views/content', 'page');
                endwhile;
            ?>
        </section>
  </main>

<?php get_footer(); ?>