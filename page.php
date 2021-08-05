<?php
/**
 * Template part for displaying page content in page.php
 *
 * * To generate specific templates for your pages you can use:
 * /views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

$context = Timber\Timber::context();

$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
Timber\Timber::render(['page-' . $timber_post->post_name . '.twig', 'page.twig'], $context);