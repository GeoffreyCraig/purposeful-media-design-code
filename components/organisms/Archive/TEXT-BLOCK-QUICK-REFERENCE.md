# Text Block Organism - Quick Reference Guide

## 🚀 Quick Start

### Basic Structure
```html
<section class="text-block text-block--narrative">
    <div class="text-block__container">
        <article class="text-block__content">
            <!-- Your content here -->
        </article>
    </div>
</section>
```

### Required CSS Imports
```html
<link rel="stylesheet" href="../../styles/variables-v2.0-20250915.css">
<link rel="stylesheet" href="../../styles/atoms-master.css">
<link rel="stylesheet" href="../../styles/molecules-icon-display.css">
<link rel="stylesheet" href="../../styles/molecules-ui-icon-display.css">
<link rel="stylesheet" href="../../styles/organisms-text-block.css">
```

---

## 📐 Layout Variants

| Layout | Class | Max Width | Best For |
|--------|-------|-----------|----------|
| **Narrative** | `text-block--narrative` | 768px | Blog posts, articles |
| **Pillar Page** | `text-block--pillar` | 900px | Comprehensive guides |
| **Topic** | `text-block--topic` | 800px | Focused articles |

---

## 📝 Typography Cheat Sheet

### Headlines
```html
<h1 class="headline headline--h1">48px - Main Title</h1>
<h2 class="headline headline--h2">36px - Section</h2>
<h3 class="headline headline--h3">30px - Subsection</h3>
<h4 class="headline headline--h4">24px - Detail</h4>
<h5 class="headline headline--h5">21px - Minor</h5>
<h6 class="headline headline--h6">18px - Smallest</h6>
```

### Paragraphs
```html
<p class="paragraph paragraph--lead">21px - Intro</p>
<p class="paragraph paragraph--default">18px - Body</p>
<p class="paragraph paragraph--large">24px - Callout</p>
<p class="paragraph paragraph--small">12px - Fine Print</p>
```

---

## 📋 Lists

### Standard List
```html
<ul class="text-block__list text-block__list--unordered">
    <li class="text-block__list-item">
        <span class="paragraph paragraph--default">Item</span>
    </li>
</ul>
```

### Icon List (Checkmarks)
```html
<ul class="text-block__icon-list">
    <li class="text-block__icon-list-item">
        <span class="ui-icon-display ui-icon-display--small" 
              data-icon="check" data-color="teal"></span>
        <span class="paragraph paragraph--default">Item</span>
    </li>
</ul>
```

---

## 🎨 Icon Components

### Symbolic Icons (Decorative)

**Quick Copy:**
```html
<div class="icon-display icon-display--medium" 
     data-icon="expertise" data-color="navy"></div>
```

**Available Icons (21):**
`accelerate`, `attract`, `contact`, `delight`, `download`, `efficiency`, `email`, `engage`, `exit`, `expertise`, `inbound`, `momentum`, `news`, `persona`, `professional`, `roi`, `schedule`, `strategy`, `unit`, `value`, `webinar`

**Sizes:** `small` (30px), `medium` (60px), `large` (90px), `xlarge` (120px)  
**Colors:** `navy`, `gray`, `dark`, `white`

### UI Icons (Functional)

**Quick Copy:**
```html
<span class="ui-icon-display ui-icon-display--small" 
      data-icon="check" data-color="teal"></span>
```

**Available Icons (9):**
`search`, `arrow-up`, `play`, `pause`, `hamburger`, `close`, `diamond`, `check`, `dot`

**Sizes:** `small` (16px), `medium` (24px), `large` (32px), `xlarge` (48px)  
**Colors:** `navy`, `gold`, `gray`, `white`, `teal`

---

## 💎 Special Components

### Icon Callout Box
```html
<div class="text-block__icon-callout">
    <div class="icon-display icon-display--medium" 
         data-icon="expertise" data-color="navy"></div>
    <div class="text-block__icon-callout-content">
        <h4 class="headline headline--h4">Title</h4>
        <p class="paragraph paragraph--default">Content</p>
    </div>
</div>
```

### Icon Grid (3 Columns)
```html
<div class="text-block__icon-grid">
    <div class="text-block__icon-grid-item">
        <div class="icon-display icon-display--large" 
             data-icon="attract" data-color="navy"></div>
        <h4 class="headline headline--h5">Title</h4>
        <p class="paragraph paragraph--default">Text</p>
    </div>
    <!-- Repeat 2 more times -->
</div>
```

### Highlight Box
```html
<div class="text-block__highlight">
    <div class="icon-display icon-display--medium" 
         data-icon="roi" data-color="gold"></div>
    <div class="text-block__highlight-content">
        <p class="paragraph paragraph--large">Stat or highlight</p>
    </div>
</div>
```

