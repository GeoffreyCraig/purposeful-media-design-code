# Card Component Documentation

## Overview

The Card component is a versatile molecular component that provides consistent layouts for displaying content in structured, visually appealing containers. Cards are perfect for blog posts, resources, testimonials, and other content types.

## Features

- ✅ **5 Content Variants**: Blog, resource, stats, quote, teaser
- ✅ **3 Size Options**: Small, medium, large
- ✅ **Responsive Grid**: 1-4 columns with auto-fit
- ✅ **Interactive States**: Hover, loading, disabled
- ✅ **Accessibility**: Semantic HTML and ARIA support
- ✅ **Print-Friendly**: Optimized for printing

## Basic Usage

```html
<article class="card card--blog card--medium">
    <div class="card__header">
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

## Component Structure

### Base Class
- `.card` - Base card class (required)

### Content Variants
- `.card--blog` - Blog post card with image, meta, and content
- `.card--resource` - Resource card with icon and description
- `.card--stats` - Statistics card with numbers and labels
- `.card--quote` - Testimonial/quote card with author info
- `.card--teaser` - Compact teaser card for previews

### Size Modifiers
- `.card--small` - Compact card (reduced padding and font sizes)
- `.card--medium` - Standard card (default size)
- `.card--large` - Large card (increased padding and font sizes)

### State Modifiers
- `.card--loading` - Shows loading state
- `.card--disabled` - Disabled state (reduced opacity)
- `:hover` - Hover state (automatic)

## Complete Examples

### Blog Card
```html
<article class="card card--blog card--medium">
    <div class="card__header">
        <div class="card__image">
            <img src="blog-image.jpg" alt="Blog post image" class="card__image-img">
        </div>
        <div class="card__meta">
            <span class="card__date text-small text-secondary">March 15, 2024</span>
            <span class="card__category text-small text-brand">Strategy</span>
        </div>
        <h3 class="card__title text-h3">Strategic Marketing Planning</h3>
    </div>
    <div class="card__content">
        <p class="card__description text-body">
            Discover how data-driven marketing strategies are reshaping the industry 
            and learn key principles for developing effective marketing plans.
        </p>
    </div>
    <div class="card__actions">
        <button class="btn btn--primary btn--small">Read More</button>
    </div>
</article>
```

### Resource Card
```html
<article class="card card--resource card--medium">
    <div class="card__header">
        <div class="card__icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
        <h3 class="card__title text-h3">Strategic Planning</h3>
    </div>
    <div class="card__content">
        <p class="card__description text-body">
            Comprehensive marketing strategy development tailored to your business goals.
        </p>
    </div>
    <div class="card__actions">
        <button class="btn btn--primary btn--small">Learn More</button>
    </div>
</article>
```

### Stats Card
```html
<article class="card card--stats card--medium">
    <div class="card__content">
        <div class="card__stat">
            <span class="card__number text-h1 text-brand">500+</span>
            <span class="card__label text-body">Projects Completed</span>
        </div>
    </div>
</article>
```

### Quote Card
```html
<blockquote class="card card--quote card--medium">
    <div class="card__content">
        <p class="card__quote text-body">
            "Purposeful Media transformed our marketing approach. Their strategic insights 
            helped us increase our lead generation by 300% in just six months."
        </p>
        <footer class="card__footer">
            <cite class="card__author text-h4">Sarah Johnson</cite>
            <span class="card__role text-small text-secondary">CEO, TechStart Inc.</span>
        </footer>
    </div>
</blockquote>
```

### Teaser Card
```html
<article class="card card--teaser card--small">
    <div class="card__header">
        <h3 class="card__title text-h4">Quick Preview</h3>
    </div>
    <div class="card__content">
        <p class="card__description text-small">
            Brief description of content.
        </p>
    </div>
    <div class="card__actions">
        <button class="btn btn--ghost btn--small">View</button>
    </div>
</article>
```

## Grid System

### Responsive Grid Layout
```html
<!-- 3-column grid (responsive) -->
<div class="grid grid--3-columns gap-6">
    <article class="card card--blog card--medium">...</article>
    <article class="card card--blog card--medium">...</article>
    <article class="card card--blog card--medium">...</article>
</div>

<!-- 2-column grid -->
<div class="grid grid--2-columns gap-8">
    <article class="card card--quote card--medium">...</article>
    <article class="card card--quote card--medium">...</article>
</div>

<!-- 4-column grid -->
<div class="grid grid--4-columns gap-4">
    <article class="card card--stats card--small">...</article>
    <article class="card card--stats card--small">...</article>
    <article class="card card--stats card--small">...</article>
    <article class="card card--stats card--small">...</article>
