<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

    <main class="main main--search">
        <section class="main__content">
            <h1><?php printf(esc_html__('Search Results for: %s', 'twist'), '<span>' . get_search_query() . '</span>'); ?></h1>
            <?php 
            if (have_posts()):
                while (have_posts()): 
                    the_post();
                    get_template_part('views/content', 'search');
                endwhile; 
            else:
                get_template_part('views/content', 'none');
            endif;
            ?>
        </section>
  </main>

<?php get_footer(); ?>
