# Generic Text Block ACF Implementation Guide
**Week 47 Thursday - November 20, 2025**

## Overview

This guide documents the implementation of a flexible, reusable ACF-powered text block component with style variants controlled via CSS tokens. This system replaces hard-coded text block sections across multiple page templates with a single, maintainable component.

---

## What Was Created

### 1. ACF Field Group JSON
**File:** `/wordpress-theme/ACF Files/acf-text-block-generic.json`

**Field Structure:**
- **Field Group:** `text-block-generic`
- **Type:** Repeater field for multiple sections
- **Location Rules:** Available on:
  - Default page template (page.php)
  - About & Contact template
  - Pillar Page template
  - Resources template
  - Blog posts (single.php)

**Repeater Sub-Fields:**
1. `section_heading` (Text) - Optional H2 heading
2. `section_content` (WYSIWYG) - Required main content
3. `section_style_variant` (Select) - Visual style choice
4. `section_icon` (Select) - Optional decorative icon
5. `section_icon_color` (Select) - Icon color (conditional on icon selection)
6. `section_anchor` (Text) - Optional anchor ID for linking

**Style Variant Options:**
- `default` - Standard body text styling (800px width)
- `wide` - Full width layout (100% width)
- `narrative` - Blog post style (800px width)
- `pillar` - Guide style with gray background (900px width)
- `featured` - Emphasized content with border (800px width, boxed)
- `sidebar` - Condensed style (400px width, smaller text)

---

### 2. CSS Style Tokens
**File:** `/wordpress-theme/purposeful-media/assets/css/variables-v4.0-20251027.css`

**Added 70+ tokens in new section:**
```css
/* TEXT BLOCK COMPONENT (NEW - Week 47 Thursday) */
```

**Token Categories:**
- Base layout tokens (padding, margins, max-widths)
- Variant-specific tokens (default, wide, narrative, pillar, featured, sidebar)
- Icon integration tokens
- List styling tokens
- Typography spacing tokens
- Quote styling tokens

**Key Tokens:**
- `--text-block-default-max-width: 800px`
- `--text-block-wide-max-width: 100%`
- `--text-block-pillar-bg: var(--color-neutral-50)`
- `--text-block-featured-border: 2px solid var(--color-accent-500)`
- `--text-block-sidebar-max-width: 400px`

---

### 3. Updated CSS Component
**File:** `/wordpress-theme/purposeful-media/assets/css/organisms-text-block.css`

**Added Section (lines 765-900):**
- Featured variant styles (bordered box with gradient)
- Sidebar variant styles (condensed, smaller text)
- Icon header positioning
- Explicit default and wide variant token usage
- Responsive overrides for mobile/tablet

**Key Features:**
- All styles reference CSS tokens (no hard-coded values)
- Full responsive support (Mobile/Tablet/Desktop/DesktopPlus)
- Icon integration with proper sizing adjustments
- Maintains existing text-block functionality

---

### 4. PHP Template Part
**File:** `/wordpress-theme/purposeful-media/template-parts/text-block-generic.php`

**Functionality:**
- Loops through ACF repeater `text_block_sections`
- Renders each section with correct BEM classes
- Conditionally displays heading, icon, and content
- Adds anchor IDs when specified
- Outputs icon initialization JavaScript
- Includes fallback message if no sections exist

**Usage Pattern:**
```php
<?php get_template_part( 'template-parts/text-block-generic' ); ?>
```

---

## Implementation Steps

### Step 1: Import ACF Field Group ✅

1. Log in to WordPress Admin
2. Navigate to **ACF → Tools → Import Field Groups**
3. Upload `/wordpress-theme/ACF Files/acf-text-block-generic.json`
4. Verify field group appears in ACF → Field Groups
5. Check location rules match your templates

**Verify:**
- Field group visible in WordPress admin
- Appears on correct page templates
- All 6 sub-fields present
- Style variant dropdown has 6 options
- Icon select has 21 icon choices

---

### Step 2: Update Template Files ⏳

**Templates to Update:**
1. ✅ `page.php` (Interior Page)
2. ⏳ `template-about-contact.php` (About & Contact)
3. ⏳ `template-pillar-page.php` (Pillar Page)
4. ⏳ `template-resource.php` (Resources)
5. ⏳ `single.php` (Blog posts)

**Replacement Pattern:**

**BEFORE (Hard-coded):**
```php
<!-- Text Block: About Us Content (Wide Layout) -->
<section class="text-block text-block--wide" data-layout="wide">
    <div class="text-block__container">
        <article class="text-block__content">
            <header class="text-block__header">
                <h1 class="headline headline--h1"><?php _e('Transforming B2B Marketing...', 'purposeful-media'); ?></h1>
                <!-- More hard-coded content -->
            </header>
        </article>
    </div>
</section>
```

