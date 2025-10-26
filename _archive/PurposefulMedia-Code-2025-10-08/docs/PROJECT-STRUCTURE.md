# Purposeful Media Design System - Project Structure

> **Last Updated:** Week 41, Q4 2025 (October 8, 2025)  
> **Purpose:** Single source of truth for directory organization and file locations

## Table of Contents
- [Overview](#overview)
- [Directory Tree](#directory-tree)
- [Directory Descriptions](#directory-descriptions)
- [File Naming Conventions](#file-naming-conventions)
- [Workflow Paths](#workflow-paths)

---

## Overview

This project follows **Atomic Design methodology** with a clear separation between development files and production-ready output. The structure supports a component-based design system with comprehensive design tokens and utilities.

### Key Principles
1. **Atomic Design**: atoms → molecules → organisms → templates
2. **Raw vs Cleaned**: Development files in `raw/`, production files in `cleaned/`
3. **Build Pipeline**: Source files → processed → distribution (`dist/`)
4. **Documentation First**: Every major component should have documentation

---

## Directory Tree

```
PurposefulMedia-Code/
│
├── .cursorrules                      # AI assistance rules and boundaries
│
├── components/                       # All UI components (source files)
│   ├── atoms/                       # Basic building blocks
│   │   ├── raw/                     # Original/unprocessed atomic components
│   │   │   ├── Headline Component/
│   │   │   ├── Labels Component/
│   │   │   ├── Paragraph Components/
│   │   │   ├── Primitive Colors/
│   │   │   ├── Quote Component/
│   │   │   ├── Shadow Component/
│   │   │   ├── border-react.jsx
│   │   │   ├── border.html
│   │   │   ├── link.html
│   │   │   ├── navigation.html
│   │   │   ├── navigation-note.txt
│   │   │   ├── radius-react.jsx
│   │   │   └── radius.html
│   │   │
│   │   ├── cleaned/                 # Production-ready atoms
│   │   │   ├── headlines.html
│   │   │   ├── headlines.css
│   │   │   ├── headlines.config.js
│   │   │   ├── headlines-README.md
│   │   │   ├── labels.html
│   │   │   ├── labels.css
│   │   │   ├── links.html
│   │   │   ├── links.css
│   │   │   ├── navigation.html
│   │   │   ├── paragraphs.html
│   │   │   ├── paragraphs.css
│   │   │   ├── quotes.html
│   │   │   └── quotes.css
│   │   │
│   │   ├── icons/                   # SVG icon library (91 icons)
│   │   │   ├── [various].svg
│   │   │   └── icons.html
│   │   │
│   │   ├── logos/
│   │   │   └── logo-usage-example.html
│   │   │
│   │   └── Clean/                   # (Legacy? To be organized)
│   │
│   ├── molecules/                   # Component combinations
│   │   ├── raw/                     # Original molecular components
│   │   │   ├── Buttons Component/
│   │   │   ├── CardBlogPost Component/
│   │   │   ├── CardFAQ Component/
│   │   │   ├── CardParagraphOptions Component/
│   │   │   ├── CardQuote Component/
│   │   │   ├── CardResources Component/
│   │   │   ├── CardStats Component/
│   │   │   ├── CardTeaser Component/
│   │   │   ├── DropDownFooter Component/
│   │   │   ├── DropDownHeader Component/
│   │   │   ├── DropDownMobileFooterMenu Component/
│   │   │   ├── DropDownSticky Component/
│   │   │   ├── DropDownTouch Component/
│   │   │   ├── FooterMod Component/
│   │   │   ├── FormContact Component/
│   │   │   ├── FormInputFields Component/
│   │   │   ├── FormItems Component/
│   │   │   ├── FormNewsletter Component/
│   │   │   ├── FormResources Component/
│   │   │   ├── MenuFooter Component/
│   │   │   ├── MenuStickyDesktop Component/
│   │   │   ├── MenuStickyMobileClosed Component/
│   │   │   ├── MenuStickyMobileOpen Component/
│   │   │   ├── MenuTop Component/
│   │   │   ├── NavArrows Component/
│   │   │   ├── NavDots Component/
│   │   │   ├── PlayPause Component/
│   │   │   ├── SlideFrame Component/
│   │   │   ├── SlideHero/
│   │   │   ├── SlideImage Component/
│   │   │   └── SlideVideo Component/
│   │   │
│   │   └── cleaned/                 # Production-ready molecules
│   │       ├── card-component.html
│   │       ├── card-component.css
│   │       ├── form-component.html
│   │       └── form-component.css
│   │
│   ├── organisms/                   # Complex UI sections
│   │   ├── raw/                     # Original organism components
│   │   │   ├── BannerHeader Component/
│   │   │   ├── CarouselHero Component/
│   │   │   ├── CarouselInPage Component/
│   │   │   ├── FooterMain Component/
│   │   │   ├── FooterSimple Component/
│   │   │   ├── Hero Component/
│   │   │   ├── Section2Column Component/
│   │   │   ├── Section2ColumnGraphic Component/
│   │   │   ├── SectionBlogGroup Component/
│   │   │   └── SectionContactUs Component/
│   │   │
│   │   └── cleaned/                 # Production-ready organisms
│   │       ├── footer-component.html
│   │       ├── footer-component.css
│   │       ├── hero-component.html
│   │       └── hero-component.css
│   │
│   ├── templates/                   # Full page layouts
│   │   ├── raw/                     # Original page templates
│   │   │   ├── About_ContactPage Component/
│   │   │   ├── BlogPage Component/
│   │   │   ├── HomePage Component/
│   │   │   ├── InteriorPage Component/
│   │   │   ├── PillarPage Component/
│   │   │   └── ResourcePage Component/
│   │   │
│   │   └── cleaned/                 # Production-ready templates
│   │       ├── about-contact-template.html
│   │       ├── blog-template.html
│   │       └── homepage-template.html
│   │
│   └── Node ID Extraction Files/   # Development utilities
│       ├── Atoms/
│       │   └── Imports/
│       ├── CSS/
│       └── Molecules/
│
├── dist/                            # Distribution/Build output
│   ├── components/                  # Compiled component CSS
│   │   ├── all-components.css      # Combined all component styles
│   │   ├── atoms/
│   │   │   ├── headlines.css
│   │   │   ├── labels.css
│   │   │   ├── links.css
│   │   │   ├── paragraphs.css
│   │   │   ├── quotes.css
│   │   │   └── [other atomic styles]
│   │   ├── molecules/
│   │   │   ├── card-component.css
│   │   │   ├── form-component.css
│   │   │   └── [other molecule styles]
│   │   ├── organisms/
│   │   │   ├── footer-component.css
│   │   │   ├── hero-component.css
│   │   │   └── [other organism styles]
│   │   ├── templates/
│   │   └── README.md
│   │
│   ├── processed/                   # Processed component files
│   │   ├── atoms/
│   │   │   ├── headlines.html
│   │   │   ├── headlines.css
│   │   │   └── [other processed atoms]
│   │   ├── molecules/
│   │   │   ├── card-component.html
│   │   │   ├── card-component.css
│   │   │   └── [other processed molecules]
│   │   ├── organisms/
│   │   │   ├── footer-component.html
│   │   │   ├── footer-component.css
│   │   │   └── [other processed organisms]
│   │   └── templates/
│   │       ├── about-contact-template.html
│   │       ├── about-contact-template.css
│   │       └── [other processed templates]
│   │
│   └── styles/                      # Compiled styles
│       ├── design-tokens.css        # Full design tokens
│       ├── design-tokens.min.css    # Minified tokens
│       ├── tokens.md                # Auto-generated token documentation
│       ├── utilities.css            # Utility classes
│       ├── utilities.min.css        # Minified utilities
│       └── utilities.md             # Utility class documentation
│
├── docs/                            # Documentation
│   ├── README.md                    # Main documentation entry
│   ├── PROJECT-STRUCTURE.md         # This file
│   ├── design-tokens.md             # Design token reference
│   ├── component-examples.md        # Component usage examples
│   ├── accessibility-checklist.md   # Accessibility guidelines
│   └── components/                  # Component-specific docs
│       ├── button-component.md
│       ├── card-component.md
│       └── [other component docs]
│
├── scripts/                         # Build and automation scripts
│   ├── build.js                     # Main build script
│   ├── build-components.js          # Component compilation
│   ├── build-docs.js                # Documentation generation
│   ├── build-tokens.js              # Token processing
│   ├── build-utilities.js           # Utility class generation
│   └── serve.js                     # Development server
│
├── styles/                          # Source styles
│   ├── design-tokens.css            # Master design tokens
│   ├── main.css                     # Main stylesheet
│   ├── typography-master.css        # Typography system
│   │
│   ├── tokens/                      # Token variations
│   │   ├── design-tokens.css
│   │   └── unified-design-tokens.css
│   │
│   ├── components/                  # Component-specific styles
│   │   ├── buttons.css
│   │   ├── headlines.css
│   │   ├── icons.css
│   │   ├── labels.css
│   │   ├── links.css
│   │   ├── logos.css
│   │   └── navigation.css
│   │
│   └── utilities/                   # Utility classes
│       └── utility-classes.css
│
└── node_modules/                    # Dependencies (not tracked)

```

---

## Directory Descriptions

### `/components/` - Component Source Files

**Purpose:** Primary development location for all UI components following Atomic Design.

#### `/components/atoms/`
**What:** Basic building blocks that cannot be broken down further.
**Examples:** 
- Headlines (h1-h6)
- Paragraphs
- Labels
- Links
- Buttons (individual)
- Input fields (individual)
- Icons
- Quotes

**Current Status:**
- ✅ `cleaned/`: 7 production components (headlines, labels, links, navigation, paragraphs, quotes)
- 📦 `raw/`: 9+ original component folders for reference
- 🎨 `icons/`: 91 SVG icons
- 🏷️ `logos/`: Logo examples

#### `/components/molecules/`
**What:** Combinations of 2+ atomic components working together.
**Examples:**
- Cards (blog, FAQ, stats, quote, resources)
- Forms (contact, newsletter, input groups)
- Navigation menus
- Dropdown menus
- Carousel controls

**Current Status:**
- ✅ `cleaned/`: 2 production components (cards, forms)
- 📦 `raw/`: 28+ component folders awaiting processing

#### `/components/organisms/`
**What:** Complex UI sections made from molecules and atoms.
**Examples:**
- Hero sections (simple, image, video, carousel)
- Page headers with navigation
- Page footers with menu/social
- Multi-column sections
- Contact sections

**Current Status:**
- ✅ `cleaned/`: 2 production components (footer, hero)
- 📦 `raw/`: 10 component folders to process

#### `/components/templates/`
**What:** Complete page layouts combining organisms, molecules, and atoms.
**Examples:**
- Homepage
- Blog page
- About/Contact page
- Interior content page
- Pillar page
- Resource page

**Current Status:**
- ✅ `cleaned/`: 3 production templates (about-contact, blog, homepage)
- 📦 `raw/`: 6 page template folders

---

### `/dist/` - Distribution Files

**Purpose:** Build output for production use. **DO NOT edit directly** - generated by build scripts.

#### `/dist/components/`
Compiled CSS for all components, organized by atomic level. Includes `all-components.css` for single-file inclusion.

#### `/dist/processed/`
Processed HTML and CSS files ready for deployment or integration.

#### `/dist/styles/`
Final design tokens, utilities, and documentation in both full and minified versions.

---

### `/docs/` - Documentation

**Purpose:** Human-readable documentation for the design system.

**Key Files:**
- `README.md` - Main entry point with quick start
- `PROJECT-STRUCTURE.md` - This file, directory reference
- `design-tokens.md` - Complete design token reference
- `component-examples.md` - Usage patterns
- `accessibility-checklist.md` - A11y requirements
- `/components/` - Detailed component documentation

---

### `/scripts/` - Build Scripts

**Purpose:** Automation scripts for building, compiling, and serving the design system.

**Key Scripts:**
- `build.js` - Master build script
- `build-components.js` - Compile components
- `build-tokens.js` - Process design tokens
- `build-utilities.js` - Generate utility classes
- `build-docs.js` - Generate documentation
- `serve.js` - Local development server

---

### `/styles/` - Source Styles

**Purpose:** Master stylesheets and design tokens (source of truth).

**Key Files:**
- `design-tokens.css` - All design system tokens
- `main.css` - Main stylesheet imports
- `typography-master.css` - Typography system
- `/tokens/` - Token variations
- `/components/` - Component-specific styles
- `/utilities/` - Utility class definitions

---

## File Naming Conventions

### Components
```
[component-name].html          # HTML structure
[component-name].css           # Component styles
[component-name].config.js     # Configuration (optional)
[component-name]-README.md     # Component docs (optional)
```

**Examples:**
- `headlines.html` / `headlines.css`
- `card-component.html` / `card-component.css`
- `hero-component.html` / `hero-component.css`

### Templates
```
[page-type]-template.html
[page-type]-template.css
```

**Examples:**
- `homepage-template.html`
- `blog-template.html`
- `about-contact-template.html`

### Documentation
```
[topic].md                     # General docs
[component-name]-component.md  # Component docs
```

---

## Workflow Paths

### Creating a New Component

1. **Determine atomic level** (atom/molecule/organism/template)
2. **Check if exists in raw/** for reference
3. **Create in appropriate `/cleaned/` directory:**
   - `/components/[level]/cleaned/[name].html`
   - `/components/[level]/cleaned/[name].css`
4. **Run build script** to generate dist files
5. **Add documentation** (if major component)

### Converting Raw to Cleaned

1. **Review raw component** in `/components/[level]/raw/`
2. **Extract reusable patterns**
3. **Apply design tokens** (replace hardcoded values)
4. **Apply BEM naming** conventions
5. **Add accessibility features**
6. **Create cleaned files** in `/components/[level]/cleaned/`
7. **Test responsive behavior**
8. **Run build process**

### Building for Production

```bash
# Full build
npm run build

# Individual builds
npm run build:components
npm run build:tokens
npm run build:utilities
npm run build:docs

# Development server
npm run serve
```

---

## Component Inventory

### Atoms - Cleaned (Production Ready) ✅
- [x] Headlines (h1-h6)
- [x] Labels
- [x] Links
- [x] Navigation items
- [x] Paragraphs
- [x] Quotes
- [x] Icons (91 SVGs)

### Atoms - Raw (To Process) 📦
- [ ] Buttons
- [ ] Borders
- [ ] Radius utilities
- [ ] Shadows
- [ ] Primitive colors

### Molecules - Cleaned (Production Ready) ✅
- [x] Card component (multiple variants)
- [x] Form component (multiple types)

### Molecules - Raw (To Process) 📦
- [ ] Button groups/variants
- [ ] 8 Card types (blog, FAQ, quote, stats, resources, paragraph, teaser)
- [ ] 5 Dropdown variants
- [ ] 4 Form types (contact, newsletter, resources, input fields)
- [ ] 4 Menu types (footer, sticky desktop, sticky mobile, top)
- [ ] Navigation components (arrows, dots)
- [ ] Carousel slides (frame, hero, image, video)
- [ ] Play/Pause controls

### Organisms - Cleaned (Production Ready) ✅
- [x] Footer component
- [x] Hero component

### Organisms - Raw (To Process) 📦
- [ ] Banner header
- [ ] Carousel (hero, in-page)
- [ ] Footer variations (main, simple, mod)
- [ ] Section types (2-column, 2-column graphic, blog group, contact)

### Templates - Cleaned (Production Ready) ✅
- [x] About/Contact page
- [x] Blog page
- [x] Homepage

### Templates - Raw (To Process) 📦
- [ ] Interior page
- [ ] Pillar page
- [ ] Resource page

---

## MVW (Minimum Viable Website) Path

### Phase 1: Core Atoms ⚡ (Current Priority)
Establish basic building blocks needed for all other components.

**Needed:**
- [ ] Buttons (all variants)
- [ ] Input fields
- [ ] Form elements (checkbox, radio, select)

### Phase 2: Essential Molecules 🔨
Create commonly used component combinations.

**Needed:**
- [ ] Button groups
- [ ] Form groups (contact form, newsletter)
- [ ] Navigation menus (desktop, mobile)
- [ ] Card variants (at least blog, quote, stats)

### Phase 3: Key Organisms 🏗️
Build major page sections.

**Needed:**
- [ ] Header with navigation
- [x] Hero (already in cleaned)
- [x] Footer (already in cleaned)
- [ ] 2-column content sections

### Phase 4: Core Templates 📄
Assemble complete pages.

**Needed:**
- [x] Homepage (already in cleaned)
- [x] About/Contact (already in cleaned)
- [x] Blog (already in cleaned)

---

## Quick Reference

### Where do I work?
**Development:** `/components/[level]/cleaned/`  
**Never edit:** `/dist/` (auto-generated)

### Where are design tokens?
**Source:** `/styles/design-tokens.css`  
**Documentation:** `/docs/design-tokens.md`  
**Built:** `/dist/styles/design-tokens.css`

### Where is documentation?
**Main docs:** `/docs/README.md`  
**Component docs:** `/docs/components/`  
**This file:** `/docs/PROJECT-STRUCTURE.md`

### How do I see my changes?
1. Edit files in `/components/[level]/cleaned/`
2. Run `npm run build`
3. Check `/dist/` for compiled output
4. Or run `npm run serve` for live dev server

---

## Notes

- **Raw directories** contain original/reference components - use for inspiration but don't edit
- **Cleaned directories** are production-ready components following all design system rules
- **Build scripts** generate `/dist/` automatically - never edit dist files directly
- **Design tokens** are the single source of truth for all design values
- **BEM methodology** is used throughout for CSS class naming

---

*Last updated: Week 41, Q4 2025*  
*Maintained by: Purposeful Media Design Team*
