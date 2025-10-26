# Design Tokens Reference

## Overview

Design tokens are the foundational elements of the Purposeful Media design system. They provide a consistent way to define and use design values across all components and templates.

## Color Tokens

### Brand Colors
```css
/* Primary Brand Colors */
--brand: #1B1464;           /* Primary brand navy blue */
--accent: #D4AF37;          /* Gold accent color */
--heading: #1B1464;         /* Heading color (same as brand) */
--reverse: #FFFFFF;         /* White for reversed contexts */
--default: #D4AF37;         /* Default accent color */
```

### Text Colors
```css
/* Text Color System */
--text-primary: #1B1464;    /* Primary text color */
--text-secondary: #54595F;  /* Secondary text color */
--text-reverse: #FFFFFF;    /* White text for dark backgrounds */
--text-muted: #888888;      /* Muted text color */
```

### Semantic Colors
```css
/* Interactive States */
--success: #00FF00;         /* Success states */
--error: #FF0000;           /* Error states */
--warning: #FFA500;         /* Warning states */
--info: #0066CC;            /* Information states */

/* Background Colors */
--bg-primary: #FFFFFF;      /* Primary background */
--bg-secondary: #F8F9FA;    /* Secondary background */
--bg-tertiary: #E5E5E5;     /* Tertiary background */
```

### Gradients
```css
/* Brand Gradients */
--gradient-brand: linear-gradient(135deg, var(--brand) 0%, var(--accent) 100%);
--gradient-accent: linear-gradient(135deg, var(--accent) 0%, var(--brand) 100%);
--gradient-subtle: linear-gradient(135deg, rgba(27, 20, 100, 0.1) 0%, rgba(212, 175, 55, 0.1) 100%);
```

## Spacing Tokens

### Base Spacing System (8px Grid)
```css
/* Core Spacing Units */
--space-0: 0px;             /* No spacing */
--space-1: 4px;             /* 0.5x base (extra small) */
--space-2: 8px;             /* 1x base (small) */
--space-3: 12px;            /* 1.5x base (small-medium) */
--space-4: 16px;            /* 2x base (medium) */
--space-5: 20px;            /* 2.5x base (medium-large) */
--space-6: 24px;            /* 3x base (large) */
--space-8: 32px;            /* 4x base (extra large) */
--space-10: 40px;           /* 5x base (2x extra large) */
--space-12: 48px;           /* 6x base (3x extra large) */
--space-16: 64px;           /* 8x base (4x extra large) */
--space-20: 80px;           /* 10x base (5x extra large) */
--space-24: 96px;           /* 12x base (6x extra large) */
```

### Semantic Spacing
```css
/* Container Spacing */
--container-desktop-padding: 40px;  /* Desktop container padding */
--container-mobile-padding: 0px;    /* Mobile container padding */

/* Component Spacing */
--component-gap: 12px;              /* Gap between components */
--section-gap: 32px;                /* Gap between sections */
--form-field-gap: 12px;             /* Gap between form fields */

/* Button Spacing */
--button-padding-x: 16px;           /* Button horizontal padding */
--button-padding-y: 8px;            /* Button vertical padding */

/* Hero Spacing */
--hero-padding-mobile: 0px;         /* Mobile hero padding */
--hero-padding-desktop: 40px;       /* Desktop hero padding */
```

## Typography Tokens

### Font Families
```css
/* Primary Font Stack */
--font-primary: 'Lato', sans-serif;
--font-fallback: system-ui, sans-serif;
```

### Font Weights
```css
/* Font Weight Scale */
--font-weight-regular: 400;         /* Regular weight */
--font-weight-bold: 700;            /* Bold weight */
--font-weight-heavy: 900;           /* Heavy/Black weight */
```

### Font Sizes
```css
/* Desktop Font Sizes */
--text-h1: 36px;                    /* H1 heading size */
--text-h2: 30px;                    /* H2 heading size */
--text-h3: 24px;                    /* H3 heading size */
--text-h4: 20px;                    /* H4 heading size */
--text-body: 18px;                  /* Body text size */
--text-small: 16px;                 /* Small text size */
--text-xs: 14px;                    /* Extra small text size */

/* Mobile Font Sizes */
--text-h1-mobile: 30px;             /* Mobile H1 size */
--text-h2-mobile: 24px;             /* Mobile H2 size */
--text-h3-mobile: 20px;             /* Mobile H3 size */
--text-h4-mobile: 18px;             /* Mobile H4 size */
--text-body-mobile: 16px;           /* Mobile body size */
--text-small-mobile: 14px;          /* Mobile small size */
```

