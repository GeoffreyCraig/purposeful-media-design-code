# Component Breadboard Testing
## Purposeful Media Design System - MVW Phase 1

**Date Started:** October 10, 2025 (Week 41, Friday)  
**Purpose:** Systematic solo component testing before page assembly  
**Status:** 🟡 In Progress

---

## 📋 **Testing Methodology**

### **Phase 1 Workflow:**
```
1. Create solo test page for each component
2. Test all breakpoints (380px, 768px, 1150px, 1920px)
3. Test all states (default, hover, active, disabled)
4. Document issues found
5. Fix CSS/JS issues in component files
6. Update design tokens as needed
7. Mark component as "breadboard approved ✓"
8. Move to next component
```

### **Only after ALL components are validated:**
```
9. Assemble page template
10. Test component interactions
11. Deploy to WordPress
```

---

## 🧪 **Component Test Files**

### **Organisms**
- [x] `header-test.html` - Banner Header Component
  - **Status:** Testing in progress
  - **Critical Issue:** Desktop dropdowns not working
  - **Breakpoints:** All 4 breakpoints
  - **Priority:** HIGH (universal component)

- [ ] `hero-test.html` - Hero Section Variants
  - **Variants to test:** Simple, Simple Reverse, ATF Center
  - **Priority:** HIGH

- [ ] `footer-test.html` - Footer Component
  - **Variants to test:** Main, Simple, Mobile
  - **Priority:** HIGH

### **Molecules**
- [ ] `form-newsletter-test.html` - Newsletter Form
- [ ] `card-resources-test.html` - Resource Card
- [ ] `slide-hero-test.html` - Hero Slide Component

### **Atoms** (if issues arise)
- [ ] `button-test.html` - Button Component
- [ ] `headline-test.html` - Headline Typography
- [ ] `link-test.html` - Link Component

---

## ✅ **Testing Checklist**

For each component, verify:

### **Responsive Behavior**
- [ ] **Mobile (380-767px):** Layout, sizing, touch targets
- [ ] **Tablet (768-1149px):** Layout transitions
- [ ] **Desktop (1150-1919px):** Full desktop layout
- [ ] **Desktop Plus (1920px+):** Large screen optimization

### **Interactive States**
- [ ] **Default:** Component loads correctly
- [ ] **Hover:** Visual feedback on all interactive elements
- [ ] **Active/Current:** Current page indicators work
- [ ] **Focus:** Keyboard navigation works
- [ ] **Disabled:** Disabled states display correctly

### **Accessibility**
- [ ] **ARIA Labels:** All interactive elements labeled
- [ ] **Keyboard Navigation:** Tab order is logical
- [ ] **Touch Targets:** Minimum 44x44px on mobile
- [ ] **Color Contrast:** WCAG AA compliance
- [ ] **Screen Reader:** Semantic HTML used

### **CSS Integration**
- [ ] **Token Usage:** No hardcoded values
- [ ] **Specificity:** No conflicts with master-styles.css
- [ ] **Cascade:** Styles apply in correct order
- [ ] **Overflow:** Parent containers don't cut off dropdowns/popovers

### **JavaScript Functionality**
- [ ] **Event Handlers:** Click/touch events fire correctly
- [ ] **State Management:** Open/close states tracked
- [ ] **Error Handling:** Console shows no errors
- [ ] **Performance:** No memory leaks, smooth animations

---

## 🐛 **Issue Tracking**

### **Header Component Issues**

#### ❌ **Issue #1: Desktop Dropdowns Not Appearing**
- **Severity:** HIGH
- **Breakpoints Affected:** Desktop (1150px+), Desktop Plus (1920px+)
- **Symptoms:** 
  - Click on "Solutions" or "Resources" - no dropdown appears
  - Console shows click event firing
  - `.open` class is added to `.dropdown-container`
  - CSS opacity/visibility should change but doesn't
  
