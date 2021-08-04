<?php
/**
 * TWIST includes and constants
 *
 * The $twist_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed.
 *
 * Please note that missing files will produce a fatal error.
 *
 * Also add any constants here.
 */

// Includes.
$twist_includes = [
    'inc/cachebuster.php',      // Cache busting.
    'inc/extras.php',           // Custom functions.
    'inc/setup.php',            // Theme setup.
    'inc/security.php',         // Security.
    'inc/assets.php',           // Assets inclusion.
    'inc/blocks.php',           // Gutenberg blocks.
    'inc/fields.php',           // Custom fields
];

foreach ($twist_includes as $file) {
    $filepath = locate_template($file);
    if (!$filepath) {
        trigger_error(sprintf(wp_kses_data(__('Error locating %s for inclusion', 'twist')), $file), E_USER_ERROR);
    }
    include_once $filepath;
}
unset($file, $filepath);

/**
 * Load Carbon Fields
 */
function load() {
    require_once(locate_template('vendor/autoload.php'));
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('after_setup_theme', 'load');
