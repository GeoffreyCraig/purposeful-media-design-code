# WordPress Template Issues Tracker
**Created:** November 10, 2025
**Phase:** 3 - Template Conversions
**Purpose:** Track and resolve all issues across 6 WordPress templates

---

## 🎯 Current Status: Testing Phase

### Templates Overview
- ✅ **Template 1:** Homepage (front-page.php) - CONVERTED, TESTING IN PROGRESS
- ⏳ **Template 2:** Pillar Page (template-pillar-page.php) - NOT YET CONVERTED
- ⏳ **Template 3:** Interior Page (page.php) - NOT YET CONVERTED
- ⏳ **Template 4:** About/Contact (template-about-contact.php) - NOT YET CONVERTED
- ⏳ **Template 5:** Blog (template-blog.php) - NOT YET CONVERTED
- ⏳ **Template 6:** Resource (template-resource.php) - NOT YET CONVERTED

---

## 📋 GLOBAL ISSUES (Affect Multiple Templates)

### Issue #G1: Body Padding (32px)
- **Status:** 🔴 IDENTIFIED
- **Severity:** LOW
- **Affects:** All templates
- **Description:** 32px padding around body element
- **Root Cause:** TBD - WordPress admin bar or theme default
- **Solution:** Add to style.css: `body { margin: 0 !important; padding: 0 !important; }`
- **Files to Modify:** `style.css`
- **Testing:** View logged out (incognito) to verify

### Issue #G2: Missing Asset Files
- **Status:** 🔴 IDENTIFIED
- **Severity:** MEDIUM
- **Affects:** Multiple templates
- **Description:** 16 console errors for missing assets
- **Missing Files:**
  1. `hero-slide-1-fallback.jpg` - Hero carousel fallback
  2. `hero-slide-2-fallback.jpg` - Hero carousel fallback
  3. `hero-slide-3-fallback.jpg` - Hero carousel fallback
  4. `sample-ebook-cover.jpg` - Featured resource thumbnail
  5. `Tile cell .png` - Background pattern for DesktopPlus
  6. UI Sprite Sheet - `/assets/svg/ui-icons/purposeful-sprite-ui.svg`
  7-16. Various undefined links (placeholder hrefs)
- **Solution:** Upload missing assets to WordPress theme
- **Upload Location:** `/wp-content/themes/purposeful-media/assets/`

---

## 🏠 TEMPLATE 1: HOMEPAGE (front-page.php)

### Testing URL: `[STAGING_URL]`
**Last Tested:** November 10, 2025
**Overall Status:** ✅ WORKING - Minor fixes needed

### Confirmed Working ✅
- Hero carousel auto-play
- Hero carousel navigation (arrows + indicators)
- All 3 video slides play correctly
- Services section text formatting
- Responsive layouts (Mobile, Tablet)
- All existing JPEGs load
- All existing MP4s load

### Issues Found 🔴

#### HP-001: Body Padding
- **Category:** Layout
- **Priority:** LOW
- **Description:** 32px padding around page body
- **See:** Global Issue #G1
- **Status:** Pending fix

#### HP-002: Missing Hero Fallback Images
- **Category:** Assets
- **Priority:** MEDIUM
- **Description:** Console 404 errors for 3 fallback images
- **See:** Global Issue #G2
- **Files:** hero-slide-1/2/3-fallback.jpg
- **Status:** Pending upload

#### HP-003: Missing eBook Cover
- **Category:** Assets
- **Priority:** MEDIUM
- **Description:** Console 404 for featured resource thumbnail
- **See:** Global Issue #G2
- **File:** sample-ebook-cover.jpg
- **Status:** Pending upload

#### HP-004: Missing Background Pattern
- **Category:** Assets
- **Priority:** LOW
- **Description:** DesktopPlus tile background missing
- **See:** Global Issue #G2
- **File:** Tile cell .png
- **Status:** Pending upload

#### HP-005: Placeholder Links
- **Category:** Functionality
- **Priority:** LOW
- **Description:** Undefined href links causing console errors
- **Locations:**
  - Menu items (email-management, content-creation, webinar-production, etc.)
  - Blog card links
  - CTA buttons (Schedule, Get in Touch)
- **Solution:** Define actual URLs or use '#' temporarily
- **Status:** Pending definition

#### HP-006: Layout Tweaks Needed
- **Category:** Layout
- **Priority:** LOW
- **Description:** Minor responsive layout adjustments needed (user to document specifics)
- **Breakpoints Affected:** TBD
- **Status:** Pending user documentation

