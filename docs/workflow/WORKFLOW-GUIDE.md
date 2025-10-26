# Development Workflow Guide
**Purposeful Media Design System | October 8, 2025**

---

## 🎯 PURPOSE

This guide provides your **daily workflow** for working with the consolidated Purposeful Media Design System. Use this as your primary reference for day-to-day development tasks.

**Status:** Post-Consolidation - Single Source of Truth Established ✅

---

## 📍 YOU ARE HERE

```
Development Files/ ← SINGLE SOURCE OF TRUTH
└── This is now your ONLY working directory
    
PurposefulMedia-Code-ARCHIVE-2025-10-08/ ← REFERENCE ONLY
└── Archived for historical reference
```

---

## 🚀 QUICK START

### Every Morning Checklist

1. **Navigate to Development Files**
   ```bash
   cd "/Users/geoffreycraig/Library/CloudStorage/Dropbox/PURPOSEFUL MEDIA PROMOTIONS/WEBSITE PROJECT/Development Files"
   ```

2. **Pull latest changes** (if using Git)
   ```bash
   git pull origin main
   ```

3. **Check build system**
   ```bash
   npm run build
   ```

4. **Review today's goals**
   - Check `/docs/project/` for active planning docs
   - Review any open TODOs
   - Prioritize MVW tasks

---

## 📁 WHERE IS EVERYTHING?

### Components (Source Files)

```
components/
├── atoms/                      # Basic elements
│   ├── [HTML files]           # Original flat structure
│   └── cleaned/               # Better-structured atoms (NEW)
│       ├── headlines.*        # Paired HTML + CSS
│       ├── labels.*
│       ├── links.*
│       ├── paragraphs.*
│       └── quotes.*
│
├── molecules/                  # Component combinations
│   └── [HTML files]           # Cards, forms, menus, slides
│
├── organisms/                  # Complex sections
│   └── [HTML files]           # Heroes, headers, footers, sections
│
└── templates/                  # Full page layouts (Atomic Design)
    ├── front-page.html/.php   # Homepage (WordPress)
    ├── about-contact-template.html  # NEW
    └── blog-template.html     # NEW
```

### Styles (CSS Source)

```
styles/
├── master-styles.css          # MAIN ENTRY POINT (imports all CSS)
├── variables-v2.0-20250915.css  # Design tokens
├── atoms-master.css
├── molecules-*.css
└── organisms-*.css
```

### Scripts (JavaScript Source)

```
scripts/
├── blog-group-adapter.js
├── resources-section-adapter.js
├── hero-carousel.js
├── section-faq-group.js
└── footer-mobile.js
```

### Built Files (DO NOT EDIT)

```
dist/
├── css/
│   └── purposeful-main.min.css  (111KB)
└── js/
    └── purposeful-main.min.js   (20KB)
```

### Documentation

```
docs/
├── README.md                    # Design system overview
├── design-tokens.md             # Token reference
├── component-examples.md        # Usage patterns
├── accessibility-checklist.md   # A11y requirements
├── PROJECT-STRUCTURE.md         # Directory map
│
├── build/                       # Build & deployment
│   ├── BUILD-INSTRUCTIONS.md
│   ├── AUDIT-EXECUTIVE-SUMMARY.md
│   └── WORDPRESS-DEPLOYMENT-AUDIT.md
│
├── workflow/                    # Daily workflow (you are here!)
│   ├── WORKFLOW-GUIDE.md       # This file
│   ├── TOMORROW-MORNING-START-HERE.md
│   └── END-OF-DAY-SUMMARY.md
│
├── project/                     # Project planning
│   ├── CONSOLIDATION-PLAN.md
│   ├── COMPONENT-INVENTORY.md
│   ├── ASSETS-INVENTORY.md
│   └── DOCUMENTATION-INVENTORY.md
│
└── components/                  # Component-specific docs
    ├── atoms/
    ├── molecules/
    ├── organisms/
    └── templates/
```

### Assets (Static Files)

```
assets/
├── images/                     # 16 images (content + placeholders)
├── videos/                     # 3 preview videos
└── svg/
    ├── decorative-icons/      # Icon sprite system
    ├── ui-icons/              # UI icon sprites
    └── logos/                 # 14 logo variations
```

**Note:** Templates are in `/components/templates/` following proper Atomic Design hierarchy, NOT in a root-level `/templates/` directory.

---

## 🔨 COMMON TASKS

### Task 1: Create a New Component

#### Step 1: Determine Component Level
```
Is it an atom, molecule, organism, or template?
- Atom: Basic element (button, input, label)
- Molecule: 2+ atoms combined (card, form)
- Organism: Complex section (hero, footer)
- Template: Full page layout
```

