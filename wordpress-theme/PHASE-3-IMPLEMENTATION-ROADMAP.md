# WordPress Theme Phase 3: Template Conversions - Implementation Roadmap

**Created:** November 8, 2025
**Status:** 📋 READY FOR IMPLEMENTATION
**Prerequisites:** Phase 1 ✅ Complete, Phase 2 ✅ Complete

---

## Overview

Phase 3 converts all 6 HTML production templates to WordPress PHP templates. This roadmap provides step-by-step instructions, code examples, ACF field structures, and testing procedures for each template.

**Estimated Time:** 4-6 hours total (40-60 minutes per template)

---

## Template Conversion Checklist

### Templates to Convert:

1. ✅ **Homepage** - `homepage-template.html` → `front-page.php` (Priority 1)
2. ⏳ **Pillar Page** - `pillar-page-template.html` → `template-pillar-page.php` (Priority 2)
3. ⏳ **Interior Page** - `interior-page-template.html` → `page.php` (Priority 3)
4. ⏳ **About/Contact** - `about-contact-page-template.html` → `template-about-contact.php` (Priority 4)
5. ⏳ **Blog** - `blog-page-template.html` → `template-blog.php` + `archive.php` (Priority 5)
6. ⏳ **Resource** - `resource-page-template.html` → `template-resource.php` (Priority 6)

---

## General Conversion Process

### For Every Template:

**Step 1: Preparation**

1. Open the source HTML template file
2. Identify the main content section (between header and footer)
3. Note the wrapper class name (e.g., `homepage-wrapper`, `pillar-page-wrapper`)
4. List all sections/components used
5. Create new PHP file in theme root

**Step 2: Create Template Header**

```php
<?php
/**
 * Template Name: [Template Name]
 * Description: [Brief description]
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>
```

**Step 3: Extract Main Content**
1. Copy HTML from `<main class="[wrapper-class]">` to `</main>`
2. Paste into PHP template after `get_header();`
3. Keep the wrapper class intact for DesktopPlus containerization

**Step 4: Add Template Footer**
```php
<?php get_footer(); ?>
```

**Step 5: WordPress Integration**
1. Replace static asset paths with `get_template_directory_uri()`
2. Replace hardcoded text with WordPress functions where appropriate
3. Add translation functions (`_e()`, `esc_attr_e()`) for user-facing text
4. Keep placeholder content as-is initially (can add ACF later)

**Step 6: Testing**
1. Activate theme in WordPress
2. Create/assign page to template
3. Test at all 4 breakpoints
4. Verify all CSS/JS loads correctly
5. Check browser console for errors

---

## Template 1: Homepage (front-page.php)

### Source File:
`/components/templates/homepage-template.html` (1,055 lines)

### Structure:
```
<main class="homepage-wrapper">
    1. Hero Carousel (3 video slides)
    2. Headline Banner ("OUR SERVICES")
    3. Text Block (Services Overview - narrative layout)
    4. Headline Banner ("FEATURED RESOURCES")
    5. Content-2Column-Resource
    6. Headline Banner ("YOUR NEXT STEP")
    7. Icon Banner
    8. Content-2Column-Graphic
</main>
```

### Components Used:
- `hero-carousel` (organisms-heroes.css)
- `card-banner-spacer variant-headline-banner` (atoms-banner-spacer.css)
- `text-block text-block--narrative` (organisms-text-block.css)
- `content-2column-resource` (organisms-content-2column-resource.css)
- `icon-banner` (production-molecules.css)
- `content-2column-graphic` (organisms-content-2column-graphic.css)

### CSS Dependencies (Auto-loaded via enqueue.php):
```php
// Conditionally loaded when is_front_page() returns true:
- organisms-heroes.css
- organisms-text-block.css
- organisms-content-2column-graphic.css
```

### JavaScript Dependencies:
- `hero-carousel.js` (auto-loaded)
- `main.js` (auto-loaded)

### Conversion Steps:

