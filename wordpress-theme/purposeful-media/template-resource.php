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
		 ========================================
		 ACF Integration: ATF Hero Simple Default
		 Date: November 19, 2025

		 Dynamic Fields:
		 - hero_simple_headline (Text)

		 Fallback Strategy:
		 If ACF field returns empty/null, displays the
		 WordPress page title via the_title().

		 Location: Interior, Resources
		 ======================================== -->
	<section class="hero-simple" role="banner" aria-label="<?php esc_attr_e('Page Header', 'purposeful-media'); ?>">
		<div class="hero-simple__content">
			<h1 class="hero-simple__headline">
				<?php 
					$headline = get_field('hero_simple_headline');
					echo esc_html($headline ? $headline : get_the_title());
				?>
			</h1>
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

<!-- ========================================
     CONTENT: Download Offer Section
     ========================================
     ACF Integration: Download Offer Section
     Date: November 18, 2025
     
     Dynamic Fields:
     - resource_background_image (Image)
     - resource_thumbnail (Image)
     - resource_card_title (Text)
     - resource_card_description (Text Area)
     - resource_button_text (Text)
     - resource_button_link (URL)
     
     Fallback Strategy:
     If ACF fields return empty/null, displays default
     B2B Marketing ROI Guide content.
     
     Location: Homepage, Pillar, Resources
     ======================================== -->
