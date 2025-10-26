<?php
/**
 * Template Name: Interior Page Template
 * Description: A complete interior page template for Purposeful Media Promotions
 * Version: 1.0
 * Author: Purposeful Media Design System
 */

get_header(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <!-- Import Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Import Design System Styles -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/variables-v2.0-20250915.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/templates/interior-page.css">
    
    <!-- Import Component Styles -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/molecules-icon-display.css">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class('interior-page'); ?>>

    <!-- Header Section -->
    <header class="header-main">
        <!-- Banner Header Component -->
        <div class="banner-header-main">
            <div class="banner-header-main__container">
                <!-- Logo -->
                <a href="<?php echo home_url(); ?>" class="banner-header-main__logo-link" aria-label="Purposeful Media Promotions Home">
                    <!-- Mobile Logo -->
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-mobile.svg" 
                        alt="Purposeful Media Promotions" 
                        class="banner-header-main__logo banner-header-main__logo--mobile"
                    >
                    <!-- Tablet Logo -->
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-tablet.svg" 
                        alt="Purposeful Media Promotions" 
                        class="banner-header-main__logo banner-header-main__logo--tablet"
                    >
                    <!-- Desktop/DesktopPlus Logo -->
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-desktop.svg" 
                        alt="Purposeful Media Promotions" 
                        class="banner-header-main__logo banner-header-main__logo--desktop"
                    >
                </a>
                
                <!-- Menu Container -->
                <div class="banner-header-main__menu-container">
                    <!-- WordPress Navigation -->
                    <nav class="main-menu" role="navigation" aria-label="Main navigation">
                        
                        <!-- Desktop Navigation -->
                        <div class="desktop-nav">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'desktop-nav-menu',
                                'fallback_cb' => false,
                                'walker' => new Purposeful_Desktop_Nav_Walker()
                            ));
                            ?>
                        </div>
                        
                        <!-- Mobile/Tablet Navigation -->
                        <div class="mobile-nav">
                            <button class="hamburger-button" aria-label="Toggle menu" aria-expanded="false">
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
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'mobile-accordion-menu',
                                'fallback_cb' => false,
                                'walker' => new Purposeful_Mobile_Nav_Walker()
                            ));
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Banner Section -->
    <section class="hero-banner">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo get_the_title(); ?></h1>
            <div class="hero-accent-bar"></div>
        </div>
    </section>

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="content-container">
            <!-- Main Heading -->
            <h1 class="main-heading"><?php echo get_the_title(); ?></h1>
            
            <!-- Content Sections -->
            <div class="content-sections">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
            </div>

            <!-- Horizontal Separator -->
            <div class="content-separator"></div>

            <!-- Your Next Step Section -->
            <section class="next-step-section">
                <div class="card-banner-spacer" data-component="card-banner-spacer" data-variant="headline-subtitle">
                    <div class="banner-spacer-content">
                        <div class="banner-spacer-header">
                            <div class="banner-headline-wrapper">
                                <!-- Contact icon using icon-display molecule -->
                                <div class="icon-display icon-display--medium" data-icon="contact" data-color="white"></div>
                                
                                <!-- Headline -->
                                <h2 class="banner-headline">YOUR NEXT STEP</h2>
                            </div>
                            
                            <!-- Subtitle -->
                            <p class="banner-subtitle">Book a free consultation or ask us any question.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Content Cards Section -->
            <section class="content-cards">
                <div class="cards-container">
                    <!-- Card 1 -->
                    <div class="content-card">
                        <h3 class="card-heading">LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT, SED DO EIUSMOD TEMPOR</h3>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                        </p>
                        <p class="card-text">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                        </p>
                        <a href="#" class="btn btn-accent">DOWNLOAD</a>
                    </div>

                    <!-- Card 2 -->
                    <div class="content-card">
                        <h3 class="card-heading">LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT, SED DO EIUSMOD TEMPOR</h3>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                        </p>
                        <p class="card-text">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
                        </p>
                        <a href="#" class="btn btn-brand">BOOK YOUR CALL</a>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="footer-responsive">
        <!-- DESKTOP/TABLET FOOTER (768px and up) -->
        <div class="footer-main" data-breakpoint="responsive">
            <div class="footer-container">
                <!-- Logo Section -->
                <div class="footer-logo-section">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-mobile.svg" 
                         alt="Purposeful Media Promotions" 
                         class="footer-logo">
                </div>

                <!-- Footer Content Columns -->
                <div class="footer-content">
                    <!-- Column 1: Services -->
                    <div class="footer-column" data-column="services">
                        <div class="footer-menu-section">
                            <h3 class="footer-menu-title">Services</h3>
                            <nav class="footer-menu-nav">
                                <ul class="footer-menu-list">
                                    <li><a href="/services/email-marketing" class="footer-menu-link">Email Marketing</a></li>
                                    <li><a href="/services/webinar-production" class="footer-menu-link">Webinar Production</a></li>
                                    <li><a href="/services/inbound-marketing" class="footer-menu-link">Inbound Marketing</a></li>
                                    <li><span class="footer-menu-link disabled">Succession Planning [Coming Soon]</span></li>
                                    <li><span class="footer-menu-link disabled">Business Unit Growth [Coming Soon]</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Column 2: Who We Serve -->
                    <div class="footer-column" data-column="who-we-serve">
                        <div class="footer-menu-section">
                            <h3 class="footer-menu-title">Who We Serve</h3>
                            <nav class="footer-menu-nav">
                                <ul class="footer-menu-list">
                                    <li><span class="footer-menu-link disabled">Revenue Growth [Coming Soon]</span></li>
                                    <li><span class="footer-menu-link disabled">Preparing for Exit [Coming Soon]</span></li>
                                    <li><span class="footer-menu-link disabled">Plan a Webinar [Coming Soon]</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Column 3: Resources -->
                    <div class="footer-column" data-column="resources">
                        <div class="footer-menu-section">
                            <h3 class="footer-menu-title">Resources</h3>
                            <nav class="footer-menu-nav">
                                <ul class="footer-menu-list">
                                    <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="footer-menu-link">Read Our Blog</a></li>
                                    <li><a href="/resources/thought-leadership" class="footer-menu-link">Thought Leadership</a></li>
                                    <li><span class="footer-menu-link disabled">Pricing [Coming Soon]</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Column 4: Company & Newsletter -->
                    <div class="footer-column" data-column="company-newsletter">
                        <!-- Company Menu -->
                        <div class="footer-menu-section">
                            <h3 class="footer-menu-title">Company</h3>
                            <nav class="footer-menu-nav">
                                <ul class="footer-menu-list">
                                    <li><a href="/about" class="footer-menu-link">About Us</a></li>
                                    <li><a href="/contact" class="footer-menu-link">Contact Us</a></li>
                                    <li><a href="/privacy" class="footer-menu-link">Privacy Policy</a></li>
                                    <li><span class="footer-menu-link disabled">Affiliates [Coming Soon]</span></li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Newsletter Form -->
                        <div class="footer-newsletter">
                          <form class="form-newsletter" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" method="post">
                                <h4 class="form-newsletter__title">Stay Connected</h4>
                                <p class="form-newsletter__description">
                                    Share your email address and get our B2B marketing strategies and digital transformation inspirations in your inbox.
                                </p>
                                <div class="form-newsletter__field">
                                    <label for="footer-email" class="form-newsletter__label">Email Address*</label>
                                    <input type="email" 
                                           id="footer-email" 
                                           name="email"
                                           class="form-newsletter__input" 
                                           placeholder="Enter your email"
                                           required>
                                    <span class="form-newsletter__helper">*This field is required.</span>
                                </div>
                                <div class="form-newsletter__submit-wrapper">
                                    <button type="submit" class="form-newsletter__submit">SUBSCRIBE</button>
                                </div>
                                <input type="hidden" name="action" value="newsletter_signup">
                                <?php wp_nonce_field('newsletter_signup', 'newsletter_nonce'); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Attribution Sub-footer -->
            <div class="footer-attribution">
                <div class="footer-attribution-content">
                    <span class="footer-copyright">© All rights reserved <?php echo date('Y'); ?></span>
                    <span class="footer-divider">|</span>
                    <span class="footer-company"><?php bloginfo('name'); ?></span>
                    <span class="footer-divider">|</span>
                    <a href="/policy" class="footer-policy-link">Policy Statement</a>
                </div>
            </div>
        </div>

        <!-- MOBILE FOOTER (767px and below) -->
        <div class="footer-mobile">
            <div class="footer-mobile__top">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/logos/purposeful-media-logo-white-mobile.svg" 
                     alt="Purposeful Media Promotions" 
                     class="footer-mobile__logo">
            </div>
            
            <nav class="footer-mobile__nav">
                <!-- Services -->
                <div class="footer-mobile__nav-item" data-dropdown="services">
                    <span class="footer-mobile__nav-text">Services</span>
                    <span class="footer-mobile__nav-arrow">&gt;</span>
                </div>
                
                <!-- Services Dropdown -->
                <div class="dropdown-mobile" id="dropdown-services">
                    <div class="dropdown-mobile__item">
                        <a href="/services/email-marketing" class="dropdown-mobile__link">Email Marketing</a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <a href="/services/webinar-production" class="dropdown-mobile__link">Webinar Production</a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <a href="/services/inbound-marketing" class="dropdown-mobile__link">Inbound Marketing</a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled">Succession Planning</span>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled">Business Unit Growth</span>
                    </div>
                </div>
                
                <!-- Who We Serve -->
                <div class="footer-mobile__nav-item" data-dropdown="who-we-serve">
                    <span class="footer-mobile__nav-text">Who We Serve</span>
                    <span class="footer-mobile__nav-arrow">&gt;</span>
                </div>
                
                <!-- Who We Serve Dropdown -->
                <div class="dropdown-mobile" id="dropdown-who-we-serve">	
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled">Revenue Growth</span>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled">Preparing for Exit</span>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled">Plan a Webinar</span>
                    </div>
                </div>
                
                <!-- Resources -->
                <div class="footer-mobile__nav-item" data-dropdown="resources">
                    <span class="footer-mobile__nav-text">Resources</span>
                    <span class="footer-mobile__nav-arrow">&gt;</span>
                </div>
                
                <!-- Resources Dropdown -->
                <div class="dropdown-mobile" id="dropdown-resources">
                    <div class="dropdown-mobile__item">
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="dropdown-mobile__link">Read Our Blog</a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <a href="/resources/thought-leadership" class="dropdown-mobile__link">Thought Leadership</a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled">Pricing</span>
                    </div>
                </div>
                
                <!-- Company -->
                <div class="footer-mobile__nav-item" data-dropdown="company">
                    <span class="footer-mobile__nav-text">Company</span>
                    <span class="footer-mobile__nav-arrow">&gt;</span>
                </div>
                
                <!-- Company Dropdown -->
                <div class="dropdown-mobile" id="dropdown-company">
                    <div class="dropdown-mobile__item">
                        <a href="/about" class="dropdown-mobile__link">About Us</a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <a href="/contact" class="dropdown-mobile__link">Contact Us</a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <a href="/privacy" class="dropdown-mobile__link">Privacy Policy</a>
                    </div>
                    <div class="dropdown-mobile__item">
                        <span class="dropdown-mobile__link dropdown-mobile__link--disabled">Affiliates [Coming Soon]</span>
                    </div>
                </div>
            </nav>
            
            <!-- Newsletter Form for Mobile -->
            <div class="footer-mobile__newsletter">
                <form class="form-newsletter form-newsletter--size-mobile" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" method="post">
                    <h4 class="form-newsletter__title">Stay Connected</h4>
                    <p class="form-newsletter__description">
                        Get B2B marketing strategies and digital transformation inspiration in your inbox.
                    </p>
                    <div class="form-newsletter__field">
                        <label for="footer-mobile-email" class="form-newsletter__label">Email Address*</label>
                        <input type="email" 
                               id="footer-mobile-email" 
                               name="email"
                               class="form-newsletter__input" 
                               placeholder="Enter your email"
                               required>
                        <span class="form-newsletter__helper">*This field is required.</span>
                    </div>
                    <div class="form-newsletter__submit-wrapper">
                        <button type="submit" class="form-newsletter__submit">SUBSCRIBE</button>
                    </div>
                    <input type="hidden" name="action" value="newsletter_signup">
                    <?php wp_nonce_field('newsletter_signup', 'newsletter_nonce'); ?>
                </form>
            </div>
            
            <div class="footer-mobile__attribution">
                <div class="footer-mobile__attribution-content">
                    <div class="footer-mobile__company"><?php bloginfo('name'); ?></div>
                    <a href="/policy" class="footer-mobile__policy">Policy Statement</a>
                    <div class="footer-mobile__copyright">© All rights reserved <?php echo date('Y'); ?></div>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="<?php echo get_template_directory_uri(); ?>/scripts/main.js"></script>
    
    <!-- Component JavaScript -->
    <script>
        // Header Menu JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            
            // Desktop dropdown functionality
            const menuDropdowns = document.querySelectorAll('.desktop-nav .menu-item-dropdown');
            
            menuDropdowns.forEach(item => {
                const menuText = item.querySelector('.menu-text');
                const dropdown = item.querySelector('.dropdown-container');
                
                if (menuText && dropdown) {
                    
                    menuText.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        // Close all other dropdowns first
                        document.querySelectorAll('.dropdown-container').forEach(otherDropdown => {
                            if (otherDropdown !== dropdown) {
                                otherDropdown.classList.remove('open');
                            }
                        });
                        
                        // Toggle current dropdown
                        dropdown.classList.toggle('open');
                    });
                }
            });
            
            // Click outside to close all dropdowns
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.menu-item-dropdown')) {
                    document.querySelectorAll('.dropdown-container').forEach(dropdown => {
                        dropdown.classList.remove('open');
                    });
                }
            });
            
            // Prevent dropdown from closing when clicking inside the dropdown menu
            document.querySelectorAll('.dropdown-container').forEach(dropdown => {
                dropdown.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });
            
            // Mobile menu toggle
            const hamburgerButton = document.querySelector('.hamburger-button');
            const mobileAccordion = document.querySelector('.mobile-accordion');
            const mainMenu = document.querySelector('.main-menu');
            
            if (hamburgerButton) {
                hamburgerButton.addEventListener('click', function() {
                    const isOpen = mobileAccordion.classList.contains('active');
                    
                    if (isOpen) {
                        mobileAccordion.classList.remove('active');
                        mainMenu.classList.remove('menu-open');
                        hamburgerButton.setAttribute('aria-expanded', 'false');
                    } else {
                        mobileAccordion.classList.add('active');
                        mainMenu.classList.add('menu-open');
                        hamburgerButton.setAttribute('aria-expanded', 'true');
                    }
                });
            }
            
            // Accordion functionality for mobile
            document.querySelectorAll('.accordion-header[data-accordion]').forEach(header => {
                header.addEventListener('click', function() {
                    const accordionId = this.dataset.accordion;
                    const content = document.getElementById(accordionId + '-content');
                    
                    if (content) {
                        // Close all other accordions
                        document.querySelectorAll('.accordion-content').forEach(otherContent => {
                            if (otherContent !== content) {
                                otherContent.classList.remove('active');
                            }
                        });
                        
                        // Toggle current accordion
                        content.classList.toggle('active');
                    }
                });
            });
            
            // Set active states based on current page
            const currentPath = window.location.pathname;
            
            // Desktop menu items
            document.querySelectorAll('.menu-item[data-page], .menu-item-dropdown[data-page]').forEach(item => {
                if (currentPath === '/' && item.dataset.page === 'home') {
                    item.classList.add('active');
                } else if (currentPath.includes(item.dataset.page)) {
                    item.classList.add('active');
                }
            });
            
            // Dropdown items
            document.querySelectorAll('.dropdown-item').forEach(item => {
                if (currentPath === item.getAttribute('href')) {
                    item.classList.add('active');
                    // Also mark parent as active
                    const parent = item.closest('.menu-item-dropdown');
                    if (parent) {
                        parent.classList.add('active');
                    }
                }
            });
            
            // Mobile accordion items and check for active pages
            let hasActivePage = false;
            document.querySelectorAll('.accordion-header[data-page], .accordion-item').forEach(item => {
                const href = item.getAttribute('href');
                if (href && currentPath === href) {
                    item.classList.add('active');
                    hasActivePage = true;
                }
            });
            
            // Add class to accordion if it contains an active page
            if (hasActivePage && mobileAccordion) {
                mobileAccordion.classList.add('has-active-page');
            }
            
            // Handle window resize
            let resizeTimeout;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(function() {
                    // Close mobile menu if switching to desktop
                    if (window.innerWidth >= 1150) {
                        if (mobileAccordion) {
                            mobileAccordion.classList.remove('active');
                        }
                        if (mainMenu) {
                            mainMenu.classList.remove('menu-open');
                        }
                        if (hamburgerButton) {
                            hamburgerButton.setAttribute('aria-expanded', 'false');
                        }
                    }
                }, 250);
            });
        });

        // Footer Mobile Navigation JavaScript
        class MobileFooterNav {
            constructor() {
                this.navItems = document.querySelectorAll('.footer-mobile__nav-item[data-dropdown]');
                this.activeDropdown = null;
                
                this.init();
            }
            
            init() {
                this.navItems.forEach(item => {
                    item.addEventListener('click', (e) => this.toggleDropdown(e));
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', (e) => {
                    if (!e.target.closest('.footer-mobile__nav')) {
                        this.closeAllDropdowns();
                    }
                });
            }
            
            toggleDropdown(event) {
                event.stopPropagation();
                const item = event.currentTarget;
                const dropdownId = item.getAttribute('data-dropdown');
                const dropdown = document.getElementById(`dropdown-${dropdownId}`);
                
                if (!dropdown) return;
                
                if (dropdown.classList.contains('active')) {
                    this.closeDropdown(dropdown);
                    item.classList.remove('active');
                } else {
                    this.closeAllDropdowns();
                    this.openDropdown(dropdown);
                    item.classList.add('active');
                    this.activeDropdown = dropdown;
                }
            }
            
            openDropdown(dropdown) {
                dropdown.classList.add('active');
            }
            
            closeDropdown(dropdown) {
                dropdown.classList.remove('active');
            }
            
            closeAllDropdowns() {
                document.querySelectorAll('.dropdown-mobile').forEach(dropdown => {
                    this.closeDropdown(dropdown);
                });
                document.querySelectorAll('.footer-mobile__nav-item').forEach(item => {
                    item.classList.remove('active');
                });
                this.activeDropdown = null;
            }
        }

        // Initialize footer navigation when DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            new MobileFooterNav();
        });

        // Icon Display JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const icons = document.querySelectorAll('.icon-display');
            icons.forEach(icon => {
                const iconName = icon.getAttribute('data-icon');
                const color = icon.getAttribute('data-color');
                if (iconName && color) {
                    icon.classList.add(`icon--${iconName}-${color}`);
                }
            });
        });
    </script>

    <?php wp_footer(); ?>
</body>
</html>

<?php get_footer(); ?>