**1. Create front-page.php:**
```php
<?php
/**
 * Template Name: Homepage (Front Page)
 * Description: Main homepage template with hero carousel, services, and featured resources
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="homepage-wrapper">

    <!-- Hero Carousel Section -->
    <section class="hero-carousel" id="heroCarousel">
        <!-- Copy carousel HTML from homepage-template.html lines 260-344 -->
    </section>

    <!-- Services Overview Section -->
    <div class="card-banner-spacer variant-headline-banner" id="services">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('OUR SERVICES', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <section class="text-block text-block--narrative" data-layout="narrative">
        <!-- Copy text block HTML from homepage-template.html lines 358-448 -->
    </section>

    <!-- Featured Resources Section -->
    <div class="card-banner-spacer variant-headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('FEATURED RESOURCES', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <section class="content-2column-resource">
        <!-- Copy content-2column-resource HTML from homepage-template.html lines 454-576 -->
    </section>

    <!-- Your Next Step Section -->
    <div class="card-banner-spacer variant-headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('YOUR NEXT STEP', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <section class="icon-banner">
        <!-- Copy icon-banner HTML from homepage-template.html lines 581-685 -->
    </section>

    <section class="content-2column-graphic">
        <!-- Copy content-2column-graphic HTML from homepage-template.html lines 687-1005 -->
    </section>

</main>

<?php get_footer(); ?>
```

**2. Replace Asset Paths:**
Find and replace:
- `../../assets/` → `<?php echo get_template_directory_uri(); ?>/assets/`
- `../../styles/` → (Remove - styles auto-loaded via enqueue.php)
- `../../scripts/` → (Remove - scripts auto-loaded via enqueue.php)

**3. WordPress Text Functions (Optional):**
Wrap user-facing text in `_e()` or `__()` for translation support.

### ACF Fields for Dynamic Content (Optional - Future Enhancement):

```php
// Hero Carousel Slides (Repeater)
carousel_slides
├─ slide_video (File)
├─ fallback_image (Image)
├─ slide_eyebrow (Text)
├─ slide_headline (Text)
├─ slide_description (Textarea)
├─ slide_cta_text (Text)
└─ slide_cta_link (URL)

// Services Text Block
services_main_heading (Text)
services_lead_paragraph (Textarea)
services_sections (Repeater)
├─ section_heading (Text)
├─ section_content (WYSIWYG)
└─ section_icon (Select: email, webinar, content, etc.)

// Featured Resource
resource_banner_headline (Text)
resource_thumbnail (Image)
resource_heading (Text)
resource_description (Textarea)
resource_cta_text (Text)
resource_cta_link (URL)
resource_background_image (Image)

// Icon Banner
icon_banner_icon (Select)
icon_banner_color (Select)
icon_banner_title (Text)
icon_banner_tagline (Textarea)

// CTA Section
cta_background_image (Image)
cta_left_card_heading (Text)
cta_left_card_text (Textarea)
cta_left_card_button_text (Text)
cta_left_card_button_link (URL)
cta_right_card_heading (Text)
cta_right_card_text (Textarea)
cta_right_card_button_text (Text)
cta_right_card_button_link (URL)
```

### Testing Checklist:
- [ ] Template appears in WordPress admin (Pages → Add New → Template dropdown)
- [ ] Hero carousel displays and auto-plays
- [ ] Hero carousel navigation works (arrows + indicators)
- [ ] All headline banners display correctly
- [ ] Text block content formats properly
- [ ] Icons display correctly (decorative + UI icons)
- [ ] Featured resource section renders properly
- [ ] Icon banner displays with correct icon/color
- [ ] 2-column graphic section displays correctly
- [ ] All CTAs link correctly
- [ ] Responsive at all 4 breakpoints
- [ ] No CSS console errors
- [ ] No JavaScript console errors

---

## Template 2: Pillar Page (template-pillar-page.php)

### Source File:
`/components/templates/pillar-page-template.html` (1,586 lines)

### Structure:
```
<main class="page-wrapper">
    1. Hero Simple (pillar intro)
    2. Sticky Menu (navigation)
    3. Pillar Card (overview section)
    4. Multiple Text Block sections
    5. Content-2Column-Resource
    6. FAQ Section
    7. Content-2Column-Contact
</main>
```

### Components Used:
- `hero-simple` (organisms-heroes.css)
- `pm-sticky-menu` (production-molecules.css)
- `pillar-card` (production-molecules.css)
- `text-block` (organisms-text-block.css)
- `content-2column-resource` (organisms-content-2column-resource.css)
- `faq-group` (organisms-section-faq-group.css)
- `content-2column-contact` (organisms-content-2column-contact-integrated.css)

### CSS Dependencies (Auto-loaded):
```php
// When is_page_template('template-pillar-page.php'):
- organisms-heroes.css
- organisms-text-block.css
- organisms-content-2column-resource.css
- organisms-section-faq-group.css
```

