<?php
/**
 * Setup
 *
 * Basic theme setup.
 */

namespace Twist\Setup;

use Carbon_Fields;
use Timber;

/**
 * Theme setup
 */
add_action('after_setup_theme', function() {
	// Composer’s autoload
	require_once(locate_template('vendor/autoload.php'));

	// Enable Carbon Fields
	// https://docs.carbonfields.net/quickstart.html
	Carbon_Fields\Carbon_Fields::boot();

	// Enable Timber
	// https://timber.github.io/docs/getting-started/setup/
	new Timber\Timber();
	Timber\Timber::$dirname = ['views'];
	Timber\Timber::$autoescape = false;

	add_filter('timber/context', function($context) {
		$context['menu'] = new Timber\Menu();
		$context['options'] = get_theme_options();
		return $context;
	});

	// Make theme available for translation
	// Community translations can be found at https://github.com/roots/sage-translations .
	load_theme_textdomain('twist', get_template_directory() . '/lang');

	// Enable plugins to manage the document title
	// http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag .
	add_theme_support('title-tag');

	// Register wp_nav_menu() menus
	// http://codex.wordpress.org/Function_Reference/register_nav_menus .
	register_nav_menus(
		[
			'primary_navigation' => __('Primary Navigation', 'twist'),
		]
	);

	// Enable post thumbnails
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size .
	add_theme_support('post-thumbnails');

	// Enable HTML5 markup support
	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5 .
	add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

	// Enable responsive embeds
	add_theme_support('responsive-embeds');
});

/**
 * Get values from Carbon Fields – Theme Options
 */
function get_theme_options(): array {
    global $wpdb;
    $query = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options WHERE option_name LIKE '%_crb%'");
    $options = [];
    foreach ($query as $value) {
        $options[str_replace('_crb_', '', $value->option_name)] = $value->option_value;
    }
    return $options;
}
