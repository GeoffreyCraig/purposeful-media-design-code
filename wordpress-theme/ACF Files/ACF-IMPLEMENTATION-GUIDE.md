# ACF Pro Field Groups Implementation Guide

**Created:** November 12, 2025  
**Version:** 1.0  
**Purpose:** Complete field group structure for Phase 1 MVW templates

---

## 📦 Field Groups Overview

### New Field Groups (6)

1. **Hero Section (Simple)** - `acf-hero-section-simple.json`
2. **Pillar Hero Section** - `acf-pillar-hero-section.json`
3. **Text Block Section** - `acf-text-block-section.json`
4. **Banner Section** - `acf-banner-section.json`
5. **Blog Teaser Cards** - `acf-blog-teaser-cards.json`
6. **FAQ Section** - `acf-faq-section.json`

### Updated Field Groups (2)

7. **2-Column CTA Section** - `acf-2column-cta-updated.json` (expanded location rules)
8. **Featured Resource** - `acf-featured-resource-updated.json` (expanded location rules)

---

## 🎯 Field Group Application by Template

### Homepage (front_page)

- ✅ Homepage Welcome Section (existing)
- ✅ Homepage Text Block Section (existing)
- ✅ Homepage Icon Banner (existing)
- ✅ 2-Column CTA Section (UPDATE with new location rules)
- ✅ Featured Resource (UPDATE with new location rules)

### Interior Page Template

- 🆕 Hero Section (Simple)
- 🆕 Text Block Section
- 🆕 Banner Section
- ✅ 2-Column CTA Section (UPDATE)

### Pillar Page Template

- 🆕 Pillar Hero Section
- 🆕 Text Block Section
- 🆕 Banner Section
- 🆕 Blog Teaser Cards
- 🆕 FAQ Section
- ✅ 2-Column CTA Section (UPDATE)
- ✅ Featured Resource (UPDATE)

### About/Contact Page Template

- 🆕 Hero Section (Simple)
- 🆕 Text Block Section
- ✅ 2-Column CTA Section (UPDATE)

### Blog Group Template

- 🆕 Hero Section (Simple)
- 🆕 Text Block Section

### Resources Page Template

- 🆕 Hero Section (Simple)
- 🆕 Text Block Section
- 🆕 Banner Section
- 🆕 Blog Teaser Cards
- ✅ 2-Column CTA Section (UPDATE)
- ✅ Featured Resource (UPDATE)

---

## 📋 Import Instructions

### Step 1: Backup Current Field Groups

Before importing, export your current homepage field groups as a backup:

1. Go to **Custom Fields → Tools**
2. Select all existing field groups
3. Click **Export Field Groups**
4. Save the JSON file as backup

### Step 2: Import New Field Groups (Order Matters!)

**First: Import the 6 NEW field groups** (in any order):

1. `acf-hero-section-simple.json`
2. `acf-pillar-hero-section.json`
3. `acf-text-block-section.json`
4. `acf-banner-section.json`
5. `acf-blog-teaser-cards.json`
6. `acf-faq-section.json`

**To Import:**

1. Go to **Custom Fields → Tools**
2. Click **Import Field Groups**
3. Select JSON file
4. Click **Import**
5. Repeat for each file

### Second: Update Existing Field Groups

For the 2-Column CTA and Featured Resource field groups, you have two options:

#### Option A (Recommended): Update Location Rules Manually

1. Go to **Custom Fields → Field Groups**
2. Edit "2-Column CTA Section"
3. Scroll to **Location** section
4. Add these additional rules (click "Add rule group" for each):
   - Page Template is equal to `interior-page-template.php`
   - Page Template is equal to `pillar-page-template.php`
   - Page Template is equal to `about-contact-page-template.php`
   - Page Template is equal to `resource-page-template.php`
5. Click **Update**
6. Repeat for "Featured Resource" field group, adding:
   - Page Template is equal to `pillar-page-template.php`
   - Page Template is equal to `resource-page-template.php`

#### Option B: Import Updated Versions

1. Delete existing "2-Column CTA Section" field group
2. Import `acf-2column-cta-updated.json`
3. Delete existing "Featured Resource" field group
4. Import `acf-featured-resource-updated.json`

⚠️ **Important:** If you use Option B, you'll need to re-enter the field values on your homepage.

---

## 🔧 Template Integration Notes

### Field Naming Convention

All field names follow the pattern: `{section}_{element}_{detail}`

Examples:

- `hero_simple_headline`
- `pillar_hero_cta_text`
- `text_block_main_heading`
- `banner_icon_color`
- `left_card_button_text`

