<?php
/**
 * Template Name: Default Page
 * Description: Standard interior page template with hero, wide text block, and CTA section
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="interior-wrapper">

    <!-- ========================================
         HERO SECTION: Hero Simple Default
         ======================================== -->
    <section class="hero-simple" role="banner" aria-label="<?php esc_attr_e('Page Header', 'purposeful-media'); ?>">
        <div class="hero-simple__content">
            <h1 class="hero-simple__headline"><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- ========================================
         SECTION 1: CONTENT (WIDE LAYOUT)
         ======================================== -->
    <section class="text-block text-block--wide" data-layout="wide">
        <div class="text-block__container">
            <article class="text-block__content">

                <?php
                // Start the WordPress Loop
                if (have_posts()) :
                    while (have_posts()) : the_post();

                        // Output the page content
                        the_content();

                    endwhile;
                else :
                    // If no content, show a message
                    ?>
                    <header class="text-block__header">
                        <h1 class="headline headline--h1"><?php _e('No Content Found', 'purposeful-media'); ?></h1>
                        <p class="paragraph paragraph--lead"><?php _e('This page does not have any content yet. Please add content in the WordPress editor.', 'purposeful-media'); ?></p>
                    </header>
                    <?php
                endif;
                ?>

            </article>
        </div>
    </section>

    <!-- Initialize text-block icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const icons = document.querySelectorAll('.ui-icon-display');
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
<!-- End of interior-wrapper -->

<?php get_footer(); ?>