### Blockquote
```html
<blockquote class="text-block__quote">
    <div class="quote-container">
        <p class="quote quote--large">"Quote text"</p>
        <cite class="quote-attribution">
            <span class="quote-attribution__name">Name</span>
            <span class="quote-attribution__role">, Title</span>
        </cite>
    </div>
</blockquote>
```

### Table of Contents
```html
<nav class="text-block__toc">
    <h2 class="headline headline--h4">In This Guide</h2>
    <ol class="text-block__toc-list">
        <li class="text-block__toc-item">
            <a href="#section-1" class="text-link text-link--primary">
                Section Title
            </a>
        </li>
    </ol>
</nav>
```

---

## 📱 Responsive Breakpoints

| Breakpoint | Width | Container Padding | Content Width |
|------------|-------|-------------------|---------------|
| **Mobile** | 380-767px | 20px | 100% |
| **Tablet** | 768-1149px | 40px | 100% |
| **Desktop** | 1150-1919px | 40px | Layout specific |
| **Desktop+** | 1920px+ | 40px | Layout specific |

---

## ⚡ Common Patterns

### Blog Post Header
```html
<header class="text-block__header">
    <h1 class="headline headline--h1">Post Title</h1>
    <div class="text-block__meta">
        <span class="paragraph paragraph--small">Oct 7, 2025</span>
        <span class="paragraph paragraph--small">Category</span>
    </div>
    <p class="paragraph paragraph--lead">Introduction text</p>
</header>
```

### Section with Icon List
```html
<section class="text-block__section">
    <h2 class="headline headline--h2">Section Title</h2>
    <p class="paragraph paragraph--default">Intro paragraph</p>
    
    <ul class="text-block__icon-list">
        <li class="text-block__icon-list-item">
            <span class="ui-icon-display ui-icon-display--small" 
                  data-icon="check" data-color="teal"></span>
            <span class="paragraph paragraph--default">Item 1</span>
        </li>
    </ul>
</section>
```

### Inline Icon in Text
```html
<p class="paragraph paragraph--default">
    <span class="icon-display icon-display--small" 
          data-icon="momentum" data-color="navy" 
          style="vertical-align: middle; margin-right: 8px;"></span>
    Text with inline icon.
</p>
```

---

## 🎯 WordPress Integration

### Simple Page Template
```php
<section class="text-block text-block--narrative">
    <div class="text-block__container">
        <article class="text-block__content">
            <?php the_content(); ?>
        </article>
    </div>
</section>
```

### Blog Post Template
```php
<section class="text-block text-block--narrative">
    <div class="text-block__container">
        <article class="text-block__content">
            <header class="text-block__header">
                <h1 class="headline headline--h1">
                    <?php the_title(); ?>
                </h1>
                <div class="text-block__meta">
                    <span class="paragraph paragraph--small">
                        <?php the_date(); ?>
                    </span>
                    <span class="paragraph paragraph--small">
                        By <?php the_author(); ?>
                    </span>
                </div>
            </header>
            
            <?php the_content(); ?>
        </article>
    </div>
</section>
```

---

## 🐛 Troubleshooting

| Issue | Solution |
|-------|----------|
| Icons not showing | Check SVG path in CSS, verify icon names |
| Spacing too tight | Ensure variables CSS is loaded first |
| Not responsive | Add viewport meta tag to `<head>` |
| Typography wrong size | Check atoms-master.css is imported |
| Layout too wide | Verify layout variant class is applied |

---

## ✅ Pre-Launch Checklist

- [ ] CSS files imported in correct order
- [ ] Icon sprite SVGs accessible
- [ ] Viewport meta tag in `<head>`
- [ ] Heading hierarchy is logical (H1 → H2 → H3)
- [ ] All images have alt text
- [ ] Links have descriptive text
- [ ] Test on mobile device
- [ ] Check color contrast
- [ ] Verify icon data attributes are correct
- [ ] Test with JavaScript disabled

---

## 🔗 Resources

- **Full Documentation:** `TEXT-BLOCK-README.md`
- **Component File:** `text-block.html`
- **Styles:** `organisms-text-block.css`
- **Design Tokens:** `variables-v2.0-20250915.css`

---

## 💡 Pro Tips

1. **Icon Selection:** Use symbolic icons for concepts, UI icons for actions
2. **Layout Choice:** Narrative for blogs, Pillar for guides, Topic for landing pages
3. **Heading Hierarchy:** Never skip heading levels (H1 → H3 ❌, H1 → H2 ✅)
4. **Spacing:** Use provided classes, avoid custom margins
5. **Accessibility:** Always include alt text and proper ARIA labels
6. **Performance:** Lazy load images below the fold
7. **WordPress:** Use layout classes on section wrapper, not inside `<?php the_content(); ?>`

---

**Version:** 1.0 | **Updated:** October 7, 2025 | **Component Type:** Organism
