# Card/Resources Component Variable Mapping Documentation

## Component Overview
The Resources card is a visually prominent component designed for the Resources page grid layout. It features a distinctive gold border, centered content layout with icon, title, description, and CTA button. The card displays a background thumbnail image with an overlay to ensure text readability, using reverse (white) text for strong visual hierarchy in resource promotion.

## Component Structure

### Anatomy
```
Card/Resources
├── Container (Gold border frame)
└── Inner Content (Centered layout)
    ├── Header Section
    │   ├── Icon (90x90px)
    │   └── Title (Lato Heavy, uppercase)
    ├── Description (Open Sans Regular)
    └── CTA Button (Gold background)
```

## Design Token Mapping

### Container Properties

#### Border & Shape
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Border Color | `--color-accent-500` | `#D4AF37` | Signature gold accent |
| Border Width | `--space-1` | `4px` | Prominent frame |
| Border Style | — | `solid` | Consistent edge |
| Border Radius | `--space-4` | `16px` | Rounded corners |
| Background | Context-dependent | Transparent/Dark | Inherits from parent |

#### Background Image Implementation
| Property | Token/Value | Notes |
|----------|------------|-------|
| Image Position | `center center` | Centered focal point |
| Image Size | `cover` | Fills entire card |
| Image Repeat | `no-repeat` | Single image |
| Overlay Type | Gradient or solid | Ensures text readability |
| Overlay Color | `rgba(27, 20, 100, 0.85)` | Navy with 85% opacity |
| Overlay Gradient | `linear-gradient(180deg, rgba(27,20,100,0.7) 0%, rgba(27,20,100,0.95) 100%)` | Top to bottom darkening |

#### Spacing & Layout
| Property | Token | Value | Application |
|----------|-------|-------|-------------|
| Container Padding X | `--space-3` | `12px` | Horizontal internal spacing |
| Container Padding Top | `--space-3` | `12px` | Top spacing |
| Container Padding Bottom | `--space-12` | `48px` | Extra bottom spacing |
| Content Gap | `--space-8` | `32px` | Between major sections |
| Header Gap | `--space-3` | `12px` | Between icon and title |
| Width (Fixed) | — | `310px` | Total including border |
| Content Width | — | `286px` | Internal content area |

### Typography Mapping

#### Title Typography
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Font Family | `--font-primary` | `Lato` | UI/Headlines font |
| Font Size | `--text-lead-size` | `21px` | Prominent heading |
| Line Height | Custom | `30.5px` | Optimal spacing |
| Font Weight | `--font-weight-black` | `900` (Heavy) | Maximum impact |
| Text Transform | — | `uppercase` | Consistent heading style |
| Color | `--text-reverse` | `#FFFFFF` | White on dark |

#### Description Typography
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Font Family | `--font-secondary` | `Open Sans` | Body text font |
| Font Size | `--text-default-size` | `18px` | Standard body |
| Line Height | `--text-default-height` | `27px` | Comfortable reading |
| Font Weight | `--font-weight-regular` | `400` | Regular weight |
| Text Align | — | `center` | Centered layout |
| Color | `--text-reverse` | `#FFFFFF` | White on dark |

#### Button Typography
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Font Family | `--font-primary` | `Lato` | Button consistency |
| Font Size | `--label-cta-size` | `18px` | CTA prominence |
| Line Height | Custom | `18px` | Compact button |
| Font Weight | `--font-weight-bold` | `700` | Strong CTA |
| Text Transform | — | `uppercase` | Button convention |
| Color | `--text-heading` | `#1B1464` | Navy on gold |

### Icon Properties
| Property | Value | Notes |
|----------|-------|-------|
| Size | `90px × 90px` | Fixed dimensions |
| Display | Square container | 1:1 aspect ratio |
| Color | Contextual | Matches theme |
| Alignment | Left of title | Horizontal layout |

### Button Component
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Background | `--color-accent-500` | `#D4AF37` | Gold CTA |
| Height | — | `42px` | Compact height |
| Padding X | — | `64px` | Generous horizontal |
| Padding Y | `--space-3` | `12px` | Vertical padding |
| Border Radius | `--radius-small` | `4px` | Subtle rounding |
| Text Color | `--text-heading` | `#1B1464` | Navy on gold |

## Component Dimensions

### Fixed Sizing
```css
.card-resources {
  width: 310px; /* Including 4px border on each side */
  /* Height: Auto based on content */
}

.card-resources-content {
  width: 286px; /* Internal content width */
}

.card-resources-header {
  width: 286px;
  height: 90px;
}

.card-resources-icon {
  width: 90px;
  height: 90px;
}

.card-resources-button {
  height: 42px;
  min-width: fit-content;
}
```

## CSS Implementation