### Breakpoint Testing Results

#### Mobile (380-767px)
- **Status:** ✅ GOOD
- **Issues:** Minor tweaks needed (TBD)
- **Notes:** Single column layout working

#### Tablet (768-1149px)
- **Status:** ✅ GOOD
- **Issues:** Minor tweaks needed (TBD)
- **Notes:** Two-column layout working

#### Desktop (1150-1919px)
- **Status:** ⏳ PENDING
- **Issues:** TBD
- **Notes:** Not yet tested

#### DesktopPlus (1920px+)
- **Status:** ⏳ PENDING
- **Issues:** TBD
- **Notes:** Not yet tested

---

## 📄 TEMPLATE 2: PILLAR PAGE (template-pillar-page.php)

### Testing URL: `[TO BE CREATED]`
**Status:** ⏳ NOT YET CONVERTED

### Conversion Priority: HIGH (Priority #2)

### Pre-Conversion Checklist
- [ ] Source file: `/components/templates/pillar-page-template.html`
- [ ] Unique components: Sticky menu, FAQ accordion
- [ ] Custom JavaScript: Sticky menu scroll detection
- [ ] Special considerations: Multiple anchor sections

### Issues Found 🔴
_Template not yet created - issues will be documented during testing_

---

## 📄 TEMPLATE 3: INTERIOR PAGE (page.php)

### Testing URL: `[TO BE CREATED]`
**Status:** ⏳ NOT YET CONVERTED

### Conversion Priority: HIGH (Priority #3)

### Pre-Conversion Checklist
- [ ] Source file: `/components/templates/interior-page-template.html`
- [ ] This is the default page template
- [ ] Should use WordPress content editor
- [ ] Simpler structure than other templates

### Issues Found 🔴
_Template not yet created - issues will be documented during testing_

---

## 📞 TEMPLATE 4: ABOUT/CONTACT PAGE (template-about-contact.php)

### Testing URL: `[TO BE CREATED]`
**Status:** ⏳ NOT YET CONVERTED

### Conversion Priority: MEDIUM (Priority #4)

### Pre-Conversion Checklist
- [ ] Source file: `/components/templates/about-contact-page-template.html`
- [ ] Includes contact form (needs plugin integration)
- [ ] Includes FAQ section
- [ ] Form submission handling TBD

### Issues Found 🔴
_Template not yet created - issues will be documented during testing_

---

## 📝 TEMPLATE 5: BLOG PAGE (template-blog.php)

### Testing URL: `[TO BE CREATED]`
**Status:** ⏳ NOT YET CONVERTED

### Conversion Priority: MEDIUM (Priority #5)

### Pre-Conversion Checklist
- [ ] Source file: `/components/templates/blog-page-template.html`
- [ ] Requires WordPress Loop integration
- [ ] Create archive.php for archives
- [ ] Create single.php for individual posts
- [ ] Pagination needed

### Issues Found 🔴
_Template not yet created - issues will be documented during testing_

---

## 📚 TEMPLATE 6: RESOURCE PAGE (template-resource.php)

### Testing URL: `[TO BE CREATED]`
**Status:** ⏳ NOT YET CONVERTED

### Conversion Priority: MEDIUM (Priority #6)

### Pre-Conversion Checklist
- [ ] Source file: `/components/templates/resource-page-template.html`
- [ ] Return-to-top button included
- [ ] Resource grid responsive layout
- [ ] May need custom post type for resources

### Issues Found 🔴
_Template not yet created - issues will be documented during testing_

---

## 🔧 FIX BATCHES

### Batch 1: Critical Assets Upload
**Target Date:** November 10, 2025
**Priority:** HIGH

**Files to Upload:**
1. ✅ Upload hero fallback images (3 files)
2. ✅ Upload eBook cover thumbnail
3. ✅ Upload background tile pattern PNG
4. ✅ Verify UI sprite sheet in correct location

**Upload Instructions:**
- Via cPanel File Manager
- Navigate to: `/wp-content/themes/purposeful-media/assets/`
- Upload to appropriate subdirectories:
  - Images → `/images/`
  - Patterns → `/patterns/` (create if needed)
  - SVG sprites → `/svg/ui-icons/`

---

### Batch 2: Global CSS Fixes
**Target Date:** November 10, 2025
**Priority:** MEDIUM

