<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

    <main class="main main--single">
        <section class="main__content">
            <?php 
                while (have_posts()):
                    the_post();
                    get_template_part('views/content', get_post_format());
                endwhile;
            ?>
        </section>
  </main>

<?php get_footer(); ?>