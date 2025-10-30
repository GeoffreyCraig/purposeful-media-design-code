# Text Block Organism - Component Documentation

**Component Type:** Organism  
**Category:** Content / Page Content Block  
**Version:** 1.0  
**Last Updated:** October 7, 2025  
**Figma Reference:** Node IDs provided for Narrative, Pillar Page, and Topic layouts

---

## Overview

The Text Block organism is a comprehensive single-column content area component designed for blog posts, articles, pillar pages, and long-form content. It showcases all typography variants from the atoms layer and integrates both symbolic and UI icon systems.

### Key Features

- **Three Layout Variants:** Narrative, Pillar Page, and Topic layouts
- **Complete Typography Showcase:** H1-H6 headlines, lead/default/small paragraphs, lists, blockquotes
- **Icon Integration:** Both symbolic (`icon-display`) and UI (`ui-icon-display`) molecules
- **WordPress Compatible:** Structured for easy CMS integration
- **Fully Responsive:** Mobile (380-767px), Tablet (768-1149px), Desktop (1150-1919px), Desktop+ (1920px+)
- **Accessibility Compliant:** WCAG AA standards, proper heading hierarchy, focus states

---

## File Structure

```
/components/organisms/
  ├── text-block.html                    # Main component file
  └── TEXT-BLOCK-README.md              # This documentation

/styles/
  └── organisms-text-block.css          # Component styles
```

---

## Dependencies

### Required Stylesheets
```html
<link rel="stylesheet" href="../../styles/variables-v2.0-20250915.css">
<link rel="stylesheet" href="../../styles/atoms-master.css">
<link rel="stylesheet" href="../../styles/molecules-icon-display.css">
<link rel="stylesheet" href="../../styles/molecules-ui-icon-display.css">
<link rel="stylesheet" href="../../styles/organisms-text-block.css">
```

### Font Imports (included in variables-v2.0-20250915.css)
- **Lato:** Headlines, labels, buttons (weights: 400, 700, 900)
- **Open Sans:** Body text, paragraphs (weights: 400, 600)

### Icon Dependencies
- **Symbolic Icons:** `/assets/svg/decorative-icons/purposeful-sprite-symbolic.svg` (21 icons)
- **UI Icons:** `/assets/svg/ui-icons/purposeful-sprite-ui.svg` (9 icons)

---

## Layout Variants

### 1. Narrative Layout (`text-block--narrative`)
**Use Case:** Blog posts, standard articles, news content  
**Max Width:** 768px  
**Best For:** Easy reading, medium-length content

```html
<section class="text-block text-block--narrative" data-layout="narrative">
    <div class="text-block__container">
        <article class="text-block__content">
            <!-- Content here -->
        </article>
    </div>
</section>
```

### 2. Pillar Page Layout (`text-block--pillar`)
**Use Case:** Comprehensive guides, ultimate resources, in-depth content  
**Max Width:** 900px  
**Best For:** Long-form content with multiple sections, table of contents

```html
<section class="text-block text-block--pillar" data-layout="pillar">
    <div class="text-block__container">
        <article class="text-block__content">
            <!-- Content here -->
        </article>
    </div>
</section>
```

### 3. Topic Layout (`text-block--topic`)
**Use Case:** Focused articles, how-to guides, specific topics  
**Max Width:** 800px  
**Best For:** Balanced between narrative and pillar, good for categorized content

```html
<section class="text-block text-block--topic" data-layout="topic">
    <div class="text-block__container">
        <article class="text-block__content">
            <!-- Content here -->
        </article>
    </div>
</section>
```

---

## Typography Examples

### Headlines (H1-H6)

```html
<!-- H1 - Page Title -->
<h1 class="headline headline--h1">Main Page Headline</h1>

<!-- H2 - Major Sections -->
<h2 class="headline headline--h2">Major Section Heading</h2>

<!-- H3 - Subsections -->
<h3 class="headline headline--h3">Subsection Heading</h3>

<!-- H4 - Detail Sections -->
<h4 class="headline headline--h4">Detailed Subsection</h4>

<!-- H5 - Minor Sections -->
<h5 class="headline headline--h5">Minor Section</h5>

<!-- H6 - Smallest Heading -->
<h6 class="headline headline--h6">Additional Details</h6>
```

