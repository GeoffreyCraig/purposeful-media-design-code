# WordPress Deployment Guide
## Purposeful Media Promotions - MVW Launch

**Created:** October 13, 2025 (Week 42, Monday)  
**Target Platform:** Bluehost WordPress Hosting  
**Project Phase:** Staging Environment Setup  
**Status:** Pre-Deployment Planning

---

## 📋 Table of Contents

1. [Overview](#overview)
2. [Pre-Deployment Checklist](#pre-deployment-checklist)
3. [Asset Preparation](#asset-preparation)
4. [WordPress Theme Structure](#wordpress-theme-structure)
5. [Path Conversion Strategy](#path-conversion-strategy)
6. [CSS & JavaScript Enqueuing](#css--javascript-enqueuing)
7. [Navigation Menus](#navigation-menus)
8. [Dynamic Content Setup](#dynamic-content-setup)
9. [Performance Optimization](#performance-optimization)
10. [Testing Protocol](#testing-protocol)
11. [Deployment Phases](#deployment-phases)
12. [Troubleshooting](#troubleshooting)

---

## Overview

### **Current State:**
- ✅ Homepage template complete (`homepage-template.html`)
- ✅ Interior page template complete (`interior-page-template-v1.1.html`)
- ✅ All components tested and approved
- ✅ Fully responsive across 4 breakpoints
- ⏳ Static HTML templates ready for WordPress conversion

### **Goal:**
Convert static HTML templates to dynamic WordPress theme and deploy to Bluehost staging environment.

### **Target Timeline:**
- **Week 1:** Basic WordPress setup and theme structure
- **Week 2:** Static to dynamic conversion
- **Week 3:** Content and assets integration
- **Week 4:** Testing, optimization, and launch prep

---

## Pre-Deployment Checklist

### **✅ Bluehost Account Verification**

**Action Items:**
- [ ] Log into Bluehost control panel
- [ ] Verify WordPress staging environment is available
- [ ] Check hosting plan specifications:
  - [ ] PHP version (need 7.4+ minimum, 8.0+ preferred): PHP Version: 8.3
  - [ ] MySQL version
  - [ ] Total storage limit: 20Gb
  - [ ] Max file upload size
  - [ ] Bandwidth allocation
- [ ] Verify SSL certificate is active
- [ ] Get FTP/SFTP credentials
- [ ] Get database access credentials
- [ ] Enable "Coming Soon" page

**Documentation Needed:**
```
Bluehost Control Panel: https://www.bluehost.com/my-account/home
WordPress Admin: https://purposefulmediapromotions.com/wp-admin
FTP Host: /home1/geoffcra/public_html
FTP Username: housekeeping@geoffcraigmba.com
Database Name: geoffcra_WPQEK [please confirm]
Database User: geoffcra_WPQEK [please confirm]
```

---

## Asset Preparation

### **1. Video Files - CRITICAL**

**Current Status:**
- 3 watermarked Shutterstock preview videos
- File names:
  - `3427717167-preview.mp4` (Slide 1)
  - `3432135943-preview.mp4` (Slide 2)
  - `3539535235-preview.mp4` (Slide 3)

**Action Items:**
- [ ] Purchase licensed versions from Shutterstock
- [ ] Download original quality files
- [ ] Optimize for web delivery:
  - [ ] Compress to reasonable file size (target: <10MB each)
  - [ ] Create WebM versions for better compression
  - [ ] Consider H.265/HEVC encoding for smaller files
  - [ ] Test autoplay on mobile devices
- [ ] Rename to descriptive names: `hero-slide-1-transform.mp4`, etc.
- [ ] Check total file size vs. Bluehost upload limit
- [ ] **Decision:** Store in theme or use CDN? (Recommended: CDN)

**Optimization Tools:**
- HandBrake (free, desktop)
- CloudConvert (online)
- FFmpeg (command line)
- Adobe Media Encoder (available if needed)

**Target Specs:**
- Resolution: 1920x1080 (Full HD)
- Bitrate: 3-5 Mbps
- Format: MP4 (H.264) + WebM
- Duration: Keep original length
- File size goal: 5-10MB per video

---

### **2. Images**

**Current Inventory:**

**Logos (SVG - Ready):**
- `purposeful-media-logo-white-mobile.svg`
- `purposeful-media-logo-white-tablet.svg`
- `purposeful-media-logo-white-desktop.svg`

**Background Images (Need Optimization):**
- `shutterstock_2085055825.jpg` (2-Column Graphic section)
- `shutterstock_1421446100.jpg` (Featured Resource background)

**Thumbnails:**
- `four-hour-marketing-plan-TN.png` (Featured Resource)

**Fallback Images (for video slides):**
- `shutterstock_2492759463.jpg` (Slide 1 fallback)
- `shutterstock_2454682663.jpg` (Slide 2 fallback)
- `shutterstock_2618933959.jpg` (Slide 3 fallback)

**Action Items:**
- [ ] Purchase all Shutterstock image licenses
- [ ] Optimize all JPG/PNG files:
  - [ ] Target: <500KB for large backgrounds
  - [ ] Target: <200KB for thumbnails
  - [ ] Use WebP format where possible (with JPG fallback)
- [ ] Rename to descriptive names
- [ ] Create multiple sizes for responsive images (srcset)
- [ ] Upload to WordPress Media Library OR theme assets folder

**Optimization Tools:**
- TinyPNG / TinyJPG (online, easy)
- ShortPixel (WordPress plugin)
- ImageOptim (Mac desktop app)
- Squoosh (Google's web app)

---

### **3. Icon Sprite Sheets**

**Current Files:**
- UI Icons: `/assets/svg/ui-icons/purposeful-sprite-ui.svg`
- Decorative Icons: `/assets/svg/decorative-icons/purposeful-sprite-symbolic.svg`
- Regular Icons: Various SVG files in `/assets/svg/`

**Action Items:**
- [ ] Verify all sprite sheets work correctly
- [ ] Decide: Inline SVG or external file?
- [ ] Test sprite positioning in WordPress environment
- [ ] Upload to `/wp-content/themes/purposeful-media/assets/svg/`

---

### **4. Fonts**

**Current Setup:**
- Google Fonts CDN (Lato, Open Sans)
- Already optimized ✅

**Action Items:**
- [ ] Keep using Google Fonts CDN (no changes needed)
- [ ] OR download and self-host for GDPR compliance (optional)
- [ ] Verify font loading in WordPress environment

---

## WordPress Theme Structure

### **Recommended Directory Structure:**

```
wp-content/themes/purposeful-media/
├── style.css                    # Theme metadata (required)
├── functions.php                # Theme setup and functions
├── header.php                   # Site header
├── footer.php                   # Site footer
├── front-page.php               # Homepage template
├── page.php                     # Interior page template
├── index.php                    # Fallback template
├── 404.php                      # Error page (create later)
├── screenshot.png               # Theme thumbnail (1200x900px)
│
├── assets/
│   ├── css/
│   │   ├── organisms-heroes.css
│   │   ├── organisms-footers.css
│   │   ├── molecules-icon-display.css
│   │   └── molecules-ui-icon-display.css
│   ├── js/
│   │   └── hero-carousel.js
│   ├── images/
│   │   ├── backgrounds/
│   │   ├── thumbnails/
│   │   └── fallbacks/
│   ├── videos/
│   │   └── [or use CDN]
│   └── svg/
│       ├── logos/
│       └── icons/
│
├── template-parts/              # Reusable components
│   ├── header-navigation.php
│   ├── footer-navigation.php
│   ├── hero-carousel.php
│   ├── banner-headline.php
│   ├── text-block.php
│   ├── featured-resource.php
│   ├── icon-banner.php
│   └── two-column-graphic.php
│
└── inc/                         # Helper functions
    ├── enqueue.php              # CSS/JS enqueuing
    ├── menus.php                # Menu registration
    ├── acf-fields.php           # ACF field definitions
    └── customizer.php           # WordPress Customizer
```

---

### **Required Files - Minimum:**

#### **1. style.css** (Theme Header - Required)
```css
/*
Theme Name: Purposeful Media Promotions
Theme URI: https://purposefulmediapromotions.com
Author: Purposeful Media Promotions
Author URI: https://purposefulmediapromotions.com
Description: Custom WordPress theme for Purposeful Media B2B marketing website
Version: 1.0.0
License: Proprietary
Text Domain: purposeful-media
*/

/* Additional styles can go here or be enqueued separately */
```

#### **2. functions.php** (Core Theme Setup)
```php
<?php
/**
 * Purposeful Media Theme Functions
 * Version: 1.0.0
 */

// Theme setup
function purposeful_media_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'purposeful-media'),
        'footer-services' => __('Footer Services Menu', 'purposeful-media'),
        'footer-who-we-serve' => __('Footer Who We Serve Menu', 'purposeful-media'),
        'footer-resources' => __('Footer Resources Menu', 'purposeful-media'),
        'footer-company' => __('Footer Company Menu', 'purposeful-media'),
    ));
}
add_action('after_setup_theme', 'purposeful_media_setup');

// Enqueue styles and scripts
require get_template_directory() . '/inc/enqueue.php';

// Menu functions
require get_template_directory() . '/inc/menus.php';

// ACF field definitions
if (function_exists('acf_add_local_field_group')) {
    require get_template_directory() . '/inc/acf-fields.php';
}
```

#### **3. header.php** (Site Header)
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Extract header HTML from template here -->
<header class="header-main">
    <!-- Navigation will use wp_nav_menu() -->
</header>
```

#### **4. footer.php** (Site Footer)
```php
<!-- Extract footer HTML from template here -->
<footer class="footer-responsive">
    <!-- Footer navigation will use wp_nav_menu() -->
</footer>

<!-- Return to top button -->
<button class="return-button" id="returnButton" aria-label="Return to top">
    <div class="ui-icon-display ui-icon-display--large" data-icon="arrow-up" data-color="gray" data-direction="up"></div>
</button>

<?php wp_footer(); ?>
</body>
</html>
```

#### **5. front-page.php** (Homepage)
```php
<?php get_header(); ?>

<!-- Hero Carousel -->
<?php get_template_part('template-parts/hero-carousel'); ?>

<!-- Banner Headline: Welcome -->
<?php get_template_part('template-parts/banner-headline', null, array('text' => 'Welcome')); ?>

<!-- Text Block Section -->
<?php get_template_part('template-parts/text-block'); ?>

<!-- Banner Headline: Featured Resource -->
<?php get_template_part('template-parts/banner-headline', null, array('text' => 'Featured Resource Download')); ?>

<!-- Featured Resource Section -->
<?php get_template_part('template-parts/featured-resource'); ?>

<!-- Icon Banner: Your Next Step -->
<?php get_template_part('template-parts/icon-banner'); ?>

<!-- 2-Column Graphic Section -->
<?php get_template_part('template-parts/two-column-graphic'); ?>

<?php get_footer(); ?>
```

#### **6. page.php** (Interior Pages)
```php
<?php get_header(); ?>

<!-- Simple Hero -->
<section class="hero-simple">
    <div class="hero-simple__content">
        <h1 class="hero-simple__headline"><?php the_title(); ?></h1>
    </div>
</section>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
        <!-- Page content -->
        <section class="text-block-section">
            <div class="text-block-content">
                <?php the_content(); ?>
            </div>
        </section>
    <?php endwhile; ?>
    
    <!-- Icon Banner -->
    <?php get_template_part('template-parts/icon-banner'); ?>
    
    <!-- 2-Column Graphic -->
    <?php get_template_part('template-parts/two-column-graphic'); ?>
</main>

<?php get_footer(); ?>
```

---

## Path Conversion Strategy

### **Problem:**
Static HTML uses relative paths:
```html
<img src="../../assets/images/logo.svg">
<link href="../../styles/organisms-heroes.css">
```

### **Solution:**
WordPress uses dynamic functions:
```php
<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg
```

### **Conversion Reference:**

| Static HTML | WordPress PHP |
|-------------|---------------|
| `../../assets/images/logo.svg` | `<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg` |
| `../../assets/videos/video.mp4` | `<?php echo get_template_directory_uri(); ?>/assets/videos/video.mp4` |
| `../../styles/style.css` | Enqueued via `wp_enqueue_style()` |
| `../../scripts/script.js` | Enqueued via `wp_enqueue_script()` |

### **Action Items:**
- [ ] Create find-and-replace list for all asset paths
- [ ] Convert all image paths to WordPress functions
- [ ] Convert all video paths to WordPress functions
- [ ] Convert all CSS/JS references to enqueue functions
- [ ] Test all assets load correctly

---

## CSS & JavaScript Enqueuing

### **Create: /inc/enqueue.php**

```php
<?php
/**
 * Enqueue scripts and styles
 */

function purposeful_media_enqueue_assets() {
    $theme_version = '1.0.0';
    $theme_uri = get_template_directory_uri();
    
    // Enqueue Google Fonts
    wp_enqueue_style(
        'purposeful-media-fonts',
        'https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );
    
    // Main theme stylesheet
    wp_enqueue_style(
        'purposeful-media-style',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );
    
    // Hero Carousel CSS
    wp_enqueue_style(
        'organisms-heroes',
        $theme_uri . '/assets/css/organisms-heroes.css',
        array(),
        $theme_version
    );
    
    // Icon Display CSS
    wp_enqueue_style(
        'molecules-icon-display',
        $theme_uri . '/assets/css/molecules-icon-display.css',
        array(),
        $theme_version
    );
    
    // UI Icon Display CSS
    wp_enqueue_style(
        'molecules-ui-icon-display',
        $theme_uri . '/assets/css/molecules-ui-icon-display.css',
        array(),
        $theme_version
    );
    
    // Footer CSS
    wp_enqueue_style(
        'organisms-footers',
        $theme_uri . '/assets/css/organisms-footers.css',
        array(),
        $theme_version
    );
    
    // Hero Carousel JS
    wp_enqueue_script(
        'hero-carousel',
        $theme_uri . '/assets/js/hero-carousel.js',
        array(),
        $theme_version,
        true // Load in footer
    );
    
    // Main theme JS (for navigation, footer, return-to-top)
    wp_enqueue_script(
        'purposeful-media-main',
        $theme_uri . '/assets/js/main.js',
        array(),
        $theme_version,
        true // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'purposeful_media_enqueue_assets');
```

### **Action Items:**
- [ ] Copy all CSS files from `/styles/` to theme `/assets/css/`
- [ ] Copy all JS files from `/scripts/` to theme `/assets/js/`
- [ ] Create `main.js` with navigation, footer, and return-to-top functionality
- [ ] Test that all styles load correctly
- [ ] Check browser console for missing files

---

## Navigation Menus

### **Create: /inc/menus.php**

```php
<?php
/**
 * Navigation menu functions
 */

// Custom walker for dropdown menus (if needed)
class Purposeful_Media_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Custom walker code here if default doesn't work with your design
}

// Add active class to current menu items
function purposeful_media_nav_menu_css_class($classes, $item, $args) {
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'purposeful_media_nav_menu_css_class', 10, 3);
```

### **Conversion Strategy:**

**Current Header Navigation (Static):**
```html
<a href="/" class="menu-item active">Home</a>
<div class="menu-item-dropdown">
    <span class="menu-text">Solutions</span>
    <div class="dropdown-container">
        <div class="dropdown-menu">
            <a href="/email-management" class="dropdown-item">Email Management</a>
        </div>
    </div>
</div>
```

**WordPress Navigation (Dynamic):**
```php
<?php
wp_nav_menu(array(
    'theme_location' => 'primary',
    'menu_class' => 'desktop-nav',
    'container' => false,
    'depth' => 2,
    // May need custom walker for dropdown structure
));
?>
```

### **Challenge:**
Your dropdown structure is custom-designed. WordPress default menus may not match exactly.

### **Solutions:**
1. **Option A:** Create custom walker class to output your exact HTML structure
2. **Option B:** Use JavaScript to transform WordPress menu into your structure
3. **Option C:** Simplify menu structure to match WordPress defaults

**Recommendation:** Start with Option B (easiest), move to Option A if needed.

### **Action Items:**
- [ ] Create WordPress menus in admin: Primary, Footer menus
- [ ] Add menu items matching current structure
- [ ] Test dropdown functionality with WP menus
- [ ] Adjust JavaScript if needed for WP menu structure
- [ ] Test mobile accordion with WP menus

---

## Dynamic Content Setup

### **Recommended: Advanced Custom Fields (ACF) Plugin**

**Install ACF Pro** (provides better features than free version)
- Purchase: https://www.advancedcustomfields.com/
- Cost: ~$49 for single site
- Alternative: Use free version with limited features

---

### **ACF Field Groups to Create:**

#### **1. Homepage Hero Carousel**
```
Field Group: "Homepage Hero Carousel"
Location: Post Type = Page, Page Template = Front Page

Fields:
- Carousel Slides (Repeater)
  - Slide Video (File Upload)
  - Slide Fallback Image (Image)
  - Eyebrow Text (Text)
  - Headline (Text)
  - Description (Textarea)
  - CTA Text (Text)
  - CTA Link (URL)
```

#### **2. Homepage Text Block**
```
Field Group: "Homepage Text Block"
Location: Post Type = Page, Page Template = Front Page

Fields:
- Main Heading (Text)
- Content Sections (Repeater)
  - Section Heading (Text)
  - Section Content (WYSIWYG Editor)
```

#### **3. Featured Resource**
```
Field Group: "Featured Resource"
Location: Post Type = Page, Page Template = Front Page

Fields:
- Resource Thumbnail (Image)
- Resource Heading (Text)
- Resource Description (Textarea)
- CTA Button Text (Text)
- CTA Button Link (URL)
- Background Image (Image)
```

#### **4. 2-Column Graphic Section**
```
Field Group: "2-Column CTA Section"
Location: Post Type = Page

Fields:
- Background Image (Image)
- Left Card Heading (Text)
- Left Card Text (Textarea)
- Left Card Button Text (Text)
- Left Card Button Link (URL)
- Right Card Heading (Text)
- Right Card Text (Textarea)
- Right Card Button Text (Text)
- Right Card Button Link (URL)
```

#### **5. Icon Banner**
```
Field Group: "Icon Banner"
Location: Post Type = Page

Fields:
- Icon (Select: contact, phone, email, etc.)
- Banner Title (Text)
- Banner Tagline (Text)
```

---

### **Using ACF Fields in Templates:**

```php
<?php
// Get carousel slides
if (have_rows('carousel_slides')) :
    while (have_rows('carousel_slides')) : the_row();
        $video = get_sub_field('slide_video');
        $headline = get_sub_field('headline');
        // Output slide HTML
    endwhile;
endif;
?>
```

### **Action Items:**
- [ ] Install ACF plugin
- [ ] Create field groups as outlined above
- [ ] Test field inputs in WordPress admin
- [ ] Update template files to use ACF functions
- [ ] Add fallback content if fields are empty

---

## Performance Optimization

### **1. Caching Plugin**

**Recommended: WP Rocket** (paid, ~$49)
- Automatic page caching
- CSS/JS minification
- Lazy loading
- Database optimization

**Free Alternative: W3 Total Cache**
- More configuration required
- Good performance if set up correctly

### **Configuration:**
- [ ] Install caching plugin
- [ ] Enable page caching
- [ ] Enable CSS/JS minification
- [ ] Enable lazy loading for images
- [ ] Enable browser caching
- [ ] Test site speed after enabling

---

### **2. Image Optimization Plugin**

**Recommended: ShortPixel** (free tier available)
- Automatic compression on upload
- WebP conversion
- Responsive image optimization

**Configuration:**
- [ ] Install ShortPixel plugin
- [ ] Get API key (free tier: 100 images/month)
- [ ] Configure compression level (Glossy recommended)
- [ ] Enable WebP conversion
- [ ] Bulk optimize existing images

---

### **3. CDN for Videos**

**Problem:** Video files are too large for theme hosting

**Solutions:**

**Option A: CloudFlare CDN** (Free tier)
- Cache static assets at edge servers
- Reduces load on Bluehost
- Easy setup with Bluehost

**Option B: AWS S3 + CloudFront** (Paid, ~$5-20/month)
- Professional solution
- Better for large video files
- More complex setup

**Option C: YouTube/Vimeo Private Videos** (Free/Paid)
- Pro: No hosting costs
- Con: Lose autoplay control on mobile
- Con: Shows platform branding

**Recommendation:** Start with CloudFlare, move to AWS S3 if needed.

### **Action Items:**
- [ ] Research video hosting options
- [ ] Calculate estimated bandwidth usage
- [ ] Set up CDN if needed
- [ ] Test video loading from CDN
- [ ] Update video paths in carousel

---

### **4. Performance Testing**

**Tools:**
- Google PageSpeed Insights
- GTmetrix
- Pingdom
- WebPageTest

**Target Metrics:**
- Page load time: <3 seconds
- First Contentful Paint: <1.5 seconds
- Time to Interactive: <3.5 seconds
- PageSpeed Score: >80

### **Action Items:**
- [ ] Test performance on staging
- [ ] Identify bottlenecks
- [ ] Optimize largest issues first
- [ ] Retest after optimizations
- [ ] Document performance improvements

---

## Testing Protocol

### **1. Cross-Browser Testing**

**Test On:**
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)
- [ ] Mobile Safari (iOS)
- [ ] Mobile Chrome (Android)

### **2. Responsive Testing**

**Breakpoints to Test:**
- [ ] Mobile: 375px, 414px, 390px
- [ ] Tablet: 768px, 1024px
- [ ] Desktop: 1366px, 1440px, 1920px
- [ ] DesktopPlus: 2560px+

**Test Specifically:**
- [ ] Navigation dropdowns (desktop)
- [ ] Navigation accordion (mobile/tablet)
- [ ] Hero carousel at all sizes
- [ ] Featured resource layout transitions
- [ ] 2-column graphic card placement
- [ ] Footer columns vs. accordion
- [ ] Return-to-top button

### **3. Functionality Testing**

**Interactive Elements:**
- [ ] Hero carousel auto-advance
- [ ] Hero carousel navigation buttons
- [ ] Hero carousel indicator dots
- [ ] Hero carousel pause on hover
- [ ] Desktop menu dropdowns open/close
- [ ] Desktop menu hover states
- [ ] Mobile hamburger menu
- [ ] Mobile accordion expand/collapse
- [ ] Footer mobile accordion
- [ ] Newsletter form submission
- [ ] Return-to-top button appears at 300px
- [ ] Return-to-top button smooth scroll
- [ ] All button hover states
- [ ] All button active states
- [ ] All link hover states

### **4. Content Testing**

**Verify:**
- [ ] All images load correctly
- [ ] All videos load and autoplay
- [ ] All icons display correctly
- [ ] All fonts load correctly
- [ ] All colors match design system
- [ ] All spacing is consistent
- [ ] All text is readable

### **5. Performance Testing**

**Check:**
- [ ] Page load time <3 seconds
- [ ] No console errors
- [ ] No 404 errors for assets
- [ ] Images lazy load
- [ ] Videos don't block page load
- [ ] Mobile data usage is reasonable

### **6. Accessibility Testing**

**Tools:**
- WAVE browser extension
- Lighthouse audit in Chrome DevTools
- axe DevTools

**Verify:**
- [ ] All images have alt text
- [ ] Proper heading hierarchy (h1, h2, h3)
- [ ] Keyboard navigation works
- [ ] Focus states are visible
- [ ] Color contrast meets WCAG AA
- [ ] ARIA labels present
- [ ] Form labels associated with inputs

---

## Deployment Phases

### **Phase 1: Foundation (Week 1 - Oct 14-20)**

**Goal:** Set up basic WordPress environment and theme structure

**Tasks:**
1. **Day 1: Bluehost Setup**
   - [ ] Log into Bluehost
   - [ ] Install WordPress on staging subdomain
   - [ ] Set up SSL certificate
   - [ ] Create strong admin password
   - [ ] Configure permalinks (Post name)
   - [ ] Disable comments site-wide
   - [ ] Delete default plugins/themes

2. **Day 2: Theme Structure**
   - [ ] Create theme directory
   - [ ] Create style.css with theme header
   - [ ] Create functions.php
   - [ ] Create header.php
   - [ ] Create footer.php
   - [ ] Create index.php
   - [ ] Upload via FTP

3. **Day 3: Asset Upload**
   - [ ] Create assets folder structure
   - [ ] Upload CSS files
   - [ ] Upload JS files
   - [ ] Upload SVG files (logos, icons)
   - [ ] Test theme activates correctly

4. **Day 4: CSS/JS Enqueuing**
   - [ ] Create inc/enqueue.php
   - [ ] Enqueue all stylesheets
   - [ ] Enqueue all scripts
   - [ ] Test styles load correctly
   - [ ] Check browser console for errors

5. **Day 5: Basic Pages**
   - [ ] Create Homepage (set as front page)
   - [ ] Create sample interior page
   - [ ] Test header displays
   - [ ] Test footer displays
   - [ ] Fix any path issues

**Deliverable:** Working WordPress theme with header, footer, and styles loading correctly

---

### **Phase 2: Dynamic Conversion (Week 2 - Oct 21-27)**

**Goal:** Convert static HTML to dynamic WordPress templates

**Tasks:**
1. **Day 1: Navigation Menus**
   - [ ] Create inc/menus.php
   - [ ] Register all menu locations
   - [ ] Create menus in WordPress admin
   - [ ] Add menu items
   - [ ] Convert header to use wp_nav_menu()
   - [ ] Test dropdown functionality

2. **Day 2: ACF Setup**
   - [ ] Install ACF plugin
   - [ ] Create Hero Carousel field group
   - [ ] Create Text Block field group
   - [ ] Create Featured Resource field group
   - [ ] Create 2-Column CTA field group
   - [ ] Create Icon Banner field group

3. **Day 3: Template Parts**
   - [ ] Create template-parts directory
   - [ ] Create hero-carousel.php
   - [ ] Create banner-headline.php
   - [ ] Create text-block.php
   - [ ] Create featured-resource.php
   - [ ] Create icon-banner.php
   - [ ] Create two-column-graphic.php

4. **Day 4: Front Page Template**
   - [ ] Create front-page.php
   - [ ] Include all template parts
   - [ ] Connect ACF fields
   - [ ] Test component output

5. **Day 5: Interior Page Template**
   - [ ] Create page.php
   - [ ] Add simple hero section
   - [ ] Add content area
   - [ ] Include icon-banner
   - [ ] Include two-column-graphic
   - [ ] Test on sample page

**Deliverable:** Fully dynamic templates using ACF for content management

---

### **Phase 3: Content & Assets (Week 3 - Oct 28-Nov 3)**

**Goal:** Add final content and optimize all assets

**Tasks:**
1. **Day 1: Video Preparation**
   - [ ] Purchase Shutterstock video licenses
   - [ ] Download original files
   - [ ] Optimize videos for web
   - [ ] Create WebM versions
   - [ ] Upload to WordPress Media Library OR CDN

2. **Day 2: Image Optimization**
   - [ ] Purchase all image licenses
   - [ ] Optimize all images
   - [ ] Upload to Media Library
   - [ ] Replace placeholder images
   - [ ] Test responsive image loading

3. **Day 3: Hero Carousel Content**
   - [ ] Add Slide 1 content via ACF
   - [ ] Add Slide 2 content via ACF
   - [ ] Add Slide 3 content via ACF
   - [ ] Test carousel functionality
   - [ ] Test video autoplay

4. **Day 4: Homepage Content**
   - [ ] Add text block content
   - [ ] Add featured resource content
   - [ ] Add 2-column CTA content
   - [ ] Add icon banner content
   - [ ] Review all content

5. **Day 5: Interior Pages**
   - [ ] Create About page
   - [ ] Create Services pages
   - [ ] Create Resources page
   - [ ] Create Contact page
   - [ ] Create Blog page (if needed)

**Deliverable:** Fully populated website with optimized assets

---

### **Phase 4: Testing & Optimization (Week 4 - Nov 4-10)**

**Goal:** Test thoroughly, optimize performance, prepare for launch

**Tasks:**
1. **Day 1: Performance Optimization**
   - [ ] Install caching plugin
   - [ ] Configure caching settings
   - [ ] Install image optimization plugin
   - [ ] Set up CloudFlare CDN
   - [ ] Test page load speed

2. **Day 2: Cross-Browser Testing**
   - [ ] Test on Chrome
   - [ ] Test on Firefox
   - [ ] Test on Safari
   - [ ] Test on Edge
   - [ ] Test on mobile browsers
   - [ ] Fix any browser-specific issues

3. **Day 3: Responsive Testing**
   - [ ] Test all mobile sizes
   - [ ] Test all tablet sizes
   - [ ] Test all desktop sizes
   - [ ] Fix any responsive issues
   - [ ] Test landscape/portrait orientations

4. **Day 4: Functionality Testing**
   - [ ] Test all navigation
   - [ ] Test all forms
   - [ ] Test all buttons
   - [ ] Test all interactive elements
   - [ ] Fix any functionality issues

5. **Day 5: Final Review**
   - [ ] Accessibility audit
   - [ ] SEO audit (Yoast/Rank Math)
   - [ ] Content proofread
   - [ ] Performance final check
   - [ ] Client review

**Deliverable:** Production-ready website on staging, ready for launch

---

## Troubleshooting

### **Common Issues & Solutions**

#### **1. Videos Not Autoplaying**

**Problem:** Mobile browsers block autoplay
**Solution:** 
- Ensure `muted` attribute is present
- Add `playsinline` attribute
- Use fallback image for mobile if needed

#### **2. Dropdowns Not Working**

**Problem:** WordPress menu structure different from static HTML
**Solution:**
- Create custom walker class
- OR adjust JavaScript to work with WP structure
- Check for jQuery conflicts

#### **3. Icons Not Displaying**

**Problem:** SVG sprite paths incorrect
**Solution:**
- Use `get_template_directory_uri()` for paths
- Verify sprite file uploaded correctly
- Check browser console for 404 errors

#### **4. Styles Not Loading**

**Problem:** CSS enqueue paths incorrect
**Solution:**
- Verify file paths in enqueue.php
- Check file names match exactly (case-sensitive)
- Clear browser cache
- Clear WordPress cache

#### **5. Page Load Too Slow**

**Problem:** Large video files, unoptimized images
**Solution:**
- Move videos to CDN
- Optimize images (compress, resize, WebP)
- Enable caching
- Minify CSS/JS
- Enable lazy loading

#### **6. Mobile Menu Not Working**

**Problem:** JavaScript not loaded or jQuery conflict
**Solution:**
- Verify JS enqueued in footer
- Check for console errors
- Use jQuery in noConflict mode
- Test with default WordPress jQuery

#### **7. ACF Fields Not Showing**

**Problem:** Plugin not installed or field group location rules incorrect
**Solution:**
- Verify ACF plugin is active
- Check field group location rules
- Clear cache
- Verify user role has permission

#### **8. Fonts Not Loading**

**Problem:** Google Fonts blocked or incorrect enqueue
**Solution:**
- Verify fonts enqueued correctly
- Check for ad blockers
- Consider self-hosting fonts
- Test in incognito mode

---

## Essential Plugins List

### **Must-Have (Install First):**

1. **Advanced Custom Fields Pro**
   - Purpose: Dynamic content management
   - Cost: $49 one-time
   - Priority: CRITICAL

2. **WPForms Lite** or **Contact Form 7**
   - Purpose: Newsletter signup, contact forms
   - Cost: Free (Pro available)
   - Priority: HIGH

3. **Yoast SEO** or **Rank Math**
   - Purpose: SEO optimization
   - Cost: Free (Pro available)
   - Priority: HIGH

### **Recommended (Install Phase 4):**

4. **WP Rocket** or **W3 Total Cache**
   - Purpose: Performance caching
   - Cost: $49/year (WP Rocket) or Free (W3)
   - Priority: HIGH

5. **ShortPixel Image Optimizer**
   - Purpose: Automatic image compression
   - Cost: Free tier (100 images/month)
   - Priority: MEDIUM

6. **UpdraftPlus**
   - Purpose: Backup and restore
   - Cost: Free (Pro for remote storage)
   - Priority: HIGH

7. **Wordfence Security**
   - Purpose: Security and firewall
   - Cost: Free (Pro available)
   - Priority: MEDIUM

### **Optional (Consider Later):**

8. **Enable Media Replace**
   - Purpose: Replace images without changing URLs
   - Cost: Free
   - Priority: LOW

9. **WP Migrate DB**
   - Purpose: Move from staging to production
   - Cost: Free (Pro for push/pull)
   - Priority: LOW (useful for launch)

10. **Query Monitor**
   - Purpose: Debugging and performance monitoring
   - Cost: Free
   - Priority: LOW (development only)

---

## Pre-Launch Checklist

### **Technical:**
- [ ] All pages load correctly
- [ ] All links work
- [ ] All images display
- [ ] All videos play
- [ ] All forms submit
- [ ] SSL certificate active
- [ ] 404 page created
- [ ] Favicon uploaded
- [ ] No console errors
- [ ] No 404 asset errors
- [ ] Performance score >80
- [ ] Mobile responsive
- [ ] Cross-browser tested

### **Content:**
- [ ] All placeholder text replaced
- [ ] All images licensed
- [ ] All videos licensed
- [ ] All contact info correct
- [ ] Privacy policy page
- [ ] Terms of service page
- [ ] Copyright year current

### **SEO:**
- [ ] Page titles optimized
- [ ] Meta descriptions added
- [ ] Alt text on all images
- [ ] XML sitemap generated
- [ ] Google Analytics installed
- [ ] Google Search Console set up
- [ ] robots.txt configured

### **Security:**
- [ ] Strong admin password
- [ ] Limited login attempts
- [ ] Security plugin installed
- [ ] WordPress updated
- [ ] Plugins updated
- [ ] Themes updated
- [ ] Backup scheduled

### **Legal:**
- [ ] Privacy policy updated
- [ ] Cookie notice (if needed)
- [ ] GDPR compliance (if applicable)
- [ ] Terms of service
- [ ] Copyright notices

---

## Resources & References

### **WordPress Documentation:**
- Official Codex: https://codex.wordpress.org/
- Theme Handbook: https://developer.wordpress.org/themes/
- Plugin Handbook: https://developer.wordpress.org/plugins/

### **Optimization Tools:**
- Google PageSpeed Insights: https://pagespeed.web.dev/
- GTmetrix: https://gtmetrix.com/
- TinyPNG: https://tinypng.com/
- HandBrake: https://handbrake.fr/

### **Learning Resources:**
- WPBeginner: https://www.wpbeginner.com/
- WP Engine Resource Center: https://wpengine.com/resources/
- CSS-Tricks WordPress: https://css-tricks.com/tag/wordpress/

### **Support:**
- Bluehost Support: https://www.bluehost.com/help
- WordPress Forums: https://wordpress.org/support/
- Stack Overflow: https://stackoverflow.com/questions/tagged/wordpress

---

## Next Session Preparation

### **Before Our Next Session (Tuesday, Oct 14):**

**Your Tasks:**
- [ ] Log into Bluehost, document account details
- [ ] Install WordPress on staging environment
- [ ] Purchase ACF Pro license (or confirm free version is OK)
- [ ] List any specific questions or concerns
- [ ] Review this guide, mark any unclear sections

**We Will Do Together:**
- Create theme file structure
- Build functions.php
- Build header.php and footer.php
- Set up asset enqueuing
- Convert navigation to WordPress menus
- Test basic theme activation

### **Questions to Consider:**
1. Do you want to use ACF Pro ($49) or free version?
2. Should videos be in theme or use CDN?
3. Which caching plugin: WP Rocket (paid) or W3 Total Cache (free)?
4. Do you need GDPR compliance features?
5. Will you need blog functionality immediately?

---

## Document Version History

| Version | Date | Changes | Author |
|---------|------|---------|--------|
| 1.0 | Oct 13, 2025 | Initial deployment guide created | Cursor AI |

---

**END OF DEPLOYMENT GUIDE**

Ready to deploy! 🚀

