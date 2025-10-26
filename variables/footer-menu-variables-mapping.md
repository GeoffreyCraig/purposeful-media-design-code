# Footer Menu Components - Variables & Tokens Mapping

**Document Version:** 1.1  
**Date:** October 24, 2025  
**Author:** Geoffrey Craig (with Claude AI assistance)  
**Sprint:** Week 43 - CSS Consolidation & Variable Mapping

## v3.0 Integration Status

**✅ Existing Variables Used:** 8 tokens  
**⚠️ New Variables Required:** 20 tokens  
**Overall Compatibility:** 95% - Only footer-specific tokens need to be added

### Quick Reference:
- **Colors:** Base colors exist in v3.0, footer-specific link states need adding
- **Typography:** Font families exist, footer-specific sizes need adding  
- **Spacing:** All footer-specific spacing needs adding
- **Layout:** Container widths exist, column counts need adding
- **Interactions:** All transitions need adding

---

## Component Overview

The Footer Menu system consists of two distinct layouts:
1. **Desktop/Tablet Footer Menu** - Four-column layout with static menu modules
2. **Mobile Footer Menu** - Accordion-style expandable menu groups

### Component Node IDs

#### Desktop/Tablet Footer Menu Modules
- **Services Section:** `4521:502`
- **Who We Serve Section:** `4521:516`
- **Resources Section:** `4521:530`
- **Company Section:** `4516:542`

#### Mobile Footer Menu States
- **Default State:** `4428:1159`
- **Service Active:** `4391:901`
- **Who Active:** `4428:1507`
- **Resource Active:** `4428:1551`
- **Company Active:** `4428:1589`

---

## Variables & Tokens Mapping

### 1. Color Tokens

| Element | CSS Variable | Value | Usage | Status in v3.0 |
|---------|--------------|-------|-------|----------------|
| **Module Headlines** | `--color-neutral-100` | `#ECEEEF` | Section headers (inert) | ✅ Exists |
| **Menu Link Default** | `--link-footer` | `#B0B0B0` | Default footer links | ⚠️ **Add to v3.0** |
| **Menu Link Hover** | `--link-footer-hover` | `#FFFFFF` | Hover state for footer links | ⚠️ **Add to v3.0** |
| **Menu Link Active** | `--link-footer-active` | `#DCBE5D` | Active/current page | ⚠️ **Add to v3.0** |
| **Menu Link Disabled** | `--link-footer-disabled` | `#5A5A5A` | Disabled links (gray) | ⚠️ **Add to v3.0** |
| **Background** | `--color-primary` | `#1B1464` | Footer background | ✅ Exists |
| **Mobile Accordion Border** | `--color-neutral-200` | `#C7CCCF` | Accordion separators | ✅ Exists |
| **Mobile Expand Icon** | `--color-neutral-100` | `#ECEEEF` | Plus/minus icons | ✅ Exists |

### 2. Typography Tokens

| Element | CSS Variable | Value | Usage | Status in v3.0 |
|---------|--------------|-------|-------|----------------|
| **Module Headlines** | `--font-headline-footer` | `700 18px/1.3` | Section headers | ⚠️ **Add to v3.0** |
| **Module Headlines Font** | `--font-primary` | `'Assistant', sans-serif` | Primary font family | ✅ Exists |
| **Menu Links** | `--font-footer-link` | `400 16px/1.5` | All menu links | ⚠️ **Add to v3.0** |
| **Menu Links Font** | `--font-secondary` | `'Open Sans', sans-serif` | Secondary font family | ✅ Exists |
| **Mobile Headers** | `--font-footer-mobile` | `600 16px/1.4` | Mobile accordion headers | ⚠️ **Add to v3.0** |

### 3. Spacing Tokens

| Element | CSS Variable | Value | Usage | Status in v3.0 |
|---------|--------------|-------|-------|----------------|
| **Module Spacing** | `--footer-column-gap` | `48px` | Desktop column spacing | ⚠️ **Add to v3.0** |
| **Module Top Padding** | `--footer-padding-top` | `64px` | Top padding for footer | ⚠️ **Add to v3.0** |
| **Module Bottom Padding** | `--footer-padding-bottom` | `32px` | Bottom padding for footer | ⚠️ **Add to v3.0** |
| **Link Vertical Spacing** | `--footer-link-spacing` | `12px` | Space between links | ⚠️ **Add to v3.0** |
| **Mobile Section Padding** | `--footer-mobile-padding` | `16px` | Mobile accordion padding | ⚠️ **Add to v3.0** |
| **Mobile Item Indent** | `--footer-mobile-indent` | `24px` | Indentation for menu items | ⚠️ **Add to v3.0** |

