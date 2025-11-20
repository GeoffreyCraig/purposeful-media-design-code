# Generic Text Block - Quick Start Guide
**Week 47 Thursday - November 20, 2025**

## 5-Minute Setup

### 1. Import ACF Field Group (2 minutes)
```
WordPress Admin → ACF → Tools → Import Field Groups
→ Upload: acf-text-block-generic.json
→ Import
```

### 2. Test on Interior Page (3 minutes)
```
WordPress Admin → Pages → Edit "Policy Page" (or any interior page)
→ Scroll to "Text Block - Generic" field group
→ Click "Add Text Block Section"
→ Fill in:
   - Section Heading: "Test Section"
   - Section Content: "This is a test of the ACF text block system."
   - Style Variant: "Default (Standard body text)"
→ Update page
→ View page on frontend
```

---

## Usage Pattern in Templates

### Replace Hard-Coded Text Blocks:

**OLD (Hard-coded):**
```php
<section class="text-block text-block--wide">
    <div class="text-block__container">
        <article class="text-block__content">
            <h1>Hard-coded heading</h1>
            <p>Hard-coded content...</p>
        </article>
    </div>
</section>
```

**NEW (ACF-powered):**
```php
<?php get_template_part( 'template-parts/text-block-generic' ); ?>
```

---

## Style Variants Quick Reference

| Variant | Max Width | Background | Use Case |
|---------|-----------|------------|----------|
| **Default** | 800px | White | Standard body text |
| **Wide** | 100% | White | Full-width content |
| **Narrative** | 800px | White | Blog posts, articles |
| **Pillar** | 900px | Gray (#F6F6F7) | Comprehensive guides |
| **Featured** | 800px | Gradient + Border | Emphasized content |
| **Sidebar** | 400px | White card | Condensed info boxes |

---

## Icon Options (21 Available)

**Most Common:**
- `contact` - Phone/message icon
- `email` - Email envelope
- `roi` - ROI graph
- `strategy` - Strategy icon
- `download` - Download arrow
- `schedule` - Calendar
- `persona` - User profile
- `webinar` - Webinar icon
- `professional` - Briefcase
- `momentum` - Growth arrow

**All Available:** accelerate, attract, contact, delight, download, efficiency, email, engage, exit, expertise, inbound, momentum, news, persona, professional, roi, schedule, strategy, unit, value, webinar

**Icon Colors:** navy, gray, dark, white

---

## Template Integration Checklist

### Interior Page (page.php) ✅
- [x] Import ACF field group
- [ ] Replace hard-coded text block at lines 44-70
- [ ] Test default variant
- [ ] Test wide variant

### About & Contact (template-about-contact.php)
- [x] Import ACF field group
- [ ] Replace hard-coded text block at lines 84-133
- [ ] Test wide variant with icon list
- [ ] Test multiple sections

### Resources (template-resource.php)
- [x] Import ACF field group
- [ ] Replace hard-coded text block (Section 2)
- [ ] Test wide variant
- [ ] Keep featured resource section separate

### Pillar Page (template-pillar-page.php)
- [x] Import ACF field group
- [ ] Replace hard-coded text blocks
- [ ] Test pillar variant (gray background)
- [ ] Test anchor ID integration with sticky menu

### Blog Posts (single.php)
- [x] Import ACF field group
- [ ] Optional: Add text blocks before/after post content
- [ ] Test narrative variant

---

## Content Editor Instructions

### Adding a Text Block Section:

1. **Edit your page** in WordPress
2. Find **"Text Block - Generic"** section
3. Click **"Add Text Block Section"**
4. Fill in the fields:

**Section Heading** (Optional)
```
Example: "Our Mission"
```

**Section Content** (Required)
```
Use the WYSIWYG editor to add:
- Paragraphs
- Headings (H2, H3, H4)
- Lists (bulleted or numbered)
- Bold/italic text
- Links
```

**Style Variant** (Required - choose one)
- Default - Most common, standard body text
- Wide - Full-width content
- Narrative - Blog post style
- Pillar - Guide with gray background
- Featured - Eye-catching bordered box
- Sidebar - Compact information box

**Section Icon** (Optional)
- Choose from 21 decorative icons
- Leave blank if no icon needed

**Icon Color** (If icon selected)
- Navy (default) - Primary brand color
- Gray - Neutral option
- Dark - High contrast
- White - For dark backgrounds

**Anchor ID** (Optional)
```
Use for sticky menu linking
Example: "mission" creates linkable #mission
```

5. Click **Update** to save

---

## Troubleshooting

### ❌ Field group not showing
- Check ACF Pro license is active
- Verify you're editing the correct template
- Refresh the page editor

### ❌ Styles not applying
- Hard refresh: Cmd+Shift+R (Mac) or Ctrl+Shift+R (Windows)
- Check browser console for CSS errors
- Verify variables.css loaded before organisms-text-block.css

### ❌ Icons not displaying
- Check icon sprite sheet loaded: `/assets/svg/decorative-icons/purposeful-sprite-symbolic.svg`
- Verify JavaScript executing (check browser console)
- Ensure icon name spelled correctly

### ❌ Content not saving
- Check WordPress memory limit (increase if needed)
- Verify ACF field group imported correctly
- Try saving with fewer sections first

---

## Files Reference

### Core Files:
1. **ACF Field Group:** `/wordpress-theme/ACF Files/acf-text-block-generic.json`
2. **PHP Template Part:** `/wordpress-theme/purposeful-media/template-parts/text-block-generic.php`
3. **CSS Variables:** `/wordpress-theme/purposeful-media/assets/css/variables-v4.0-20251027.css` (lines 747-848)
4. **CSS Component:** `/wordpress-theme/purposeful-media/assets/css/organisms-text-block.css` (lines 765-900)

### Documentation:
1. **Full Guide:** `TEXT-BLOCK-GENERIC-IMPLEMENTATION-GUIDE.md`
2. **Quick Start:** `TEXT-BLOCK-QUICK-START.md` (this file)

---

## Testing Checklist

- [ ] Import ACF field group successful
- [ ] Field group appears on interior pages
- [ ] Can add/remove/reorder sections
- [ ] WYSIWYG editor functions
- [ ] All 6 style variants selectable
- [ ] Default variant displays correctly
- [ ] Wide variant spans full width
- [ ] Featured variant shows border
- [ ] Sidebar variant condensed properly
- [ ] Icons display when selected
- [ ] Icons hide when not selected
- [ ] Icon colors apply correctly
- [ ] Mobile responsive (380-767px)
- [ ] Tablet responsive (768-1149px)
- [ ] Desktop responsive (1150-1919px)
- [ ] DesktopPlus containerized (1920px+)

---

## Next Actions

1. ⏳ **Import ACF field group** to WordPress staging
2. ⏳ **Update one template** (start with page.php for simplest test)
3. ⏳ **Add test content** via WordPress admin
4. ⏳ **Test at all breakpoints** (mobile through desktop)
5. ⏳ **Verify variants** display correctly
6. ⏳ **Update remaining templates** (4 more)
7. ⏳ **Migrate existing content** to ACF fields
8. ⏳ **User training** for content editors
9. ⏳ **Deploy to production** after full QA

---

**Questions?** Review the full implementation guide: `TEXT-BLOCK-GENERIC-IMPLEMENTATION-GUIDE.md`
