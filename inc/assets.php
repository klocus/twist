<?php
/**
 * Assets
 *
 * For asset enqueueing.
 */

namespace Twist\Assets;

use Twist\CacheBuster;

/**
 * Theme assets
 */
function assets() {
    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // Remove Gutenberg front-end styles
    wp_deregister_style('wp-block-library');
    wp_register_style('wp-block-library', '');

    // Remove jQuery
    wp_deregister_script('jquery');

    wp_enqueue_style('twist/css', get_template_directory_uri() . '/dist/main.css', [], CacheBuster::bust(), 'all');
    wp_enqueue_script('twist/js', get_template_directory_uri() . '/dist/main.js', [], CacheBuster::bust(), true);
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

/**
 * Login assets
 */
function login_assets() {
    wp_enqueue_style('app-login', get_stylesheet_directory_uri() . '/dist/login.css');
}

add_action('login_enqueue_scripts', __NAMESPACE__ . '\\login_assets');

/**
 * Admin assets
 */
function admin_assets() {
    wp_enqueue_style('app-admin', get_stylesheet_directory_uri() . '/dist/admin.css');
}

add_action('admin_enqueue_scripts', __NAMESPACE__ . '\\admin_assets');