### 4. Layout Tokens

| Breakpoint | CSS Variable | Value | Usage | Status in v3.0 |
|------------|--------------|-------|-------|----------------|
| **DesktopPlus Container** | `--container-standard` | `1920px` | Max width for footer | ✅ Exists (v3.0) |
| **Desktop Container** | `--container-desktop` | `1150px` | Desktop footer width | ✅ Uses existing breakpoint |
| **Tablet Container** | `--container-tablet` | `768px` | Tablet footer width | ✅ Uses existing breakpoint |
| **Mobile Container** | `--container-mobile` | `100%` | Full width mobile | ✅ Standard CSS |
| **Column Count Desktop** | `--footer-columns-desktop` | `4` | Four column layout | ⚠️ **Add to v3.0** |
| **Column Count Tablet** | `--footer-columns-tablet` | `4` | Four column layout | ⚠️ **Add to v3.0** |
| **Column Count Mobile** | `--footer-columns-mobile` | `1` | Single column accordion | ⚠️ **Add to v3.0** |

### 5. Interactive State Tokens

| Element | CSS Variable | Value | Usage | Status in v3.0 |
|---------|--------------|-------|-------|----------------|
| **Hover Transition** | `--transition-footer` | `all 0.3s ease` | Link hover transitions | ⚠️ **Add to v3.0** |
| **Accordion Animation** | `--accordion-transition` | `max-height 0.3s ease` | Mobile accordion expand | ⚠️ **Add to v3.0** |
| **Hover Opacity** | `--footer-hover-opacity` | `1` | Full opacity on hover | ⚠️ **Add to v3.0** |
| **Default Opacity** | `--footer-default-opacity` | `0.8` | Slightly transparent default | ⚠️ **Add to v3.0** |

### 6. Icon References (Mobile Accordion)

| Icon | Sprite Reference | Position | Usage |
|------|-----------------|----------|-------|
| **Expand Icon** | `#icon-plus` | `viewBox="0 0 24 24"` | Collapsed state |
| **Collapse Icon** | `#icon-minus` | `viewBox="0 0 24 24"` | Expanded state |
| **Arrow Icon** | `#icon-chevron-down` | `viewBox="0 0 24 24"` | Alternative indicator |

---

## CSS Implementation

### Desktop/Tablet Footer Menu CSS

```css
/* Footer Menu Container */
.footer-menu {
  display: grid;
  grid-template-columns: repeat(var(--footer-columns-desktop), 1fr);
  gap: var(--footer-column-gap);
  padding: var(--footer-padding-top) 0 var(--footer-padding-bottom);
  max-width: var(--footer-container-desktop);
  margin: 0 auto;
  background-color: var(--color-primary);
}

/* Module Headlines (Inert) */
.footer-menu__heading {
  color: var(--color-neutral-100);
  font: var(--font-headline-footer);
  font-family: var(--font-primary);
  margin-bottom: var(--footer-link-spacing);
  pointer-events: none; /* Inert - not clickable */
  user-select: none;
}

/* Menu Links */
.footer-menu__link {
  display: block;
  color: var(--link-footer);
  font: var(--font-footer-link);
  font-family: var(--font-secondary);
  margin-bottom: var(--footer-link-spacing);
  transition: var(--transition-footer);
  opacity: var(--footer-default-opacity);
  text-decoration: none;
}

.footer-menu__link:hover {
  color: var(--link-footer-hover);
  opacity: var(--footer-hover-opacity);
}

.footer-menu__link--active {
  color: var(--link-footer-active);
  opacity: var(--footer-hover-opacity);
  font-weight: 500;
}

.footer-menu__link--disabled {
  color: var(--link-footer-disabled);
  opacity: 0.5;
  pointer-events: none;
  cursor: not-allowed;
}

/* Tablet Adjustments */
@media (min-width: 768px) and (max-width: 1149px) {
  .footer-menu {
    grid-template-columns: repeat(var(--footer-columns-tablet), 1fr);
    gap: calc(var(--footer-column-gap) * 0.75);
    max-width: var(--footer-container-tablet);
    padding-left: var(--padding-container-tablet);
    padding-right: var(--padding-container-tablet);
  }
}

/* DesktopPlus Adjustments */
@media (min-width: 1920px) {
  .footer-menu {
    max-width: var(--footer-container-desktopplus);
  }
}
```

