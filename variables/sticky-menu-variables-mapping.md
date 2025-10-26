# Sticky Menu Components - Variables & Tokens Mapping

**Document Version:** 1.0  
**Date:** October 24, 2025  
**Author:** Geoffrey Craig (with Claude AI assistance)  
**Components:** Sticky Menu Navigation System

---

## Component Overview

The Sticky Menu system consists of two primary components that work together to provide persistent navigation for interior service/solution pages:

1. **Menu/Sticky (4708:1200)** - The main sticky navigation bar
2. **DropDown/Sticky (4877:1186)** - The dropdown menu for mobile states

These components are designed to help users navigate through long-form content pages with sections like Overview, Strategy, Method, Benefits, Resources, FAQ, and Get Started.

---

## 1. Menu/Sticky Component (Node: 4708:1200)

### Component Structure
- **Purpose:** Persistent navigation for service/solution pages
- **Behavior:** Sticks to top of viewport on scroll
- **Sections:** Overview | Strategy | Method | Benefits | Resources | FAQ | Get Started

### Responsive Behavior

| Breakpoint | Display Mode | Variables Used |
|------------|-------------|----------------|
| **DesktopPlus** (1920px+) | Full horizontal menu | `--container-max-width: 1920px` |
| **Desktop** (1150-1919px) | Full horizontal menu | `--container-desktop: 1150px` |
| **Tablet** (768-1149px) | Full horizontal menu | `--container-tablet: 768px` |
| **Mobile** (<768px) | Hamburger + dropdown | `--container-mobile: 380px` |

### Color Variables Mapping

```css
/* Background Colors */
--sticky-menu-bg: var(--color-primary-700); /* #1B1464 - Navy */
--sticky-menu-bg-scroll: var(--color-primary-800); /* #0B1F57 - Darker navy on scroll */

/* Text Colors */
--sticky-menu-text-default: var(--color-white); /* #FFFFFF */
--sticky-menu-text-hover: var(--color-accent-400); /* #DCBE5D - Gold */
--sticky-menu-text-active: var(--color-accent-600); /* #B39226 - Dark gold */
--sticky-menu-text-disabled: var(--color-neutral-300); /* #A2A9AF */

/* Mobile Menu Toggle */
--hamburger-color: var(--color-white); /* #FFFFFF */
--hamburger-hover: var(--color-accent-400); /* #DCBE5D */
--close-icon-color: var(--color-accent-600); /* #B39226 */
```

### Typography Variables

```css
/* Font Properties */
--sticky-menu-font-family: var(--font-primary); /* 'Lato', sans-serif */
--sticky-menu-font-weight: 700; /* Bold for menu items */
--sticky-menu-text-transform: uppercase;
--sticky-menu-letter-spacing: 0.05em;

/* Font Sizes by Breakpoint */
--sticky-menu-font-size-desktop: 16px;
--sticky-menu-font-size-tablet: 15px;
--sticky-menu-font-size-mobile: 14px;

/* Line Heights */
--sticky-menu-line-height: 24px;
```

### Spacing Variables

```css
/* Container Padding */
--sticky-menu-padding-y: 16px;
--sticky-menu-padding-x-desktop: 40px;
--sticky-menu-padding-x-tablet: 32px;
--sticky-menu-padding-x-mobile: 16px;

/* Menu Item Spacing */
--sticky-menu-item-gap-desktop: 48px;
--sticky-menu-item-gap-tablet: 32px;
--sticky-menu-item-padding-x: 16px;
--sticky-menu-item-padding-y: 8px;

/* Sticky Position */
--sticky-menu-top: 0px;
--sticky-menu-z-index: 100;
```

### Dimension Variables

```css
/* Heights */
--sticky-menu-height-desktop: 56px;
--sticky-menu-height-mobile: 48px;

/* Mobile Hamburger */
--hamburger-width: 38px;
--hamburger-height: 19px;
--hamburger-bar-height: 3px;
--hamburger-bar-spacing: 5px;

/* Container Constraints */
--sticky-menu-max-width: var(--container-max-width); /* 1920px */
```

---

## 2. DropDown/Sticky Component (Node: 4877:1186)

### Component Structure
- **Purpose:** Mobile dropdown menu for sticky navigation
- **Trigger:** Hamburger menu click on mobile breakpoint
- **Animation:** Slide down from sticky bar

### Dropdown States