### JavaScript Dependencies:
- `main.js` (navigation)
- `section-faq-group.js` (FAQ accordion)
- Custom sticky menu script (embedded in template)

### Conversion Steps:

**1. Create template-pillar-page.php:**
```php
<?php
/**
 * Template Name: Pillar Page
 * Description: In-depth topic page with sticky navigation, multiple sections, and resources
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="page-wrapper">

    <!-- Hero Simple -->
    <section class="hero-simple">
        <!-- Copy from pillar-page-template.html -->
    </section>

    <!-- Sticky Menu Navigation -->
    <nav class="pm-sticky-menu" id="stickyMenu">
        <!-- Copy from pillar-page-template.html -->
    </nav>

    <!-- Pillar Card Overview -->
    <section class="pillar-section" id="overview">
        <!-- Copy from pillar-page-template.html -->
    </section>

    <!-- Content Sections (multiple text blocks) -->
    <!-- Copy all sections from pillar-page-template.html -->

    <!-- FAQ Section -->
    <section id="faq">
        <!-- Copy from pillar-page-template.html -->
    </section>

    <!-- Contact CTA -->
    <section class="content-2column-contact">
        <!-- Copy from pillar-page-template.html -->
    </section>

</main>

<script>
    // Sticky Menu JavaScript - Copy from pillar-page-template.html
</script>

<?php get_footer(); ?>
```

**2. Special Considerations:**
- **Sticky Menu:** Requires inline JavaScript for scroll detection and active state
- **FAQ Accordion:** Uses section-faq-group.js (auto-loaded by enqueue.php)
- **Multiple Anchors:** Keep all ID attributes for sticky menu navigation
- **Return Button:** Included in footer.php (no need to add)

### ACF Fields (Optional):

```php
// Hero
pillar_hero_heading (Text)
pillar_hero_description (Textarea)
pillar_hero_icon (Select)

// Sticky Menu
pillar_sections (Repeater)
├─ section_id (Text: for anchor links)
├─ section_label (Text: menu item text)
└─ section_order (Number)

// Overview Card
pillar_overview_heading (Text)
pillar_overview_content (WYSIWYG)
pillar_overview_cta_text (Text)
pillar_overview_cta_link (URL)

// Content Sections (Repeater)
pillar_content_sections
├─ section_id (Text)
├─ section_heading (Text)
├─ section_content (WYSIWYG)
└─ section_layout (Select: default, narrative, columns)

// FAQ Section
pillar_faq_items (Repeater)
├─ faq_question (Text)
└─ faq_answer (WYSIWYG)

// Contact CTA
pillar_contact_heading (Text)
pillar_contact_text (WYSIWYG)
pillar_contact_image (Image)
```

### Testing Checklist:
- [ ] Template appears in WordPress
- [ ] Hero section displays correctly
- [ ] Sticky menu appears after scrolling past hero
- [ ] Sticky menu highlights active section correctly
- [ ] Sticky menu scrolls to sections when clicked
- [ ] All content sections display properly
- [ ] FAQ accordion expands/collapses correctly
- [ ] Contact form displays (if integrated)
- [ ] Return-to-top button works
- [ ] Responsive at all breakpoints

---

## Template 3: Interior Page (page.php)

### Source File:
`/components/templates/interior-page-template.html` (854 lines)

### Structure:
```
<main class="page-wrapper">
    1. Hero Simple
    2. Text Block (default layout)
    3. Content-2Column-Graphic (2 instances)
    4. Headline Banner
</main>
```

### Components Used:
- `hero-simple` (organisms-heroes.css)
- `text-block text-block--default` (organisms-text-block.css)
- `content-2column-graphic` (organisms-content-2column-graphic.css)
- `card-banner-spacer variant-headline-banner` (atoms-banner-spacer.css)

### CSS Dependencies:
```php
// When is_page_template('page.php'):
- organisms-heroes.css
- organisms-text-block.css
- organisms-content-2column-graphic.css
- atoms-banner-spacer.css
```

### Conversion Steps:

**1. Create page.php (default interior page):**
```php
<?php
/**
 * Template Name: Interior Page (Default)
 * Description: Standard content page with hero, text blocks, and 2-column sections
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="page-wrapper">

    <!-- Hero Simple -->
    <section class="hero-simple">
        <div class="hero-simple__container">
            <div class="hero-simple__content">
                <h1 class="hero-simple__headline"><?php the_title(); ?></h1>
                <p class="hero-simple__description">
                    <?php
                    // Use excerpt or custom field
                    if (has_excerpt()) {
                        the_excerpt();
                    }
                    ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <section class="text-block text-block--default" data-layout="default">
        <div class="text-block__container">
            <article class="text-block__content">
                <?php
                // Use WordPress content editor
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </article>
        </div>
    </section>

    <!-- Optional: 2-Column Sections -->
    <!-- Copy from interior-page-template.html if needed -->

</main>

<?php get_footer(); ?>
```

