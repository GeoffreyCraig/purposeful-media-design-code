# Pillar Text Block with Icons - Test Component

**Component Type:** Organism  
**Created:** 2025-10-16  
**Status:** ✅ Ready for Testing  
**Files:** `pillar-text-block-test.html`, `pillar-text-block-test.css`

---

## Overview

Text block section with 4 icon subsections (Overview, Strategy, Method, Benefits) for Pillar pages. Each subsection includes a decorative icon from the sprite, headline, and content. ID attributes provide anchor points for sticky menu navigation.

---

## Key Features

- **4 Subsections:** Overview (Accelerate icon), Strategy (Strategic icon), Method (Attract icon), Benefits (ROI icon)
- **Decorative Icons:** Uses sprite positioning from `purposeful-sprite-symbolic.svg`
- **Scroll Anchors:** Each section has `id` and `scroll-margin-top` for sticky menu offset
- **Responsive Icons:** Scale from 128px (mobile) to 256px (desktop+)
- **Flexible Layout:** Horizontal on desktop/tablet, stacked/centered on mobile

---

## Icon Sprite Positions

| Section | Icon | Sprite Position (Desktop) | Scaled (Tablet) | Scaled (Mobile) |
|---------|------|--------------------------|-----------------|-----------------|
| Overview | Accelerate | 0px 0px | 0px 0px | 0px 0px |
| Strategy | Strategic | -1280px -512px | -960px -384px | -640px -256px |
| Method | Attract | -256px 0px | -192px 0px | -128px 0px |
| Benefits | ROI | -768px -512px | -576px -384px | -384px -256px |

---

## BEM Structure

```
.pillar-text-block                      ← Block (organism)
  .pillar-text-block__container         ← Element (max-width wrapper)
    .pillar-text-block__section         ← Element (individual subsection with ID)
      .pillar-text-block__section-inner ← Element (flex container)
        .pillar-text-block__icon-wrapper   ← Element (icon container)
          .pillar-text-block__icon          ← Element (sprite background)
          .pillar-text-block__icon--accelerate ← Modifier (icon position)
        .pillar-text-block__content      ← Element (text container)
          .pillar-text-block__headline   ← Element (H2)
          .pillar-text-block__text       ← Element (paragraph)
```

---

## Responsive Behavior

| Breakpoint | Icon Size | Layout | Headline | Text | Padding |
|------------|-----------|--------|----------|------|---------|
| Mobile (≤767px) | 128px | Centered, stacked | 24px/36px | 16px/24px | 32px 16px |
| Tablet (768-1149px) | 192px | Horizontal | 30px/45px | 18px/27px | 48px 32px |
| Desktop (1150-1919px) | 256px | Horizontal | 36px/54px | 18px/27px | 64px 40px |
| DesktopPlus (≥1920px) | 256px | Horizontal | 48px/72px | 21px/31.5px | 80px 40px |

---

## Testing Checklist

- [ ] All 4 icons display correctly
- [ ] Icon sprite positions are accurate at all breakpoints
- [ ] Sections have correct IDs (overview, strategy, method, benefits)
- [ ] scroll-margin-top provides proper offset for sticky menu
- [ ] Mobile layout is centered and stacked
- [ ] Desktop layout is horizontal
- [ ] Typography scales correctly across breakpoints
- [ ] Background colors alternate (white sections on gray background)

---

## Notes

- Icon sprite must be in `../../assets/svg/decorative-icons/purposeful-sprite-symbolic.svg`
- Sprite positions calculated from `decorative-icons-positions.json` (256px icon size, 1536×4096px sprite)
- Each icon scaled proportionally for tablet (75%) and mobile (50%)
- White background on each section creates visual separation against gray container background