### Paragraph Variants

```html
<!-- Lead Paragraph - Introductory text -->
<p class="paragraph paragraph--lead">
    This is a lead paragraph with larger text (21px) for introductions.
</p>

<!-- Default Paragraph - Standard body text -->
<p class="paragraph paragraph--default">
    This is standard body text at 18px for main content.
</p>

<!-- Large Paragraph - Callouts and emphasis -->
<p class="paragraph paragraph--large">
    Large paragraph at 24px for callouts and key takeaways.
</p>

<!-- Small Paragraph - Fine print -->
<p class="paragraph paragraph--small">
    Small text at 12px for disclaimers and footnotes.
</p>

<!-- Helper Text - Italic notes -->
<p class="paragraph paragraph--helper">
    Helper text in italics for supplementary information.
</p>
```

### Lists

#### Unordered List
```html
<ul class="text-block__list text-block__list--unordered">
    <li class="text-block__list-item">
        <span class="paragraph paragraph--default">First item</span>
    </li>
    <li class="text-block__list-item">
        <span class="paragraph paragraph--default">Second item</span>
    </li>
</ul>
```

#### Ordered List
```html
<ol class="text-block__list text-block__list--ordered">
    <li class="text-block__list-item">
        <span class="paragraph paragraph--default">Step one</span>
    </li>
    <li class="text-block__list-item">
        <span class="paragraph paragraph--default">Step two</span>
    </li>
</ol>
```

#### Icon Bullet List (UI Icons)
```html
<ul class="text-block__icon-list">
    <li class="text-block__icon-list-item">
        <span class="ui-icon-display ui-icon-display--small" data-icon="check" data-color="teal"></span>
        <span class="paragraph paragraph--default">Item with checkmark icon</span>
    </li>
    <li class="text-block__icon-list-item">
        <span class="ui-icon-display ui-icon-display--small" data-icon="diamond" data-color="navy"></span>
        <span class="paragraph paragraph--default">Item with diamond icon</span>
    </li>
</ul>
```

### Blockquote

```html
<blockquote class="text-block__quote">
    <div class="quote-container">
        <p class="quote quote--large">
            "Your testimonial or quote text here."
        </p>
        <cite class="quote-attribution">
            <span class="quote-attribution__name">Author Name</span>
            <span class="quote-attribution__role">, Title, Company</span>
        </cite>
    </div>
</blockquote>
```

---

## Icon Integration

### Symbolic Icons (icon-display molecule)

#### Inline Icon in Paragraph
```html
<p class="paragraph paragraph--default">
    <span class="icon-display icon-display--small" data-icon="momentum" data-color="navy" 
          style="vertical-align: middle; margin-right: 8px;"></span>
    Text with inline icon.
</p>
```

#### Icon Callout Box
```html
<div class="text-block__icon-callout">
    <div class="icon-display icon-display--medium" data-icon="expertise" data-color="navy"></div>
    <div class="text-block__icon-callout-content">
        <h4 class="headline headline--h4">Callout Heading</h4>
        <p class="paragraph paragraph--default">Callout content with icon.</p>
    </div>
</div>
```

#### Icon Grid (3-column layout)
```html
<div class="text-block__icon-grid">
    <div class="text-block__icon-grid-item">
        <div class="icon-display icon-display--large" data-icon="attract" data-color="navy"></div>
        <h4 class="headline headline--h5">Attract</h4>
        <p class="paragraph paragraph--default">Description text.</p>
    </div>
    <div class="text-block__icon-grid-item">
        <div class="icon-display icon-display--large" data-icon="engage" data-color="navy"></div>
        <h4 class="headline headline--h5">Engage</h4>
        <p class="paragraph paragraph--default">Description text.</p>
    </div>
    <div class="text-block__icon-grid-item">
        <div class="icon-display icon-display--large" data-icon="delight" data-color="navy"></div>
        <h4 class="headline headline--h5">Delight</h4>
        <p class="paragraph paragraph--default">Description text.</p>
    </div>
</div>
```