| State | Description | Variables |
|-------|-------------|-----------|
| **Closed** | Default state | `--dropdown-height: 0px` |
| **Open** | Expanded menu | `--dropdown-height: auto` |
| **Overview Active** | Overview section highlighted | `--text-color: var(--color-accent-600)` |
| **Strategy Active** | Strategy section highlighted | `--text-color: var(--color-accent-600)` |
| **Method Active** | Method section highlighted | `--text-color: var(--color-accent-600)` |
| **Benefits Active** | Benefits section highlighted | `--text-color: var(--color-accent-600)` |
| **Resources Active** | Resources section highlighted | `--text-color: var(--color-accent-600)` |
| **FAQ Active** | FAQ section highlighted | `--text-color: var(--color-accent-600)` |
| **Start Active** | Get Started highlighted | `--text-color: var(--color-accent-600)` |

### Dropdown Color Variables

```css
/* Background */
--dropdown-bg: var(--color-neutral-100); /* #ECEEEF - Light gray */
--dropdown-item-hover-bg: var(--color-neutral-50); /* #F6F6F7 */
--dropdown-item-active-bg: var(--color-white); /* #FFFFFF */

/* Borders */
--dropdown-border-color: var(--color-neutral-200); /* #C7CBCF */
--dropdown-border-width: 1px;
--dropdown-border-radius: 8px;

/* Shadows */
--dropdown-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
```

### Dropdown Typography

```css
/* Current Section Display */
--dropdown-current-font-size: 16px;
--dropdown-current-font-weight: 800; /* Heavy */
--dropdown-current-color: var(--color-accent-600); /* #B39226 */

/* Menu Items */
--dropdown-item-font-size: 14px;
--dropdown-item-font-weight: 600;
--dropdown-item-line-height: 20px;
```

### Dropdown Spacing

```css
/* Container */
--dropdown-padding: 16px;
--dropdown-margin-top: 8px;

/* Items */
--dropdown-item-padding-x: 16px;
--dropdown-item-padding-y: 12px;
--dropdown-item-gap: 4px;

/* Animation */
--dropdown-transition-duration: 0.3s;
--dropdown-transition-easing: ease-in-out;
```

---

## 3. Interaction States Mapping

### Hover States
```css
/* Desktop Hover */
.sticky-menu-item:hover {
  color: var(--sticky-menu-text-hover); /* #DCBE5D */
  transition: color 0.2s ease;
}

/* Mobile Dropdown Hover */
.dropdown-item:hover {
  background-color: var(--dropdown-item-hover-bg);
  color: var(--sticky-menu-text-hover);
}
```

### Active/Current States
```css
/* Current Section Indicator */
.sticky-menu-item.active {
  color: var(--sticky-menu-text-active); /* #B39226 */
  border-bottom: 2px solid var(--color-accent-600);
}

/* Dropdown Current Section */
.dropdown-current-section {
  color: var(--dropdown-current-color); /* #B39226 */
  font-weight: var(--dropdown-current-font-weight); /* 800 */
}
```

### Disabled States
```css
.sticky-menu-item:disabled,
.sticky-menu-item.disabled {
  color: var(--sticky-menu-text-disabled); /* #A2A9AF */
  cursor: not-allowed;
  pointer-events: none;
}
```

---

## 4. JavaScript-Dependent Variables

### Scroll Behavior
```javascript
// Scroll threshold for background change
--sticky-scroll-threshold: 100; // pixels

// Scroll-triggered class additions
.sticky-menu.scrolled {
  background-color: var(--sticky-menu-bg-scroll);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
```

### Section Detection
```javascript
// Offset for section detection
--section-scroll-offset: 100; // pixels from top

// Active section highlighting
--section-highlight-transition: 0.3s ease;
```

---

## 5. Consolidated Variables Block

Add this block to your `variables-v2.0-20250915.css` file:

