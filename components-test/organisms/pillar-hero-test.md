# Pillar Hero - Test Component

**Component Type:** Organism  
**Created:** 2025-10-16  
**Status:** ✅ Ready for Testing  
**Files:**
- `pillar-hero-test.html`
- `pillar-hero-test.css`

---

## Component Overview

The Pillar Hero is a specialized hero section for Pillar pages (Email Management, Content Creation, Webinar Production). It features a distinctive gold-to-navy gradient background, a centered image, and a call-to-action section with a button that links to the Overview section below.

---

## Key Features

- **Gradient Background:** Gold (#d4af37) at top transitioning to Navy Blue (#1b1464) at bottom
- **Centered Image:** Responsive image with breakpoint-dependent padding and max-width
- **CTA Structure:** Headline → Descriptive Text → Secondary Button
- **Button Functionality:** Smooth scroll to `#overview` anchor point
- **Fully Responsive:** 4 breakpoints (Mobile, Tablet, Desktop, DesktopPlus)
- **Accessible:** Keyboard navigation, ARIA labels, focus states

---

## Design Specifications

### Gradient Background
```css
background: linear-gradient(
    180deg,
    var(--accent-500, #d4af37) 0%,
    var(--primary-700, #1b1464) 100%
);
```

### Image Behavior
- **Mobile:** Full width, no max-width constraint
- **Tablet:** Max-width 600px
- **Desktop:** Max-width 800px
- **DesktopPlus:** Max-width 1000px

### Button Style
- **Type:** Secondary (transparent with white border)
- **Hover:** White background with navy text
- **Focus:** Gold outline for accessibility

---

## Breakpoint Specifications

| Breakpoint | Padding | Min Height | Headline Size | Text Size | Button Size | Image Max-Width |
|------------|---------|------------|---------------|-----------|-------------|-----------------|
| **Mobile** (≤767px) | 32px 16px | 500px | 24px/36px | 16px/24px | 14px | None |
| **Tablet** (768-1149px) | 48px 32px | 600px | 30px/45px | 18px/27px | 16px | 600px |
| **Desktop** (1150-1919px) | 64px 40px | 700px | 36px/54px | 21px/31.5px | 18px | 800px |
| **DesktopPlus** (≥1920px) | 80px 40px | 800px | 48px/72px | 24px/36px | 21px | 1000px |

---

## BEM Class Structure

```
.hero-pillar                    ← Block (organism)
  .hero-pillar__container       ← Element (content wrapper)
    .hero-pillar__image-wrapper ← Element (image container)
      .hero-pillar__image       ← Element (img tag)
    .hero-pillar__cta           ← Element (CTA container)
      .hero-pillar__headline    ← Element (H1)
      .hero-pillar__text        ← Element (paragraph)
      .hero-pillar__button      ← Element (CTA button)
```

---

## HTML Structure

```html
<section class="hero-pillar" aria-label="Page Hero Section">
    <div class="hero-pillar__container">
        <!-- Image Section -->
        <div class="hero-pillar__image-wrapper">
            <img 
                src="../../assets/images/pillar-page-image.jpg" 
                alt="[Page Topic]" 
                class="hero-pillar__image"
                loading="eager"
            >
        </div>
        
        <!-- CTA Section -->
        <div class="hero-pillar__cta">
            <h1 class="hero-pillar__headline">
                [Page Title]
            </h1>
            <p class="hero-pillar__text">
                [Brief description of the page content]
            </p>
            <a 
                href="#overview" 
                class="hero-pillar__button" 
                role="button"
                aria-label="Scroll to Overview section"
            >
                Learn More
            </a>
        </div>
    </div>
</section>
```

---

## JavaScript Functionality

Smooth scroll behavior when button is clicked:

```javascript
// Handles smooth scrolling to #overview
// Accounts for sticky menu height if present
// Gracefully degrades if #overview doesn't exist
```

---

## Design Token Usage

| Token | Usage | Value |
|-------|-------|-------|
| `--accent-500` | Gradient top, border | #d4af37 (Gold) |
| `--primary-700` | Gradient bottom, hover text | #1b1464 (Navy) |
| `--text-reverse` | Text, button text/border | #ffffff (White) |
| `--font-heading` | Headline | Lato |
| `--font-body` | Paragraph text | Open Sans |
| `--radius-medium` | Image corners | 8px |
| `--radius-small` | Button corners | 4px |
| `--space-*` | All spacing | 8px grid system |
| `--container-max-width` | Container max | 1920px |

---

## Testing Checklist

### Visual Testing
- [ ] Gradient displays correctly (gold top → navy bottom)
- [ ] Image is centered and scales properly at all breakpoints
- [ ] Image has proper padding/margins at each breakpoint
- [ ] CTA section is centered
- [ ] Text is readable on gradient background
- [ ] Button has proper spacing
- [ ] Border at bottom displays correctly

### Responsive Testing
- [ ] **Mobile (≤767px):** Full-width button, appropriate text sizes
- [ ] **Tablet (768-1149px):** Image max-width 600px
- [ ] **Desktop (1150-1919px):** Image max-width 800px
- [ ] **DesktopPlus (≥1920px):** Image max-width 1000px
- [ ] All breakpoints maintain centered alignment

### Interactive Testing
- [ ] Button hover state: White background, navy text
- [ ] Button transforms up 2px on hover
- [ ] Button shadow appears on hover
- [ ] Button focus state: Gold outline visible
- [ ] Smooth scroll to #overview works
- [ ] Sticky menu offset calculated correctly (if present)
- [ ] Graceful degradation if #overview doesn't exist

### Accessibility Testing
- [ ] Keyboard navigation works (Tab to button, Enter to activate)
- [ ] Focus states visible
- [ ] ARIA labels present and correct
- [ ] Alt text on image
- [ ] Color contrast meets WCAG AA
- [ ] Screen reader announces elements correctly

### Cross-Browser Testing
- [ ] Chrome/Edge (Chromium)
- [ ] Firefox
- [ ] Safari (macOS/iOS)
- [ ] Mobile browsers (iOS Safari, Chrome Android)

---

## Content Variations

### Email Marketing Solutions
- **Headline:** "Email Marketing Solutions"
- **Text:** "Comprehensive strategies to boost engagement, improve deliverability, and drive measurable results for your B2B business."
- **Image Alt:** "Email Marketing Solutions"

### Content Creation & Strategy
- **Headline:** "Content Creation & Strategy"
- **Text:** "Expert content development that speaks to your technical audience and drives qualified leads."
- **Image Alt:** "Content Creation Services"

### Webinar Production Services
- **Headline:** "Webinar Production Services"
- **Text:** "Professional webinar creation and promotion to educate prospects and generate qualified leads."
- **Image Alt:** "Webinar Production"

---

## Known Issues

None at this time.

---

## Next Steps

1. Test component in isolation
2. Test with sticky menu below it
3. Test smooth scroll behavior
4. Verify image path and fallback
5. Test with all three content variations
6. Integrate into Pillar Page template
7. Deploy to WordPress and create ACF fields

---

## Notes

- The secondary button style (transparent with border) differentiates this hero from the homepage hero which uses a solid gold button
- Image path assumes `/assets/images/pillar-page-image.jpg` exists - verify this before deployment
- Button text "Learn More" is placeholder - can be customized per page
- The `loading="eager"` attribute ensures the hero image loads immediately
- Gradient direction is top-to-bottom (180deg) for a natural light-source effect

