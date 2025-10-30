# Purposeful Media Promotions - Claude Code Context

## Project Overview
Tokenizing Design System components to eliminate all inline styles and enforce consistent variable usage across HTML/CSS/JS files.

## Critical File Paths
**Working Directory:** `/Users/geoffreycraig/Library/CloudStorage/Dropbox/PURPOSEFUL MEDIA PROMOTIONS/WEBSITE PROJECT/Development Files/`

**Key Resources:**
- Variables (SOURCE OF TRUTH): `/styles/variables-v4.0-20251027.css`
- Variables mapping docs: `/variables/`
- Icon demo reference: `/components/molecules/decorative-icon-display.html`

**Sprite Sheets:**
- UI Icons: `/assets/svg/ui-icons/purposeful-sprite-ui.svg`
- UI Icon positions: `/assets/svg/ui-icons/purposeful-ui-sprite.txt`
- Decorative Icons: `/assets/svg/decorative-icons/purposeful-sprite-symbolic.svg`
- Decorative Icon positions: `/assets/svg/decorative-icons/decorative-icons-positions.json`

**Directory Structure:**
- `/assets/` - SVGs and images
- `/scripts/` - JavaScript files
- `/styles/` - CSS files
- `/components/` - HTML component files (molecules, organisms, templates)

## Responsive Breakpoints
- **Mobile:** 380-767px
- **Tablet:** 768-1149px
- **Desktop:** 1150-1919px
- **DesktopPlus:** 1920px and wider

## Design System Hierarchy
Following Brad Frost's Atomic Design:
Atoms → Molecules → Organisms → Templates → Code → WordPress Theme → Published Pages

## Strict Rules for Placeholder Text
We are building templates today, NOT website pages. You will be given content sources, whether as a prompt, copy that is part of HTML code, or some other format containing placeholder text (e.g., Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua, etc.).

Your task is implementation only! Refrain from adaptation as follows:
* Never change, rewrite, elaborate, or fill in any placeholder text, regardless of context or perceived incompleteness.
* If you encounter placeholder text, always reproduce it exactly as provided, without alteration.
* Do not generate, suggest, or infer new content for any placeholder or prescribe content outside the placeholders.
* If unsure about a section due to a placeholder, respond: "This section contains placeholder text. No substitution or generated content is permitted."

Rationale: The placeholder content is explicitly reserved for future manual editing. Strictly preserve it to maintain workflow integrity.

**Current Phase:** Tokenizing Molecules and Organisms

## Tokenization Rules (MANDATORY)

### Zero Inline Styles Policy
- NO inline `style=""` attributes in HTML
- NO style variables in HTML files
- NO CSS selectors in HTML files
- ALL styling must reference variables from `variables-v4.0-20251027.css`

### Variable Usage Requirements
1. Check variables file FIRST before creating any new variables
2. Use existing variables whenever possible
3. If new variable needed, follow existing naming conventions
4. Document any new variables added to the system

### CSS Class Naming
- Use semantic, component-based names
- Follow existing patterns in the design system
- Maintain consistency with Atomic Design hierarchy

### Icon Implementation
- Use sprite sheet references only
- Apply positioning via CSS variables
- Never inline SVG code unless absolutely necessary
- Reference positioning data from .txt or .json files

## Sprite Sheet Implementation Details

**Reference File:** `/components/molecules/decorative-icon-display.html` for working implementation pattern

### Icon Display Method (Used for ALL Icons)
This project uses **CSS background-image positioning with data attributes**, NOT SVG `<use>` elements.

**HTML Structure:**
```html
<div class="decorative-icon-display decorative-icon-display--medium" data-icon="email" data-color="navy"></div>
```

**How It Works:**
1. HTML element uses `data-icon` and `data-color` attributes
2. JavaScript (or CSS attribute selectors) applies appropriate class: `icon--email-navy`
3. CSS class applies background-image with precise positioning from sprite sheet
4. Size controlled via modifier classes: `decorative-icon-display--small`, `--medium`, `--large`, `--xlarge`

**CSS Pattern:**
```css
.icon--email-navy {
    background-image: url('/assets/svg/decorative-icons/purposeful-sprite-symbolic.svg');
    background-position: var(--icon-email-x) var(--icon-email-y);
    background-size: [sprite-sheet-width] [sprite-sheet-height];
}
```

### Decorative Icons (Symbolic/Visual)
**Purpose:** Visual storytelling, section decoration, thematic elements
**File:** `/assets/svg/decorative-icons/purposeful-sprite-symbolic.svg`
**Position Data:** `/assets/svg/decorative-icons/decorative-icons-positions.json`

