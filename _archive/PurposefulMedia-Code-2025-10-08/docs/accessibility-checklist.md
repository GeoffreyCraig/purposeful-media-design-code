# Accessibility Checklist

## Overview

This accessibility checklist ensures that all Purposeful Media design system components meet WCAG 2.1 AA standards and provide an inclusive experience for all users.

## General Accessibility Principles

### 1. Perceivable
- Information and UI components must be presentable to users in ways they can perceive
- Text alternatives for non-text content
- Content can be presented in different ways without losing information

### 2. Operable
- UI components and navigation must be operable
- Interface cannot require interaction that a user cannot perform
- Users have enough time to read and use content

### 3. Understandable
- Information and UI operation must be understandable
- Content appears and operates in predictable ways
- Users are helped to avoid and correct mistakes

### 4. Robust
- Content must be robust enough to be interpreted by assistive technologies
- Content remains accessible as technologies advance

## Component-Specific Checklists

### Button Component

#### ✅ Semantic HTML
- [ ] Uses `<button>` element (not `<div>` or `<span>`)
- [ ] Has descriptive text content
- [ ] Includes `type` attribute when in forms

#### ✅ Keyboard Navigation
- [ ] Receives focus with Tab key
- [ ] Activates with Enter or Space key
- [ ] Focus indicator is clearly visible
- [ ] Tab order is logical

#### ✅ Screen Reader Support
- [ ] Button text is descriptive and actionable
- [ ] Loading state is announced to screen readers
- [ ] Disabled state is communicated
- [ ] Icon buttons have accessible labels

#### ✅ Visual Design
- [ ] Meets color contrast requirements (4.5:1 for normal text)
- [ ] Text is readable at all sizes
- [ ] Hover and focus states are distinct
- [ ] Loading state is visually clear

**Example:**
```html
<!-- ✅ Good -->
<button class="btn btn--primary" aria-label="Submit contact form">
    Submit
</button>

<!-- ✅ Loading state -->
<button class="btn btn--primary btn--loading" aria-label="Submitting form, please wait">
    Submitting...
</button>

<!-- ❌ Avoid -->
<div class="btn" onclick="submitForm()">Submit</div>
```

### Card Component

#### ✅ Semantic HTML
- [ ] Uses `<article>` for content cards
- [ ] Uses `<blockquote>` for quote cards
- [ ] Proper heading hierarchy (h1 → h2 → h3)
- [ ] Semantic `<footer>` and `<cite>` elements

#### ✅ Content Structure
- [ ] Clear content hierarchy
- [ ] Descriptive headings
- [ ] Meaningful alt text for images
- [ ] Proper attribution for quotes

#### ✅ Interactive Elements
- [ ] Clickable areas are keyboard accessible
- [ ] Focus management for card actions
- [ ] Hover states don't interfere with keyboard navigation

**Example:**
```html
<!-- ✅ Good - Blog card -->
<article class="card card--blog" aria-labelledby="blog-title-1">
    <div class="card__header">
        <img src="image.jpg" alt="Strategic marketing planning illustration" class="card__image-img">
        <h3 id="blog-title-1" class="card__title">Strategic Marketing Planning</h3>
    </div>
    <div class="card__content">
        <p class="card__description">Discover how data-driven marketing strategies...</p>
    </div>
    <div class="card__actions">
        <button class="btn btn--primary">Read More</button>
    </div>
</article>

<!-- ✅ Good - Quote card -->
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

### Form Component

#### ✅ Form Structure
- [ ] Uses semantic `<form>` element
- [ ] Proper `<fieldset>` and `<legend>` for grouped fields
- [ ] Logical tab order
- [ ] Clear form purpose and instructions

#### ✅ Labels and Inputs
- [ ] Every input has an associated label
- [ ] Labels are properly linked with `for` attribute
- [ ] Required fields are clearly marked
- [ ] Input types are appropriate (email, tel, etc.)

#### ✅ Validation and Error Handling
- [ ] Error messages are clearly associated with fields
- [ ] Errors are announced to screen readers
- [ ] Success states are communicated
- [ ] Validation happens in real-time

#### ✅ Keyboard Navigation
- [ ] All form elements are keyboard accessible
- [ ] Tab order is logical and intuitive
- [ ] Form submission works with keyboard

**Example:**
```html
<!-- ✅ Good - Contact form -->
<form class="form form--contact" aria-labelledby="form-title">
    <h2 id="form-title">Contact Us</h2>
    
    <div class="form__field">
        <label for="contact-name" class="form__label">Name *</label>
        <input type="text" id="contact-name" name="name" class="form__input" required 
               aria-describedby="contact-name-error contact-name-help">
        <div id="contact-name-help" class="form__help">Enter your full name</div>
        <div id="contact-name-error" class="form__error" role="alert" aria-live="polite"></div>
    </div>
    
    <div class="form__field">
        <label for="contact-email" class="form__label">Email Address *</label>
        <input type="email" id="contact-email" name="email" class="form__input" required 
               aria-describedby="contact-email-error">
        <div id="contact-email-error" class="form__error" role="alert" aria-live="polite"></div>
    </div>
    
    <div class="form__actions">
        <button type="submit" class="btn btn--primary">Send Message</button>
        <button type="reset" class="btn btn--ghost">Clear Form</button>
    </div>
