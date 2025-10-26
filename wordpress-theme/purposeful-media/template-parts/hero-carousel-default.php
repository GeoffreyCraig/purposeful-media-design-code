<?php
/**
 * Fallback Hero Carousel Slides
 * 
 * Used when no ACF carousel slides are configured
 * 
 * @package Purposeful_Media
 */
?>

<!-- Slide 1 - Default -->
<div class="carousel-slide active" data-slide="0">
    <div class="slide-background">
        <video class="slide-video" muted loop playsinline>
            <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/3427717167-preview.mp4" type="video/mp4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_2492759463.jpg" alt="<?php esc_attr_e('Digital Marketing Solutions', 'purposeful-media'); ?>">
        </video>
        <div class="slide-overlay"></div>
    </div>
    <div class="slide-content">
        <div class="slide-eyebrow"><?php esc_html_e('Transform Your Business', 'purposeful-media'); ?></div>
        <h1 class="slide-headline"><?php esc_html_e('DIGITAL MARKETING THAT DRIVES RESULTS', 'purposeful-media'); ?></h1>
        <div class="slide-description">
            <?php esc_html_e('We help B2B companies grow into thriving brands through strategic branding, design, and promotion', 'purposeful-media'); ?>
        </div>
        <a href="#contact" class="slide-cta"><?php esc_html_e('Get Started', 'purposeful-media'); ?></a>
    </div>
</div>

<!-- Slide 2 - Default -->
<div class="carousel-slide" data-slide="1">
    <div class="slide-background">
        <video class="slide-video" muted loop playsinline>
            <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/3432135943-preview.mp4" type="video/mp4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_2454682663.jpg" alt="<?php esc_attr_e('Marketing Strategies', 'purposeful-media'); ?>">
        </video>
        <div class="slide-overlay"></div>
    </div>
    <div class="slide-content">
        <div class="slide-eyebrow"><?php esc_html_e('Proven Strategies', 'purposeful-media'); ?></div>
        <h1 class="slide-headline"><?php esc_html_e('TURN PROSPECTS INTO BUSINESS VALUE', 'purposeful-media'); ?></h1>
        <div class="slide-description">
            <?php esc_html_e('Strategic email campaigns, thought leadership content, and webinar production that converts', 'purposeful-media'); ?>
        </div>
        <a href="#services" class="slide-cta"><?php esc_html_e('Learn More', 'purposeful-media'); ?></a>
    </div>
</div>

<!-- Slide 3 - Default -->
<div class="carousel-slide" data-slide="2">
    <div class="slide-background">
        <video class="slide-video" muted loop playsinline>
            <source src="<?php echo get_template_directory_uri(); ?>/assets/videos/3539535235-preview.mp4" type="video/mp4">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_2618933959.jpg" alt="<?php esc_attr_e('Expert Marketing Support', 'purposeful-media'); ?>">
        </video>
        <div class="slide-overlay"></div>
    </div>
    <div class="slide-content">
        <div class="slide-eyebrow"><?php esc_html_e('Expert Support', 'purposeful-media'); ?></div>
        <h1 class="slide-headline"><?php esc_html_e('YOUR PARTNER IN GROWTH', 'purposeful-media'); ?></h1>
        <div class="slide-description">
            <?php esc_html_e('From struggling businesses to thriving brands - we provide the marketing resources you need', 'purposeful-media'); ?>
        </div>
        <a href="#contact" class="slide-cta"><?php esc_html_e('Start Today', 'purposeful-media'); ?></a>
    </div>
</div>