</div>
```

### Grid Breakpoints
- **Mobile**: 1 column
- **Tablet**: 2 columns
- **Desktop**: 3-4 columns (depending on grid class)

## Design Tokens Used

### Colors
```css
--bg-primary: #FFFFFF;      /* Card background */
--bg-secondary: #F8F9FA;    /* Card border/subtle background */
--text-primary: #1B1464;    /* Card title color */
--text-secondary: #54595F;  /* Card description color */
--brand: #1B1464;           /* Accent color for categories */
--border-default: 1px solid #E5E5E5;  /* Card border */
```

### Spacing
```css
--space-4: 16px;            /* Card padding */
--space-6: 24px;            /* Card content spacing */
--space-8: 32px;            /* Card section spacing */
```

### Typography
```css
--text-h1: 36px;            /* Stats number size */
--text-h3: 24px;            /* Card title size */
--text-h4: 20px;            /* Author name size */
--text-body: 18px;          /* Card description size */
--text-small: 16px;         /* Meta information size */
```

### Border Radius & Shadows
```css
--radius-md: 8px;           /* Card border radius */
--shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);  /* Card shadow */
--shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);  /* Card hover shadow */
```

## Accessibility Features

### Semantic HTML
- Uses `<article>` for content cards
- Uses `<blockquote>` for quote cards
- Proper heading hierarchy (h1 → h2 → h3)
- Semantic `<footer>` and `<cite>` elements

### Screen Reader Support
```html
<!-- Blog card with proper structure -->
<article class="card card--blog" aria-labelledby="blog-title-1">
    <div class="card__header">
        <h3 id="blog-title-1" class="card__title">Strategic Marketing Planning</h3>
    </div>
    <div class="card__content">
        <p class="card__description">
            Discover how data-driven marketing strategies are reshaping the industry.
        </p>
    </div>
</article>

<!-- Quote card with proper attribution -->
<blockquote class="card card--quote" cite="https://example.com/testimonial">
    <div class="card__content">
        <p class="card__quote">"Amazing results with Purposeful Media."</p>
        <footer class="card__footer">
            <cite class="card__author">Sarah Johnson</cite>
            <span class="card__role">CEO, TechStart Inc.</span>
        </footer>
    </div>
</blockquote>
```

### Keyboard Navigation
- All interactive elements are keyboard accessible
- Focus management for card actions
- Proper tab order

## JavaScript Integration

### Card Click Handling
```javascript
// Card click interactions
document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function(e) {
        // Don't trigger if clicking on a button or link
        if (e.target.closest('.btn, a')) return;
        
        const cardTitle = this.querySelector('.card__title').textContent;
        console.log('Card clicked:', cardTitle);
        
        // Add visual feedback
        this.style.transform = 'scale(0.98)';
        setTimeout(() => {
            this.style.transform = '';
        }, 150);
    });
});
```

### Loading State Management
```javascript
// Show loading state for cards
function showCardLoading(card) {
    card.classList.add('card--loading');
    card.style.pointerEvents = 'none';
}

// Hide loading state
function hideCardLoading(card) {
    card.classList.remove('card--loading');
    card.style.pointerEvents = '';
}

// Example: Load more cards
function loadMoreCards() {
    const cardContainer = document.querySelector('.grid');
    const loadingCards = Array.from({length: 3}, () => {
        const card = document.createElement('article');
        card.className = 'card card--blog card--medium card--loading';
        card.innerHTML = '<div class="card__skeleton">Loading...</div>';
        return card;
    });
    
    cardContainer.append(...loadingCards);
    
    // Simulate loading
    setTimeout(() => {
        loadingCards.forEach(card => {
            card.classList.remove('card--loading');
            card.innerHTML = `
                <div class="card__header">
                    <h3 class="card__title text-h3">New Card</h3>
                </div>
                <div class="card__content">
                    <p class="card__description text-body">New content loaded.</p>
                </div>
            `;
        });
    }, 2000);
}
```

### Grid Layout Management
```javascript
// Responsive grid adjustments
function adjustGridLayout() {
    const container = document.querySelector('.grid');
    const cards = container.querySelectorAll('.card');
    
    // Remove existing grid classes
    container.className = 'grid';
    
    // Add appropriate grid class based on screen size
    if (window.innerWidth < 768) {
        container.classList.add('grid--1-column');
    } else if (window.innerWidth < 1024) {
        container.classList.add('grid--2-columns');
    } else {
        container.classList.add('grid--3-columns');
    }
}