#### Highlight Box with Icon
```html
<div class="text-block__highlight">
    <div class="icon-display icon-display--medium" data-icon="roi" data-color="gold"></div>
    <div class="text-block__highlight-content">
        <p class="paragraph paragraph--large">Key statistic or highlight text.</p>
        <p class="paragraph paragraph--small">Source citation.</p>
    </div>
</div>
```

### Available Symbolic Icons (21 total)
- `accelerate`, `attract`, `contact`, `delight`, `download`
- `efficiency`, `email`, `engage`, `exit`, `expertise`
- `inbound`, `momentum`, `news`, `persona`, `professional`
- `roi`, `schedule`, `strategy`, `unit`, `value`, `webinar`

**Colors:** `navy`, `gray`, `dark`, `white`  
**Sizes:** `small` (30px), `medium` (60px), `large` (90px), `xlarge` (120px)

### Available UI Icons (9 total)
- `search`, `arrow-up`, `play`, `pause`, `hamburger`
- `close`, `diamond`, `check`, `dot`

**Colors:** `navy`, `gold`, `gray`, `white`, `teal`  
**Sizes:** `small` (16px), `medium` (24px), `large` (32px), `xlarge` (48px)

---

## Special Components

### Table of Contents

```html
<nav class="text-block__toc">
    <h2 class="headline headline--h4">In This Guide</h2>
    <ol class="text-block__toc-list">
        <li class="text-block__toc-item">
            <a href="#section-1" class="text-link text-link--primary">Section Title</a>
        </li>
        <li class="text-block__toc-item">
            <a href="#section-2" class="text-link text-link--primary">Section Title</a>
        </li>
    </ol>
</nav>
```

### Article Meta Information

```html
<div class="text-block__meta">
    <span class="paragraph paragraph--small">Published: October 7, 2025</span>
    <span class="paragraph paragraph--small">Reading Time: 8 minutes</span>
    <span class="paragraph paragraph--small">Category: Strategy</span>
</div>
```

### Footer Notes

```html
<footer class="text-block__footer">
    <p class="paragraph paragraph--helper">
        Footer notes, disclaimers, or supplementary information.
    </p>
</footer>
```

---

## Responsive Behavior

### Desktop+ (1920px+)
- Container max-width: 1920px
- Side margins: 40px
- Full typography scale
- Icon grids: 3 columns

### Desktop (1150px - 1919px)
- Container: 100% width with 40px margins
- Full typography scale
- Icon grids: 3 columns

### Tablet (768px - 1149px)
- Container: 100% width with 40px margins
- Content max-width: 100%
- Reduced spacing
- Icon grids: 2 columns

### Mobile (380px - 767px)
- Container: 100% width with 20px margins
- Content max-width: 100%
- Typography scales down (H1: 36px → mobile sizing)
- Icon grids: 1 column
- Icon callouts stack vertically

---

## WordPress Integration

### Content Area Implementation

The text-block organism is designed to integrate seamlessly with WordPress:

```php
<!-- WordPress Page Template -->
<section class="text-block text-block--narrative">
    <div class="text-block__container">
        <article class="text-block__content">
            <?php the_content(); ?>
        </article>
    </div>
</section>
```

### Gutenberg Block Support

The component supports WordPress core blocks:
- Images (with alignment classes)
- Embeds (video, social media)
- Standard blocks (paragraphs, headings, lists)

### Custom Post Types

Works with any WordPress post type:
- Posts → Narrative layout
- Pages → Topic or Pillar layout
- Custom post types → Any layout

---

## Accessibility

### Semantic HTML
- Proper heading hierarchy (H1 → H2 → H3, no skipping)
- `<article>` for main content
- `<section>` for content sections
- `<nav>` for table of contents

### ARIA Labels
```html
<section class="text-block" role="main" aria-label="Article Content">
```