### Base Structure
```css
.card-resources {
  /* Container */
  position: relative;
  width: 310px;
  border: var(--space-1) solid var(--color-accent-500);
  border-radius: var(--space-4);
  overflow: hidden;
  
  /* Background Image */
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}

/* Overlay for text readability */
.card-resources::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(
    180deg, 
    rgba(27, 20, 100, 0.7) 0%, 
    rgba(27, 20, 100, 0.95) 100%
  );
  z-index: 1;
}

/* Alternative solid overlay option */
.card-resources.solid-overlay::before {
  background: rgba(27, 20, 100, 0.85); /* Navy with 85% opacity */
}

.card-resources-inner {
  /* Layout */
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: var(--space-8);
  
  /* Spacing */
  padding: var(--space-3) var(--space-3) var(--space-12);
  
  /* Ensure content above overlay */
  position: relative;
  z-index: 2;
  
  /* Ensure full height */
  min-height: 100%;
}

.card-resources-header {
  /* Layout */
  display: flex;
  align-items: center;
  gap: var(--space-3);
  
  /* Dimensions */
  width: 286px;
  height: 90px;
}

.card-resources-icon {
  /* Dimensions */
  width: 90px;
  height: 90px;
  flex-shrink: 0;
  
  /* Center icon content */
  display: flex;
  align-items: center;
  justify-content: center;
}

.card-resources-title {
  /* Typography */
  font-family: var(--font-primary);
  font-size: var(--text-lead-size);
  line-height: 30.5px;
  font-weight: var(--font-weight-black);
  text-transform: uppercase;
  color: var(--text-reverse);
  
  /* Layout */
  flex: 1;
  min-width: 0; /* Allow text truncation */
}

.card-resources-description {
  /* Typography */
  font-family: var(--font-secondary);
  font-size: var(--text-default-size);
  line-height: var(--text-default-height);
  font-weight: var(--font-weight-regular);
  text-align: center;
  color: var(--text-reverse);
  
  /* Dimensions */
  width: 286px;
}

.card-resources-button {
  /* Visual */
  background: var(--color-accent-500);
  border-radius: var(--radius-small);
  border: none;
  
  /* Dimensions */
  height: 42px;
  padding: var(--space-3) 64px;
  
  /* Typography */
  font-family: var(--font-primary);
  font-size: var(--label-cta-size);
  line-height: 18px;
  font-weight: var(--font-weight-bold);
  text-transform: uppercase;
  color: var(--text-heading);
  text-align: center;
  white-space: nowrap;
  
  /* Interaction */
  cursor: pointer;
  transition: all var(--transition-base);
}
```

## Interactive States

### Hover Behaviors
```css
.card-resources:hover {
  /* Subtle border enhancement */
  border-color: var(--color-accent-400);
  box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
  transition: all var(--transition-base);
}

.card-resources-button:hover {
  background: var(--color-accent-400);
  transform: translateY(-1px);
  box-shadow: var(--shadow-subtle);
}

.card-resources-button:active {
  background: var(--color-accent-600);
  transform: translateY(0);
  box-shadow: none;
}
```

### Focus States
```css
.card-resources:focus-within {
  outline: var(--focus-outline);
  outline-offset: var(--focus-outline-offset);
}

.card-resources-button:focus-visible {
  outline: 2px solid var(--color-primary-700);
  outline-offset: 2px;
}
```

## Grid Layout Context

### Parent Grid Container
```css
.resources-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(310px, 1fr));
  gap: var(--space-6); /* 24px */
  justify-content: center;
  padding: var(--space-8);
}

/* Responsive adjustments */
@media (max-width: 767px) {
  .resources-grid {
    grid-template-columns: 1fr;
    padding: var(--space-4);
  }
}
```

## Accessibility Implementation

### Semantic Structure
```html
<article 
  class="card-resources" 
  role="article"
  style="background-image: url('path/to/thumbnail.jpg');"
>
  <div class="card-resources-inner">
    <header class="card-resources-header">
      <div class="card-resources-icon" role="img" aria-label="Resource icon">
        <img src="icon.svg" alt="Resource type icon" />
      </div>
      <h3 class="card-resources-title">
        Lorem Ipsum Dolor Sit Amet
      </h3>
    </header>
    
    <p class="card-resources-description">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit...
    </p>
    
    <a href="#" class="card-resources-button" role="button">
      Button Text
    </a>
  </div>
</article>
```

### Dynamic Background Image Implementation
```javascript
// For dynamically loaded images
const resourceCard = document.querySelector('.card-resources');
resourceCard.style.backgroundImage = `url('${thumbnailUrl}')`;

// For lazy loading
const lazyLoadBackground = (element, imageUrl) => {
  const img = new Image();
  img.onload = () => {
    element.style.backgroundImage = `url('${imageUrl}')`;
    element.classList.add('loaded');
  };
  img.src = imageUrl;
};
```

