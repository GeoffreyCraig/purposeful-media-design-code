# Slide Set Molecules - Variable Mapping Documentation

**Date:** October 24, 2025  
**Project:** Purposeful Media MVW Phase 1  
**Purpose:** Map Figma Slide Set Molecule components to CSS variables and tokens

---

## Component Overview

These five molecule components work together to create the Homepage hero video carousel:

1. **Slide-Frame** (3469:9177) - Video container with aspect ratio variants
2. **Slide-Hero** (4118:539) - Full hero slide with video port and gradient overlay
3. **Buttons-NavArrowPairs** (3339:236) - Left/Right navigation arrows
4. **Buttons-NavDotGroups** (3303:50) - Dot indicators for slides
5. **Buttons-PlayPause** (3551:47) - Video playback control button

---

## 1. Slide-Frame Component (3469:9177)

### Purpose
Container frame for video slides with multiple aspect ratio options and loading states.

### Component Variants
- **Aspect Ratios:** 16:9, 4:3, 1:1, Flex
- **Breakpoints:** DesktopPlus, Desktop, Tablet, Mobile
- **States:** Loading, Ready, Error, Focus

### Variable Mappings

#### Dimensions by Aspect Ratio & Breakpoint

| Aspect Ratio | Breakpoint | Width | Height | CSS Variables |
|--------------|------------|-------|--------|---------------|
| 16:9 | All | 352px | 198px | - |
| 4:3 | All | 352px | 264px | - |
| 1:1 | All | 352px | 352px | - |
| Flex | All | 352px | 156px | - |

**Notes:** 
- Dimensions are fixed at design size
- Responsive sizing should be handled by container/parent organism
- Consider adding these as component-specific variables

#### Border & Radius Tokens

```css
/* Existing tokens used */
border-radius: var(--radius-medium); /* 8px */
```

#### State Colors

```css
/* Loading State */
background: var(--color-secondary); /* #ECEEEF - should be var(--color-neutral-100) */

/* Error State */
background: var(--color-error-100); /* #FEE2E2 */

/* Focus State */
border: 2px solid var(--color-accent-500); /* #D4AF37 - accent gold */
```

#### Recommended New Variables

```css
/* Add to variables file - Component-Specific Tokens */
:root {
  /* Slide Frame Dimensions */
  --slide-frame-width: 352px;
  --slide-frame-16-9-height: 198px;
  --slide-frame-4-3-height: 264px;
  --slide-frame-1-1-height: 352px;
  --slide-frame-flex-height: 156px;
  
  /* Slide Frame States */
  --slide-frame-loading-bg: var(--color-neutral-100);
  --slide-frame-error-bg: var(--color-error-100);
  --slide-frame-focus-border: 2px solid var(--color-accent-500);
}
```

---

## 2. Slide-Hero Component (4118:539)

### Purpose
Full-size hero slide with video port and gradient overlay. The main container for homepage hero video carousel slides.

### Component Variants
- **Breakpoints:** DesktopPlus (1920px), Desktop (1150px), Tablet (768px), Mobile (380px)
- **Show Overlay:** Boolean (true/false)

### Variable Mappings

#### Dimensions by Breakpoint

| Breakpoint | Width | Height | Max Width | Max Height |
|------------|-------|--------|-----------|------------|
| DesktopPlus | 1920px | 1079.58px | 1920px | 1079.58px |
| Desktop | 1150px | 647px | 1920px | 1079.58px |
| Tablet | 768px | 432px | - | - |
| Mobile | 380px | 285px | - | - |

#### Gradient Overlay Tokens

```css
/* Gradient overlay (when showOverlay = true) */
background: linear-gradient(
  to bottom,
  rgba(27, 20, 100, 0.2),  /* --color-primary-700 at 20% opacity */
  rgba(255, 255, 255, 0.2)  /* white at 20% opacity */
);
```

#### Recommended New Variables