### Line Heights
```css
/* Line Height Scale */
--line-height-tight: 1.2;           /* Tight line height */
--line-height-normal: 1.5;          /* Normal line height */
--line-height-relaxed: 1.75;        /* Relaxed line height */
```

## Border Tokens

### Border Radius
```css
/* Border Radius Scale */
--radius-none: 0px;                 /* No border radius */
--radius-sm: 4px;                   /* Small border radius */
--radius-md: 8px;                   /* Medium border radius */
--radius-lg: 12px;                  /* Large border radius */
--radius-xl: 16px;                  /* Extra large border radius */
--radius-full: 9999px;              /* Fully rounded */
```

### Border Widths
```css
/* Border Width Scale */
--border-width-none: 0px;           /* No border */
--border-width-thin: 1px;           /* Thin border */
--border-width-medium: 2px;         /* Medium border */
--border-width-thick: 4px;          /* Thick border */
```

### Border Colors
```css
/* Border Color System */
--border-default: 1px solid #E5E5E5;        /* Default border */
--border-accent: 4px solid var(--accent);   /* Accent border */
--border-brand: 1px solid var(--brand);     /* Brand border */
--border-error: 2px solid var(--error);     /* Error border */
--border-success: 2px solid var(--success); /* Success border */
```

## Shadow Tokens

### Shadow Scale
```css
/* Shadow System */
--shadow-none: none;                /* No shadow */
--shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);    /* Small shadow */
--shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);    /* Medium shadow */
--shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);  /* Large shadow */
--shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.1);  /* Extra large shadow */
--shadow-inner: inset 0 2px 4px rgba(0, 0, 0, 0.1); /* Inner shadow */
```

## Breakpoint Tokens

### Responsive Breakpoints
```css
/* Breakpoint System */
--breakpoint-mobile: 320px;         /* Mobile breakpoint */
--breakpoint-tablet: 768px;         /* Tablet breakpoint */
--breakpoint-desktop: 1024px;       /* Desktop breakpoint */
--breakpoint-desktop-plus: 1920px;  /* Large desktop breakpoint */

/* Media Query Helpers */
--mobile-up: (min-width: 768px);    /* Mobile and up */
--tablet-up: (min-width: 1024px);   /* Tablet and up */
--desktop-up: (min-width: 1920px);  /* Desktop and up */
```

## Animation Tokens

### Transition Durations
```css
/* Animation Timing */
--duration-instant: 0ms;            /* Instant transition */
--duration-fast: 150ms;             /* Fast transition */
--duration-normal: 300ms;           /* Normal transition */
--duration-slow: 500ms;             /* Slow transition */
```

### Transition Easing
```css
/* Easing Functions */
--ease-linear: linear;              /* Linear easing */
--ease-in: ease-in;                 /* Ease in */
--ease-out: ease-out;               /* Ease out */
--ease-in-out: ease-in-out;         /* Ease in out */
--ease-bounce: cubic-bezier(0.68, -0.55, 0.265, 1.55); /* Bounce easing */
```

## Z-Index Tokens

### Layer System
```css
/* Z-Index Scale */
--z-index-base: 0;                  /* Base layer */
--z-index-dropdown: 1000;           /* Dropdown layer */
--z-index-sticky: 1020;             /* Sticky layer */
--z-index-fixed: 1030;              /* Fixed layer */
--z-index-modal-backdrop: 1040;     /* Modal backdrop */
--z-index-modal: 1050;              /* Modal layer */
--z-index-popover: 1060;            /* Popover layer */
--z-index-tooltip: 1070;            /* Tooltip layer */
--z-index-toast: 1080;              /* Toast layer */
```

## Component-Specific Tokens

### Button Tokens
```css
/* Button Specific */
--button-height-small: 32px;        /* Small button height */
--button-height-medium: 40px;       /* Medium button height */
--button-height-large: 48px;        /* Large button height */
--button-border-radius: var(--radius-sm); /* Button border radius */
```

### Card Tokens
```css
/* Card Specific */
--card-padding: var(--space-4);     /* Card padding */
--card-border-radius: var(--radius-md); /* Card border radius */
--card-shadow: var(--shadow-sm);    /* Card shadow */
--card-shadow-hover: var(--shadow-md); /* Card hover shadow */
```