```css
/* ============================================
   STICKY MENU COMPONENT VARIABLES
   ============================================ */

:root {
  /* Sticky Menu - Main Bar */
  --sticky-menu-bg: var(--color-primary-700);
  --sticky-menu-bg-scroll: var(--color-primary-800);
  --sticky-menu-height-desktop: 56px;
  --sticky-menu-height-mobile: 48px;
  --sticky-menu-padding-y: 16px;
  --sticky-menu-padding-x-desktop: 40px;
  --sticky-menu-padding-x-tablet: 32px;
  --sticky-menu-padding-x-mobile: 16px;
  --sticky-menu-top: 0px;
  --sticky-menu-z-index: 100;
  
  /* Sticky Menu - Typography */
  --sticky-menu-font-family: var(--font-primary);
  --sticky-menu-font-weight: 700;
  --sticky-menu-font-size-desktop: 16px;
  --sticky-menu-font-size-tablet: 15px;
  --sticky-menu-font-size-mobile: 14px;
  --sticky-menu-line-height: 24px;
  --sticky-menu-text-transform: uppercase;
  --sticky-menu-letter-spacing: 0.05em;
  
  /* Sticky Menu - Colors */
  --sticky-menu-text-default: var(--color-white);
  --sticky-menu-text-hover: var(--color-accent-400);
  --sticky-menu-text-active: var(--color-accent-600);
  --sticky-menu-text-disabled: var(--color-neutral-300);
  
  /* Sticky Menu - Item Spacing */
  --sticky-menu-item-gap-desktop: 48px;
  --sticky-menu-item-gap-tablet: 32px;
  --sticky-menu-item-padding-x: 16px;
  --sticky-menu-item-padding-y: 8px;
  
  /* Hamburger Menu */
  --hamburger-width: 38px;
  --hamburger-height: 19px;
  --hamburger-bar-height: 3px;
  --hamburger-bar-spacing: 5px;
  --hamburger-color: var(--color-white);
  --hamburger-hover: var(--color-accent-400);
  --close-icon-color: var(--color-accent-600);
  
  /* Dropdown Menu */
  --dropdown-bg: var(--color-neutral-100);
  --dropdown-item-hover-bg: var(--color-neutral-50);
  --dropdown-item-active-bg: var(--color-white);
  --dropdown-border-color: var(--color-neutral-200);
  --dropdown-border-width: 1px;
  --dropdown-border-radius: 8px;
  --dropdown-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  --dropdown-padding: 16px;
  --dropdown-margin-top: 8px;
  
  /* Dropdown Typography */
  --dropdown-current-font-size: 16px;
  --dropdown-current-font-weight: 800;
  --dropdown-current-color: var(--color-accent-600);
  --dropdown-item-font-size: 14px;
  --dropdown-item-font-weight: 600;
  --dropdown-item-line-height: 20px;
  
  /* Dropdown Items */
  --dropdown-item-padding-x: 16px;
  --dropdown-item-padding-y: 12px;
  --dropdown-item-gap: 4px;
  
  /* Animations */
  --dropdown-transition-duration: 0.3s;
  --dropdown-transition-easing: ease-in-out;
  --section-highlight-transition: 0.3s ease;
  
  /* JavaScript Variables */
  --sticky-scroll-threshold: 100;
  --section-scroll-offset: 100;
}
```

---

## 6. Implementation Notes

### CSS Class Structure
```css
/* Main sticky menu container */
.sticky-menu {
  position: sticky;
  top: var(--sticky-menu-top);
  z-index: var(--sticky-menu-z-index);
  background-color: var(--sticky-menu-bg);
  height: var(--sticky-menu-height-desktop);
  transition: background-color 0.3s ease;
}

/* Menu items container */
.sticky-menu-nav {
  display: flex;
  gap: var(--sticky-menu-item-gap-desktop);
  align-items: center;
  height: 100%;
}

/* Individual menu items */
.sticky-menu-item {
  color: var(--sticky-menu-text-default);
  font-family: var(--sticky-menu-font-family);
  font-size: var(--sticky-menu-font-size-desktop);
  font-weight: var(--sticky-menu-font-weight);
  text-transform: var(--sticky-menu-text-transform);
  letter-spacing: var(--sticky-menu-letter-spacing);
  padding: var(--sticky-menu-item-padding-y) var(--sticky-menu-item-padding-x);
  transition: color 0.2s ease;
}

/* Dropdown container */
.sticky-dropdown {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background-color: var(--dropdown-bg);
  border: var(--dropdown-border-width) solid var(--dropdown-border-color);
  border-radius: var(--dropdown-border-radius);
  box-shadow: var(--dropdown-shadow);
  padding: var(--dropdown-padding);
  margin-top: var(--dropdown-margin-top);
  opacity: 0;
  visibility: hidden;
  transform: translateY(-10px);
  transition: 
    opacity var(--dropdown-transition-duration) var(--dropdown-transition-easing),
    visibility var(--dropdown-transition-duration) var(--dropdown-transition-easing),
    transform var(--dropdown-transition-duration) var(--dropdown-transition-easing);
}

/* Dropdown open state */
.sticky-dropdown.open {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}
```

### JavaScript Requirements
```javascript
// Section detection on scroll
const stickyMenu = document.querySelector('.sticky-menu');
const sections = document.querySelectorAll('section[id]');
const menuItems = document.querySelectorAll('.sticky-menu-item');

// Update active section on scroll
function updateActiveSection() {
  const scrollPosition = window.scrollY + parseInt(getComputedStyle(document.documentElement).getPropertyValue('--section-scroll-offset'));
  
  sections.forEach(section => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.offsetHeight;
    const sectionId = section.getAttribute('id');
    
    if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
      menuItems.forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('href') === `#${sectionId}`) {
          item.classList.add('active');
        }
      });
    }
  });
}

