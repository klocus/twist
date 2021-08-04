<?php
/**
 * Blocks
 *
 * Auto-includes Twist's Gutenberg blocks.
 */

namespace Twist\Blocks;

use Twist\CacheBuster;

$blocks_dir = new \DirectoryIterator(__DIR__ . '/blocks');
foreach ($blocks_dir as $fileinfo) {
    if ($fileinfo->isFile() && $fileinfo->getExtension() === 'php') {
        require_once $fileinfo->getPathname();
    }
}

/**
 * Allow only predefined certain block types in Gutenberg editor
 */
add_filter('allowed_block_types_all', function ($allowed_blocks) {
    $twist_blocks = array_filter(
        array_keys(\WP_Block_Type_Registry::get_instance()->get_all_registered()),
        fn($key) => strpos($key, 'carbon-fields') === 0
    );

    return array_merge(
        $twist_blocks,
        array(
            /*
            * Common
            */
            'core/paragraph',
            'core/image',
            'core/heading',
            // 'core/subhead',
            'core/gallery',
            'core/list',
            'core/quote',
            // 'core/audio',
            'core/media-text',
            'core/file',
            'core/video',
            /*
            * Formatting
            */
            'core/table',
            // 'core/verse',
            // 'core/code',
            // 'core/freeform' // Classic,
            // 'core/html' // Custom HTML,
            // 'core/preformatted',
            'core/pullquote',
            /*
            * Layout
            */
            'core/button',
            'core/text-columns', // Columns,
            'core/columns', // Columns,
            // 'core/more',
            // 'core/nextpage' // Page break,
            'core/separator',
            'core/spacer',
            /*
            * Widgets
            */
            // 'core/shortcode',
            // 'core/archives',
            // 'core/categories',
            // 'core/latest-comments',
            // 'core/latest-posts',
            /*
            * Embeds
            */
            // 'core/embed',
            // 'core-embed/twitter',
            'core-embed/youtube',
            // 'core-embed/facebook',
            // 'core-embed/instagram',
            // 'core-embed/wordpress',
            // 'core-embed/soundcloud',
            // 'core-embed/spotify',
            // 'core-embed/flickr',
            'core-embed/vimeo',
            // 'core-embed/animoto',
            // 'core-embed/cloudup',
            // 'core-embed/collegehumor',
            // 'core-embed/dailymotion',
            // 'core-embed/funnyordie',
            // 'core-embed/hulu',
            // 'core-embed/imgur',
            // 'core-embed/issuu',
            // 'core-embed/kickstarter',
            // 'core-embed/meetup-com',
            // 'core-embed/mixcloud',
            // 'core-embed/photobucket',
            // 'core-embed/polldaddy',
            // 'core-embed/reddit',
            // 'core-embed/reverbnation',
            // 'core-embed/screencast',
            // 'core-embed/scribd',
            // 'core-embed/slideshare',
            // 'core-embed/smugmug',
            // 'core-embed/speaker',
            // 'core-embed/ted',
            // 'core-embed/tumblr',
            // 'core-embed/videopress',
            // 'core-embed/wordpress-tv',
        )
    );
});

// Remove default Gutenberg block styles
add_action('enqueue_block_editor_assets', function () {
    // Main block styles.
    wp_enqueue_style('twist-blocks', get_template_directory_uri() . '/dist/editor.css', [], CacheBuster::bust());
    // Overwrite Core block styles with empty styles.
    //wp_deregister_style('wp-block-library');
    //wp_register_style('wp-block-library', '');
    // Overwrite Core theme styles with empty styles.
    //wp_deregister_style('wp-block-library-theme');
    //p_register_style('wp-block-library-theme', '');
    // Disable extra block editor styles
    //wp_deregister_style('wp-edit-blocks');
    //wp_register_style('wp-edit-blocks', '');
    // Disable extra button editor styles
    //wp_deregister_style('buttons');
    //wp_register_style('buttons', '');
},
    10
);