**2. Special Considerations:**
- This is the **default page template** (page.php)
- Can use WordPress content editor for main content
- Or create custom page builder with ACF flexible content
- Should work for any standard page (About, Services, etc.)

### ACF Fields (Optional - Flexible Content):

```php
// Hero Section
page_hero_heading (Text) - Default: page title
page_hero_description (Textarea) - Default: excerpt
page_hero_background (Image)

// Page Builder (Flexible Content)
page_sections
├─ Text Block
│   ├─ heading (Text)
│   ├─ content (WYSIWYG)
│   └─ layout (Select: default, narrative, columns)
├─ 2-Column Graphic
│   ├─ background_image (Image)
│   ├─ left_heading (Text)
│   ├─ left_content (WYSIWYG)
│   ├─ right_heading (Text)
│   └─ right_content (WYSIWYG)
└─ Headline Banner
    └─ banner_text (Text)
```

### Testing Checklist:
- [ ] Page displays with default template
- [ ] Hero pulls page title correctly
- [ ] WordPress editor content displays
- [ ] Images/media from editor work
- [ ] Text formatting preserved
- [ ] Links work correctly
- [ ] Responsive at all breakpoints

---

## Template 4: About/Contact Page (template-about-contact.php)

### Source File:
`/components/templates/about-contact-page-template.html` (1,089 lines)

### Structure:
```
<main class="page-wrapper">
    1. Hero Simple
    2. Text Block (About content)
    3. Headline Banner ("CONNECT WITH US")
    4. Section Contact Us (integrated form + 2-column)
    5. Headline Banner ("FAQ")
    6. FAQ Section
</main>
```

### Components Used:
- `hero-simple` (organisms-heroes.css)
- `text-block text-block--default` (organisms-text-block.css)
- `card-banner-spacer variant-headline-banner` (atoms-banner-spacer.css)
- `section-contactus` (organisms-section-contactus.css)
- `form-contact` (molecules-form-contact.css)
- `faq-group` (organisms-section-faq-group.css)

### CSS Dependencies:
```php
// When is_page_template('template-about-contact.php'):
- organisms-text-block.css
- organisms-section-contactus.css
- molecules-form-contact.css
- organisms-section-faq-group.css
- atoms-banner-spacer.css
```

### JavaScript Dependencies:
- `section-faq-group.js` (FAQ accordion)
- Form validation (if added)

### Conversion Steps:

**1. Create template-about-contact.php:**
```php
<?php
/**
 * Template Name: About/Contact Page
 * Description: About page with contact form and FAQ section
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="page-wrapper">

    <!-- Hero Simple -->
    <section class="hero-simple">
        <!-- Copy from about-contact-page-template.html -->
    </section>

    <!-- About Content -->
    <section class="text-block text-block--default" data-layout="default">
        <!-- Copy from about-contact-page-template.html -->
    </section>

    <!-- Contact Section -->
    <div class="card-banner-spacer variant-headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('CONNECT WITH US', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <section class="section-contactus">
        <!-- Copy contact form HTML from about-contact-page-template.html -->
        <!-- Form action needs WordPress handler or plugin integration -->
    </section>

    <!-- FAQ Section -->
    <div class="card-banner-spacer variant-headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('FREQUENTLY ASKED QUESTIONS', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <section class="faq-group" id="faq">
        <!-- Copy FAQ HTML from about-contact-page-template.html -->
    </section>

</main>

<?php get_footer(); ?>
```

**2. Form Integration:**
Options for contact form:
- **Contact Form 7** - Most popular WordPress form plugin
- **WPForms** - Drag & drop form builder
- **Gravity Forms** - Premium form solution
- **Custom AJAX handler** - For full control

Replace form HTML with plugin shortcode:
```php
<?php echo do_shortcode('[contact-form-7 id="123"]'); ?>
```

### ACF Fields (Optional):

```php
// Hero
about_hero_heading (Text)
about_hero_description (Textarea)

// About Content
about_text_sections (Repeater)
├─ section_heading (Text)
└─ section_content (WYSIWYG)

// Contact Section
contact_heading (Text)
contact_subheading (Text)
contact_image (Image)

// FAQ Items
faq_items (Repeater)
├─ question (Text)
└─ answer (WYSIWYG)
```

