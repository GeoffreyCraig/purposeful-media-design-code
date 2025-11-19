<?php
/**
 * Template Name: Pillar Page
 * Description: Long-form content template with sticky menu navigation, pillar cards, FAQ section
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="page-wrapper">

    <!-- ========================================
         HERO: Hero ATF Center
         ACF INTEGRATION: v1.0 - 2025-11-18
         Field Group: ATF Hero Centered
         Fields: atf_hero_centered_headline, atf_hero_centered_description,
                 atf_hero_centered_cta_text, atf_hero_centered_ta_link,
                 atf_hero_centered_bg_image
         Fallbacks: Intelligent defaults for all fields
         ======================================== -->
    <section class="hero-atf-center" id="heroATFCenter" aria-label="<?php esc_attr_e('Hero Section', 'purposeful-media'); ?>">
        <!-- Media Container - Supports both Image and Video -->
        <div class="hero-media-container" id="heroMediaContainer">
            <?php 
            // ACF Background Image with multiple format support
            $hero_bg = get_field('atf_hero_centered_bg_image');
            $img_url = '';
            $img_alt = esc_attr__('Hero background', 'purposeful-media');
            
            if ($hero_bg) {
                if (is_array($hero_bg)) {
                    // Image Array format
                    $img_url = esc_url($hero_bg['url']);
                    $img_alt = !empty($hero_bg['alt']) ? esc_attr($hero_bg['alt']) : $img_alt;
                } elseif (is_numeric($hero_bg)) {
                    // Image ID format
                    $img_url = wp_get_attachment_image_url($hero_bg, 'full');
                    $img_alt = get_post_meta($hero_bg, '_wp_attachment_image_alt', true);
                    if (empty($img_alt)) {
                        $img_alt = esc_attr__('Hero background', 'purposeful-media');
                    }
                } else {
                    // Image URL format (string)
                    $img_url = esc_url($hero_bg);
                }
            }
            
            // Fallback to default image if no ACF image set
            if (empty($img_url)) {
                $img_url = 'https://purposefulmediapromotions.com/staging/2182/wp-content/uploads/2025/11/pillar-page-image.jpg';
            }
            ?>
            <!-- Hero Image -->
            <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" class="hero-media" loading="eager">
        </div>
        
        <!-- Content Container -->
        <div class="hero-content">
            <?php 
            // ACF Headline with fallback
            $headline = get_field('atf_hero_centered_headline');
            if (empty($headline)) {
                $headline = __('Transform Your Marketing Strategy', 'purposeful-media');
            }
            ?>
            <h1 class="hero-headline">
                <?php echo esc_html($headline); ?>
            </h1>
            
            <?php 
            // ACF Description - conditional display
            $description = get_field('atf_hero_centered_description');
            if (!empty($description)) : 
            ?>
                <p class="hero-subheadline">
                    <?php echo esc_html($description); ?>
                </p>
            <?php endif; ?>
            
            <?php 
            // ACF CTA with fallbacks
            $cta_text = get_field('atf_hero_centered_cta_text');
            $cta_link = get_field('atf_hero_centered_ta_link');
            
            if (empty($cta_text)) {
                $cta_text = __('Learn More', 'purposeful-media');
            }
            if (empty($cta_link)) {
                $cta_link = '#overview';
            }
            ?>
            <a href="<?php echo esc_url($cta_link); ?>" class="hero-button" role="button" aria-label="<?php esc_attr_e('Call to action', 'purposeful-media'); ?>">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
    </section>

    <!-- Hero Media & Button Smooth Scroll JavaScript -->
    <script>
        // Hero Media Handler
        const HeroMediaHandler = {
            init() {
                this.container = document.getElementById('heroMediaContainer');
                this.hero = document.getElementById('heroATFCenter');

                // Check if media exists
                const media = this.container.querySelector('img, video');
                if (!media || media.tagName === 'DIV') {
                    // No real media, add no-media class for fallback gradient
                    this.hero.classList.add('no-media');
                }

                // Handle video-specific functionality
                const video = this.container.querySelector('video');
                if (video) {
                    this.setupVideo(video);
                }
            },

            setupVideo(video) {
                // Ensure video plays silently and loops
                video.muted = true;
                video.loop = true;
                video.playsinline = true;

                // Auto-play handling with fallback
                const playVideo = () => {
                    video.play().catch(e => {
                        console.log('Autoplay prevented:', e);
                        // If autoplay fails, add play on user interaction
                        document.addEventListener('click', () => {
                            video.play();
                        }, { once: true });
                    });
                };

                // Start playing when video is ready
                if (video.readyState >= 3) {
                    playVideo();
                } else {
                    video.addEventListener('loadeddata', playVideo);
                }

                // Optimize for mobile
                if (window.matchMedia('(max-width: 767px)').matches) {
                    video.setAttribute('preload', 'metadata');
                }
            }
        };

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => HeroMediaHandler.init());
        } else {
            HeroMediaHandler.init();
        }

        // Hero button smooth scroll
        document.addEventListener('DOMContentLoaded', function() {
            const heroButton = document.querySelector('.hero-button');
            if (heroButton && heroButton.getAttribute('href').startsWith('#')) {
                heroButton.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);
                    const stickyMenu = document.getElementById('stickyMenu');

                    if (targetSection && stickyMenu) {
                        e.preventDefault();
                        const menuHeight = stickyMenu.offsetHeight;
                        const targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - menuHeight;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            }
        });
    </script>

    <!-- ========================================
         STICKY MENU: In-Page Navigation
         ======================================== -->
    <nav class="pm-sticky-menu" id="stickyMenu" role="navigation" aria-label="<?php esc_attr_e('Page sections navigation', 'purposeful-media'); ?>">

        <!-- Desktop/Tablet Menu -->
        <div class="pm-sticky-menu-desktop">
            <div class="pm-sticky-menu-inner">
                <a href="#overview" class="pm-sticky-menu-item active" data-section="overview"><?php _e('Overview', 'purposeful-media'); ?></a>
                <span class="pm-sticky-menu-separator">&gt;</span>
                <a href="#strategy" class="pm-sticky-menu-item" data-section="strategy"><?php _e('Strategy', 'purposeful-media'); ?></a>
                <span class="pm-sticky-menu-separator">&gt;</span>
                <a href="#method" class="pm-sticky-menu-item" data-section="method"><?php _e('Method', 'purposeful-media'); ?></a>
                <span class="pm-sticky-menu-separator">&gt;</span>
                <a href="#benefits" class="pm-sticky-menu-item" data-section="benefits"><?php _e('Benefits', 'purposeful-media'); ?></a>
                <span class="pm-sticky-menu-separator">&gt;</span>
                <a href="#resources" class="pm-sticky-menu-item" data-section="resources"><?php _e('Resources', 'purposeful-media'); ?></a>
                <span class="pm-sticky-menu-separator">&gt;</span>
                <a href="#faq" class="pm-sticky-menu-item" data-section="faq"><?php _e('FAQ', 'purposeful-media'); ?></a>
                <span class="pm-sticky-menu-separator">&gt;</span>
                <a href="#start" class="pm-sticky-menu-start"><?php _e('Get Started', 'purposeful-media'); ?></a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="pm-sticky-menu-mobile">
            <div class="pm-sticky-menu-mobile-bar">
                <div class="pm-sticky-menu-mobile-current" id="currentSectionMobile"><?php _e('Overview', 'purposeful-media'); ?></div>
                <button class="pm-sticky-menu-mobile-toggle" id="mobileMenuToggle" aria-label="<?php esc_attr_e('Toggle menu', 'purposeful-media'); ?>" aria-expanded="false">
                    <span class="pm-sticky-menu-hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>

            <!-- Mobile Dropdown -->
            <div class="pm-sticky-menu-dropdown" id="mobileDropdown">
                <div class="pm-sticky-menu-dropdown-inner">
                    <a href="#overview" class="pm-sticky-menu-dropdown-item active" data-section="overview"><?php _e('Overview', 'purposeful-media'); ?></a>
                    <a href="#strategy" class="pm-sticky-menu-dropdown-item" data-section="strategy"><?php _e('Strategy', 'purposeful-media'); ?></a>
                    <a href="#method" class="pm-sticky-menu-dropdown-item" data-section="method"><?php _e('Method', 'purposeful-media'); ?></a>
                    <a href="#benefits" class="pm-sticky-menu-dropdown-item" data-section="benefits"><?php _e('Benefits', 'purposeful-media'); ?></a>
                    <a href="#resources" class="pm-sticky-menu-dropdown-item" data-section="resources"><?php _e('Resources', 'purposeful-media'); ?></a>
                    <a href="#faq" class="pm-sticky-menu-dropdown-item" data-section="faq"><?php _e('FAQ', 'purposeful-media'); ?></a>
                    <a href="#start" class="pm-sticky-menu-dropdown-item start"><?php _e('Get Started', 'purposeful-media'); ?></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sticky Menu JavaScript -->
    <script>
        /**
         * Sticky Menu Component JavaScript
         */
        (function() {
            'use strict';

            // Elements
            const stickyMenu = document.getElementById('stickyMenu');
            const mobileToggle = document.getElementById('mobileMenuToggle');
            const mobileDropdown = document.getElementById('mobileDropdown');
            const currentSectionMobile = document.getElementById('currentSectionMobile');

            // All menu items (desktop and mobile)
            const desktopMenuItems = document.querySelectorAll('.pm-sticky-menu-item[data-section]');
            const mobileMenuItems = document.querySelectorAll('.pm-sticky-menu-dropdown-item[data-section]');

            // Mobile menu toggle
            if (mobileToggle) {
                mobileToggle.addEventListener('click', function() {
                    const isOpen = mobileDropdown.classList.contains('open');

                    if (isOpen) {
                        mobileDropdown.classList.remove('open');
                        mobileToggle.classList.remove('open');
                        mobileToggle.setAttribute('aria-expanded', 'false');
                    } else {
                        mobileDropdown.classList.add('open');
                        mobileToggle.classList.add('open');
                        mobileToggle.setAttribute('aria-expanded', 'true');
                    }
                });
            }

            // Close mobile menu when clicking a link
            mobileMenuItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    // Close dropdown
                    mobileDropdown.classList.remove('open');
                    mobileToggle.classList.remove('open');
                    mobileToggle.setAttribute('aria-expanded', 'false');

                    // Smooth scroll
                    const targetId = this.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        e.preventDefault();
                        const menuHeight = stickyMenu.offsetHeight;
                        const targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - menuHeight;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Desktop menu smooth scroll
            desktopMenuItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        e.preventDefault();
                        const menuHeight = stickyMenu.offsetHeight;
                        const targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - menuHeight;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Get Started button smooth scroll
            document.querySelectorAll('.pm-sticky-menu-start').forEach(button => {
                button.addEventListener('click', function(e) {
                    const targetSection = document.getElementById('start');
                    if (targetSection) {
                        e.preventDefault();
                        const menuHeight = stickyMenu.offsetHeight;
                        const targetPosition = targetSection.getBoundingClientRect().top + window.pageYOffset - menuHeight;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // Update active section on scroll
            function updateActiveSection() {
                const sectionIds = ['overview', 'strategy', 'method', 'benefits', 'resources', 'faq', 'start'];
                const sections = sectionIds.map(id => document.getElementById(id)).filter(el => el !== null);

                if (sections.length === 0) return;

                const scrollPosition = window.scrollY + stickyMenu.offsetHeight + 50;
                let currentSection = '';

                for (let i = 0; i < sections.length; i++) {
                    const section = sections[i];
                    const sectionTop = section.getBoundingClientRect().top + window.pageYOffset;
                    const sectionId = section.getAttribute('id');

                    let sectionEnd;
                    if (i < sections.length - 1) {
                        const nextSection = sections[i + 1];
                        sectionEnd = nextSection.getBoundingClientRect().top + window.pageYOffset;
                    } else {
                        sectionEnd = document.documentElement.scrollHeight;
                    }

                    if (scrollPosition >= sectionTop && scrollPosition < sectionEnd) {
                        currentSection = sectionId;
                        break;
                    }
                }

                if (!currentSection && sections.length > 0) {
                    currentSection = sections[0].getAttribute('id');
                }

                // Update desktop menu
                desktopMenuItems.forEach(item => {
                    if (item.getAttribute('data-section') === currentSection) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });

                // Update mobile menu
                mobileMenuItems.forEach(item => {
                    if (item.getAttribute('data-section') === currentSection) {
                        item.classList.add('active');
                    } else {
                        item.classList.remove('active');
                    }
                });

                // Update mobile current section display
                const sectionNames = {
                    'overview': '<?php echo esc_js(__('Overview', 'purposeful-media')); ?>',
                    'strategy': '<?php echo esc_js(__('Strategy', 'purposeful-media')); ?>',
                    'method': '<?php echo esc_js(__('Method', 'purposeful-media')); ?>',
                    'benefits': '<?php echo esc_js(__('Benefits', 'purposeful-media')); ?>',
                    'resources': '<?php echo esc_js(__('Resources', 'purposeful-media')); ?>',
                    'faq': '<?php echo esc_js(__('FAQ', 'purposeful-media')); ?>',
                    'start': '<?php echo esc_js(__('Get Started', 'purposeful-media')); ?>'
                };

                if (currentSectionMobile && sectionNames[currentSection]) {
                    currentSectionMobile.textContent = sectionNames[currentSection];
                }
            }

            // Hide/show menu on scroll
            let lastScrollTop = 0;
            let scrollTimer = null;

            function handleScroll() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;

                // Update active section with debounce
                clearTimeout(scrollTimer);
                scrollTimer = setTimeout(updateActiveSection, 10);
            }

            // Event listeners
            window.addEventListener('scroll', handleScroll);
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768 && mobileDropdown) {
                    mobileDropdown.classList.remove('open');
                    if (mobileToggle) {
                        mobileToggle.classList.remove('open');
                        mobileToggle.setAttribute('aria-expanded', 'false');
                    }
                }
            });

            // Initialize
            updateActiveSection();
        })();
    </script>

<!-- ========================================
         PILLAR SECTION: Main Content Cards
         ACF INTEGRATION: v1.0 - 2025-11-18
         Field Group: Pillar Page Text Section
         Fields: pillar_page_headline, pillar_page_card (Repeater),
                 pillar_card_icon (Select), pillar_card_headline, pillar_card_text
         Fallbacks: Default cards if repeater empty
         ======================================== -->
    <section class="pillar-section" id="overview">
        <!-- Section Header -->
        <header class="pillar-section__header">
            <div class="pillar-section__headline-wrapper">
                <?php 
                // ACF Section Headline with fallback
                $section_headline = get_field('pillar_page_headline');
                if (empty($section_headline)) {
                    $section_headline = __('Pillar Page Section', 'purposeful-media');
                }
                ?>
                <h1 class="pillar-section__headline"><?php echo esc_html($section_headline); ?></h1>
            </div>
        </header>

        <?php 
        // Check if Pillar Card repeater has rows
        if (have_rows('pillar_page_card')) :
            $card_index = 1;
            
            while (have_rows('pillar_page_card')) : the_row();
                $icon = get_sub_field('pillar_card_icon');
                $headline = get_sub_field('pillar_card_headline');
                $text = get_sub_field('pillar_card_text');
                
                // Skip if headline is empty
                if (empty($headline)) continue;
                
                // Generate anchor ID from headline
                $anchor_id = sanitize_title($headline);
                
                // Default icon if not selected
                if (empty($icon)) {
                    $icon = 'professional';
                }
        ?>

        <!-- Card <?php echo $card_index; ?>: <?php echo esc_html($headline); ?> -->
        <div class="pillar-section__card pillar-card">
            <div class="pillar-card__icon">
                <div class="decorative-icon-display decorative-icon-display--xxlarge" data-icon="<?php echo esc_attr($icon); ?>" data-color="navy"></div>
            </div>
            <div class="pillar-card__content">
                <div class="pillar-card__headline"<?php echo ($card_index > 1) ? ' id="' . esc_attr($anchor_id) . '"' : ''; ?>>
                    <h2 class="pillar-card__heading"><?php echo esc_html($headline); ?></h2>
                </div>
                <div class="pillar-card__paragraph">
                    <div class="pillar-card__text">
                        <?php echo wp_kses_post($text); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php 
                $card_index++;
            endwhile;
            
        else : 
            // Fallback: Default cards if repeater is empty
        ?>

        <!-- Fallback Card 1: Overview -->
        <div class="pillar-section__card pillar-card">
            <div class="pillar-card__icon">
                <div class="decorative-icon-display decorative-icon-display--xxlarge" data-icon="professional" data-color="navy"></div>
            </div>
            <div class="pillar-card__content">
                <div class="pillar-card__headline">
                    <h2 class="pillar-card__heading"><?php _e('Overview', 'purposeful-media'); ?></h2>
                </div>
                <div class="pillar-card__paragraph">
                    <div class="pillar-card__text">
                        <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas integer eget aliquet nibh praesent tristique.', 'purposeful-media'); ?></p>
                        <p><?php _e('Risus in hendrerit gravida rutrum quisque. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Malesuada nunc vel risus commodo.', 'purposeful-media'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fallback Card 2: Strategy -->
        <div class="pillar-section__card pillar-card">
            <div class="pillar-card__icon">
                <div class="decorative-icon-display decorative-icon-display--xxlarge" data-icon="strategy" data-color="navy"></div>
            </div>
            <div class="pillar-card__content">
                <div class="pillar-card__headline" id="strategy">
                    <h2 class="pillar-card__heading"><?php _e('Strategy', 'purposeful-media'); ?></h2>
                </div>
                <div class="pillar-card__paragraph">
                    <div class="pillar-card__text">
                        <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas integer eget aliquet nibh praesent tristique.', 'purposeful-media'); ?></p>
                        <p><?php _e('Risus in hendrerit gravida rutrum quisque. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Malesuada nunc vel risus commodo.', 'purposeful-media'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <?php endif; ?>
    </section>

    <!-- JavaScript for Responsive Icon Sizing -->
    <script>
        function updateIconSizes() {
            const icons = document.querySelectorAll('.pillar-card__icon .decorative-icon-display');
            const isMobile = window.innerWidth < 768;

            icons.forEach(icon => {
                icon.classList.remove('decorative-icon-display--xxlarge', 'decorative-icon-display--xlarge');

                if (isMobile) {
                    icon.classList.add('decorative-icon-display--xlarge');
                } else {
                    icon.classList.add('decorative-icon-display--xxlarge');
                }
            });
        }

        window.addEventListener('DOMContentLoaded', updateIconSizes);
        window.addEventListener('resize', updateIconSizes);
    </script>

    <!-- ========================================
         HEADLINE BANNER: Resources
         ======================================== -->
    <div class="card-banner-spacer variant-headline-banner"
         id="resources"
         data-component="card-banner-spacer"
         data-variant="headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('Resources', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- ========================================
         HEADLINE REVERSE: Blog
         ======================================== -->
    <div class="card-banner-spacer variant-headline-reverse">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('The Latest From Our Blog', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- ========================================
         BLOG GROUP TEASER
         ======================================== -->
    <section class="blog-group blog-group--teaser">
        <div class="blog-group__cards">
            <div class="blog-group__inner">

                <!-- Blog Card 1 -->
                <article class="blog-card" role="article" tabindex="0" aria-labelledby="blog-title-1">
                    <div class="blog-card__top">
                        <h3 id="blog-title-1" class="blog-card__title">
                            <?php _e('Email Marketing Best Practices for B2B Success', 'purposeful-media'); ?>
                        </h3>
                        <div class="blog-card__meta">
                            <?php _e('Marketing | Oct 27, 2025 | Geoffrey Craig', 'purposeful-media'); ?>
                        </div>
                    </div>

                    <div class="blog-card__content">
                        <p class="blog-card__excerpt">
                            <?php _e('Discover proven strategies for improving email deliverability, engagement rates, and conversion metrics in your B2B campaigns.', 'purposeful-media'); ?> <a href="/blog/email-marketing-best-practices" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                        </p>
                    </div>
                </article>

                <!-- Blog Card 2 -->
                <article class="blog-card" role="article" tabindex="0" aria-labelledby="blog-title-2">
                    <div class="blog-card__top">
                        <h3 id="blog-title-2" class="blog-card__title">
                            <?php _e('Lead Magnet Creation Guide', 'purposeful-media'); ?>
                        </h3>
                        <div class="blog-card__meta">
                            <?php _e('Content | Oct 24, 2025 | Dana Morris', 'purposeful-media'); ?>
                        </div>
                    </div>

                    <div class="blog-card__content">
                        <p class="blog-card__excerpt">
                            <?php _e('Learn the secrets to creating lead magnets that your B2B audience can\'t resist. From format selection to value propositions.', 'purposeful-media'); ?> <a href="/blog/lead-magnet-creation" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                        </p>
                    </div>
                </article>

                <!-- Blog Card 3 -->
                <article class="blog-card" role="article" tabindex="0" aria-labelledby="blog-title-3">
                    <div class="blog-card__top">
                        <h3 id="blog-title-3" class="blog-card__title">
                            <?php _e('Webinar Production Masterclass', 'purposeful-media'); ?>
                        </h3>
                        <div class="blog-card__meta">
                            <?php _e('Events | Oct 20, 2025 | Bill Robertson', 'purposeful-media'); ?>
                        </div>
                    </div>

                    <div class="blog-card__content">
                        <p class="blog-card__excerpt">
                            <?php _e('Master the art of producing engaging webinars that convert attendees into qualified leads. Complete production guide.', 'purposeful-media'); ?> <a href="/blog/webinar-production" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                        </p>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- ========================================
         FEATURED RESOURCE SECTION
         ======================================== -->

    <!-- Headline Reverse: Featured Resource -->
    <div class="card-banner-spacer variant-headline-reverse">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('Featured Resource Download', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- Content 2-Column Resource -->
    <section class="content-2column-resource" role="region" aria-labelledby="pillar-resource-heading">
        <!-- Background Image Container (Desktop/DesktopPlus only) -->
        <div class="section-background" aria-hidden="true">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_1421446100.jpg"
                 alt=""
                 loading="lazy">
        </div>

        <!-- Main Content Container -->
        <div class="content-container">
            <div class="column-group">
                <!-- Left Column: eBook Thumbnail Image -->
                <div class="left-column">
                    <div class="image-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sample-ebook-cover.jpg"
                             alt="<?php esc_attr_e('Complete Guide to B2B Marketing ROI eBook Cover', 'purposeful-media'); ?>"
                             class="ebook-image"
                             loading="lazy">
                    </div>
                </div>

                <!-- Right Column: Resource Teaser Card -->
                <div class="right-column">
                    <h2 id="pillar-resource-heading" class="card-title">
                        <?php _e('Complete Guide to B2B Marketing ROI', 'purposeful-media'); ?>
                    </h2>
                    <p class="card-description">
                        <?php _e('Discover proven strategies to measure, track, and optimize your marketing investment returns. This comprehensive guide walks you through establishing KPIs, implementing analytics frameworks, and demonstrating clear value to stakeholders. Learn how leading B2B companies are achieving 3-5x ROI improvements through data-driven marketing optimization.', 'purposeful-media'); ?>
                    </p>
                    <p class="card-description">
                        <?php _e('Inside this guide, you\'ll find practical templates, calculation frameworks, and real-world case studies that show you exactly how to quantify your marketing impact and make strategic decisions based on solid data.', 'purposeful-media'); ?>
                    </p>
                    <a href="/resources/b2b-marketing-roi-guide" class="resource-button">
                        <?php _e('Download Free Guide', 'purposeful-media'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         HEADLINE BANNER: FAQ
         ======================================== -->
    <div class="card-banner-spacer variant-headline-banner"
         data-component="card-banner-spacer"
         data-variant="headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('FAQ', 'purposeful-media'); ?></h1>
        </div>
    </div>

<!-- ========================================
         FAQ SECTION: Frequently Asked Questions
         ACF INTEGRATION: v1.0 - 2025-11-18
         Field Group: FAQ Section
         Fields: faq_items (Repeater), faq_question (Text), faq_answer (WYSIWYG)
         Fallbacks: Default FAQ content if repeater empty
         ======================================== -->
    <section class="section-faq-group" id="faq" data-component="Section/FAQGroup" role="region" aria-label="<?php esc_attr_e('Frequently Asked Questions', 'purposeful-media'); ?>">
        <div class="section-faq-group__container">
            <div class="section-faq-group__items">

                <?php 
                // Check if FAQ repeater has rows
                if (have_rows('faq_items')) :
                    $faq_index = 1;
                    
                    while (have_rows('faq_items')) : the_row();
                        $question = get_sub_field('faq_question');
                        $answer = get_sub_field('faq_answer');
                        
                        // Skip if question is empty
                        if (empty($question)) continue;
                        
                        // First item defaults to open state
                        $is_open = ($faq_index === 1);
                        $card_class = $is_open ? 'card-faq card-faq--open' : 'card-faq';
                        $aria_expanded = $is_open ? 'true' : 'false';
                        $aria_hidden = $is_open ? 'false' : 'true';
                ?>
                
                <!-- FAQ Card <?php echo $faq_index; ?> -->
                <div class="<?php echo esc_attr($card_class); ?>" data-name="Card/FAQ">
                    <div class="card-faq__question" tabindex="0" role="button" aria-expanded="<?php echo esc_attr($aria_expanded); ?>" aria-controls="faq-answer-<?php echo $faq_index; ?>">
                        <div class="card-faq__question-text">
                            <?php echo esc_html($question); ?>
                        </div>
                        <div class="card-faq__arrow" aria-hidden="true">›</div>
                    </div>
                    <div class="card-faq__answer" id="faq-answer-<?php echo $faq_index; ?>" aria-hidden="<?php echo esc_attr($aria_hidden); ?>">
                        <div class="card-faq__answer-content">
                            <?php echo wp_kses_post($answer); ?>
                        </div>
                    </div>
                </div>

                <?php 
                        $faq_index++;
                    endwhile;
                    
                else : 
                    // Fallback: Default FAQ items if repeater is empty
                ?>
                
                <!-- Fallback FAQ Card 1 -->
                <div class="card-faq card-faq--open" data-name="Card/FAQ">
                    <div class="card-faq__question" tabindex="0" role="button" aria-expanded="true" aria-controls="faq-answer-1">
                        <div class="card-faq__question-text">
                            <?php _e('What digital marketing services do you offer for B2B companies?', 'purposeful-media'); ?>
                        </div>
                        <div class="card-faq__arrow" aria-hidden="true">›</div>
                    </div>
                    <div class="card-faq__answer" id="faq-answer-1" aria-hidden="false">
                        <div class="card-faq__answer-content">
                            <?php _e('We specialize in comprehensive B2B digital marketing services including email marketing management, webinar production and promotion, lead magnet creation (eBooks, guides, templates), content repurposing across channels, and SEO optimization. Our focus is on generating qualified leads through strategic content and campaigns.', 'purposeful-media'); ?>
                        </div>
                    </div>
                </div>

                <!-- Fallback FAQ Card 2 -->
                <div class="card-faq" data-name="Card/FAQ">
                    <div class="card-faq__question" tabindex="0" role="button" aria-expanded="false" aria-controls="faq-answer-2">
                        <div class="card-faq__question-text">
                            <?php _e('How do you measure marketing success and ROI?', 'purposeful-media'); ?>
                        </div>
                        <div class="card-faq__arrow" aria-hidden="true">›</div>
                    </div>
                    <div class="card-faq__answer" id="faq-answer-2" aria-hidden="true">
                        <div class="card-faq__answer-content">
                            <?php _e('We track success through key metrics including market-qualified leads (MQLs), email engagement rates, webinar attendance and conversion, content downloads, and ultimately revenue attribution. We use tools like Google Analytics, HubSpot, and SEMrush to provide transparent reporting on campaign performance and ROI.', 'purposeful-media'); ?>
                        </div>
                    </div>
                </div>

                <?php endif; ?>

            </div>
        </div>
</section>
    
    <!-- FAQ Accordion Handler (Test) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.card-faq__question');
            
            faqItems.forEach(function(item) {
                item.addEventListener('click', function() {
                    const card = this.closest('.card-faq');
                    const answer = card.querySelector('.card-faq__answer');
                    const isOpen = card.classList.contains('card-faq--open');
                    
                    // Toggle states
                    card.classList.toggle('card-faq--open');
                    this.setAttribute('aria-expanded', !isOpen);
                    answer.setAttribute('aria-hidden', isOpen);
                });
                
                // Keyboard accessibility
                item.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        this.click();
                    }
                });
            });
        });
    </script>

    <!-- FAQ Accordion JavaScript -->
    <script>
        // Card/FAQ Component JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            // Get all FAQ items
            const faqItems = document.querySelectorAll('.card-faq');

            faqItems.forEach(item => {
                const question = item.querySelector('.card-faq__question');
                const answer = item.querySelector('.card-faq__answer');
                const arrow = item.querySelector('.card-faq__arrow');

                // Skip if no answer element
                if (!answer) return;

                // Toggle function
                function toggleFAQ() {
                    const isOpen = item.classList.contains('card-faq--open');

                    // Close all other FAQ items (accordion behavior)
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('card-faq--open')) {
                            otherItem.classList.remove('card-faq--open');
                            const otherQuestion = otherItem.querySelector('.card-faq__question');
                            const otherAnswer = otherItem.querySelector('.card-faq__answer');
                            if (otherQuestion) otherQuestion.setAttribute('aria-expanded', 'false');
                            if (otherAnswer) otherAnswer.setAttribute('aria-hidden', 'true');
                        }
                    });

                    // Toggle current item
                    if (isOpen) {
                        item.classList.remove('card-faq--open');
                        question.setAttribute('aria-expanded', 'false');
                        answer.setAttribute('aria-hidden', 'true');
                    } else {
                        item.classList.add('card-faq--open');
                        question.setAttribute('aria-expanded', 'true');
                        answer.setAttribute('aria-hidden', 'false');
                    }
                }

                // Click handler
                question.addEventListener('click', toggleFAQ);

                // Keyboard handler
                question.addEventListener('keydown', function(e) {
                    // Space or Enter key
                    if (e.key === ' ' || e.key === 'Enter') {
                        e.preventDefault();
                        toggleFAQ();
                    }
                });
            });
        });
    </script>

