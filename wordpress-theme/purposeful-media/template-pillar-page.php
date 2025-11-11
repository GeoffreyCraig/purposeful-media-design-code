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
         ======================================== -->
    <section class="hero-atf-center" id="heroATFCenter" aria-label="<?php esc_attr_e('Hero Section', 'purposeful-media'); ?>">

        <!-- Media Container - Supports both Image and Video -->
        <div class="hero-media-container" id="heroMediaContainer">
            <!-- Hero Image -->
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_2618933959.jpg" alt="<?php esc_attr_e('Hero background', 'purposeful-media'); ?>" class="hero-media" loading="eager">
        </div>

        <!-- Content Container -->
        <div class="hero-content">
            <h1 class="hero-headline">
                <?php _e('H1 Headline 36 54h', 'purposeful-media'); ?>
            </h1>
            <p class="hero-subheadline">
                <?php _e('CTA Centered', 'purposeful-media'); ?>
            </p>
            <a href="#overview" class="hero-button" role="button" aria-label="<?php esc_attr_e('Call to action', 'purposeful-media'); ?>">
                <?php _e('Button Text', 'purposeful-media'); ?>
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
         ======================================== -->
    <section class="pillar-section" id="overview">
        <!-- Section Header -->
        <header class="pillar-section__header">
            <div class="pillar-section__headline-wrapper">
                <h1 class="pillar-section__headline"><?php _e('Pillar Page Section', 'purposeful-media'); ?></h1>
            </div>
        </header>

        <!-- Card 1: Overview -->
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
                        <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas integer eget aliquet nibh praesent tristique. Fermentum posuere urna nec tincidunt. Mi sit amet mauris commodo quis imperdiet. Massa ultricies mi quis hendrerit dolor magna.', 'purposeful-media'); ?></p>

                        <p><?php _e('Risus in hendrerit gravida rutrum quisque. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Malesuada nunc vel risus commodo. Vitae auctor eu augue ut lectus arcu bibendum. Vitae sapien pellentesque habitant morbi tristique senectus. Sit amet cursus sit amet. Egestas purus viverra accumsan in nisl nisi. Tempus egestas sed sed risus pretium quam.', 'purposeful-media'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Strategy -->
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
                        <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas integer eget aliquet nibh praesent tristique. Fermentum posuere urna nec tincidunt. Mi sit amet mauris commodo quis imperdiet. Massa ultricies mi quis hendrerit dolor magna.', 'purposeful-media'); ?></p>

                        <p><?php _e('Risus in hendrerit gravida rutrum quisque. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Malesuada nunc vel risus commodo. Vitae auctor eu augue ut lectus arcu bibendum. Vitae sapien pellentesque habitant morbi tristique senectus. Sit amet cursus sit amet. Egestas purus viverra accumsan in nisl nisi. Tempus egestas sed sed risus pretium quam.', 'purposeful-media'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Methodology -->
        <div class="pillar-section__card pillar-card">
            <div class="pillar-card__icon">
                <div class="decorative-icon-display decorative-icon-display--xxlarge" data-icon="engage" data-color="navy"></div>
            </div>
            <div class="pillar-card__content">
                <div class="pillar-card__headline" id="method">
                    <h2 class="pillar-card__heading"><?php _e('Methodology', 'purposeful-media'); ?></h2>
                </div>
                <div class="pillar-card__paragraph">
                    <div class="pillar-card__text">
                        <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas integer eget aliquet nibh praesent tristique. Fermentum posuere urna nec tincidunt. Mi sit amet mauris commodo quis imperdiet. Massa ultricies mi quis hendrerit dolor magna.', 'purposeful-media'); ?></p>

                        <p><?php _e('Risus in hendrerit gravida rutrum quisque. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Malesuada nunc vel risus commodo. Vitae auctor eu augue ut lectus arcu bibendum. Vitae sapien pellentesque habitant morbi tristique senectus. Sit amet cursus sit amet. Egestas purus viverra accumsan in nisl nisi. Tempus egestas sed sed risus pretium quam.', 'purposeful-media'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4: Benefits -->
        <div class="pillar-section__card pillar-card">
            <div class="pillar-card__icon">
                <div class="decorative-icon-display decorative-icon-display--xxlarge" data-icon="roi" data-color="navy"></div>
            </div>
            <div class="pillar-card__content">
                <div class="pillar-card__headline" id="benefits">
                    <h2 class="pillar-card__heading"><?php _e('Benefits', 'purposeful-media'); ?></h2>
                </div>
                <div class="pillar-card__paragraph">
                    <div class="pillar-card__text">
                        <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas integer eget aliquet nibh praesent tristique. Fermentum posuere urna nec tincidunt. Mi sit amet mauris commodo quis imperdiet. Massa ultricies mi quis hendrerit dolor magna.', 'purposeful-media'); ?></p>

                        <p><?php _e('Risus in hendrerit gravida rutrum quisque. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Malesuada nunc vel risus commodo. Vitae auctor eu augue ut lectus arcu bibendum. Vitae sapien pellentesque habitant morbi tristique senectus. Sit amet cursus sit amet. Egestas purus viverra accumsan in nisl nisi. Tempus egestas sed sed risus pretium quam.', 'purposeful-media'); ?></p>
                    </div>
                </div>
            </div>
        </div>
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
         ======================================== -->
    <section class="section-faq-group" id="faq" data-component="Section/FAQGroup" role="region" aria-label="<?php esc_attr_e('Frequently Asked Questions', 'purposeful-media'); ?>">
        <div class="faq-container">

            <!-- FAQ Card 1 -->
            <div class="card-faq" data-name="Card/FAQ">
                <div class="card-faq__question">
                    <h3 class="card-faq__question-text"><?php _e('What are the benefits of this service?', 'purposeful-media'); ?></h3>
                    <button class="card-faq__toggle" aria-label="<?php esc_attr_e('Toggle answer', 'purposeful-media'); ?>" aria-expanded="false">
                        <span class="card-faq__toggle-icon">+</span>
                    </button>
                </div>
                <div class="card-faq__answer">
                    <p class="card-faq__answer-text"><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'purposeful-media'); ?></p>
                </div>
            </div>

            <!-- FAQ Card 2 -->
            <div class="card-faq" data-name="Card/FAQ">
                <div class="card-faq__question">
                    <h3 class="card-faq__question-text"><?php _e('How long does the process take?', 'purposeful-media'); ?></h3>
                    <button class="card-faq__toggle" aria-label="<?php esc_attr_e('Toggle answer', 'purposeful-media'); ?>" aria-expanded="false">
                        <span class="card-faq__toggle-icon">+</span>
                    </button>
                </div>
                <div class="card-faq__answer">
                    <p class="card-faq__answer-text"><?php _e('The timeline varies depending on your specific needs, but typically ranges from 4-8 weeks for full implementation. We\'ll provide a detailed timeline during our initial consultation.', 'purposeful-media'); ?></p>
                </div>
            </div>

            <!-- FAQ Card 3 -->
            <div class="card-faq" data-name="Card/FAQ">
                <div class="card-faq__question">
                    <h3 class="card-faq__question-text"><?php _e('What makes your approach different?', 'purposeful-media'); ?></h3>
                    <button class="card-faq__toggle" aria-label="<?php esc_attr_e('Toggle answer', 'purposeful-media'); ?>" aria-expanded="false">
                        <span class="card-faq__toggle-icon">+</span>
                    </button>
                </div>
                <div class="card-faq__answer">
                    <p class="card-faq__answer-text"><?php _e('Our approach combines data-driven strategies with personalized service. We don\'t believe in one-size-fits-all solutions - every client gets a customized strategy based on their unique business goals.', 'purposeful-media'); ?></p>
                </div>
            </div>

            <!-- FAQ Card 4 -->
            <div class="card-faq" data-name="Card/FAQ">
                <div class="card-faq__question">
                    <h3 class="card-faq__question-text"><?php _e('Do you offer ongoing support?', 'purposeful-media'); ?></h3>
                    <button class="card-faq__toggle" aria-label="<?php esc_attr_e('Toggle answer', 'purposeful-media'); ?>" aria-expanded="false">
                        <span class="card-faq__toggle-icon">+</span>
                    </button>
                </div>
                <div class="card-faq__answer">
                    <p class="card-faq__answer-text"><?php _e('Yes, we provide comprehensive ongoing support packages. Our team is available for questions, optimization, and continuous improvement of your marketing programs.', 'purposeful-media'); ?></p>
                </div>
            </div>

            <!-- FAQ Card 5 -->
            <div class="card-faq" data-name="Card/FAQ">
                <div class="card-faq__question">
                    <h3 class="card-faq__question-text"><?php _e('What results can I expect?', 'purposeful-media'); ?></h3>
                    <button class="card-faq__toggle" aria-label="<?php esc_attr_e('Toggle answer', 'purposeful-media'); ?>" aria-expanded="false">
                        <span class="card-faq__toggle-icon">+</span>
                    </button>
                </div>
                <div class="card-faq__answer">
                    <p class="card-faq__answer-text"><?php _e('While results vary by industry and starting point, our clients typically see measurable improvements in engagement metrics within the first 90 days, with substantial ROI improvements by month 6.', 'purposeful-media'); ?></p>
                </div>
            </div>

        </div>
    </section>

    <!-- FAQ Accordion JavaScript -->
    <script>
        // Card/FAQ Component JavaScript
        (function() {
            // Get all FAQ items
            const faqCards = document.querySelectorAll('.card-faq');

            faqCards.forEach(card => {
                const toggle = card.querySelector('.card-faq__toggle');
                const answer = card.querySelector('.card-faq__answer');
                const icon = card.querySelector('.card-faq__toggle-icon');

                if (toggle && answer) {
                    toggle.addEventListener('click', function() {
                        // Check if this card is currently active
                        const isActive = card.classList.contains('active');

                        // Close all FAQ cards
                        faqCards.forEach(otherCard => {
                            otherCard.classList.remove('active');
                            const otherToggle = otherCard.querySelector('.card-faq__toggle');
                            const otherIcon = otherCard.querySelector('.card-faq__toggle-icon');
                            if (otherToggle) {
                                otherToggle.setAttribute('aria-expanded', 'false');
                            }
                            if (otherIcon) {
                                otherIcon.textContent = '+';
                            }
                        });

                        // If this card wasn't active, open it
                        if (!isActive) {
                            card.classList.add('active');
                            toggle.setAttribute('aria-expanded', 'true');
                            icon.textContent = '−';
                        }
                    });
                }
            });
        })();
    </script>

    <!-- ========================================
         BANNER SPACER: Your Next Step
         ======================================== -->
    <div class="card-banner-spacer" data-component="card-banner-spacer" data-variant="headline-subtitle" id="start">
        <div class="banner-spacer-content">
            <!-- Icon -->
            <div class="decorative-icon-display decorative-icon-display--xlarge" data-icon="contact" data-color="white"></div>

            <!-- Text Container: Headline + Subtitle -->
            <div class="banner-spacer-header">
                <h1 class="banner-headline"><?php _e('Your Next Step', 'purposeful-media'); ?></h1>
                <p class="banner-subtitle"><?php _e('Ready to transform your B2B marketing? Let\'s connect.', 'purposeful-media'); ?></p>
            </div>
        </div>
    </div>

    <!-- ========================================
         CONTENT 2-COLUMN GRAPHIC
         ======================================== -->
    <div class="content-2column-graphic">
        <!-- Background Image -->
        <div class="content-2column-graphic__background">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_2085055825.jpg"
                 alt=""
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
                           <?php _e('Ready to transform your marketing efforts?', 'purposeful-media'); ?>
                        </h2>
                    </div>
                    <p class="teaser-card__description">
                        <?php _e('Schedule a free consultation to discuss your specific challenges and opportunities.', 'purposeful-media'); ?>
                    </p>
                    <button class="teaser-card__button teaser-card__button--gold">
                        <span class="teaser-card__button-text"><?php _e('Schedule', 'purposeful-media'); ?></span>
                    </button>
                </div>
            </div>

            <!-- Right Column -->
            <div class="content-2column-graphic__column content-2column-graphic__column--right">
                <!-- Ready to Grow Card -->
                <div class="teaser-card">
                    <div class="teaser-card__headline">
                        <h2 class="teaser-card__title">
                            <?php _e('Have questions first?', 'purposeful-media'); ?>
                        </h2>
                    </div>
                    <p class="teaser-card__description">
                        <?php _e('Get in touch to start a conversation about how we can help your business grow.', 'purposeful-media'); ?>
                    </p>
                    <button class="teaser-card__button teaser-card__button--navy">
                        <span class="teaser-card__button-text"><?php _e('Get in Touch', 'purposeful-media'); ?></span>
                    </button>
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