- **Potential Causes:**
  1. **Z-index conflict:** Parent element creating stacking context
  2. **Overflow hidden:** Parent has `overflow: hidden` cutting off dropdown
  3. **CSS specificity:** master-styles.css overriding dropdown styles
  4. **Positioning:** Dropdown positioned outside viewport
  
- **Debug Steps Taken:**
  - [x] Added console logging to JavaScript
  - [x] Created dropdown debugger overlay
  - [x] Verified `.open` class is added
  - [ ] Check z-index stacking context
  - [ ] Check parent overflow values
  - [ ] Compare computed styles vs. expected styles
  
- **Fix Status:** 🔍 Investigating

---

## 📊 **Component Status Board**

| Component | Priority | Status | Blocker | Est. Time |
|-----------|----------|--------|---------|-----------|
| Header | HIGH | ✅ Approved | None | COMPLETE |
| Hero | HIGH | 🟡 Testing | Height fill issue | 1-2 hrs |
| Footer | HIGH | ⚪ Not Started | - | 2 hrs |
| Newsletter Form | MEDIUM | ⚪ Not Started | - | 1 hr |
| Resource Card | MEDIUM | ⚪ Not Started | - | 1 hr |

**Legend:**
- ⚪ Not Started
- 🟡 In Progress
- 🟢 Complete
- 🔴 Blocked
- ✅ Approved

---

## 🔧 **Test Page Features**

Each test page includes:

1. **Breakpoint Monitor**
   - Real-time screen width display
   - Current breakpoint indicator
   - Color-coded feedback

2. **Interactive Test Controls**
   - Simulate active/current page states
   - Toggle debug overlays
   - Run automated checks

3. **Visual Test Sections**
   - Clearly labeled test scenarios
   - Multiple state examples
   - Edge case demonstrations

4. **Debug Information**
   - Live component state display
   - CSS computed values
   - JavaScript event logging
   - Error detection

5. **Test Instructions**
   - What to test at each breakpoint
   - Expected behavior
   - Known issues to verify

---

## 📝 **Documentation Requirements**

For each completed test:

1. **Screenshot at each breakpoint**
   - Save to `/components-test/screenshots/[component-name]/`
   - Naming: `[component]-[breakpoint]-[state].png`

2. **Issue Log**
   - Document all bugs found
   - Steps to reproduce
   - Fix implemented
   - Re-test verification

3. **Token Updates**
   - New tokens needed
   - Token name changes
   - Missing token documentation

4. **Component Notes**
   - Usage guidelines
   - Variant descriptions
   - Integration warnings
   - Dependencies

---

## 🚀 **Next Steps**

### **Immediate (Today - Week 41, Friday PM):**
1. ✅ Create header test page
2. 🟡 Fix desktop dropdown issue
3. ⚪ Complete header testing
4. ⚪ Mark header as "approved ✓"

### **This Weekend (Week 41):**
1. Create hero test page
2. Create footer test page
3. Test and approve both

### **Next Week (Week 42):**
1. Create molecule test pages
2. Test and approve all molecules
3. Begin page template assembly
4. Integration testing

---

## 📚 **Resources**

- **Design System Docs:** `/docs/design-tokens.md`
- **Component Library:** `/components/`
- **CSS Files:** `/styles/`
- **Audit Report:** `/docs/CSS-AUDIT-REPORT-2025-10-10.md`

---

## 🎯 **Success Criteria**

A component is "breadboard approved" when:

- ✅ Works at all 4 breakpoints
- ✅ All states tested and functional
- ✅ No CSS conflicts with master-styles.css
- ✅ All interactions work (click, hover, keyboard)
- ✅ Accessibility requirements met
- ✅ No console errors
- ✅ Performance is smooth (no jank)
- ✅ Mobile touch targets meet 44px minimum
- ✅ Uses design tokens (no hardcoded values)
- ✅ Documentation complete

---

**Last Updated:** October 10, 2025  
**Next Review:** After header component approval

