<?php
/**
 * Template Name: Resource Library
 * Description: Resource library page with featured resource and resource card grid
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="resource-page-wrapper">

    <!-- ========================================
         HERO SECTION: Hero Simple Default
         ======================================== -->
    <section class="hero-simple" role="banner" aria-label="<?php esc_attr_e('Page Header', 'purposeful-media'); ?>">
        <div class="hero-simple__content">
            <h1 class="hero-simple__headline"><?php _e('B2B Marketing Resources', 'purposeful-media'); ?></h1>
        </div>
    </section>

    <!-- ========================================
         CONTENT SECTION 1: RESOURCES OVERVIEW
         ======================================== -->
    <section class="text-block text-block--wide" data-component="Text Block" role="region" aria-label="<?php esc_attr_e('Resources Overview', 'purposeful-media'); ?>">
        <div class="text-block__container">
            <div class="text-block__content">
                <div class="text-block__section">
                    <p class="text-block__paragraph">
                        <?php _e('Welcome to the Purposeful Media Resource Library. We\'ve curated a comprehensive collection of actionable resources designed specifically for B2B marketing professionals. Whether you\'re looking to optimize your marketing ROI, develop compelling content strategies, or master the latest digital marketing techniques, you\'ll find practical tools and insights here to help you achieve your goals.', 'purposeful-media'); ?>
                    </p>
                </div>
                <div class="text-block__section">
                    <p class="text-block__paragraph">
                        <?php _e('Our resources are developed from real-world experience working with B2B companies across diverse industries. Each guide, template, and framework has been tested and refined to deliver measurable results. Browse our library below to find the resources that will drive your marketing success.', 'purposeful-media'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================
         CONTENT SECTION 2: FEATURED RESOURCE
         ======================================== -->

    <!-- Headline Banner -->
    <div class="card-banner-spacer variant-headline-banner"
         data-component="card-banner-spacer"
         data-variant="headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('Featured Resource', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- Content 2 Column Resource -->
    <section class="content-2column-resource" role="region" aria-labelledby="featured-resource-heading">
        <div class="section-background" aria-hidden="true">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_1421446100.jpg" alt="" loading="lazy">
        </div>
        <div class="content-container">
            <div class="column-group">
                <div class="left-column">
                    <div class="image-wrapper">
                        <img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/sample-ebook-cover.jpg"
                            alt="<?php esc_attr_e('Complete Guide to B2B Marketing ROI eBook Cover', 'purposeful-media'); ?>"
                            class="ebook-image"
                            loading="lazy"
                        >
                    </div>
                </div>
                <div class="right-column">
                    <h2 id="featured-resource-heading" class="card-title">
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
         CONTENT SECTION 3: RESOURCE LIBRARY
         ======================================== -->

    <!-- Headline Banner -->
    <div class="card-banner-spacer variant-headline-banner"
         data-component="card-banner-spacer"
         data-variant="headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('Purposeful Media Resource Library', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- Section Resources -->
    <section class="section-resources" data-component="Section/Resources" role="region" aria-label="<?php esc_attr_e('Resource Library', 'purposeful-media'); ?>">
        <div class="section-resources__container">
            <div class="section-resources__grid">

                <!-- Resource Card 1: B2B Marketing ROI -->
                <div class="card-resources" data-name="Card/Resources">
                    <img class="card-resources__thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/sample-ebook-cover.jpg" alt="<?php esc_attr_e('eBook Cover', 'purposeful-media'); ?>" onerror="this.style.display='none'">
                    <div class="card-resources__overlay"></div>
                    <div class="card-resources__content">
                        <div class="card-resources__header">
                            <div class="decorative-icon-display decorative-icon-display--large" data-icon="roi" data-color="white"></div>
                            <h3 class="card-resources__heading"><?php _e('Complete Guide to B2B Marketing ROI', 'purposeful-media'); ?></h3>
                        </div>
                        <p class="card-resources__cta">
                            <?php _e('Learn proven strategies to measure and optimize your marketing investment returns.', 'purposeful-media'); ?>
                        </p>
                        <a href="/resources/b2b-marketing-roi-guide" class="card-resources__button">
                            <span class="card-resources__button-text"><?php _e('Download eBook', 'purposeful-media'); ?></span>
                        </a>
                    </div>
                </div>

                <!-- Resource Card 2: Email Marketing Strategy -->
                <div class="card-resources" data-name="Card/Resources">
                    <img class="card-resources__thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/sample-ebook-cover.jpg" alt="<?php esc_attr_e('eBook Cover', 'purposeful-media'); ?>" onerror="this.style.display='none'">
                    <div class="card-resources__overlay"></div>
                    <div class="card-resources__content">
                        <div class="card-resources__header">
                            <div class="decorative-icon-display decorative-icon-display--large" data-icon="strategy" data-color="white"></div>
                            <h3 class="card-resources__heading"><?php _e('Email Marketing Strategy Playbook', 'purposeful-media'); ?></h3>
                        </div>
                        <p class="card-resources__cta">
                            <?php _e('Master email campaigns that drive engagement and convert prospects to customers.', 'purposeful-media'); ?>
                        </p>
                        <a href="/resources/email-marketing-playbook" class="card-resources__button">
                            <span class="card-resources__button-text"><?php _e('Get the Guide', 'purposeful-media'); ?></span>
                        </a>
                    </div>
                </div>

                <!-- Resource Card 3: Webinar Production -->
                <div class="card-resources" data-name="Card/Resources">
                    <img class="card-resources__thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/sample-ebook-cover.jpg" alt="<?php esc_attr_e('eBook Cover', 'purposeful-media'); ?>" onerror="this.style.display='none'">
                    <div class="card-resources__overlay"></div>
                    <div class="card-resources__content">
                        <div class="card-resources__header">
                            <div class="decorative-icon-display decorative-icon-display--large" data-icon="webinar" data-color="white"></div>
                            <h3 class="card-resources__heading"><?php _e('Webinar Production Checklist', 'purposeful-media'); ?></h3>
                        </div>
                        <p class="card-resources__cta">
                            <?php _e('Everything you need to plan, produce, and promote successful B2B webinars.', 'purposeful-media'); ?>
                        </p>
                        <a href="/resources/webinar-checklist" class="card-resources__button">
                            <span class="card-resources__button-text"><?php _e('Download Checklist', 'purposeful-media'); ?></span>
                        </a>
                    </div>
                </div>

                <!-- Resource Card 4: Buyer Persona Template -->
                <div class="card-resources" data-name="Card/Resources">
                    <img class="card-resources__thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/sample-ebook-cover.jpg" alt="<?php esc_attr_e('eBook Cover', 'purposeful-media'); ?>" onerror="this.style.display='none'">
                    <div class="card-resources__overlay"></div>
                    <div class="card-resources__content">
                        <div class="card-resources__header">
                            <div class="decorative-icon-display decorative-icon-display--large" data-icon="persona" data-color="white"></div>
                            <h3 class="card-resources__heading"><?php _e('Buyer Persona Template', 'purposeful-media'); ?></h3>
                        </div>
                        <p class="card-resources__cta">
                            <?php _e('Build detailed buyer personas that drive targeted marketing strategies.', 'purposeful-media'); ?>
                        </p>
                        <a href="/resources/buyer-persona-template" class="card-resources__button">
                            <span class="card-resources__button-text"><?php _e('Get Template', 'purposeful-media'); ?></span>
                        </a>
                    </div>
                </div>

                <!-- Resource Card 5: Content Calendar -->
                <div class="card-resources" data-name="Card/Resources">
                    <img class="card-resources__thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/sample-ebook-cover.jpg" alt="<?php esc_attr_e('eBook Cover', 'purposeful-media'); ?>" onerror="this.style.display='none'">
                    <div class="card-resources__overlay"></div>
                    <div class="card-resources__content">
                        <div class="card-resources__header">
                            <div class="decorative-icon-display decorative-icon-display--large" data-icon="calendar" data-color="white"></div>
                            <h3 class="card-resources__heading"><?php _e('Content Calendar Template', 'purposeful-media'); ?></h3>
                        </div>
                        <p class="card-resources__cta">
                            <?php _e('Plan and organize your content strategy with our proven calendar framework.', 'purposeful-media'); ?>
                        </p>
                        <a href="/resources/content-calendar" class="card-resources__button">
                            <span class="card-resources__button-text"><?php _e('Download Template', 'purposeful-media'); ?></span>
                        </a>
                    </div>
                </div>

                <!-- Resource Card 6: Lead Scoring Model -->
                <div class="card-resources" data-name="Card/Resources">
                    <img class="card-resources__thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/images/sample-ebook-cover.jpg" alt="<?php esc_attr_e('eBook Cover', 'purposeful-media'); ?>" onerror="this.style.display='none'">
                    <div class="card-resources__overlay"></div>
                    <div class="card-resources__content">
                        <div class="card-resources__header">
                            <div class="decorative-icon-display decorative-icon-display--large" data-icon="analytics" data-color="white"></div>
                            <h3 class="card-resources__heading"><?php _e('Lead Scoring Model Guide', 'purposeful-media'); ?></h3>
                        </div>
                        <p class="card-resources__cta">
                            <?php _e('Implement effective lead scoring to prioritize and convert your best prospects.', 'purposeful-media'); ?>
                        </p>
                        <a href="/resources/lead-scoring-guide" class="card-resources__button">
                            <span class="card-resources__button-text"><?php _e('Get the Guide', 'purposeful-media'); ?></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Initialize Resource Card Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const resourceIcons = document.querySelectorAll('.card-resources .decorative-icon-display');
            resourceIcons.forEach(icon => {
                const iconName = icon.getAttribute('data-icon');
                const color = icon.getAttribute('data-color');
                if (iconName && color) {
                    icon.classList.add(`icon--${iconName}-${color}`);
                }
            });
        });
    </script>

    <!-- ========================================
         CONTENT SECTION 4: CONTACT CTA
         ======================================== -->

    <!-- Banner Spacer: Your Next Step -->
    <div class="card-banner-spacer" data-component="card-banner-spacer" data-variant="headline-subtitle" id="start">
        <div class="banner-spacer-content">
            <div class="decorative-icon-display decorative-icon-display--xlarge" data-icon="contact" data-color="white"></div>

            <div class="banner-spacer-header">
                <h1 class="banner-headline"><?php _e('Your Next Step', 'purposeful-media'); ?></h1>
                <p class="banner-subtitle"><?php _e('Need help implementing these strategies? Let\'s talk.', 'purposeful-media'); ?></p>
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

    <!-- ========================================
         CONTENT SECTION 4: START THE CONVERSATION
         ======================================== -->

    <!-- Headline Banner -->
    <div class="card-banner-spacer variant-headline-banner"
         data-component="card-banner-spacer"
         data-variant="headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('Start the Conversation', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <!-- Content 2 Column Contact -->
    <div class="content-2column-contact" data-component="content-2column-contact">
        <!-- Background Layer (Desktop/DesktopPlus only) -->
        <div class="content-2column-contact__background" aria-hidden="true">
            <div class="content-2column-contact__background-color"></div>
            <img
                class="content-2column-contact__background-image"
                src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_2492759463.jpg"
                alt=""
                loading="lazy"
            >
        </div>

        <!-- Column Group Container -->
        <div class="content-2column-contact__columns">
            <!-- Left Column: Card with Content -->
            <div class="content-2column-contact__card">
                <h2 class="content-2column-contact__heading">
                    <?php _e('Ready to put these resources into action?', 'purposeful-media'); ?>
                </h2>
                <p class="content-2column-contact__body">
                    <?php _e('Our team is here to help you develop and execute strategies that drive real business results. Schedule a free consultation today to discuss your specific marketing challenges and opportunities.', 'purposeful-media'); ?>
                </p>
                <button class="content-2column-contact__button" type="button" onclick="window.location.href='/contact'">
                    <span class="content-2column-contact__button-text"><?php _e('Get in Touch', 'purposeful-media'); ?></span>
                </button>
            </div>

            <!-- Right Column: Image -->
            <div class="content-2column-contact__image-wrapper">
                <img
                    class="content-2column-contact__image"
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_2494045679.jpg"
                    alt="<?php esc_attr_e('Professional woman working on tablet in modern office', 'purposeful-media'); ?>"
                    loading="lazy"
                >
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>