</form>
```

### Hero Component

#### ✅ Content Structure
- [ ] Proper heading hierarchy
- [ ] Descriptive alt text for background images
- [ ] Video content has captions or transcripts
- [ ] Content is readable over background

#### ✅ Interactive Elements
- [ ] Call-to-action buttons are accessible
- [ ] Video controls are keyboard accessible
- [ ] Play/pause buttons have proper labels

#### ✅ Responsive Design
- [ ] Content remains accessible on all screen sizes
- [ ] Text is readable on mobile devices
- [ ] Touch targets meet minimum size requirements

**Example:**
```html
<!-- ✅ Good - Image hero -->
<section class="hero hero--image" role="banner" aria-labelledby="hero-title">
    <div class="hero__background">
        <img src="hero-image.jpg" alt="Team of marketing professionals working together" class="hero__image">
    </div>
    <div class="hero__overlay" aria-hidden="true"></div>
    <div class="hero__content">
        <div class="hero__text">
            <h1 id="hero-title" class="hero__title">Strategic Marketing Solutions</h1>
            <p class="hero__subtitle">Transform your brand with data-driven strategies</p>
            <div class="hero__actions">
                <button class="btn btn--primary btn--large">Get Started</button>
                <button class="btn btn--outline btn--large">Learn More</button>
            </div>
        </div>
    </div>
</section>

<!-- ✅ Good - Video hero -->
<section class="hero hero--video" role="banner">
    <div class="hero__background">
        <video class="hero__video" aria-label="Marketing strategy presentation" muted>
            <source src="hero-video.mp4" type="video/mp4">
            <track kind="captions" src="hero-video.vtt" srclang="en" label="English captions">
        </video>
    </div>
    <div class="hero__content">
        <button class="hero__play-btn" aria-label="Play video" aria-describedby="video-description">
            <svg aria-hidden="true" width="24" height="24" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z" fill="currentColor"/>
            </svg>
        </button>
        <div id="video-description" class="sr-only">
            Watch our marketing strategy presentation to learn about our approach
        </div>
    </div>
</section>
```

### Navigation Components

#### ✅ Navigation Structure
- [ ] Uses semantic `<nav>` element
- [ ] Proper heading structure
- [ ] Clear navigation purpose
- [ ] Skip links for keyboard users

#### ✅ Menu Items
- [ ] All menu items are keyboard accessible
- [ ] Current page is clearly indicated
- [ ] Dropdown menus are accessible
- [ ] Mobile menu is fully functional

**Example:**
```html
<!-- ✅ Good - Main navigation -->
<nav class="navigation" role="navigation" aria-label="Main navigation">
    <div class="navigation__brand">
        <a href="/" class="navigation__logo">
            <img src="logo.svg" alt="Purposeful Media" class="navigation__logo-img">
        </a>
    </div>
    <ul class="navigation__menu" role="menubar">
        <li role="none">
            <a href="/" role="menuitem" aria-current="page">Home</a>
        </li>
        <li role="none">
            <a href="/about" role="menuitem">About</a>
        </li>
        <li role="none">
            <button class="navigation__dropdown" role="menuitem" aria-haspopup="true" aria-expanded="false">
                Services
                <svg aria-hidden="true" class="navigation__dropdown-icon" width="16" height="16">
                    <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2"/>
                </svg>
            </button>
            <ul class="navigation__submenu" role="menu" aria-label="Services submenu">
                <li role="none">
                    <a href="/services/strategy" role="menuitem">Strategic Planning</a>
                </li>
                <li role="none">
                    <a href="/services/creative" role="menuitem">Creative Execution</a>
                </li>
            </ul>
        </li>
        <li role="none">
            <a href="/contact" role="menuitem">Contact</a>
        </li>
    </ul>
</nav>
```

## Page-Level Accessibility

### ✅ Page Structure
- [ ] Proper document structure with `<header>`, `<main>`, `<footer>`
- [ ] Logical heading hierarchy (h1 → h2 → h3)
- [ ] Skip links for keyboard navigation
- [ ] Page title is descriptive and unique

### ✅ Content Organization
- [ ] Content is organized in logical sections
- [ ] Each section has a descriptive heading
- [ ] Landmarks are properly labeled
- [ ] Focus management for dynamic content

**Example:**
```html
<!-- ✅ Good - Page structure -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us - Purposeful Media</title>
    <meta name="description" content="Learn about Purposeful Media's team and mission">