**AFTER (ACF-powered):**
```php
<!-- ========================================
     TEXT BLOCK SECTIONS (ACF Generic)
     Date: November 20, 2025

     Dynamic Content via ACF Repeater:
     - text_block_sections (repeater)
       - section_heading
       - section_content
       - section_style_variant
       - section_icon (optional)
       - section_icon_color
       - section_anchor (optional)

     Location: Interior, About, Pillar, Resources
     ======================================== -->
<?php get_template_part( 'template-parts/text-block-generic' ); ?>
```

---

### Step 3: Configure Content in WordPress Admin

For each page template:

1. **Edit the page** in WordPress admin
2. Scroll to **"Text Block - Generic"** field group
3. Click **"Add Text Block Section"**
4. Fill in fields:
   - **Section Heading:** (Optional) Add H2 heading
   - **Section Content:** Add WYSIWYG content
   - **Style Variant:** Choose visual style
   - **Section Icon:** (Optional) Choose icon
   - **Icon Color:** (If icon selected) Choose color
   - **Anchor ID:** (Optional) For sticky menu linking
5. **Add more sections** as needed (unlimited)
6. Click **Update** to save

---

### Step 4: Testing Checklist ⏳

**Per Template Testing:**
- [ ] Field group appears in WordPress admin editor
- [ ] Can add/remove/reorder sections in repeater
- [ ] WYSIWYG editor functions properly
- [ ] All 6 style variants selectable

