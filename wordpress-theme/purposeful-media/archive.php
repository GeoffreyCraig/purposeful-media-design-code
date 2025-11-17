<?php
/**
 * Template Name: Blog Archive
 * Description: Blog archive page showing all blog posts with Hero ATF Left
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="blog-page-wrapper">

    <!-- ========================================
         HERO SECTION: Hero ATF Left
         ACF INTEGRATION: v1.0 - 2025-11-17
         Field Group: ATF Hero Left-Aligned
         Fields: atf_hero_lh_headline, atf_hero_lh_description, 
                 atf_hero_lh_cta_text, atf_hero_lh_ta_link, 
                 atf_hero_lh_bg_image
         Fallbacks: All fields have intelligent defaults
         ======================================== -->
	
    <section class="hero-atf-left" id="heroATFLeft" aria-label="<?php esc_attr_e('Hero Section', 'purposeful-media'); ?>">
        <!-- Media Container -->
        <div class="hero-media-container" id="heroMediaContainer">
            <?php 
            // ACF Background Image with multiple format support
            $hero_bg = get_field('atf_hero_lh_bg_image');
            $img_url = '';
            $img_alt = esc_attr__('Blog insights and resources', 'purposeful-media');
            
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
                        $img_alt = esc_attr__('Blog insights and resources', 'purposeful-media');
                    }
                } else {
                    // Image URL format (string)
                    $img_url = esc_url($hero_bg);
                }
            }
            
            // Fallback to default image if no ACF image set
            if (empty($img_url)) {
                $img_url = get_template_directory_uri() . '/assets/images/shutterstock_2618933959.jpg';
            }
            ?>
            <img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" class="hero-media" loading="eager">
        </div>
        
        <!-- Content Container -->
        <div class="hero-content">
            <h1 class="hero-headline">
                <?php
                // Check for ACF headline override
                $custom_headline = get_field('atf_hero_lh_headline');
                
                if (!empty($custom_headline)) {
                    // Use ACF custom headline if provided
                    echo esc_html($custom_headline);
                } else {
                    // Fall back to smart archive conditional logic
                    if (is_category()) {
                        single_cat_title();
                    } elseif (is_tag()) {
                        single_tag_title();
                    } elseif (is_author()) {
                        printf(__('Posts by %s', 'purposeful-media'), get_the_author());
                    } elseif (is_date()) {
                        _e('Blog Archive', 'purposeful-media');
                    } else {
                        _e('B2B Marketing Insights & Resources', 'purposeful-media');
                    }
                }
                ?>
            </h1>
            
            <?php 
            // ACF Description with conditional display
            $hero_description = get_field('atf_hero_lh_description');
            if (!empty($hero_description)) : 
            ?>
                <p class="hero-subheadline">
                    <?php echo esc_html($hero_description); ?>
                </p>
            <?php else : ?>
                <p class="hero-subheadline">
                    <?php _e('Expert advice, strategies, and best practices to grow your business', 'purposeful-media'); ?>
                </p>
            <?php endif; ?>
            
            <?php 
            // ACF CTA with fallbacks
            $cta_text = get_field('atf_hero_lh_cta_text');
            $cta_link = get_field('atf_hero_lh_ta_link');
            
            if (empty($cta_text)) {
                $cta_text = __('Explore Articles', 'purposeful-media');
            }
            if (empty($cta_link)) {
                $cta_link = '#blog-posts';
            }
            ?>
            <a href="<?php echo esc_url($cta_link); ?>" class="hero-button" role="button" aria-label="<?php esc_attr_e('View blog posts', 'purposeful-media'); ?>">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
    </section>
    
    <!-- Hero Media Handler JavaScript -->
    <script>
        const HeroMediaHandler = {
            init() {
                this.container = document.getElementById('heroMediaContainer');
                this.hero = document.getElementById('heroATFLeft');
                const media = this.container.querySelector('img, video');
                if (!media || media.tagName === 'DIV') {
                    this.hero.classList.add('no-media');
                }
                const video = this.container.querySelector('video');
                if (video) {
                    this.setupVideo(video);
                }
            },
            setupVideo(video) {
                video.muted = true;
                video.loop = true;
                video.playsinline = true;
                const playVideo = () => {
                    video.play().catch(e => {
                        console.log('Autoplay prevented:', e);
                        document.addEventListener('click', () => {
                            video.play();
                        }, { once: true });
                    });
                };
                if (video.readyState >= 3) {
                    playVideo();
                } else {
                    video.addEventListener('loadeddata', playVideo);
                }
                if (window.matchMedia('(max-width: 767px)').matches) {
                    video.setAttribute('preload', 'metadata');
                }
            }
        };
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => HeroMediaHandler.init());
        } else {
            HeroMediaHandler.init();
        }
    </script>

    <!-- ========================================
         BLOG GROUP: FrontPage Mode
         ======================================== -->
    <section class="blog-group blog-group--frontpage-desktop" id="frontpage-demo">
        <div class="blog-group__cards" id="blog-posts">
            <div class="blog-group__inner">

                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        // Get post data
                        $categories = get_the_category();
                        $category = !empty($categories) ? esc_html($categories[0]->name) : __('Uncategorized', 'purposeful-media');
                        $date = get_the_date('M j, Y');
                        $author = get_the_author();
                ?>

                    <!-- Blog Card -->
                    <article class="blog-card" role="article" tabindex="0" aria-labelledby="post-<?php the_ID(); ?>">
                        <div class="blog-card__top">
                            <h3 id="post-<?php the_ID(); ?>" class="blog-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="blog-card__meta">
                                <?php printf('%s | %s | %s', $category, $date, $author); ?>
                            </div>
                        </div>
                        <div class="blog-card__content">
                            <p class="blog-card__excerpt">
                                <?php
                                if (has_excerpt()) {
                                    echo get_the_excerpt();
                                } else {
                                    echo wp_trim_words(get_the_content(), 30, '...');
                                }
                                ?>
                                <a href="<?php the_permalink(); ?>" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                            </p>
                        </div>
                    </article>

                <?php
                    endwhile;
                else :
                ?>
                    <!-- No Posts Found - Show Static Placeholder Cards -->

                    <!-- Blog Card 1 -->
                    <article class="blog-card" role="article" tabindex="0">
                        <div class="blog-card__top">
                            <h3 class="blog-card__title">
                                <?php _e('SEO Optimization for B2B Companies', 'purposeful-media'); ?>
                            </h3>
                            <div class="blog-card__meta">
                                <?php _e('SEO | Oct 27, 2025 | Charles Norton', 'purposeful-media'); ?>
                            </div>
                        </div>
                        <div class="blog-card__content">
                            <p class="blog-card__excerpt">
                                <?php _e('Unlock the power of SEO for your B2B business with our comprehensive strategy guide. Learn keyword research, on-page optimization, and link building strategies tailored for B2B companies.', 'purposeful-media'); ?> <a href="/blog/seo-optimization-b2b" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                            </p>
                        </div>
                    </article>

                    <!-- Blog Card 2 -->
                    <article class="blog-card" role="article" tabindex="0">
                        <div class="blog-card__top">
                            <h3 class="blog-card__title">
                                <?php _e('Marketing Automation Workflows', 'purposeful-media'); ?>
                            </h3>
                            <div class="blog-card__meta">
                                <?php _e('Automation | Oct 26, 2025 | Geoffrey Craig', 'purposeful-media'); ?>
                            </div>
                        </div>
                        <div class="blog-card__content">
                            <p class="blog-card__excerpt">
                                <?php _e('Discover how marketing automation can transform your B2B marketing efforts. Learn to implement automated workflows, nurture campaigns, and lead scoring systems that drive conversions.', 'purposeful-media'); ?> <a href="/blog/marketing-automation" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                            </p>
                        </div>
                    </article>

                    <!-- Blog Card 3 -->
                    <article class="blog-card" role="article" tabindex="0">
                        <div class="blog-card__top">
                            <h3 class="blog-card__title">
                                <?php _e('Content Repurposing Strategies', 'purposeful-media'); ?>
                            </h3>
                            <div class="blog-card__meta">
                                <?php _e('Content | Oct 25, 2025 | Dana Morris', 'purposeful-media'); ?>
                            </div>
                        </div>
                        <div class="blog-card__content">
                            <p class="blog-card__excerpt">
                                <?php _e('Learn how to repurpose your existing content across multiple channels to maximize ROI. From blog posts to social media, webinars to eBooks, discover strategies that multiply your content\'s impact.', 'purposeful-media'); ?> <a href="/blog/content-repurposing" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                            </p>
                        </div>
                    </article>

                    <!-- Blog Card 4 -->
                    <article class="blog-card" role="article" tabindex="0">
                        <div class="blog-card__top">
                            <h3 class="blog-card__title">
                                <?php _e('LinkedIn Marketing for B2B', 'purposeful-media'); ?>
                            </h3>
                            <div class="blog-card__meta">
                                <?php _e('Social | Oct 24, 2025 | Bill Robertson', 'purposeful-media'); ?>
                            </div>
                        </div>
                        <div class="blog-card__content">
                            <p class="blog-card__excerpt">
                                <?php _e('Master LinkedIn marketing for B2B success. Learn to optimize your company page, create engaging content, leverage LinkedIn ads, and build meaningful professional connections.', 'purposeful-media'); ?> <a href="/blog/linkedin-marketing" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                            </p>
                        </div>
                    </article>

                    <!-- Blog Card 5 (Hidden on mobile) -->
                    <article class="blog-card" role="article" tabindex="0">
                        <div class="blog-card__top">
                            <h3 class="blog-card__title">
                                <?php _e('Email Deliverability Guide', 'purposeful-media'); ?>
                            </h3>
                            <div class="blog-card__meta">
                                <?php _e('Email | Oct 23, 2025 | Geoffrey Craig', 'purposeful-media'); ?>
                            </div>
                        </div>
                        <div class="blog-card__content">
                            <p class="blog-card__excerpt">
                                <?php _e('Ensure your emails reach the inbox with our comprehensive deliverability guide. Learn authentication protocols, reputation management, and best practices for optimal email performance.', 'purposeful-media'); ?> <a href="/blog/email-deliverability" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                            </p>
                        </div>
                    </article>

                    <!-- Blog Card 6 (Hidden on mobile) -->
                    <article class="blog-card" role="article" tabindex="0">
                        <div class="blog-card__top">
                            <h3 class="blog-card__title">
                                <?php _e('Brand Voice Development', 'purposeful-media'); ?>
                            </h3>
                            <div class="blog-card__meta">
                                <?php _e('Branding | Oct 22, 2025 | Charles Norton', 'purposeful-media'); ?>
                            </div>
                        </div>
                        <div class="blog-card__content">
                            <p class="blog-card__excerpt">
                                <?php _e('Develop a distinctive brand voice that resonates with your B2B audience. Learn to create style guides, maintain consistency, and build authentic connections through your content.', 'purposeful-media'); ?> <a href="/blog/brand-voice" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                            </p>
                        </div>
                    </article>

                    <!-- Blog Card 7 (Hidden on mobile/tablet) -->
                    <article class="blog-card" role="article" tabindex="0">
                        <div class="blog-card__top">
                            <h3 class="blog-card__title">
                                <?php _e('HubSpot Implementation Guide', 'purposeful-media'); ?>
                            </h3>
                            <div class="blog-card__meta">
                                <?php _e('Tools | Oct 21, 2025 | Dana Morris', 'purposeful-media'); ?>
                            </div>
                        </div>
                        <div class="blog-card__content">
                            <p class="blog-card__excerpt">
                                <?php _e('Get the most from HubSpot with our implementation guide. From initial setup to advanced workflows, learn to leverage HubSpot\'s full potential for your B2B marketing needs.', 'purposeful-media'); ?> <a href="/blog/hubspot-implementation" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                            </p>
                        </div>
                    </article>

                    <!-- Blog Card 8 (Hidden on mobile/tablet) -->
                    <article class="blog-card" role="article" tabindex="0">
                        <div class="blog-card__top">
                            <h3 class="blog-card__title">
                                <?php _e('Marketing ROI Measurement', 'purposeful-media'); ?>
                            </h3>
                            <div class="blog-card__meta">
                                <?php _e('Analytics | Oct 20, 2025 | Bill Robertson', 'purposeful-media'); ?>
                            </div>
                        </div>
                        <div class="blog-card__content">
                            <p class="blog-card__excerpt">
                                <?php _e('Learn to measure and demonstrate marketing ROI with the KPIs that matter most for B2B businesses. From lead generation metrics to revenue attribution, master marketing analytics.', 'purposeful-media'); ?> <a href="/blog/marketing-roi" class="blog-card__read-more"><?php _e('[Read more]', 'purposeful-media'); ?></a>
                            </p>
                        </div>
                    </article>

                <?php
                endif;
                ?>

            </div>
        </div>

        <!-- Pagination -->
        <?php if (get_next_posts_link() || get_previous_posts_link()) : ?>
        <footer class="blog-group__footer">
            <?php
            // Previous/Next pagination
            if (get_previous_posts_link()) {
                previous_posts_link('← ' . __('Newer Posts', 'purposeful-media'));
            }
            if (get_next_posts_link()) {
                next_posts_link(__('Older Posts', 'purposeful-media') . ' →');
            }
            ?>
        </footer>
        <?php endif; ?>
    </section>

    <!-- Responsive Mode Management Script -->
    <script>
        // Responsive mode management for FrontPage
        (function() {
            const section = document.querySelector('.blog-group--frontpage-desktop');
            if (!section) return;

            function updateMode() {
                const width = window.innerWidth;

                // Remove all mode classes
                section.classList.remove('blog-group--frontpage-mobile', 'blog-group--frontpage-tablet', 'blog-group--frontpage-desktop');

                // Add appropriate class based on viewport
                if (width < 768) {
                    section.classList.add('blog-group--frontpage-mobile');
                } else if (width < 1150) {
                    section.classList.add('blog-group--frontpage-tablet');
                } else {
                    section.classList.add('blog-group--frontpage-desktop');
                }
            }

            // Update on load and resize
            updateMode();
            window.addEventListener('resize', updateMode);
        })();
    </script>

</main>

<?php get_footer(); ?>