**Changes:**
1. ✅ Fix body padding in `style.css`
2. ✅ Document and fix any other global styling issues discovered during testing

**Files to Modify:**
- `style.css`
- Possibly `templates-base.css`

---

### Batch 3: Link Definitions
**Target Date:** TBD
**Priority:** LOW

**Tasks:**
1. Define actual URLs for all menu items
2. Update blog card links
3. Update CTA button destinations
4. Create placeholder pages if needed

**Files to Modify:**
- `header.php` (menu links)
- `front-page.php` (blog links, CTA buttons)
- Other templates as converted

---

### Batch 4: Responsive Tweaks
**Target Date:** TBD
**Priority:** LOW

**Tasks:**
1. Document specific layout issues at each breakpoint
2. Identify CSS adjustments needed
3. Test and apply fixes
4. Re-test at all 4 breakpoints

**Files to Modify:** TBD based on findings

---

## 📊 TESTING PROTOCOL

### For Each Template:

#### Phase 1: Initial Load Test
- [ ] Template displays without fatal errors
- [ ] Basic structure renders correctly
- [ ] Header displays
- [ ] Footer displays
- [ ] No white screen of death

#### Phase 2: Visual Inspection
- [ ] All sections present
- [ ] Text formatting correct
- [ ] Images load
- [ ] Icons display
- [ ] Spacing looks correct

#### Phase 3: Functional Testing
- [ ] All links work (or show proper placeholders)
- [ ] Forms function (if applicable)
- [ ] JavaScript elements work (carousels, accordions, etc.)
- [ ] Buttons are clickable
- [ ] Navigation works

#### Phase 4: Responsive Testing
Test at each breakpoint:
- [ ] **Mobile** (380px): Layout appropriate, touch targets adequate
- [ ] **Tablet** (768px): Layout transitions correctly
- [ ] **Desktop** (1200px): All features visible and functional
- [ ] **DesktopPlus** (1920px+): Containerization + background pattern working

#### Phase 5: Console Check
- [ ] No JavaScript errors
- [ ] No CSS errors
- [ ] No 404 errors (except known missing assets)
- [ ] No console warnings (or document acceptable ones)

#### Phase 6: Cross-Browser Testing
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)

---

## 🎯 SUCCESS CRITERIA

### Template is "Production Ready" when:
1. ✅ Zero fatal errors
2. ✅ All sections render correctly
3. ✅ All assets load (no 404s)
4. ✅ Responsive at all 4 breakpoints
5. ✅ No console errors (JavaScript/CSS)
6. ✅ Cross-browser compatible
7. ✅ Matches HTML template visually
8. ✅ All interactive elements functional
9. ✅ Accessibility standards maintained
10. ✅ Passes user QA inspection

---

## 📝 NOTES & OBSERVATIONS

### Session Notes - November 10, 2025 (Morning)

**Achievements:**
- ✅ Successfully converted front-page.php to WordPress
- ✅ Theme v2.0.0 uploaded to staging
- ✅ Homepage rendering correctly overall
- ✅ Videos and images loading properly
- ✅ Responsive layouts working (mobile/tablet confirmed good)

**Key Findings:**
- Homepage looks "excellent" overall (user feedback)
- 32px padding issue identified (minor)
- 16 console errors catalogued (all accounted for)
- Minor layout tweaks needed (to be documented)

**Next Steps:**
1. Create test pages for all 6 templates
2. User will inspect and document specific issues for each
3. Batch fix all issues at once
4. Re-upload updated theme
5. Retest iteratively

**Workflow Decision:**
- Convert all 6 templates first
- Test all templates
- Document all issues
- Fix everything in batches
- More efficient than fix-as-you-go approach

---

## 🔄 UPDATE LOG

### 2025-11-10 09:00 AM - Initial Document Created
- Created tracking structure for 6 templates
- Documented 16 homepage console errors
- Identified global issues (body padding, missing assets)
- Established testing protocol
- Created fix batch structure

---

## 📎 APPENDIX

### Missing Asset Locations (Source Files)

**Hero Fallback Images:**
- Check: `/assets/images/` for any hero-related images
- May need to create from video first frames

**eBook Cover:**
- Check: `/assets/images/sample-ebook-cover.jpg`
- Or: `/assets/images/four-hour-marketing-plan-TN.png` (existing)

**Background Pattern:**
- File: `/assets/patterns/Tile cell .png`
- Used for DesktopPlus (1920px+) background

