# Phase 1 MVW Launch Plan
**Created:** Week 47, Friday, November 21, 2025  
**Project:** Purposeful Media Promotions - Minimum Viable Website Launch

---

## Executive Summary

This document provides a comprehensive plan for launching the Phase 1 Minimum Viable Website (MVW). All 6 WordPress templates are complete and functional (v2.0.5, zero defects). ACF Pro field groups are configured. This plan focuses on:

1. **Navigation Structure** - Menu setup and page hierarchy
2. **Page Creation** - Which pages to build and their templates
3. **Content Strategy** - What's dynamic (ACF) vs. hard-coded for Phase 1
4. **Launch Checklist** - Final steps before going live

---

## 1. Navigation Structure

### Main Navigation (Header Menu)

#### Desktop/Tablet Menu Structure:
```
Primary Navigation:
├── Home (/)
├── Solutions (Dropdown)
│   ├── Email Management (/services/email-management)
│   ├── Content Creation (/services/content-creation)
│   └── Webinar Production (/services/webinar-production)
├── Resources (Dropdown)
│   ├── Resource Library (/resources)
│   ├── About Us (/about)
│   └── Blog (/blog)
└── Contact (/contact)
```

#### Mobile Menu Structure:
Same as desktop but uses accordion-style dropdowns

### Footer Navigation (4 Columns)

#### Column 1: Services
```
Services:
├── Email Marketing (/services/email-management) ✅
├── Webinar Production (/services/webinar-production) ✅
├── Inbound Marketing (/services/inbound-marketing) ✅
├── Succession Planning [Coming Soon] 🚫
└── Business Unit Growth [Coming Soon] 🚫
```

#### Column 2: Who We Serve
```
Who We Serve:
├── Revenue Growth [Coming Soon] 🚫
├── Preparing for Exit [Coming Soon] 🚫
└── Plan a Webinar [Coming Soon] 🚫
```

#### Column 3: Resources
```
Resources:
├── Read Our Blog (/blog) ✅
├── Thought Leadership (/resources/thought-leadership) ✅
└── Pricing [Coming Soon] 🚫
```

#### Column 4: Company
```
Company:
├── About Us (/about) ✅
├── Contact Us (/contact) ✅
├── Privacy Policy (/privacy) ⚠️ NEED
└── Affiliates [Coming Soon] 🚫
```

**Legend:**
- ✅ = Build for Phase 1
- ⚠️ = Optional/minimal version for Phase 1
- 🚫 = Phase 2 (display as "Coming Soon")

---

## 2. Pages to Create for Phase 1 MVW

### Essential Pages (Must Build)

| Page Name | Template | URL | Priority | ACF Fields |
|-----------|----------|-----|----------|------------|
| **Homepage** | `front-page.php` | `/` | 🔴 Critical | Homepage Welcome, Homepage Text Block, Homepage Icon Banner, Featured Resource, 2-Column CTA |
| **Email Management** | `template-pillar-page.php` | `/services/email-management` | 🔴 Critical | Pillar Hero, Text Block, Banner, Blog Teaser Cards, Featured Resource, FAQ, 2-Column CTA |
| **Content Creation** | `template-pillar-page.php` | `/services/content-creation` | 🔴 Critical | Same as above |
| **Webinar Production** | `template-pillar-page.php` | `/services/webinar-production` | 🔴 Critical | Same as above |
| **About Us** | `template-about-contact.php` | `/about` | 🔴 Critical | Hero Simple, Text Block, 2-Column CTA |
| **Contact** | `template-about-contact.php` | `/contact` | 🔴 Critical | Hero Simple, Text Block, 2-Column CTA |
| **Blog Archive** | `template-blog.php` | `/blog` | 🟡 Important | Hero Simple, Text Block |
| **Resources** | `template-resource.php` | `/resources` | 🟡 Important | Hero Simple, Text Block, Banner, Blog Teaser Cards, Featured Resource, 2-Column CTA |

### Optional Pages (Nice to Have)

| Page Name | Template | URL | Priority | Notes |
|-----------|----------|-----|----------|-------|
| **Inbound Marketing** | `page.php` | `/services/inbound-marketing` | 🟢 Optional | Interior page format, simpler than Pillar |
| **Thought Leadership** | `page.php` | `/resources/thought-leadership` | 🟢 Optional | Interior page format |
| **Privacy Policy** | `page.php` | `/privacy` | 🟢 Optional | Basic legal page |