### Form Tokens
```css
/* Form Specific */
--input-height: 40px;               /* Input field height */
--input-padding-x: var(--space-3);  /* Input horizontal padding */
--input-padding-y: var(--space-2);  /* Input vertical padding */
--input-border-radius: var(--radius-sm); /* Input border radius */
--input-border: var(--border-default); /* Input border */
--input-border-focus: 2px solid var(--brand); /* Input focus border */
```

## Usage Examples

### CSS Custom Properties
```css
/* Using design tokens in CSS */
.button {
    background-color: var(--brand);
    color: var(--text-reverse);
    padding: var(--space-3) var(--space-4);
    border-radius: var(--radius-sm);
    font-size: var(--text-body);
    font-weight: var(--font-weight-bold);
    transition: all var(--duration-normal) var(--ease-out);
}

.button:hover {
    background-color: var(--accent);
    box-shadow: var(--shadow-md);
}
```

### JavaScript Integration
```javascript
// Using design tokens in JavaScript
const root = document.documentElement;

// Get a design token value
const brandColor = getComputedStyle(root).getPropertyValue('--brand');

// Set a design token value dynamically
root.style.setProperty('--brand', '#FF0000');

// Create a CSS custom property
root.style.setProperty('--custom-spacing', '20px');
```

### Sass/SCSS Integration
```scss
// Using design tokens in Sass
.button {
    background-color: var(--brand);
    color: var(--text-reverse);
    padding: var(--space-3) var(--space-4);
    border-radius: var(--radius-sm);
    
    // Sass functions with design tokens
    @media (max-width: #{var(--breakpoint-mobile)}) {
        padding: var(--space-2) var(--space-3);
    }
}
```

## Token Organization

### File Structure
```
styles/tokens/
├── unified-design-tokens.css    # Main tokens file
├── color-tokens.css            # Color-specific tokens
├── spacing-tokens.css          # Spacing-specific tokens
├── typography-tokens.css       # Typography-specific tokens
└── component-tokens.css        # Component-specific tokens
```

### Naming Conventions
- **Colors**: `--color-{category}-{variant}` (e.g., `--color-brand-primary`)
- **Spacing**: `--space-{size}` (e.g., `--space-4`)
- **Typography**: `--text-{element}` (e.g., `--text-h1`)
- **Components**: `--{component}-{property}` (e.g., `--button-height`)

## Best Practices

### 1. Token Usage
```css
/* ✅ Good - Use design tokens */
.component {
    color: var(--text-primary);
    padding: var(--space-4);
    border-radius: var(--radius-md);
}

/* ❌ Avoid - Hardcoded values */
.component {
    color: #1B1464;
    padding: 16px;
    border-radius: 8px;
}
```

### 2. Token Naming
```css
/* ✅ Good - Descriptive names */
--button-primary-background: var(--brand);
--button-primary-text: var(--text-reverse);

/* ❌ Avoid - Unclear names */
--btn-bg: var(--brand);
--btn-txt: var(--text-reverse);
```

### 3. Token Organization
```css
/* ✅ Good - Logical grouping */
:root {
    /* Brand Colors */
    --brand: #1B1464;
    --accent: #D4AF37;
    
    /* Spacing */
    --space-4: 16px;
    --space-6: 24px;
    
    /* Typography */
    --text-h1: 36px;
    --text-body: 18px;
}
```

## Browser Support

Design tokens use CSS custom properties (CSS variables) which are supported in:
- **Chrome**: 49+
- **Firefox**: 31+
- **Safari**: 9.1+
- **Edge**: 16+

## Migration Guide

### From Hardcoded Values
```css
/* Before - Hardcoded values */
.old-component {
    color: #1B1464;
    padding: 16px;
    border-radius: 8px;
}

/* After - Design tokens */
.new-component {
    color: var(--text-primary);
    padding: var(--space-4);
    border-radius: var(--radius-md);
}
```

### From Sass Variables
```scss
// Before - Sass variables
$brand-color: #1B1464;
$spacing-medium: 16px;

.old-component {
    color: $brand-color;
    padding: $spacing-medium;
}

// After - CSS custom properties
.new-component {
    color: var(--brand);
    padding: var(--space-4);
}
```

---

*Last updated: March 2024*
*Version: 1.0.0*













