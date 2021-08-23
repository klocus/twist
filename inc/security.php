<?php
/**
 * Security
 *
 * Features that increase WordPress security.
 */

namespace Twist\Security;

/**
 * Prevent the reading of admin logins
 * Ex: https://my-site.test/?author=1
 */
add_action('template_redirect', function() {
	$is_author_set = get_query_var('author', '');
	if ($is_author_set != '' && !is_admin()) {
		wp_redirect(home_url(), 301);
		exit;
	}
});

/**
 * Disable REST API for guests
 */
add_filter('rest_authentication_errors', function($result) {
    if (!empty($result)) {
        return $result;
    }
    if (!is_user_logged_in() && empty($_POST['_wpcf7'])) {
        return new \WP_Error('rest_not_logged_in', 'You are not currently logged in.', ['status' => 401]);
    }
    return $result;
});

/**
 * Disable XML-RPC (pingbacks and trackbacks)
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Disable RSS Feeds
 */
function disable_feed() {
    wp_die(__('No feed available, please visit the <a href="' . esc_url(home_url('/')) . '">homepage</a>.', 'twist'));
}

add_action('do_feed', __NAMESPACE__ . '\\disable_feed', 1);
add_action('do_feed_rdf', __NAMESPACE__ . '\\disable_feed', 1);
add_action('do_feed_rss', __NAMESPACE__ . '\\disable_feed', 1);
add_action('do_feed_rss2', __NAMESPACE__ . '\\disable_feed', 1);
add_action('do_feed_atom', __NAMESPACE__ . '\\disable_feed', 1);
add_action('do_feed_rss2_comments', __NAMESPACE__ . '\\disable_feed', 1);
add_action('do_feed_atom_comments', __NAMESPACE__ . '\\disable_feed', 1);

remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
