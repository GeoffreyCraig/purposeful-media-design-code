# Main Menu Component Variable & Token Mapping
## Purposeful Media Design System - Week 43

---

## Component Overview

The Main Menu is a responsive navigation component with comprehensive state management across all breakpoints. It serves as the primary navigation element within the Header organism.

### Component Variants Map

```
Main Menu Component Set: 
{
  "BreakPoint=DesktopPlus, State=Default": "2225:561",
  "BreakPoint=DesktopPlus, State=Hover1": "2225:579",
  "BreakPoint=DesktopPlus, State=Hover2": "2225:594",
  "BreakPoint=DesktopPlus, State=Hover3": "2225:611",
  "BreakPoint=DesktopPlus, State=Hover4": "2225:628",
  "BreakPoint=DesktopPlus, State=Active1": "2225:1096",
  "BreakPoint=DesktopPlus, State=Active2": "2225:1113",
  "BreakPoint=DesktopPlus, State=Active3": "2225:1130",
  "BreakPoint=DesktopPlus, State=Active4": "2225:1164",
  "BreakPoint=Desktop, State=Default": "2225:645",
  "BreakPoint=Desktop, State=Hover1": "2225:666",
  "BreakPoint=Desktop, State=Hover2": "2225:681",
  "BreakPoint=Desktop, State=Hover3": "2225:698",
  "BreakPoint=Desktop, State=Hover4": "2225:715",
  "BreakPoint=Desktop, State=Active1": "2225:1181",
  "BreakPoint=Desktop, State=Active2": "2225:1198",
  "BreakPoint=Desktop, State=Active3": "2225:1215",
  "BreakPoint=Desktop, State=Active4": "2225:1232",
  "BreakPoint=Tablet, State=Default": "2603:10584",
  "BreakPoint=Tablet, State=TouchHover": "2606:1117",
  "BreakPoint=Tablet, State=TouchActive": "2606:1138",
  "BreakPoint=Tablet, State=TouchClose": "2606:1159",
  "BreakPoint=Mobile, State=Default": "2607:1180",
  "BreakPoint=Mobile, State=TouchHover": "2607:1201",
  "BreakPoint=Mobile, State=TouchActive": "2607:1222",
  "BreakPoint=Mobile, State=TouchClose": "2607:1243"
}
```

---

## CSS Variable Mapping

### Color Variables

| Figma Variable | Maps To | CSS Variable | Hex Value | Usage |
|----------------|---------|--------------|-----------|--------|
| `--brand` | Background | `--color-primary-700` | #1b1464 | Navigation background (Primary Navy Blue) |
| `--menusimple` | Default text | `--link-menu` | #ffffff | Default menu item text color (White) |
| `--hoversimple` | Hover text | `--link-hover` | #dcbe5d | Hover state text color (Accent Gold 400) |
| `--activesimple` | Active text | `--link-active` | #b39226 | Active/current page text color (Accent Gold 600) |

### Spacing Variables

| Figma Variable | Maps To | Value | Usage |
|----------------|---------|-------|--------|
| `--space-0` | No spacing | 0px | Container padding |
| `--space-3` | Small gap | 12px | Gap between menu items (Desktop only) |
| `--space-5` | Medium gap | 20px | Mobile menu button internal spacing |

### Typography Token

| Token Name | Properties | Application |
|------------|------------|-------------|
| `H2 Headline 30 45h` | Font: Lato Heavy<br>Size: 30px<br>Line Height: 45px<br>Weight: 800<br>Transform: UPPERCASE | All menu item text across all breakpoints |

---

## Breakpoint-Specific Implementation

### Desktop & DesktopPlus (1150px+)

**Structure:**
- Horizontal menu layout
- Four menu items: Home, Solutions, Resources, Contact
- Full text navigation visible
- Flex container with `justify-between`

