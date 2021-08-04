<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header() ?>

<main class="main main--404">
    <h1 class="main__title">404</h1>
    <div class="main__content">
        <?php _e('Sorry, but the page you were trying to view does not exist.', 'twist'); ?>
    </div>
</main>

<?php get_footer() ?>
