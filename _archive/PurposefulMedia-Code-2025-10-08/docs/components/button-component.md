# Button Component Documentation

## Overview

The Button component is a versatile atomic component that provides consistent styling and behavior for all interactive buttons throughout the Purposeful Media design system.

## Features

- ✅ **5 Theme Variants**: Primary, accent, outline, reverse, ghost
- ✅ **3 Size Options**: Small, medium, large
- ✅ **4 Interactive States**: Default, hover, active, disabled
- ✅ **Loading State**: Built-in loading animation
- ✅ **Accessibility**: Full keyboard navigation and screen reader support
- ✅ **Responsive**: Adapts to different screen sizes

## Basic Usage

```html
<button class="btn btn--primary btn--medium">Click Me</button>
```

## Component Structure

### Base Class
- `.btn` - Base button class (required)

### Theme Modifiers
- `.btn--primary` - Primary brand color (navy blue)
- `.btn--accent` - Accent color (gold)
- `.btn--outline` - Outlined button with transparent background
- `.btn--reverse` - White background with dark text
- `.btn--ghost` - Transparent background with minimal styling

### Size Modifiers
- `.btn--small` - Small button (16px font, compact padding)
- `.btn--medium` - Medium button (18px font, standard padding)
- `.btn--large` - Large button (20px font, generous padding)

### State Modifiers
- `.btn--loading` - Shows loading spinner and disables interaction
- `:disabled` - Disabled state (reduced opacity, no interaction)
- `:hover` - Hover state (automatic)
- `:active` - Active/pressed state (automatic)
- `:focus` - Focus state for keyboard navigation

## Complete Examples

### All Theme Variants

```html
<!-- Primary Button -->
<button class="btn btn--primary btn--medium">Primary Action</button>

<!-- Accent Button -->
<button class="btn btn--accent btn--medium">Accent Action</button>

<!-- Outline Button -->
<button class="btn btn--outline btn--medium">Outline Action</button>

<!-- Reverse Button -->
<button class="btn btn--reverse btn--medium">Reverse Action</button>

<!-- Ghost Button -->
<button class="btn btn--ghost btn--medium">Ghost Action</button>
```

### All Size Variants

```html
<!-- Small Button -->
<button class="btn btn--primary btn--small">Small</button>

<!-- Medium Button -->
<button class="btn btn--primary btn--medium">Medium</button>

<!-- Large Button -->
<button class="btn btn--primary btn--large">Large</button>
```

### Interactive States

```html
<!-- Loading State -->
<button class="btn btn--primary btn--medium btn--loading">Loading...</button>

<!-- Disabled State -->
<button class="btn btn--primary btn--medium" disabled>Disabled</button>

<!-- With Icon -->
<button class="btn btn--primary btn--medium">
    <svg class="btn__icon" width="16" height="16" viewBox="0 0 24 24">
        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
    </svg>
    Button with Icon
</button>
```

## Design Tokens Used

### Colors
```css
--brand: #1B1464;           /* Primary button background */
--accent: #D4AF37;          /* Accent button background */
--text-reverse: #FFFFFF;    /* Button text color */
--text-primary: #1B1464;    /* Reverse button text */
--border-default: 1px solid #E5E5E5;  /* Outline button border */
```

### Spacing
```css
--space-2: 8px;             /* Small button padding */
--space-3: 12px;            /* Medium button padding */
--space-4: 16px;            /* Large button padding */
--space-6: 24px;            /* Large button horizontal padding */
```

### Typography
```css
--font-primary: 'Lato', sans-serif;
--font-weight-bold: 700;
--text-small: 16px;         /* Small button font size */
--text-body: 18px;          /* Medium button font size */
--text-h3: 20px;            /* Large button font size */
```

### Border Radius
```css
--radius-sm: 4px;           /* Button border radius */
```

## Accessibility Features

### Keyboard Navigation
- Fully keyboard accessible
- `Tab` key to focus
- `Enter` or `Space` key to activate
- Clear focus indicators

### Screen Reader Support
- Semantic `<button>` element
- Descriptive button text
- Loading state announcements
- Disabled state indication

### ARIA Attributes
```html
<!-- Loading state with ARIA -->
<button class="btn btn--primary btn--loading" aria-label="Loading, please wait">
    Loading...
</button>

<!-- Disabled state -->
<button class="btn btn--primary" disabled aria-describedby="disabled-reason">
    Disabled Button
</button>
<div id="disabled-reason" class="sr-only">This button is currently disabled</div>
```

## JavaScript Integration

### Basic Event Handling

```javascript
// Button click handler
document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('Button clicked:', this.textContent.trim());
    });
});
```

### Loading State Management

