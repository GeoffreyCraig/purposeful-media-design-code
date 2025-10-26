# Blog Teaser Group - Test Component

**Component Type:** Organism  
**Created:** 2025-10-16  
**Status:** ✅ Ready for Testing  
**Files:** `blog-teaser-test.html`, `blog-teaser-test.css`

---

## Overview

Single-column blog teaser section displaying 2 recent blog post cards with placeholder content for MVW Phase 1. Each card includes title, metadata, excerpt, and "Read more" link with hover states.

---

## Key Features

- **Single Column Layout:** 2 cards stacked vertically
- **Placeholder Content:** Sample blog posts for initial deployment
- **Card Hover States:** Cream background (#faf5e6) with shadow
- **Responsive Typography:** Title scales 16px → 21px across breakpoints
- **Max Width Container:** 1200px content area
- **16px Gap:** Between cards

---

## BEM Structure

```
.blog-teaser                    ← Block (organism)
  .blog-teaser__container       ← Element (max-width wrapper)
    .blog-teaser__inner         ← Element (1200px max-width, flex column)
      .card-blogpost            ← Molecule (blog post card)
        .card-blogpost__top     ← Element (title & meta)
          .card-blogpost__title ← Element (H3)
          .card-blogpost__meta  ← Element (category, date, author)
        .card-blogpost__content ← Element (excerpt container)
          .card-blogpost__excerpt    ← Element (P)
          .card-blogpost__read-more  ← Element (link)
```

---

## Responsive Behavior

| Breakpoint | Padding | Title Size | Inner Gap |
|------------|---------|------------|-----------|
| Mobile (≤767px) | 32px 16px | 16px/24px | 16px |
| Tablet (768-1149px) | 48px 32px | 18px/27px | 16px |
| Desktop (1150-1919px) | 64px 40px | 21px/30.5px | 16px |
| DesktopPlus (≥1920px) | 80px 40px | 21px/30.5px | 16px |

---

## Card States

- **Default:** White background, navy title
- **Hover:** Cream background (#faf5e6), shadow, gray title, teal "Read more"
- **Active:** (Future: pressed state when clicked)

---

## Placeholder Content

**Card 1:**
- Title: "Essential Email Marketing Strategies for B2B Success"
- Category: Email Marketing
- Date: October 10, 2025
- Author: Purposeful Media

**Card 2:**
- Title: "How to Create Content That Converts Technical Audiences"
- Category: Content Strategy
- Date: October 5, 2025
- Author: Geoffrey Craig

---

## Testing Checklist

- [ ] 2 cards display in single column
- [ ] Cards have 16px gap between them
- [ ] Hover state shows cream background and shadow
- [ ] Title color changes on hover (navy → gray)
- [ ] "Read more" color changes on hover (blue → teal)
- [ ] Typography scales correctly across breakpoints
- [ ] Max-width 1200px enforced on inner container
- [ ] Padding responsive across breakpoints

---

## Future Enhancements (WordPress Integration)

- Replace placeholder content with dynamic WordPress posts
- Add featured images to cards
- Link cards to actual blog post URLs
- Add category/tag filtering
- Include "View All Posts" CTA button

---

## Notes

- Uses gray background (#eceeef) to match Pillar page sections
- Cards use white background for contrast
- Designed for exactly 2 posts (may expand to 3-4 in future iterations)
- Card molecule can be reused in other blog displays

