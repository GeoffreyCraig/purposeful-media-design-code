# Pillar FAQ Section - Test Component

**Component Type:** Organism  
**Created:** 2025-10-16  
**Status:** ✅ Ready for Testing  
**Files:** `pillar-faq-test.html`, `pillar-faq-test.css`

---

## Overview

FAQ section with 5 accordion-style questions and answers for Pillar pages. Features smooth expand/collapse animation, hover states, and full keyboard accessibility. Includes "faq" ID anchor for sticky menu navigation.

---

## Key Features

- **5 FAQ Items:** Accordion-style expand/collapse
- **Anchor Point:** ID "faq" for sticky menu
- **Smooth Animation:** 0.3s transition on answers
- **Arrow Rotation:** "›" rotates 90° when expanded
- **One-at-a-time:** Opening one closes others
- **Hover States:** Cream background on question hover
- **Keyboard Accessible:** Enter/Space to toggle

---

## BEM Structure

```
.pillar-faq                     ← Block (organism, with #faq ID)
  .pillar-faq__container        ← Element (max-width wrapper)
    .pillar-faq__inner          ← Element (gray background container)
      .card-faq                 ← Molecule (FAQ item)
      .card-faq--open           ← Modifier (expanded state)
        .card-faq__question     ← Element (clickable question)
          .card-faq__question-text ← Element (question text)
          .card-faq__arrow      ← Element (› indicator)
        .card-faq__answer       ← Element (answer container)
          .card-faq__answer-content ← Element (answer text)
```

---

## Responsive Behavior

| Breakpoint | Padding | Question Size | Inner Padding | Border Radius |
|------------|---------|---------------|---------------|---------------|
| Mobile (≤767px) | 32px 16px | 18px/27px | 24px | 8px |
| Tablet (768-1149px) | 48px 32px | 21px/30.5px | 32px | 12px |
| Desktop (1150-1919px) | 64px 40px | 21px/30.5px | 32px | 12px |
| DesktopPlus (≥1920px) | 80px 40px | 21px/30.5px | 32px | 12px |

---

## FAQ Content (Placeholder)

1. **What services do you offer for email marketing?**
2. **How do you improve email deliverability?** (Open by default in demo)
3. **What results can I expect from your services?**
4. **How long does it take to see results?**
5. **Do you work with specific industries?**

---

## JavaScript Functionality

```javascript
// Accordion behavior:
// - Click question to expand/collapse
// - Opening one FAQ closes all others
// - Arrow rotates 90° when open
// - ARIA attributes update (aria-expanded, aria-hidden)
// - Keyboard support: Enter/Space to toggle
```

---

## Testing Checklist

- [ ] 5 FAQ cards display with borders
- [ ] Click question to expand answer
- [ ] Opening one closes others
- [ ] Arrow rotates 90° when open
- [ ] Smooth 0.3s transition on expand/collapse
- [ ] Hover shows cream background and shadow
- [ ] Keyboard navigation works (Tab, Enter, Space)
- [ ] ARIA attributes update correctly
- [ ] scroll-margin-top provides sticky menu offset
- [ ] Responsive typography and padding

---

## Notes

- Gray background (#eceeef) matches Pillar page theme
- One answer open at a time for cleaner UX
- Border between items (except last)
- Max-width 1200px for readability
- Answer content indented 32px from left for visual hierarchy