#### Step 2: Check for Existing Similar Components
```bash
# Search components
ls components/atoms/
ls components/molecules/
ls components/organisms/
ls templates/
```

#### Step 3: Create Component Files

**For better organization, use the `cleaned/` pattern:**

```bash
# Example: Creating a new button component
# Create in cleaned/ subdirectory
mkdir -p components/atoms/cleaned

# Create HTML file
touch components/atoms/cleaned/button-component.html

# Create CSS file
touch components/atoms/cleaned/button-component.css
```

#### Step 4: Follow Component Template

**HTML Structure:**
```html
<!-- Component: Button Component -->
<!-- Type: Atom -->
<!-- Usage: Primary CTA buttons, form submissions, navigation -->

<button class="btn btn--primary btn--medium">
  Button Text
</button>
```

**CSS Structure:**
```css
/**
 * Component: Button Component
 * Type: Atom
 * Description: Primary button styles with multiple variants
 * 
 * Dependencies:
 * - Design Tokens (required)
 * - variables-v2.0-20250915.css
 * 
 * Usage:
 * <button class="btn btn--primary">Click Me</button>
 */

.btn {
  /* Layout */
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: var(--space-2) var(--space-4);
  
  /* Typography */
  font-family: var(--font-heading);
  font-size: var(--text-body);
  font-weight: var(--weight-bold);
  
  /* Visual */
  background-color: var(--brand);
  color: var(--text-reverse);
  border: none;
  border-radius: var(--radius-small);
  
  /* Animation */
  transition: var(--transition-normal);
  cursor: pointer;
}

.btn:hover {
  background-color: var(--hover);
}

/* Responsive */
@media (max-width: 767px) {
  .btn {
    font-size: var(--text-body-mobile);
    padding: var(--space-2) var(--space-3);
  }
}
```

#### Step 5: Use Design Tokens (ALWAYS!)

**Required tokens for components:**
- **Colors:** `--brand`, `--accent`, `--text-primary`, etc.
- **Spacing:** `--space-2`, `--space-4`, etc. (8px grid)
- **Typography:** `--font-heading`, `--font-body`, `--text-*`
- **Borders:** `--radius-small`, `--radius-medium`
- **Shadows:** `--shadow-subtle`, `--shadow-focus`

**Reference:** `/docs/design-tokens.md`

#### Step 6: Add to Build System

If creating new CSS file:
```css
/* Add import to styles/master-styles.css */
@import './components/atoms/cleaned/button-component.css';
```

#### Step 7: Test Build
```bash
npm run build
```

---

### Task 2: Modify an Existing Component

#### Step 1: Read the Component First
```bash
# Find the component
ls components/[level]/

# Read HTML
cat components/[level]/[component-name].html

# Read CSS (if separate)
cat components/[level]/cleaned/[component-name].css
# OR check in master CSS files
grep -r "component-name" styles/
```

#### Step 2: Make Changes
- Maintain existing BEM naming
- Use design tokens for new values
- Preserve accessibility features
- Keep responsive breakpoints

#### Step 3: Test
```bash
# Rebuild
npm run build

# Check output
ls -lh dist/css/
ls -lh dist/js/
```

---

### Task 3: Build for Production

#### Development Build (with watch)
```bash
# Auto-rebuild on file changes
npm run watch
```

**Use this while actively coding**

#### Production Build
```bash
# One-time build
npm run build
```

**Use before:**
- Committing code
- Deploying to WordPress
- Testing in staging
- Going live

#### Verify Build Output
```bash
# Check file sizes
ls -lh dist/css/
ls -lh dist/js/

# Expected sizes:
# CSS: ~111KB minified (~18KB gzipped)
# JS:  ~20KB minified (~8KB gzipped)
```

---

### Task 4: Deploy to WordPress

#### Step 1: Build Production Files
```bash
npm run build
```

#### Step 2: Copy to WordPress Theme
```bash
# Copy dist files to your theme
cp -r dist/ /path/to/wordpress/wp-content/themes/purposeful-media/assets/
```

#### Step 3: Enqueue in functions.php

**See:** `/docs/build/BUILD-INSTRUCTIONS.md` for complete enqueue code

Quick reference:
```php
wp_enqueue_style('purposeful-main', 
  get_template_directory_uri() . '/assets/css/purposeful-main.min.css',
  array(), '1.0.0');
  
wp_enqueue_script('purposeful-main',
  get_template_directory_uri() . '/assets/js/purposeful-main.min.js',
  array(), '1.0.0', true);
```