<!-- ========================================
     SECTION: Your Next Step - Icon Banner
     ========================================
     ACF Integration: Icon Banner Section
     Date: November 18, 2025
     
     Dynamic Fields:
     - icon_banner_icon (Select)
     - icon_banner_color (Select)
     - icon_banner_title (Text)
     - icon_banner_tagline (Text)
     
     Fallback Strategy:
     If ACF fields return empty/null, displays default
     "Your Next Step" content with contact icon.
     
     Location: Homepage, Pillar, Interior
     ======================================== -->
<!-- Banner Spacer: Headline + Subtitle -->
<div class="card-banner-spacer" data-component="card-banner-spacer" data-variant="headline-subtitle" id="start">
    <div class="banner-spacer-content">
        <?php
            $icon = get_field('icon_banner_icon');
            $color = get_field('icon_banner_color');
            $title = get_field('icon_banner_title');
            $tagline = get_field('icon_banner_tagline');
        ?>
        <!-- Icon -->
        <div class="decorative-icon-display decorative-icon-display--xlarge" 
             data-icon="<?php echo esc_attr($icon ? $icon : 'contact'); ?>" 
             data-color="<?php echo esc_attr($color ? $color : 'white'); ?>"></div>
        <!-- Text Container: Headline + Subtitle -->
        <div class="banner-spacer-header">
            <!-- Headline -->
            <h1 class="banner-headline">
                <?php echo esc_html($title ? $title : __('Your Next Step', 'purposeful-media')); ?>
            </h1>
            <!-- Subtitle -->
            <p class="banner-subtitle">
                <?php echo esc_html($tagline ? $tagline : __('Ready to get started? Let\'s connect.', 'purposeful-media')); ?>
            </p>
        </div>
    </div>
