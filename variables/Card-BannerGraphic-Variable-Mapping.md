# Card/BannerGraphic Component Variable Mapping Documentation

## Component Overview
The BannerGraphic card is a horizontal banner component designed to highlight key information or section headers. It features a navy background with a gold bottom border accent, containing an icon, headline, and subheading. The component adapts its layout from horizontal (desktop) to vertical stacked (mobile) while maintaining visual hierarchy and brand consistency.

## Component Structure

### Anatomy
```
Card/BannerGraphic
├── Container (Navy background with gold bottom border)
└── Content Wrapper
    ├── Icon (90x90px container)
    └── Text Content
        ├── Headline (Lato Heavy, uppercase)
        └── Subheading (Open Sans Semibold)
```

### Layout Variations
- **Desktop/Tablet**: Horizontal layout with icon on left
- **Mobile**: Vertical stacked layout with centered content

## Design Token Mapping

### Container Properties

#### Background & Border
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Background | `--bg-brand` | `#1B1464` | Navy brand color |
| Border Bottom | `--color-accent-500` | `#D4AF37` | Gold accent |
| Border Width | `--space-1` | `4px` | Bottom only |
| Border Style | — | `solid` | Consistent edge |
| Border Radius | — | `0` | Sharp corners |

#### Spacing & Padding
| Property | Token | Value | Application |
|----------|-------|-------|-------------|
| Container Padding X | `--space-4` | `16px` | Horizontal padding |
| Container Padding Y | `--space-3` | `12px` | Vertical padding |
| Content Gap (Desktop) | `--space-3` | `12px` | Between icon and text |
| Content Gap (Mobile) | `--space-1` | `4px` | Tighter mobile spacing |
| Text Stack Gap | `--space-0` | `0px` | Between headline and subheading |

### Typography Mapping

#### Desktop/DesktopPlus Headline
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Font Family | `--font-primary` | `Lato` | UI/Headlines font |
| Font Size | `--text-h2-size` | `36px` | H2 heading size |
| Line Height | Custom | `54px` | 1.5x ratio |
| Font Weight | `--font-weight-black` | `900` (Heavy) | Maximum impact |
| Text Transform | — | `uppercase` | Consistent style |
| Color | `--text-reverse` | `#FFFFFF` | White on navy |

#### Mobile Headline
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Font Family | `--font-primary` | `Lato` | UI/Headlines font |
| Font Size | `--text-h3-size` | `24px` | H3 heading size |
| Line Height | `--text-h2-size` | `36px` | Generous spacing |
| Font Weight | `--font-weight-black` | `900` (Heavy) | Maximum impact |
| Text Transform | — | `uppercase` | Consistent style |
| Color | `--text-reverse` | `#FFFFFF` | White on navy |

#### Subheading (All Breakpoints)
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Font Family | `--font-secondary` | `Open Sans` | Body font |
| Font Size | `--text-h4-size` | `24px` | Prominent subheading |
| Line Height | `--text-large-height` | `36px` | Comfortable reading |
| Font Weight | `--font-weight-semibold` | `600` | Semi-bold emphasis |
| Color | Custom | `#C7CBCF` | Muted light gray |
| Text Align (Mobile) | — | `center` | Centered on mobile |

### Icon Properties
| Property | Value | Notes |
|----------|-------|-------|
| Container Size | `90px × 90px` | Fixed square container |
| Icon Size | `85px × 68px` | Actual icon dimensions |
| Display | Flex centered | Perfect centering |
| Color | White/Light | Matches text color |

### Color Token Clarification
```css
:root {
  /* Text colors for banner */
  --banner-headline: var(--text-reverse); /* #FFFFFF */
  --banner-subheading: var(--color-neutral-200); /* #C7CBCF - muted */
  
  /* Backgrounds */
  --banner-bg: var(--bg-brand); /* #1B1464 */
  --banner-accent: var(--color-accent-500); /* #D4AF37 */
}
```

## Responsive Behavior

### Breakpoint Layouts