#### Step 4: Clear Caches
- Hard refresh browser: Cmd+Shift+R (Mac) or Ctrl+F5 (Windows)
- Clear WordPress cache (if using caching plugin)
- Update version number in functions.php

---

### Task 5: Add Documentation

#### Component Documentation

Create file: `/docs/components/[level]/[component-name].md`

```markdown
# Component Name

## Overview
Brief description of the component

## Variants
- Primary
- Secondary
- Ghost

## Usage
\`\`\`html
<component-example>
\`\`\`

## Props/Options
- `class`: Modifier classes
- `attr`: Attributes

## Accessibility
- ARIA labels
- Keyboard navigation
- Focus states

## Examples
[Examples with code]
```

#### When to Document
- Major new components
- Complex organisms
- Page templates
- JavaScript features

**Reference:** `/docs/components/` for examples

---

## 🎨 DESIGN SYSTEM RULES

### Always Use Design Tokens

**✅ CORRECT:**
```css
.component {
  color: var(--text-primary);
  padding: var(--space-4);
  border-radius: var(--radius-medium);
}
```

**❌ WRONG:**
```css
.component {
  color: #1B1464;
  padding: 16px;
  border-radius: 8px;
}
```

### Follow BEM Naming

**✅ CORRECT:**
```css
.card { }
.card__header { }
.card__title { }
.card--featured { }
```

**❌ WRONG:**
```css
.cardHeader { }
.card-header-title { }
.featured-card { }
```

### Use Semantic HTML

**✅ CORRECT:**
```html
<button class="btn">Click</button>
<article class="card">
<header class="hero">
```

**❌ WRONG:**
```html
<div class="btn">Click</div>
<div class="card">
<div class="hero">
```

### Include Accessibility

**Required for every component:**
- Proper ARIA labels
- Keyboard navigation
- Focus states (`--shadow-focus`)
- Alt text for images
- Proper heading hierarchy
- Form labels

**Reference:** `/docs/accessibility-checklist.md`

### Responsive Breakpoints

**Always use these:**
```css
/* Mobile: 320px - 767px */
@media (max-width: 767px) { }

/* Tablet/Desktop: 768px - 1919px */
@media (min-width: 768px) { }

/* Desktop Plus: 1920px+ */
@media (min-width: 1920px) { }
```

---

## 🐛 TROUBLESHOOTING

### Build Fails

**Symptom:** `npm run build` errors

**Solutions:**
```bash
# 1. Reinstall dependencies
npm install

# 2. Clean and rebuild
npm run clean
npm run build

# 3. Check for syntax errors in CSS/JS
# Look at error message for file name and line number
```

### CSS Not Updating

**Symptom:** Changes don't appear on page

**Solutions:**
1. Did you rebuild? `npm run build`
2. Hard refresh browser: Cmd+Shift+R
3. Clear WordPress cache
4. Update version number in functions.php
5. Check browser console for 404 errors

### Component Not Found

**Symptom:** Can't find a component

**Search strategy:**
```bash
# Search by name
grep -r "component-name" components/

# List all components
find components/ -name "*.html"

# Search in CSS
grep -r ".component-name" styles/
```

### Wrong Paths in Documentation

**Problem:** Documentation references old paths

**Solution:** All docs are now in `/docs/` subdirectories
- Build docs: `/docs/build/`
- Workflow docs: `/docs/workflow/`
- Component docs: `/docs/components/`
- Project docs: `/docs/project/`

---

## 📚 REFERENCE DOCUMENTS

### Design System
- **Design Tokens:** `/docs/design-tokens.md`
- **Component Examples:** `/docs/component-examples.md`
- **Accessibility:** `/docs/accessibility-checklist.md`
- **Project Structure:** `/docs/PROJECT-STRUCTURE.md`

### Build & Deployment
- **Build Instructions:** `/docs/build/BUILD-INSTRUCTIONS.md`
- **WordPress Deployment:** `/docs/build/WORDPRESS-DEPLOYMENT-AUDIT.md`
- **Performance Audit:** `/docs/build/AUDIT-EXECUTIVE-SUMMARY.md`

### Project Planning
- **Consolidation Plan:** `/docs/project/CONSOLIDATION-PLAN.md`
- **Component Inventory:** `/docs/project/COMPONENT-INVENTORY.md`
- **Assets Inventory:** `/docs/project/ASSETS-INVENTORY.md`

### AI Assistance
- **Cursor Rules:** `/.cursorrules`

---

