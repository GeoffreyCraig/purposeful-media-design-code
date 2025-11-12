<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- Fix icon sprite paths for WordPress -->
    <style>
        .decorative-icon-display {
            background-image: url('<?php echo get_template_directory_uri(); ?>/assets/svg/decorative-icons/purposeful-sprite-symbolic.svg') !important;
        }
        .ui-icon-display {
            background-image: url('<?php echo get_template_directory_uri(); ?>/assets/svg/ui-icons/purposeful-sprite-ui.svg') !important;
        }
        .banner-header__hamburger-icon {
            background-image: url('<?php echo get_template_directory_uri(); ?>/assets/svg/ui-icons/purposeful-sprite-ui.svg') !important;
        }
    </style>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ============================================
     HEADER SECTION - Production Component
     Updated: November 8, 2025
     Component: banner-header-main-production
     ============================================ -->
<header class="banner-header">
    <div class="banner-header__container">
        <div class="banner-header__logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="banner-header__logo-link" aria-label="<?php bloginfo('name'); ?> Home">
                <!-- Mobile Logo: 380-767px -->
                <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-mobile.svg"
                    alt="<?php bloginfo('name'); ?>"
                    class="banner-header__logo-image banner-header__logo-image--mobile"
                >
                <!-- Tablet Logo: 768-1149px -->
                <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-tablet.svg"
                    alt="<?php bloginfo('name'); ?>"
                    class="banner-header__logo-image banner-header__logo-image--tablet"
                >
                <!-- Desktop/DesktopPlus Logo: 1150px+ -->
                <img
                    src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-desktop.svg"
                    alt="<?php bloginfo('name'); ?>"
                    class="banner-header__logo-image banner-header__logo-image--desktop"
                >
            </a>
        </div>

        <!-- Menu Wrapper -->
        <div class="banner-header__menu-wrapper">
            <!-- Desktop Navigation Menu -->
            <nav class="banner-header__menu" role="navigation" aria-label="<?php esc_attr_e('Main navigation', 'purposeful-media'); ?>">
                <!-- Home -->
                <div class="banner-header__menu-item">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="banner-header__menu-link" data-page="home"><?php _e('Home', 'purposeful-media'); ?></a>
                </div>

                <!-- Solutions -->
                <div class="banner-header__menu-item">
                    <span class="banner-header__menu-link"><?php _e('Solutions', 'purposeful-media'); ?></span>
                    <div class="banner-header__dropdown">
                        <a href="<?php echo esc_url(home_url('/email-management')); ?>" class="banner-header__dropdown-link"><?php _e('Email Management', 'purposeful-media'); ?></a>
                        <a href="<?php echo esc_url(home_url('/content-creation')); ?>" class="banner-header__dropdown-link"><?php _e('Content Creation', 'purposeful-media'); ?></a>
                        <a href="<?php echo esc_url(home_url('/webinar-production')); ?>" class="banner-header__dropdown-link"><?php _e('Webinar Production', 'purposeful-media'); ?></a>
                    </div>
                </div>

                <!-- Resources -->
                <div class="banner-header__menu-item">
                    <span class="banner-header__menu-link"><?php _e('Resources', 'purposeful-media'); ?></span>
                    <div class="banner-header__dropdown">
                        <a href="<?php echo esc_url(home_url('/resource-library')); ?>" class="banner-header__dropdown-link"><?php _e('Resource Library', 'purposeful-media'); ?></a>
                        <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="banner-header__dropdown-link"><?php _e('About Us', 'purposeful-media'); ?></a>
                        <a href="<?php echo esc_url(home_url('/blog')); ?>" class="banner-header__dropdown-link"><?php _e('Blog', 'purposeful-media'); ?></a>
                    </div>
                </div>

                <!-- Contact -->
                <div class="banner-header__menu-item">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="banner-header__menu-link" data-page="contact"><?php _e('Contact', 'purposeful-media'); ?></a>
                </div>
            </nav>
        </div>

        <!-- Hamburger Menu Button (Mobile/Tablet) -->
        <button class="banner-header__hamburger" aria-label="<?php esc_attr_e('Toggle menu', 'purposeful-media'); ?>" aria-expanded="false">
            <div class="banner-header__hamburger-icon"></div>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="banner-header__mobile-menu">
        <nav class="mobile-menu" role="navigation" aria-label="<?php esc_attr_e('Mobile navigation', 'purposeful-media'); ?>">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-menu__link" data-page="home"><?php _e('Home', 'purposeful-media'); ?></a>

            <div class="mobile-menu__submenu">
                <div class="mobile-menu__link mobile-menu__trigger"><?php _e('Solutions', 'purposeful-media'); ?></div>
                <div class="mobile-menu__submenu-items">
                    <a href="<?php echo esc_url(home_url('/email-management')); ?>" class="mobile-menu__sublink"><?php _e('Email Management', 'purposeful-media'); ?></a>
                    <a href="<?php echo esc_url(home_url('/content-creation')); ?>" class="mobile-menu__sublink"><?php _e('Content Creation', 'purposeful-media'); ?></a>
                    <a href="<?php echo esc_url(home_url('/webinar-production')); ?>" class="mobile-menu__sublink"><?php _e('Webinar Production', 'purposeful-media'); ?></a>
                </div>
            </div>

            <div class="mobile-menu__submenu">
                <div class="mobile-menu__link mobile-menu__trigger"><?php _e('Resources', 'purposeful-media'); ?></div>
                <div class="mobile-menu__submenu-items">
                    <a href="<?php echo esc_url(home_url('/resource-library')); ?>" class="mobile-menu__sublink"><?php _e('Resource Library', 'purposeful-media'); ?></a>
                    <a href="<?php echo esc_url(home_url('/about-us')); ?>" class="mobile-menu__sublink"><?php _e('About Us', 'purposeful-media'); ?></a>
                    <a href="<?php echo esc_url(home_url('/blog')); ?>" class="mobile-menu__sublink"><?php _e('Blog', 'purposeful-media'); ?></a>
                </div>
            </div>

            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="mobile-menu__link" data-page="contact"><?php _e('Contact', 'purposeful-media'); ?></a>
        </nav>
    </div>
</header>