```javascript
// Show loading state
function showLoading(button) {
    button.classList.add('btn--loading');
    button.disabled = true;
    button.setAttribute('aria-label', 'Loading, please wait');
}

// Hide loading state
function hideLoading(button, originalText) {
    button.classList.remove('btn--loading');
    button.disabled = false;
    button.textContent = originalText;
    button.removeAttribute('aria-label');
}

// Example usage
const submitButton = document.querySelector('.btn[type="submit"]');
submitButton.addEventListener('click', function(e) {
    e.preventDefault();
    
    const originalText = this.textContent;
    showLoading(this);
    
    // Simulate API call
    setTimeout(() => {
        hideLoading(this, originalText);
        console.log('Form submitted successfully');
    }, 2000);
});
```

### Form Integration

```javascript
// Form submission with button states
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const submitButton = this.querySelector('button[type="submit"]');
    const originalText = submitButton.textContent;
    
    // Show loading state
    submitButton.classList.add('btn--loading');
    submitButton.disabled = true;
    
    // Simulate form submission
    setTimeout(() => {
        submitButton.classList.remove('btn--loading');
        submitButton.disabled = false;
        submitButton.textContent = 'Success!';
        
        // Reset after delay
        setTimeout(() => {
            submitButton.textContent = originalText;
        }, 3000);
    }, 2000);
});
```

## Responsive Behavior

### Mobile Considerations
- Touch targets meet minimum 44x44px requirement
- Adequate spacing between buttons
- Readable text at all sizes

### Desktop Enhancements
- Hover states for better interaction feedback
- Focus states for keyboard navigation
- Smooth transitions and animations

## Best Practices

### 1. Button Text
```html
<!-- ✅ Good - Clear and actionable -->
<button class="btn btn--primary">Get Started</button>
<button class="btn btn--outline">Learn More</button>

<!-- ❌ Avoid - Vague or unclear -->
<button class="btn btn--primary">Click Here</button>
<button class="btn btn--outline">More</button>
```

### 2. Button Hierarchy
```html
<!-- Primary action (most important) -->
<button class="btn btn--primary btn--large">Submit Order</button>

<!-- Secondary action -->
<button class="btn btn--outline btn--medium">Cancel</button>

<!-- Tertiary action -->
<button class="btn btn--ghost btn--small">Save Draft</button>
```

### 3. Loading States
```html
<!-- ✅ Good - Clear loading indication -->
<button class="btn btn--primary btn--loading">Processing...</button>

<!-- ❌ Avoid - Unclear loading state -->
<button class="btn btn--primary">...</button>
```

### 4. Accessibility
```html
<!-- ✅ Good - Descriptive text -->
<button class="btn btn--primary" aria-label="Add item to cart">
    Add to Cart
</button>

<!-- ✅ Good - Loading state with ARIA -->
<button class="btn btn--primary btn--loading" aria-label="Submitting form, please wait">
    Submit
</button>
```

## Common Patterns

### Call-to-Action Buttons
```html
<!-- Hero CTA -->
<button class="btn btn--primary btn--large">Get Started Today</button>

<!-- Section CTA -->
<button class="btn btn--accent btn--medium">Learn More</button>

<!-- Footer CTA -->
<button class="btn btn--outline btn--small">Contact Us</button>
```

### Form Buttons
```html
<!-- Form submission -->
<button type="submit" class="btn btn--primary btn--large">Submit Form</button>

<!-- Form reset -->
<button type="reset" class="btn btn--ghost btn--medium">Clear Form</button>

<!-- Form cancel -->
<button type="button" class="btn btn--outline btn--medium">Cancel</button>
```

### Navigation Buttons
```html
<!-- Previous/Next navigation -->
<button class="btn btn--outline btn--medium">Previous</button>
<button class="btn btn--primary btn--medium">Next</button>

<!-- Pagination -->
<button class="btn btn--ghost btn--small">1</button>
<button class="btn btn--primary btn--small">2</button>
<button class="btn btn--ghost btn--small">3</button>
```

## Troubleshooting

### Common Issues

**Button not responding to clicks**
- Check if button has `disabled` attribute
- Verify no JavaScript errors in console
- Ensure button is not covered by other elements

**Loading state not working**
- Make sure `.btn--loading` class is applied
- Check if CSS file is properly loaded
- Verify JavaScript is running correctly

**Accessibility issues**
- Test with keyboard navigation
- Check screen reader compatibility
- Verify ARIA attributes are correct

### Browser Compatibility

- **Chrome**: 90+ ✅
- **Firefox**: 88+ ✅
- **Safari**: 14+ ✅
- **Edge**: 90+ ✅

## Related Components

- [Card Component](./card-component.md) - Often contains buttons
- [Form Component](./form-component.md) - Uses buttons for submission
- [Hero Component](./hero-component.md) - Features prominent CTAs
- [Footer Component](./footer-component.md) - Contains navigation buttons

---

*Last updated: March 2024*
*Version: 1.0.0*













