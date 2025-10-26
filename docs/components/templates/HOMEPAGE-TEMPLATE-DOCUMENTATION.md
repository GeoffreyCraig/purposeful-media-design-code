# Homepage Template Documentation
**Purposeful Media Design System | Phase 1 MVW**  
**Date:** October 7, 2025  
**Template:** Front Page (Homepage)

---

## 📋 Overview

The homepage template is the cornerstone of the Purposeful Media website. It showcases the complete design system in action, integrating multiple organisms into a cohesive, conversion-focused page.

---

## 📁 Files Created

| File | Purpose | Status |
|------|---------|--------|
| **front-page.html** | Static HTML version for testing | ✅ Complete |
| **front-page.php** | WordPress template for deployment | ✅ Complete |
| **HOMEPAGE-TEMPLATE-DOCUMENTATION.md** | This documentation | ✅ Complete |

---

## 🎯 Page Structure

###  Homepage Layout (Top to Bottom)

```
1. HEADER/NAVIGATION
   └── Global site navigation
   
2. HERO SECTION
   └── Simple hero with headline

3. VALUE PROPOSITION
   └── Text block: Headline + lead paragraph

4. INBOUND METHODOLOGY  
   └── Icon grid: Attract, Engage, Delight

5. SERVICES LIST
   └── Icon bullet list: 6 key services

6. RESULTS/STATS
   └── 3 stat cards with icons (navy background)

7. TESTIMONIAL
   └── Blockquote with attribution

8. BLOG/RESOURCES
   └── 3 recent blog posts (WordPress-driven)

9. CALL-TO-ACTION
   └── Final CTA with buttons (gradient background)

10. FOOTER
    └── Site footer with links
```

---

## 🧩 Organisms Used

### 1. Hero Simple Default
**File:** `components/organisms/hero-simple-default.html`  
**Purpose:** Page header with main headline  
**Content:** "Strategic Growth Through Purposeful Marketing"

### 2. Text Block (Multiple Instances)
**File:** `components/organisms/text-block.html`  
**Variants Used:**
- Narrative layout (value prop, services, testimonial)
- Pillar layout (methodology section)

**Features Demonstrated:**
- Headline hierarchy (H2, H3, H4)
- Lead paragraphs
- Icon grids (3-column)
- Icon bullet lists (checkmarks)
- Blockquotes with attribution
- Custom background colors

### 3. Stats/Results Section
**Custom Implementation**  
**Components:**
- Icon display molecules (white on navy)
- Grid layout (3 stat cards)
- Navy brand background with transparency
- Gold accent text

### 4. Blog Group Section
**File:** `components/organisms/blog-group.html`  
**Integration:** WordPress REST API via `blog-group-adapter.js`  
**Content:** 3 most recent blog posts (dynamic)

### 5. CTA Section
**Custom Implementation**  
**Components:**
- Large XLarge icon (strategy)
- Headline + paragraph
- Two CTA buttons (primary + ghost)
- Gradient background (navy to light navy)

---

## 🎨 Design Elements Used

### Icons

**Symbolic Icons (icon-display):**
- `attract` (navy, large) - Methodology section
- `engage` (navy, large) - Methodology section
- `delight` (navy, large) - Methodology section
- `roi` (white, medium) - Stats section
- `momentum` (white, medium) - Stats section
- `efficiency` (white, medium) - Stats section
- `strategy` (white, xlarge) - CTA section

**UI Icons (ui-icon-display):**
- `check` (teal, small) - Services list (6 instances)

### Color Scheme

