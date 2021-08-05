<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

$views = ['archive.twig', 'index.twig'];

$context = Timber\Timber::context();

$context['title'] = 'Archive';
if ( is_day() ) {
	$context['title'] = 'Archive: ' . get_the_date('D M Y');
} elseif ( is_month() ) {
	$context['title'] = 'Archive: ' . get_the_date('M Y');
} elseif ( is_year() ) {
	$context['title'] = 'Archive: ' . get_the_date('Y');
} elseif ( is_tag() ) {
	$context['title'] = single_tag_title('', false);
} elseif ( is_category() ) {
	$context['title'] = single_cat_title('', false);
	array_unshift($views, 'archive-' . get_query_var('cat') . '.twig');
} elseif ( is_post_type_archive() ) {
	$context['title'] = post_type_archive_title('', false);
	array_unshift($views, 'archive-' . get_post_type() . '.twig');
}

$context['posts'] = new Timber\PostQuery();

Timber\Timber::render($views, $context);