// Listen for window resize
window.addEventListener('resize', adjustGridLayout);
```

## Responsive Behavior

### Mobile (320px - 767px)
- Single column layout
- Reduced padding and font sizes
- Touch-friendly interactions
- Optimized image sizes

### Tablet (768px - 1023px)
- 2-column grid layout
- Medium padding and font sizes
- Hover states for mouse users

### Desktop (1024px+)
- 3-4 column grid layout
- Full padding and font sizes
- Enhanced hover effects
- Smooth animations

## Best Practices

### 1. Content Structure
```html
<!-- ✅ Good - Clear content hierarchy -->
<article class="card card--blog">
    <div class="card__header">
        <h3 class="card__title">Clear, Descriptive Title</h3>
    </div>
    <div class="card__content">
        <p class="card__description">Concise description that provides value.</p>
    </div>
    <div class="card__actions">
        <button class="btn btn--primary">Action</button>
    </div>
</article>

<!-- ❌ Avoid - Unclear structure -->
<div class="card">
    <div>Title</div>
    <div>Content</div>
    <div>Button</div>
</div>
```

### 2. Image Optimization
```html
<!-- ✅ Good - Proper image attributes -->
<img src="optimized-image.webp" 
     alt="Descriptive alt text" 
     class="card__image-img"
     loading="lazy">

<!-- ❌ Avoid - Missing alt text -->
<img src="image.jpg" class="card__image-img">
```

### 3. Accessibility
```html
<!-- ✅ Good - Proper semantic structure -->
<article class="card card--blog" aria-labelledby="title-1">
    <h3 id="title-1" class="card__title">Title</h3>
    <p class="card__description">Description</p>
</article>

<!-- ✅ Good - Quote with proper attribution -->
<blockquote class="card card--quote" cite="source-url">
    <p class="card__quote">Quote text</p>
    <footer class="card__footer">
        <cite class="card__author">Author Name</cite>
    </footer>
</blockquote>
```

## Common Patterns

### Blog Listing
```html
<div class="grid grid--3-columns gap-6">
    <article class="card card--blog card--medium">
        <div class="card__header">
            <div class="card__image">
                <img src="blog-1.jpg" alt="Blog post image" class="card__image-img">
            </div>
            <div class="card__meta">
                <span class="card__date text-small text-secondary">March 15, 2024</span>
                <span class="card__category text-small text-brand">Strategy</span>
            </div>
            <h3 class="card__title text-h3">Strategic Marketing Planning</h3>
        </div>
        <div class="card__content">
            <p class="card__description text-body">Blog post description...</p>
        </div>
        <div class="card__actions">
            <button class="btn btn--primary btn--small">Read More</button>
        </div>
    </article>
    <!-- More blog cards... -->
</div>
```

### Service Cards
```html
<div class="grid grid--3-columns gap-6">
    <article class="card card--resource card--medium">
        <div class="card__header">
            <div class="card__icon">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <h3 class="card__title text-h3">Strategic Planning</h3>
        </div>
        <div class="card__content">
            <p class="card__description text-body">Service description...</p>
        </div>
        <div class="card__actions">
            <button class="btn btn--primary btn--small">Learn More</button>
        </div>
    </article>
    <!-- More service cards... -->
</div>
```

### Testimonials
```html
<div class="grid grid--2-columns gap-8">
    <blockquote class="card card--quote card--medium">
        <div class="card__content">
            <p class="card__quote text-body">
                "Purposeful Media transformed our marketing approach. 
                Their strategic insights helped us increase our lead generation by 300%."
            </p>
            <footer class="card__footer">
                <cite class="card__author text-h4">Sarah Johnson</cite>
                <span class="card__role text-small text-secondary">CEO, TechStart Inc.</span>
            </footer>
        </div>
    </blockquote>
    <!-- More testimonials... -->
</div>
```

## Troubleshooting

### Common Issues

**Cards not aligning properly in grid**
- Check if grid container has proper grid classes
- Verify CSS Grid support in browser
- Ensure cards have consistent heights

**Images not displaying**
- Check image file paths
- Verify image file formats (webp, jpg, png)
- Ensure proper alt text for accessibility

**Hover effects not working**
- Check if CSS is properly loaded
- Verify browser support for CSS transforms
- Test on different devices

### Browser Compatibility

- **Chrome**: 90+ ✅
- **Firefox**: 88+ ✅
- **Safari**: 14+ ✅
- **Edge**: 90+ ✅

## Related Components

- [Button Component](./button-component.md) - Used in card actions
- [Form Component](./form-component.md) - Can be displayed in cards
- [Hero Component](./hero-component.md) - Often contains card grids
- [Footer Component](./footer-component.md) - May contain card layouts

---

*Last updated: March 2024*
*Version: 1.0.0*