**Sections:**
- White backgrounds: Value prop, Services, Blog
- Light gray (#F6F6F7): Methodology, Testimonial
- Navy (#1B1464): Stats section
- Gradient (navy → light navy): CTA section

**Text Colors:**
- Navy (#1B1464): Headlines on white/gray
- Dark gray (#54595F): Body text
- White (#FFFFFF): Text on navy backgrounds
- Gold (#D4AF37): Stats numbers

### Typography

**Headlines:**
- H1: Hero headline
- H2: Section titles (8 instances)
- H3: Methodology column titles
- H4: Icon grid titles

**Paragraphs:**
- Lead: Section introductions
- Default: Body copy
- Large: Stat numbers

---

## 📱 Responsive Behavior

### Breakpoints

**Mobile (380-767px):**
- Hero: Full width, reduced padding
- Icon grid: Stacks to single column
- Stats: Single column stack
- CTA buttons: Full width stack

**Tablet (768-1149px):**
- Icon grid: 2 columns
- Stats: 2-3 columns (flexible)
- Padding: 40px sides

**Desktop (1150-1919px):**
- Icon grid: 3 columns
- Stats: 3 columns side-by-side
- Full layout with optimal spacing

**Desktop+ (1920px+):**
- Max container width enforced
- Centered content
- Consistent side margins

---

## 🔗 WordPress Integration

### Template Hierarchy

```
WordPress checks for templates in this order:
1. front-page.php    ← Our homepage template (found!)
2. home.php
3. index.php
```

**Setup:** Place `front-page.php` in theme root  
**WordPress:** Automatically uses it for the front page

### Dynamic Content

**Editable via WordPress:**
- Hero headline (Customizer)
- Blog posts (automatic - latest 3)
- Navigation menus (WordPress Menus)
- Footer content (Footer widget area)

**Static Content:**
- All section copy and layout
- Icons and graphics
- Stats and testimonial
- CTA buttons and links

**Future Enhancement (Phase 2):**
- Make sections editable via ACF (Advanced Custom Fields)
- Add section toggle controls
- Create page builder compatibility

---

## 🚀 Deployment Checklist

### Pre-Deployment

- [ ] Test static version (front-page.html) in browser
- [ ] Verify all icons display correctly
- [ ] Check responsive behavior at all breakpoints
- [ ] Test with built CSS/JS (`dist/` files)
- [ ] Validate HTML
- [ ] Check accessibility (WCAG AA)

### WordPress Setup

- [ ] Place `front-page.php` in theme directory
- [ ] Upload assets to theme/assets folder
- [ ] Verify WordPress enqueue function is active
- [ ] Set static homepage in Settings → Reading
- [ ] Test blog section displays recent posts
- [ ] Verify navigation and footer render correctly

### Bluehost Sandbox (Speed Run)

- [ ] Upload theme files via FTP or WordPress admin
- [ ] Activate theme
- [ ] Set front page to static page
- [ ] Test all sections render
- [ ] Check console for errors
- [ ] Test mobile responsive
- [ ] Verify icons load correctly
- [ ] Document any issues

---

## 📊 Page Performance

### Expected Metrics (Phase 1 MVW)

| Metric | Target | Notes |
|--------|--------|-------|
| **Page Size** | ~150KB | Including CSS/JS/Images |
| **Load Time** | <2s | With gzip + caching |
| **Lighthouse Performance** | >85 | Mobile score |
| **Lighthouse Accessibility** | >90 | WCAG AA compliant |
| **First Contentful Paint** | <1.5s | Above-fold content |

### Optimization Notes

**Phase 1 (Current):**
- Single CSS bundle (89KB)
- Single JS bundle (20KB)
- Icons via sprite sheets
- No lazy loading yet

**Phase 2 (Future):**
- Image optimization (WebP)
- Lazy load below-fold images
- Critical CSS inline
- Conditional script loading

---

## 🎯 Conversion Optimization

### Primary Goals

1. **Schedule Consultation** (Primary CTA)
   - Location: Final CTA section
   - Button: Secondary (gold)
   - Links to: Contact page

2. **View Resources** (Secondary CTA)
   - Location: Final CTA section
   - Button: Ghost secondary
   - Links to: Resources page

3. **Engage with Content** (Tertiary)
   - Location: Blog section
   - Action: View articles
   - Links to: Blog archive

### Trust Signals

- ✅ Stats/Results section (social proof)
- ✅ Client testimonial (third-party validation)
- ✅ Service expertise (authority)
- ✅ Recent content (active presence)

---

## 🔧 Customization Guide

### Changing Content

**Hero Headline:**
```html
<!-- In front-page.html -->
<h1 class="hero-simple__headline">Your New Headline Here</h1>

<!-- In front-page.php (WordPress Customizer) -->
Appearance → Customize → Homepage Settings → Hero Headline
```

**Section Headlines:**
```html
<h2 class="headline headline--h2">Your Section Title</h2>
```

**Icons:**
```html
<!-- Change icon -->
data-icon="roi"        → data-icon="strategy"

<!-- Change color -->
data-color="navy"      → data-color="white"

<!-- Change size -->
icon-display--medium   → icon-display--large
```

### Adding Sections

1. Copy a similar section structure
2. Paste where you want it
3. Update content
4. Adjust background color if needed
5. Test responsive behavior

### Removing Sections

1. Delete the entire `<section>` block
2. Test to ensure nothing breaks
3. Adjust spacing of surrounding sections if needed

---

## 📝 Content Guidelines

### Headline Best Practices

**H1 (Hero):**
- Clear value proposition
- 5-8 words ideal
- Action or benefit-focused

**H2 (Section Titles):**
- Descriptive and scannable
- Benefit or outcome-focused
- 3-6 words ideal

**H3 (Subsections):**
- Specific and concrete
- Support parent section
- 2-4 words ideal

### Paragraph Copy

**Lead Paragraphs:**
- Expand on headline
- 1-2 sentences
- Clear benefit statement

**Body Copy:**
- One idea per paragraph
- 2-3 sentences max
- Action-oriented language

### CTA Button Text

**Best Practices:**
- Action verb + benefit
- 2-3 words
- Specific (not generic)

**Examples:**
- ✅ "Schedule Consultation"
- ✅ "Download Free Guide"
- ✅ "View Case Studies"
- ❌ "Click Here"
- ❌ "Learn More"
- ❌ "Submit"

---

## 🐛 Troubleshooting

### Icons Not Displaying

**Check:**
1. SVG sprite files uploaded to `/assets/svg/`
2. CSS file includes icon-display styles
3. `data-icon` and `data-color` attributes are correct
4. Icon name spelling is exact (case-sensitive)

**Fix:**
```html
<!-- Verify exact syntax -->
<div class="icon-display icon-display--large" 
     data-icon="attract" 
     data-color="navy"></div>
```

### Spacing Issues

**Check:**
1. Section padding is consistent (80px default)
2. Container max-width is working
3. Responsive styles are loading

**Fix:**
```html
<!-- Standard section spacing -->
<section style="padding: 80px 0;">
```

### WordPress Blog Section Empty

**Check:**
1. Published posts exist
2. JavaScript is loaded
3. REST API is accessible
4. Console for errors

**Debug:**
```javascript
// Check if adapter loaded
console.log(typeof BlogGroupAdapter);

// Check REST API
fetch('/wp-json/wp/v2/posts')
  .then(r => r.json())
  .then(console.log);
```

### Responsive Not Working

**Check:**
1. Viewport meta tag in `<head>`
2. CSS media queries are loading
3. Browser zoom is at 100%

**Fix:**
```html
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

---

## 📈 A/B Testing Ideas (Phase 2)

### Hero Section
- Test different headlines
- Test with/without subtitle
- Test different hero styles (simple vs carousel)

### CTA Section
- Button copy variations
- Button color variations
- Single CTA vs dual CTA
- Icon presence/absence

### Social Proof
- Stats vs testimonial first
- Different stat numbers
- Multiple testimonials vs one

### Layout
- Icon grid vs text list
- Blog position (middle vs end)
- Section order variations

---

## 🎓 Learning Resources

### Homepage Best Practices
- Clear value proposition above fold
- Trust signals (stats, testimonials)
- Clear navigation path
- Strong CTA above and below fold
- Scannable content (headlines, bullets)
- Mobile-first responsive design

### Conversion Optimization
- Single primary goal per page
- Friction-free CTA process
- Social proof near CTAs
- Value-focused copy
- Visual hierarchy guides attention

---

## ✅ Next Steps

### Immediate (This Week)
1. Test static homepage in browser
2. Review content and copy
3. Make any adjustments needed
4. Prepare for WordPress integration

### Short Term (Next Week)
1. Speed run Bluehost sandbox deployment
2. Document deployment process
3. Fix any issues discovered
4. Refine based on real environment

### Medium Term (Phase 1 Launch)
1. Integrate HubSpot forms
2. Set up Google Console
3. Configure Semrush tracking
4. Launch MVW!

---

## 📞 Support Resources

### Files Reference
- **Static version:** `/templates/front-page.html`
- **WordPress version:** `/templates/front-page.php`
- **CSS bundle:** `/dist/css/purposeful-main.min.css`
- **JS bundle:** `/dist/js/purposeful-main.min.js`

### Component Documentation
- Text Block: `/components/organisms/TEXT-BLOCK-README.md`
- Icon Display: `/components/molecules/icon-display.html`
- UI Icons: `/components/molecules/ui-icon-display.html`

### Build Documentation
- Build process: `/BUILD-INSTRUCTIONS.md`
- WordPress integration: `/wordpress-enqueue-template.php`
- Project overview: `/README.md`

---

**Homepage Template Status:** ✅ Complete and ready for testing  
**Next Milestone:** Bluehost sandbox deployment (speed run)  
**Phase:** 1 (MVW) - Templates Layer

---

*Template created with all completed organisms. Ready for WordPress deployment and Phase 1 launch!* 🚀