```css
/* Add to variables file - Slide Hero Tokens */
:root {
  /* Slide Hero Dimensions - DesktopPlus */
  --slide-hero-desktop-plus-width: 1920px;
  --slide-hero-desktop-plus-height: 1079.58px;
  
  /* Slide Hero Dimensions - Desktop */
  --slide-hero-desktop-width: 1150px;
  --slide-hero-desktop-height: 647px;
  
  /* Slide Hero Dimensions - Tablet */
  --slide-hero-tablet-width: 768px;
  --slide-hero-tablet-height: 432px;
  
  /* Slide Hero Dimensions - Mobile */
  --slide-hero-mobile-width: 380px;
  --slide-hero-mobile-height: 285px;
  
  /* Slide Hero Overlay Gradients */
  --slide-hero-overlay-start: rgba(27, 20, 100, 0.2); /* Primary navy with 20% opacity */
  --slide-hero-overlay-end: rgba(255, 255, 255, 0.2); /* White with 20% opacity */
  --slide-hero-gradient: linear-gradient(
    to bottom,
    var(--slide-hero-overlay-start),
    var(--slide-hero-overlay-end)
  );
}
```

---

## 3. Buttons-NavArrowPairs Component (3339:236)

### Purpose
Left and right navigation arrow buttons for carousel control. Arrows can be shown/hidden independently and positioned inside or outside the carousel.

### Component Variants
- **Show Left:** Yes/No
- **Show Right:** Yes/No
- **Position:** Inside/Outside
- **Arrow Direction:** Left, Right, Up, Down
- **Arrow State:** Default, Hover, Disabled

### Variable Mappings

#### Container Dimensions

```css
/* Arrow Pair Container */
width: 317px;  /* Fixed spacing between arrows */
padding: var(--space-0); /* 0px - no padding */
gap: /* calculated to maintain 317px width with 48px buttons */
```

#### Individual Arrow Button

```css
/* Arrow Button Base */
width: 48px;
height: 48px;
border-radius: var(--radius-medium); /* 8px */
padding: 10px 12px; /* Asymmetric for icon centering */
```

#### State Colors

```css
/* Default State */
background: rgba(255, 255, 255, 0.9); /* 90% white */
box-shadow: none;

/* Hover State */
background: rgba(255, 255, 255, 0.5); /* 50% white */
box-shadow: var(--shadow-subtle); /* 4px 4px 12px rgba(0,0,0,0.1) */

/* Disabled State - not shown in design but needed */
background: rgba(255, 255, 255, 0.9);
opacity: 0.5;
```

#### SVG Icons (from sprite sheet)

The arrow SVGs are referenced from `/assets/svg/ui-icons/purposeful-sprite-ui.svg`:

- **Arrow Left (Default):** Use positioning from `purposeful-ui-sprite.txt`
- **Arrow Left (Hover):** Different sprite position
- **Arrow Right (Default):** Rotated 270° and flipped vertically
- **Arrow Right (Hover):** Rotated 270° and flipped vertically

#### Recommended New Variables

```css
/* Add to variables file - Navigation Arrow Tokens */
:root {
  /* Arrow Button Dimensions */
  --arrow-button-size: 48px;
  --arrow-button-padding: 10px 12px;
  --arrow-container-width: 317px;
  
  /* Arrow Button States */
  --arrow-bg-default: rgba(255, 255, 255, 0.9);
  --arrow-bg-hover: rgba(255, 255, 255, 0.5);
  --arrow-shadow-hover: var(--shadow-subtle);
  
  /* Arrow Icon Dimensions */
  --arrow-icon-width: 24px;
  --arrow-icon-height: 28px;
}
```

---

## 4. Buttons-NavDotGroups Component (3303:50)

### Purpose
Carousel pagination dots showing current slide position. Supports 3-6 dots with any position active.