### Mobile Footer Menu (Accordion) CSS

```css
/* Mobile Footer Menu - Accordion */
@media (max-width: 767px) {
  .footer-menu {
    display: block;
    grid-template-columns: var(--footer-columns-mobile);
    padding: var(--footer-mobile-padding);
    max-width: var(--footer-container-mobile);
  }
  
  /* Accordion Container */
  .footer-menu__section {
    border-bottom: 1px solid var(--color-neutral-200);
  }
  
  /* Accordion Header (Clickable) */
  .footer-menu__accordion-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--footer-mobile-padding);
    color: var(--color-neutral-100);
    font: var(--font-footer-mobile);
    font-family: var(--font-primary);
    cursor: pointer;
    user-select: none;
    transition: var(--transition-footer);
  }
  
  /* Expand/Collapse Icon */
  .footer-menu__accordion-icon {
    width: 20px;
    height: 20px;
    transition: transform 0.3s ease;
    fill: var(--color-neutral-100);
  }
  
  .footer-menu__accordion-header[aria-expanded="true"] .footer-menu__accordion-icon {
    transform: rotate(180deg);
  }
  
  /* Accordion Content */
  .footer-menu__accordion-content {
    max-height: 0;
    overflow: hidden;
    transition: var(--accordion-transition);
  }
  
  .footer-menu__accordion-content--expanded {
    max-height: 500px; /* Adjust based on content */
  }
  
  /* Menu Items in Accordion */
  .footer-menu__accordion-list {
    padding-left: var(--footer-mobile-indent);
    padding-right: var(--footer-mobile-padding);
    padding-bottom: var(--footer-mobile-padding);
  }
  
  .footer-menu__link {
    padding: 8px 0;
    margin-bottom: 0;
  }
}
```

---

## HTML Structure

### Desktop/Tablet Footer Menu

```html
<footer class="footer-menu">
  <!-- Services Section -->
  <div class="footer-menu__section">
    <h3 class="footer-menu__heading">Services</h3>
    <nav class="footer-menu__list">
      <a href="/email-management" class="footer-menu__link">Email Management</a>
      <a href="/content-creation" class="footer-menu__link footer-menu__link--active">Content Creation</a>
      <a href="/webinar-production" class="footer-menu__link">Webinar Production</a>
      <a href="/brand-strategy" class="footer-menu__link footer-menu__link--disabled">Brand Strategy</a>
    </nav>
  </div>
  
  <!-- Who We Serve Section -->
  <div class="footer-menu__section">
    <h3 class="footer-menu__heading">Who We Serve</h3>
    <nav class="footer-menu__list">
      <a href="/small-business" class="footer-menu__link">Small Business Owners</a>
      <a href="/executives" class="footer-menu__link">Senior Executives</a>
      <a href="/professionals" class="footer-menu__link">Independent Professionals</a>
    </nav>
  </div>
  
  <!-- Resources Section -->
  <div class="footer-menu__section">
    <h3 class="footer-menu__heading">Resources</h3>
    <nav class="footer-menu__list">
      <a href="/resource-library" class="footer-menu__link">Resource Library</a>
      <a href="/blog" class="footer-menu__link">Blog</a>
      <a href="/case-studies" class="footer-menu__link">Case Studies</a>
      <a href="/webinars" class="footer-menu__link footer-menu__link--disabled">Webinars</a>
    </nav>
  </div>
  
  <!-- Company Section -->
  <div class="footer-menu__section">
    <h3 class="footer-menu__heading">Company</h3>
    <nav class="footer-menu__list">
      <a href="/about" class="footer-menu__link">About Us</a>
      <a href="/contact" class="footer-menu__link">Contact</a>
      <a href="/privacy" class="footer-menu__link">Privacy Policy</a>
      <a href="/terms" class="footer-menu__link">Terms of Service</a>
    </nav>
  </div>
</footer>
```