### Testing Checklist:
- [ ] Template displays correctly
- [ ] About content formatted properly
- [ ] Contact form displays
- [ ] Contact form submits successfully
- [ ] FAQ accordion works
- [ ] FAQ items expand/collapse correctly
- [ ] Form validation works
- [ ] Success/error messages display
- [ ] Responsive at all breakpoints

---

## Template 5: Blog Page (template-blog.php + archive.php)

### Source Files:
`/components/templates/blog-page-template.html` (881 lines)

### Structure:
```
<main class="page-wrapper">
    1. Hero Simple
    2. Blog Group (blog post cards in responsive grid)
</main>
```

### Components Used:
- `hero-simple` (organisms-heroes.css)
- `blog-group-organism` (blog-group-organism-v2.css)
- `card-blogpost` (molecules-card-blogpost.css)

### CSS Dependencies:
```php
// When is_page_template('template-blog.php') || is_home() || is_archive():
- organisms-heroes.css
- blog-group-organism-v2.css
- molecules-card-blogpost.css
```

### JavaScript Dependencies:
- `blog-group-adapter.js` (responsive grid adapter)

### Conversion Steps:

**1. Create template-blog.php (blog archive page):**
```php
<?php
/**
 * Template Name: Blog Archive
 * Description: Blog listing page with responsive card grid
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="page-wrapper">

    <!-- Hero Simple -->
    <section class="hero-simple">
        <div class="hero-simple__container">
            <div class="hero-simple__content">
                <h1 class="hero-simple__headline"><?php _e('Our Blog', 'purposeful-media'); ?></h1>
                <p class="hero-simple__description">
                    <?php _e('Insights, strategies, and thought leadership for B2B marketing success', 'purposeful-media'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Blog Group -->
    <section class="blog-group-organism" id="blog-group" data-layout="responsive">
        <div class="blog-group-container">
            <div class="blog-cards-grid" id="blog-cards-grid">

                <?php
                // Query blog posts
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $blog_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'paged' => $paged
                ));

                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post();
                ?>

                <article class="card-blogpost">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="card-blogpost__image-container">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', array('class' => 'card-blogpost__image')); ?>
                        </a>
                    </div>
                    <?php endif; ?>

                    <div class="card-blogpost__content">
                        <div class="card-blogpost__meta">
                            <span class="card-blogpost__date"><?php echo get_the_date('F j, Y'); ?></span>
                            <span class="card-blogpost__category">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    echo esc_html($categories[0]->name);
                                }
                                ?>
                            </span>
                        </div>

                        <h2 class="card-blogpost__headline">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <div class="card-blogpost__excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="card-blogpost__read-more">
                            <?php _e('Read More', 'purposeful-media'); ?>
                            <span class="ui-icon-display ui-icon-display--small" data-icon="arrow-up" data-color="teal" data-direction="right"></span>
                        </a>
                    </div>
                </article>

                <?php
                    endwhile;
                else :
                    echo '<p>' . __('No blog posts found.', 'purposeful-media') . '</p>';
                endif;

                wp_reset_postdata();
                ?>

            </div>

            <!-- Pagination -->
            <?php
            if ($blog_query->max_num_pages > 1) :
            ?>
            <div class="blog-pagination">
                <?php
                echo paginate_links(array(
                    'total' => $blog_query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => __('« Previous', 'purposeful-media'),
                    'next_text' => __('Next »', 'purposeful-media')
                ));
                ?>
            </div>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>
```

**2. Create archive.php (fallback for category/tag archives):**
```php
<?php
/**
 * Archive Template
 * Used for category, tag, and date archives
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="page-wrapper">

    <section class="hero-simple">
        <div class="hero-simple__container">
            <div class="hero-simple__content">
                <h1 class="hero-simple__headline"><?php the_archive_title(); ?></h1>
                <p class="hero-simple__description"><?php the_archive_description(); ?></p>
            </div>
        </div>
    </section>

    <!-- Use same blog grid as template-blog.php -->
    <!-- Copy blog-group-organism section -->

</main>

<?php get_footer(); ?>
```

