# Purposeful Media Design System Documentation

Welcome to the Purposeful Media Design System documentation. This comprehensive guide will help you understand and implement our design system components effectively.

## 📋 Table of Contents

- [Getting Started](#getting-started)
- [Design Tokens](#design-tokens)
- [Component Architecture](#component-architecture)
- [Atomic Components](#atomic-components)
- [Molecular Components](#molecular-components)
- [Organism Components](#organism-components)
- [Page Templates](#page-templates)
- [Best Practices](#best-practices)
- [Accessibility Guidelines](#accessibility-guidelines)
- [Browser Support](#browser-support)

## 🚀 Getting Started

### Quick Start

1. **Include the Design System CSS**:
   ```html
   <link rel="stylesheet" href="styles/tokens/unified-design-tokens.css">
   <link rel="stylesheet" href="styles/utilities/utility-classes.css">
   ```

2. **Include Component CSS** (as needed):
   ```html
   <link rel="stylesheet" href="components/atoms/cleaned/button-component.css">
   <link rel="stylesheet" href="components/molecules/cleaned/card-component.css">
   <!-- Add other components as needed -->
   ```

3. **Use Semantic HTML with Design System Classes**:
   ```html
   <button class="btn btn--primary btn--large">Get Started</button>
   ```

### File Structure

```
PurposefulMedia-Code/
├── components/
│   ├── atoms/cleaned/          # Atomic components (buttons, inputs)
│   ├── molecules/cleaned/      # Molecular components (cards, forms)
│   ├── organisms/cleaned/      # Organism components (heroes, footers)
│   └── templates/cleaned/      # Page templates (homepage, blog)
├── styles/
│   ├── tokens/                 # Design tokens (colors, spacing, typography)
│   └── utilities/              # Utility classes (margins, padding, flexbox)
└── docs/                       # Documentation files
```

## 🎨 Design Tokens

Our design system is built on a foundation of design tokens that ensure consistency across all components.

### Color Tokens

```css
/* Brand Colors */
--brand: #1B1464;           /* Primary brand navy blue */
--accent: #D4AF37;          /* Gold accent color */
--text-primary: #1B1464;    /* Primary text color */
--text-secondary: #54595F;  /* Secondary text color */
--text-reverse: #FFFFFF;    /* White text for dark backgrounds */

/* Semantic Colors */
--success: #00FF00;         /* Success states */
--error: #FF0000;           /* Error states */
--warning: #FFA500;         /* Warning states */
--info: #0066CC;            /* Information states */
```

### Spacing Tokens (8px Grid System)

```css
/* Base Spacing Units */
--space-0: 0px;             /* No spacing */
--space-1: 4px;             /* Extra small */
--space-2: 8px;             /* Small */
--space-3: 12px;            /* Small-medium */
--space-4: 16px;            /* Medium */
--space-5: 20px;            /* Medium-large */
--space-6: 24px;            /* Large */
--space-8: 32px;            /* Extra large */
--space-10: 40px;           /* 2x extra large */
--space-12: 48px;           /* 3x extra large */
--space-16: 64px;           /* 4x extra large */
--space-20: 80px;           /* 5x extra large */
--space-24: 96px;           /* 6x extra large */

/* Semantic Spacing */
--container-desktop-padding: 40px;
--container-mobile-padding: 0px;
--hero-padding-desktop: 40px;
--hero-padding-mobile: 0px;
```

### Typography Tokens

```css
/* Font Families */
--font-primary: 'Lato', sans-serif;
--font-fallback: system-ui, sans-serif;

/* Font Weights */
--font-weight-regular: 400;
--font-weight-bold: 700;
--font-weight-heavy: 900;

/* Font Sizes */
--text-h1: 36px;            /* Desktop: 36px, Mobile: 30px */
--text-h2: 30px;            /* Desktop: 30px, Mobile: 24px */
--text-h3: 24px;            /* Desktop: 24px, Mobile: 20px */
--text-body: 18px;          /* Desktop: 18px, Mobile: 16px */
--text-small: 16px;         /* Desktop: 16px, Mobile: 14px */
```

## 🏗️ Component Architecture

Our design system follows the **Atomic Design** methodology:

### Atomic Components
Basic building blocks that cannot be broken down further:
- **Buttons**: Primary, secondary, outline, ghost variants
- **Inputs**: Text, email, textarea with validation states
- **Labels**: Form labels and text labels

### Molecular Components
Combinations of atomic components:
- **Cards**: Blog, resource, stats, quote, teaser variants
- **Forms**: Contact, newsletter, resource, inline variants
- **Navigation**: Menu items and navigation components

### Organism Components
Complex UI components made of molecules:
- **Heroes**: Simple, image, video variants with different layouts
- **Footers**: Main footer with links and contact information
- **Headers**: Navigation headers with branding

### Page Templates
Complete page layouts:
- **Homepage**: Landing page with hero, services, testimonials
- **About/Contact**: Company information and contact forms
- **Blog**: Blog listing with sidebar and pagination

## 🔧 Component Usage

### Button Component

```html
<!-- Basic Usage -->
<button class="btn btn--primary btn--medium">Click Me</button>

<!-- All Variants -->
<button class="btn btn--primary">Primary</button>
<button class="btn btn--accent">Accent</button>
<button class="btn btn--outline">Outline</button>
<button class="btn btn--reverse">Reverse</button>
<button class="btn btn--ghost">Ghost</button>

<!-- All Sizes -->
<button class="btn btn--small">Small</button>
<button class="btn btn--medium">Medium</button>
<button class="btn btn--large">Large</button>

<!-- States -->
<button class="btn btn--loading">Loading...</button>
<button class="btn" disabled>Disabled</button>
```

### Card Component

```html
<!-- Blog Card -->
<article class="card card--blog card--medium">
    <div class="card__header">
        <div class="card__image">
            <img src="image.jpg" alt="Description" class="card__image-img">
        </div>
        <div class="card__meta">
            <span class="card__date text-small text-secondary">March 15, 2024</span>
            <span class="card__category text-small text-brand">Category</span>
        </div>
        <h3 class="card__title text-h3">Card Title</h3>
    </div>
    <div class="card__content">
        <p class="card__description text-body">Card description text.</p>
    </div>
    <div class="card__actions">
        <button class="btn btn--primary btn--small">Action</button>
    </div>
</article>
```

### Form Component

```html
<!-- Contact Form -->
<form class="form form--contact">
    <div class="form__field">
        <label for="name" class="form__label">Name *</label>
        <input type="text" id="name" name="name" class="form__input" required>
        <div class="form__error" role="alert"></div>
    </div>
    
    <div class="form__field">
        <label for="email" class="form__label">Email *</label>
        <input type="email" id="email" name="email" class="form__input" required>
        <div class="form__error" role="alert"></div>
    </div>
    
    <div class="form__actions">
        <button type="submit" class="btn btn--primary btn--large">Submit</button>
    </div>
</form>
```

### Hero Component

```html
<!-- Simple Hero -->
<section class="hero hero--simple hero--medium hero--center">
    <div class="hero__content">
        <div class="hero__text">
            <h1 class="hero__title text-h1 text-reverse">Hero Title</h1>
            <p class="hero__subtitle text-body text-reverse">Hero subtitle text</p>
            <div class="hero__actions">
                <button class="btn btn--primary btn--large">Get Started</button>
            </div>
        </div>
    </div>
</section>

<!-- Image Hero -->
<section class="hero hero--image hero--large hero--center">
    <div class="hero__background">
        <img src="hero-image.jpg" alt="Hero image" class="hero__image">
    </div>
    <div class="hero__overlay"></div>
    <div class="hero__content">
        <!-- Hero content here -->
    </div>
</section>
```

## 🎯 Best Practices

### 1. Semantic HTML
Always use semantic HTML elements:
```html
<!-- ✅ Good -->
<button class="btn btn--primary">Submit</button>
<article class="card card--blog">
<header class="hero hero--simple">

<!-- ❌ Avoid -->
<div class="btn btn--primary">Submit</div>
<div class="card card--blog">
<div class="hero hero--simple">
```

### 2. Accessibility
- Use proper ARIA labels and roles
- Ensure keyboard navigation works
- Provide alt text for images
- Use semantic form labels

### 3. Responsive Design
- Mobile-first approach
- Use design tokens for spacing and typography
- Test on multiple screen sizes

### 4. Performance
- Only include CSS for components you use
- Optimize images for web
- Use CSS custom properties for theming

## ♿ Accessibility Guidelines

### Keyboard Navigation
- All interactive elements are keyboard accessible
- Use `Tab` key to navigate between elements
- Use `Enter` or `Space` to activate buttons

### Screen Readers
- Use semantic HTML elements
- Provide meaningful alt text for images
- Use ARIA labels where needed
- Ensure proper heading hierarchy

### Color Contrast
- All text meets WCAG AA contrast requirements
- Error states use both color and text indicators
- Focus states are clearly visible

## 🌐 Browser Support

- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+

### CSS Features Used
- CSS Custom Properties (CSS Variables)
- CSS Grid
- Flexbox
- CSS Transforms and Transitions

## 📚 Additional Resources

- [Component Examples](./component-examples.md)
- [Design Token Reference](./design-tokens.md)
- [Accessibility Checklist](./accessibility-checklist.md)
- [Migration Guide](./migration-guide.md)

## 🤝 Contributing

When adding new components or modifying existing ones:

1. Follow the established naming conventions
2. Use design tokens for all values
3. Include accessibility features
4. Add comprehensive documentation
5. Test across all supported browsers

## 📞 Support

For questions or support with the design system:
- Email: design-system@purposefulmedia.com
- Documentation: [Internal Wiki]
- Issues: [GitHub Issues]

---

*Last updated: March 2024*
*Version: 1.0.0*













