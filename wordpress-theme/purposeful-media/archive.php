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
         ======================================== -->
    <section class="hero-atf-left" id="heroATFLeft" aria-label="<?php esc_attr_e('Hero Section', 'purposeful-media'); ?>">

        <!-- Media Container -->
        <div class="hero-media-container" id="heroMediaContainer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shutterstock_2618933959.jpg" alt="<?php esc_attr_e('Blog insights and resources', 'purposeful-media'); ?>" class="hero-media" loading="eager">
        </div>

        <!-- Content Container -->
        <div class="hero-content">
            <h1 class="hero-headline">
                <?php
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
                ?>
            </h1>
            <p class="hero-subheadline">
                <?php _e('Expert advice, strategies, and best practices to grow your business', 'purposeful-media'); ?>
            </p>
            <a href="#blog-posts" class="hero-button" role="button" aria-label="<?php esc_attr_e('View blog posts', 'purposeful-media'); ?>">
                <?php _e('Explore Articles', 'purposeful-media'); ?>
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
                    <!-- No Posts Found -->
                    <div class="blog-group__empty">
                        <p><?php _e('No blog posts found.', 'purposeful-media'); ?></p>
                    </div>
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