### Pages to Defer to Phase 2

- Succession Planning
- Business Unit Growth
- Revenue Growth
- Preparing for Exit
- Plan a Webinar
- Pricing
- Affiliates

---

## 3. Content Strategy: Dynamic vs. Hard-Coded

### What CAN Be Dynamic (ACF Pro Fields Available)

#### Homepage:
- ✅ Hero Carousel (3 slides) - **CAN BE DYNAMIC** (Homepage Welcome fields)
- ✅ Services Text Block - **CAN BE DYNAMIC** (Homepage Text Block)
- ✅ Icon Banner - **CAN BE DYNAMIC** (Homepage Icon Banner)
- ✅ Featured Resource - **CAN BE DYNAMIC** (Featured Resource fields)
- ✅ 2-Column CTA Section - **CAN BE DYNAMIC** (2-Column CTA fields)

#### Pillar Pages (Services):
- ✅ Hero Section - **CAN BE DYNAMIC** (Pillar Hero fields)
- ✅ Service Description - **CAN BE DYNAMIC** (Text Block Section)
- ✅ Banner/Section Headers - **CAN BE DYNAMIC** (Banner Section)
- ✅ Blog Teasers - **CAN BE DYNAMIC** (Blog Teaser Cards)
- ✅ Featured Resource - **CAN BE DYNAMIC** (Featured Resource fields)
- ✅ FAQ Section - **CAN BE DYNAMIC** (FAQ Section)
- ✅ 2-Column CTA - **CAN BE DYNAMIC** (2-Column CTA fields)

#### About/Contact Pages:
- ✅ Hero Header - **CAN BE DYNAMIC** (Hero Simple fields)
- ✅ Content Sections - **CAN BE DYNAMIC** (Text Block Section)
- ✅ 2-Column CTA - **CAN BE DYNAMIC** (2-Column CTA fields)

#### Blog Archive:
- ✅ Hero Header - **CAN BE DYNAMIC** (Hero Simple fields)
- ✅ Intro Text - **CAN BE DYNAMIC** (Text Block Section)
- ⚠️ Blog Posts - **AUTOMATIC** (WordPress loop)

#### Resources Page:
- ✅ Hero Header - **CAN BE DYNAMIC** (Hero Simple fields)
- ✅ Intro Text - **CAN BE DYNAMIC** (Text Block Section)
- ✅ Section Banners - **CAN BE DYNAMIC** (Banner Section)
- ✅ Resource Teasers - **CAN BE DYNAMIC** (Blog Teaser Cards repurposed)
- ✅ Featured Resource - **CAN BE DYNAMIC** (Featured Resource fields)
- ✅ 2-Column CTA - **CAN BE DYNAMIC** (2-Column CTA fields)

### What MUST Be Hard-Coded for Phase 1

#### Navigation Menus:
- 🔴 **HARD-CODED** - Header menu items and dropdown links
- 🔴 **HARD-CODED** - Footer menu items
- **Reason**: Text Block component not ready; menu structure is stable and won't change frequently

#### Newsletter Form:
- 🔴 **HARD-CODED** - Footer newsletter signup form
- **Reason**: HubSpot integration planned for later; form structure is standard

#### Mobile Footer Accordion:
- 🔴 **HARD-CODED** - Footer dropdown JavaScript functionality
- **Reason**: Structural component, not content-driven

#### Return Button:
- 🔴 **HARD-CODED** - Scroll-to-top button
- **Reason**: Utility component with no variable content

### What WILL BE Deferred to Phase 2

#### Text Block Component (Advanced):
- 🔴 **PHASE 2** - Advanced text block with flexible layouts
- **Reason**: Component architecture not finalized; Phase 1 uses simplified Text Block Section from ACF

#### Dynamic Menu System:
- 🔴 **PHASE 2** - WordPress Custom Menu integration
- **Reason**: Current hard-coded menus sufficient for Phase 1; dynamic menus add complexity

---

## 4. ACF Field Group Assignments by Template

### Homepage (`front-page.php`)
**Field Groups Required:**
1. Homepage Welcome Section
2. Homepage Text Block Section
3. Homepage Icon Banner
4. Featured Resource
5. 2-Column CTA Section

**Total Fields to Populate:** ~25-30 fields

### Pillar Pages (`template-pillar-page.php`)
**Field Groups Required:**
1. Pillar Hero Section
2. Text Block Section
3. Banner Section
4. Blog Teaser Cards
5. Featured Resource
6. FAQ Section
7. 2-Column CTA Section

