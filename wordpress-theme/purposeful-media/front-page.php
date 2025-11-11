<?php
/**
 * Template Name: Homepage (Front Page)
 * Description: Main homepage template with hero carousel, services, and featured resources
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="homepage-wrapper">

    <!-- ========================================
         HERO SECTION: Hero Carousel
         ======================================== -->
    <section class="hero-carousel" id="heroCarousel">
        <div class="carousel-container">
            <div class="carousel-track">
                <!-- Slide 1 - Video -->
                <div class="carousel-slide active" data-slide="0">
                    <div class="slide-background">
                        <video class="slide-video" muted loop playsinline autoplay>
                            <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/3427717167-preview.mp4" type="video/mp4">
                            <!-- Fallback image if video doesn't load -->
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slide-1-fallback.jpg" alt="<?php esc_attr_e('Digital Marketing Solutions', 'purposeful-media'); ?>">
                        </video>
                        <div class="slide-overlay"></div>
                    </div>
                    <div class="slide-content">
                        <div class="slide-eyebrow"><?php _e('Transform Your Business', 'purposeful-media'); ?></div>
                        <h1 class="slide-headline"><?php _e('DIGITAL MARKETING THAT DRIVES RESULTS', 'purposeful-media'); ?></h1>
                        <div class="slide-description">
                            <?php _e('We help B2B companies grow into thriving brands through strategic branding, design, and promotion', 'purposeful-media'); ?>
                        </div>
                        <a href="#services" class="slide-cta"><?php _e('Get Started', 'purposeful-media'); ?></a>
                    </div>
                </div>

                <!-- Slide 2 - Video -->
                <div class="carousel-slide" data-slide="1">
                    <div class="slide-background">
                        <video class="slide-video" muted loop playsinline>
                            <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/3432135943-preview.mp4" type="video/mp4">
                            <!-- Fallback image if video doesn't load -->
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slide-2-fallback.jpg" alt="<?php esc_attr_e('Marketing Strategies', 'purposeful-media'); ?>">
                        </video>
                        <div class="slide-overlay"></div>
                    </div>
                    <div class="slide-content">
                        <div class="slide-eyebrow"><?php _e('Proven Strategies', 'purposeful-media'); ?></div>
                        <h1 class="slide-headline"><?php _e('TURN PROSPECTS INTO BUSINESS VALUE', 'purposeful-media'); ?></h1>
                        <div class="slide-description">
                            <?php _e('Strategic email campaigns, thought leadership content, and webinar production that converts', 'purposeful-media'); ?>
                        </div>
                        <a href="#services" class="slide-cta"><?php _e('Learn More', 'purposeful-media'); ?></a>
                    </div>
                </div>

                <!-- Slide 3 - Video -->
                <div class="carousel-slide" data-slide="2">
                    <div class="slide-background">
                        <video class="slide-video" muted loop playsinline>
                            <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/3539535235-preview.mp4" type="video/mp4">
                            <!-- Fallback image if video doesn't load -->
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slide-3-fallback.jpg" alt="<?php esc_attr_e('Expert Marketing Support', 'purposeful-media'); ?>">
                        </video>
                        <div class="slide-overlay"></div>
                    </div>
                    <div class="slide-content">
                        <div class="slide-eyebrow"><?php _e('Expert Support', 'purposeful-media'); ?></div>
                        <h1 class="slide-headline"><?php _e('YOUR PARTNER IN GROWTH', 'purposeful-media'); ?></h1>
                        <div class="slide-description">
                            <?php _e('From struggling businesses to thriving brands - we provide the marketing resources you need', 'purposeful-media'); ?>
                        </div>
                        <a href="#contact" class="slide-cta"><?php _e('Start Today', 'purposeful-media'); ?></a>
                    </div>
                </div>
            </div>

            <!-- Navigation Controls -->
            <div class="carousel-controls">
                <button class="carousel-nav carousel-nav--prev" aria-label="<?php esc_attr_e('Previous slide', 'purposeful-media'); ?>" type="button">
                    <span class="ui-icon-display ui-icon-display--xlarge" data-icon="arrow-up" data-color="gray" data-direction="left"></span>
                </button>
                <button class="carousel-nav carousel-nav--next" aria-label="<?php esc_attr_e('Next slide', 'purposeful-media'); ?>" type="button">
                    <span class="ui-icon-display ui-icon-display--xlarge" data-icon="arrow-up" data-color="gray" data-direction="right"></span>
                </button>
            </div>

            <!-- Slide Indicators -->
            <div class="carousel-indicators">
                <button class="indicator active" data-slide="0" aria-label="<?php esc_attr_e('Go to slide 1', 'purposeful-media'); ?>" type="button"></button>
                <button class="indicator" data-slide="1" aria-label="<?php esc_attr_e('Go to slide 2', 'purposeful-media'); ?>" type="button"></button>
                <button class="indicator" data-slide="2" aria-label="<?php esc_attr_e('Go to slide 3', 'purposeful-media'); ?>" type="button"></button>
            </div>
        </div>
    </section>

    <!-- ========================================
         SECTION 1: SERVICES OVERVIEW
         ======================================== -->

    <!-- Headline Banner -->
    <div class="card-banner-spacer variant-headline-banner" id="services">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('OUR SERVICES', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- Text Block: Services Overview -->
    <section class="text-block text-block--narrative" data-layout="narrative">
        <div class="text-block__container">
            <article class="text-block__content">

                <!-- Header with H1 and Lead Paragraph -->
                <header class="text-block__header">
                    <h1 class="headline headline--h1"><?php _e('Comprehensive B2B Marketing Solutions', 'purposeful-media'); ?></h1>
                    <p class="paragraph paragraph--lead"><?php _e('Purposeful Media Promotions delivers integrated marketing services designed to accelerate your business growth. From email campaigns to webinar production, we provide the strategic support B2B companies need to succeed.', 'purposeful-media'); ?></p>
                </header>

                <!-- Email Marketing Section -->
                <section class="text-block__section">
                    <h2 class="headline headline--h2"><?php _e('Email Marketing Management', 'purposeful-media'); ?></h2>
                    <p class="paragraph paragraph--default"><?php _e('Our email marketing services help you connect with prospects and customers through targeted campaigns that drive engagement and conversions. We handle everything from strategy development to execution and analysis.', 'purposeful-media'); ?></p>

                    <!-- Icon Callout -->
                    <div class="text-block__icon-callout">
                        <div class="decorative-icon-display decorative-icon-display--medium" data-icon="email" data-color="navy"></div>
                        <div class="text-block__icon-callout-content">
                            <h4 class="headline headline--h4"><?php _e('Strategic Email Campaigns', 'purposeful-media'); ?></h4>
                            <p class="paragraph paragraph--default"><?php _e('We create email campaigns that resonate with your target audience, leveraging proven strategies to improve open rates, click-through rates, and conversion metrics.', 'purposeful-media'); ?></p>
                        </div>
                    </div>
                </section>

                <!-- Content Creation Section -->
                <section class="text-block__section">
                    <h2 class="headline headline--h2"><?php _e('Content Creation & Thought Leadership', 'purposeful-media'); ?></h2>
                    <p class="paragraph paragraph--default"><?php _e('Establish your organization as an industry leader with compelling content that educates, engages, and converts. Our content services span blog posts, whitepapers, case studies, and more.', 'purposeful-media'); ?></p>

                    <h3 class="headline headline--h3"><?php _e('What We Create', 'purposeful-media'); ?></h3>
                    <ul class="text-block__icon-list">
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default"><?php _e('Thought leadership articles and blog posts', 'purposeful-media'); ?></span>
                        </li>
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default"><?php _e('Whitepapers and eBooks', 'purposeful-media'); ?></span>
                        </li>
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default"><?php _e('Case studies and success stories', 'purposeful-media'); ?></span>
                        </li>
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default"><?php _e('Email newsletters and campaigns', 'purposeful-media'); ?></span>
                        </li>
                    </ul>
                </section>

                <!-- Webinar Production Section -->
                <section class="text-block__section">
                    <h2 class="headline headline--h2"><?php _e('Webinar Production Services', 'purposeful-media'); ?></h2>
                    <p class="paragraph paragraph--default"><?php _e('Transform your expertise into engaging webinar experiences that generate qualified leads and build relationships with prospects. We handle all aspects of webinar production from planning to post-event follow-up.', 'purposeful-media'); ?></p>

                    <!-- Process Steps -->
                    <h3 class="headline headline--h3"><?php _e('Our Webinar Process', 'purposeful-media'); ?></h3>
                    <ol class="text-block__list text-block__list--ordered">
                        <li class="text-block__list-item">
                            <span class="paragraph paragraph--default"><strong><?php _e('Planning & Strategy:', 'purposeful-media'); ?></strong> <?php _e('We work with you to define objectives, identify target audiences, and develop compelling topics.', 'purposeful-media'); ?></span>
                        </li>
                        <li class="text-block__list-item">
                            <span class="paragraph paragraph--default"><strong><?php _e('Promotion & Registration:', 'purposeful-media'); ?></strong> <?php _e('Our team creates promotional campaigns to drive registrations and maximize attendance.', 'purposeful-media'); ?></span>
                        </li>
                        <li class="text-block__list-item">
                            <span class="paragraph paragraph--default"><strong><?php _e('Production & Delivery:', 'purposeful-media'); ?></strong> <?php _e('We manage all technical aspects to ensure a smooth, professional webinar experience.', 'purposeful-media'); ?></span>
                        </li>
                        <li class="text-block__list-item">
                            <span class="paragraph paragraph--default"><strong><?php _e('Follow-Up & Analysis:', 'purposeful-media'); ?></strong> <?php _e('Post-event nurturing campaigns and detailed analytics help you maximize ROI.', 'purposeful-media'); ?></span>
                        </li>
                    </ol>
                </section>

            </article>
        </div>
    </section>

    <!-- Initialize text-block icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const icons = document.querySelectorAll('.decorative-icon-display, .ui-icon-display');
            icons.forEach(icon => {
                const iconName = icon.getAttribute('data-icon');
                const color = icon.getAttribute('data-color');
                if (iconName && color) {
                    icon.classList.add(`icon--${iconName}-${color}`);
                }
            });
        });
    </script>

    <!-- ========================================
         SECTION 2: FEATURED RESOURCES
         ======================================== -->

    <!-- Headline Banner: Resources Section -->
    <div class="card-banner-spacer variant-headline-banner" id="resources">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('RESOURCES', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- Headline Reverse: Featured Resource -->
    <div class="card-banner-spacer variant-headline-reverse">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('Featured Resource Download', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- Content 2-Column Resource -->
    <section class="content-2column-resource" role="region" aria-labelledby="resource-heading">
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
                    <h2 id="resource-heading" class="card-title">
                        <?php _e('Complete Guide to B2B Marketing ROI', 'purposeful-media'); ?>
                    </h2>

                    <p class="card-description">
                        <?php _e('Learn how to measure, track, and optimize your B2B marketing investments. This comprehensive guide provides frameworks, formulas, and real-world examples to help you demonstrate marketing value to stakeholders and improve campaign performance.', 'purposeful-media'); ?>
                    </p>

                    <a href="/resources/b2b-marketing-roi-guide" class="resource-button">
                        <?php _e('Download Now', 'purposeful-media'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Headline Reverse: Blog Section -->
    <div class="card-banner-spacer variant-headline-reverse">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('The Latest From Our Blog', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- Blog Group Teaser -->
    <section class="blog-group blog-group--teaser">
        <div class="blog-group__cards">
            <div class="blog-group__inner">

                <!-- Blog Card 1 -->
                <article class="blog-card" role="article" tabindex="0" aria-labelledby="blog-title-1">
                    <div class="blog-card__top">
                        <h3 id="blog-title-1" class="blog-card__title">
                            <?php _e('Email Marketing Best Practices for B2B Success', 'purposeful-media'); ?>
                        </h3>
                        <div class="blog-card__meta" aria-label="<?php esc_attr_e('Published in Marketing on October 27, 2025 by Geoffrey Craig', 'purposeful-media'); ?>">
                            <?php _e('Marketing | Oct 27, 2025 | Geoffrey Craig', 'purposeful-media'); ?>
                        </div>
                    </div>

                    <div class="blog-card__content">
                        <p class="blog-card__excerpt">
                            <?php _e('Discover proven strategies for improving email deliverability, engagement rates, and conversion metrics. Learn how to craft compelling subject lines that get opened and calls-to-action that drive results in your B2B campaigns.', 'purposeful-media'); ?> <a href="/blog/email-marketing-best-practices" class="blog-card__read-more" aria-label="<?php esc_attr_e('Read full article: Email Marketing Best Practices', 'purposeful-media'); ?>"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                        </p>
                    </div>
                </article>

                <!-- Blog Card 2 -->
                <article class="blog-card" role="article" tabindex="0" aria-labelledby="blog-title-2">
                    <div class="blog-card__top">
                        <h3 id="blog-title-2" class="blog-card__title">
                            <?php _e('Lead Magnet Creation Guide', 'purposeful-media'); ?>
                        </h3>
                        <div class="blog-card__meta" aria-label="<?php esc_attr_e('Published in Content on October 24, 2025 by Dana Morris', 'purposeful-media'); ?>">
                            <?php _e('Content | Oct 24, 2025 | Dana Morris', 'purposeful-media'); ?>
                        </div>
                    </div>

                    <div class="blog-card__content">
                        <p class="blog-card__excerpt">
                            <?php _e('Learn the secrets to creating lead magnets that your B2B audience can\'t resist. From choosing the right format to crafting compelling value propositions, this guide walks you through the entire process of developing high-converting lead generation assets.', 'purposeful-media'); ?> <a href="/blog/lead-magnet-creation" class="blog-card__read-more" aria-label="<?php esc_attr_e('Read full article: Lead Magnet Creation Guide', 'purposeful-media'); ?>"><?php _e('[Read more]', 'purposeful-media'); ?></a>
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
                            <?php _e('Master the art of producing engaging webinars that convert attendees into qualified leads. From technical setup to post-event follow-up, this comprehensive guide covers every aspect of successful webinar management.', 'purposeful-media'); ?> <a href="/blog/webinar-production" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                        </p>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- ========================================
         SECTION 3: YOUR NEXT STEP
         ======================================== -->

    <!-- Banner Spacer: Headline + Subtitle -->
    <div class="card-banner-spacer" data-component="card-banner-spacer" data-variant="headline-subtitle" id="start">
        <div class="banner-spacer-content">
            <!-- Icon -->
            <div class="decorative-icon-display decorative-icon-display--xlarge" data-icon="contact" data-color="white"></div>

            <!-- Text Container: Headline + Subtitle -->
            <div class="banner-spacer-header">
                <!-- Headline -->
                <h1 class="banner-headline"><?php _e('Your Next Step', 'purposeful-media'); ?></h1>

                <!-- Subtitle -->
                <p class="banner-subtitle"><?php _e('Ready to transform your B2B marketing? Let\'s connect.', 'purposeful-media'); ?></p>
            </div>
        </div>
    </div>

    <!-- Initialize banner icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const bannerIcons = document.querySelectorAll('.card-banner-spacer .decorative-icon-display');
            bannerIcons.forEach(icon => {
                const iconName = icon.getAttribute('data-icon');
                const color = icon.getAttribute('data-color');
                if (iconName && color) {
                    icon.classList.add(`icon--${iconName}-${color}`);
                }
            });
        });
    </script>

    <!-- Content 2-Column Graphic -->
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
                        <?php _e('Get in touch to start a conversation about how we can help your B2B business grow.', 'purposeful-media'); ?>
                    </p>
                    <button class="teaser-card__button teaser-card__button--navy">
                        <span class="teaser-card__button-text"><?php _e('Get in Touch', 'purposeful-media'); ?></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Content 2-Column Graphic: Button Click Handlers
        document.addEventListener('DOMContentLoaded', function() {
            const scheduleButton = document.querySelector('.teaser-card__button--gold');
            const contactButton = document.querySelector('.teaser-card__button--navy');

            if (scheduleButton) {
                scheduleButton.addEventListener('click', function() {
                    console.log('Schedule button clicked');
                    // Add scheduling action here (e.g., redirect to calendar page)
                });
            }

            if (contactButton) {
                contactButton.addEventListener('click', function() {
                    console.log('Contact button clicked');
                    // Add contact action here (e.g., redirect to contact page)
                });
            }
        });
    </script>

</main>
<!-- End of homepage-wrapper -->

<?php get_footer(); ?>
