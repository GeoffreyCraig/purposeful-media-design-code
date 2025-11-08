<?php
/**
 * The main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * 
 * @package Purposeful_Media
 */

get_header();
?>

<!-- Simple Hero Banner -->
<section class="banner-headline-section">
    <div class="banner-headline-section__content">
        <h1 class="banner-headline">
            <?php
            if (is_home()) {
                echo esc_html__('Blog', 'purposeful-media');
            } elseif (is_archive()) {
                the_archive_title();
            } elseif (is_search()) {
                printf(esc_html__('Search Results for: %s', 'purposeful-media'), get_search_query());
            } else {
                echo esc_html__('Latest Posts', 'purposeful-media');
            }
            ?>
        </h1>
    </div>
</section>

<main class="main-content">
    <section class="text-block-section">
        <div class="text-block-content">
            <?php if (have_posts()) : ?>
                <div class="content-sections">
                    <?php
                    while (have_posts()) :
                        the_post();
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('content-section'); ?>>
                            <header class="entry-header">
                                <h2 class="section-heading">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="entry-meta">
                                    <time datetime="<?php echo get_the_date('c'); ?>" class="section-text">
                                        <?php echo get_the_date(); ?>
                                    </time>
                                </div>
                            </header>

                            <div class="entry-content">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium');
                                }
                                the_excerpt();
                                ?>
                            </div>

                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="btn btn-brand btn--medium">
                                    <?php esc_html_e('Read More', 'purposeful-media'); ?>
                                </a>
                            </footer>
                        </article>
                    <?php endwhile; ?>

                    <!-- Pagination -->
                    <div class="pagination">
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => __('&laquo; Previous', 'purposeful-media'),
                            'next_text' => __('Next &raquo;', 'purposeful-media'),
                        ));
                        ?>
                    </div>
                </div>

            <?php else : ?>
                <div class="no-results">
                    <h2 class="section-heading"><?php esc_html_e('Nothing Found', 'purposeful-media'); ?></h2>
                    <p class="section-text">
                        <?php esc_html_e('Sorry, no posts matched your criteria.', 'purposeful-media'); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();

