# Production CSS Deployment Guide
**Purposeful Media Promotions Design System**
Version: 1.0
Date: November 5, 2025

---

## Overview

This guide explains how to use the consolidated production CSS files for CMS/production deployment (WordPress, etc.) while maintaining the modular development files for ongoing work.

---

## File Structure

### Development Files (36 files)
Use these for **development, debugging, and component maintenance**:
- Individual component CSS files organized by atomic design layer
- Easier to debug and maintain
- Each component can be updated independently
- Located in `/styles/` directory

### Production Files (4 files)
Use these for **production deployment and CMS platforms** (WordPress themes, custom sites):
1. `variables-v4.0-20251027.css` (25KB) - Design tokens & variables
2. `production-molecules.css` (192KB) - All molecule components
3. `production-organisms.css` (141KB) - All organism components
4. `production-master.css` (3KB) - Master import file

**Total Size:** ~361KB
**Performance:** 92% reduction in HTTP requests (36 files → 4 files)

---

## Deployment Options

### Option 1: Single Master File (Simplest)
**Best for:** WordPress themes, CMS platforms with limited file management

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts (Load BEFORE CSS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Production CSS -->
    <link rel="stylesheet" href="styles/production-master.css">
</head>
<body>
    <!-- Your content here -->
</body>
</html>
```

### Option 2: Separate Files (Optimal Caching)
**Best for:** Custom websites with full control over assets

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts (Load BEFORE CSS) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Production CSS - Cascade Order -->
    <link rel="stylesheet" href="styles/variables-v4.0-20251027.css">
    <link rel="stylesheet" href="styles/production-molecules.css">
    <link rel="stylesheet" href="styles/production-organisms.css">
</head>
<body>
    <!-- Your content here -->
</body>
</html>
```

### Option 3: Development Mode
**Best for:** Local development, component testing, debugging

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Development CSS - Uses master-styles.css with individual imports -->
    <link rel="stylesheet" href="styles/master-styles.css">
</head>
<body>
    <!-- Your content here -->
</body>
</html>
```

---

## Production Files Breakdown

### production-molecules.css (192KB, 6170 lines)
Consolidates 19 molecule component files:
- **Atoms:** banner-spacer
- **Cards:** banner-spacer, blogpost, FAQ, paragraph-options, resources, teaser, pillar
- **Icons:** decorative-icon-display, ui-icon-display
- **Forms:** contact, newsletter, resource, generic forms
- **Navigation:** return-button, sticky-menu, dropdown-menus
- **Media:** slides

### production-organisms.css (141KB, 6006 lines)
Consolidates 14 organism component files:
- **Headers:** banner-header (main, LP variants)
- **Heroes:** carousel, simple (default/reverse), ATF (center/left/right)
- **Footers:** simple (default/reverse), main
- **Content Sections:** 2-column contact, integrated, graphic
- **Sections:** pillar, contactus, FAQ group, resources, text-block
- **Blog:** blog-group-organism-v2
- **Navigation:** organism-level navigation
- **Generic:** sections wrapper

---

## Maintenance Workflow

### When to Regenerate Production Files

Regenerate production CSS whenever you:
1. Update any individual component CSS file
2. Add new components to the design system
3. Update design tokens in variables-v4.0-20251027.css
4. Fix bugs in component styles

### How to Regenerate Production Files

**Step 1: Update individual component files**
```bash
# Edit the specific component CSS in /styles/
# Example: molecules-card-blogpost.css
```

**Step 2: Regenerate consolidated files**
Use the CSS consolidation scripts or manually concatenate:

```bash
# Navigate to styles directory
cd "/path/to/styles/"

# Regenerate molecules
cat atoms-banner-spacer.css \
    molecules-*.css \
    > production-molecules-new.css

# Regenerate organisms
cat organisms-*.css \
    blog-group-organism-v2.css \
    > production-organisms-new.css

# Remove @import statements
grep -v "^@import url('variables" production-molecules-new.css > production-molecules.css
grep -v "^@import url('variables" production-organisms-new.css > production-organisms.css
```

**Step 3: Test production files**
- Preview with production-master.css
- Verify all components render correctly
- Test across all 4 breakpoints (Mobile, Tablet, Desktop, DesktopPlus)

**Step 4: Deploy to production**
- Upload to WordPress CMS
- Clear browser cache
- Test live site

---

## Performance Comparison

| Metric | Development (36 files) | Production (4 files) | Improvement |
|--------|------------------------|----------------------|-------------|
| HTTP Requests | 36 | 4 | 89% reduction |
| Total CSS Size | ~370KB | ~361KB | 2.4% reduction |
| Load Time* | ~1.2s | ~0.3s | 75% faster |
| Browser Caching | Per-component | Per-layer | More efficient |
| CMS Uploads | 36 files | 4 files | 89% fewer files |

*Estimated based on average connection speeds with HTTP/2

---

## Troubleshooting

### Components not rendering correctly
1. Verify CSS load order: variables → molecules → organisms
2. Check browser console for 404 errors
3. Ensure Google Fonts load before CSS
4. Clear browser cache (Cmd+Shift+R on Mac, Ctrl+F5 on Windows)

### Styles conflict with CMS platform
1. Increase CSS specificity in component files
2. Regenerate production files
3. Use `!important` sparingly (document when used)

### New component not appearing
1. Verify component CSS added to individual file
2. Regenerate production-molecules.css or production-organisms.css
3. Clear CMS/browser cache

---

## File Locations

### Production Files
```
/styles/
├── variables-v4.0-20251027.css
├── production-molecules.css
├── production-organisms.css
└── production-master.css
```

### Development Files
```
/styles/
├── atoms-banner-spacer.css
├── molecules-*.css (17 files)
├── organisms-*.css (13 files)
├── blog-group-organism-v2.css
├── molecules-master.css
└── master-styles.css
```

### Archived Files
```
/styles/_archived/
└── (Demo files, deprecated versions, test files)
```

---

## Browser Support

All production CSS files support:
- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ✅ Mobile Safari (iOS 14+)
- ✅ Chrome Mobile (Android 10+)

**Responsive Breakpoints:**
- Mobile: 380-767px
- Tablet: 768-1149px
- Desktop: 1150-1919px
- DesktopPlus: 1920px+

---

## Version History

### Version 1.0 (November 5, 2025)
- Initial production consolidation
- 36 development files → 4 production files
- 92% reduction in HTTP requests
- All components v4.0 tokenized
- 100% organism layer complete (22/22)

---

## Support & Documentation

- **Design System Documentation:** `/CLAUDE_CODE_CONTEXT.md`
- **Variables Reference:** `/variables/`
- **Component Library:** `/components/`
- **This Guide:** `/styles/PRODUCTION-DEPLOYMENT-GUIDE.md`

---

**Last Updated:** November 5, 2025
**Maintained By:** Purposeful Media Promotions
**Design System Version:** v4.0
