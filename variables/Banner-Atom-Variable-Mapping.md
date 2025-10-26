# Banner/Atom Components Variable Mapping Documentation

## Component Overview
The atom-level Banner components are fundamental building blocks for page sections and visual breaks. This set includes three distinct banner types: Spacer (gradient transition), HeadlineBanner (navy with gold accent), and HeadlineReverse (white background). These simple, reusable atoms provide consistent section dividers and headline containers across the website.

## Component Variants

### 1. Banner/Spacer
A gradient transition element that creates smooth visual flow between sections.

### 2. Banner/HeadlineBanner
Navy background banner with gold bottom border containing a single headline.

### 3. Banner/HeadlineReverse
White background banner with navy headline text for light theme contexts.

## Design Token Mapping

### Banner/Spacer Properties

#### Gradient Configuration
| Property | Token/Value | Notes |
|----------|------------|-------|
| Gradient Type | `linear-gradient` | Top to bottom |
| Gradient Angle | `180deg` | Vertical gradient |
| Start Color | `--bg-primary` | `#FFFFFF` (white) |
| End Color | `--bg-brand` | `#1B1464` (navy) |
| Height | Context-dependent | Typically 40-80px |
| Width | `100%` | Full container width |

#### CSS Implementation
```css
.banner-spacer {
  background: linear-gradient(
    180deg,
    var(--bg-primary) 0%,
    var(--bg-brand) 100%
  );
  width: 100%;
  height: 60px; /* Default height */
}

/* Height variations */
.banner-spacer-small {
  height: 40px;
}

.banner-spacer-medium {
  height: 60px;
}

.banner-spacer-large {
  height: 80px;
}
```

### Banner/HeadlineBanner Properties

#### Container Styling
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Background | `--bg-brand` | `#1B1464` | Navy brand color |
| Border Bottom | `--color-accent-500` | `#D4AF37` | Gold accent |
| Border Width | `--space-1` | `4px` | Bottom only |
| Padding X | `--space-4` | `16px` | Horizontal spacing |
| Padding Y | `--space-3` | `12px` | Vertical spacing |

#### Typography - Desktop/DesktopPlus
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Font Family | `--font-primary` | `Lato` | Headlines font |
| Font Size | `--text-h2-size` | `36px` | H1 display size |
| Line Height | Custom | `54px` | 1.5x ratio |
| Font Weight | `--font-weight-black` | `900` (Heavy) | Maximum weight |
| Text Transform | — | `uppercase` | All caps |
| Color | `--text-reverse` | `#FFFFFF` | White text |

#### Typography - Mobile
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Font Size | `--text-h3-size` | `24px` | H3 mobile size |
| Line Height | `--text-h2-size` | `36px` | Generous spacing |
| Other properties | — | Same as desktop | Maintains consistency |

### Banner/HeadlineReverse Properties

#### Container Styling
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Background | `--bg-primary` | `#FFFFFF` | White background |
| Border | — | `none` | No border |
| Padding X | `--space-4` | `16px` | Horizontal spacing |
| Padding Y | `--space-3` | `12px` | Vertical spacing |

#### Typography
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Font Family | `--font-primary` | `Lato` | Headlines font |
| Font Size | `--text-h3-size` | `30px` | H2 size |
| Line Height | Custom | `45px` | 1.5x ratio |
| Font Weight | `--font-weight-black` | `900` (Heavy) | Maximum weight |
| Text Transform | — | `uppercase` | All caps |
| Color | `--text-heading` | `#1B1464` | Navy text |

## Responsive Behavior

### Breakpoint Adjustments

#### Desktop & DesktopPlus (1150px+)
```css
/* HeadlineBanner */
.banner-headline {
  font-size: var(--text-h2-size); /* 36px */
  line-height: 54px;
}

/* HeadlineReverse */
.banner-headline-reverse {
  font-size: 30px; /* H2 size */
  line-height: 45px;
}
```

#### Tablet (768px - 1149px)
```css
/* Generally maintains desktop sizing */
.banner-headline-tablet {
  font-size: var(--text-h2-size);
}
```

#### Mobile (380px - 767px)
```css
/* HeadlineBanner */
.banner-headline-mobile {
  font-size: var(--text-h3-size); /* 24px */
  line-height: 36px;
}

/* HeadlineReverse */
.banner-headline-reverse-mobile {
  font-size: var(--text-h3-size); /* 24px */
  line-height: 36px;
}
```

## Complete CSS Implementation

### Banner/Spacer
```css
/* Gradient spacer */
.banner-spacer {
  width: 100%;
  background: linear-gradient(
    180deg,
    var(--bg-primary) 0%,
    var(--bg-brand) 100%
  );
}

/* Reverse gradient option */
.banner-spacer-reverse {
  background: linear-gradient(
    180deg,
    var(--bg-brand) 0%,
    var(--bg-primary) 100%
  );
}

/* Alternative gradients */
.banner-spacer-accent {
  background: linear-gradient(
    180deg,
    var(--bg-primary) 0%,
    var(--color-accent-500) 100%
  );
}

.banner-spacer-subtle {
  background: linear-gradient(
    180deg,
    var(--color-neutral-50) 0%,
    var(--color-neutral-100) 100%
  );
}
```

### Banner/HeadlineBanner
```css
/* Navy banner with gold accent */
.banner-headline-container {
  width: 100%;
  background: var(--bg-brand);
  border-bottom: var(--space-1) solid var(--color-accent-500);
  padding: var(--space-3) var(--space-4);
  position: relative;
}

.banner-headline {
  font-family: var(--font-primary);
  font-size: var(--text-h2-size);
  line-height: 54px;
  font-weight: var(--font-weight-black);
  text-transform: uppercase;
  color: var(--text-reverse);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin: 0;
}

/* Mobile adjustments */
@media (max-width: 767px) {
  .banner-headline {
    font-size: var(--text-h3-size);
    line-height: 36px;
  }
}
```

