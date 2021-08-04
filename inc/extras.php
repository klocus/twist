<?php
/**
 * Extras
 *
 * Extra functionality for the current theme.
 */

namespace Twist\Extras;

/**
 * Body class
 *
 * Add body classes.
 *
 * @param mixed $classes Class names.
 */
function body_class($classes) {
	// Add page slug if it doesn't exist.
	if (is_single() || is_page() && ! is_front_page()) {
		if (!in_array( basename(get_permalink()), $classes, true)) {
			$classes[] = basename(get_permalink());
		}
	}

	return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
	return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'twist') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Remove Admin Bar
 */
function remove_admin_bar() {
    return false;
}
add_filter('show_admin_bar', __NAMESPACE__ . '\\remove_admin_bar');

/**
 * Remove 'text/css' from our enqueued stylesheet
 */
function css_style_type_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}
add_filter('style_loader_tag', __NAMESPACE__ . '\\css_style_type_remove');

/**
 * Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
 */
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
add_filter('post_thumbnail_html', __NAMESPACE__ . '\\remove_thumbnail_dimensions', 10);

/**
 * Custom URL on Login's logo
 */
function custom_login_logo_url() {
    return 'http://my-site.test';
}
add_filter('login_headerurl', __NAMESPACE__ . '\\custom_login_logo_url');

/**
 * Custom text on Login's logo
 */
function custom_login_logo_url_text() {
    return 'TWIST';
}
add_filter('login_headertext', __NAMESPACE__ . '\\custom_login_logo_url_text');


/**
 * Hide update notice for all users except admins
 */
function hide_update_notice() {
    if (!current_user_can('update_core')) {
        remove_action('admin_notices', 'update_nag', 3);
    }
}
add_action('admin_head', __NAMESPACE__ . '\\hide_update_notice', 1);

/**
 * Show Breadcrumbs
 * 
 * @param string|bool $home
 * @param string $class
 * @return string
 * 
 * Using: echo Twist\Extras\breadcrumbs();
 */
function breadcrumbs($home = 'Home', $class = 'items') {
    $pageUrl = get_site_url() . '/';
    $breadcrumb  = '<ul class="'. $class .'">';
    $breadcrumbs = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), strlen(parse_url($pageUrl, PHP_URL_PATH)));
    $breadcrumbs = array_filter(explode('/', $breadcrumbs));
      
    if ($home) {
        $breadcrumb .= '<li><a href="' . $pageUrl . '">' . $home . '</a></li>';
    }

    $path = '';
    foreach ($breadcrumbs as $crumb) {
        $path .=  $crumb . '/';
        $page = get_page_by_path($path);

        if ($page) {
            if ($home && ($page->ID == get_option('page_on_front'))) {
                continue;
            }
            $pageTitle = $page->post_title;
            $pageUrl   = get_permalink($page);
        } else {
            $pageTitle = ucwords(str_replace(['.php','-','_'], ['',' ',' '], $crumb));
            $pageUrl  .= $crumb . '/';
        }
    
        $breadcrumb .= '<li><a href="'. $pageUrl .'">' . $pageTitle . '</a></li>';
    }

    $breadcrumb .= '</ul>';
    return $breadcrumb;
}

/**
 * List of child pages
 * 
 * @param string $class
 * @return string
 * 
 * Using: echo Twist\Extras\child_pages();
 */
function child_pages($class = null) { 
    global $post; 
     
    $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0');

    if ($childpages) {
        return '<ul class="'. $class .'">' . $childpages . '</ul>';
    }
     
    return null;
}