**3. Create single.php (individual blog post):**
```php
<?php
/**
 * Single Post Template
 * Used for individual blog posts
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="page-wrapper">

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <!-- Hero with featured image -->
        <?php if (has_post_thumbnail()) : ?>
        <div class="post-hero">
            <?php the_post_thumbnail('large'); ?>
        </div>
        <?php endif; ?>

        <!-- Post Content -->
        <div class="text-block text-block--default">
            <div class="text-block__container">
                <article class="text-block__content">

                    <header class="post-header">
                        <div class="post-meta">
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                            <span class="post-category"><?php the_category(', '); ?></span>
                        </div>
                        <h1 class="headline headline--h1"><?php the_title(); ?></h1>
                    </header>

                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    // Post navigation
                    the_post_navigation(array(
                        'prev_text' => '← %title',
                        'next_text' => '%title →'
                    ));
                    ?>

                </article>
            </div>
        </div>

    </article>

    <?php
        endwhile;
    endif;
    ?>

</main>

<?php get_footer(); ?>
```

### Testing Checklist:
- [ ] Blog archive displays with grid layout
- [ ] Grid responsive at all breakpoints (1/2/3 columns)
- [ ] Blog cards display correctly
- [ ] Featured images show
- [ ] Excerpts display
- [ ] "Read More" links work
- [ ] Pagination works
- [ ] Single post template works
- [ ] Post navigation works
- [ ] Category/tag archives work

---

## Template 6: Resource Page (template-resource.php)

### Source File:
`/components/templates/resource-page-template.html` (1,124 lines)

### Structure:
```
<main class="resource-page-wrapper">
    1. Hero Simple
    2. Text Block (resources overview)
    3. Headline Banner ("FEATURED RESOURCE")
    4. Content-2Column-Resource
    5. Headline Banner ("RESOURCE LIBRARY")
    6. Section Resources (resource cards grid)
    7. Headline Banner ("START THE CONVERSATION")
    8. Content-2Column-Contact
</main>
```

### Components Used:
- `hero-simple` (organisms-heroes.css)
- `text-block text-block--wide` (organisms-text-block.css)
- `card-banner-spacer variant-headline-banner` (atoms-banner-spacer.css)
- `content-2column-resource` (organisms-content-2column-resource.css)
- `section-resources` (organisms-section-resources.css)
- `content-2column-contact` (organisms-content-2column-contact-integrated.css)

### CSS Dependencies:
```php
// When is_page_template('template-resource.php'):
- organisms-text-block.css
- organisms-content-2column-resource.css
- organisms-section-resources.css
- organisms-content-2column-contact-integrated.css
- atoms-banner-spacer.css
```

### JavaScript Dependencies:
- `resources-section-adapter.js` (resource grid responsive layout)

### Conversion Steps:

**1. Create template-resource.php:**
```php
<?php
/**
 * Template Name: Resource Library
 * Description: Resource center with featured resource and downloadable materials
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

get_header();
?>

<main class="resource-page-wrapper">

    <!-- Hero Simple -->
    <section class="hero-simple">
        <!-- Copy from resource-page-template.html -->
    </section>

    <!-- Overview Text -->
    <section class="text-block text-block--wide" data-layout="wide">
        <!-- Copy from resource-page-template.html -->
    </section>

    <!-- Featured Resource -->
    <div class="card-banner-spacer variant-headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('FEATURED RESOURCE', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <section class="content-2column-resource">
        <!-- Copy from resource-page-template.html -->
    </section>

    <!-- Resource Library Grid -->
    <div class="card-banner-spacer variant-headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('PURPOSEFUL MEDIA RESOURCE LIBRARY', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <section class="section-resources" id="resources-section" data-layout="responsive">
        <div class="section-resources__container">
            <div class="resources-grid" id="resources-grid">

                <?php
                // Query custom post type 'resources' or use regular posts
                // This is placeholder - create 'resource' post type first
                $resources_query = new WP_Query(array(
                    'post_type' => 'resource', // Or 'post' with category filter
                    'posts_per_page' => 8
                ));

                if ($resources_query->have_posts()) :
                    while ($resources_query->have_posts()) : $resources_query->the_post();
                ?>

                <article class="card-resource">
                    <!-- Copy card-resource structure from resource-page-template.html -->
                    <!-- Replace static content with WordPress functions -->
                </article>

                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

            </div>
        </div>
    </section>

    <!-- Contact CTA -->
    <div class="card-banner-spacer variant-headline-banner">
        <div class="banner-spacer-content">
            <h1 class="banner-headline"><?php _e('START THE CONVERSATION', 'purposeful-media'); ?></h1>
        </div>
    </div>

    <section class="content-2column-contact">
        <!-- Copy from resource-page-template.html -->
    </section>

</main>

<?php get_footer(); ?>
```