**Per Variant Testing:**
- [ ] **Default:** 800px width, white background, standard spacing
- [ ] **Wide:** Full width (100%), white background
- [ ] **Narrative:** 800px width, blog post style
- [ ] **Pillar:** 900px width, gray background (#F6F6F7)
- [ ] **Featured:** 800px width, bordered box, gradient background
- [ ] **Sidebar:** 400px width, condensed text, white card with shadow

**Icon Testing:**
- [ ] Icon displays when selected
- [ ] Icon hidden when not selected
- [ ] Icon colors apply correctly (navy, gray, dark, white)
- [ ] Icon sizes appropriate per variant

**Responsive Testing:**
- [ ] **Mobile (380-767px):** All variants stack properly
- [ ] **Tablet (768-1149px):** Appropriate width adjustments
- [ ] **Desktop (1150-1919px):** Correct max-widths maintained
- [ ] **DesktopPlus (1920px+):** Containerization working

**Content Testing:**
- [ ] Headings display when populated
- [ ] Headings hide when empty
- [ ] WYSIWYG content renders with formatting
- [ ] Lists display correctly
- [ ] Links are functional
- [ ] Anchor IDs work for sticky menu linking

---

## Example Content Setup

### Example 1: About Page - "Our Mission" Section

**WordPress Admin Configuration:**
- **Section Heading:** Our Mission
- **Section Content:**
  ```
  We believe that every business deserves access to professional marketing resources that drive real results. Our mission is to provide B2B companies with the strategic support, creative expertise, and tactical execution needed to compete and thrive in today's marketplace.

  Whether you're a growing startup or an established enterprise, we bring the experience and dedication necessary to elevate your marketing efforts and generate meaningful business outcomes.
  ```
- **Style Variant:** Wide
- **Section Icon:** (empty)
- **Anchor ID:** mission

**Output:** Full-width text block with two paragraphs, linkable via `#mission`

---

### Example 2: Pillar Page - "Key Benefits" Section

**WordPress Admin Configuration:**
- **Section Heading:** Key Benefits
- **Section Content:**
  ```
  Our strategic approach delivers measurable results that transform your B2B marketing efforts.

  <ul>
    <li>Increased lead generation by 40% on average</li>
    <li>Improved conversion rates through targeted messaging</li>
    <li>Enhanced brand recognition in your industry</li>
  </ul>
  ```
- **Style Variant:** Pillar
- **Section Icon:** roi
- **Icon Color:** navy
- **Anchor ID:** benefits

**Output:** 900px width section with gray background, ROI icon above heading, bulleted list

---

### Example 3: Resource Page - "Featured Guide" Section

**WordPress Admin Configuration:**
- **Section Heading:** The Complete B2B Marketing ROI Guide
- **Section Content:**
  ```
  Download our comprehensive guide to understanding and improving your marketing ROI. This 50-page resource includes:

  <ul>
    <li>ROI calculation frameworks</li>
    <li>Industry benchmarks</li>
    <li>Case studies from real B2B companies</li>
  </ul>
  ```
- **Style Variant:** Featured
- **Section Icon:** download
- **Icon Color:** navy
- **Anchor ID:** (empty)

**Output:** Bordered, gradient background box with download icon, emphasized styling

---

## Technical Notes

### CSS Token Inheritance

All variants inherit base text-block styles from lines 40-150 in `organisms-text-block.css`:
- Typography spacing (H1-H6, paragraphs, lists)
- Icon integration (callouts, grids, highlights)
- Blockquotes
- Table of contents
- WordPress compatibility classes

Variants only override specific properties via tokens:
- Background colors
- Max-widths
- Padding/spacing adjustments
- Border/shadow treatments

### JavaScript Requirements

The template part includes icon initialization JavaScript:
```javascript
document.addEventListener('DOMContentLoaded', function() {
    const icons = document.querySelectorAll('.text-block .decorative-icon-display');
    icons.forEach(icon => {
        const iconName = icon.getAttribute('data-icon');
        const color = icon.getAttribute('data-color');
        if (iconName && color) {
            icon.classList.add(`icon--${iconName}-${color}`);
        }
    });
});
```

This applies icon sprite sheet positioning classes dynamically.

### WordPress Loop Compatibility

The template part does NOT use `have_posts()` / `the_post()` loops. It exclusively reads ACF repeater data via `have_rows()` / `the_row()`.

For blog post content that needs WordPress editor content, continue using the existing pattern in `page.php` lines 48-66:
```php
if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
```

---

## Migration Strategy

### Phase 1: Test on Interior Pages ✅
- Already using wide layout
- Simplest content structure
- Good baseline for testing

### Phase 2: Update About & Contact
- Multiple sections with varied content
- Icon list integration
- Tests wide variant thoroughly

### Phase 3: Update Resources Page
- Mix of variants (wide, featured)
- Resource cards remain separate
- Tests icon integration

### Phase 4: Update Pillar Pages
- Most complex structure
- Sticky menu anchor integration
- Tests pillar variant with gray background

### Phase 5: Update Blog System
- Single post content
- Narrative variant for long-form content
- WordPress editor integration

---

## Troubleshooting

### Issue: Field Group Not Appearing
**Solution:** Check location rules in ACF JSON match template file names exactly.

### Issue: Icons Not Displaying
**Solution:** Verify icon sprite sheet loaded and JavaScript executing. Check browser console for errors.

### Issue: Variant Styles Not Applied
**Solution:**
1. Verify CSS file loaded in correct order (after variables.css)
2. Check browser cache - force refresh with Cmd+Shift+R (Mac) or Ctrl+Shift+R (Windows)
3. Inspect element to confirm correct class applied (e.g., `text-block--featured`)

### Issue: Content Not Saving
**Solution:** Check ACF Pro license active. Verify repeater field saving correctly in database.

### Issue: Responsive Breakpoints Wrong
**Solution:** Clear browser cache. Check viewport width using browser dev tools.

---

## Benefits of This System

### For Developers:
- ✅ Single source of truth for text block styling
- ✅ Token-based system easy to maintain and update
- ✅ No duplicate code across templates
- ✅ Style changes apply globally via CSS tokens
- ✅ Clear separation of content and presentation

### For Content Editors:
- ✅ No code editing required
- ✅ Visual style selection via dropdown
- ✅ WYSIWYG editor for familiar content editing
- ✅ Optional icons enhance visual interest
- ✅ Unlimited sections per page
- ✅ Easy to reorder sections via drag-and-drop

### For Site Performance:
- ✅ Reduced code duplication
- ✅ Efficient CSS with token-based inheritance
- ✅ No inline styles (better caching)
- ✅ Minimal JavaScript overhead

### For Future Maintenance:
- ✅ Add new variants by adding tokens only
- ✅ Update existing variants globally via tokens
- ✅ Easy to extend with new features
- ✅ Compatible with Phase 2 expansion plans

---

## Next Steps

1. ⏳ **Complete template migration** - Update remaining 4 templates
2. ⏳ **Content population** - Add ACF content to all pages
3. ⏳ **Comprehensive testing** - All variants, all breakpoints
4. ⏳ **User training** - Create guide for content editors
5. ⏳ **Version documentation** - Update theme changelog to v2.1.0

---

## Version History

**v1.0.0 - November 20, 2025 (Week 47 Thursday)**
- Initial implementation
- 6 style variants (default, wide, narrative, pillar, featured, sidebar)
- 70+ CSS tokens added
- Template part created
- ACF field group configured
- Location rules for 5 templates + posts

---

## Files Modified/Created

### Created:
1. `/wordpress-theme/ACF Files/acf-text-block-generic.json`
2. `/wordpress-theme/purposeful-media/template-parts/text-block-generic.php`
3. `/wordpress-theme/ACF Files/TEXT-BLOCK-GENERIC-IMPLEMENTATION-GUIDE.md` (this file)

### Modified:
1. `/wordpress-theme/purposeful-media/assets/css/variables-v4.0-20251027.css` (added tokens)
2. `/wordpress-theme/purposeful-media/assets/css/organisms-text-block.css` (added variant styles)

### To Be Modified:
1. `/wordpress-theme/purposeful-media/page.php`
2. `/wordpress-theme/purposeful-media/template-about-contact.php`
3. `/wordpress-theme/purposeful-media/template-pillar-page.php`
4. `/wordpress-theme/purposeful-media/template-resource.php`
5. `/wordpress-theme/purposeful-media/single.php`

---

**End of Implementation Guide**
