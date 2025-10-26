# Tomorrow Morning - Start Here! ☕
**Date:** October 8, 2025  
**Task:** Complete Homepage Template Integration  
**Time Needed:** 2-3 hours

---

## 🎯 Today's Goal

**Create ONE complete, working static homepage** with:
- ✅ Full header (logo, navigation, mobile menu)
- ✅ All content sections (hero, value prop, services, stats, etc.)
- ✅ Full footer (menus, newsletter, mobile version)
- ✅ All CSS/JS working
- ✅ All icons displaying
- ✅ Fully responsive

**Result:** A polished homepage you can review before tackling other Figma templates.

---

## ✅ What's Already Done (Last Night)

### Build System - COMPLETE ✅
```
✅ npm installed (138 packages)
✅ CSS bundled → dist/css/purposeful-main.min.css (111KB)
✅ JS bundled → dist/js/purposeful-main.min.js (20KB)
✅ All organism styles included in build
✅ Build process working perfectly
```

### Homepage Content Shell - PARTIAL ⏸️
```
✅ Content sections created
✅ Icon integrations working
✅ Typography examples included
⏸️ Header organism not integrated yet
⏸️ Footer organism not integrated yet
```

---

## 📋 This Morning's Tasks

### Task 1: Integrate Complete Header (45 min)

**Source file:**
```
components/organisms/banner-header-main-mobile-fix-v3.html
```

**What to extract:**
- Logo and logo link
- Desktop navigation menu with dropdowns
- Mobile hamburger menu
- All navigation links

**What to update:**
- Asset paths for logo SVG
- CSS file reference (use built dist/css/purposeful-main.min.css)
- Verify styles load correctly

---

### Task 2: Integrate Complete Footer (45 min)

**Source file:**
```
components/organisms/footer-unified.html
```

**What to extract:**
- Desktop footer (4 columns: Services, Who We Serve, Resources, Company)
- Mobile footer (accordion menus)
- Newsletter signup form
- Copyright/attribution section

**What to update:**
- Asset paths for footer logo
- CSS file reference (use built dist/css/purposeful-main.min.css)
- Newsletter form action (set up for HubSpot later)

---

### Task 3: Fix Asset Paths (20 min)

**Files to check:**
```
assets/svg/logos/purposeful-media-logo-*.svg
assets/svg/decorative-icons/purposeful-sprite-symbolic.svg
assets/svg/ui-icons/purposeful-sprite-ui.svg
```

**Path pattern from templates/:**
```
../assets/svg/logos/filename.svg
../assets/svg/decorative-icons/filename.svg
```

**Update in:**
- Header logo references
- Footer logo references
- Icon sprite references (in CSS - already correct)

---

### Task 4: Test Complete Page (30 min)

**Open in browser:**
```bash
open "/Users/geoffreycraig/Library/CloudStorage/Dropbox/PURPOSEFUL MEDIA PROMOTIONS/WEBSITE PROJECT/Development Files/templates/front-page.html"
```

**Test checklist:**
- [ ] Header displays with logo
- [ ] Desktop navigation works
- [ ] Mobile hamburger menu works
- [ ] All content sections display
- [ ] All icons show up correctly
- [ ] Footer displays with all menus
- [ ] Newsletter form displays
- [ ] Responsive works at all breakpoints
- [ ] No console errors
- [ ] Everything looks polished

---

## 🗂️ Files You'll Need

### Reference Files (Read These)
```
components/organisms/banner-header-main-mobile-fix-v3.html  ← Header source
components/organisms/footer-unified.html                    ← Footer source
```

### Files to Edit
```
templates/front-page.html  ← Add header/footer here
```

### Built Files (Should Work As-Is)
```
dist/css/purposeful-main.min.css  ← All styles (111KB, rebuilt last night)
dist/js/purposeful-main.min.js    ← All scripts (20KB)
```

---

## 💡 Integration Approach

### Recommended Method:

**1. Create Clean Working Copy**
```bash
# Backup current version
cp templates/front-page.html templates/front-page-backup.html

# Work on front-page.html
```

**2. Add Header Section**
- Copy HTML structure from banner-header-main organism
- Remove embedded `<style>` tags (styles are in built CSS now)
- Update logo path: `src="../../assets/svg/logos/..."` → `src="../assets/svg/logos/..."`
- Keep JavaScript for menu functionality

**3. Add Footer Section**
- Copy HTML structure from footer-unified organism
- Remove embedded `<style>` tags (styles are in built CSS now)
- Update logo path
- Keep JavaScript for mobile footer functionality

