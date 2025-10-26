# Purposeful Media Design System - Development Files
**Phase 1: Minimum Viable Website (MVW)**

---

## 📁 Project Structure

```
Development Files/
├── components/              # HTML component library
│   ├── atoms/              # Basic elements (buttons, typography)
│   ├── molecules/          # Simple combinations (cards, forms, icons)
│   └── organisms/          # Complex sections (heroes, footers, text blocks)
│
├── styles/                 # CSS source files
│   ├── variables-v2.0-20250915.css
│   ├── atoms-master.css
│   ├── molecules-*.css
│   └── organisms-*.css
│
├── scripts/                # JavaScript source files
│   ├── blog-group-adapter.js
│   ├── hero-carousel.js
│   └── section-faq-group.js
│
├── assets/                 # Static assets
│   ├── svg/               # Icon sprite sheets
│   ├── images/            # Images
│   └── videos/            # Video files
│
├── dist/                   # Production build output (generated)
│   ├── css/
│   │   └── purposeful-main.min.css
│   └── js/
│       └── purposeful-main.min.js
│
└── docs/                   # Documentation
    ├── BUILD-INSTRUCTIONS.md
    ├── WORDPRESS-DEPLOYMENT-AUDIT.md
    └── AUDIT-EXECUTIVE-SUMMARY.md
```

---

## 🚀 Quick Start

### First Time Setup

```bash
# 1. Navigate to this directory
cd "/Users/geoffreycraig/Library/CloudStorage/Dropbox/PURPOSEFUL MEDIA PROMOTIONS/WEBSITE PROJECT/Development Files"

# 2. Install build tools (one-time)
npm install

# 3. Build production files
npm run build
```

**Output:** Optimized files in `dist/` folder ready for WordPress

---

## 📋 Available Commands

```bash
npm run build         # Build production CSS & JS
npm run watch         # Auto-rebuild on file changes
npm run clean         # Delete dist/ folder

npm run build:css     # Build CSS only
npm run build:js      # Build JS only
npm run watch:css     # Watch CSS files
npm run watch:js      # Watch JS files
```

---

## 📚 Documentation

### Build & Deployment
- **[BUILD-INSTRUCTIONS.md](BUILD-INSTRUCTIONS.md)** - Complete build process guide
- **[wordpress-enqueue-template.php](wordpress-enqueue-template.php)** - WordPress integration code

### Audit & Planning
- **[AUDIT-EXECUTIVE-SUMMARY.md](AUDIT-EXECUTIVE-SUMMARY.md)** - Quick overview of optimization plan
- **[WORDPRESS-DEPLOYMENT-AUDIT.md](WORDPRESS-DEPLOYMENT-AUDIT.md)** - Complete technical audit (50+ pages)

### Component Documentation
- **Components:** See individual HTML files in `components/` folders
- **Text Block:** `components/organisms/TEXT-BLOCK-README.md` - Full organism documentation
- **Icons:** `components/molecules/icon-display.html` - Symbolic icon demo
- **UI Icons:** `components/molecules/ui-icon-display.html` - UI icon demo

---

## 🎯 Phase 1 MVW Goals

### Current Focus
✅ Build process setup (complete)  
⏳ CSS/JS consolidation (in progress)  
⏳ WordPress theme structure  
⏳ Homepage template  
⏳ Bluehost sandbox deployment (speed run)

### Completed
✅ Design tokens (variables)  
✅ Atoms layer (typography, buttons)  
✅ Molecules layer (cards, forms, icons)  
✅ Organisms layer (heroes, footers, text blocks)  
✅ Build configuration  
✅ Optimization audit

---

## 🛠️ Development Workflow

### Making Changes

1. **Edit source files** in `styles/` or `scripts/`
2. **Run watch mode** to auto-rebuild:
   ```bash
   npm run watch
   ```
3. **Test changes** locally (in browser or Local by Flywheel)
4. **Build for production** when ready:
   ```bash
   npm run build
   ```
5. **Deploy** `dist/` files to WordPress