<!-- Content 2 Column Resource -->
<section class="content-2column-resource" role="region" aria-labelledby="featured-resource-heading">
    <?php
        $background = get_field('resource_background_image');
        $thumbnail = get_field('resource_thumbnail');
        $title = get_field('resource_card_title');
        $description = get_field('resource_card_description');
        $button_text = get_field('resource_button_text');
        $button_link = get_field('resource_button_link');
    ?>
    <div class="section-background" aria-hidden="true">
        <img src="<?php echo esc_url($background ? $background['url'] : get_template_directory_uri() . '/assets/images/shutterstock_1421446100.jpg'); ?>" 
             alt="" 
             loading="lazy">
    </div>
    <div class="content-container">
        <div class="column-group">
            <div class="left-column">
                <div class="image-wrapper">
                    <img
                        src="<?php echo esc_url($thumbnail ? $thumbnail['url'] : get_template_directory_uri() . '/assets/images/sample-ebook-cover.jpg'); ?>"
                        alt="<?php echo esc_attr($thumbnail ? $thumbnail['alt'] : __('Complete Guide to B2B Marketing ROI eBook Cover', 'purposeful-media')); ?>"
                        class="ebook-image"
                        loading="lazy"
                    >
                </div>
            </div>
            <div class="right-column">
                <h2 id="featured-resource-heading" class="card-title">
                    <?php echo esc_html($title ? $title : __('Complete Guide to B2B Marketing ROI', 'purposeful-media')); ?>
                </h2>
                <?php if ($description) : ?>
                    <div class="card-description">
                        <?php echo wp_kses_post(wpautop($description)); ?>
                    </div>
                <?php else : ?>
                    <p class="card-description">
                        <?php _e('Discover proven strategies to measure, track, and optimize your marketing investment returns. This comprehensive guide walks you through establishing KPIs, implementing analytics frameworks, and demonstrating clear value to stakeholders. Learn how leading B2B companies are achieving 3-5x ROI improvements through data-driven marketing optimization.', 'purposeful-media'); ?>
                    </p>
                    <p class="card-description">
                        <?php _e('Inside this guide, you\'ll find practical templates, calculation frameworks, and real-world case studies that show you exactly how to quantify your marketing impact and make strategic decisions based on solid data.', 'purposeful-media'); ?>
                    </p>
                <?php endif; ?>
                <a href="<?php echo esc_url($button_link ? $button_link : '/resources/b2b-marketing-roi-guide'); ?>" class="resource-button">
                    <?php echo esc_html($button_text ? $button_text : __('Download Free Guide', 'purposeful-media')); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Section Resources -->
    <!-- ACF INTEGRATION: v1.0 - 2025-11-18
         Field Group: Resources Grid Section
         Fields: resources_grid (Repeater), resource_thumbnail, resource_icon,
                 resource_heading, resource_description, resource_button_text, resource_button_link
         Fallbacks: Default resource cards if repeater empty -->
    <section class="section-resources" data-component="Section/Resources" role="region" aria-label="<?php esc_attr_e('Resource Library', 'purposeful-media'); ?>">
        <div class="section-resources__container">
            <div class="section-resources__grid">

                <?php 
                // Check if Resources Grid repeater has rows
                if (have_rows('section-resources__grid')) :               
                    while (have_rows('section-resources__grid')) : the_row();
                        $thumbnail = get_sub_field('card-resources__thumbnail');
                        $icon = get_sub_field('decorative-icon-display'); // Check your actual icon field name
                        $heading = get_sub_field('card-resources__heading');
                        $description = get_sub_field('card-resources__cta');
                        $button_text = get_sub_field('card-resources__button_text');
                        $button_link = get_sub_field('card-resources__button');
                        // Skip if heading is empty
                        if (empty($heading)) continue;
                        
                        // Process thumbnail image
                        $thumb_url = '';
                        $thumb_alt = esc_attr__('eBook Cover', 'purposeful-media');
                        
                        if ($thumbnail) {
                            if (is_array($thumbnail)) {
                                $thumb_url = esc_url($thumbnail['url']);
                                $thumb_alt = !empty($thumbnail['alt']) ? esc_attr($thumbnail['alt']) : $thumb_alt;
                            } elseif (is_numeric($thumbnail)) {
                                $thumb_url = wp_get_attachment_image_url($thumbnail, 'medium');
                                $alt_text = get_post_meta($thumbnail, '_wp_attachment_image_alt', true);
                                if (!empty($alt_text)) {
                                    $thumb_alt = esc_attr($alt_text);
                                }
                            } else {
                                $thumb_url = esc_url($thumbnail);
                            }
                        }
                        
                        // Fallback thumbnail
                        if (empty($thumb_url)) {
                            $thumb_url = get_template_directory_uri() . '/assets/images/sample-ebook-cover.jpg';
                        }
                        
                        // Default icon if not selected
                        if (empty($icon)) {
                            $icon = 'roi';
                        }
                        
                        // Default button text
                        if (empty($button_text)) {
                            $button_text = __('Download', 'purposeful-media');
                        }
                        
                        // Default button link
                        if (empty($button_link)) {
                            $button_link = '#';
                        }
                ?>

                <!-- Resource Card: <?php echo esc_html($heading); ?> -->
                <div class="card-resources" data-name="Card/Resources">
                    <img class="card-resources__thumbnail" src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>" onerror="this.style.display='none'">
                    <div class="card-resources__overlay"></div>
                    <div class="card-resources__content">
                        <div class="card-resources__header">
                            <div class="decorative-icon-display decorative-icon-display--large" data-icon="<?php echo esc_attr($icon); ?>" data-color="white"></div>
                            <h3 class="card-resources__heading"><?php echo esc_html($heading); ?></h3>
                        </div>
                        <p class="card-resources__cta">
                            <?php echo esc_html($description); ?>
                        </p>
                        <a href="<?php echo esc_url($button_link); ?>" class="card-resources__button">
                            <span class="card-resources__button-text"><?php echo esc_html($button_text); ?></span>
                        </a>
                    </div>
                </div>

                <?php 
                    endwhile;
                    
                else : 
                    // Fallback: Default resource cards if repeater is empty
                ?>

                <!-- Fallback Resource Card 1 -->
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

                <!-- Fallback Resource Card 2 -->
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

                <?php endif; ?>

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
        <!-- ACF INTEGRATION: v1.0 - 2025-11-18
             Field Group: Contact Offer Section
             Fields: content-contact__bg, content-contact__heading, content-contact__body,
                     content-contact__button, content-contact__button-text, content-contact__image
             Fallbacks: All fields have intelligent defaults -->
    <div class="content-2column-contact" data-component="content-2column-contact">
        <!-- Background Layer (Desktop/DesktopPlus only) -->
        <div class="content-2column-contact__background" aria-hidden="true">
            <div class="content-2column-contact__background-color"></div>
            <?php 
            // ACF Background Image with multiple format support
            $bg_image = get_field('content-contact__bg');
            $bg_url = '';
            
            if ($bg_image) {
                if (is_array($bg_image)) {
                    $bg_url = esc_url($bg_image['url']);
                } elseif (is_numeric($bg_image)) {
                    $bg_url = wp_get_attachment_image_url($bg_image, 'full');
                } else {
                    $bg_url = esc_url($bg_image);
                }
            }
            
            // Fallback to default background image
            if (empty($bg_url)) {
                $bg_url = get_template_directory_uri() . '/assets/images/shutterstock_2492759463.jpg';
            }
            ?>
            <img
                class="content-2column-contact__background-image"
                src="<?php echo $bg_url; ?>"
                alt=""
                loading="lazy"
            >
        </div>
        
        <!-- Column Group Container -->
        <div class="content-2column-contact__columns">
            <!-- Left Column: Card with Content -->
            <div class="content-2column-contact__card">
                <?php 
                // ACF Heading with fallback
                $heading = get_field('content-contact__heading');
                if (empty($heading)) {
                    $heading = __('Ready to put these resources into action?', 'purposeful-media');
                }
                ?>
                <h2 class="content-2column-contact__heading">
                    <?php echo esc_html($heading); ?>
                </h2>
                
                <?php 
                // ACF Body text with fallback
                $body = get_field('content-contact__body');
                if (empty($body)) {
                    $body = __('Our team is here to help you develop and execute strategies that drive real business results. Schedule a free consultation today to discuss your specific marketing challenges and opportunities.', 'purposeful-media');
                }
                ?>
                <p class="content-2column-contact__body">
                    <?php echo esc_html($body); ?>
                </p>
                
                <?php 
                // ACF Button with fallbacks
                $button_text = get_field('content-contact__button-text');
                $button_link = get_field('content-contact__button');
                
                if (empty($button_text)) {
                    $button_text = __('Get in Touch', 'purposeful-media');
                }
                if (empty($button_link)) {
                    $button_link = '/contact';
                }
                ?>
                <button class="content-2column-contact__button" type="button" onclick="window.location.href='<?php echo esc_url($button_link); ?>'">
                    <span class="content-2column-contact__button-text"><?php echo esc_html($button_text); ?></span>
                </button>
            </div>
            
            <!-- Right Column: Image -->
            <div class="content-2column-contact__image-wrapper">
                <?php 
                // ACF Content Image with multiple format support
                $content_image = get_field('content-contact__image');
                $img_url = '';
                $img_alt = esc_attr__('Professional woman working on tablet in modern office', 'purposeful-media');
                
                if ($content_image) {
                    if (is_array($content_image)) {
                        $img_url = esc_url($content_image['url']);
                        $img_alt = !empty($content_image['alt']) ? esc_attr($content_image['alt']) : $img_alt;
                    } elseif (is_numeric($content_image)) {
                        $img_url = wp_get_attachment_image_url($content_image, 'full');
                        $alt_text = get_post_meta($content_image, '_wp_attachment_image_alt', true);
                        if (!empty($alt_text)) {
                            $img_alt = esc_attr($alt_text);
                        }
                    } else {
                        $img_url = esc_url($content_image);
                    }
                }
                
                // Fallback to default content image
                if (empty($img_url)) {
                    $img_url = get_template_directory_uri() . '/assets/images/shutterstock_2494045679.jpg';
                }
                ?>
                <img
                    class="content-2column-contact__image"
                    src="<?php echo $img_url; ?>"
                    alt="<?php echo $img_alt; ?>"
                    loading="lazy"
                >
            </div>
        </div>
    </div>

</main>

<?php get_footer(); ?>