### Component Variants
- **Dot Count:** 3, 4, 5, 6
- **Active Position:** 1, 2, 3, 4, 5, 6
- **Dot State:** Default, Active
- **Dot Size:** Default (8px), Large (12px for active)

### Variable Mappings

#### Container Dimensions

```css
/* Dot Group Container */
width: 152px; /* Fixed width regardless of dot count */
padding: var(--space-5); /* 20px */
gap: var(--space-3); /* 12px between dots */
```

#### Individual Dot Dimensions

```css
/* Default Dot */
width: 8px;
height: 8px;
border-radius: var(--radius-round); /* 999px for perfect circle */

/* Active Dot (Large) */
width: 12px;
height: 12px;
border-radius: var(--radius-round);
```

#### Dot Colors

```css
/* Default Dot */
background: var(--color-neutral-400); /* #868F97 - medium gray */

/* Active Dot */
background: var(--color-accent-400); /* #DCBE5D - hover gold */
```

**Note:** Active dots use `--color-accent-400` (#DCBE5D) which is labeled as "hover" gold in Figma. This is the lighter/hover shade of accent gold.

#### Recommended New Variables

```css
/* Add to variables file - Navigation Dot Tokens */
:root {
  /* Dot Group Container */
  --dot-group-width: 152px;
  --dot-group-padding: var(--space-5); /* 20px */
  --dot-group-gap: var(--space-3); /* 12px */
  
  /* Dot Dimensions */
  --dot-size-default: 8px;
  --dot-size-active: 12px;
  
  /* Dot Colors */
  --dot-color-default: var(--color-neutral-400); /* #868F97 */
  --dot-color-active: var(--color-accent-400); /* #DCBE5D */
}
```

---

## 5. Buttons-PlayPause Component (3551:47)

### Purpose
Video playback control button that toggles between play and pause states.

### Component Variants
- **State:** Paused (shows play icon), Playing (shows pause icon)
- **Size:** Medium (32px icon area), Small (24px icon area)
- **Style:** Ghost (transparent bg), Solid (white bg)
- **Interactive:** Default, Hover, Pressed

### Variable Mappings

#### Button Dimensions

```css
/* Medium Size */
width: 48px; /* includes 12px padding */
height: 48px;
padding: var(--space-3); /* 12px */

/* Small Size */
width: 40px; /* includes 12px padding */
height: 40px;
padding: var(--space-3); /* 12px */
```

#### Icon Dimensions

```css
/* Medium Play Icon */
width: 21px;
height: 24px;
padding: var(--space-2); /* 8px */

/* Medium Pause Icon */
width: 16px;
height: 24px;
padding: 14px 7px; /* Asymmetric for centering */

/* Small Play Icon */
width: 17px;
height: 20px;
padding: var(--space-2); /* 8px */

/* Small Pause Icon */
width: 14px;
height: 20px;
padding: 14px 7px; /* Asymmetric for centering */
```

#### Ghost Style States

```css
/* Default State */
background: rgba(255, 255, 255, 0.6); /* 60% white */
box-shadow: none;

/* Hover State */
background: rgba(212, 175, 55, 0.2); /* Accent gold 20% opacity */
box-shadow: none;

/* Pressed State */
background: rgba(212, 175, 55, 0.4); /* Accent gold 40% opacity */
box-shadow: none;
```

#### Solid Style States

```css
/* Default State */
background: var(--color-white); /* #FFFFFF */
box-shadow: none;

/* Hover State */
background: var(--color-accent-500); /* #D4AF37 - accent gold */
box-shadow: none;

/* Pressed State */
background: var(--color-accent-600); /* #B39226 - active gold */
box-shadow: none;
```

#### Border Radius

```css
border-radius: var(--radius-medium); /* 8px */
```

#### SVG Icons (from sprite sheet)

The play/pause SVGs are referenced from `/assets/svg/ui-icons/purposeful-sprite-ui.svg`:

- **Play Icon (Medium):** ButtonPlay - 21px × 24px
- **Play Icon (Small):** ButtonPlay - 17px × 20px
- **Pause Icon (Medium):** ButtonPause - 16px × 24px
- **Pause Icon (Small):** ButtonPause - 14px × 20px

#### Recommended New Variables

```css
/* Add to variables file - Play/Pause Button Tokens */
:root {
  /* Button Dimensions */
  --play-pause-button-medium: 48px;
  --play-pause-button-small: 40px;
  --play-pause-padding: var(--space-3); /* 12px */
  
  /* Icon Dimensions */
  --play-icon-medium-width: 21px;
  --play-icon-medium-height: 24px;
  --play-icon-small-width: 17px;
  --play-icon-small-height: 20px;
  --pause-icon-medium-width: 16px;
  --pause-icon-medium-height: 24px;
  --pause-icon-small-width: 14px;
  --pause-icon-small-height: 20px;
  
  /* Ghost Style States */
  --play-pause-ghost-default: rgba(255, 255, 255, 0.6);
  --play-pause-ghost-hover: rgba(212, 175, 55, 0.2);
  --play-pause-ghost-pressed: rgba(212, 175, 55, 0.4);
  
  /* Solid Style States */
  --play-pause-solid-default: var(--color-white);
  --play-pause-solid-hover: var(--color-accent-500);
  --play-pause-solid-pressed: var(--color-accent-600);
}
```

---

## Consolidated Variable Additions for variables-v2.0-20250915.css

### Section: COMPONENT-SPECIFIC TOKENS

Add the following to the existing `:root` section for component-specific tokens:

```css
/* =================================================
   SLIDE SET MOLECULE TOKENS
   ================================================= */
  
  /* Slide Frame Dimensions */
  --slide-frame-width: 352px;
  --slide-frame-16-9-height: 198px;
  --slide-frame-4-3-height: 264px;
  --slide-frame-1-1-height: 352px;
  --slide-frame-flex-height: 156px;
  
  /* Slide Frame States */
  --slide-frame-loading-bg: var(--color-neutral-100);
  --slide-frame-error-bg: var(--color-error-100);
  --slide-frame-focus-border: 2px solid var(--color-accent-500);
  
  /* Slide Hero Dimensions - Responsive */
  --slide-hero-desktop-plus-width: 1920px;
  --slide-hero-desktop-plus-height: 1079.58px;
  --slide-hero-desktop-width: 1150px;
  --slide-hero-desktop-height: 647px;
  --slide-hero-tablet-width: 768px;
  --slide-hero-tablet-height: 432px;
  --slide-hero-mobile-width: 380px;
  --slide-hero-mobile-height: 285px;
  
  /* Slide Hero Overlay Gradients */
  --slide-hero-overlay-start: rgba(27, 20, 100, 0.2);
  --slide-hero-overlay-end: rgba(255, 255, 255, 0.2);
  --slide-hero-gradient: linear-gradient(
    to bottom,
    var(--slide-hero-overlay-start),
    var(--slide-hero-overlay-end)
  );
  
  /* Navigation Arrow Buttons */
  --arrow-button-size: 48px;
  --arrow-button-padding: 10px 12px;
  --arrow-container-width: 317px;
  --arrow-bg-default: rgba(255, 255, 255, 0.9);
  --arrow-bg-hover: rgba(255, 255, 255, 0.5);
  --arrow-shadow-hover: var(--shadow-subtle);
  --arrow-icon-width: 24px;
  --arrow-icon-height: 28px;
  
  /* Navigation Dots */
  --dot-group-width: 152px;
  --dot-group-padding: var(--space-5);
  --dot-group-gap: var(--space-3);
  --dot-size-default: 8px;
  --dot-size-active: 12px;
  --dot-color-default: var(--color-neutral-400);
  --dot-color-active: var(--color-accent-400);
  
  /* Play/Pause Button */
  --play-pause-button-medium: 48px;
  --play-pause-button-small: 40px;
  --play-pause-padding: var(--space-3);
  --play-icon-medium-width: 21px;
  --play-icon-medium-height: 24px;
  --play-icon-small-width: 17px;
  --play-icon-small-height: 20px;
  --pause-icon-medium-width: 16px;
  --pause-icon-medium-height: 24px;
  --pause-icon-small-width: 14px;
  --pause-icon-small-height: 20px;
  --play-pause-ghost-default: rgba(255, 255, 255, 0.6);
  --play-pause-ghost-hover: rgba(212, 175, 55, 0.2);
  --play-pause-ghost-pressed: rgba(212, 175, 55, 0.4);
  --play-pause-solid-default: var(--color-white);
  --play-pause-solid-hover: var(--color-accent-500);
  --play-pause-solid-pressed: var(--color-accent-600);
```

---

## Implementation Notes

### JavaScript Functionality Required

1. **Slide-Hero Component:**
   - Video loading state management
   - Error handling for failed video loads
   - Focus state for keyboard navigation

2. **Buttons-NavArrowPairs:**
   - Click handlers for prev/next navigation
   - Disabled state when at first/last slide
   - Keyboard navigation (arrow keys)

3. **Buttons-NavDotGroups:**
   - Dynamic dot count based on total slides
   - Click handlers for direct slide navigation
   - Active state management

4. **Buttons-PlayPause:**
   - Toggle state between play/pause
   - Video play/pause control
   - Icon swap animation

### Accessibility Requirements

1. **ARIA Labels:**
   - Arrow buttons: `aria-label="Previous slide"` / `"Next slide"`
   - Dot buttons: `aria-label="Go to slide {n}"`
   - Play/Pause: `aria-label="Play video"` / `"Pause video"`

2. **ARIA States:**
   - Current slide: `aria-current="true"` on active dot
   - Disabled arrows: `aria-disabled="true"`
   - Play/Pause: `aria-pressed="true"` when playing

3. **Keyboard Navigation:**
   - Arrow keys: Navigate between slides
   - Space/Enter: Activate buttons
   - Tab: Navigate through controls

### CSS Organization

Create modular CSS files following Atomic Design:

```
/styles/molecules/
  ├── slide-frame.css
  ├── slide-hero.css
  ├── buttons-nav-arrows.css
  ├── buttons-nav-dots.css
  └── buttons-play-pause.css
```

Each file should:
1. Reference variables from `variables-v2.0-20250915.css`
2. Include base styles + variants
3. Include responsive media queries
4. Include state styles (hover, active, focus, disabled)

---

## Cross-Reference: Parent Organisms

These molecules are nested within:

- **Section/HeroCarousel** (4111:1257) - Homepage hero video carousel
- May appear in other page sections as reusable components

---

## Figma Node IDs Reference

| Component | Node ID | Description |
|-----------|---------|-------------|
| Slide-Frame | 3469:9177 | Video container with aspect ratios |
| Slide-Hero | 4118:539 | Full hero slide with video port |
| Buttons-NavArrowPairs | 3339:236 | Left/right navigation arrows |
| Buttons-NavDotGroups | 3303:50 | Pagination dot indicators |
| Buttons-PlayPause | 3551:47 | Video playback control |

---

## Next Steps

1. ✅ **Completed:** Figma component extraction and variable mapping
2. **To Do:** Add consolidated variables to `variables-v2.0-20250915.css`
3. **To Do:** Create individual molecule CSS files
4. **To Do:** Create HTML templates for each molecule
5. **To Do:** Implement JavaScript functionality
6. **To Do:** Test components in isolation
7. **To Do:** Integrate into parent organism (Section/HeroCarousel)

---

**Document Status:** Draft - Ready for Review  
**Last Updated:** October 24, 2025, 9:40 AM PST  
**Author:** Geoffrey Craig (with Claude AI assistance)
