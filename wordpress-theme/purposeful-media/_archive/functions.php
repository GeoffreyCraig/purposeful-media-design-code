<?php
/**
 * Purposeful Media Theme Functions
 * 
 * @package Purposeful_Media
 * @version 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function purposeful_media_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    add_theme_support('custom-logo', array(
        'height'      => 93,
        'width'       => 481,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary'           => __('Primary Menu', 'purposeful-media'),
        'footer-services'   => __('Footer Services Menu', 'purposeful-media'),
        'footer-who-serve'  => __('Footer Who We Serve Menu', 'purposeful-media'),
        'footer-resources'  => __('Footer Resources Menu', 'purposeful-media'),
        'footer-company'    => __('Footer Company Menu', 'purposeful-media'),
    ));
}
add_action('after_setup_theme', 'purposeful_media_setup');

/**
 * Set content width
 */
if (!isset($content_width)) {
    $content_width = 1920;
}

/**
 * Include theme files
 */
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/menus.php';

/**
 * ACF field definitions (if ACF is active)
 */
if (function_exists('acf_add_local_field_group')) {
    // Uncomment when ready to add ACF fields
    // require get_template_directory() . '/inc/acf-fields.php';
}

/**
 * Add body classes for page templates
 */
function purposeful_media_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'homepage';
    }
    return $classes;
}
add_filter('body_class', 'purposeful_media_body_classes');

/**
 * Custom excerpt length
 */
function purposeful_media_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'purposeful_media_excerpt_length');

/**
 * Custom excerpt more
 */
function purposeful_media_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'purposeful_media_excerpt_more');