### Banner/HeadlineReverse
```css
/* White banner with navy text */
.banner-headline-reverse-container {
  width: 100%;
  background: var(--bg-primary);
  padding: var(--space-3) var(--space-4);
  position: relative;
}

.banner-headline-reverse {
  font-family: var(--font-primary);
  font-size: 30px;
  line-height: 45px;
  font-weight: var(--font-weight-black);
  text-transform: uppercase;
  color: var(--text-heading);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin: 0;
}

/* Mobile adjustments */
@media (max-width: 767px) {
  .banner-headline-reverse {
    font-size: var(--text-h3-size);
    line-height: 36px;
  }
}
```

## Usage Patterns

### Section Transitions
```html
<!-- Between white and navy sections -->
<div class="banner-spacer" style="height: 60px;" aria-hidden="true"></div>

<!-- Custom height spacer -->
<div class="banner-spacer banner-spacer-large"></div>
```

### Section Headers
```html
<!-- Navy section header -->
<header class="banner-headline-container">
  <h2 class="banner-headline">Our Services</h2>
</header>

<!-- White section header -->
<header class="banner-headline-reverse-container">
  <h2 class="banner-headline-reverse">Case Studies</h2>
</header>
```

### Page Dividers
```html
<!-- Visual page break -->
<div class="page-section">
  <!-- Content -->
</div>
<div class="banner-spacer" style="height: 80px;"></div>
<div class="page-section">
  <!-- Next content -->
</div>
```

## Accessibility Implementation

### Semantic HTML
```html
<!-- For decorative spacers -->
<div class="banner-spacer" role="presentation" aria-hidden="true"></div>

<!-- For headline banners -->
<header class="banner-headline-container" role="banner">
  <h1 class="banner-headline">Page Title</h1>
</header>

<!-- For section headers -->
<div class="banner-headline-container" role="heading" aria-level="2">
  <h2 class="banner-headline">Section Title</h2>
</div>
```

### Focus Management
```css
/* Skip decorative spacers in tab order */
.banner-spacer {
  pointer-events: none;
}

/* Focus styles for interactive banners */
.banner-headline-container:focus-within {
  outline: var(--focus-outline);
  outline-offset: -2px;
}
```

## Compositional Patterns

### Combining with Other Components
```html
<!-- Banner + Content pattern -->
<div class="section-wrapper">
  <header class="banner-headline-container">
    <h2 class="banner-headline">Featured Resources</h2>
  </header>
  <div class="resources-grid">
    <!-- Resource cards -->
  </div>
</div>

<!-- Spacer transition pattern -->
<section class="white-section">
  <!-- Content -->
</section>
<div class="banner-spacer"></div>
<section class="navy-section">
  <!-- Content -->
</section>
```

### Stacking Banners
```html
<!-- Double banner for emphasis -->
<div class="banner-headline-container">
  <h1 class="banner-headline">Main Section</h1>
</div>
<div class="banner-headline-reverse-container">
  <h2 class="banner-headline-reverse">Subsection</h2>
</div>
```

## Animation Options

### Gradient Animation
```css
/* Animated gradient spacer */
@keyframes gradientShift {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

.banner-spacer-animated {
  background: linear-gradient(
    270deg,
    var(--bg-primary),
    var(--bg-brand),
    var(--bg-primary)
  );
  background-size: 200% 200%;
  animation: gradientShift 3s ease infinite;
}
```

### Parallax Effects
```css
/* Parallax spacer */
.banner-spacer-parallax {
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
```

## Performance Considerations

### Optimization Tips
```css
/* Use transform for better performance */
.banner-spacer {
  will-change: transform;
  transform: translateZ(0);
}

/* Avoid expensive gradients on mobile */
@media (max-width: 767px) {
  .banner-spacer-complex {
    background: var(--bg-brand); /* Solid fallback */
  }
}
```

## Testing Checklist

- [ ] Verify gradient renders smoothly
- [ ] Test navy background consistency
- [ ] Confirm gold border displays correctly
- [ ] Check text truncation with long headlines
- [ ] Validate responsive font size changes
- [ ] Test spacing consistency across breakpoints
- [ ] Verify color contrast ratios (WCAG AA)
- [ ] Check gradient performance on mobile
- [ ] Test with various content lengths
- [ ] Validate semantic HTML structure
- [ ] Confirm proper ARIA attributes
- [ ] Test keyboard navigation where applicable

## Related Components
- `Card/BannerGraphic` - Complex banner with icon
- `Section/Hero` - Full hero sections
- `Navigation/Header` - Main site header
- `Footer/Attribution` - Footer banners

## Content Guidelines

### Headline Character Limits
- **Desktop**: ~60 characters before truncation
- **Mobile**: ~30 characters before truncation
- Use concise, impactful language
- Maintain consistent capitalization

### Spacer Usage
- Use 40px for subtle transitions
- Use 60px for standard breaks
- Use 80px for major section changes
- Consider visual weight of surrounding content

### Color Combinations
- Navy banner → White content
- White banner → Any content
- Gradient spacer → Between contrasting sections

## Version History
- **v1.0** (2025-10-25): Initial documentation and variable mapping
- Component IDs: Spacer (5381:7165), HeadlineBanner (9259:24771), HeadlineReverse (9318:31228)
- Design System Version: `variables-v3.0-20251023.css`

## Notes
These atom-level components serve as the smallest building blocks in the design system hierarchy. They should be composed into larger molecules and organisms rather than used in isolation for complex layouts.