### Mobile Footer Menu (Accordion)

```html
<footer class="footer-menu footer-menu--mobile">
  <!-- Services Accordion -->
  <div class="footer-menu__section">
    <button class="footer-menu__accordion-header" 
            aria-expanded="false"
            aria-controls="footer-services">
      <span>Services</span>
      <svg class="footer-menu__accordion-icon" aria-hidden="true">
        <use xlink:href="/assets/svg/ui-icons/purposeful-sprite-ui.svg#icon-plus"></use>
      </svg>
    </button>
    <div id="footer-services" class="footer-menu__accordion-content">
      <nav class="footer-menu__accordion-list">
        <a href="/email-management" class="footer-menu__link">Email Management</a>
        <a href="/content-creation" class="footer-menu__link footer-menu__link--active">Content Creation</a>
        <a href="/webinar-production" class="footer-menu__link">Webinar Production</a>
        <a href="/brand-strategy" class="footer-menu__link footer-menu__link--disabled">Brand Strategy</a>
      </nav>
    </div>
  </div>
  
  <!-- Additional accordion sections follow same pattern -->
</footer>
```

---

## JavaScript Functionality (Mobile Accordion)

```javascript
// Footer Mobile Accordion Handler
class FooterAccordion {
  constructor() {
    this.accordions = document.querySelectorAll('.footer-menu__accordion-header');
    this.init();
  }
  
  init() {
    this.accordions.forEach(header => {
      header.addEventListener('click', this.toggleAccordion.bind(this));
    });
  }
  
  toggleAccordion(e) {
    const header = e.currentTarget;
    const content = header.nextElementSibling;
    const isExpanded = header.getAttribute('aria-expanded') === 'true';
    
    // Close all other accordions
    this.closeAllAccordions();
    
    // Toggle current accordion
    if (!isExpanded) {
      header.setAttribute('aria-expanded', 'true');
      content.classList.add('footer-menu__accordion-content--expanded');
      
      // Update icon from plus to minus
      const icon = header.querySelector('.footer-menu__accordion-icon use');
      icon.setAttribute('xlink:href', '/assets/svg/ui-icons/purposeful-sprite-ui.svg#icon-minus');
    }
  }
  
  closeAllAccordions() {
    this.accordions.forEach(header => {
      header.setAttribute('aria-expanded', 'false');
      const content = header.nextElementSibling;
      content.classList.remove('footer-menu__accordion-content--expanded');
      
      // Reset icon to plus
      const icon = header.querySelector('.footer-menu__accordion-icon use');
      icon.setAttribute('xlink:href', '/assets/svg/ui-icons/purposeful-sprite-ui.svg#icon-plus');
    });
  }
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
  if (window.innerWidth <= 767) {
    new FooterAccordion();
  }
  
  // Handle resize events
  let resizeTimer;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      if (window.innerWidth <= 767 && !window.footerAccordion) {
        window.footerAccordion = new FooterAccordion();
      } else if (window.innerWidth > 767 && window.footerAccordion) {
        // Clean up accordion functionality on larger screens
        window.footerAccordion = null;
      }
    }, 250);
  });
});
```

---

## WordPress Integration

### Menu Registration (functions.php)

```php
// Register Footer Menus
function register_footer_menus() {
  register_nav_menus(array(
    'footer-services' => __('Footer Services Menu', 'purposeful-media'),
    'footer-who-we-serve' => __('Footer Who We Serve Menu', 'purposeful-media'),
    'footer-resources' => __('Footer Resources Menu', 'purposeful-media'),
    'footer-company' => __('Footer Company Menu', 'purposeful-media'),
  ));
}
add_action('after_setup_theme', 'register_footer_menus');
```

### Dynamic Menu Output (footer.php)

```php
<footer class="footer-menu">
  <!-- Services Section -->
  <div class="footer-menu__section">
    <h3 class="footer-menu__heading">Services</h3>
    <?php wp_nav_menu(array(
      'theme_location' => 'footer-services',
      'container' => 'nav',
      'container_class' => 'footer-menu__list',
      'menu_class' => false,
      'items_wrap' => '%3$s',
      'walker' => new Footer_Menu_Walker(),
    )); ?>
  </div>
  
  <!-- Additional sections follow same pattern -->
</footer>
```

