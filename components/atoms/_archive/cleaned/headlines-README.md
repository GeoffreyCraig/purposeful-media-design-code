# Headline Component

## Overview
Complete typography system for H1-H6 headlines with 48 total variants (6 sizes × 4 colors × 2 text cases).

## Component Structure

### Files
- `headlines.html` - All 48 headline variants with proper semantic HTML
- `headlines.css` - Complete styles with responsive breakpoints  
- `headlines.config.js` - JavaScript configuration for dynamic implementations

### Variants

#### Sizes
- **H1**: 36px/54px line-height
- **H2**: 30px/45px line-height
- **H3**: 24px/36px line-height
- **H4**: 21px/30px line-height  
- **H5**: 18px/27px line-height
- **H6**: 16px/24px line-height

#### Colors
- **Default**: #1B1464 (Brand Navy)
- **Reverse**: #FFFFFF (White for dark backgrounds)
- **Dark**: #51585E (Charcoal Gray)
- **Gray**: #C7CBCF (Light Gray)

#### Text Cases
- **Default**: Normal case
- **Uppercase**: All caps

## Usage

### Basic Implementation
```html
<h1 class="headline h1 default">Main Page Title</h1>
<h2 class="headline h2 dark uppercase">SECTION HEADER</h2>
<h3 class="headline h3 reverse">White Heading on Dark Background</h3>
```

### Class Structure
```
.headline.[size].[color].[case]
```

Example:
```html
<h1 class="headline h1 default uppercase">UPPERCASE HEADING</h1>
```

### Responsive Behavior
Headlines automatically scale based on viewport:
- **Mobile** (380-767px): Reduced sizes for small screens
- **Tablet** (768-1149px): Intermediate sizes
- **Desktop** (1150-1919px): Default sizes
- **DesktopPlus** (1920px+): Larger sizes for wide screens

## Implementation Notes

### Export Issues Resolved
The original AutoHTML export only captured the first H1 variant. This complete implementation includes all 48 variants properly structured.

### Font Loading
Ensure Lato font is loaded:
```html
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;800&display=swap" rel="stylesheet">
```

### Accessibility
- Use semantic HTML tags (h1-h6) for proper document structure
- Maintain heading hierarchy for screen readers
- Color contrast ratios meet WCAG AA standards

## Integration with HubSpot
These components are ready for HubSpot CMS modules. The CSS can be added to the global stylesheet or individual module CSS.

## Figma Reference
Node ID: 1425:1182
Design file: v2-Purposeful-Media-Design-System