#### DesktopPlus & Desktop (1150px+)
```css
.banner-graphic {
  /* Container */
  background: var(--bg-brand);
  border-bottom: 4px solid var(--color-accent-500);
  padding: var(--space-3) var(--space-4);
  
  /* Layout */
  display: flex;
  align-items: center;
}

.banner-content {
  display: flex;
  gap: var(--space-3);
  align-items: flex-start;
  flex: 1;
}

.banner-text {
  flex: 1;
  min-width: 0; /* Allow text truncation */
}
```

#### Tablet (768px - 1149px)
```css
.banner-graphic-tablet {
  /* Same as desktop but may wrap on smaller tablets */
  flex-wrap: wrap;
}
```

#### Mobile (380px - 767px)
```css
.banner-graphic-mobile {
  /* Container */
  padding: var(--space-3) var(--space-4);
  
  /* Layout */
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: var(--space-1);
}

.banner-content-mobile {
  flex-direction: column;
  align-items: center;
  text-align: center;
}

.banner-headline-mobile {
  font-size: var(--text-h3-size); /* 24px */
  line-height: 36px;
}
```

## CSS Implementation

### Complete Component Styles
```css
/* Base Banner Structure */
.banner-graphic {
  /* Visual */
  background: var(--bg-brand);
  border-bottom: var(--space-1) solid var(--color-accent-500);
  
  /* Layout */
  width: 100%;
  position: relative;
  
  /* Spacing */
  padding: var(--space-3) var(--space-4);
}

/* Content Wrapper */
.banner-content {
  display: flex;
  align-items: center;
  gap: var(--space-3);
  width: 100%;
  max-width: var(--container-standard);
  margin: 0 auto;
}

/* Icon Container */
.banner-icon {
  /* Dimensions */
  width: 90px;
  height: 90px;
  flex-shrink: 0;
  
  /* Centering */
  display: flex;
  align-items: center;
  justify-content: center;
}

.banner-icon svg,
.banner-icon img {
  max-width: 85px;
  max-height: 68px;
  width: auto;
  height: auto;
}

/* Text Content */
.banner-text {
  display: flex;
  flex-direction: column;
  gap: 0;
  flex: 1;
  min-width: 0;
}

/* Headline */
.banner-headline {
  /* Typography */
  font-family: var(--font-primary);
  font-size: var(--text-h2-size);
  line-height: 54px;
  font-weight: var(--font-weight-black);
  text-transform: uppercase;
  color: var(--text-reverse);
  
  /* Layout */
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* Subheading */
.banner-subheading {
  /* Typography */
  font-family: var(--font-secondary);
  font-size: var(--text-h4-size);
  line-height: var(--text-large-height);
  font-weight: var(--font-weight-semibold);
  color: var(--color-neutral-200);
  
  /* Layout */
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}

/* Mobile Overrides */
@media (max-width: 767px) {
  .banner-content {
    flex-direction: column;
    align-items: center;
    gap: var(--space-1);
  }
  
  .banner-text {
    align-items: center;
    text-align: center;
  }
  
  .banner-headline {
    font-size: var(--text-h3-size);
    line-height: 36px;
    white-space: normal;
  }
  
  .banner-subheading {
    text-align: center;
  }
}
```

## Interactive States

### Hover Effects (Optional)
```css
/* Subtle interaction for clickable banners */
.banner-graphic.clickable {
  cursor: pointer;
  transition: all var(--transition-base);
}

.banner-graphic.clickable:hover {
  border-bottom-width: 6px;
  padding-bottom: calc(var(--space-3) - 2px); /* Compensate for border */
}

.banner-graphic.clickable:hover .banner-headline {
  color: var(--color-accent-400);
}
```

### Focus States
```css
.banner-graphic:focus-visible {
  outline: var(--focus-outline);
  outline-offset: -2px; /* Inside due to border */
}
```

## Accessibility Implementation

### Semantic HTML Structure
```html
<div class="banner-graphic" role="banner">
  <div class="banner-content">
    <div class="banner-icon" role="img" aria-label="Banner icon">
      <img src="icon.svg" alt="Section icon" />
    </div>
    <div class="banner-text">
      <h2 class="banner-headline">
        H1 Headline 36 54h
      </h2>
      <p class="banner-subheading">
        Turpis egestas integer eget aliquet nibh praesent tristique
      </p>
    </div>
  </div>
</div>
```

