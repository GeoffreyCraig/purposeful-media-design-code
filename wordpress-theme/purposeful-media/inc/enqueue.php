<?php
/**
 * Enqueue scripts and styles
 * 
 * @package Purposeful_Media
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function purposeful_media_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');
    $theme_uri = get_template_directory_uri();
    
    // Preconnect to Google Fonts for performance
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
    
    // Google Fonts
    wp_enqueue_style(
        'purposeful-media-fonts',
        'https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );
    
    // Design Tokens (Variables)
    wp_enqueue_style(
        'purposeful-media-variables',
        $theme_uri . '/assets/css/variables.css',
        array(),
        $theme_version
    );
    
    // Main theme stylesheet (required by WordPress)
    wp_enqueue_style(
        'purposeful-media-style',
        get_stylesheet_uri(),
        array('purposeful-media-variables'),
        $theme_version
    );
    
    // Component Styles (Header, Banners, Text Blocks, etc.)
    wp_enqueue_style(
        'purposeful-media-components',
        $theme_uri . '/assets/css/components.css',
        array('purposeful-media-variables'),
        $theme_version
    );
    
    // Individual Component Styles
    wp_enqueue_style(
        'organisms-heroes',
        $theme_uri . '/assets/css/organisms-heroes.css',
        array('purposeful-media-variables'),
        $theme_version
    );
    
    wp_enqueue_style(
        'molecules-decorative-icon-display',
        $theme_uri . '/assets/css/molecules-decorative-icon-display.css',
        array('purposeful-media-variables'),
        $theme_version
    );
    
    wp_enqueue_style(
        'molecules-ui-icon-display',
        $theme_uri . '/assets/css/molecules-ui-icon-display.css',
        array('purposeful-media-variables'),
        $theme_version
    );
    
    wp_enqueue_style(
        'organisms-footers',
        $theme_uri . '/assets/css/organisms-footers.css',
        array('purposeful-media-variables'),
        $theme_version
    );
    
    // Additional component styles (add as needed)
    // wp_enqueue_style('organisms-sections', $theme_uri . '/assets/css/organisms-sections.css', array('purposeful-media-variables'), $theme_version);
    
    // JavaScript files
    
    // Hero Carousel JS
    wp_enqueue_script(
        'hero-carousel',
        $theme_uri . '/assets/js/hero-carousel.js',
        array(),
        $theme_version,
        true // Load in footer
    );
    
    // Main theme JS (for navigation, footer, return-to-top)
    wp_enqueue_script(
        'purposeful-media-main',
        $theme_uri . '/assets/js/main.js',
        array(),
        $theme_version,
        true // Load in footer
    );
    
    // Comment reply script for threaded comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'purposeful_media_enqueue_assets');

/**
 * Add preconnect links to header for performance
 */
function purposeful_media_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}
add_filter('wp_resource_hints', 'purposeful_media_resource_hints', 10, 2);

