<?php
/**
 * Purposeful Media Design System - WordPress Enqueue Template
 * 
 * Copy this code to your WordPress theme's functions.php file
 * or create a separate inc/enqueue.php file and include it
 * 
 * Phase 1 MVW - Simple single bundle approach
 * 
 * @package Purposeful_Media
 * @version 1.0.0
 */

/**
 * Enqueue Purposeful Media Design System styles and scripts
 */
function purposeful_enqueue_assets() {
    // Theme version for cache busting
    // Update this number when you deploy new CSS/JS builds
    $theme_version = '1.0.0';
    
    // ============================================
    // STYLESHEETS
    // ============================================
    
    // Main design system CSS
    wp_enqueue_style(
        'purposeful-main',
        get_template_directory_uri() . '/assets/css/purposeful-main.min.css',
        array(), // No dependencies
        $theme_version,
        'all' // Media type
    );
    
    // ============================================
    // JAVASCRIPT
    // ============================================
    
    // Main design system JS (loaded in footer)
    wp_enqueue_script(
        'purposeful-main',
        get_template_directory_uri() . '/assets/js/purposeful-main.min.js',
        array(), // No dependencies (vanilla JS)
        $theme_version,
        true // Load in footer (important for performance)
    );
    
    // Localize script with WordPress API settings
    // Makes WordPress REST API accessible to our JavaScript
    wp_localize_script('purposeful-main', 'purposefulSettings', array(
        'restUrl'    => rest_url(),
        'nonce'      => wp_create_nonce('wp_rest'),
        'siteUrl'    => get_site_url(),
        'themePath'  => get_template_directory_uri(),
        'ajaxUrl'    => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'purposeful_enqueue_assets');


/**
 * Add preload hints for critical assets (Performance optimization)
 * 
 * This tells the browser to start downloading important files early
 * Uncomment to use in Phase 2
 */
/*
function purposeful_preload_assets() {
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/css/purposeful-main.min.css" as="style">';
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/js/purposeful-main.min.js" as="script">';
}
add_action('wp_head', 'purposeful_preload_assets', 1);
*/


/**
 * Disable WordPress emoji script (Performance optimization)
 * 
 * WordPress loads emoji scripts by default - we don't need them
 * Uncomment to use
 */
/*
function purposeful_disable_emoji() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'purposeful_disable_emoji');
*/


/**
 * Remove WordPress version from head (Security)
 * 
 * Prevents WordPress version from being visible in source code
 * Uncomment to use
 */
/*
function purposeful_remove_version() {
    return '';
}
add_filter('the_generator', 'purposeful_remove_version');
*/


/**
 * PHASE 2: Conditional loading example
 * 
 * This shows how to load different CSS/JS based on page type
 * Uncomment and modify for Phase 2 optimization
 */
/*
function purposeful_conditional_assets() {
    $theme_version = '1.0.0';
    
    // Load blog-specific styles only on blog pages
    if (is_home() || is_archive() || is_singular('post')) {
        wp_enqueue_style(
            'purposeful-blog',
            get_template_directory_uri() . '/assets/css/purposeful-blog.min.css',
            array('purposeful-main'),
            $theme_version
        );
    }
    
    // Load form styles only on pages with forms
    if (is_page_template('template-contact.php') || has_shortcode(get_post()->post_content, 'contact-form-7')) {
        wp_enqueue_style(
            'purposeful-forms',
            get_template_directory_uri() . '/assets/css/purposeful-forms.min.css',
            array('purposeful-main'),
            $theme_version
        );
    }
}
add_action('wp_enqueue_scripts', 'purposeful_conditional_assets', 11);
*/


/**
 * PHASE 2: Defer JavaScript loading (Performance optimization)
 * 
 * Adds defer attribute to script tags for faster page rendering
 * Uncomment to use in Phase 2
 */
/*
function purposeful_defer_scripts($tag, $handle, $src) {
    // Don't defer jQuery or scripts with dependencies
    if (strpos($handle, 'jquery') !== false) {
        return $tag;
    }
    
    // Add defer to Purposeful Media scripts
    if (strpos($handle, 'purposeful') !== false) {
        return str_replace(' src', ' defer src', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'purposeful_defer_scripts', 10, 3);
*/


