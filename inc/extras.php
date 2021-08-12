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
add_filter('body_class', function ($classes) {
    // Add page slug if it doesn't exist.
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes, true)) {
            $classes[] = basename(get_permalink());
        }
    }

    return $classes;
});

/**
 * Clean up the_excerpt()
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'twist') . '</a>';
});

/**
 * Remove Admin Bar
 */
add_filter('show_admin_bar', function () {
    return false;
});

/**
 * Remove 'text/css' from our enqueued stylesheet
 */
add_filter('style_loader_tag', function ($tag) {
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
});

/**
 * Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
 */
add_filter('post_thumbnail_html', function ($html) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}, 10);

/**
 * Custom URL on Login's logo
 */
add_filter('login_headerurl', function () {
    return 'http://my-site.test';
});

/**
 * Custom text on Login's logo
 */
add_filter('login_headertext', function () {
    return 'TWIST';
});

/**
 * Hide update notice for all users except admins
 */
add_action('admin_head', function () {
    if (!current_user_can('update_core')) {
        remove_action('admin_notices', 'update_nag', 3);
    }
}, 1);

/**
 * Enable SVG support
 */
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

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
    $breadcrumb = '<ul class="' . $class . '">';
    $breadcrumbs = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), strlen(parse_url($pageUrl, PHP_URL_PATH)));
    $breadcrumbs = array_filter(explode('/', $breadcrumbs));

    if ($home) {
        $breadcrumb .= '<li><a href="' . $pageUrl . '">' . $home . '</a></li>';
    }

    $path = '';
    foreach ($breadcrumbs as $crumb) {
        $path .= $crumb . '/';
        $page = get_page_by_path($path);

        if ($page) {
            if ($home && ($page->ID == get_option('page_on_front'))) {
                continue;
            }
            $pageTitle = $page->post_title;
            $pageUrl = get_permalink($page);
        } else {
            $pageTitle = ucwords(str_replace(['.php', '-', '_'], ['', ' ', ' '], $crumb));
            $pageUrl .= $crumb . '/';
        }

        $breadcrumb .= '<li><a href="' . $pageUrl . '">' . $pageTitle . '</a></li>';
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
        return '<ul class="' . $class . '">' . $childpages . '</ul>';
    }

    return null;
}