### Accessing Fields in PHP Templates

**Simple Text Field:**

```php
<?php
$headline = get_field('hero_simple_headline');
if ($headline) {
    echo '<h1>' . esc_html($headline) . '</h1>';
}
?>
```

**Repeater Field (Text Block Sections):**

```php
<?php
if (have_rows('text_block_sections')) {
    while (have_rows('text_block_sections')) {
        the_row();
        $heading = get_sub_field('section_heading');
        $content = get_sub_field('section_content');
        $icon = get_sub_field('section_icon');
        $anchor = get_sub_field('section_anchor');
        
        // Output section HTML
    }
}
?>
```

**Image Field:**

```php
<?php
$image_url = get_field('pillar_hero_background_image');
if ($image_url) {
    echo '<img src="' . esc_url($image_url) . '" alt="">';
}
?>
```

---

## 📊 Field Group Details

### 1. Hero Section (Simple)

**Purpose:** Simple headline-only hero for most pages  
**Fields:**

- `hero_simple_headline` (text, required)

**Used on:** Interior, About/Contact, Blog, Resources

---

### 2. Pillar Hero Section

**Purpose:** Full-featured hero with gradient, image, and CTA  
**Fields:**

- `pillar_hero_headline` (text, required)
- `pillar_hero_description` (textarea)
- `pillar_hero_cta_text` (text, default: "Get Started")
- `pillar_hero_cta_link` (url)
- `pillar_hero_background_image` (image)

**Used on:** Pillar pages

---

### 3. Text Block Section

**Purpose:** Flexible content sections with optional icons and anchors  
**Fields:**

- `text_block_main_heading` (text)
- `text_block_layout` (select: wide/standard)
- `text_block_sections` (repeater):
  - `section_heading` (text)
  - `section_content` (WYSIWYG)
  - `section_icon` (select: accelerate/strategy/attract/roi/contact/check)
  - `section_anchor` (text for linking, e.g., "overview")

**Used on:** All templates

**Key Feature:** This is your most flexible field group - use it for main page content

---

### 4. Banner Section

**Purpose:** Headline banners with optional icons (like "Your Next Step")  
**Fields:**

- `banner_title` (text, default: "Your Next Step")
- `banner_subtitle` (text)
- `banner_icon` (select: contact/accelerate/strategy/attract/roi)
- `banner_icon_color` (select: white/navy/teal)
- `banner_background_color` (select: white/navy/gray)
- `banner_anchor_id` (text for linking, e.g., "start")

**Used on:** Interior, Pillar, Resources

---

### 5. Blog Teaser Cards

**Purpose:** Display featured blog posts  
**Fields:**

- `blog_teaser_heading` (text, default: "Latest From Our Blog")
- `blog_teaser_cards` (repeater, max 4):
  - `blog_card_category` (text)
  - `blog_card_title` (text, required)
  - `blog_card_excerpt` (textarea)
  - `blog_card_image` (image)
  - `blog_card_link` (url)
  - `blog_card_author` (text, default: "Geoff Craig")
  - `blog_card_date` (date picker)

**Used on:** Pillar, Resources

---

### 6. FAQ Section

**Purpose:** Accordion-style Q&A section  
**Fields:**

- `faq_heading` (text, default: "Frequently Asked Questions")
- `faq_items` (repeater):
  - `faq_question` (text, required)
  - `faq_answer` (WYSIWYG, required)

**Used on:** Pillar pages

**Note:** The repeater is configured to collapse by question for easy management

---

### 7. 2-Column CTA Section (UPDATED)

**Purpose:** Two side-by-side CTA cards with background image  
**Fields:** (unchanged from homepage version)

- `two_column_background` (image)
- `left_card_heading` (text)
- `left_card_text` (textarea)
- `left_card_button_text` (text, default: "SCHEDULE")
- `left_card_button_link` (url)
- `right_card_heading` (text)
- `right_card_text` (textarea)
- `right_card_button_text` (text, default: "GET IN TOUCH")
- `right_card_button_link` (url)

**Used on:** Homepage, Interior, Pillar, About/Contact, Resources

**Update:** Location rules expanded to apply to all major templates

---

### 8. Featured Resource (UPDATED)

**Purpose:** Highlight downloadable resource with thumbnail  
**Fields:** (unchanged from homepage version)

- `resource_banner_headline` (text, default: "Featured Resource Download")
- `resource_thumbnail` (image)
- `resource_card_title` (text)
- `resource_card_description` (textarea)
- `resource_button_text` (text, default: "Download Now")
- `resource_button_link` (url)
- `resource_background_image` (image)

