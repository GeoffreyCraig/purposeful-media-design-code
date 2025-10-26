# Pillar Sticky Menu - Test Component

**Component Type:** Organism  
**Created:** 2025-10-16  
**Status:** ✅ Ready for Testing  
**Files:**
- `pillar-sticky-menu-test.html`
- `pillar-sticky-menu-test.css`

---

## Component Overview

The Pillar Sticky Menu is a navigation component that appears below the hero section and sticks to the top of the viewport when scrolling. It provides quick access to all major sections of the Pillar page. The desktop version shows all menu items horizontally with separators, while the mobile version shows only the current section name and a "Get Started" button.

---

## Key Features

- **CSS Sticky Positioning:** Uses `position: sticky` for native browser behavior (no complex JavaScript)
- **Desktop Layout:** Horizontal menu with 7 items + separators + "Get Started" button
- **Mobile Layout:** Simplified - shows current section + "Get Started" only
- **Active Tracking:** Automatically highlights the current section based on scroll position
- **Smooth Scrolling:** Animated scroll to sections with sticky menu height offset
- **Fully Responsive:** Optimized for all breakpoints including very small mobile devices

---

## Design Specifications

### Desktop Menu (768px+)
- **Layout:** Horizontal flexbox, space-between
- **Items:** 7 navigation links with "&gt;" separators
- **Active State:** Light gold background (#faf5e6) with 8px border radius
- **"Get Started":** Highlighted with gold background
- **Height:** 60px fixed

### Mobile Menu (≤767px)
- **Layout:** Horizontal flexbox (current section + button)
- **Display:** Only shows active section name and "Get Started"
- **Height:** 60px minimum
- **Simplified UX:** No dropdown, no menu toggle (cleaner interface)

---

## Menu Items

The sticky menu includes 7 anchor links:

1. **Overview** → `#overview`
2. **Strategy** → `#strategy`
3. **Method** → `#method`
4. **Benefits** → `#benefits`
5. **Resources** → `#resources`
6. **FAQ** → `#faq`
7. **Get Started** → `#start` (highlighted)

---

## BEM Class Structure

```
.pillar-sticky-menu                    ← Block (organism)
  .pillar-sticky-menu__desktop         ← Element (desktop container)
    .pillar-sticky-menu__inner         ← Element (max-width wrapper)
      .pillar-sticky-menu__item        ← Element (nav link)
      .pillar-sticky-menu__item--active ← Modifier (active state)
      .pillar-sticky-menu__separator   ← Element (">")
      .pillar-sticky-menu__start       ← Element (Get Started button)
  .pillar-sticky-menu__mobile          ← Element (mobile container)
    .pillar-sticky-menu__mobile-bar    ← Element (flex wrapper)
      .pillar-sticky-menu__mobile-current ← Element (current section display)
      .pillar-sticky-menu__mobile-start   ← Element (Get Started button)
```

---

## HTML Structure

### Desktop Version
```html
<nav class="pillar-sticky-menu" role="navigation" aria-label="Page sections navigation">
    <div class="pillar-sticky-menu__desktop">
        <div class="pillar-sticky-menu__inner">
            <a href="#overview" class="pillar-sticky-menu__item active" data-section="overview">Overview</a>
            <span class="pillar-sticky-menu__separator" aria-hidden="true">&gt;</span>
            <a href="#strategy" class="pillar-sticky-menu__item" data-section="strategy">Strategy</a>
            <span class="pillar-sticky-menu__separator" aria-hidden="true">&gt;</span>
            <a href="#method" class="pillar-sticky-menu__item" data-section="method">Method</a>
            <span class="pillar-sticky-menu__separator" aria-hidden="true">&gt;</span>
            <a href="#benefits" class="pillar-sticky-menu__item" data-section="benefits">Benefits</a>
            <span class="pillar-sticky-menu__separator" aria-hidden="true">&gt;</span>
            <a href="#resources" class="pillar-sticky-menu__item" data-section="resources">Resources</a>
            <span class="pillar-sticky-menu__separator" aria-hidden="true">&gt;</span>
            <a href="#faq" class="pillar-sticky-menu__item" data-section="faq">FAQ</a>
            <span class="pillar-sticky-menu__separator" aria-hidden="true">&gt;</span>
            <a href="#start" class="pillar-sticky-menu__start">Get Started</a>
        </div>
    </div>
    
    <div class="pillar-sticky-menu__mobile">
        <div class="pillar-sticky-menu__mobile-bar">
            <div class="pillar-sticky-menu__mobile-current" id="currentSectionMobile">Overview</div>
            <a href="#start" class="pillar-sticky-menu__mobile-start">Get Started</a>
        </div>
    </div>
</nav>
```

---

## JavaScript Functionality

### 1. Smooth Scroll to Sections
```javascript
// When menu item clicked:
// - Prevent default anchor behavior
// - Calculate target position minus sticky menu height
// - Smooth scroll to target
```

### 2. Active Section Tracking
```javascript
// On scroll:
// - Detect which section is in viewport
// - Update active class on desktop menu
// - Update current section text on mobile
// - Uses debounced scroll event (10ms)
```

### 3. Section Name Mapping
```javascript
const sectionNames = {
    'overview': 'Overview',
    'strategy': 'Strategy',
    'method': 'Method',
    'benefits': 'Benefits',
    'resources': 'Resources',
    'faq': 'FAQ',
    'start': 'Get Started'
};
```

---

## Design Token Usage

| Token | Usage | Value |
|-------|-------|-------|
| `--secondary-100` | Menu background | #eceeef (Light gray) |
| `--accent-500` | Border bottom | #d4af37 (Gold) |
| `--accent-100` | Active/hover background | #faf5e6 (Light gold) |
| `--accent-600` | Hover state (Get Started) | #b39226 (Dark gold) |
| `--text-primary` | Text color | #1b1464 (Navy) |
| `--text-reverse` | Hover text (Get Started) | #ffffff (White) |
| `--font-heading` | All text | Lato |
| `--radius-medium` | Active item corners | 8px |
| `--space-*` | All spacing | 8px grid system |
| `--container-max-width` | Inner max-width | 1920px |

---

## Responsive Breakpoints

| Breakpoint | Menu Type | Layout | Font Size | Padding |
|------------|-----------|--------|-----------|---------|
| **≤380px** | Mobile | Current + Button | 14px | 8px |
| **381-767px** | Mobile | Current + Button | 16px | 12px |
| **768-1919px** | Desktop | Full horizontal | 16px | 4px 8px |
| **≥1920px** | Desktop | Full horizontal | 16px | 0 20px |

---

## Sticky Behavior

The menu uses CSS `position: sticky` which:
1. **Initially:** Appears in normal document flow below hero
2. **When scrolling down:** Sticks to `top: 0` of viewport
3. **While scrolling:** Remains at top with `z-index: 1000`
4. **When scrolling up:** Stays sticky until hero comes back into view
5. **Performance:** Native browser behavior (no scroll listeners needed)

---

## Testing Checklist

### Visual Testing
- [ ] Menu appears below hero section initially
- [ ] Background color is light gray (#eceeef)
- [ ] Gold border at bottom (1px)
- [ ] Shadow displays correctly for depth
- [ ] Desktop: All 7 items + separators + Get Started visible
- [ ] Mobile: Only current section + Get Started visible
- [ ] Active item has light gold background
- [ ] Typography is uppercase and bold (Lato 900)

### Sticky Behavior Testing
- [ ] Menu scrolls naturally with page at first
- [ ] Menu sticks to top when it reaches viewport top
- [ ] Menu stays at top while scrolling through content
- [ ] Menu unsticks when scrolling back to top
- [ ] Z-index keeps menu above page content
- [ ] No jank or visual jumps when sticking/unsticking

### Interactive Testing
- [ ] Desktop: Clicking menu items scrolls to section
- [ ] Desktop: Active state updates based on scroll position
- [ ] Desktop: Hover states work on all items
- [ ] Desktop: "Get Started" hover changes to dark gold with white text
- [ ] Mobile: Current section text updates on scroll
- [ ] Mobile: "Get Started" button scrolls to contact section
- [ ] Smooth scroll is smooth (not instant)
- [ ] Scroll offset accounts for sticky menu height

### Responsive Testing
- [ ] **≤380px:** Reduced padding and font sizes
- [ ] **381-767px:** Mobile layout with normal sizes
- [ ] **768-1919px:** Desktop horizontal layout
- [ ] **≥1920px:** Desktop with increased inner padding
- [ ] Breakpoint transitions are smooth
- [ ] No layout shifts when resizing

### Accessibility Testing
- [ ] Keyboard navigation works (Tab through items)
- [ ] Enter/Space activates links
- [ ] Focus states visible
- [ ] ARIA label on nav element
- [ ] ARIA-hidden on decorative separators
- [ ] Screen reader announces menu items correctly
- [ ] High contrast mode compatible

### Cross-Browser Testing
- [ ] Chrome/Edge (position: sticky support)
- [ ] Firefox (position: sticky support)
- [ ] Safari (position: -webkit-sticky fallback)
- [ ] Mobile Safari (iOS)
- [ ] Chrome Android

---

## Known Issues

None at this time.

---

## Differences from Homepage Mobile Menu

| Feature | Homepage Menu | Pillar Menu |
|---------|---------------|-------------|
| **Mobile Display** | Hamburger with dropdown | Current section + button only |
| **Desktop Layout** | Logo + menu + hamburger | Navigation items only |
| **Sticky Behavior** | Complex JS positioning | Simple CSS sticky |
| **Active Tracking** | Not implemented | Full scroll tracking |
| **Menu Items** | 4-5 site pages | 7 page sections |

---

## Integration Notes

### With Hero Section
```html
<!-- Hero Section -->
<section class="hero-pillar">
    <!-- Hero content -->
</section>

<!-- Sticky Menu (appears below hero) -->
<nav class="pillar-sticky-menu">
    <!-- Menu content -->
</nav>
```

### With Page Sections
Each section that the menu links to must have a matching `id` attribute:
```html
<section id="overview">...</section>
<section id="strategy">...</section>
<section id="method">...</section>
<section id="benefits">...</section>
<section id="resources">...</section>
<section id="faq">...</section>
<section id="start">...</section>
```

---

## Next Steps

1. Test component in isolation
2. Test sticky behavior with long page content
3. Test active tracking with actual sections
4. Test smooth scroll accuracy
5. Test on real mobile devices
6. Integrate with hero and page sections
7. Deploy to WordPress and create ACF fields for menu items

---

## Notes

- The simplified mobile menu (current section only) reduces cognitive load and screen clutter
- CSS sticky is supported in all modern browsers; `-webkit-sticky` provides fallback for Safari
- The `data-section` attribute links menu items to their corresponding page sections
- Scroll offset calculation ensures sections appear below the sticky menu, not hidden beneath it
- The "Get Started" button is visually emphasized to drive conversions