**Total Fields to Populate:** ~40-50 fields per page

### About/Contact (`template-about-contact.php`)
**Field Groups Required:**
1. Hero Section (Simple)
2. Text Block Section
3. 2-Column CTA Section

**Total Fields to Populate:** ~15-20 fields per page

### Blog (`template-blog.php`)
**Field Groups Required:**
1. Hero Section (Simple)
2. Text Block Section

**Total Fields to Populate:** ~8-10 fields

### Resources (`template-resource.php`)
**Field Groups Required:**
1. Hero Section (Simple)
2. Text Block Section
3. Banner Section
4. Blog Teaser Cards (repurposed for resources)
5. Featured Resource
6. 2-Column CTA Section

**Total Fields to Populate:** ~35-45 fields

### Interior Pages (`page.php`)
**Field Groups Required:**
1. Hero Section (Simple)
2. Text Block Section
3. Banner Section
4. 2-Column CTA Section

**Total Fields to Populate:** ~20-25 fields per page

---

## 5. WordPress Menu Configuration

### Create These Menus in WordPress

#### Menu 1: "Primary Navigation" (Header)
**Location:** Header  
**Items:**
1. Home (Custom Link: `/`)
2. Solutions (Custom Link: `#` - no link)
   - Email Management (Page: `/services/email-management`)
   - Content Creation (Page: `/services/content-creation`)
   - Webinar Production (Page: `/services/webinar-production`)
3. Resources (Custom Link: `#` - no link)
   - Resource Library (Page: `/resources`)
   - About Us (Page: `/about`)
   - Blog (Page: `/blog`)
4. Contact (Page: `/contact`)

**Note:** WordPress dropdown functionality may require JavaScript adjustment if WP menu structure differs from current implementation.

#### Menu 2: "Footer Services"
1. Email Marketing (Page)
2. Webinar Production (Page)
3. Inbound Marketing (Page)
4. Succession Planning (Custom Link: `#coming-soon` with `disabled` class)
5. Business Unit Growth (Custom Link: `#coming-soon` with `disabled` class)

#### Menu 3: "Footer Who We Serve"
1. Revenue Growth (Custom Link: `#coming-soon` with `disabled` class)
2. Preparing for Exit (Custom Link: `#coming-soon` with `disabled` class)
3. Plan a Webinar (Custom Link: `#coming-soon` with `disabled` class)

#### Menu 4: "Footer Resources"
1. Read Our Blog (Page: `/blog`)
2. Thought Leadership (Page or Custom Link)
3. Pricing (Custom Link: `#coming-soon` with `disabled` class)

#### Menu 5: "Footer Company"
1. About Us (Page: `/about`)
2. Contact Us (Page: `/contact`)
3. Privacy Policy (Page: `/privacy` or Custom Link)
4. Affiliates (Custom Link: `#coming-soon` with `disabled` class)

---

## 6. Phase 1 Launch Checklist

### Pre-Launch Technical Tasks

#### WordPress Configuration:
- [ ] All 8 pages created in WordPress
- [ ] Page templates assigned correctly
- [ ] All 5 WordPress menus created and assigned
- [ ] Permalink structure set to "Post name"
- [ ] Homepage set to static page (front-page.php)
- [ ] Blog page set to posts page

#### ACF Field Population:
- [ ] Homepage - All 5 field groups populated
- [ ] Email Management - All 7 field groups populated
- [ ] Content Creation - All 7 field groups populated
- [ ] Webinar Production - All 7 field groups populated
- [ ] About Us - All 3 field groups populated
- [ ] Contact - All 3 field groups populated
- [ ] Blog - All 2 field groups populated
- [ ] Resources - All 6 field groups populated

#### Content Review:
- [ ] All placeholder text replaced with production copy
- [ ] All images uploaded and optimized
- [ ] All links tested and functional
- [ ] All CTAs have proper destinations
- [ ] Newsletter form connects to email service

#### Cross-Browser Testing:
- [ ] Chrome (Desktop, Tablet, Mobile)
- [ ] Safari (Desktop, Tablet, Mobile)
- [ ] Firefox (Desktop)
- [ ] Edge (Desktop)

#### Responsive Testing:
- [ ] Mobile (380-767px) - All 8 pages
- [ ] Tablet (768-1149px) - All 8 pages
- [ ] Desktop (1150-1919px) - All 8 pages
- [ ] DesktopPlus (1920px+) - All 8 pages

