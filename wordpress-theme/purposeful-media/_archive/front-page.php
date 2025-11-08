<?php
/**
 * Template Name: Homepage (Front Page)
 * 
 * This is the template for the homepage.
 * It displays the hero carousel, welcome section, text block,
 * featured resource, icon banner, and 2-column graphic sections.
 * 
 * All content is pulled from ACF fields for easy editing.
 * 
 * @package Purposeful_Media
 * @version 1.1.0
 */

get_header();
?>

<!-- ============================================
     HERO CAROUSEL SECTION
     ============================================ -->
<section class="hero-carousel" id="heroCarousel">
    <div class="carousel-container">
        <div class="carousel-track">
            <?php
            // Get carousel slides from ACF
            $slide_index = 0;
            $has_acf_slides = have_rows('carousel_slides');
            
            // Check if we have actual slide content (not just empty repeater)
            if ($has_acf_slides) :
                $temp_count = 0;
                while (have_rows('carousel_slides')) : the_row();
                    if (get_sub_field('headline') || get_sub_field('slide_video') || get_sub_field('fallback_image')) {
                        $temp_count++;
                    }
                endwhile;
                // Reset the loop
                $has_acf_slides = ($temp_count > 0);
            endif;
            
            if ($has_acf_slides) :
                while (have_rows('carousel_slides')) : the_row();
                    $video = get_sub_field('slide_video');
                    $fallback = get_sub_field('fallback_image');
                    $eyebrow = get_sub_field('eyebrow_text');
                    $headline = get_sub_field('headline');
                    $description = get_sub_field('description');
                    $cta_text = get_sub_field('cta_text');
                    $cta_link = get_sub_field('cta_link');
                    $active_class = ($slide_index === 0) ? 'active' : '';
            ?>
                <div class="carousel-slide <?php echo $active_class; ?>" data-slide="<?php echo $slide_index; ?>">
                    <div class="slide-background">
                        <?php if ($video) : ?>
                            <video class="slide-video" muted loop playsinline>
                                <source src="<?php echo esc_url($video); ?>" type="video/mp4">
                                <?php if ($fallback) : ?>
                                    <img src="<?php echo esc_url($fallback); ?>" alt="<?php echo esc_attr($headline); ?>">
                                <?php endif; ?>
                            </video>
                        <?php elseif ($fallback) : ?>
                            <img src="<?php echo esc_url($fallback); ?>" alt="<?php echo esc_attr($headline); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                        <?php endif; ?>
                        <div class="slide-overlay"></div>
                    </div>
                    <div class="slide-content">
                        <?php if ($eyebrow) : ?>
                            <div class="slide-eyebrow"><?php echo esc_html($eyebrow); ?></div>
                        <?php endif; ?>
                        
                        <?php if ($headline) : ?>
                            <h1 class="slide-headline"><?php echo esc_html($headline); ?></h1>
                        <?php endif; ?>
                        
                        <?php if ($description) : ?>
                            <div class="slide-description">
                                <?php echo esc_html($description); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($cta_text && $cta_link) : ?>
                            <a href="<?php echo esc_url($cta_link); ?>" class="slide-cta"><?php echo esc_html($cta_text); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
                    $slide_index++;
                endwhile;
                $total_slides = $slide_index;
            else :
                // Fallback: Show default slides if no ACF data
                get_template_part('template-parts/hero-carousel-default');
                $total_slides = 3; // Default has 3 slides
            endif;
            ?>
        </div>

        <!-- Navigation Controls -->
        <div class="carousel-controls">
            <button class="carousel-nav carousel-nav--prev" aria-label="<?php esc_attr_e('Previous slide', 'purposeful-media'); ?>" type="button">
                <div class="ui-icon-display ui-icon-display--xlarge" data-icon="arrow-up" data-color="gray" data-direction="left"></div>
            </button>
            <button class="carousel-nav carousel-nav--next" aria-label="<?php esc_attr_e('Next slide', 'purposeful-media'); ?>" type="button">
                <div class="ui-icon-display ui-icon-display--xlarge" data-icon="arrow-up" data-color="gray" data-direction="right"></div>
            </button>
        </div>

        <!-- Slide Indicators -->
        <div class="carousel-indicators">
            <?php for ($i = 0; $i < $total_slides; $i++) : ?>
                <button class="indicator <?php echo ($i === 0) ? 'active' : ''; ?>" data-slide="<?php echo $i; ?>" aria-label="<?php printf(esc_attr__('Go to slide %d', 'purposeful-media'), $i + 1); ?>" type="button"></button>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- ============================================
     BANNER HEADLINE - WELCOME
     ============================================ -->
