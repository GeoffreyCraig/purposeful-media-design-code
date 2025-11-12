# ACF Field Groups - Quick Reference Card

## Field Group → Template Matrix

| Field Group Name | Homepage | Interior | Pillar | About/Contact | Blog | Resources |
|-----------------|----------|----------|--------|---------------|------|-----------|
| **Hero Section (Simple)** | — | ✅ | — | ✅ | ✅ | ✅ |
| **Pillar Hero Section** | — | — | ✅ | — | — | — |
| **Text Block Section** | — | ✅ | ✅ | ✅ | ✅ | ✅ |
| **Banner Section** | — | ✅ | ✅ | — | — | ✅ |
| **Blog Teaser Cards** | — | — | ✅ | — | — | ✅ |
| **FAQ Section** | — | — | ✅ | — | — | — |
| **2-Column CTA** | ✅ | ✅ | ✅ | ✅ | — | ✅ |
| **Featured Resource** | ✅ | — | ✅ | — | — | ✅ |
| **Homepage Welcome** | ✅ | — | — | — | — | — |
| **Homepage Text Block** | ✅ | — | — | — | — | — |
| **Homepage Icon Banner** | ✅ | — | — | — | — | — |

---

## Template Component Stacks

### Homepage (front_page)

1. Homepage Welcome Section
2. Homepage Text Block Section
3. Homepage Icon Banner
4. Featured Resource
5. 2-Column CTA Section

### Interior Page

1. Hero Section (Simple)
2. Text Block Section
3. Banner Section
4. 2-Column CTA Section

### Pillar Page

1. Pillar Hero Section
2. Text Block Section
3. Banner Section
4. Blog Teaser Cards
5. Featured Resource
6. FAQ Section
7. 2-Column CTA Section

### About/Contact Page

1. Hero Section (Simple)
2. Text Block Section
3. 2-Column CTA Section

### Blog Group Page

1. Hero Section (Simple)
2. Text Block Section

### Resources Page

1. Hero Section (Simple)
2. Text Block Section
3. Banner Section
4. Blog Teaser Cards
5. Featured Resource
6. 2-Column CTA Section

---

## Import Order

### First: New Field Groups (any order)

1. `acf-hero-section-simple.json`
2. `acf-pillar-hero-section.json`
3. `acf-text-block-section.json`
4. `acf-banner-section.json`
5. `acf-blog-teaser-cards.json`
6. `acf-faq-section.json`

### Second: Update Existing (manual or import)

- Update "2-Column CTA Section" location rules
- Update "Featured Resource" location rules

---

## Field Name Quick Reference

### Hero Fields

- `hero_simple_headline`
- `pillar_hero_headline`
- `pillar_hero_description`
- `pillar_hero_cta_text`
- `pillar_hero_cta_link`
- `pillar_hero_background_image`

### Text Block Fields

- `text_block_main_heading`
- `text_block_layout`
- `text_block_sections` (repeater)
  - `section_heading`
  - `section_content`
  - `section_icon`
  - `section_anchor`

### Banner Fields

- `banner_title`
- `banner_subtitle`
- `banner_icon`
- `banner_icon_color`
- `banner_background_color`
- `banner_anchor_id`

### Blog Teaser Fields

- `blog_teaser_heading`
- `blog_teaser_cards` (repeater)
  - `blog_card_category`
  - `blog_card_title`
  - `blog_card_excerpt`
  - `blog_card_image`
  - `blog_card_link`
  - `blog_card_author`
  - `blog_card_date`

### FAQ Fields

- `faq_heading`
- `faq_items` (repeater)
  - `faq_question`
  - `faq_answer`

### 2-Column CTA Fields

- `two_column_background`
- `left_card_heading`
- `left_card_text`
- `left_card_button_text`
- `left_card_button_link`
- `right_card_heading`
- `right_card_text`
- `right_card_button_text`
- `right_card_button_link`

### Featured Resource Fields

- `resource_banner_headline`
- `resource_thumbnail`
- `resource_card_title`
- `resource_card_description`
- `resource_button_text`
- `resource_button_link`
- `resource_background_image`

---

## Icon Options

**Decorative Icons (for Text Block & Banner):**

- accelerate
- strategy
- attract
- roi
- contact
- check

**Colors:**

- white
- navy
- teal

---

## Files Provided

✅ `acf-hero-section-simple.json` - NEW  
✅ `acf-pillar-hero-section.json` - NEW  
✅ `acf-text-block-section.json` - NEW  
✅ `acf-banner-section.json` - NEW  
✅ `acf-blog-teaser-cards.json` - NEW  
✅ `acf-faq-section.json` - NEW  
✅ `acf-2column-cta-updated.json` - UPDATED RULES  
✅ `acf-featured-resource-updated.json` - UPDATED RULES  
✅ `ACF-IMPLEMENTATION-GUIDE.md` - Complete documentation  
✅ `ACF-QUICK-REFERENCE.md` - This file

**Total: 10 files**