### File Organization

**Source Files (edit these):**
- `styles/` - All CSS source files
- `scripts/` - All JavaScript source files
- `components/` - HTML component library

**Generated Files (don't edit):**
- `dist/` - Built production files
- `node_modules/` - npm packages

---

## 📊 Build Output

### What Gets Created

**Before build:**
- 23 CSS files (256KB unminified)
- 5 JS files (53.5KB unminified)

**After build:**
- 1 CSS file (70KB minified → ~18KB gzipped)
- 1 JS file (22KB minified → ~8KB gzipped)

**Optimization:** 70% size reduction, 93% fewer HTTP requests

---

## 🎨 Design System Layers

### Atoms (Complete)
- Typography (headlines, paragraphs)
- Buttons (primary, secondary, tertiary, ghost)
- Links (text, menu)
- Labels
- Quotes

### Molecules (Complete)
- Icon Display (21 symbolic icons, multi-color)
- UI Icon Display (9 functional icons)
- Cards (resources, blog, FAQ, stats)
- Forms (contact, newsletter, resources)
- Dropdown menus
- Carousel slides

### Organisms (Complete)
- Heroes (simple, reverse, ATF center, carousel)
- Headers (main, landing page variants)
- Footers (unified, simple)
- Navigation (desktop, mobile)
- Sections (2-column, contact, resources, FAQ, blog group)
- Text Block (narrative, pillar page, topic layouts)

### Templates (Next Phase)
- Homepage
- Landing page
- Blog post
- Contact page
- Service pages

---

## 🔗 Key Files

### Configuration
- **package.json** - Build scripts and dependencies
- **postcss.config.js** - CSS processing configuration
- **.gitignore** - Git ignore rules

### Entry Points
- **styles/master-styles.css** - Main CSS entry point (imports all CSS)
- **scripts/** - All JS files (combined in build)

### WordPress Integration
- **wordpress-enqueue-template.php** - Copy this to theme's functions.php

---

## 📖 Icon System

### Symbolic Icons (Decorative)
- **21 icons** with multi-color design (main + gold + teal accents)
- **4 colors:** navy, gray, dark, white
- **4 sizes:** small (30px), medium (60px), large (90px), xlarge (120px)
- **File:** 40KB CSS (justified for multi-color system)

### UI Icons (Functional)  
- **9 icons** single-color for interface elements
- **5 colors:** navy, gold, gray, white, teal
- **4 sizes:** small (16px), medium (24px), large (32px), xlarge (48px)

---

## ⚡ Performance Targets

| Metric | Before | After | Improvement |
|--------|--------|-------|-------------|
| CSS Files | 23 | 1 | 96% fewer |
| JS Files | 5 | 1 | 80% fewer |
| CSS Size (gzipped) | ~65KB | ~18KB | 72% smaller |
| JS Size (gzipped) | ~16KB | ~8KB | 50% smaller |
| HTTP Requests | 28+ | 2 | 93% fewer |
| Load Time | ~2.5s | <1.0s | 60% faster |

---

## 🚀 Next Steps

1. **Run build process** (if not done yet):
   ```bash
   npm install
   npm run build
   ```

2. **Verify output:**
   ```bash
   ls -lh dist/css/
   ls -lh dist/js/
   ```

3. **Prepare for WordPress:**
   - Copy enqueue code from `wordpress-enqueue-template.php`
   - Start building homepage template
   - Plan Bluehost sandbox deployment

---

## 📞 Support

### Documentation
- See `BUILD-INSTRUCTIONS.md` for detailed build help
- See `.cursorrules` for development guidelines
- See component README files for usage examples

### Common Issues
- **npm not found:** Install Node.js from https://nodejs.org/
- **Build fails:** Run `npm install` to ensure dependencies are installed
- **Files not updating:** Run `npm run clean && npm run build`

---

**Design System Status:** Phase 1 MVW - Ready for WordPress Integration 🎯

**Last Updated:** October 7, 2025  
**Version:** 1.0.0

