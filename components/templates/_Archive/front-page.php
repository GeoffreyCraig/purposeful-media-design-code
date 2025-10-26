<?php
/**
 * Template Name: Homepage
 * Template for: Front Page (Homepage)
 * 
 * Purposeful Media Promotions - Phase 1 MVW
 * This is the main homepage template for WordPress
 * 
 * @package Purposeful_Media
 * @version 1.0.0
 */

get_header(); ?>

<!-- ==============================================
     HERO SECTION
     Organism: Hero Simple Default
     ============================================== -->
<section class="hero-simple" role="banner" aria-label="Page Header">
    <div class="hero-simple__content">
        <h1 class="hero-simple__headline">
            <?php 
            // Editable via WordPress Customizer
            echo get_theme_mod('homepage_hero_headline', 'Strategic Growth Through Purposeful Marketing'); 
            ?>
        </h1>
    </div>
</section>

<!-- ==============================================
     MAIN CONTENT
     ============================================== -->
<main id="main-content" role="main">
    
    <!-- ==============================================
         VALUE PROPOSITION SECTION
         Organism: Text Block (Narrative Layout)
         ============================================== -->
    <section class="text-block text-block--narrative" style="background-color: #FFFFFF; padding: 80px 0;">
        <div class="text-block__container">
            <article class="text-block__content">
                
                <header class="text-block__header" style="text-align: center; max-width: 800px; margin: 0 auto;">
                    <h2 class="headline headline--h2">Transform Your B2B Marketing Strategy</h2>
                    <p class="paragraph paragraph--lead">
                        We help B2B companies attract qualified leads, nurture relationships, and accelerate growth through strategic inbound marketing. Our proven methodology combines data-driven insights with purposeful execution.
                    </p>
                </header>
                
            </article>
        </div>
    </section>
    
    <!-- ==============================================
         SERVICES SECTION
         Organism: Text Block with Icon Grid
         ============================================== -->
    <section class="text-block text-block--pillar" style="background-color: #F6F6F7; padding: 80px 0;">
        <div class="text-block__container">
            <article class="text-block__content">
                
                <header class="text-block__header" style="text-align: center;">
                    <h2 class="headline headline--h2">The Inbound Methodology</h2>
                    <p class="paragraph paragraph--lead">
                        Our comprehensive approach to B2B marketing success
                    </p>
                </header>
                
                <!-- Icon Grid: Attract, Engage, Delight -->
                <div class="text-block__icon-grid">
                    <div class="text-block__icon-grid-item">
                        <div class="icon-display icon-display--large" data-icon="attract" data-color="navy"></div>
                        <h3 class="headline headline--h4">Attract</h3>
                        <p class="paragraph paragraph--default">
                            Draw in the right prospects with valuable content and strategic positioning that establishes your brand as a trusted industry authority.
                        </p>
                    </div>
                    
                    <div class="text-block__icon-grid-item">
                        <div class="icon-display icon-display--large" data-icon="engage" data-color="navy"></div>
                        <h3 class="headline headline--h4">Engage</h3>
                        <p class="paragraph paragraph--default">
                            Build meaningful relationships through personalized content and strategic nurturing that addresses specific pain points and business challenges.
                        </p>
                    </div>
                    
                    <div class="text-block__icon-grid-item">
                        <div class="icon-display icon-display--large" data-icon="delight" data-color="navy"></div>
                        <h3 class="headline headline--h4">Delight</h3>
                        <p class="paragraph paragraph--default">
                            Empower customers to succeed with ongoing support, valuable resources, and strategic guidance that drives long-term partnership growth.
                        </p>
                    </div>
                </div>
                
            </article>
        </div>
    </section>
    
    <!-- ==============================================
         KEY SERVICES SECTION
         Organism: Text Block with Icon List
         ============================================== -->
    <section class="text-block text-block--narrative" style="background-color: #FFFFFF; padding: 80px 0;">
        <div class="text-block__container">
            <article class="text-block__content">
                
                <header class="text-block__header">
                    <h2 class="headline headline--h2">How We Help You Grow</h2>
                    <p class="paragraph paragraph--lead">
                        Comprehensive inbound marketing services designed for B2B success
                    </p>
                </header>
                
                <section class="text-block__section">
                    <h3 class="headline headline--h3">Strategic Marketing Services</h3>
                    
                    <ul class="text-block__icon-list">
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default">
                                <strong>Inbound Strategy Development:</strong> Custom roadmaps aligned with your business goals, target audience, and competitive landscape
                            </span>
                        </li>
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default">
                                <strong>Content Creation & Optimization:</strong> High-quality blogs, whitepapers, case studies, and resources that attract and convert qualified leads
                            </span>
                        </li>
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default">
                                <strong>Marketing Automation:</strong> Streamlined lead nurturing, email campaigns, and workflow optimization for maximum efficiency
                            </span>
                        </li>
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default">
                                <strong>Analytics & Reporting:</strong> Data-driven insights that demonstrate ROI and inform strategic decision-making
                            </span>
                        </li>
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default">
                                <strong>SEO & Technical Optimization:</strong> Improve visibility, drive organic traffic, and ensure technical excellence across all digital properties
                            </span>
                        </li>
                        <li class="text-block__icon-list-item">
                            <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
                            <span class="paragraph paragraph--default">
                                <strong>HubSpot Implementation:</strong> Expert setup, integration, and optimization of the HubSpot platform for your unique business needs
                            </span>
                        </li>
                    </ul>
                </section>
                
            </article>
        </div>
    </section>
    
    <!-- ==============================================
         RESULTS/STATS SECTION
         Organism: Text Block with Highlight Boxes
         ============================================== -->
    <section class="text-block text-block--narrative" style="background-color: #1B1464; color: #FFFFFF; padding: 80px 0;">
        <div class="text-block__container">
            <article class="text-block__content">
                
                <header class="text-block__header" style="text-align: center;">
                    <h2 class="headline headline--h2" style="color: #FFFFFF;">Proven Results That Matter</h2>
                    <p class="paragraph paragraph--lead" style="color: #FFFFFF;">
                        Our strategic approach delivers measurable impact for B2B companies
                    </p>
                </header>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; margin: 60px 0;">
                    
                    <div style="text-align: center; padding: 40px 20px; background: rgba(255,255,255,0.1); border-radius: 8px;">
                        <div class="icon-display icon-display--medium" data-icon="roi" data-color="white" style="margin: 0 auto 20px;"></div>
                        <p class="paragraph paragraph--large" style="color: #D4AF37; font-weight: 700; margin-bottom: 8px;">300%</p>
                        <p class="paragraph paragraph--default" style="color: #FFFFFF;">Average increase in qualified leads</p>
                    </div>
                    
                    <div style="text-align: center; padding: 40px 20px; background: rgba(255,255,255,0.1); border-radius: 8px;">
                        <div class="icon-display icon-display--medium" data-icon="momentum" data-color="white" style="margin: 0 auto 20px;"></div>
                        <p class="paragraph paragraph--large" style="color: #D4AF37; font-weight: 700; margin-bottom: 8px;">2.5x</p>
                        <p class="paragraph paragraph--default" style="color: #FFFFFF;">Improvement in conversion rates</p>
                    </div>
                    
                    <div style="text-align: center; padding: 40px 20px; background: rgba(255,255,255,0.1); border-radius: 8px;">
                        <div class="icon-display icon-display--medium" data-icon="efficiency" data-color="white" style="margin: 0 auto 20px;"></div>
                        <p class="paragraph paragraph--large" style="color: #D4AF37; font-weight: 700; margin-bottom: 8px;">45%</p>
                        <p class="paragraph paragraph--default" style="color: #FFFFFF;">Reduction in customer acquisition cost</p>
                    </div>
                    
                </div>
                
            </article>
        </div>
    </section>
    
    <!-- ==============================================
         TESTIMONIAL/QUOTE SECTION
         Organism: Text Block with Blockquote
         ============================================== -->
    <section class="text-block text-block--narrative" style="background-color: #F6F6F7; padding: 80px 0;">
        <div class="text-block__container">
            <article class="text-block__content">
                
                <blockquote class="text-block__quote">
                    <div class="quote-container">
                        <p class="quote quote--large">
                            "Partnering with Purposeful Media transformed our approach to marketing. Their strategic guidance and execution excellence helped us generate 3x more qualified leads while significantly improving our close rates. The ROI speaks for itself."
                        </p>
                        <cite class="quote-attribution">
                            <span class="quote-attribution__name">Sarah Thompson</span>
                            <span class="quote-attribution__role">, VP of Marketing, TechCorp Industries</span>
                        </cite>
                    </div>
                </blockquote>
                
            </article>
        </div>
    </section>
    
    <!-- ==============================================
         FEATURED RESOURCES/BLOG SECTION
         WordPress-driven via REST API
         ============================================== -->
    <section class="section-blog-group" style="background-color: #FFFFFF; padding: 80px 0;">
        <div class="section-blog-group__container">
            
            <header class="section-blog-group__header" style="text-align: center; margin-bottom: 60px;">
                <h2 class="headline headline--h2">Latest Insights & Resources</h2>
                <p class="paragraph paragraph--lead">
                    Strategic guidance and expertise to help you grow
                </p>
            </header>
            
            <!-- Blog cards populated by blog-group-adapter.js -->
            <div class="section-blog-group__grid" id="homepage-blog-group">
                <?php
                // Fallback: Display latest posts if JavaScript fails
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 3,
                    'post_status' => 'publish'
                ));
                
                if (!empty($recent_posts)) {
                    echo '<div class="blog-grid">';
                    foreach ($recent_posts as $post) {
                        echo '<article class="blog-card">';
                        echo '<h3>' . esc_html($post['post_title']) . '</h3>';
                        echo '<p>' . wp_trim_words($post['post_content'], 20) . '</p>';
                        echo '<a href="' . get_permalink($post['ID']) . '">Read More</a>';
                        echo '</article>';
                    }
                    echo '</div>';
                } else {
                    echo '<p class="paragraph paragraph--default" style="text-align: center; color: #6C757D;">Loading latest articles...</p>';
                }
                ?>
            </div>
            
            <div style="text-align: center; margin-top: 40px;">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button button--primary button--large">
                    View All Articles
                </a>
            </div>
            
        </div>
    </section>
    
    <!-- ==============================================
         CALL TO ACTION SECTION
         Organism: Text Block with CTA
         ============================================== -->
    <section class="text-block text-block--narrative" style="background: linear-gradient(135deg, #1B1464 0%, #36448F 100%); color: #FFFFFF; padding: 100px 0;">
        <div class="text-block__container">
            <article class="text-block__content" style="text-align: center;">
                
                <div class="icon-display icon-display--xlarge" data-icon="strategy" data-color="white" style="margin: 0 auto 40px;"></div>
                
                <h2 class="headline headline--h2" style="color: #FFFFFF; margin-bottom: 24px;">
                    Ready to Transform Your Marketing?
                </h2>
                
                <p class="paragraph paragraph--lead" style="color: #FFFFFF; margin-bottom: 40px;">
                    Let's discuss how strategic inbound marketing can accelerate your business growth. Schedule a complimentary consultation to explore opportunities.
                </p>
                
                <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="button button--secondary button--large">
                        Schedule Consultation
                    </a>
                    <a href="<?php echo get_permalink(get_page_by_path('resources')); ?>" class="button button--ghost-secondary button--large">
                        Download Free Resources
                    </a>
                </div>
                
            </article>
        </div>
    </section>
    
</main>

<?php get_footer(); ?>


