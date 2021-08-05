<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

$views = ['search.twig', 'archive.twig', 'index.twig'];

$context          = Timber\Timber::context();
$context['title'] = 'Search results for ' . get_search_query();
$context['posts'] = new Timber\PostQuery();

Timber\Timber::render($views, $context);