**2. Custom Post Type (Optional):**
Create "Resources" custom post type in functions.php:
```php
function purposeful_register_resource_post_type() {
    register_post_type('resource', array(
        'labels' => array(
            'name' => 'Resources',
            'singular_name' => 'Resource'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-download'
    ));
}
add_action('init', 'purposeful_register_resource_post_type');
```

### ACF Fields (Optional):

```php
// Resource Post Type Fields
resource_type (Select: eBook, Whitepaper, Webinar, Guide, etc.)
resource_file (File Upload)
resource_thumbnail (Image)
resource_featured (True/False)

// Featured Resource
featured_resource_id (Post Object: select from resources)
featured_resource_background (Image)

// Contact CTA
resources_contact_heading (Text)
resources_contact_text (WYSIWYG)
resources_contact_image (Image)
```

### Testing Checklist:
- [ ] Template displays correctly
- [ ] Hero section renders
- [ ] Featured resource displays
- [ ] Resource grid displays (1/2/3/4 columns)
- [ ] Resource cards formatted correctly
- [ ] Download links work
- [ ] Contact form displays
- [ ] Responsive at all breakpoints
- [ ] Resources grid adapts correctly

---

## General Testing Protocol

### For Every Template:

**1. Visual Testing:**
- [ ] Mobile (380-767px) - Check layout, touch targets, readability
- [ ] Tablet (768-1149px) - Check 2-column layouts, navigation
- [ ] Desktop (1150-1919px) - Check 3-column layouts, hover states
- [ ] DesktopPlus (1920px+) - Check containerization, background pattern

**2. Functionality Testing:**
- [ ] All links work correctly
- [ ] All buttons function properly
- [ ] Forms validate and submit
- [ ] JavaScript modules load without errors
- [ ] Images/videos load correctly
- [ ] Icons display with correct colors

**3. Browser Testing:**
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Mobile Safari (iOS)
- [ ] Chrome Mobile (Android)

**4. WordPress Testing:**
- [ ] Template appears in admin
- [ ] Page/post can be assigned to template
- [ ] Preview mode works
- [ ] Published page displays correctly
- [ ] WordPress editor works (if used)
- [ ] ACF fields appear (if configured)

**5. Performance Testing:**
- [ ] No console errors (JavaScript)
- [ ] No console warnings (CSS)
- [ ] Page loads in <3 seconds
- [ ] Images optimized
- [ ] Videos load efficiently

**6. Accessibility Testing:**
- [ ] Keyboard navigation works
- [ ] Screen reader announces properly
- [ ] ARIA labels present
- [ ] Color contrast meets WCAG AA
- [ ] Focus indicators visible

---

## Common WordPress Functions Reference

### For Template Development:

**Get Header/Footer:**
```php
get_header(); // Loads header.php
get_footer(); // Loads footer.php
```

**The Loop:**
```php
if (have_posts()) :
    while (have_posts()) : the_post();
        the_title();
        the_content();
        the_excerpt();
        the_permalink();
    endwhile;
endif;
```

**Template Functions:**
```php
get_template_directory_uri() // Theme folder URL
bloginfo('name') // Site name
bloginfo('description') // Site tagline
home_url('/') // Home URL
is_front_page() // Check if homepage
is_page_template('template-name.php') // Check template
```

**Post Functions:**
```php
the_title() // Post title
the_content() // Post content
the_excerpt() // Post excerpt
the_permalink() // Post URL
get_the_date() // Post date
the_category() // Post categories
the_tags() // Post tags
has_post_thumbnail() // Check if featured image exists
the_post_thumbnail() // Display featured image
```

**Translation Functions:**
```php
_e('Text', 'textdomain') // Echo translated text
__('Text', 'textdomain') // Return translated text
esc_attr_e('Text', 'textdomain') // Echo escaped attribute text
esc_html_e('Text', 'textdomain') // Echo escaped HTML text
```

**Sanitization Functions:**
```php
esc_url($url) // Sanitize URL
esc_attr($text) // Sanitize attribute
esc_html($text) // Sanitize HTML
wp_kses_post($content) // Allow safe HTML
```

**Custom Queries:**
```php
$query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'category_name' => 'news'
));

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        // Display posts
    endwhile;
    wp_reset_postdata();
endif;
```