**Available Icons:** accelerate, attract, contact, delight, download, efficiency, email, engage, exit, expertise, inbound, momentum, news, persona, professional, roi, schedule, strategy, unit, value, webinar

**Size Classes:**
- `decorative-icon-display--small` - 30px × 30px
- `decorative-icon-display--medium` - 60px × 60px
- `decorative-icon-display--large` - 90px × 90px
- `decorative-icon-display--xlarge` - 120px × 120px
- `decorative-icon-display--xxlarge` - 256px × 256px (pillar pages, hero sections)

**Color Variants:**
- `data-color="navy"` - Navy blue (#1B1464)
- `data-color="gray"` - Gray (#6C757D)
- `data-color="dark"` - Dark (#54595F)
- `data-color="white"` - White (#FFFFFF)

### UI Icons (Navigation/Interface)
**Purpose:** Interactive elements, navigation, form controls, UI feedback
**File:** `/assets/svg/ui-icons/purposeful-sprite-ui.svg`
**Position Data:** `/assets/svg/ui-icons/purposeful-ui-sprite.txt`

**Same implementation method** as decorative icons - use background-image positioning, NOT `<use>` elements.

### Tokenization Rules for Icons
- Use `<div>` elements with `decorative-icon-display` class, NOT `<svg>` elements
- Apply `data-icon` and `data-color` attributes in HTML
- Size via modifier class: `decorative-icon-display--[size]`
- All positioning and styling in CSS via background-image properties
- Reference positioning data from JSON/TXT files for CSS variables
- Never inline background-image styles - use CSS classes only

**Accessibility:**
- Add `role="img"` and `aria-label` for meaningful icons
- Use `aria-hidden="true"` for purely decorative icons

**Performance Notes:**
- Sprite sheets loaded once, cached by browser
- Background-image method allows CSS filters and transforms
- Position data from JSON enables precise CSS variable mapping

## Quality Standards
- "We don't cut corners, we don't make excuses"
- Every component must work across all four breakpoints
- Maintain accessibility standards
- Test rendering before marking complete

## Workflow Pattern
1. Review component HTML file
2. Identify all inline styles and embedded CSS
3. Map to existing variables in variables-v4.0-20251027.css
4. Extract styles to appropriate CSS file
5. Update HTML to use only classes
6. Verify rendering matches original
7. Document any new variables created

## Files Currently Being Tokenized
[Track progress here as you work through components]
- [x] Molecule: return-button-demo.html (COMPLETED)
- [x] Molecule: decorative-display.html (COMPLETED)
- [x] Molecule: ui-icon-display.html (COMPLETED)
- [x] Molecule: card-paragraph-options.html (COMPLETED)
- [x] Molecule: card-bannerspacer-headlinesubtitle.html (COMPLETED)
- [x] Molecule: card-blogpost.html (COMPLETED - tokenized and consolidated)
- [x] Molecule: header-dropdown-menu.html (ARCHIVED - redundant, menu integrated in banner-header organism)
- [x] Molecule: slide-hero.html (ARCHIVED - redundant, slides integrated in hero-carousel organism)
- [x] Molecule: slide-video.html (ARCHIVED - redundant, integrated in hero-carousel organism)
- [x] Molecule: slide-image.html (ARCHIVED - redundant, integrated in hero-carousel organism)
- [x] Molecule: navarrows-embedded.html (ARCHIVED - redundant, carousel nav integrated in hero-carousel organism)
- [x] Molecule: playpause-embedded.html (ARCHIVED - redundant, carousel controls integrated in hero-carousel organism)
- [x] Molecule: slide-frame.html (ARCHIVED - redundant, carousel structure integrated in hero-carousel organism)
- [x] Molecule: buttons-navdotgroups.html (ARCHIVED - redundant, carousel indicators integrated in hero-carousel organism)
- [x] Molecule: buttons-navarrowpairs.html (ARCHIVED - redundant, carousel nav integrated in hero-carousel organism)
- [x] Molecule: menu-footer-mod.html (ARCHIVED - redundant, footer menu integrated in footer-unified organism)
- [x] Molecule: main-menu-click.html (ARCHIVED - redundant, menu integrated in banner-header organism)
- [x] Molecule: sticky-menu.html (COMPLETED)
- [x] Molecule: card-faq.html (COMPLETED)
- [x] Molecule: card-teaser.html (COMPLETED)
- [x] Molecule: card-resources.html (COMPLETED)
- [x] Molecule: form-contact.html (COMPLETED)
- [x] Molecule: form-resource.html (COMPLETED)
- [x] Molecule: form-newsletter.html (COMPLETED)
- [x] Molecule: form-item.html (ARCHIVED - redundant, field containers integrated in production forms)
- [x] Molecule: form-input-field.html (ARCHIVED - redundant, input fields integrated in production forms)
- [x] Organism: banner-header-lp-clean.html (COMPLETED - v4.0 tokenized)
- [x] Organism: banner-header-lp-contact.html (COMPLETED - v4.0 tokenized)
- [x] Organism: banner-header-lp-cta.html (COMPLETED - v4.0 tokenized)
- [x] Organism: banner-header-main.html (COMPLETED - v4.0 tokenized, renamed from banner-header-main-mobile-fix-v3.html)
- [x] Organism: blog-group-clean.html (COMPLETED - already tokenized with v4.0)
- [ ] Organism: blog-group.html (redundant - use blog-group-clean.html)
- [x] Organism: content-2column-contact.html (COMPLETED - v4.0 tokenized, all breakpoints)
- [x] Organism: content-2column-graphic.html (COMPLETED - v4.0 tokenized, removed 300+ lines inline CSS)
- [x] Organism: footer-simple.html (COMPLETED - v4.0 tokenized, all breakpoints)
- [x] Organism: footer-main.html (COMPLETED - v4.0 tokenized, renamed from footer-unified.html, all breakpoints)
- [x] Organism: hero-atf-center.html (COMPLETED - v4.0 tokenized, removed 230+ lines embedded CSS, all breakpoints)
- [ ] Organism: hero-atf-left.html (new - file doesn't exist yet)
- [ ] Organism: hero-atf-right.html (develop in Phase 2 MVW)
- [x] Organism: hero-carousel.html (COMPLETED - v4.0 tokenized, removed 55 lines embedded CSS, all breakpoints)
- [x] Organism: hero-simple-default.html (COMPLETED - v4.0 tokenized, removed 135 lines embedded CSS, all breakpoints)
- [x] Organism: hero-simple-reverse.html (COMPLETED - v4.0 tokenized, removed 134 lines embedded CSS, all breakpoints)
- [x] Organism: section-contactus.html (COMPLETED - v4.0 rebuilt to properly compose form-contact molecule, Atomic Design principles, all breakpoints)
- [x] Organism: section-faq-group.html (COMPLETED - v4.0 rebuilt to properly compose card-faq molecules, reduced 304 lines, all breakpoints)
- [x] Organism: section-resources.html (COMPLETED - v4.0 rebuilt to properly compose card-resources molecules, responsive grid 1-2-3-4 cols, all breakpoints)
- [x] Organism: text-block.html (COMPLETED - v4.0 tokenized, removed atoms-master.css conflict, all inline styles removed, proper Open Sans rendering)
- [ ] Organism: text-block-with-sticky-menu.html (Phase 2 - NEW design with xxlarge decorative icons - to be built)

**Organism Layer Progress: 18/19 completed (95%)** 🎉

## Notes
- This is Week 44 sprint work
- Priority: Complete tokenization of molecules and organisms
- Geoffrey reviews all changes before committing
- Maintain compatibility with existing templates

### Component Redundancy Rule
**If a production organism or molecule component exists that integrates sub-component functionality, the standalone prototypes are redundant and should be archived.**

Examples:
- `banner-header-main-mobile-fix-v3.html` (organism) integrates menu → archive `header-dropdown-menu.html` and `main-menu-click.html`
- `hero-carousel.html` (organism) integrates slides → archive `slide-hero.html`, `slide-video.html`, `slide-image.html`
- `footer-unified.html` (organism) integrates footer menu → archive `menu-footer-mod.html`
- Production form components (`form-contact.html`, `form-resource.html`, `form-newsletter.html`) integrate field functionality → archive `form-input-field.html` and `form-item.html`

**Form Component Integration:**
- `form-input-field.html` - Basic input field with states (unfilled, focus, error, disabled)
- `form-item.html` - Field wrapper with label + input + helper text
- **Integrated into:** All production form components use `.form-[type]__input`, `.form-[type]__label`, `.form-[type]__helper` classes

These Figma-to-HTML prototypes were useful during design but are not needed in production. Organisms will be tokenized during the organism layer phase.

---
Last Updated: October 29, 2025
Variables Version: v4.0-20251027