### ARIA Labels
```html
<!-- For icon-only content -->
<div role="img" aria-label="Description of icon">

<!-- For CTAs -->
<a role="button" aria-label="Download resource: [Title]">

<!-- For card container -->
<article aria-labelledby="resource-title-1">
```

## Background Image Handling

### Image Requirements
```css
/* Recommended image specifications */
.card-resources {
  /* Minimum image dimensions: 310px × 400px */
  /* Recommended: 620px × 800px for retina displays */
  /* Aspect ratio: ~3:4 for optimal coverage */
}
```

### Loading States
```css
/* Loading state while image loads */
.card-resources:not(.loaded) {
  background-color: var(--color-primary-700);
}

/* Fade in effect when loaded */
.card-resources {
  transition: opacity var(--transition-slow);
  opacity: 0.7;
}

.card-resources.loaded {
  opacity: 1;
}
```

### Fallback Patterns
```css
/* Fallback gradient if image fails */
.card-resources.no-image {
  background: linear-gradient(
    135deg,
    var(--color-primary-700) 0%,
    var(--color-primary-900) 100%
  );
}

/* Pattern overlay for additional texture */
.card-resources.with-pattern::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: url('../assets/patterns/dots.svg');
  background-size: 10px 10px;
  opacity: 0.1;
  z-index: 1;
}
```

### Accessibility Considerations
```html
<!-- Include image context in aria-label -->
<article 
  class="card-resources" 
  role="article"
  aria-label="Resource: [Title] with [image description]"
  style="background-image: url('thumbnail.jpg');"
>
```

## Icon System Integration

### SVG Icon Implementation
```css
.card-resources-icon svg {
  width: 100%;
  height: 100%;
  max-width: 85px; /* ~94% of container */
  max-height: 60px; /* Maintain aspect ratio */
}

.card-resources-icon img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}
```

### Icon Color Adaptation
```css
/* For inline SVG icons */
.card-resources-icon svg path {
  fill: currentColor;
}

.dark-theme .card-resources-icon {
  color: var(--text-reverse); /* White icons */
}

.light-theme .card-resources-icon {
  color: var(--text-heading); /* Navy icons */
}
```

## Implementation Notes

### Fixed Width Consideration
The 310px fixed width requires careful responsive planning:
- Use CSS Grid with `minmax(310px, 1fr)`
- On mobile (<380px), consider scaling or horizontal scroll
- Ensure parent containers accommodate fixed width

### Content Overflow Handling
```css
.card-resources-title {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}

.card-resources-description {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
}
```

### Border Rendering
```css
/* Ensure crisp border rendering */
.card-resources {
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  transform: translateZ(0);
}
```

## Testing Checklist

- [ ] Verify gold border renders consistently
- [ ] Test text readability on dark backgrounds
- [ ] Confirm icon sizing and alignment
- [ ] Validate button hover and active states
- [ ] Check fixed width behavior in grid layouts
- [ ] Test content overflow with long titles/descriptions
- [ ] Verify border radius clips content properly
- [ ] Test focus states for keyboard navigation
- [ ] Validate color contrast ratios (WCAG AA)
- [ ] Check responsive behavior below 380px
- [ ] Test with different icon types/formats
- [ ] Verify consistent card heights in grid
- [ ] **Test background image loading and display**
- [ ] **Verify overlay ensures text readability**
- [ ] **Test image lazy loading performance**
- [ ] **Validate fallback for missing images**
- [ ] **Check various image aspect ratios**
- [ ] **Test gradient overlay on light/dark images**
- [ ] **Verify retina display image quality**

## Related Components
- `Card/BlogPost` - Article teaser cards
- `Card/FAQ` - Expandable Q&A cards
- `Card/Teaser` - Simple content cards
- `Button/CTA` - Call-to-action buttons

## Usage Guidelines

### Content Requirements
- **Thumbnail**: 620×800px recommended (2:1 ratio for retina), JPG/WebP
- **Icon**: 90x90px, preferably SVG for scalability
- **Title**: Maximum ~60 characters for two lines
- **Description**: Maximum ~150 characters
- **Button Text**: Short, action-oriented (2-3 words)

### Grid Placement
- Minimum 3 cards per row on desktop
- 2 cards per row on tablet
- 1 card per row on mobile
- Maintain consistent spacing between cards

### Visual Hierarchy
1. Gold border draws initial attention
2. Icon provides visual category identification  
3. Title communicates resource type
4. Description provides context
5. CTA button drives action

## Version History
- **v1.0** (2025-10-25): Initial documentation and variable mapping
- Component ID: `5035:16095` (Figma reference)
- Design System Version: `variables-v3.0-20251023.css`
