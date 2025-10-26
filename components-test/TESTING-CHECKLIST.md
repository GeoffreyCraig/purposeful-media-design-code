# Component Testing Checklist
## Quick Reference for Breadboard Testing

**Print this or keep it open during testing**

---

## 🎯 **For Each Component Test:**

### **1. SETUP** ✓
- [ ] Open test page in browser
- [ ] Open browser DevTools (F12)
- [ ] Open Console tab (watch for errors)
- [ ] Position browser to 1920px+ width first

---

### **2. DESKTOP PLUS (1920px+)** 🖥️

#### **Visual Check:**
- [ ] Component displays at correct size
- [ ] Logo/images load correctly  
- [ ] Typography matches design (size, weight, color)
- [ ] Spacing looks correct (padding, margins, gaps)
- [ ] Colors match design tokens

#### **Interaction Check:**
- [ ] Hover states work on all interactive elements
- [ ] Click/tap functionality works
- [ ] Dropdown menus appear (if applicable)
- [ ] Forms accept input (if applicable)
- [ ] Animations are smooth

#### **Console Check:**
- [ ] No JavaScript errors
- [ ] No 404 errors (missing images/files)
- [ ] No CSS warnings

---

### **3. DESKTOP (1150-1919px)** 💻

#### **Resize Browser to 1150px**
- [ ] Component scales appropriately
- [ ] No horizontal scrollbar
- [ ] Text remains readable
- [ ] Images/logos resize correctly
- [ ] Spacing adjusts properly

#### **Re-test Interactions:**
- [ ] Hover states still work
- [ ] Click functionality still works
- [ ] No layout breaks

---

### **4. TABLET (768-1149px)** 📱

#### **Resize Browser to 768px**
- [ ] Layout switches to tablet version
- [ ] Mobile menu appears (if applicable)
- [ ] Desktop navigation hides (if applicable)
- [ ] Touch targets are 44x44px minimum
- [ ] No content overflow

#### **Mobile Specific Features:**
- [ ] Hamburger menu works
- [ ] Accordion menus expand/collapse
- [ ] Swipe gestures work (if applicable)
- [ ] Pinch-zoom disabled where appropriate

---

### **5. MOBILE (380-767px)** 📱

#### **Resize Browser to 380px**
- [ ] Component fits within viewport
- [ ] No horizontal scrollbar
- [ ] Text is readable (not too small)
- [ ] Touch targets meet 44px minimum
- [ ] Images load correctly

#### **Test on Actual Mobile Device:**
- [ ] Test on iPhone/Android if possible
- [ ] Touch interactions work smoothly
- [ ] Animations perform well
- [ ] No layout issues on actual device

---

### **6. ACTIVE/CURRENT PAGE STATES** 🎨

- [ ] Use test controls to set active state
- [ ] Active menu item highlighted correctly
- [ ] Current page indicator displays
- [ ] Breadcrumbs show correct path (if applicable)
- [ ] Clear visual distinction from other items

---

### **7. EDGE CASES** ⚠️

#### **Long Content:**
- [ ] Test with very long text
- [ ] Text wraps correctly
- [ ] No overflow issues
- [ ] Ellipsis works (if applicable)

#### **Empty States:**
- [ ] Component handles no content gracefully
- [ ] Placeholder text displays
- [ ] No layout breaks

#### **Multiple Items:**
- [ ] Test with min/max number of items
- [ ] Spacing remains consistent
- [ ] No layout collapse

---

### **8. ACCESSIBILITY** ♿

#### **Keyboard Navigation:**
- [ ] Tab through all interactive elements
- [ ] Focus indicators visible
- [ ] Tab order is logical
- [ ] Escape key closes modals/dropdowns
- [ ] Enter/Space activates buttons

#### **Screen Reader (Optional but Recommended):**
- [ ] Turn on screen reader (VoiceOver/NVDA)
- [ ] All elements are announced
- [ ] ARIA labels present
- [ ] Roles are correct

#### **Color Contrast:**
- [ ] Text meets WCAG AA (4.5:1)
- [ ] Large text meets WCAG AA (3:1)
- [ ] Interactive elements have sufficient contrast

---

### **9. CSS INTEGRATION** 🎨

#### **Use Browser DevTools:**
- [ ] Inspect element styles
- [ ] Check for hardcoded values (should use tokens)
- [ ] Check specificity conflicts
- [ ] Verify correct cascade order

#### **Check for:**
- [ ] `!important` usage (should be minimal)
- [ ] Hardcoded hex colors (should use `var(--token)`)
- [ ] Hardcoded px values for spacing (should use `--space-*`)
- [ ] Inline styles (should be in CSS file)

---

### **10. JAVASCRIPT FUNCTIONALITY** ⚙️

#### **Console Check:**
- [ ] No errors in console
- [ ] Event listeners fire correctly
- [ ] State changes log properly (if debug enabled)

#### **Functionality Check:**
- [ ] Dropdowns open/close correctly
- [ ] Accordions expand/collapse
- [ ] Forms validate input
- [ ] Modal overlays work
- [ ] Click-outside closes menus

---

### **11. PERFORMANCE** ⚡

#### **Check for:**
- [ ] Images optimized (not too large)
- [ ] Animations are 60fps (smooth)
- [ ] No layout thrashing (check Performance tab)
- [ ] Page loads quickly
- [ ] No memory leaks (test opening/closing repeatedly)

---

### **12. DOCUMENTATION** 📝

#### **Record:**
- [ ] Screenshot at each breakpoint
- [ ] List any issues found
- [ ] Note any missing tokens
- [ ] Document usage guidelines
- [ ] Add notes about dependencies

#### **File Locations:**
```
/components-test/screenshots/[component-name]/
/components-test/issues/[component-name]-issues.md
```

---

## ✅ **APPROVAL CRITERIA**

Component is **BREADBOARD APPROVED** when:

- ✅ All 4 breakpoints work correctly
- ✅ All interactive states function
- ✅ No console errors
- ✅ Accessibility requirements met
- ✅ Uses design tokens (no hardcoded values)
- ✅ CSS integrates cleanly with master-styles.css
- ✅ Mobile touch targets are 44x44px minimum
- ✅ Documentation complete
- ✅ Screenshots captured
- ✅ Issues logged and fixed

---

## 🐛 **COMMON ISSUES TO WATCH FOR**

### **Desktop Dropdowns:**
- Dropdown not appearing → Check `overflow: hidden` on parents
- Dropdown cut off → Check z-index stacking context
- Click not working → Check event listener attachment

### **Mobile Menus:**
- Menu not opening → Check JavaScript event handler
- Menu overlapping content → Check fixed positioning
- Animation janky → Check GPU acceleration

### **Responsive Behavior:**
- Layout breaks at breakpoint → Check media query ranges
- Images don't scale → Check `max-width: 100%`
- Horizontal scroll → Check for fixed-width elements

### **CSS Conflicts:**
- Styles not applying → Check specificity
- Colors wrong → Check token names
- Spacing off → Check if using token values

### **JavaScript Errors:**
- Element not found → Check if DOM loaded before script runs
- Function not defined → Check script load order
- Event not firing → Check selector specificity

---

## 📞 **WHEN TO ESCALATE**

Stop testing and report if:

- 🔴 **Critical functionality broken** (can't navigate, forms don't submit)
- 🔴 **Accessibility violations** (keyboard nav fails, no focus indicators)
- 🔴 **Major CSS conflicts** (entire layout breaks)
- 🔴 **JavaScript errors** that can't be fixed in 30 minutes

Otherwise, document issue and continue testing other aspects.

---

**Last Updated:** October 10, 2025  
**Version:** 1.0