<section class="banner-headline-section">
    <div class="banner-headline-section__content">
        <h1 class="banner-headline">
            <?php 
            $welcome_headline = get_field('welcome_headline');
            echo esc_html($welcome_headline ? $welcome_headline : __('Welcome', 'purposeful-media')); 
            ?>
        </h1>
    </div>
</section>

<!-- ============================================
     MAIN CONTENT AREA
     ============================================ -->
<main class="main-content">
    
    <!-- Text Block Section -->
    <section class="text-block-section">
        <div class="text-block-content">
            <!-- Main Heading -->
            <h1 class="main-heading">
                <?php 
                $main_heading = get_field('text_block_main_heading');
                echo esc_html($main_heading ? $main_heading : __('LOREM IPSUM DOLOR SIT AMET', 'purposeful-media')); 
                ?>
            </h1>
            
            <!-- Content Sections -->
            <div class="content-sections">
                <?php
                if (have_rows('text_block_sections')) :
                    while (have_rows('text_block_sections')) : the_row();
                        $section_heading = get_sub_field('section_heading');
                        $section_content = get_sub_field('section_content');
                ?>
                    <section class="content-section">
                        <?php if ($section_heading) : ?>
                            <h2 class="section-heading"><?php echo esc_html($section_heading); ?></h2>
                        <?php endif; ?>
                        
                        <?php if ($section_content) : ?>
                            <div class="section-text">
                                <?php echo wp_kses_post($section_content); ?>
                            </div>
                        <?php endif; ?>
                    </section>
                <?php
                    endwhile;
                else :
                    // Fallback content if no sections added
                ?>
                    <section class="content-section">
                        <h2 class="section-heading"><?php esc_html_e('Welcome to Purposeful Media Promotions', 'purposeful-media'); ?></h2>
                        <p class="section-text">
                            <?php esc_html_e('Add content sections using the Custom Fields below to populate this area.', 'purposeful-media'); ?>
                        </p>
                    </section>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    <!-- ============================================
         BANNER HEADLINE - FEATURED RESOURCE
         ============================================ -->
    <section class="banner-headline-section">
        <div class="banner-headline-section__content">
            <h2 class="banner-headline">
                <?php 
                $resource_banner = get_field('resource_banner_headline');
                echo esc_html($resource_banner ? $resource_banner : __('Featured Resource Download', 'purposeful-media')); 
                ?>
            </h2>
        </div>
    </section>
    
    <!-- ============================================
         FEATURED RESOURCE SECTION
         ============================================ -->
    <section class="featured-resource-section" role="region" aria-labelledby="resource-heading">
        <?php
        $resource_bg = get_field('resource_background_image');
        ?>
        <!-- Background Image (25% opacity at DesktopPlus/Desktop) -->
        <div class="section-background" aria-hidden="true" <?php if ($resource_bg) : ?>style="background-image: url('<?php echo esc_url($resource_bg); ?>');"<?php endif; ?>></div>
        
        <!-- Main Content Container -->
        <div class="resource-container">
            <!-- Left Column: Thumbnail Image -->
            <div class="thumbnail-column">
                <?php 
                $thumbnail = get_field('resource_thumbnail');
                $resource_heading = get_field('resource_heading');
                if ($thumbnail) :
                ?>
                    <img src="<?php echo esc_url($thumbnail); ?>" 
                         alt="<?php echo esc_attr($resource_heading); ?>" 
                         class="thumbnail-image"
                         loading="lazy">
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/four-hour-marketing-plan-TN.png" 
                         alt="<?php esc_attr_e('Resource Guide', 'purposeful-media'); ?>" 
                         class="thumbnail-image"
                         loading="lazy">
                <?php endif; ?>
            </div>
            
            <!-- Right Column: Teaser Card -->
            <div class="card-column">
                <div class="card-teaser">
                    <h2 id="resource-heading" class="card-teaser__heading">
                        <?php 
                        echo esc_html($resource_heading ? $resource_heading : __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor', 'purposeful-media')); 
                        ?>
                    </h2>
                    
                    <p class="card-teaser__body">
                        <?php 
                        $resource_description = get_field('resource_description');
                        echo esc_html($resource_description ? $resource_description : __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Turpis egestas integer eget aliquet nibh praesent tristique.', 'purposeful-media')); 
                        ?>
                    </p>
                    
                    <a href="<?php echo esc_url(get_field('resource_cta_link') ?: '#download'); ?>" class="card-teaser__button">
                        <?php 
                        $resource_cta = get_field('resource_cta_text');
                        echo esc_html($resource_cta ? $resource_cta : __('Download Guide', 'purposeful-media')); 
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ============================================
         ICON BANNER SECTION - YOUR NEXT STEP
         ============================================ -->
    <section class="icon-banner">
        <div class="icon-banner__content">
            <?php
            $icon = get_field('icon_banner_icon') ?: 'contact';
            $icon_color = get_field('icon_banner_color') ?: 'white';
            ?>
            <!-- Icon Display Element -->
            <div class="icon-display icon-display--xlarge" data-icon="<?php echo esc_attr($icon); ?>" data-color="<?php echo esc_attr($icon_color); ?>"></div>
            
            <!-- Headline Container -->
            <div class="icon-banner__text">
                <h2 class="icon-banner__title">
                    <?php 
                    $icon_title = get_field('icon_banner_title');
                    echo esc_html($icon_title ? $icon_title : __('YOUR NEXT STEP', 'purposeful-media')); 
                    ?>
                </h2>
                <p class="icon-banner__tagline">
                    <?php 
                    $icon_tagline = get_field('icon_banner_tagline');
                    echo esc_html($icon_tagline ? $icon_tagline : __('Book a free consultation or ask us any question.', 'purposeful-media')); 
                    ?>
                </p>
            </div>
        </div>
    </section>
    
    <!-- ============================================
         2-COLUMN GRAPHIC SECTION
         ============================================ -->
    <section class="section-2column-graphic" <?php 
        $two_col_bg = get_field('two_column_background');
        if ($two_col_bg) : ?>style="background-image: url('<?php echo esc_url($two_col_bg); ?>');"<?php endif; ?>>
        <div class="section-2column-graphic__content">
            <div class="section-2column-graphic__cards">
                <!-- Left/Top Card -->
                <div class="card-container card-container--left">
                    <div class="content-card">
                        <h3 class="card-heading">
                            <?php 
                            $left_heading = get_field('left_card_heading');
                            echo esc_html($left_heading ? $left_heading : __('Ready to transform your marketing efforts?', 'purposeful-media')); 
                            ?>
                        </h3>
                        <p class="card-text">
                            <?php 
                            $left_text = get_field('left_card_text');
                            echo esc_html($left_text ? $left_text : __('Schedule a free consultation to discuss your specific challenges and opportunities.', 'purposeful-media')); 
                            ?>
                        </p>
                        <a href="<?php echo esc_url(get_field('left_card_button_link') ?: home_url('/contact')); ?>" class="btn btn-accent btn--large">
                            <?php 
                            $left_btn = get_field('left_card_button_text');
                            echo esc_html($left_btn ? $left_btn : __('SCHEDULE', 'purposeful-media')); 
                            ?>
                        </a>
                    </div>
                </div>
                
                <!-- Right/Bottom Card -->
                <div class="card-container card-container--right">
                    <div class="content-card">
                        <h3 class="card-heading">
                            <?php 
                            $right_heading = get_field('right_card_heading');
                            echo esc_html($right_heading ? $right_heading : __('Have questions first?', 'purposeful-media')); 
                            ?>
                        </h3>
                        <p class="card-text">
                            <?php 
                            $right_text = get_field('right_card_text');
                            echo esc_html($right_text ? $right_text : __('Get in touch to start a conversation about how we can help your B2B business grow.', 'purposeful-media')); 
                            ?>
                        </p>
                        <a href="<?php echo esc_url(get_field('right_card_button_link') ?: home_url('/contact')); ?>" class="btn btn-brand btn--large">
                            <?php 
                            $right_btn = get_field('right_card_button_text');
                            echo esc_html($right_btn ? $right_btn : __('GET IN TOUCH', 'purposeful-media')); 
                            ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</main>

<?php
get_footer();
