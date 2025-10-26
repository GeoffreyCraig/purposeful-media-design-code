# Reverse Subheading Banner - Test Component

**Component Type:** Organism  
**Created:** 2025-10-16  
**Updated:** 2025-10-16  
**Status:** ✅ Ready for Testing  
**Files:** `reverse-banner-test.html`, `reverse-banner-test.css`

---

## Overview

Simple white background banner with a left-aligned subheading. Fixed 69px height at ALL breakpoints. Designed to be placed directly below headline banners to provide additional context.

---

## Key Features

- **Fixed Height:** 69px at every breakpoint (no responsive changes)
- **Left-Aligned:** Subheading aligned to left edge of container
- **White Background:** Contrasts with gray page backgrounds
- **Single Element:** Just a subheading (P tag), no headline
- **Simple & Clean:** Minimal styling for maximum flexibility

---

## BEM Structure

```
.reverse-banner                 ← Block (organism)
  .reverse-banner__container    ← Element (max-width wrapper with padding)
    .reverse-banner__subheading ← Element (P tag, left-aligned)
```

---

## Specifications

| Property | Value |
|----------|-------|
| **Height** | 69px (fixed, all breakpoints) |
| **Background** | White (#ffffff) |
| **Padding** | 0 40px (horizontal only) |
| **Font** | Lato, 700 weight |
| **Font Size** | 21px |
| **Line Height** | 31.5px |
| **Text Color** | Navy (#1b1464) |
| **Alignment** | Left |
| **Max Width** | 1920px (container) |

---

## Usage Examples

### Example 1: Blog Section
**Headline Banner:** "Resources" (centered, uppercase, 900 weight)  
**Reverse Banner:** "The Latest From Our Blog" (left-aligned, 700 weight)

### Example 2: Downloads Section
**Headline Banner:** "Downloads" (centered, uppercase, 900 weight)  
**Reverse Banner:** "Featured Resource Download" (left-aligned, 700 weight)

---

## HTML Structure

```html
<!-- Typical usage: Below a headline banner -->
<section class="headline-banner">
    <h2 class="headline-banner__headline">Resources</h2>
</section>

<section class="reverse-banner" aria-label="Section subheading">
    <div class="reverse-banner__container">
        <p class="reverse-banner__subheading">The Latest From Our Blog</p>
    </div>
</section>
```

---

## Testing Checklist

- [ ] Fixed 69px height at all breakpoints (mobile, tablet, desktop, desktop+)
- [ ] White background displays correctly
- [ ] Text is navy blue (#1b1464)
- [ ] Text is left-aligned (not centered)
- [ ] Font: Lato 700, 21px/31.5px
- [ ] Horizontal padding: 40px on both sides
- [ ] Container max-width: 1920px
- [ ] Works standalone and below headline banners

---

## Differences from Original Design

**Original (complex):**
- Centered layout
- Both headline AND subheading
- Responsive padding (32px → 80px)
- Responsive typography (24px → 48px headline)

**Updated (simple):**
- Left-aligned layout
- ONLY subheading (no headline)
- Fixed 69px height
- Fixed typography (21px at all breakpoints)

This simplified version is much cleaner and easier to maintain!

---

## Notes

- This component is intentionally minimal
- Can be reused multiple times on a page
- Works with or without a headline banner above it
- The "reverse" name distinguishes it from typical navy/gold banners
- No responsive changes needed - same at all breakpoints