// Sticky background on scroll
window.addEventListener('scroll', () => {
  const scrollThreshold = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--sticky-scroll-threshold'));
  
  if (window.scrollY > scrollThreshold) {
    stickyMenu.classList.add('scrolled');
  } else {
    stickyMenu.classList.remove('scrolled');
  }
  
  updateActiveSection();
});

// Mobile menu toggle
const hamburger = document.querySelector('.hamburger-menu');
const dropdown = document.querySelector('.sticky-dropdown');

hamburger?.addEventListener('click', () => {
  dropdown.classList.toggle('open');
  hamburger.classList.toggle('active');
});
```

---

## 7. Responsive Adjustments

### Tablet Breakpoint (768-1149px)
```css
@media (min-width: 768px) and (max-width: 1149px) {
  .sticky-menu {
    padding: var(--sticky-menu-padding-y) var(--sticky-menu-padding-x-tablet);
  }
  
  .sticky-menu-nav {
    gap: var(--sticky-menu-item-gap-tablet);
  }
  
  .sticky-menu-item {
    font-size: var(--sticky-menu-font-size-tablet);
  }
}
```

### Mobile Breakpoint (<768px)
```css
@media (max-width: 767px) {
  .sticky-menu {
    height: var(--sticky-menu-height-mobile);
    padding: var(--sticky-menu-padding-y) var(--sticky-menu-padding-x-mobile);
  }
  
  .sticky-menu-nav {
    display: none; /* Hidden by default on mobile */
  }
  
  .hamburger-menu {
    display: block;
    width: var(--hamburger-width);
    height: var(--hamburger-height);
  }
  
  .sticky-menu-item {
    font-size: var(--sticky-menu-font-size-mobile);
  }
  
  .sticky-dropdown {
    position: fixed;
    top: var(--sticky-menu-height-mobile);
  }
}
```

---

## 8. Accessibility Considerations

### ARIA Attributes
```html
<!-- Main menu -->
<nav class="sticky-menu" role="navigation" aria-label="Page sections">
  <button class="hamburger-menu" 
          aria-expanded="false" 
          aria-controls="sticky-dropdown"
          aria-label="Toggle section menu">
    <!-- Hamburger icon -->
  </button>
  
  <!-- Desktop menu -->
  <ul class="sticky-menu-nav" role="menubar">
    <li role="none">
      <a href="#overview" 
         role="menuitem" 
         class="sticky-menu-item"
         aria-current="page">Overview</a>
    </li>
    <!-- Additional items -->
  </ul>
  
  <!-- Mobile dropdown -->
  <div id="sticky-dropdown" 
       class="sticky-dropdown" 
       role="menu"
       aria-hidden="true">
    <!-- Dropdown items -->
  </div>
</nav>
```

### Focus States
```css
.sticky-menu-item:focus,
.dropdown-item:focus {
  outline: 2px solid var(--color-accent-400);
  outline-offset: 2px;
}

.sticky-menu-item:focus:not(:focus-visible),
.dropdown-item:focus:not(:focus-visible) {
  outline: none;
}
```

---

## 9. Cross-Component References

### Parent Components Using Sticky Menu
- **Pillar Page Template** - Service/solution long-form pages
- **Interior Page Template** - May use for content-heavy pages

### Related Components
- **Menu/TopLevel (2225:578)** - Main site navigation
- **Banner/Header** - Contains primary navigation
- **Scroll-to-Top Button** - Complements sticky navigation

---

## 10. Testing Checklist

### Visual Testing
- [ ] Menu sticks to top on scroll at all breakpoints
- [ ] Background color changes on scroll past threshold
- [ ] Active section highlighting updates correctly
- [ ] Dropdown animation smooth on mobile
- [ ] All color states display correctly (hover, active, disabled)

### Functional Testing
- [ ] Smooth scroll to sections when clicking menu items
- [ ] Correct section detection with offset
- [ ] Mobile menu toggle works properly
- [ ] Keyboard navigation functional
- [ ] Touch interactions work on mobile devices

### Performance Testing
- [ ] No layout shift when menu becomes sticky
- [ ] Smooth scroll performance
- [ ] No flickering during state transitions

---

## Document History

- **v1.0** (October 24, 2025) - Initial documentation of Sticky Menu variables and tokens mapping

---

## Next Steps

1. **Integrate variables** into `variables-v2.0-20250915.css`
2. **Create component CSS files**:
   - `organisms-sticky-menu.css`
   - `molecules-sticky-dropdown.css`
3. **Implement JavaScript** for scroll detection and menu toggle
4. **Test in all templates** that use sticky navigation
5. **Validate against Figma** designs for accuracy

---

*End of Document*
