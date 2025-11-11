<?php
/**
 * Template Name: Single Blog Post
 * Description: Individual blog post template with full content display
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="interior-wrapper">

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            // Get post data
            $categories = get_the_category();
            $category = !empty($categories) ? esc_html($categories[0]->name) : __('Uncategorized', 'purposeful-media');
            $date = get_the_date('F j, Y');
            $author = get_the_author();
    ?>

    <!-- ========================================
         HERO SECTION: Hero Simple Default
         ======================================== -->
    <section class="hero-simple" role="banner" aria-label="<?php esc_attr_e('Page Header', 'purposeful-media'); ?>">
        <div class="hero-simple__content">
            <h1 class="hero-simple__headline"><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- ========================================
         BLOG POST CONTENT
         ======================================== -->
    <article class="text-block text-block--wide" data-layout="wide" id="post-<?php the_ID(); ?>">
        <div class="text-block__container">
            <div class="text-block__content">

                <!-- Post Meta Information -->
                <div class="blog-post__meta" style="margin-bottom: 2rem; padding-bottom: 1rem; border-bottom: 1px solid #e0e0e0;">
                    <p class="paragraph paragraph--default" style="color: #666;">
                        <strong><?php _e('Category:', 'purposeful-media'); ?></strong> <?php echo $category; ?> |
                        <strong><?php _e('Published:', 'purposeful-media'); ?></strong> <?php echo $date; ?> |
                        <strong><?php _e('Author:', 'purposeful-media'); ?></strong> <?php echo $author; ?>
                    </p>
                </div>

                <!-- Post Content -->
                <div class="blog-post__content">
                    <?php the_content(); ?>
                </div>

                <!-- Post Tags -->
                <?php
                $tags = get_the_tags();
                if ($tags) :
                ?>
                <div class="blog-post__tags" style="margin-top: 2rem; padding-top: 1rem; border-top: 1px solid #e0e0e0;">
                    <p class="paragraph paragraph--default">
                        <strong><?php _e('Tags:', 'purposeful-media'); ?></strong>
                        <?php
                        $tag_links = array();
                        foreach ($tags as $tag) {
                            $tag_links[] = '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                        }
                        echo implode(', ', $tag_links);
                        ?>
                    </p>
                </div>
                <?php endif; ?>

                <!-- Post Navigation -->
                <div class="blog-post__navigation" style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid #e0e0e0; display: flex; justify-content: space-between; flex-wrap: wrap;">
                    <div class="blog-post__nav-prev" style="flex: 1; min-width: 200px;">
                        <?php
                        $prev_post = get_previous_post();
                        if ($prev_post) :
                        ?>
                            <p class="paragraph paragraph--default">
                                <strong><?php _e('← Previous Post', 'purposeful-media'); ?></strong><br>
                                <a href="<?php echo get_permalink($prev_post); ?>"><?php echo get_the_title($prev_post); ?></a>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="blog-post__nav-next" style="flex: 1; min-width: 200px; text-align: right;">
                        <?php
                        $next_post = get_next_post();
                        if ($next_post) :
                        ?>
                            <p class="paragraph paragraph--default">
                                <strong><?php _e('Next Post →', 'purposeful-media'); ?></strong><br>
                                <a href="<?php echo get_permalink($next_post); ?>"><?php echo get_the_title($next_post); ?></a>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Back to Blog Link -->
                <div class="blog-post__back" style="margin-top: 2rem; text-align: center;">
                    <a href="<?php echo get_post_type_archive_link('post'); ?>" class="blog-card__read-more" style="font-size: 1.125rem;">
                        <?php _e('← Back to Blog', 'purposeful-media'); ?>
                    </a>
                </div>

            </div>
        </div>
    </article>

    <?php
        endwhile;
    else :
    ?>

    <!-- No Post Found -->
    <section class="text-block text-block--wide" data-layout="wide">
        <div class="text-block__container">
            <article class="text-block__content">
                <header class="text-block__header">
                    <h1 class="headline headline--h1"><?php _e('Post Not Found', 'purposeful-media'); ?></h1>
                    <p class="paragraph paragraph--lead"><?php _e('Sorry, the blog post you\'re looking for doesn\'t exist.', 'purposeful-media'); ?></p>
                </header>
            </article>
        </div>
    </section>

    <?php
    endif;
    ?>

    <!-- ========================================
         YOUR NEXT STEP SECTION
         ======================================== -->
    <div class="card-banner-spacer" data-component="card-banner-spacer" data-variant="headline-subtitle" id="start">
        <div class="banner-spacer-content">
            <div class="decorative-icon-display decorative-icon-display--xlarge" data-icon="contact" data-color="white"></div>

            <div class="banner-spacer-header">
                <h1 class="banner-headline"><?php _e('Your Next Step', 'purposeful-media'); ?></h1>
                <p class="banner-subtitle"><?php _e('Ready to get started? Let\'s connect.', 'purposeful-media'); ?></p>
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
        <div class="content-2column-graphic__background">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_2085055825.jpg"
                 alt=""
                 class="content-2column-graphic__background-image">
        </div>

        <div class="content-2column-graphic__container">
            <div class="content-2column-graphic__column content-2column-graphic__column--left">
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

            <div class="content-2column-graphic__column content-2column-graphic__column--right">
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

<?php get_footer(); ?>