**4. Update `<head>` Section**
```html
<!-- Use built CSS -->
<link rel="stylesheet" href="../dist/css/purposeful-main.min.css">

<!-- Add Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;800;900&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
```

**5. Add Scripts Before `</body>`**
```html
<!-- Built JS -->
<script src="../dist/js/purposeful-main.min.js"></script>

<!-- Page-specific initialization -->
<script>
  // Blog section, icon initialization, etc.
</script>
```

---

## 🚨 Potential Issues to Watch For

### Issue 1: Logo Not Displaying
**Cause:** Incorrect path  
**Check:** Verify logo files exist in `assets/svg/logos/`  
**Fix:** Update path to `../assets/svg/logos/purposeful-media-logo-white-desktop.svg`

### Issue 2: Icons Not Showing
**Cause:** Icon sprites not loading  
**Check:** Console for 404 errors  
**Fix:** Verify sprite paths in CSS are correct

### Issue 3: Menu Doesn't Work
**Cause:** JavaScript not loading  
**Check:** Console for JavaScript errors  
**Fix:** Verify dist/js/purposeful-main.min.js is loaded

### Issue 4: Styling Looks Wrong
**Cause:** CSS not loading or old version cached  
**Fix:** Hard refresh (Cmd+Shift+R) or rebuild CSS

---

## 📝 Quick Commands for Tomorrow

```bash
# Navigate to project
cd "/Users/geoffreycraig/Library/CloudStorage/Dropbox/PURPOSEFUL MEDIA PROMOTIONS/WEBSITE PROJECT/Development Files"

# Rebuild if needed
npm run build

# Check file sizes
ls -lh dist/css/
ls -lh dist/js/

# Open homepage in browser
open templates/front-page.html

# Watch for changes while editing
npm run watch
```

---

## 🎯 Success Criteria

**You'll know it's done when:**
1. Page opens in browser without errors
2. Header displays with logo and navigation
3. All 10 content sections display correctly
4. All 13 icons show up properly
5. Footer displays with all menus
6. Responsive works (resize browser window)
7. Navigation/menus are functional
8. Page looks professional and complete

---

## 💡 After Homepage is Complete

**Then you can:**
1. Review the complete design
2. Adjust content/copy as needed
3. Share with team for feedback
4. Prepare for other Figma templates
5. Plan WordPress theme structure
6. Get ready for Bluehost sandbox deployment

---

## 📊 Current Status

```
Phase 1 MVW Progress: 80% Complete

✅ Design System: 100% (all layers done)
✅ Build Process: 100% (working perfectly)
⏸️ Homepage Template: 60% (needs header/footer)
⏳ WordPress Theme: 0% (after homepage done)
⏳ Sandbox Deployment: 0% (after theme ready)
```

---

## 🗺️ The Path Forward

```
TODAY (Oct 8):
├── Complete homepage template (2-3 hours)
├── Review and refine
└── Ready for next steps

THIS WEEK:
├── Review Figma template designs
├── Refine based on lessons learned
├── Create WordPress theme structure
└── Speed run Bluehost deployment

NEXT WEEK:
├── Deploy remaining templates
├── Content population
├── Integration testing (HubSpot, Google, Semrush)
└── Phase 1 MVW Launch! 🚀
```

---

## 💭 Remember

**Your Wisdom from Yesterday:**
- Move deliberately, not frantically
- Complete one thing fully before starting next
- Your Figma templates need refinement based on lessons learned
- Speed run deployment will teach us what we need to know
- MVW = "good enough" not "perfect"

**The Plan:**
- Get homepage working completely today
- Review it properly
- Then tackle other templates methodically
- One step at a time, done right

---

## 🌅 Ready to Start?

**When you sit down this morning:**

1. ☕ Get coffee
2. 📖 Read this file (you're doing it now!)
3. 🔍 Open the source organism files to understand them
4. ✏️ Start integrating header into front-page.html
5. 🎨 Integrate footer
6. 🧪 Test complete page
7. 🎉 Celebrate complete homepage!

---

**Files last updated:** October 7, 2025 @ 5:04 PM  
**CSS build:** 111KB (includes all organisms)  
**JS build:** 20KB (includes all scripts)  
**Status:** Ready for header/footer integration

---

**Good night! See you tomorrow morning!** 🌙

**Tomorrow's motto:** *"Slow is smooth, smooth is fast"* 🎯

