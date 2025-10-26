<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    
    <!-- Fix icon sprite paths for WordPress -->
    <style>
        .icon-display {
            background-image: url('<?php echo get_template_directory_uri(); ?>/assets/svg/decorative-icons/purposeful-sprite-symbolic.svg') !important;
        }
        .ui-icon-display {
            background-image: url('<?php echo get_template_directory_uri(); ?>/assets/svg/ui-icons/purposeful-sprite-ui.svg') !important;
        }
    </style>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ============================================
     HEADER SECTION
     ============================================ -->
<header class="header-main">
    <div class="banner-header-main">
        <div class="banner-header-main__container">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="banner-header-main__logo-link" aria-label="<?php bloginfo('name'); ?> Home">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-mobile.svg" 
                    alt="<?php bloginfo('name'); ?>" 
                    class="banner-header-main__logo banner-header-main__logo--mobile"
                >
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-tablet.svg" 
                    alt="<?php bloginfo('name'); ?>" 
                    class="banner-header-main__logo banner-header-main__logo--tablet"
                >
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-desktop.svg" 
                    alt="<?php bloginfo('name'); ?>" 
                    class="banner-header-main__logo banner-header-main__logo--desktop"
                >
            </a>
            
            <!-- Menu Container -->
            <div class="banner-header-main__menu-container">
                <nav class="main-menu" role="navigation" aria-label="<?php esc_attr_e('Main navigation', 'purposeful-media'); ?>">
                    
                    <!-- Desktop Navigation -->
                    <div class="desktop-nav">
                        <?php
                        // For now, using static menu structure
                        // TODO: Convert to wp_nav_menu() with custom walker
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="menu-item <?php echo is_front_page() ? 'active' : ''; ?>" data-page="home"><?php _e('Home', 'purposeful-media'); ?></a>
                        
                        <div class="menu-item-dropdown" data-page="solutions">
                            <span class="menu-text"><?php _e('Solutions', 'purposeful-media'); ?></span>
                            <div class="dropdown-container">
                                <div class="dropdown-menu">
                                    <a href="<?php echo esc_url(home_url('/email-management')); ?>" class="dropdown-item"><?php _e('Email Management', 'purposeful-media'); ?></a>
                                    <a href="<?php echo esc_url(home_url('/content-creation')); ?>" class="dropdown-item"><?php _e('Content Creation', 'purposeful-media'); ?></a>
                                    <a href="<?php echo esc_url(home_url('/webinar-production')); ?>" class="dropdown-item"><?php _e('Webinar Production', 'purposeful-media'); ?></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="menu-item-dropdown" data-page="resources">
                            <span class="menu-text"><?php _e('Resources', 'purposeful-media'); ?></span>
                            <div class="dropdown-container">
                                <div class="dropdown-menu">
                                    <a href="<?php echo esc_url(home_url('/resource-library')); ?>" class="dropdown-item"><?php _e('Resource Library', 'purposeful-media'); ?></a>
                                    <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="dropdown-item"><?php _e('About Us', 'purposeful-media'); ?></a>
                                    <a href="<?php echo esc_url(home_url('/blog')); ?>" class="dropdown-item"><?php _e('Blog', 'purposeful-media'); ?></a>
                                </div>
                            </div>
                        </div>
                        
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="menu-item" data-page="contact"><?php _e('Contact', 'purposeful-media'); ?></a>
                    </div>
                    
                    <!-- Mobile/Tablet Navigation -->
                    <div class="mobile-nav">
                        <button class="hamburger-button" aria-label="<?php esc_attr_e('Toggle menu', 'purposeful-media'); ?>" aria-expanded="false">
                            <svg class="hamburger-icon" width="45" height="54" viewBox="0 0 45 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect y="3" width="45" height="8" rx="4" fill="white"/>
                                <rect y="23" width="45" height="8" rx="4" fill="white"/>
                                <rect y="43" width="45" height="8" rx="4" fill="white"/>
                            </svg>
                            <svg class="close-icon" width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="5" y="36" width="45" height="8" rx="4" transform="rotate(-45 5 36)" fill="white"/>
                                <rect x="10.66" y="4.31" width="45" height="8" rx="4" transform="rotate(45 10.66 4.31)" fill="white"/>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Mobile Accordion Menu -->
                    <div class="mobile-accordion">
                        <div class="accordion-section">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="accordion-header no-dropdown <?php echo is_front_page() ? 'active' : ''; ?>" data-page="home"><?php _e('Home', 'purposeful-media'); ?></a>
                        </div>
                        
                        <div class="accordion-section">
                            <div class="accordion-header" data-accordion="solutions"><?php _e('Solutions', 'purposeful-media'); ?></div>
                            <div class="accordion-content" id="solutions-content">
                                <a href="<?php echo esc_url(home_url('/email-management')); ?>" class="accordion-item"><?php _e('Email Management', 'purposeful-media'); ?></a>
                                <a href="<?php echo esc_url(home_url('/content-creation')); ?>" class="accordion-item"><?php _e('Content Creation', 'purposeful-media'); ?></a>
                                <a href="<?php echo esc_url(home_url('/webinar-production')); ?>" class="accordion-item"><?php _e('Webinar Production', 'purposeful-media'); ?></a>
                            </div>
                        </div>
                        
                        <div class="accordion-section">
                            <div class="accordion-header" data-accordion="resources"><?php _e('Resources', 'purposeful-media'); ?></div>
                            <div class="accordion-content" id="resources-content">
                                <a href="<?php echo esc_url(home_url('/resource-library')); ?>" class="accordion-item"><?php _e('Resource Library', 'purposeful-media'); ?></a>
                                <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="accordion-item"><?php _e('About Us', 'purposeful-media'); ?></a>
                                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="accordion-item"><?php _e('Blog', 'purposeful-media'); ?></a>
                            </div>
                        </div>
                        
                        <div class="accordion-section">
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="accordion-header no-dropdown" data-page="contact"><?php _e('Contact', 'purposeful-media'); ?></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

