# Week 46 Thursday: ACF Pro Field Group Integration Learning Session

**Date:** Thursday, November 14, 2025  
**Time:** 11:30 AM PST  
**Project:** Purposeful Media Promotions - WordPress Theme Development

---

## Session Objective

Build and connect an ACF Pro plugin field group from the ground up to control a WordPress website page section component, specifically to understand the complete workflow for making static template content dynamic.

---

## Component Selected for First Implementation

**Component:** Hero Simple Reverse banner  
**Location:** About & Contact page (above the fold, nested below main header)  
**Source File:** `/components/organisms/hero-simple-reverse-production.html`  
**Dynamic Element:** Headline only  
**CSS Class:** `.hero-simple-reverse__headline`  
**Original Text:** "About Us & Contact"

---

## Key Discovery: The Critical Mismatch Issue

### Initial Problem

- ACF Field Group was created successfully in WordPress UI
- Field appeared in page editor and accepted input
- Content was saved in database
- **BUT content did not display on front-end**

### Root Cause

**Field name mismatch between ACF field definition and PHP template code:**

- Claude assumed field name: `hero_headline`
- Actual field name in ACF: `hero-simple-reverse__headline`
- PHP was calling: `get_field('hero_headline')` (wrong)
- Should have been: `get_field('hero-simple-reverse__headline')` (correct)

### Resolution

Corrected the PHP template code to use the exact ACF field name, which immediately resolved the display issue.

---

## ACF Integration Workflow Established

### The Three Required Steps

1. **Field Group Creation** (WordPress Admin UI)
   - Creates input interface in WordPress admin
   - Stores data in WordPress database
   - ✅ Completed successfully

2. **Content Entry** (WordPress Page Editor)
   - User enters content into ACF fields
   - Data gets stored in database
   - ✅ Working correctly

3. **Template PHP Modification** (Theme Files)
   - Retrieves data from database
   - Displays on front-end
   - ⚠️ **This step is required for every dynamic element**

### Key Understanding

ACF Field Groups do NOT automatically make content dynamic. PHP template modifications are required for each element.

---

## WordPress Theme Editor vs. Local Development

### Critical Issue Identified

Changes made directly in WordPress Theme File Editor will be **overwritten** on next theme deployment from local files.

### Established Workflow (Option 1)

**Step-by-Step Process:**

1. Make changes in **WordPress Theme File Editor** (quick testing)
2. Verify functionality on live/staging site
3. **Immediately copy working code** to local PHP file in VS Code
4. Commit changes to Git with descriptive message
5. Future theme deployments will include the correct version

**Why This Works:**

- ✅ Quick iteration and immediate results
- ✅ Maintains version control integrity
- ✅ Prevents code loss on deployment

**Critical Reminder:**
Never skip Step 3 (copy to local files) - add this to every ACF integration task checklist.

---

## Fallback Strategy Guidelines

### When Fallbacks ARE Essential

    **1. Repeatable Components** (used across multiple pages)

    ```php

    $headline = get_field('hero_headline');
    echo esc_html($headline ? $headline : __('Welcome', 'purposeful-media'));
    ```

    **2. Optional Content** (may or may not be filled)

    ```php

    $subheading = get_field('hero_subheading');
    if ($subheading) {
        echo '<p class="hero__subheading">' . esc_html($subheading) . '</p>';
    }
    ```

    **3. Critical Navigation/Structure**

    ```php

    $btn_text = get_field('cta_button_text');
    echo esc_html($btn_text ? $btn_text : __('Learn More', 'purposeful-media'));
    ```

### When Fallbacks Are NOT Needed

    **1. Unique Page-Specific Content**

    ```php

    // About page headline - should always have content
    echo esc_html(get_field('hero-simple-reverse__headline'));
    ```

    - Forces editors to add content (intentional)
    - Reveals missing data immediately
    - Simpler code, less maintenance

    **2. Required Fields** (marked Required in ACF)
    WordPress won't save page without content - no fallback needed.

---

## Completed Work

### ✅ First Successful ACF Integration

**Field Group:** "Hero Simple Reverse - About Page"

**Field Configuration:**

- **Label:** Hero Headline
- **Name:** `hero-simple-reverse__headline`
- **Type:** Text
- **Required:** Yes
- **Location Rule:** Page → is equal to → About & Contact

    **Template Code (Final Working Version):**

        ```php

        <h1 class="hero-simple-reverse__headline">
            <?php echo esc_html(get_field('hero-simple-reverse__headline')); ?>
        </h1>
        ```

        **Status:** ✅ Fully functional - headline pulls dynamically from ACF field

---

## Next Steps: Systematic Integration Plan

### Phase 1: Build Comprehensive Inventory

Need to gather data from three sources:

**A) ACF Field Groups** (WordPress Admin → Custom Fields)

- List each field group name
- Document fields within each group
- Note location rules (pages/templates)

**B) WordPress Theme Templates** (`/wordpress-theme/` directory)

- Identify all PHP template files requiring modification
- Known templates:
  - `page-about-contact.php` ✅
  - Others TBD

**C) Components Per Page** (GitHub documentation)

- Component lists organized by page
- Identify all dynamic elements per component

### Phase 2: Create Master Tracking Document

    **Suggested Structure:**
    ```

    PAGE: About & Contact (page-about-contact.php)
    ├── Hero Simple Reverse
    │   ├── [✅] Headline (hero-simple-reverse__headline) - DONE
    │   ├── [  ] Subheading (TBD)
    │   └── [  ] Button Text (TBD)
    ├── Content Block
    │   ├── [  ] Section Heading
    │   └── [  ] Body Copy
    └── Contact Form Section
        └── [  ] Form Title
    ```

    **Tracking Columns:**

    - Page Template
    - Component
    - Element
    - ACF Field Name
    - Fallback Strategy (None / Default Text / Conditional)
    - Status (Pending / In Progress / Done)
    - Notes

### Phase 3: Systematic Implementation

Work through each element following the established workflow:

1. Test in WP Theme Editor
2. Verify on front-end
3. Copy to local VS Code file
4. Commit to Git

**Estimated Timeline:** Approximately one week for 16+ elements

---

## Key Learnings

1. **ACF requires three distinct steps** - field group creation alone is not enough
2. **Field name precision is critical** - exact matches required between ACF and PHP
3. **Version control workflow must be intentional** - Theme Editor changes need immediate local sync
4. **Fallbacks should be strategic, not automatic** - use only where they add value
5. **Systematic planning beats reactive fixing** - comprehensive inventory before bulk implementation

---

## Technical Environment

**Tech Stack:**

- Figma Design System
- Claude Desktop (Strategic PM)
- Asana (PM platform)
- Figma Dev Mode MCP
- Claude Code (Heavy Development)
- VS Code (Lightweight Editing + Git GUI)
- Git (Local Version Control)
- GitHub (Remote Repository)
- WordPress (Deployment Target)
- ACF Pro Plugin

**Working Directory:** `/Desktop/purposeful-media-design-code/`

**WordPress Theme Directory:** `/wordpress-theme/`

---

## Session Outcome

✅ Successfully completed first end-to-end ACF field integration  
✅ Established repeatable workflow for future integrations  
✅ Identified and resolved field name mismatch issue  
✅ Documented fallback strategy guidelines  
✅ Defined systematic approach for 16+ remaining elements  

**Status:** Ready to proceed with comprehensive inventory and systematic integration of remaining dynamic elements.

---# End of Document
