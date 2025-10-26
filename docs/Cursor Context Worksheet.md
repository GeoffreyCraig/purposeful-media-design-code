Cursor Context Worksheet
<!-- You wanted: -->
<h1><?php the_field('hero_headline'); ?></h1>
<p>{{hero_description}}</p>

<!-- Cursor gave you: -->
<h1>Transform Your B2B Marketing</h1>
<p>We help struggling companies grow into thriving brands...</p>
```

**It's writing content instead of template structure.**

### Why This Happens:

**Cursor's training includes complete websites, not WordPress templates:**
- Sees complete pages as normal
- Template placeholders are unusual
- Defaults to "helpful" content generation
- Doesn't understand CMS context

### The Prompting Challenge:

**You need to explicitly tell Cursor:**
- This is a TEMPLATE, not a page
- Use ACF field placeholders
- Do NOT write actual content
- Keep structure, not copy

**This is why your prompting protocol question is critical.**

---

## 💡 Cursor vs. Claude Prompting - Key Differences

**"It's somewhat different from how to prompt you, Claude"**

**You're absolutely right.** Let me break down the differences:

---

## 🎯 Claude Prompting (Conversational AI)

### Claude's Strengths:
- ✅ Maintains conversation context
- ✅ Understands nuance and intent
- ✅ Can reference earlier in conversation
- ✅ Asks clarifying questions
- ✅ Explains reasoning

### Effective Claude Prompts:
- Conversational tone works
- Context builds across messages
- Can correct misunderstandings iteratively
- "What I meant was..." works well
- Strategic discussion and planning

---

## 🎯 Cursor Prompting (Code Generation AI)

### Cursor's Limitations:
- ⚠️ Limited cross-session memory
- ⚠️ No project-level context awareness
- ⚠️ Can't reference other files without explicit instruction
- ⚠️ Doesn't maintain design system understanding
- ⚠️ Treats each request independently

### Effective Cursor Prompts Need:

**1. Extreme Specificity**
```
❌ Bad: "Make the button match the design"
✅ Good: "Button: padding 16px 32px, font-size 18px, 
         border-radius 8px, background #1B1464"
```

**2. Explicit Context**
```
❌ Bad: "Build the hero section"
✅ Good: "Build hero section for WordPress TEMPLATE (not page).
         Use ACF field: <?php the_field('hero_headline'); ?>
         Do NOT write actual content.
         Match Homepage hero button styling exactly:
         padding 16px 32px, font-size 18px"
```

**3. Reference Previous Work**
```
❌ Bad: "Style the button"
✅ Good: "Style this button EXACTLY like the button in 
         homepage.html lines 45-52. Use identical classes 
         and measurements."
```

**4. Constraint Definition**
```
❌ Bad: "Add comments"
✅ Good: "Use this commenting style only:
         <!-- Section Name -->
         <!-- Component: Purpose -->
         Match existing homepage comment format exactly."
```

---

## 📋 Cursor Prompting Protocol - Framework

### Template for Effective Cursor Prompts:
```
[CONTEXT]
- What you're building (template vs page, CMS integration)
- Related files (reference other templates by name)
- Design system tokens (specific measurements)

[CONSTRAINTS]
- What NOT to do (don't write content, don't change classes)
- What to match exactly (reference line numbers in other files)
- Code style requirements (comment format, naming conventions)

[REQUIREMENTS]
- Specific measurements and values
- Exact class names to use
- ACF field placeholder format
- Expected output structure

[VALIDATION]
- How to verify success
- What the output should look like
- Edge cases to handle
```

### Example Cursor Prompt Using This Framework:
```
[CONTEXT]
Building Resources page template for WordPress custom theme.
This is a TEMPLATE file, not a single-use page.
Button styling must match homepage.html (lines 45-52).
Using ACF Pro for content management.

[CONSTRAINTS]
- Do NOT write actual page content
- Do NOT create new button size variations
- Do NOT change existing class names
- Use ONLY the commenting style from homepage.html

[REQUIREMENTS]
1. Hero section with ACF fields:
   - hero_headline (text field)
   - hero_description (textarea)
   - hero_cta_text (text field)
   - hero_cta_link (URL field)

2. Button styling (EXACT match to homepage):
   - padding: 16px 32px
   - font-size: 18px
   - border-radius: 8px
   - class: btn-primary

3. HTML structure:
   <section class="hero">
     <h1><?php the_field('hero_headline'); ?></h1>
     <p><?php the_field('hero_description'); ?></p>
     <a href="<?php the_field('hero_cta_link'); ?>" 
        class="btn-primary">
       <?php the_field('hero_cta_text'); ?>
     </a>
   </section>

4. Comments format (match homepage.html):
   <!-- Hero Section -->
   <!-- Button Component -->

[VALIDATION]
Output should:
- Contain NO actual content text
- Use ACF field placeholders only
- Match homepage button pixel-perfect
- Use consistent comment style