</head>
<body>
    <!-- Skip to main content link -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <!-- Header -->
    <header role="banner">
        <nav role="navigation" aria-label="Main navigation">
            <!-- Navigation content -->
        </nav>
    </header>
    
    <!-- Main content -->
    <main id="main-content" role="main">
        <section aria-labelledby="about-heading">
            <h1 id="about-heading">About Purposeful Media</h1>
            <!-- Section content -->
        </section>
        
        <section aria-labelledby="team-heading">
            <h2 id="team-heading">Our Team</h2>
            <!-- Team content -->
        </section>
    </main>
    
    <!-- Footer -->
    <footer role="contentinfo">
        <!-- Footer content -->
    </footer>
</body>
</html>
```

## Testing Checklist

### ✅ Manual Testing
- [ ] Test with keyboard only (no mouse)
- [ ] Test with screen reader (NVDA, JAWS, VoiceOver)
- [ ] Test with high contrast mode
- [ ] Test with zoom up to 200%
- [ ] Test on mobile devices

### ✅ Automated Testing
- [ ] Run axe-core accessibility tests
- [ ] Check color contrast ratios
- [ ] Validate HTML markup
- [ ] Test with Lighthouse accessibility audit

### ✅ User Testing
- [ ] Test with users who rely on assistive technologies
- [ ] Gather feedback from users with disabilities
- [ ] Test with different assistive technology combinations

## Tools and Resources

### Testing Tools
- **axe-core**: Browser extension and CLI tool
- **WAVE**: Web accessibility evaluation tool
- **Lighthouse**: Chrome DevTools accessibility audit
- **Color Contrast Analyzer**: Check color contrast ratios

### Screen Readers
- **NVDA**: Free Windows screen reader
- **JAWS**: Commercial Windows screen reader
- **VoiceOver**: Built-in macOS/iOS screen reader
- **TalkBack**: Built-in Android screen reader

### Browser Extensions
- **axe DevTools**: Automated accessibility testing
- **WAVE**: Visual accessibility feedback
- **Colorblinding**: Simulate color vision deficiencies
- **NoCoffee**: Simulate various vision impairments

## Common Accessibility Issues

### ❌ Common Problems

**Missing Alt Text**
```html
<!-- ❌ Bad -->
<img src="image.jpg" class="card__image">

<!-- ✅ Good -->
<img src="image.jpg" alt="Marketing team meeting" class="card__image">
```

**Poor Color Contrast**
```css
/* ❌ Bad - Low contrast */
.low-contrast {
    color: #888888;
    background: #999999;
}

/* ✅ Good - High contrast */
.high-contrast {
    color: #000000;
    background: #FFFFFF;
}
```

**Missing Focus Indicators**
```css
/* ❌ Bad - No focus indicator */
.button:focus {
    outline: none;
}

/* ✅ Good - Clear focus indicator */
.button:focus {
    outline: 2px solid var(--brand);
    outline-offset: 2px;
}
```

**Inaccessible Forms**
```html
<!-- ❌ Bad - No labels -->
<input type="email" placeholder="Email">

<!-- ✅ Good - Proper labels -->
<label for="email">Email Address</label>
<input type="email" id="email" name="email" required>
```

## WCAG 2.1 AA Compliance

### Level A (Minimum)
- [ ] All images have alt text
- [ ] All form inputs have labels
- [ ] All interactive elements are keyboard accessible
- [ ] Color is not the only way to convey information

### Level AA (Recommended)
- [ ] Color contrast ratio of at least 4.5:1 for normal text
- [ ] Color contrast ratio of at least 3:1 for large text
- [ ] Text can be resized up to 200% without loss of functionality
- [ ] All functionality is available from a keyboard

### Level AAA (Enhanced)
- [ ] Color contrast ratio of at least 7:1 for normal text
- [ ] Color contrast ratio of at least 4.5:1 for large text
- [ ] No content flashes more than 3 times per second
- [ ] All text is readable and functional at 200% zoom

## Maintenance

### ✅ Regular Audits
- [ ] Monthly accessibility audits
- [ ] Quarterly user testing sessions
- [ ] Annual comprehensive accessibility review
- [ ] Continuous monitoring of new content

### ✅ Documentation Updates
- [ ] Keep accessibility guidelines current
- [ ] Update testing procedures
- [ ] Document new accessibility features
- [ ] Share lessons learned with team

---

*Last updated: March 2024*
*Version: 1.0.0*













