<?php
/**
 * Custom Fields
 *
 * Carbon (custom) fields for the current theme.
 * Docs: https://docs.carbonfields.net/
 */

namespace Twist\Fields;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Load Carbon Fields
 */
function load() {
    require_once(locate_template('vendor/autoload.php'));
    \Carbon_Fields\Carbon_Fields::boot();
}
add_action('after_setup_theme',  __NAMESPACE__ . '\\load');