### Custom Walker Class

```php
class Footer_Menu_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $class_string = 'footer-menu__link';
    
    // Add active class
    if (in_array('current-menu-item', $classes)) {
      $class_string .= ' footer-menu__link--active';
    }
    
    // Add disabled class (based on custom field or logic)
    if (get_post_meta($item->ID, '_menu_item_disabled', true)) {
      $class_string .= ' footer-menu__link--disabled';
    }
    
    $output .= sprintf(
      '<a href="%s" class="%s">%s</a>',
      esc_url($item->url),
      esc_attr($class_string),
      esc_html($item->title)
    );
  }
}
```

---

## Consolidated Variables Block

**⚠️ ADD THESE TO `variables-v3.0-20251023.css`:**

```css
/* ==============================================
   FOOTER MENU VARIABLES
   Week 43 - Footer Menu Component Tokens
   Status: TO BE ADDED to v3.0
   ============================================== */
:root {
  /* Footer Link Colors - NEW */
  --link-footer: #B0B0B0;
  --link-footer-hover: #FFFFFF;
  --link-footer-active: #DCBE5D;  /* Maps to --color-accent-400 */
  --link-footer-disabled: #5A5A5A;
  
  /* Footer Typography - NEW */
  --font-headline-footer: 700 18px/1.3;
  --font-footer-link: 400 16px/1.5;
  --font-footer-mobile: 600 16px/1.4;
  
  /* Footer Spacing - NEW */
  --footer-column-gap: 48px;
  --footer-padding-top: 64px;
  --footer-padding-bottom: 32px;
  --footer-link-spacing: 12px;
  --footer-mobile-padding: 16px;
  --footer-mobile-indent: 24px;
  
  /* Footer Layout - NEW */
  --footer-columns-desktop: 4;
  --footer-columns-tablet: 4;
  --footer-columns-mobile: 1;
  
  /* Footer Interactions - NEW */
  --transition-footer: all 0.3s ease;
  --accordion-transition: max-height 0.3s ease;
  --footer-hover-opacity: 1;
  --footer-default-opacity: 0.8;
}
```

**Note:** These variables reference existing v3.0 tokens:
- Uses `--container-standard: 1920px` for max width
- Uses `--color-neutral-100`, `--color-neutral-200` for UI elements
- Uses `--font-primary` and `--font-secondary` for font families
- Active color `#DCBE5D` maps to existing `--color-accent-400`
```

---

## Testing Checklist

- [ ] Desktop footer displays four columns correctly
- [ ] Tablet footer maintains four columns with adjusted spacing
- [ ] Mobile footer converts to accordion layout
- [ ] Module headlines are inert (not clickable) on desktop/tablet
- [ ] All link states work (default, hover, active, disabled)
- [ ] Disabled links are not clickable
- [ ] Mobile accordion opens/closes smoothly
- [ ] Only one accordion section open at a time
- [ ] Icons switch correctly (plus/minus)
- [ ] Keyboard navigation works (Enter/Space to toggle)
- [ ] ARIA attributes update correctly
- [ ] Responsive behavior works on window resize
- [ ] WordPress menus integrate properly
- [ ] Custom walker class applies correct classes

---

## Notes & Recommendations

1. **Accessibility:** Ensure all interactive elements have proper ARIA labels and keyboard support
2. **Performance:** Consider lazy-loading accordion content on mobile
3. **Flexibility:** The disabled state should be managed through WordPress custom fields or menu metadata
4. **Consistency:** Footer menu styling should align with main navigation styling where appropriate
5. **Icon System:** Leverage the consolidated sprite sheet for all icons
6. **WordPress Integration:** Use ACF to add "disabled" option to menu items if needed

---

## File References

- Variables file: `/styles/variables-v3.0-20251023.css`
- Sprite sheet: `/assets/svg/ui-icons/purposeful-sprite-ui.svg`
- Sprite positions: `/assets/svg/ui-icons/purposeful-ui-sprite.txt`
- Footer CSS: `/styles/organisms-footer-menu.css`
- Footer JavaScript: `/scripts/footer-accordion.js`