**Interactive States:**
- **Default:** All items use `--link-menu` (white)
- **Hover (1-4):** Individual item hover uses `--link-hover` (gold #dcbe5d)
- **Active (1-4):** Current page item uses `--link-active` (darker gold #b39226)

**Special Features:**
- Home item includes text-shadow in default state: `rgba(0,0,0,0.25) 0px 4px 4px`
- Solutions and Resources items contain nested dropdown containers

### Tablet (768-1149px)

**Structure:**
- Hamburger menu icon replaces text navigation
- Centered icon with 64px gap
- Icon container: 54px width

**Icon Specifications:**
- SVG dimensions: 45.135px × 53px
- Source: `/assets/svg/ui-icons/purposeful-sprite-ui.svg`
- Reference: Use sprite position from `purposeful-ui-sprite.txt`

**Interactive States:**
- **Default:** Hamburger icon visible
- **TouchHover:** Visual feedback on touch
- **TouchActive:** Active touch state
- **TouchClose:** Close (X) icon state

### Mobile (380-767px)

**Structure:**
- Compact hamburger menu icon
- Centered icon with 64px gap
- Container: 54px × 45px

**Icon Specifications:**
- SVG dimensions: 37.65px × 18.994px
- Source: `/assets/svg/ui-icons/purposeful-sprite-ui.svg`
- Reference: Use sprite position from `purposeful-ui-sprite.txt`

**Interactive States:**
- Same as tablet (Default, TouchHover, TouchActive, TouchClose)

---

## Component Structure

### Desktop/DesktopPlus HTML Structure

```html
<nav class="main-menu">
  <!-- Home - Simple Link -->
  <a href="/" class="menu-item menu-item--home">HOME</a>
  
  <!-- Solutions - Dropdown Trigger -->
  <div class="menu-item menu-item--dropdown">
    <span class="menu-text">SOLUTIONS</span>
    <!-- Dropdown container attached here -->
  </div>
  
  <!-- Resources - Dropdown Trigger -->
  <div class="menu-item menu-item--dropdown">
    <span class="menu-text">RESOURCES</span>
    <!-- Dropdown container attached here -->
  </div>
  
  <!-- Contact - Simple Link -->
  <a href="/contact" class="menu-item">CONTACT</a>
</nav>
```

### Tablet/Mobile HTML Structure

```html
<nav class="main-menu main-menu--mobile">
  <button class="menu-toggle" aria-label="Menu" aria-expanded="false">
    <svg class="menu-icon menu-icon--open">
      <use href="/assets/svg/ui-icons/purposeful-sprite-ui.svg#menu-open"></use>
    </svg>
    <svg class="menu-icon menu-icon--close">
      <use href="/assets/svg/ui-icons/purposeful-sprite-ui.svg#menu-close"></use>
    </svg>
  </button>
</nav>
```

---

## CSS Implementation

### Core Styles

```css
/* Menu Container */
.main-menu {
  background-color: var(--color-primary-700); /* #1b1464 */
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: var(--space-0);
  width: 100%;
  height: 100%;
}

/* Menu Items - Desktop */
.menu-item {
  color: var(--link-menu); /* #ffffff */
  font-family: 'Lato', sans-serif;
  font-weight: 800;
  font-size: 30px;
  line-height: 45px;
  text-transform: uppercase;
  text-decoration: none;
  white-space: nowrap;
  transition: color 0.3s ease;
}

/* Hover State */
.menu-item:hover {
  color: var(--link-hover); /* #dcbe5d */
}

/* Active/Current Page State */
.menu-item.active,
.menu-item--active {
  color: var(--link-active); /* #b39226 */
}

/* Home Item Special Shadow */
.menu-item--home {
  text-shadow: 
    rgba(0, 0, 0, 0.25) 0px 4px 4px,
    rgba(0, 0, 0, 0.25) 0px 4px 4px;
}

/* Dropdown Container */
.menu-item--dropdown {
  display: flex;
  flex-direction: column;
  gap: 10px;
  position: relative;
  cursor: pointer;
}

/* Mobile Menu Toggle */
@media (max-width: 1149px) {
  .main-menu {
    justify-content: center;
    gap: 64px;
  }
  
  .menu-item {
    display: none;
  }
  
  .menu-toggle {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 54px;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: var(--space-0);
  }
  
  .menu-icon {
    width: 100%;
    height: auto;
  }
  
  .menu-icon--close {
    display: none;
  }
  
  .menu-toggle[aria-expanded="true"] .menu-icon--open {
    display: none;
  }
  
  .menu-toggle[aria-expanded="true"] .menu-icon--close {
    display: block;
  }
}

/* Mobile Specific Sizing */
@media (max-width: 767px) {
  .menu-toggle {
    height: 45px;
  }
}
```

---

## Integration Notes

### Dropdown Menu Integration
The Main Menu component connects to separate dropdown components:
- **Desktop Dropdown Card**: Triggered on hover for Solutions/Resources
- **Tablet Dropdown Card**: Full-width overlay on menu open
- **Mobile Dropdown Accordion**: Expandable accordion items

### JavaScript Requirements
1. **Desktop**: Hover event listeners for dropdown triggers
2. **Tablet/Mobile**: Click handler for menu toggle
3. **Mobile Accordion**: Expand/collapse functionality
4. **Focus Management**: Keyboard navigation support
5. **ARIA Updates**: Update aria-expanded on state changes

### Asset Dependencies
- **Sprite Sheet**: `/assets/svg/ui-icons/purposeful-sprite-ui.svg`
- **Sprite Positions**: `/assets/svg/ui-icons/purposeful-ui-sprite.txt`
- **Font**: Lato Heavy (Google Fonts or local)

---

## State Management

### Desktop States
| State | Trigger | Visual Change |
|-------|---------|---------------|
| Default | Page load | White text on navy background |
| Hover1-4 | Mouse over item | Individual item turns gold |
| Active1-4 | Current page | Item shows darker gold |

### Mobile/Tablet States
| State | Trigger | Visual Change |
|-------|---------|---------------|
| Default | Page load | Hamburger icon visible |
| TouchHover | Touch start | Visual feedback |
| TouchActive | Touch hold | Active indication |
| TouchClose | Menu open | X icon replaces hamburger |

---

## Accessibility Considerations

1. **ARIA Labels**: All interactive elements have proper labels
2. **Keyboard Navigation**: Full keyboard support for desktop menu
3. **Focus States**: Visible focus indicators for keyboard users
4. **Screen Readers**: Proper semantic markup and ARIA attributes
5. **Touch Targets**: Minimum 44×44px touch targets on mobile

---

## WordPress Integration

### Menu Registration
```php
// In functions.php
register_nav_menus(array(
    'primary' => __('Primary Menu', 'purposeful-media'),
    'mobile' => __('Mobile Menu', 'purposeful-media'),
));
```

### Dynamic Menu Output
```php
// Desktop menu
wp_nav_menu(array(
    'theme_location' => 'primary',
    'container' => 'nav',
    'container_class' => 'main-menu',
    'menu_class' => 'menu-items',
    'walker' => new Purposeful_Menu_Walker(),
));
```

---

## Performance Optimization

1. **SVG Sprites**: Single HTTP request for all icons
2. **CSS Variables**: Centralized color management
3. **Minimal JavaScript**: Only essential interactions
4. **GPU Acceleration**: Transform and opacity for animations
5. **Lazy Loading**: Dropdown content loaded on demand

---

## Desktop Dropdown Card Component

### Component Variants Map

```
Desktop Dropdown Card Component Set:
{
  "State=Default, Drop Down=Default": "2129:3901",
  "State=Hover1, Drop Down=Default": "2130:78",
  "State=Hover2, Drop Down=Default": "2130:87",
  "State=Hover3, Drop Down=Default": "2130:97",
  "State=Active1, Drop Down=Default": "2130:107",
  "State=Active2, Drop Down=Default": "2130:118",
  "State=Active3, Drop Down=Default": "2130:129",
  "State=Disabled, Drop Down=Default": "2130:140",
  "State=Default, Drop Down=Solutions": "2161:7652",
  "State=Hover1, Drop Down=Solutions": "2165:7660",
  "State=Hover2, Drop Down=Solutions": "2165:7668",
  "State=Hover3, Drop Down=Solutions": "2165:7679",
  "State=Active1, Drop Down=Solutions": "2165:7697",
  "State=Active2, Drop Down=Solutions": "2165:7708",
  "State=Active3, Drop Down=Solutions": "2166:7732",
  "State=Disabled, Drop Down=Solutions": "2166:7721",
  "State=Default, Drop Down=Resources": "2166:7743",
  "State=Hover1, Drop Down=Resources": "2166:7751",
  "State=Hover2, Drop Down=Resources": "2166:7759",
  "State=Hover3, Drop Down=Resources": "2166:7767",
  "State=Active1, Drop Down=Resources": "2166:7775",
  "State=Active2, Drop Down=Resources": "2166:7783",
  "State=Active3, Drop Down=Resources": "2166:7791",
  "State=Disabled, Drop Down=Resources": "2166:7799"
}
```

### Dropdown CSS Variable Mapping

| Figma Variable | Maps To | CSS Variable | Hex Value | Usage |
|----------------|---------|--------------|-----------|--------|
| `--secondary` | Container BG (Default) | `--color-neutral-100` | #eceeef | Default dropdown background |
| `--100` (Accent) | Container BG (Hover) | `--color-accent-100` | #f4ebcd | Hover state background (light gold) |
| `--100` (Success) | Container BG (Active) | `--color-success-100` | #d7f5f5 | Active state background (light teal) |
| `--menudrop` | Default text | `--link-dropdown` | #1b1464 | Default dropdown item text (navy) |
| `--hoverdrop` | Hover text | `--link-dropdown-hover` | #1d50de | Hover dropdown item text (bright blue) |
| `--activedrop` | Active text | `--link-dropdown-active` | #06102b | Active dropdown item text (dark navy) |
| `--menudisabled` | Disabled text | `--link-dropdown-disabled` | #868f97 | Disabled/inactive items (gray) |

### Dropdown Spacing & Layout

| Property | Value | Usage |
|----------|-------|--------|
| Padding | 32px (top/bottom), 32px (left), 64px (right) | Container internal spacing |
| Gap | 16px | Space between menu items |
| Border Radius | 8px | Rounded corners |
| Shadow | 4px 4px 12px rgba(0,0,0,0.1) | Subtle drop shadow |

### Typography

| Token | Properties | Application |
|-------|------------|-------------|
| Dropdown Text | Font: Lato Heavy<br>Size: 21px<br>Line Height: 30.5px<br>Weight: 800 | All dropdown menu items |
| Text Transform | None (sentence case) | Unlike main menu, no uppercase |
| Text Decoration | Underline on hover only | Hover state indicator |

### Dropdown State Behaviors

#### Default State
- Background: `--color-neutral-100` (#eceeef - light gray)
- All items: `--link-dropdown` (#1b1464 - navy)
- No underlines

#### Hover States (Hover1, Hover2, Hover3)
- Background: `--color-accent-100` (#f4ebcd - light gold)
- Hovered item: `--link-dropdown-hover` (#1d50de - bright blue) with underline
- Other items: `--link-dropdown` (#1b1464 - navy)

#### Active States (Active1, Active2, Active3)
- Background: `--color-success-100` (#d7f5f5 - light teal)
- Active item: `--link-dropdown-active` (#06102b - dark navy)
- Other items: `--link-dropdown-disabled` (#868f97 - gray)

#### Disabled State
- Background: `--color-neutral-100` (#eceeef)
- All items: `--link-dropdown-disabled` (#868f97 - gray)
- No hover effects

### HTML Structure

```html
<div class="dropdown-card dropdown-card--solutions">
  <div class="dropdown-links">
    <a href="/email-management" class="dropdown-item">
      Email Management
    </a>
    <a href="/content-creation" class="dropdown-item">
      Content Creation
    </a>
    <a href="/webinar-production" class="dropdown-item">
      Webinar Production
    </a>
  </div>
</div>
```

### CSS Implementation

```css
/* Dropdown Card Container */
.dropdown-card {
  background-color: var(--color-neutral-100); /* #eceeef */
  border-radius: 8px;
  box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.1);
  padding: 32px 64px 32px 32px;
  position: absolute;
  top: 100%;
  left: 0;
  margin-top: 8px;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease, visibility 0.3s ease;
  z-index: 1000;
}

/* Dropdown visible state */
.menu-item--dropdown:hover .dropdown-card,
.dropdown-card:hover {
  opacity: 1;
  visibility: visible;
}

/* Dropdown Links Container */
.dropdown-links {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

/* Dropdown Items */
.dropdown-item {
  color: var(--link-dropdown); /* #1b1464 */
  font-family: 'Lato', sans-serif;
  font-weight: 800;
  font-size: 21px;
  line-height: 30.5px;
  text-decoration: none;
  white-space: nowrap;
  transition: color 0.3s ease;
}

/* Dropdown Item Hover */
.dropdown-item:hover {
  color: var(--link-dropdown-hover); /* #1d50de */
  text-decoration: underline;
  text-underline-position: from-font;
}

/* Dropdown with hover background */
.dropdown-card--hover {
  background-color: var(--color-accent-100); /* #f4ebcd */
}

/* Active dropdown state */
.dropdown-card--active {
  background-color: var(--color-success-100); /* #d7f5f5 */
}

.dropdown-card--active .dropdown-item--active {
  color: var(--link-dropdown-active); /* #06102b */
}

.dropdown-card--active .dropdown-item:not(.dropdown-item--active) {
  color: var(--link-dropdown-disabled); /* #868f97 */
}

/* Disabled dropdown state */
.dropdown-card--disabled .dropdown-item {
  color: var(--link-dropdown-disabled); /* #868f97 */
  pointer-events: none;
}
```

### JavaScript Interaction

```javascript
// Dropdown hover management
document.querySelectorAll('.menu-item--dropdown').forEach(item => {
  const dropdown = item.querySelector('.dropdown-card');
  
  // Track which dropdown item is being hovered
  dropdown.querySelectorAll('.dropdown-item').forEach((link, index) => {
    link.addEventListener('mouseenter', () => {
      dropdown.classList.add('dropdown-card--hover');
      // Update parent menu item hover state
      item.classList.add(`hover${index + 1}`);
    });
  });
  
  dropdown.addEventListener('mouseleave', () => {
    dropdown.classList.remove('dropdown-card--hover');
  });
});
```

### Integration with Main Menu

1. **Positioning**: Dropdown cards appear directly below their parent menu item
2. **Trigger**: Hover on "Solutions" or "Resources" menu items
3. **Persistence**: Dropdown remains visible while hovering dropdown or parent
4. **Z-index**: Dropdown appears above other page content (z-index: 1000)

### Accessibility Considerations

1. **Keyboard Navigation**: 
   - Tab through dropdown items
   - Escape key closes dropdown
   - Arrow keys navigate within dropdown

2. **ARIA Attributes**:
   ```html
   <div class="menu-item--dropdown" aria-haspopup="true" aria-expanded="false">
     <span class="menu-text">Solutions</span>
     <div class="dropdown-card" role="menu" aria-label="Solutions menu">
       <a href="#" role="menuitem">Email Management</a>
     </div>
   </div>
   ```

3. **Focus Management**: Trap focus within dropdown when open via keyboard

### WordPress Dynamic Menu Integration

```php
// Custom walker for dropdown structure
class Purposeful_Dropdown_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<div class="dropdown-card"><div class="dropdown-links">';
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</div></div>';
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        if ($depth === 0 && in_array('menu-item-has-children', $item->classes)) {
            $output .= '<div class="menu-item menu-item--dropdown">';
            $output .= '<span class="menu-text">' . $item->title . '</span>';
        } else {
            $classes = $depth > 0 ? 'dropdown-item' : 'menu-item';
            $output .= '<a href="' . $item->url . '" class="' . $classes . '">';
            $output .= $item->title;
            $output .= '</a>';
        }
    }
}
```

---

## Testing Checklist

### Main Menu Tests
- [ ] Desktop menu displays correctly at 1150px+
- [ ] Tablet hamburger appears at 768-1149px
- [ ] Mobile hamburger sizing correct at <768px
- [ ] Hover states work on desktop
- [ ] Active states indicate current page
- [ ] Touch states work on mobile/tablet
- [ ] Menu colors use correct CSS variables
- [ ] Typography matches H2 token specifications
- [ ] Icons load from sprite sheet

### Dropdown Tests
- [ ] Dropdown appears on hover (Solutions/Resources)
- [ ] Dropdown background colors change correctly
- [ ] Item hover states show blue text with underline
- [ ] Active states show correct color combinations
- [ ] Dropdown positioning is correct
- [ ] Shadow and border radius applied
- [ ] Keyboard navigation works
- [ ] ARIA attributes update correctly
- [ ] Focus management works properly
- [ ] Escape key closes dropdown

---

## Tablet Dropdown Card Component

### Component Variants Map

```
Tablet Dropdown Card Component Set:
{
  "Size=Card, State=Default": "2552:8566",
  "Size=Card, State=Hover1": "2561:1061",
  "Size=Card, State=Hover2": "2561:1105",
  "Size=Card, State=Hover3": "2561:1151",
  "Size=Card, State=Hover4": "2561:1197",
  "Size=Card, State=Hover5": "2561:1243",
  "Size=Card, State=Hover6": "2561:1289",
  "Size=Card, State=Hover7": "2561:1335",
  "Size=Card, State=Hover8": "2561:1381"
}
```

### Tablet Dropdown Structure

The tablet dropdown is a full-screen overlay that shows ALL menu items at once, including:
- **Home** (parent + sub-item if applicable)
- **Solutions** (parent + 3 sub-items)
- **Resources** (parent + 3 sub-items)  
- **Contact** (parent + sub-item if applicable)

### Tablet-Specific Variables & Layout

| Property | Value | Difference from Desktop |
|----------|-------|------------------------|
| Container Width | Full viewport width | vs. Auto width on desktop |
| Padding | 20px T/B, 24px L, 16px R | Smaller than desktop |
| Gap (sections) | 20px | vs. 16px on desktop |
| Gap (items) | 10px | Same as desktop |
| Min Height | 44px per item | Ensures touch-friendly sizing |
| Border Radius | 8px | Same as desktop |
| Shadow | 4px 4px 12px rgba(0,0,0,0.1) | Same as desktop |

### Typography Hierarchy

| Element | Token | Properties |
|---------|-------|------------|
| Parent Items | H2 Headline 30 45h | Lato Heavy, 30px/45px, UPPERCASE |
| Sub Items | Dropdown Text | Lato Heavy, 21px/30.5px, Sentence case |

### Tablet CSS Implementation

```css
/* Tablet Dropdown Overlay */
@media (min-width: 768px) and (max-width: 1149px) {
  .mobile-menu-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
  }
  
  .mobile-menu-overlay.active {
    opacity: 1;
    visibility: visible;
  }
  
  .tablet-dropdown-card {
    background-color: var(--color-neutral-100); /* #eceeef */
    border-radius: 8px;
    box-shadow: 4px 4px 12px rgba(0, 0, 0, 0.1);
    padding: 20px 16px 20px 24px;
    position: absolute;
    top: 80px; /* Below header */
    left: 50%;
    transform: translateX(-50%);
    width: calc(100vw - 40px);
    max-width: 700px;
    max-height: calc(100vh - 100px);
    overflow-y: auto;
  }
  
  .tablet-menu-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
    padding: 10px;
  }
  
  .tablet-menu-section {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  
  .tablet-menu-heading {
    color: var(--link-dropdown); /* #1b1464 */
    font-family: 'Lato', sans-serif;
    font-weight: 800;
    font-size: 30px;
    line-height: 45px;
    text-transform: uppercase;
    min-height: 44px;
    display: flex;
    align-items: center;
  }
  
  .tablet-menu-item {
    color: var(--link-dropdown); /* #1b1464 */
    font-family: 'Lato', sans-serif;
    font-weight: 800;
    font-size: 21px;
    line-height: 30.5px;
    min-height: 44px;
    display: flex;
    align-items: center;
    padding-left: 20px; /* Indent sub-items */
    text-decoration: none;
    transition: color 0.3s ease;
  }
  
  /* Hover state */
  .tablet-dropdown-card--hover {
    background-color: var(--color-accent-100); /* #f4ebcd */
  }
  
  .tablet-menu-item:hover {
    color: var(--link-dropdown-hover); /* #1d50de */
    text-decoration: underline;
    text-underline-position: from-font;
  }
}
```

---

## Mobile Dropdown Accordion Component

### Component Variants Map

```
Mobile Dropdown Accordion Component Set:
{
  "Size=Accordion, State=Default": "2561:1566",
  "Size=Accordion, State=Hover1": "2601:8874",
  "Size=Accordion, State=Hover2": "2601:8918",
  "Size=Accordion, State=Hover3": "2601:8964",
  "Size=Accordion, State=Hover4": "2601:9010",
  "Size=Accordion, State=Hover5": "2601:9056",
  "Size=Accordion, State=Hover6": "2601:9102",
  "Size=Accordion, State=Hover7": "2602:9148",
  "Size=Accordion, State=Hover8": "2602:9194"
}
```

### Mobile Accordion Structure

The mobile accordion shows expandable/collapsible sections:
- **Accordion headers** (Home, Solutions, Resources, Contact)
- **Accordion content** (sub-items revealed on expand)
- Only one section expanded at a time

### Mobile-Specific Layout

| Property | Value | Purpose |
|----------|-------|---------|
| Container Width | Full viewport width | Maximizes mobile space |
| Padding | 20px T/B, 24px L, 16px R | Comfortable touch margins |
| Gap (sections) | 20px | Clear section separation |
| Gap (items) | 10px | Compact but readable |
| Min Height | 44px | iOS/Android touch target |
| No Border Radius | 0px | Full-width mobile pattern |
| No Shadow | None | Flat mobile aesthetic |

### Mobile Accordion Behavior

#### Collapsed State
- Shows only parent items (Home, Solutions, Resources, Contact)
- Plus/minus icon or chevron indicator
- Background: `--color-neutral-100` (#eceeef)

#### Expanded State
- Shows parent + all sub-items
- Smooth height animation
- Same color scheme as tablet

#### Touch States
- Immediate visual feedback on touch
- No hover states (touch devices)
- Active state shows tap feedback

### Mobile CSS Implementation

```css
/* Mobile Accordion */
@media (max-width: 767px) {
  .mobile-accordion {
    background-color: var(--color-neutral-100); /* #eceeef */
    padding: 20px 16px 20px 24px;
    width: 100%;
    position: fixed;
    top: 60px; /* Below mobile header */
    left: 0;
    height: calc(100vh - 60px);
    overflow-y: auto;
    transform: translateX(-100%);
    transition: transform 0.3s ease;
    z-index: 999;
  }
  
  .mobile-accordion.active {
    transform: translateX(0);
  }
  
  .accordion-section {
    border-bottom: 1px solid var(--color-neutral-200);
    padding: 10px 0;
  }
  
  .accordion-header {
    color: var(--link-dropdown); /* #1b1464 */
    font-family: 'Lato', sans-serif;
    font-weight: 800;
    font-size: 30px;
    line-height: 45px;
    text-transform: uppercase;
    min-height: 44px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    user-select: none;
  }
  
  .accordion-icon {
    width: 24px;
    height: 24px;
    transition: transform 0.3s ease;
  }
  
  .accordion-section.expanded .accordion-icon {
    transform: rotate(180deg);
  }
  
  .accordion-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
  }
  
  .accordion-section.expanded .accordion-content {
    max-height: 500px; /* Adjust based on content */
  }
  
  .accordion-item {
    color: var(--link-dropdown); /* #1b1464 */
    font-family: 'Lato', sans-serif;
    font-weight: 800;
    font-size: 21px;
    line-height: 30.5px;
    min-height: 44px;
    display: flex;
    align-items: center;
    padding-left: 20px;
    text-decoration: none;
  }
  
  /* Touch feedback */
  .accordion-header:active,
  .accordion-item:active {
    opacity: 0.7;
  }
  
  /* Expanded with hover background */
  .mobile-accordion--hover {
    background-color: var(--color-accent-100); /* #f4ebcd */
  }
  
  .accordion-item.active {
    color: var(--link-dropdown-active); /* #06102b */
  }
}
```

### JavaScript for Mobile Accordion

```javascript
// Mobile Accordion Functionality
class MobileAccordion {
  constructor() {
    this.sections = document.querySelectorAll('.accordion-section');
    this.init();
  }
  
  init() {
    this.sections.forEach(section => {
      const header = section.querySelector('.accordion-header');
      
      header.addEventListener('click', () => {
        this.toggleSection(section);
      });
    });
  }
  
  toggleSection(targetSection) {
    // Close all other sections
    this.sections.forEach(section => {
      if (section !== targetSection && section.classList.contains('expanded')) {
        section.classList.remove('expanded');
      }
    });
    
    // Toggle target section
    targetSection.classList.toggle('expanded');
    
    // Update ARIA
    const isExpanded = targetSection.classList.contains('expanded');
    targetSection.querySelector('.accordion-header')
      .setAttribute('aria-expanded', isExpanded);
  }
  
  closeAll() {
    this.sections.forEach(section => {
      section.classList.remove('expanded');
    });
  }
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
  new MobileAccordion();
});
```

---

## Responsive Navigation Summary

### Variable Consistency Across All Breakpoints

| Variable Type | Desktop | Tablet | Mobile |
|--------------|---------|--------|--------|
| Background Colors | Same CSS variables | Same | Same |
| Text Colors | Same CSS variables | Same | Same |
| Hover Effects | Yes | Yes (limited) | No (touch only) |
| Typography | Consistent tokens | Same | Same |

### Key Differences by Breakpoint

| Feature | Desktop | Tablet | Mobile |
|---------|---------|--------|--------|
| Layout | Horizontal bar | Full overlay card | Accordion drawer |
| Trigger | Hover | Hamburger tap | Hamburger tap |
| Display | Partial (dropdowns) | All items visible | Collapsible sections |
| Animation | Fade in/out | Slide + fade | Slide + expand |
| Scrolling | No | Yes (if needed) | Yes |
| Touch targets | N/A | 44px minimum | 44px minimum |

### Performance Considerations

1. **CSS Variables**: Single source of truth for all colors
2. **Sprite Sheets**: Single HTTP request for all icons
3. **Lazy Loading**: Mobile/tablet menus only in DOM when needed
4. **Hardware Acceleration**: Transform for animations
5. **Touch Optimization**: Passive event listeners for scroll performance

---

## Complete Testing Checklist

### Desktop Navigation Tests
- [ ] Main menu displays horizontally at 1150px+
- [ ] All menu items visible and properly spaced
- [ ] Hover states trigger on mouse over
- [ ] Active page highlighted correctly
- [ ] Dropdowns appear on Solutions/Resources hover
- [ ] Dropdown positioning below parent item
- [ ] Dropdown hover states working
- [ ] Keyboard navigation functional

### Tablet Navigation Tests (768-1149px)
- [ ] Hamburger icon appears
- [ ] Tap opens full menu overlay
- [ ] All menu sections visible in card
- [ ] Touch targets minimum 44px
- [ ] Scroll works if content exceeds viewport
- [ ] Close button or backdrop tap closes menu
- [ ] Item hover states work (if device supports)
- [ ] Background color changes on interaction

### Mobile Navigation Tests (<768px)
- [ ] Hamburger icon sized correctly
- [ ] Tap opens accordion drawer
- [ ] Accordion headers clearly tappable
- [ ] Expand/collapse animations smooth
- [ ] Only one section open at a time
- [ ] Sub-items properly indented
- [ ] Scroll works within drawer
- [ ] Swipe or backdrop tap closes drawer

### Cross-Device Tests
- [ ] CSS variables apply consistently
- [ ] Typography scales appropriately
- [ ] Colors match design system
- [ ] Icons load from sprite sheet
- [ ] No horizontal scroll on any device
- [ ] Touch events don't conflict with mouse
- [ ] Accessibility features work on all devices
- [ ] Performance acceptable on low-end devices
