<?php
/**
 * Enqueue scripts and styles
 *
 * Updated: November 8, 2025
 * Reflects November 2025 CSS consolidation strategy and W3C validated files
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function purposeful_media_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');
    $theme_uri = get_template_directory_uri();

    // ============================================
    // GOOGLE FONTS
    // ============================================

    wp_enqueue_style(
        'purposeful-media-fonts',
        'https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );

    // ============================================
    // CORE CSS (Required for all templates)
    // ============================================

    // 1. Design Tokens - SOURCE OF TRUTH (v4.0 - October 27, 2025)
    wp_enqueue_style(
        'purposeful-media-variables',
        $theme_uri . '/assets/css/variables-v4.0-20251027.css',
        array(),
        $theme_version
    );

    // 2. Main theme stylesheet (required by WordPress - loads after variables)
    wp_enqueue_style(
        'purposeful-media-style',
        get_stylesheet_uri(),
        array('purposeful-media-variables'),
        $theme_version
    );

    // 3. Production Molecules (Consolidated - November 2025)
    wp_enqueue_style(
        'purposeful-media-molecules',
        $theme_uri . '/assets/css/production-molecules.css',
        array('purposeful-media-variables'),
        $theme_version
    );

    // 4. Production Organisms (Consolidated - November 2025)
    wp_enqueue_style(
        'purposeful-media-organisms',
        $theme_uri . '/assets/css/production-organisms.css',
        array('purposeful-media-variables'),
        $theme_version
    );

    // ============================================
    // ORGANISM-SPECIFIC CSS (Conditionally loaded)
    // ============================================

    // Heroes - Homepage, Pillar, Interior pages
    if (is_front_page() || is_page_template('template-pillar-page.php') || is_page_template('page.php')) {
        wp_enqueue_style(
            'organisms-heroes',
            $theme_uri . '/assets/css/organisms-heroes.css',
            array('purposeful-media-organisms'),
            $theme_version
        );
    }

    // Headers (all pages)
    wp_enqueue_style(
        'organisms-headers',
        $theme_uri . '/assets/css/organisms-headers.css',
        array('purposeful-media-organisms'),
        $theme_version
    );

    // Footers (all pages)
    wp_enqueue_style(
        'organisms-footers',
        $theme_uri . '/assets/css/organisms-footers.css',
        array('purposeful-media-organisms'),
        $theme_version
    );

    // Text Block - Multiple templates
    if (is_front_page() || is_page_template('template-pillar-page.php') || is_page_template('template-about-contact.php')) {
        wp_enqueue_style(
            'organisms-text-block',
            $theme_uri . '/assets/css/organisms-text-block.css',
            array('purposeful-media-organisms'),
            $theme_version
        );
    }

    // Content 2-Column Resource - Homepage, Pillar & Resource pages
    if (is_front_page() || is_page_template('template-pillar-page.php') || is_page_template('template-resource.php')) {
        wp_enqueue_style(
            'organisms-content-2column-resource',
            $theme_uri . '/assets/css/organisms-content-2column-resource.css',
            array('purposeful-media-organisms'),
            $theme_version
        );
    }

    // Content 2-Column Graphic - Homepage, Interior, About pages
    if (is_front_page() || is_page_template('page.php') || is_page_template('template-about-contact.php')) {
        wp_enqueue_style(
            'organisms-content-2column-graphic',
            $theme_uri . '/assets/css/organisms-content-2column-graphic.css',
            array('purposeful-media-organisms'),
            $theme_version
        );
    }

    // Content 2-Column Contact - About & Resource pages
    if (is_page_template('template-about-contact.php') || is_page_template('template-resource.php')) {
        wp_enqueue_style(
            'organisms-content-2column-contact-integrated',
            $theme_uri . '/assets/css/organisms-content-2column-contact-integrated.css',
            array('purposeful-media-organisms'),
            $theme_version
        );
    }

    // Section Resources - Resource page
    if (is_page_template('template-resource.php')) {
        wp_enqueue_style(
            'organisms-section-resources',
            $theme_uri . '/assets/css/organisms-section-resources.css',
            array('purposeful-media-organisms'),
            $theme_version
        );
    }

    // Section Contact Us - About page
    if (is_page_template('template-about-contact.php')) {
        wp_enqueue_style(
            'organisms-section-contactus',
            $theme_uri . '/assets/css/organisms-section-contactus.css',
            array('purposeful-media-organisms'),
            $theme_version
        );
    }

    // Section FAQ Group - Pillar & About pages
    if (is_page_template('template-pillar-page.php') || is_page_template('template-about-contact.php')) {
        wp_enqueue_style(
            'organisms-section-faq-group',
            $theme_uri . '/assets/css/organisms-section-faq-group.css',
            array('purposeful-media-organisms'),
            $theme_version
        );
    }

    // Blog Group - Homepage, Blog page & archives
    if (is_front_page() || is_page_template('template-blog.php') || is_home() || is_archive() || is_single()) {
        wp_enqueue_style(
            'blog-group-organism-v2',
            $theme_uri . '/assets/css/blog-group-organism-v2.css',
            array('purposeful-media-organisms'),
            $theme_version
        );
    }

    // ============================================
    // MOLECULE/ATOM-SPECIFIC CSS
    // ============================================

    // Blog Post Cards - Blog pages
    if (is_page_template('template-blog.php') || is_home() || is_archive()) {
        wp_enqueue_style(
            'molecules-card-blogpost',
            $theme_uri . '/assets/css/molecules-card-blogpost.css',
            array('purposeful-media-molecules'),
            $theme_version
        );
    }

    // Contact Form - About page
    if (is_page_template('template-about-contact.php')) {
        wp_enqueue_style(
            'molecules-form-contact',
            $theme_uri . '/assets/css/molecules-form-contact.css',
            array('purposeful-media-molecules'),
            $theme_version
        );
    }

    // Banner Spacer - All templates (headline banners)
    wp_enqueue_style(
        'atoms-banner-spacer',
        $theme_uri . '/assets/css/atoms-banner-spacer.css',
        array('purposeful-media-molecules'),
        $theme_version
    );

    // ============================================
    // TEMPLATE BASE CSS (Required for all templates)
    // ============================================

    // DesktopPlus containerization + background pattern
    wp_enqueue_style(
        'purposeful-media-templates-base',
        $theme_uri . '/assets/css/templates-base.css',
        array('purposeful-media-organisms'),
        $theme_version
    );

    // ============================================
    // JAVASCRIPT
    // ============================================

    // Hero Carousel - Homepage, Pillar, Interior pages
    if (is_front_page() || is_page_template('template-pillar-page.php') || is_page_template('page.php')) {
        wp_enqueue_script(
            'hero-carousel',
            $theme_uri . '/assets/js/hero-carousel.js',
            array(),
            $theme_version,
            true // Load in footer
        );
    }

    // Footer Mobile Accordion - All pages
    wp_enqueue_script(
        'footer-mobile',
        $theme_uri . '/assets/js/footer-mobile.js',
        array(),
        $theme_version,
        true // Load in footer
    );

    // Main theme JS - Navigation, return-to-top, etc. (all pages)
    // This will be created by consolidating inline scripts from templates
    wp_enqueue_script(
        'purposeful-media-main',
        $theme_uri . '/assets/js/main.js',
        array(),
        $theme_version,
        true // Load in footer
    );

    // FAQ Section - Pillar & About pages
    if (is_page_template('template-pillar-page.php') || is_page_template('template-about-contact.php')) {
        wp_enqueue_script(
            'section-faq-group',
            $theme_uri . '/assets/js/section-faq-group.js',
            array(),
            $theme_version,
            true // Load in footer
        );
    }

    // Blog Group Adapter - Blog pages
    if (is_page_template('template-blog.php') || is_home() || is_archive()) {
        wp_enqueue_script(
            'blog-group-adapter',
            $theme_uri . '/assets/js/blog-group-adapter.js',
            array(),
            $theme_version,
            true // Load in footer
        );
    }

    // Resources Section Adapter - Resource page
    if (is_page_template('template-resource.php')) {
        wp_enqueue_script(
            'resources-section-adapter',
            $theme_uri . '/assets/js/resources-section-adapter.js',
            array(),
            $theme_version,
            true // Load in footer
        );
    }

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