**UI Sprite Sheet:**
- Should be: `/assets/svg/ui-icons/purposeful-sprite-ui.svg`
- Verify file exists in theme package

---

## 🆘 TROUBLESHOOTING

### If homepage doesn't display at all:
1. Check theme is activated
2. Check homepage is set in Settings → Reading
3. Check file permissions (644 for files, 755 for directories)
4. Clear WordPress cache (if caching plugin installed)
5. Check error logs in cPanel

### If assets don't load:
1. Verify file paths are correct
2. Check file permissions
3. Clear browser cache
4. Check .htaccess not blocking assets
5. Verify files uploaded to correct directory

### If styling looks broken:
1. Check all CSS files uploaded
2. Verify enqueue.php loading styles correctly
3. Check for CSS conflicts with plugins
4. Inspect console for CSS 404 errors
5. Clear browser cache and WordPress cache

---

**Document Version:** 1.0
**Last Updated:** November 10, 2025 09:45 AM
**Updated By:** Claude (AI Assistant)
**Status:** Living Document - Update as issues discovered

## Change Requested By: [Geoffrey Craig]

Page Templates Issues by page name [template name] with quality notes scored out of ten.

Check all four breakpoints

Policy Page [Interior] 9/10

1. Body Class has unwanted 32px padding changes to 16px in Mobile
2. DesktopPlus missing background tiling PNG file
3. It's unclear to me the file source of the return-button arrow button: It should be the non-connected UI sprite sheet
4. Console Statements:
	1. purposeful-sprite-ui.svg:1  Failed to load resource: the server responded with a status of 404 ()
	2. Tile%20cell%20.png:1  Failed to load resource: the server responded with a status of 404 ()
	3. background-redux-new.js:1 Uncaught (in promise) Error: No tab with id: 1520593169.

About and Contact [About&Contact] 9/10

1. Body Class has unwanted 32px padding changes to 16px in Mobile
2. DesktopPlus missing background tiling PNG file
3. Missing UI sprite sheet defined <li> element mark
4. It's unclear to me the file source of the return-button arrow button: It should be the non-connected UI sprite sheet; Likewise the custom list bullet mark
5. Console Statements:
	1. background-redux-new.js:1 Uncaught (in promise) Error: No tab with id: 1520593169.
	2. section-faq-group.js?ver=2.0.0:328 Section/FAQ Group component loaded successfully
	3. section-faq-group.js?ver=2.0.0:22 No FAQ sections found on page

Blogs [Blog Archive] 8/10

1. Body Class has unwanted 32px padding changes to 16px in Mobile
2. DesktopPlus missing background tiling PNG file
3. Missing blog content container and placeholder card mockups but WordPress functionally acknowledges that no posts are available
4. It's unclear to me the file source of the return-button arrow button: It should be the non-connected UI sprite sheet
5. Console Statements:
	1. purposeful-sprite-ui.svg:1  Failed to load resource: the server responded with a status of 404 ()

Home [Homepage (front page)] 7/10

1. Body Class has unwanted 32px padding changes to 16px in Mobile
2. DesktopPlus missing background tiling PNG file
3. Missing Slide fallback images. Use these files:
	1. Hero slide 1 fallback: shutterstock_2492759463.jpg
	2. Hero slide 2 fallback: shutterstock_1157933710.jpg
	3. Hero slide 3 fallback: shutterstock_2618933959.jpg
4. Missing UI sprite sheet defined <li> element mark 
5. The content-2column-resource-production is broken:
	1. Background image is present but not visible
	2. Thumbnail image missing (not yet provided)
	3. The right-column container card text extending to the right without card limits.
6. It's unclear to me the file source of the return-button arrow button: It should be the non-connected UI sprite sheet; Likewise the custom list bullet mark
7. Console Statements:
	1. hero-slide-1-fallback.jpg:1  Failed to load resource: the server responded with a status of 404 ()
	2. hero-slide-2-fallback.jpg:1  Failed to load resource: the server responded with a status of 404 ()
	3. hero-slide-3-fallback.jpg:1  Failed to load resource: the server responded with a status of 404 ()
	4. sample-ebook-cover.jpg:1  Failed to load resource: the server responded with a status of 404 ()
	5. Tile%20cell%20.png:1  Failed to load resource: the server responded with a status of 404 ()
	6. purposeful-sprite-ui.svg:1  Failed to load resource: the server responded with a status of 404 ()
	7. 2182/contact:1  Failed to load resource: the server responded with a status of 404 ()
	8. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	9. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	10. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	11. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	12. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	13. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	14. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	15. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	16. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	17. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	18. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	19. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	20. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	21. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	22. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	23. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	24. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	25. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	26. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	27. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	28. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	29. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	30. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	31. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	32. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	33. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22
	34. hero-carousel.js?ver=2.0.0:90 Video autoplay failed: AbortError: The play() request was interrupted because video-only background media was paused to save power. https://goo.gl/LdLk22