### Focus States
- All links have visible focus outlines
- Focus outline: 2px solid gold (#D4AF37)
- Focus offset: 2px

### Color Contrast
- Body text: #51585E on white (WCAG AA compliant)
- Headings: #1B1464 on white (WCAG AAA compliant)
- Links: #1D50DE with underline

### Reduced Motion
Component respects `prefers-reduced-motion` media query.

---

## Performance Considerations

### Image Optimization
- Use WebP format with JPEG fallback
- Implement lazy loading for images below the fold
- Add `loading="lazy"` attribute to images

### Font Loading
- Fonts imported via Google Fonts with `display=swap`
- System fonts as fallback

### CSS Performance
- Single CSS file import
- No inline styles (except demo sections)
- Efficient selectors (BEM methodology)

---

## Browser Support

### Tested Browsers
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

### Fallbacks
- CSS Grid with flexbox fallback
- CSS custom properties with fallback values

---

## Customization

### Changing Max Width

Edit in `organisms-text-block.css`:

```css
.text-block--narrative .text-block__content {
    max-width: 768px; /* Change this value */
}
```

### Adjusting Spacing

Modify spacing tokens in `variables-v2.0-20250915.css`:

```css
:root {
    --space-8: 2rem;   /* 32px - section spacing */
    --space-12: 3rem;  /* 48px - large section spacing */
}
```

### Custom Icon Colors

Create new color variants in `molecules-icon-display.css`:

```css
.icon-display--custom[data-color="custom"] {
    /* Add custom icon color styles */
}
```

---

## Common Use Cases

### Blog Post Template

```html
<section class="text-block text-block--narrative">
    <div class="text-block__container">
        <article class="text-block__content">
            <header class="text-block__header">
                <h1 class="headline headline--h1"><?php the_title(); ?></h1>
                <div class="text-block__meta">
                    <span class="paragraph paragraph--small"><?php the_date(); ?></span>
                    <span class="paragraph paragraph--small">By <?php the_author(); ?></span>
                </div>
            </header>
            
            <?php the_content(); ?>
        </article>
    </div>
</section>
```

### Landing Page Content

```html
<section class="text-block text-block--topic">
    <div class="text-block__container">
        <article class="text-block__content">
            <header class="text-block__header">
                <h1 class="headline headline--h1">Service Name</h1>
                <p class="paragraph paragraph--lead">Compelling value proposition.</p>
            </header>
            
            <!-- Icon grid showcasing benefits -->
            <div class="text-block__icon-grid">
                <!-- Icon items -->
            </div>
            
            <!-- Detailed content sections -->
        </article>
    </div>
</section>
```

### Resource Guide

```html
<section class="text-block text-block--pillar">
    <div class="text-block__container">
        <article class="text-block__content">
            <header class="text-block__header">
                <h1 class="headline headline--h1">Ultimate Guide Title</h1>
                <p class="paragraph paragraph--lead">Comprehensive introduction.</p>
            </header>
            
            <!-- Table of Contents -->
            <nav class="text-block__toc">
                <!-- TOC items -->
            </nav>
            
            <!-- Main content with sections -->
        </article>
    </div>
</section>
```

---

## Troubleshooting

### Icons Not Displaying
1. Verify sprite SVG path in CSS
2. Check that icon name matches available icons
3. Ensure CSS files are loaded in correct order

### Spacing Issues
1. Verify CSS custom properties are imported
2. Check for conflicting styles from other components
3. Clear browser cache

### Responsive Breakpoints Not Working
1. Ensure viewport meta tag is in `<head>`
2. Check media query syntax in CSS
3. Test in actual devices, not just browser resize

---

## Version History

### Version 1.0 (October 7, 2025)
- Initial release
- Three layout variants (Narrative, Pillar, Topic)
- Complete typography showcase (H1-H6, all paragraph variants)
- Icon integration (symbolic and UI icons)
- Fully responsive design
- WordPress compatibility
- Accessibility compliance (WCAG AA)

---

## Support & Resources

### Documentation
- Design System Rules: `.cursorrules` in project root
- Component Documentation: This file
- Figma Source: Node IDs provided in component

### Design Tokens Reference
- `variables-v2.0-20250915.css` - Complete design tokens
- `atoms-master.css` - Typography and base styles

### Icon References
- `icon-display.html` - Symbolic icons demo
- `ui-icon-display.html` - UI icons demo

---

## Credits

**Component Design:** Purposeful Media Design System  
**Version:** 1.0  
**License:** Proprietary  
**Methodology:** Atomic Design (Organism Layer)

---

*This component is part of the Purposeful Media Design System and follows atomic design methodology. It integrates atoms (typography, buttons) and molecules (icon-display, ui-icon-display) to create a comprehensive content organism.*