**ACF Functions (if ACF is installed):**
```php
get_field('field_name') // Get ACF field value
the_field('field_name') // Echo ACF field value
have_rows('repeater_field') // Check if repeater has rows
get_sub_field('sub_field_name') // Get repeater sub field
```

---

## File Organization

### WordPress Theme Structure:

```
purposeful-media/
├── style.css (theme header)
├── functions.php (theme setup)
├── header.php (site header) ✅
├── footer.php (site footer) ✅
├── front-page.php (homepage) ⏳
├── page.php (default page template) ⏳
├── single.php (single post) ⏳
├── archive.php (blog archive) ⏳
├── template-pillar-page.php ⏳
├── template-about-contact.php ⏳
├── template-blog.php ⏳
├── template-resource.php ⏳
├── inc/
│   ├── enqueue.php ✅
│   └── menus.php ✅
├── assets/
│   ├── css/ (18 files) ✅
│   ├── js/ (6 files) ✅
│   └── svg/ (sprite sheets) ✅
└── template-parts/
    └── (reusable template partials - optional)
```

---

## Estimated Timeline

### Per Template:

**Simple Templates (30-45 minutes each):**
- Interior Page (page.php)
- Blog Archive (template-blog.php + archive.php)

**Medium Templates (45-60 minutes each):**
- Homepage (front-page.php)
- About/Contact (template-about-contact.php)
- Resource Page (template-resource.php)

**Complex Templates (60-90 minutes each):**
- Pillar Page (template-pillar-page.php) - Sticky menu + multiple sections

**Total Estimated Time: 4-6 hours**

### Suggested Workflow:

**Session 1 (1.5-2 hours):**
1. Homepage (front-page.php) - Priority 1
2. Interior Page (page.php) - Priority 3

**Session 2 (1.5-2 hours):**
3. Pillar Page (template-pillar-page.php) - Priority 2
4. About/Contact (template-about-contact.php) - Priority 4

**Session 3 (1.5-2 hours):**
5. Blog (template-blog.php + archive.php + single.php) - Priority 5
6. Resource (template-resource.php) - Priority 6

---

## Success Criteria

### Phase 3 is complete when:

- ✅ All 6 templates converted to WordPress PHP
- ✅ All templates use get_header() and get_footer()
- ✅ All wrapper classes maintained for DesktopPlus
- ✅ All asset paths use get_template_directory_uri()
- ✅ All templates tested at 4 breakpoints
- ✅ No console errors (JavaScript or CSS)
- ✅ All CSS/JS auto-loads via enqueue.php
- ✅ Templates appear in WordPress admin
- ✅ All templates pass visual QA

### Optional (Future Enhancement):
- ⏳ ACF fields configured for dynamic content
- ⏳ Custom post types created (resources, team members, etc.)
- ⏳ Form plugins integrated (contact forms, newsletter)
- ⏳ Blog post single template styled
- ⏳ Search results template
- ⏳ 404 error page
- ⏳ WordPress menu walker for custom navigation

---

## Troubleshooting Guide

### Common Issues:

**CSS Not Loading:**
- Check enqueue.php conditional logic
- Verify template file name matches conditions
- Clear browser cache
- Check wp_head() and wp_footer() present

**JavaScript Errors:**
- Check script dependencies in enqueue.php
- Verify scripts load in footer (true parameter)
- Check for jQuery conflicts
- Use browser console to identify errors

**Template Not Appearing:**
- Check "Template Name:" comment at top of file
- Verify file is in theme root (not subfolder)
- Refresh WordPress admin
- Check file permissions (should be 644)

**Images Not Loading:**
- Use get_template_directory_uri() for paths
- Check file paths are correct
- Verify images exist in /assets/ folder
- Check file permissions

**Responsive Issues:**
- Verify wrapper classes present
- Check CSS files loading correctly
- Test with browser dev tools
- Compare to HTML template visually

---

## Next Steps After Phase 3

### Phase 4: Enhancement & Optimization
1. Add ACF fields for dynamic content
2. Integrate form plugins
3. Create custom post types
4. Set up WordPress menus with custom walker
5. Add search functionality
6. Create 404 page
7. Optimize images and videos
8. Set up caching plugins
9. Configure SEO plugins
10. Launch to production!

---

**Phase 3 Status:** 📋 READY FOR IMPLEMENTATION
**Prerequisites:** Phase 1 ✅ Complete, Phase 2 ✅ Complete
**Estimated Completion:** 4-6 hours (split across 3 sessions)