Purposeful Resources Library [Resources] 6/10

1. Body Class has unwanted 32px padding changes to 16px in Mobile
2. DesktopPlus missing background tiling PNG file
3. I think there is some confusion caused by previous the previous version of the site and residual files and styles.
4. Read the docs/TEMPLATE COMPONENT LISTS/ResourcePageStructureList.md file and replace the incorrect components
5. Content Section 2: Featured Resource: content-2column-resource layout and background correct but the eBook thumbnail still needs to be uploaded
6. Content Section 3: Good enough for now
7. Content Section 4 should be different. Here is where we have the biggest issue:
	1. Should be Section 4: Start the Conversation (not Contact CTA)
	2. Replace banner Banner Spacer: Your Next Step with Headline Banner Atom ; text: Start the Conversation
	3. Replace Content 2-Column Contact Integrated with Content 2 Column Contact Component 
8. Console Statements:
	1. background-redux-new.js:1 Uncaught (in promise) Error: No tab with id: 1520593207.
	   background-redux-new.js:1 Uncaught (in promise) Error: No tab with id: 1520593198.
	   sample-ebook-cover.jpg:1  Failed to load resource: the server responded with a status of 404 ()
	   resources-section-adapter.js?ver=2.0.0:568 Resources Section detected, auto-initializing...
	   resources-section-adapter.js?ver=2.0.0:121 Initializing Resources Section...
	   resources-section-adapter.js?ver=2.0.0:135 Fetching from: /wp-json/wp/v2/resources?per_page=8&orderby=date&order=desc&_embed=true
	   /wp-json/wp/v2/resources?per_page=8&orderby=date&order=desc&_embed=true:1  Failed to load resource: the server responded with a status of 404 ()
	   resources-section-adapter.js?ver=2.0.0:222 Error fetching resources: Error: HTTP 404:
	   at fetchWordPressResources (resources-section-adapter.js?ver=2.0.0:215:19)
	   at async initializeResourcesSection (resources-section-adapter.js?ver=2.0.0:138:27)
	   fetchWordPressResources @ resources-section-adapter.js?ver=2.0.0:222
	   resources-section-adapter.js?ver=2.0.0:156 ❌ Error initializing Resources Section: Error: HTTP 404:
	   at fetchWordPressResources (resources-section-adapter.js?ver=2.0.0:215:19)
	   at async initializeResourcesSection (resources-section-adapter.js?ver=2.0.0:138:27)
	   initializeResourcesSection @ resources-section-adapter.js?ver=2.0.0:156
	   resources-section-adapter.js?ver=2.0.0:573 Auto-initialization failed: ReferenceError: container is not defined
	   at initializeResourcesSection (resources-section-adapter.js?ver=2.0.0:159:30)
	   (anonymous) @ resources-section-adapter.js?ver=2.0.0:573

Pillar page test [Pillar Page] 5/10

1. Body Class has unwanted 32px padding changes to 16px in Mobile
2. DesktopPlus missing background tiling PNG file
3. Again, I think there is some confusion caused by previous the previous version of the site and residual files and styles.
4. Read the docs/TEMPLATE COMPONENT LISTS/ResourcePageStructureList.md file and replace the incorrect components
5. FAQ section component appears to be either broken or needs further defining in WordPress, possibly with the ACF Pro plugin.
6. Replace the Content 2-Column Integrated component with Content 2-Column Graphic 
7. Console Statements:
	1. section-faq-group.js?ver=2.0.0:328 Section/FAQ Group component loaded successfully
	2. section-faq-group.js?ver=2.0.0:26 Initializing 1 FAQ section(s)
	3. section-faq-group.js?ver=2.0.0:47 Section 0: Found 5 FAQ items
	4. Tile%20cell%20.png:1  Failed to load resource: the server responded with a status of 404 ()
	5. background-redux-new.js:1 Uncaught (in promise) Error: No tab with id: 1520593207.
	6. background-redux-new.js:1 Uncaught (in promise) Error: No tab with id: 1520593198.