#### Performance Testing:
- [ ] Page load times acceptable (<3 seconds)
- [ ] Images properly compressed
- [ ] CSS/JS minified and concatenated
- [ ] No console errors on any page
- [ ] W3C validation passing

#### SEO Basics:
- [ ] Meta descriptions added to all pages
- [ ] Title tags optimized
- [ ] Alt text on all images
- [ ] Sitemap generated
- [ ] robots.txt configured

### Launch Day Tasks:
- [ ] DNS settings verified
- [ ] SSL certificate active
- [ ] WordPress settings configured for production URL
- [ ] Final backup created
- [ ] Theme switched from staging to production
- [ ] Monitoring tools active (uptime, analytics)

### Post-Launch (Week 1):
- [ ] Monitor error logs
- [ ] Test all forms and CTAs
- [ ] Verify analytics tracking
- [ ] Check mobile performance
- [ ] Social media announcements
- [ ] Client outreach begins

---

## 7. Content Population Priority Order

### Week 47 Focus (This Week):

#### Day 1 (Monday): Core Pages
1. **Homepage** - Most critical, all ACF fields
2. **Contact** - Essential for lead capture

#### Day 2 (Tuesday): Service Pages
3. **Email Management** - Primary service offering
4. **Webinar Production** - Secondary service

#### Day 3 (Wednesday): Supporting Pages
5. **About Us** - Credibility and trust
6. **Content Creation** - Tertiary service

#### Day 4 (Thursday): Content Hub
7. **Resources** - Lead magnet landing
8. **Blog** - Thought leadership hub

#### Day 5 (Friday): Final Review
- QA testing all pages
- Cross-browser verification
- Content proofreading
- Link testing

---

## 8. Known Issues & Workarounds

### Issue 1: Text Block Component Not Ready
**Impact:** Cannot use advanced text block layouts  
**Workaround:** Use simplified Text Block Section ACF field group  
**Phase 2:** Complete advanced text block component architecture

### Issue 2: WordPress Menu Structure
**Impact:** WP menu output may not match current HTML structure  
**Workaround:** Use JavaScript to transform WP menu into current structure OR use hard-coded menus for Phase 1  
**Phase 2:** Create custom WordPress menu walker class

### Issue 3: HubSpot Integration Pending
**Impact:** Newsletter forms not connected to marketing automation  
**Workaround:** Use placeholder form for Phase 1, add "Coming Soon" notice  
**Phase 2:** Complete HubSpot API integration

### Issue 4: "Coming Soon" Pages
**Impact:** Footer links to pages that don't exist  
**Workaround:** Use `#coming-soon` links with disabled styling and JavaScript alert  
**Phase 2:** Build remaining pages

---

## 9. Success Metrics for Phase 1 MVW

### Launch Criteria (Must Achieve):
- ✅ All 8 essential pages live and functional
- ✅ Zero console errors on all pages
- ✅ Responsive behavior working across all 4 breakpoints
- ✅ All CTAs have functional destinations
- ✅ Cross-browser compatibility verified

### Nice to Have:
- 🟡 Google Analytics integrated
- 🟡 SEMrush tracking active
- 🟡 Newsletter form connected
- 🟡 Blog content published (3+ posts)

### Phase 2 Deferred:
- 🔴 Advanced text block layouts
- 🔴 Dynamic WordPress menus
- 🔴 HubSpot full integration
- 🔴 All "Coming Soon" pages built
- 🔴 Resource library fully populated

---

## 10. Next Steps - Immediate Actions

### Today (Friday, Week 47):
1. Review this plan with Claude
2. Prioritize any changes or adjustments
3. Identify content gaps that block page creation
4. Plan Monday's page creation session

### Monday (Week 48):
1. Create Homepage in WordPress
2. Assign `front-page.php` template
3. Populate all Homepage ACF field groups
4. Test homepage functionality

### Tuesday-Thursday (Week 48):
- Continue with remaining 7 pages
- Follow priority order from Section 7
- Test each page after creation

### Friday (Week 48):
- Final QA testing
- Cross-browser verification
- Prepare for soft launch

---

## End of Phase 1 MVW Launch Plan

**Document Version:** 1.0  
**Last Updated:** Week 47, Friday, November 21, 2025  
**Status:** Ready for Review & Execution
