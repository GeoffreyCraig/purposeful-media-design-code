# Variables Consolidation Plan
## Week 43 - Design System Token Integration

**Date:** October 27, 2025  
**Status:** Planning Phase  
**Goal:** Integrate all Figma-mapped variables into `variables-v3.0-20251023.css`

---

## Executive Summary

We have **13 mapping documents** containing Figma-sourced design tokens from Atomic Design components. Current CSS file (`variables-v3.0-20251023.css`) is authoritative, but missing component-specific tokens. This plan outlines systematic integration.

---

## Current State Analysis

### Existing CSS File Structure
```
variables-v3.0-20251023.css (Sections):
1. Font Imports (Google Fonts)
2. Color Tokens (Primary, Secondary, Accent, Teal, Neutrals, Error/Warning)
3. Semantic Color Aliases (Text, BG, Border, Interactive, Quote)
4. Typography Tokens (Fonts, Weights, Headlines, Paragraphs, Labels, Quotes, Links)
5. Spacing Tokens (Base 8px scale, Component spacing, Margins)
6. Effects & Shadows (Box shadows, Focus, Transitions, Border radius)
7. Layout Tokens (Containers, Breakpoints, Grid, Z-index, Viewport BG)
8. Component-Specific Tokens (Buttons, Nav, Forms, Icons)
```

### Mapping Documents Inventory
```
/variables/
├── Banner-Atom-Variable-Mapping.md (Atoms)
├── Card-BannerGraphic-Variable-Mapping.md (Molecules)
├── Card-BlogPost-Variable-Mapping.md (Molecules)
├── Card-FAQ-Variable-Mapping.md (Molecules)
├── Card-Resources-Variable-Mapping.md (Molecules)
├── card-paragraph-options-variable-mapping.md (Molecules)
├── card-teaser-variable-mapping.md (Molecules)
├── figma-to-css-token-mapping.md (Organisms - Page Shell)
├── footer-menu-variables-mapping.md (Organisms)
├── main-menu-variable-mapping.md (Organisms)
├── slide-set-molecules-mapping.md (Molecules)
└── sticky-menu-variables-mapping.md (Organisms)
```

---

## Gap Analysis Results

### Category 1: Variables Already Exist (Use As-Is)
These are fully defined in CSS and referenced correctly in mapping docs:

#### Colors
- ✅ `--color-primary-*` (50-900)
- ✅ `--color-accent-*` (50-900)
- ✅ `--color-teal-*` (50-900)
- ✅ `--color-neutral-*` (50-900)
- ✅ `--color-error-*` (50-900)
- ✅ `--color-warning-*` (50-900)
- ✅ Semantic aliases (`--text-heading`, `--text-body`, `--bg-primary`, etc.)

#### Spacing
- ✅ `--space-1` through `--space-24` (complete 8px-based scale)
- ✅ `--padding-button*`, `--padding-card`, `--padding-section`
- ✅ `--margin-*` tokens

#### Typography
- ✅ Font families (`--font-primary`, `--font-secondary`)
- ✅ Font weights (light through black)
- ✅ All headline sizes (`--text-h1-*` through `--text-h6-*`)
- ✅ Paragraph tokens (`--text-large-*`, `--text-lead-*`, `--text-default-*`)
- ✅ Label tokens (`--label-button-*`, `--label-form-*`, `--label-cta-*`)
- ✅ Quote tokens

#### Effects
- ✅ Shadows (`--shadow-none` through `--shadow-strong`)
- ✅ Focus outlines
- ✅ Transitions (fast/base/slow)
- ✅ Border radius (small/medium/large/round)

### Category 2: Missing Component-Specific Variables
These need to be added from mapping documents:

