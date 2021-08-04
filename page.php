<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

    <main class="main main--page">
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