</div>

<!-- ========================================
     CONTENT: 2-Column Graphic [CTA Section]
     ========================================
     ACF Integration: 2-Column CTA Section
     Date: November 18, 2025
     
     Dynamic Fields:
     - two_column_background (Image)
     - left_card_heading (Text)
     - left_card_text (Text Area)
     - left_card_button_text (Text)
     - left_card_button_link (URL)
     - right_card_heading (Text)
     - right_card_text (Text Area)
     - right_card_button_text (Text)
     - right_card_button_link (URL)
     
     Fallback Strategy:
     If ACF fields return empty/null, displays default
     "Schedule" and "Get in Touch" CTA content.
     
     Location: Homepage, Pillar, Resources
     ======================================== -->
<div class="content-2column-graphic">
    <?php
        $background = get_field('two_column_background');
        $left_heading = get_field('left_card_heading');
        $left_text = get_field('left_card_text');
        $left_button_text = get_field('left_card_button_text');
        $left_button_link = get_field('left_card_button_link');
        $right_heading = get_field('right_card_heading');
        $right_text = get_field('right_card_text');
        $right_button_text = get_field('right_card_button_text');
        $right_button_link = get_field('right_card_button_link');
    ?>
    <!-- Background Image -->
    <div class="content-2column-graphic__background">
        <img src="<?php echo esc_url($background ? $background['url'] : get_template_directory_uri() . '/assets/images/shutterstock_2085055825.jpg'); ?>"
             alt="<?php echo esc_attr($background ? $background['alt'] : ''); ?>"
             class="content-2column-graphic__background-image">
    </div>
    <!-- Content Container -->
    <div class="content-2column-graphic__container">
        <!-- Left Column -->
        <div class="content-2column-graphic__column content-2column-graphic__column--left">
            <!-- Transform Card -->
            <div class="teaser-card">
                <div class="teaser-card__headline">
                    <h2 class="teaser-card__title">
                        <?php echo esc_html($left_heading ? $left_heading : __('Ready to transform your marketing efforts?', 'purposeful-media')); ?>
                    </h2>
                </div>
                <p class="teaser-card__description">
                    <?php echo esc_html($left_text ? $left_text : __('Schedule a free consultation to discuss your specific challenges and opportunities.', 'purposeful-media')); ?>
                </p>
                <a href="<?php echo esc_url($left_button_link ? $left_button_link : '#'); ?>" class="teaser-card__button teaser-card__button--gold">
                    <span class="teaser-card__button-text">
                        <?php echo esc_html($left_button_text ? $left_button_text : __('Schedule', 'purposeful-media')); ?>
                    </span>
                </a>
            </div>
        </div>
        <!-- Right Column -->
        <div class="content-2column-graphic__column content-2column-graphic__column--right">
            <!-- Ready to Grow Card -->
            <div class="teaser-card">
                <div class="teaser-card__headline">
                    <h2 class="teaser-card__title">
                        <?php echo esc_html($right_heading ? $right_heading : __('Have questions first?', 'purposeful-media')); ?>
                    </h2>
                </div>
                <p class="teaser-card__description">
                    <?php echo esc_html($right_text ? $right_text : __('Get in touch to start a conversation about how we can help your business grow.', 'purposeful-media')); ?>
                </p>
                <a href="<?php echo esc_url($right_button_link ? $right_button_link : '#'); ?>" class="teaser-card__button teaser-card__button--navy">
                    <span class="teaser-card__button-text">
                        <?php echo esc_html($right_button_text ? $right_button_text : __('Get in Touch', 'purposeful-media')); ?>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scheduleButton = document.querySelector('.teaser-card__button--gold');
            const contactButton = document.querySelector('.teaser-card__button--navy');

            if (scheduleButton) {
                scheduleButton.addEventListener('click', function() {
                    console.log('Schedule button clicked');
                });
            }

            if (contactButton) {
                contactButton.addEventListener('click', function() {
                    console.log('Contact button clicked');
                });
            }
        });
    </script>

</main>
<!-- End of page-wrapper -->

<?php get_footer(); ?>