#### Banner Components (From Banner-Atom-Variable-Mapping.md)
```css
/* MISSING - Add to Component-Specific section */
:root {
  /* Banner Semantic Aliases */
  --banner-headline: var(--text-reverse);      /* #FFFFFF */
  --banner-subheading: var(--color-neutral-200); /* #C7CBCF */
  --banner-bg: var(--bg-brand);                 /* #1B1464 */
  --banner-accent: var(--color-accent-500);     /* #D4AF37 */
  
  /* Banner Specific Sizing */
  --banner-headline-size-desktop: 36px;
  --banner-headline-height-desktop: 54px;
  --banner-headline-size-mobile: 24px;
  --banner-headline-height-mobile: 36px;
  --banner-subheading-size: 24px;
  --banner-subheading-height: 36px;
  
  /* Banner Icon Container */
  --banner-icon-container-size: 90px;
  --banner-icon-max-width: 85px;
  --banner-icon-max-height: 68px;
}
```

#### Card Components (From Card-*-Variable-Mapping.md files)
```css
/* MISSING - Add to Component-Specific section */
:root {
  /* Card/BlogPost States */
  --card-blog-bg-default: var(--bg-primary);
  --card-blog-bg-hover: var(--color-accent-50);
  --card-blog-bg-active: var(--color-accent-100);
  --card-blog-bg-disabled: var(--color-neutral-100);
  
  /* Card/FAQ Variables */
  --faq-transition-speed: var(--transition-base);
  --faq-height-transition: var(--transition-slow);
  --faq-rotation-transition: var(--transition-base);
  --faq-chevron-size: 30px;
  --faq-chevron-line-height: 45px;
  --faq-answer-indent-desktop: var(--space-8);
  --faq-answer-indent-mobile: var(--space-5);
  
  /* Card/Resources Variables */
  --card-resources-width: 310px;
  --card-resources-content-width: 286px;
  --card-resources-header-height: 90px;
  --card-resources-button-height: 42px;
  --card-resources-button-padding-x: 64px;
  --card-resources-overlay: rgba(27, 20, 100, 0.85);
  --card-resources-overlay-gradient: linear-gradient(180deg, rgba(27,20,100,0.7) 0%, rgba(27,20,100,0.95) 100%);
}
```

#### Navigation Components (From main-menu-variable-mapping.md)
```css
/* PARTIALLY COMPLETE - Extend existing nav section */
:root {
  /* Main Menu - Desktop */
  --link-menu: var(--nav-link-color);          /* Already exists as --nav-link-color */
  --link-hover: var(--color-accent-400);        /* Already defined */
  --link-active: var(--color-accent-600);       /* Already defined */
  
  /* Dropdown - Desktop */
  --link-dropdown: var(--color-primary-700);    /* NEW */
  --link-dropdown-hover: var(--color-primary-500); /* NEW */
  --link-dropdown-active: var(--color-primary-900); /* NEW */
  --link-dropdown-disabled: var(--color-neutral-400); /* NEW */
  
  /* Menu Icon Sizing */
  --menu-icon-tablet-width: 54px;               /* NEW */
  --menu-icon-tablet-height: 53px;              /* NEW */
  --menu-icon-mobile-width: 54px;               /* NEW */
  --menu-icon-mobile-height: 45px;              /* NEW */
  
  /* Dropdown Card */
  --dropdown-padding: 32px 64px 32px 32px;      /* NEW */
  --dropdown-gap: 16px;                         /* NEW */
  --dropdown-border-radius: var(--radius-medium); /* Exists */
  --dropdown-shadow: var(--shadow-subtle);      /* Exists */
}
```

#### Hero Components (From figma-to-css-token-mapping.md)
```css
/* MISSING - Add custom Hero variables */
:root {
  /* Hero Padding */
  --hero-padding-x: 40px;
  --hero-padding-mobile: 0;
  
  /* Container Padding */
  --container-padding-x: 16px;
}
```

### Category 3: Variables Needing Clarification
These appear in Figma but have contextual meanings:

#### "Default" Variable
Figma uses `--default` with different values based on context:
- Sometimes `#1b1464` (primary navy)
- Sometimes `#d4af37` (gold accent)
- Sometimes `#a2a9af` (neutral gray)

**Recommendation:** Do NOT create a global `--default` token. Components should use specific semantic tokens instead.

#### Custom Field Ambiguities
Some Figma variables don't have clear CSS equivalents:
- `H2 Headline 30 45h` → Already mapped to `--text-h2-*` tokens
- Font references are informational, not additional variables

---

## Integration Priority Order