## 🎯 MVW (MINIMUM VIABLE WEBSITE) GOALS

### Current Status: Week 41, Q4 2025

#### Phase 1: Foundation ✅ COMPLETE
- [x] Design system consolidated
- [x] Build pipeline functional
- [x] Documentation organized
- [x] Single source of truth established

#### Phase 2: Core Components (Current Focus)
- [ ] Complete all atomic components
  - [x] Headlines, labels, links, paragraphs, quotes
  - [ ] Buttons (needs CSS separation)
  - [ ] Form inputs
  - [ ] Icons (already in sprites)
- [ ] Essential molecules
  - [ ] Card variants (exist, need CSS)
  - [ ] Form components (exist, need CSS)
  - [ ] Navigation menus (exist, need CSS)
- [ ] Key organisms
  - [ ] Hero sections (exist, need CSS)
  - [ ] Header with nav (exists, need CSS)
  - [ ] Footer (exists, need CSS)

#### Phase 3: Templates (Upcoming)
- [x] Homepage template
- [x] About/Contact template
- [x] Blog template
- [ ] WordPress integration complete

#### Phase 4: Launch (Week 44-45)
- [ ] Staging deployment
- [ ] Testing & QA
- [ ] Production launch

---

## 💡 BEST PRACTICES

### Daily Workflow

**Morning:**
1. Review yesterday's END-OF-DAY-SUMMARY.md
2. Check TOMORROW-MORNING-START-HERE.md
3. Run `npm run build` to verify system
4. Plan today's tasks

**During Development:**
1. Use `npm run watch` for auto-rebuild
2. Test in browser frequently
3. Check accessibility as you go
4. Commit working code regularly

**End of Day:**
1. Run final `npm run build`
2. Commit your work
3. Update END-OF-DAY-SUMMARY.md
4. Update TOMORROW-MORNING-START-HERE.md

### Code Quality

**Before Committing:**
- [ ] Build succeeds (`npm run build`)
- [ ] No console errors
- [ ] Responsive on mobile, tablet, desktop
- [ ] Accessibility features present
- [ ] Design tokens used (no hardcoded values)
- [ ] BEM naming followed

### Performance

**Keep It Fast:**
- Use sprite sheets for icons (already done ✅)
- Minimize CSS specificity
- Avoid `!important`
- Use CSS custom properties
- Let build system minify

---

## 🚨 WHAT NOT TO DO

### NEVER:
1. **Edit files in `dist/`** - These are auto-generated
2. **Create new design tokens** without approval
3. **Use hardcoded colors/spacing** - Always use tokens
4. **Mix camelCase and kebab-case** - Use kebab-case
5. **Skip accessibility** - It's required
6. **Work in archived directory** - Use Development Files only
7. **Bypass build process** - Always build before deploy

---

## ✅ QUICK CHECKLIST

### Starting Work
- [ ] In Development Files directory
- [ ] Build system working (`npm run build`)
- [ ] Know today's goal
- [ ] Know which component level (atom/molecule/organism/template)

### Creating Components
- [ ] Both HTML and CSS files created
- [ ] BEM naming used
- [ ] Design tokens used (no hardcoded values)
- [ ] Responsive breakpoints included
- [ ] Accessibility features added
- [ ] Component documentation header
- [ ] Build succeeds

### Before Deploying
- [ ] Production build complete
- [ ] Files verified in dist/
- [ ] Tested in browser
- [ ] WordPress enqueue code ready
- [ ] Version number updated
- [ ] Documentation updated

---

## 📞 NEED HELP?

### Documentation
- Check `/docs/README.md` for design system overview
- Check `/docs/build/BUILD-INSTRUCTIONS.md` for build help
- Check `/docs/component-examples.md` for usage patterns
- Check `.cursorrules` for AI assistance rules

### Common Issues
- **Build fails:** See Troubleshooting section above
- **CSS not updating:** Clear caches, hard refresh
- **Can't find component:** Search with `grep -r`
- **Path confusion:** Everything is in Development Files now

---

## 🎉 SUCCESS METRICS

You're doing great when:
- ✅ Build completes without errors
- ✅ Components use design tokens
- ✅ BEM naming is consistent
- ✅ Responsive on all devices
- ✅ Accessible to all users
- ✅ Documentation is up-to-date
- ✅ Code is in Development Files (not archive)

---

**You're ready to build! 🚀**

**Current Status:** Week 41, Wednesday, October 8, 2025  
**Next Milestone:** Complete Phase 2 core components (Week 42-43)  
**Launch Target:** Week 44-45

---

*This guide is your daily reference. Bookmark it!*
