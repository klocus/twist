<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

$context         = Timber\Timber::context();
$timber_post     = Timber\Timber::get_post();
$context['post'] = $timber_post;

if (post_password_required($timber_post->ID)) {
	Timber\Timber::render('single-password.twig', $context);
} else {
	Timber\Timber::render(['single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig'], $context);
}