**Used on:** Homepage, Pillar, Resources

**Update:** Location rules expanded to apply to pillar and resources pages

---

## ✅ Verification Checklist

After importing all field groups:

### Visual Check in WP Admin

- [ ] Go to **Custom Fields → Field Groups**
- [ ] Verify all 13 field groups are listed (5 homepage + 6 new + 2 updated)
- [ ] Check that field groups are **Active** (green indicator)

### Test on Each Page Template

- [ ] Edit your Interior page draft → verify all applicable field groups appear
- [ ] Edit your Pillar page draft → verify all applicable field groups appear
- [ ] Edit your About/Contact page draft → verify all applicable field groups appear
- [ ] Edit your Blog page draft → verify all applicable field groups appear
- [ ] Edit your Resources page draft → verify all applicable field groups appear
- [ ] Check Homepage → verify updated field groups still appear

### Field Group Ordering

Field groups should appear in the following order (set by menu_order):

1. Hero Section (order: 0)
2. Text Block Section (order: 1)
3. Banner Section (order: 2)
4. Blog Teaser Cards (order: 3)
5. FAQ Section (order: 4)
6. 2-Column CTA (order: 5)
7. Featured Resource (order: 6)

---

## 🚀 Next Steps After Import

1. **Test Field Groups**
   - Open each page draft in WordPress
   - Verify all field groups appear
   - Add sample content to test

2. **Update PHP Templates**
   - Modify your WordPress theme template files to use ACF fields
   - Replace hardcoded content with `get_field()` calls
   - Test on staging site

3. **Icon Integration**
   - Verify icon selections work correctly
   - Test icon display on frontend
   - Check sprite sheet references

4. **Repeater Field Testing**
   - Test adding/removing sections in Text Block
   - Test blog card repeater
   - Test FAQ accordion functionality

5. **Documentation**
   - Document any custom field usage notes
   - Create content entry guidelines for your team
   - Screenshot field group layouts for reference

---

## 💡 Pro Tips

### Content Entry Workflow

1. Start with Hero section (top of page)
2. Add Text Block sections (main content)
3. Add Banner section if needed
4. Add specialized sections (Blog Teaser, FAQ, Featured Resource)
5. Complete with 2-Column CTA at bottom

### Best Practices

- Use consistent heading hierarchy (H1 → H2 → H3)
- Keep section anchors simple and lowercase (overview, strategy, faq)
- Add alt text for all images
- Test CTA button links before publishing
- Preview at all breakpoints

### Common Pitfalls to Avoid

- ❌ Don't skip required fields (marked with *)
- ❌ Don't use spaces in anchor IDs
- ❌ Don't exceed max limits on repeater fields (e.g., 4 blog cards)
- ❌ Don't forget to click "Update" after editing field groups
- ❌ Don't import field groups multiple times (creates duplicates)

---

## 📞 Support Reference

### ACF Documentation

- Repeater Fields: https://www.advancedcustomfields.com/resources/repeater/
- Image Fields: https://www.advancedcustomfields.com/resources/image/
- Location Rules: https://www.advancedcustomfields.com/resources/custom-location-rules/

### Template File Naming

Ensure your WordPress theme has these template files:

- `interior-page-template.php`
- `pillar-page-template.php`
- `about-contact-page-template.php`
- `blog-page-template.php`
- `resource-page-template.php`

### Troubleshooting

**Field groups not appearing?**

- Check that the page has the correct template assigned
- Verify field group location rules match template filename exactly
- Clear WordPress cache

**Values not saving?**

- Check PHP memory limit (recommended: 256M minimum)
- Verify database permissions
- Disable conflicting plugins temporarily

**Icons not displaying?**

- Verify sprite sheet files are in correct location
- Check CSS icon class names match field values
- Test icon display in isolation

---

## 📝 Version History

### v1.0 - November 12, 2025

- Initial creation of 6 new field groups
- Updated location rules for 2 existing field groups
- Complete documentation and implementation guide

---

## ✨ Summary

You now have a complete, modular ACF field group structure that:

- ✅ Covers all 6 page templates
- ✅ Uses organism-level component thinking
- ✅ Maintains consistency with homepage structure
- ✅ Provides flexibility through repeater fields
- ✅ Supports all design system features (icons, layouts, styles)
- ✅ Follows WordPress and ACF best practices

Import these field groups, test on your drafts, and you'll have full CMS control over your Phase 1 MVW content!