### Priority 1: Component-Specific Extensions (Week 43)
Add component-specific tokens to existing sections:

1. **Buttons** (extend existing)
   - Already complete

2. **Navigation** (extend existing)
   - Add dropdown tokens
   - Add mobile menu icon sizing

3. **Forms** (extend existing)
   - Already complete

4. **Cards** (NEW section needed)
   - BlogPost states
   - FAQ animations
   - Resources dimensions

5. **Banners** (NEW section needed)
   - Semantic aliases
   - Icon sizing
   - Responsive typography

6. **Hero** (NEW section needed)
   - Custom padding
   - Container variations

### Priority 2: Missing Semantic Aliases (Week 43)
Expand semantic color aliases for clarity:

```css
:root {
  /* Enhanced Dropdown Semantics */
  --dropdown-bg-default: var(--color-neutral-100);
  --dropdown-bg-hover: var(--color-accent-100);
  --dropdown-bg-active: var(--color-teal-100);
  
  /* Enhanced Card Semantics */
  --card-bg-default: var(--bg-primary);
  --card-bg-hover: var(--color-accent-50);
  --card-bg-active: var(--color-accent-100);
}
```

### Priority 3: Documentation Updates (Week 44)
- Create comprehensive variable reference guide
- Document component-specific token usage patterns
- Add inline comments for complex tokens

---

## Recommended File Structure Evolution

### Current Structure (Keep)
```
variables-v3.0-20251023.css
├── Font Imports
├── Color Tokens
├── Semantic Color Aliases
├── Typography Tokens
├── Spacing Tokens
├── Effects & Shadows
├── Layout Tokens
└── Component-Specific Tokens
```

### Enhanced Structure (Expand Component Section)
```
variables-v3.0-20251023.css
├── Font Imports
├── Color Tokens
├── Semantic Color Aliases
├── Typography Tokens
├── Spacing Tokens
├── Effects & Shadows
├── Layout Tokens
└── Component-Specific Tokens
    ├── Buttons (existing)
    ├── Navigation (existing + NEW dropdown tokens)
    ├── Forms (existing)
    ├── Icons (existing)
    ├── Cards (NEW)
    │   ├── BlogPost
    │   ├── FAQ
    │   ├── Resources
    │   ├── BannerGraphic
    │   └── Teaser
    ├── Banners (NEW)
    ├── Hero (NEW)
    └── Footer (NEW - if needed)
```

---

## Next Steps

### Immediate Actions (Today - Monday, Oct 27)
1. ✅ Create this consolidation plan
2. ⏳ Generate updated `variables-v4.0-YYYYMMDD.css` with integrated tokens
3. ⏳ Create variable change log documenting all additions
4. ⏳ Test new variables in one component (e.g., Card/BlogPost)

### This Week (Week 43)
1. Integrate all Priority 1 component tokens
2. Add Priority 2 semantic aliases
3. Update all HTML/CSS files to reference new tokens
4. Remove any remaining inline styles

### Next Week (Week 44)
1. Complete Priority 3 documentation
2. Create visual token reference guide
3. Audit all templates for token consistency
4. Final WordPress integration prep

---

## Success Criteria

- ✅ Zero variables defined in mapping docs missing from CSS
- ✅ All component-specific tokens properly namespaced
- ✅ No breaking changes to existing templates
- ✅ Clear documentation for each new token
- ✅ All inline styles converted to token references
- ✅ Version control: Git commit before and after integration

---

## Risk Mitigation

### Backup Strategy
1. Keep `variables-v3.0-20251023.css` untouched
2. Create `variables-v4.0-YYYYMMDD.css` with additions
3. Test in isolated environment before global rollout
4. Document all changes in changelog

### Naming Conflicts
- Use component prefixes (e.g., `--card-*`, `--banner-*`, `--nav-*`)
- Never override existing tokens
- Add new tokens, don't modify existing ones

### Testing Protocol
1. Validate CSS syntax
2. Check token resolution in browser dev tools
3. Test one component at a time
4. Verify responsive behavior
5. Cross-browser testing

---

**Status:** Ready for implementation  
**Next Document:** `variables-v4.0-implementation.md`