### ARIA Considerations
```html
<!-- For section headers -->
<div role="banner" aria-label="Section: [Topic]">

<!-- For landmark navigation -->
<header role="banner">

<!-- For decorative icons -->
<div role="img" aria-hidden="true">
```

## Icon System Integration

### SVG Color Adaptation
```css
/* White icons on navy background */
.banner-icon svg {
  fill: var(--text-reverse);
}

.banner-icon svg path {
  fill: currentColor;
}

/* For multi-color icons */
.banner-icon svg .primary-color {
  fill: var(--text-reverse);
}

.banner-icon svg .accent-color {
  fill: var(--color-accent-500);
}
```

### Icon Loading Pattern
```javascript
// Dynamic icon loading
const loadBannerIcon = (iconName) => {
  return `/assets/svg/decorative-icons/${iconName}.svg`;
};

// Icon mapping for categories
const iconMap = {
  'email': 'icon-email',
  'content': 'icon-document',
  'webinar': 'icon-video',
  'contact': 'icon-phone'
};
```

## Usage Patterns

### As Section Headers
```html
<!-- Page section divider -->
<section>
  <div class="banner-graphic">
    <!-- Banner content -->
  </div>
  <div class="section-content">
    <!-- Section body -->
  </div>
</section>
```

### As Notification Bars
```html
<!-- Alert or announcement -->
<div class="banner-graphic" role="alert">
  <div class="banner-content">
    <div class="banner-icon">
      <img src="alert-icon.svg" alt="Alert" />
    </div>
    <div class="banner-text">
      <h3 class="banner-headline">Important Notice</h3>
      <p class="banner-subheading">System maintenance scheduled</p>
    </div>
  </div>
</div>
```

### As Navigation Headers
```html
<!-- Category navigation -->
<nav class="banner-graphic" aria-label="Category">
  <div class="banner-content">
    <!-- Icon and text -->
  </div>
</nav>
```

## Implementation Notes

### Container Width Management
```css
/* For full-width banners */
.banner-graphic {
  width: 100%;
}

/* For contained banners */
.banner-graphic.contained {
  max-width: var(--container-standard);
  margin: 0 auto;
}
```

### Text Overflow Handling
```css
/* Single line with ellipsis */
.banner-headline {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

/* Multi-line subheading */
.banner-subheading {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
```

### Performance Optimization
```css
/* Reduce repaints */
.banner-graphic {
  will-change: border-width;
  transform: translateZ(0);
}
```

## Testing Checklist

- [ ] Verify navy background renders correctly
- [ ] Confirm gold bottom border displays properly
- [ ] Test icon sizing and centering
- [ ] Validate headline text truncation on desktop
- [ ] Check subheading line clamping
- [ ] Test responsive layout shift at 768px
- [ ] Verify mobile text centering
- [ ] Test with various icon formats (SVG, PNG)
- [ ] Validate color contrast (WCAG AA)
- [ ] Check keyboard focus indicators
- [ ] Test with long headlines and subheadings
- [ ] Verify consistent height across instances
- [ ] Test hover states if interactive

## Related Components
- `Header/Navigation` - Main site header
- `Card/Resources` - Resource grid cards
- `Section/Hero` - Hero banners
- `Alert/Banner` - System notifications

## Content Guidelines

### Headline Best Practices
- Keep under 50 characters for desktop
- Use action-oriented language
- Maintain consistent capitalization (UPPERCASE)
- Consider mobile truncation

### Subheading Guidelines
- Maximum 100 characters
- Provide context without redundancy
- Use sentence case
- Support but don't repeat headline

### Icon Selection
- Use consistent icon style (outline/filled)
- Ensure adequate contrast on navy
- Size appropriately for 90px container
- Consider meaning and accessibility

## Version History
- **v1.0** (2025-10-25): Initial documentation and variable mapping
- Component IDs: DesktopPlus (10863:1071), Mobile (10863:1089)
- Design System Version: `variables-v3.0-20251023.css`
