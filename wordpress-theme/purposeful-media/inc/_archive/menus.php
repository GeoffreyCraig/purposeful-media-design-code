<?php
/**
 * Navigation menu functions
 * 
 * @package Purposeful_Media
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add custom classes to menu items
 */
function purposeful_media_nav_menu_css_class($classes, $item, $args, $depth) {
    // Add active class to current menu items
    if (in_array('current-menu-item', $classes) || in_array('current-page-ancestor', $classes)) {
        $classes[] = 'active';
    }
    
    return $classes;
}
add_filter('nav_menu_css_class', 'purposeful_media_nav_menu_css_class', 10, 4);

/**
 * Custom walker for dropdown menus (if needed in future)
 * 
 * This can be used to customize the HTML output of WordPress menus
 * to match the exact structure needed for the design system.
 */
class Purposeful_Media_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Custom walker methods can be added here if default menu structure doesn't work
}

/**
 * Helper function to get menu items as array
 */
function purposeful_media_get_menu_array($theme_location) {
    $locations = get_nav_menu_locations();
    
    if (!isset($locations[$theme_location])) {
        return array();
    }
    
    $menu = wp_get_nav_menu_object($locations[$theme_location]);
    
    if (!$menu) {
        return array();
    }
    
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    
    return $menu_items ? $menu_items : array();
}

