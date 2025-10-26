# Component Examples

## Overview

This document provides comprehensive examples of how to use all Purposeful Media design system components in real-world scenarios.

## Table of Contents

- [Button Examples](#button-examples)
- [Card Examples](#card-examples)
- [Form Examples](#form-examples)
- [Hero Examples](#hero-examples)
- [Navigation Examples](#navigation-examples)
- [Layout Examples](#layout-examples)
- [Complete Page Examples](#complete-page-examples)

## Button Examples

### Basic Button Usage

```html
<!-- Primary Action Button -->
<button class="btn btn--primary btn--large">Get Started</button>

<!-- Secondary Action Button -->
<button class="btn btn--outline btn--medium">Learn More</button>

<!-- Tertiary Action Button -->
<button class="btn btn--ghost btn--small">Cancel</button>
```

### Form Buttons

```html
<!-- Form Submission -->
<form class="form">
    <div class="form__field">
        <label for="email" class="form__label">Email Address</label>
        <input type="email" id="email" name="email" class="form__input" required>
    </div>
    <div class="form__actions">
        <button type="submit" class="btn btn--primary btn--large">Subscribe</button>
        <button type="reset" class="btn btn--ghost btn--medium">Clear</button>
    </div>
</form>
```

### Button Groups

```html
<!-- Horizontal Button Group -->
<div class="button-group">
    <button class="btn btn--primary btn--medium">Save</button>
    <button class="btn btn--outline btn--medium">Cancel</button>
    <button class="btn btn--ghost btn--medium">Delete</button>
</div>

<!-- Vertical Button Group -->
<div class="button-group button-group--vertical">
    <button class="btn btn--primary btn--medium">Option 1</button>
    <button class="btn btn--outline btn--medium">Option 2</button>
    <button class="btn btn--ghost btn--medium">Option 3</button>
</div>
```

### Loading States

```html
<!-- Loading Button -->
<button class="btn btn--primary btn--loading" disabled>
    Processing...
</button>

<!-- Button with Icon -->
<button class="btn btn--primary btn--medium">
    <svg class="btn__icon" width="16" height="16" viewBox="0 0 24 24">
        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2"/>
    </svg>
    Download
</button>
```

## Card Examples

### Blog Card Grid

```html
<div class="grid grid--3-columns gap-6">
    <article class="card card--blog card--medium">
        <div class="card__header">
            <div class="card__image">
                <img src="blog-1.jpg" alt="Strategic marketing planning" class="card__image-img">
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
    
    <article class="card card--blog card--medium">
        <div class="card__header">
            <div class="card__image">
                <img src="blog-2.jpg" alt="Creative campaign development" class="card__image-img">
            </div>
            <div class="card__meta">
                <span class="card__date text-small text-secondary">March 12, 2024</span>
                <span class="card__category text-small text-brand">Creative</span>
            </div>
            <h3 class="card__title text-h3">Creative Campaign Development</h3>
        </div>
        <div class="card__content">
            <p class="card__description text-body">
                Explore the creative process behind successful marketing campaigns 
                and learn how to develop compelling creative concepts.
            </p>
        </div>
        <div class="card__actions">
            <button class="btn btn--primary btn--small">Read More</button>
        </div>
    </article>
    
    <article class="card card--blog card--medium">
        <div class="card__header">
            <div class="card__image">
                <img src="blog-3.jpg" alt="Marketing analytics insights" class="card__image-img">
            </div>
            <div class="card__meta">
                <span class="card__date text-small text-secondary">March 10, 2024</span>
                <span class="card__category text-small text-brand">Analytics</span>
            </div>
            <h3 class="card__title text-h3">Marketing Analytics Insights</h3>
        </div>
        <div class="card__content">
            <p class="card__description text-body">
                Learn how to effectively measure and analyze marketing performance 
                using key metrics and data-driven insights.
            </p>
        </div>
        <div class="card__actions">
            <button class="btn btn--primary btn--small">Read More</button>
        </div>
    </article>
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
            <p class="card__description text-body">
                Comprehensive marketing strategy development tailored to your 
                business goals and target audience.
            </p>
        </div>
        <div class="card__actions">
            <button class="btn btn--primary btn--small">Learn More</button>
        </div>
    </article>
    
    <article class="card card--resource card--medium">
        <div class="card__header">
            <div class="card__icon">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                    <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <h3 class="card__title text-h3">Creative Execution</h3>
        </div>
        <div class="card__content">
            <p class="card__description text-body">
                High-impact creative campaigns that capture attention and 
                drive engagement across all channels.
            </p>
        </div>
        <div class="card__actions">
            <button class="btn btn--primary btn--small">Learn More</button>
        </div>
    </article>
    
    <article class="card card--resource card--medium">
        <div class="card__header">
            <div class="card__icon">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                    <path d="M18 20V10" stroke="currentColor" stroke-width="2"/>
                    <path d="M12 20V4" stroke="currentColor" stroke-width="2"/>
                    <path d="M6 20V14" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <h3 class="card__title text-h3">Performance Analytics</h3>
        </div>
        <div class="card__content">
            <p class="card__description text-body">
                Data-driven insights and optimization to maximize ROI and 
                improve campaign performance.
            </p>
        </div>
        <div class="card__actions">
            <button class="btn btn--primary btn--small">Learn More</button>
        </div>
    </article>
</div>
```

### Testimonial Cards

```html
<div class="grid grid--2-columns gap-8">
    <blockquote class="card card--quote card--medium">
        <div class="card__content">
            <p class="card__quote text-body">
                "Purposeful Media transformed our marketing approach. Their strategic 
                insights and creative execution helped us increase our lead generation 
                by 300% in just six months."
            </p>
            <footer class="card__footer">
                <cite class="card__author text-h4">Sarah Johnson</cite>
                <span class="card__role text-small text-secondary">CEO, TechStart Inc.</span>
            </footer>
        </div>
    </blockquote>
    
    <blockquote class="card card--quote card--medium">
        <div class="card__content">
            <p class="card__quote text-body">
                "The team's data-driven approach and attention to detail is unmatched. 
                They delivered exactly what we needed to scale our business effectively."
            </p>
            <footer class="card__footer">
                <cite class="card__author text-h4">Michael Chen</cite>
                <span class="card__role text-small text-secondary">Marketing Director, GrowthCo</span>
            </footer>
        </div>
    </blockquote>
</div>
```

### Statistics Cards

```html
<div class="grid grid--4-columns gap-4">
    <article class="card card--stats card--small">
        <div class="card__content">
            <div class="card__stat">
                <span class="card__number text-h1 text-brand">500+</span>
                <span class="card__label text-body">Projects Completed</span>
            </div>
        </div>
    </article>
    
    <article class="card card--stats card--small">
        <div class="card__content">
            <div class="card__stat">
                <span class="card__number text-h1 text-brand">98%</span>
                <span class="card__label text-body">Client Satisfaction</span>
            </div>
        </div>
    </article>
    
    <article class="card card--stats card--small">
        <div class="card__content">
            <div class="card__stat">
                <span class="card__number text-h1 text-brand">15+</span>
                <span class="card__label text-body">Years Experience</span>
            </div>
        </div>
    </article>
    
    <article class="card card--stats card--small">
        <div class="card__content">
            <div class="card__stat">
                <span class="card__number text-h1 text-brand">50+</span>
                <span class="card__label text-body">Team Members</span>
            </div>
        </div>
    </article>
</div>
```

## Form Examples

### Contact Form

```html
<form class="form form--contact" aria-labelledby="contact-form-title">
    <h2 id="contact-form-title" class="text-h2 mb-6">Get In Touch</h2>
    
    <div class="form__field">
        <label for="contact-name" class="form__label">Full Name *</label>
        <input type="text" id="contact-name" name="name" class="form__input" required 
               aria-describedby="contact-name-error">
        <div id="contact-name-error" class="form__error" role="alert" aria-live="polite"></div>
    </div>
    
    <div class="form__field">
        <label for="contact-email" class="form__label">Email Address *</label>
        <input type="email" id="contact-email" name="email" class="form__input" required 
               aria-describedby="contact-email-error">
        <div id="contact-email-error" class="form__error" role="alert" aria-live="polite"></div>
    </div>
    
    <div class="form__field">
        <label for="contact-company" class="form__label">Company</label>
        <input type="text" id="contact-company" name="company" class="form__input" 
               aria-describedby="contact-company-error">
        <div id="contact-company-error" class="form__error" role="alert" aria-live="polite"></div>
    </div>
    
    <div class="form__field">
        <label for="contact-phone" class="form__label">Phone Number</label>
        <input type="tel" id="contact-phone" name="phone" class="form__input" 
               aria-describedby="contact-phone-error">
        <div id="contact-phone-error" class="form__error" role="alert" aria-live="polite"></div>
    </div>
    
    <div class="form__field">
        <label for="contact-subject" class="form__label">Subject</label>
        <select id="contact-subject" name="subject" class="form__select">
            <option value="">Select a subject</option>
            <option value="general">General Inquiry</option>
            <option value="services">Services</option>
            <option value="partnership">Partnership</option>
            <option value="support">Support</option>
        </select>
    </div>
    
    <div class="form__field">
        <label for="contact-message" class="form__label">Message *</label>
        <textarea id="contact-message" name="message" rows="5" class="form__textarea" required 
                  aria-describedby="contact-message-error"></textarea>
        <div id="contact-message-error" class="form__error" role="alert" aria-live="polite"></div>
    </div>
    
    <div class="form__field">
        <label class="form__checkbox-label">
            <input type="checkbox" name="newsletter" class="form__checkbox">
            <span class="form__checkbox-text">Subscribe to our newsletter for marketing insights</span>
        </label>
    </div>
    
    <div class="form__actions">
        <button type="submit" class="btn btn--primary btn--large">Send Message</button>
        <button type="reset" class="btn btn--ghost btn--medium">Clear Form</button>
    </div>
</form>
```

### Newsletter Signup

```html
<form class="form form--newsletter">
    <h3 class="text-h3 mb-4">Stay Updated</h3>
    <p class="text-body mb-6">Get the latest marketing insights delivered to your inbox.</p>
    
    <div class="form__field">
        <label for="newsletter-email" class="form__label">Email Address</label>
        <input type="email" id="newsletter-email" name="email" class="form__input" required 
               placeholder="Enter your email address">
    </div>
    
    <div class="form__field">
        <label class="form__checkbox-label">
            <input type="checkbox" name="terms" class="form__checkbox" required>
            <span class="form__checkbox-text">I agree to receive marketing emails</span>
        </label>
    </div>
    
    <div class="form__actions">
        <button type="submit" class="btn btn--primary btn--medium">Subscribe</button>
    </div>
</form>
```

### Inline Form

```html
<form class="form form--inline">
    <div class="form__field">
        <label for="search-query" class="sr-only">Search</label>
        <input type="search" id="search-query" name="query" class="form__input" 
               placeholder="Search articles...">
    </div>
    <div class="form__actions">
        <button type="submit" class="btn btn--primary btn--medium">Search</button>
    </div>
</form>
```

## Hero Examples

### Simple Hero

```html
<section class="hero hero--simple hero--medium hero--center">
    <div class="hero__content">
        <div class="hero__text">
            <h1 class="hero__title text-h1 text-reverse">Strategic Marketing Solutions</h1>
            <p class="hero__subtitle text-body text-reverse">
                Transform your brand with data-driven strategies and creative excellence
            </p>
            <div class="hero__actions">
                <button class="btn btn--primary btn--large">Get Started</button>
                <button class="btn btn--outline btn--large">Learn More</button>
            </div>
        </div>
    </div>
</section>
```

### Image Hero

```html
<section class="hero hero--image hero--large hero--center">
    <div class="hero__background">
        <img src="hero-image.jpg" alt="Marketing team collaboration" class="hero__image">
    </div>
    <div class="hero__overlay"></div>
    <div class="hero__content">
        <div class="hero__text">
            <h1 class="hero__title text-h1 text-reverse">Marketing That Drives Results</h1>
            <p class="hero__subtitle text-body text-reverse">
                Our strategic approach combines creativity with data to deliver measurable outcomes
            </p>
            <div class="hero__actions">
                <button class="btn btn--accent btn--large">Start Your Project</button>
                <button class="btn btn--reverse btn--large">View Our Work</button>
            </div>
        </div>
    </div>
</section>
```

### Video Hero

```html
<section class="hero hero--video hero--fullscreen hero--center">
    <div class="hero__background">
        <video class="hero__video" muted loop>
            <source src="hero-video.mp4" type="video/mp4">
            <track kind="captions" src="hero-video.vtt" srclang="en" label="English captions">
        </video>
    </div>
    <div class="hero__overlay"></div>
    <div class="hero__content">
        <div class="hero__text">
            <h1 class="hero__title text-h1 text-reverse">Innovation in Marketing</h1>
            <p class="hero__subtitle text-body text-reverse">
                Discover how we're revolutionizing the marketing landscape
            </p>
            <div class="hero__actions">
                <button class="hero__play-btn" aria-label="Play video">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M8 5v14l11-7z" fill="currentColor"/>
                    </svg>
                </button>
                <button class="btn btn--primary btn--large">Get Started</button>
            </div>
        </div>
    </div>
</section>
```

## Navigation Examples

### Main Navigation

```html
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
                <svg class="navigation__dropdown-icon" width="16" height="16" viewBox="0 0 24 24">
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
                <li role="none">
                    <a href="/services/analytics" role="menuitem">Performance Analytics</a>
                </li>
            </ul>
        </li>
        <li role="none">
            <a href="/blog" role="menuitem">Blog</a>
        </li>
        <li role="none">
            <a href="/contact" role="menuitem">Contact</a>
        </li>
    </ul>
    <div class="navigation__actions">
        <button class="btn btn--primary btn--small">Get Started</button>
    </div>
</nav>
```

### Breadcrumb Navigation

```html
<nav class="breadcrumb" aria-label="Breadcrumb navigation">
    <ol class="breadcrumb__list">
        <li class="breadcrumb__item">
            <a href="/" class="breadcrumb__link">Home</a>
        </li>
        <li class="breadcrumb__item">
            <a href="/services" class="breadcrumb__link">Services</a>
        </li>
        <li class="breadcrumb__item breadcrumb__item--current" aria-current="page">
            Strategic Planning
        </li>
    </ol>
</nav>
```

### Pagination

```html
<nav class="pagination" aria-label="Blog pagination">
    <a href="#" class="pagination__link pagination__link--disabled" aria-label="Previous page">
        <svg width="16" height="16" viewBox="0 0 24 24">
            <path d="M15 18l-6-6 6-6" stroke="currentColor" stroke-width="2"/>
        </svg>
        Previous
    </a>
    
    <div class="pagination__numbers">
        <a href="#" class="pagination__link pagination__link--active" aria-label="Page 1, current page">1</a>
        <a href="#" class="pagination__link" aria-label="Page 2">2</a>
        <a href="#" class="pagination__link" aria-label="Page 3">3</a>
        <span class="pagination__ellipsis">...</span>
        <a href="#" class="pagination__link" aria-label="Page 10">10</a>
    </div>
    
    <a href="#" class="pagination__link" aria-label="Next page">
        Next
        <svg width="16" height="16" viewBox="0 0 24 24">
            <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2"/>
        </svg>
    </a>
</nav>
```

## Layout Examples

### Two-Column Layout

```html
<div class="layout layout--2-column">
    <main class="layout__main">
        <article class="content">
            <h1 class="text-h1">Main Content</h1>
            <p class="text-body">Main content goes here...</p>
        </article>
    </main>
    <aside class="layout__sidebar">
        <div class="sidebar">
            <h2 class="text-h3">Sidebar Content</h2>
            <p class="text-body">Sidebar content goes here...</p>
        </div>
    </aside>
</div>
```

### Three-Column Layout

```html
<div class="layout layout--3-column">
    <aside class="layout__sidebar layout__sidebar--left">
        <div class="sidebar">
            <h2 class="text-h3">Left Sidebar</h2>
            <p class="text-body">Left sidebar content...</p>
        </div>
    </aside>
    <main class="layout__main">
        <article class="content">
            <h1 class="text-h1">Main Content</h1>
            <p class="text-body">Main content goes here...</p>
        </article>
    </main>
    <aside class="layout__sidebar layout__sidebar--right">
        <div class="sidebar">
            <h2 class="text-h3">Right Sidebar</h2>
            <p class="text-body">Right sidebar content...</p>
        </div>
    </aside>
</div>
```

### Full-Width Layout

```html
<div class="layout layout--full-width">
    <main class="layout__main">
        <article class="content">
            <h1 class="text-h1">Full-Width Content</h1>
            <p class="text-body">This content spans the full width...</p>
        </article>
    </main>
</div>
```

## Complete Page Examples

### Homepage Layout

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purposeful Media - Strategic Marketing Solutions</title>
    <link rel="stylesheet" href="styles/tokens/unified-design-tokens.css">
    <link rel="stylesheet" href="styles/utilities/utility-classes.css">
    <link rel="stylesheet" href="components/atoms/cleaned/button-component.css">
    <link rel="stylesheet" href="components/molecules/cleaned/card-component.css">
    <link rel="stylesheet" href="components/organisms/cleaned/hero-component.css">
    <link rel="stylesheet" href="components/organisms/cleaned/footer-component.css">
</head>
<body>
    <!-- Skip to main content link -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <!-- Header -->
    <header role="banner">
        <nav class="navigation" role="navigation" aria-label="Main navigation">
            <div class="navigation__brand">
                <a href="/" class="navigation__logo">
                    <img src="logo.svg" alt="Purposeful Media" class="navigation__logo-img">
                </a>
            </div>
            <ul class="navigation__menu" role="menubar">
                <li role="none"><a href="/" role="menuitem" aria-current="page">Home</a></li>
                <li role="none"><a href="/about" role="menuitem">About</a></li>
                <li role="none"><a href="/services" role="menuitem">Services</a></li>
                <li role="none"><a href="/blog" role="menuitem">Blog</a></li>
                <li role="none"><a href="/contact" role="menuitem">Contact</a></li>
            </ul>
            <div class="navigation__actions">
                <button class="btn btn--primary btn--small">Get Started</button>
            </div>
        </nav>
    </header>
    
    <!-- Hero Section -->
    <section class="hero hero--image hero--large hero--center">
        <div class="hero__background">
            <img src="hero-image.jpg" alt="Marketing team collaboration" class="hero__image">
        </div>
        <div class="hero__overlay"></div>
        <div class="hero__content">
            <div class="hero__text">
                <h1 class="hero__title text-h1 text-reverse">Strategic Marketing That Drives Results</h1>
                <p class="hero__subtitle text-body text-reverse">
                    Transform your brand with data-driven strategies and creative excellence
                </p>
                <div class="hero__actions">
                    <button class="btn btn--primary btn--large">Get Started</button>
                    <button class="btn btn--outline btn--large">Learn More</button>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Main Content -->
    <main id="main-content" role="main">
        <!-- Services Section -->
        <section class="section" aria-labelledby="services-heading">
            <div class="container">
                <h2 id="services-heading" class="text-h2 text-center mb-8">Our Services</h2>
                <div class="grid grid--3-columns gap-6">
                    <!-- Service cards here -->
                </div>
            </div>
        </section>
        
        <!-- Testimonials Section -->
        <section class="section section--secondary" aria-labelledby="testimonials-heading">
            <div class="container">
                <h2 id="testimonials-heading" class="text-h2 text-center mb-8">What Our Clients Say</h2>
                <div class="grid grid--2-columns gap-8">
                    <!-- Testimonial cards here -->
                </div>
            </div>
        </section>
    </main>
    
    <!-- Footer -->
    <footer role="contentinfo">
        <div class="footer footer--main">
            <!-- Footer content here -->
        </div>
    </footer>
</body>
</html>
```

### Blog Page Layout

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Purposeful Media</title>
    <!-- Include all necessary CSS files -->
</head>
<body>
    <!-- Header -->
    <header role="banner">
        <!-- Navigation -->
    </header>
    
    <!-- Main Content -->
    <main id="main-content" role="main">
        <!-- Hero Section -->
        <section class="hero hero--simple hero--medium">
            <div class="hero__content">
                <h1 class="hero__title text-h1 text-reverse">Marketing Insights & Strategy</h1>
                <p class="hero__subtitle text-body text-reverse">
                    Expert insights, industry trends, and strategic marketing advice
                </p>
            </div>
        </section>
        
        <!-- Blog Content -->
        <section class="section" aria-labelledby="blog-heading">
            <div class="container">
                <h2 id="blog-heading" class="text-h2 mb-8">Latest Posts</h2>
                <div class="layout layout--2-column">
                    <main class="layout__main">
                        <div class="blog-posts">
                            <!-- Blog post cards here -->
                        </div>
                        <!-- Pagination -->
                        <nav class="pagination" aria-label="Blog pagination">
                            <!-- Pagination links -->
                        </nav>
                    </main>
                    <aside class="layout__sidebar">
                        <div class="sidebar">
                            <h3 class="text-h3 mb-4">Categories</h3>
                            <ul class="sidebar-list">
                                <li><a href="#strategy" class="sidebar-link">Strategy</a></li>
                                <li><a href="#creative" class="sidebar-link">Creative</a></li>
                                <li><a href="#analytics" class="sidebar-link">Analytics</a></li>
                            </ul>
                            
                            <h3 class="text-h3 mb-4">Recent Posts</h3>
                            <div class="sidebar-posts">
                                <!-- Recent posts list -->
                            </div>
                            
                            <h3 class="text-h3 mb-4">Newsletter</h3>
                            <form class="form form--newsletter">
                                <!-- Newsletter form -->
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
    
    <!-- Footer -->
    <footer role="contentinfo">
        <!-- Footer content -->
    </footer>
</body>
</html>
```

## Responsive Examples

### Mobile-First Approach

```css
/* Mobile styles (default) */
.card {
    padding: var(--space-4);
    margin-bottom: var(--space-6);
}

/* Tablet and up */
@media (min-width: 768px) {
    .card {
        padding: var(--space-6);
        margin-bottom: var(--space-8);
    }
}

/* Desktop and up */
@media (min-width: 1024px) {
    .card {
        padding: var(--space-8);
        margin-bottom: var(--space-10);
    }
}
```

### Responsive Grid

```html
<!-- Responsive grid that adapts to screen size -->
<div class="grid grid--responsive gap-6">
    <article class="card card--blog card--medium">...</article>
    <article class="card card--blog card--medium">...</article>
    <article class="card card--blog card--medium">...</article>
</div>
```

---

*Last updated: March 2024*
*Version: 1.0.0*













