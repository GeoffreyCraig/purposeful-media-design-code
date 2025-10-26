# Card/ParagraphOptions Component Variable Mapping

## Component Overview
**Date:** October 25, 2025  
**Component:** Card/ParagraphOptions  
**Variants:** 12 total (4 sizes × 3 color schemes)  
**Key Difference from Card/Teaser:** Includes decorative icon alongside heading

## Component Structure

The Card/ParagraphOptions component extends Card/Teaser with:
1. **Container** - Main card wrapper with background, padding, shadow
2. **Headline Section** - Horizontal layout (desktop) or vertical (mobile) containing:
   - **Icon** - 90px decorative icon from symbolic sprite
   - **Heading** - Title text positioned alongside/below icon
3. **Body Text** - Multi-paragraph description
4. **Button** - CTA button (varies by color scheme)

## Size Variants & Token Mapping

### Large Cards (968:183, 1286:12225, 1286:12317)
```css
.card-paragraph-large {
  /* Container */
  padding-top: var(--space-8);      /* 32px - REDUCED from Card/Teaser's 40px */
  padding-bottom: var(--space-16);  /* 64px - Same as Card/Teaser */
  padding-left: var(--space-8);     /* 32px - REDUCED from Card/Teaser's 48px */
  padding-right: var(--space-8);    /* 32px - REDUCED from Card/Teaser's 48px */
  gap: var(--space-8);              /* 32px - Same as Card/Teaser */
  border-radius: var(--radius-small); /* 4px */
  width: 600px;                      /* Fixed width in Figma */
  
  /* Headline Container */
  display: flex;
  flex-direction: row;              /* Horizontal layout */
  gap: var(--space-8);              /* 32px between icon and text */
  align-items: flex-start;
  
  /* Icon */
  width: 90px;
  height: 90px;
  flex-shrink: 0;
  /* Uses icon-display--large class */
  
  /* Heading Typography */
  font-size: var(--text-h3-size);   /* 30px - Same as Card/Teaser */
  line-height: 45px;                 /* Custom - matches Card/Teaser */
  font-weight: var(--font-weight-black); /* 900 - Heavy */
  font-family: var(--font-primary);  /* Lato */
  text-transform: uppercase;
  
  /* Body Typography */
  font-size: var(--text-default-size);     /* 18px */
  line-height: var(--text-default-height); /* 27px */
  font-weight: var(--font-weight-regular); /* 400 */
  font-family: var(--font-secondary);      /* Open Sans */
  width: 536px;                             /* Constrained width */
  
  /* Button */
  height: 50px;
  padding: 16px 80px;                /* Same as Card/Teaser */
  font-size: var(--text-default-size); /* 18px */
  line-height: var(--text-default-size); /* 18px */
  font-weight: var(--font-weight-bold); /* 700 */
  font-family: var(--font-primary);     /* Lato */
}
```

### Medium Cards (1284:121, 1286:12493, 1286:12861)
```css
.card-paragraph-medium {
  /* Container - Same as Large */
  padding-top: var(--space-8);      /* 32px */
  padding-bottom: var(--space-16);  /* 64px */
  padding-left: var(--space-8);     /* 32px */
  padding-right: var(--space-8);    /* 32px */
  gap: var(--space-8);              /* 32px */
  width: 440px;                      /* Narrower than Large */
  
  /* All other properties match Large variant */
  /* Icon remains 90px */
  /* Typography remains same sizes */
  /* Body text width: 376px */
}
```

### Small Cards (1284:213, 1286:12585, 1286:13035)
```css
.card-paragraph-small {
  /* Container - Same as Large/Medium */
  padding-top: var(--space-8);      /* 32px */
  padding-bottom: var(--space-16);  /* 64px */
  padding-left: var(--space-8);     /* 32px */
  padding-right: var(--space-8);    /* 32px */
  gap: var(--space-8);              /* 32px */
  width: 360px;                      /* Narrowest desktop size */
  
  /* All other properties match Large/Medium */
  /* Icon remains 90px */
  /* Typography remains same sizes */
  /* Body text width: 296px */
}
```

### Mobile Cards (1284:305, 1286:12769, 1286:13221)
```css
.card-paragraph-mobile {
  /* Container - Same padding as desktop */
  padding-top: var(--space-8);      /* 32px */
  padding-bottom: var(--space-16);  /* 64px */
  padding-left: var(--space-8);     /* 32px */
  padding-right: var(--space-8);    /* 32px */
  gap: var(--space-8);              /* 32px */
  width: 320px;                      /* Mobile width */
  
  /* Headline Container - CRITICAL CHANGE */
  display: flex;
  flex-direction: column;           /* VERTICAL stacking on mobile */
  gap: var(--space-8);              /* 32px between icon and text */
  align-items: center;              /* Center alignment */
  
  /* Icon - Same size as desktop */
  width: 90px;
  height: 90px;
  
  /* Heading Typography - Reduced for mobile */
  font-size: var(--text-h5-size);   /* 21px - REDUCED from 30px */
  line-height: 30.5px;               /* Custom - REDUCED from 45px */
  font-weight: var(--font-weight-black); /* 900 - Heavy */
  font-family: var(--font-primary);  /* Lato */
  text-transform: uppercase;
  text-align: center;                /* Centered on mobile */
  width: 256px;                      /* Constrained width */
  
  /* Body Typography - Same size as desktop */
  font-size: var(--text-default-size);     /* 18px */
  line-height: var(--text-default-height); /* 27px */
  width: 256px;                             /* Mobile width */
  
  /* Button - Reduced padding */
  height: 34px;                      /* REDUCED from 50px */
  padding: 8px 64px;                 /* Reduced vertical padding */
  font-size: var(--text-default-size); /* 18px - same size */
}
```

## Color Scheme Variants & Token Mapping

### Default Color Scheme
```css
.card-color-default {
  /* Container */
  background-color: var(--bg-primary);      /* #ffffff */
  box-shadow: var(--shadow-subtle);         /* 4px 4px 12px rgba(0,0,0,0.1) */
  
  /* Icon Color */
  --icon-color: navy;                       /* Uses data-color="navy" */
  
  /* Text Colors */
  --heading: var(--text-heading);           /* #1b1464 */
  --body: var(--text-body);                 /* #51585e */
  
  /* Button - Default state */
  --default: var(--button-primary-bg);      /* #1b1464 */
  --reverse: var(--text-reverse);           /* #ffffff */
}
```

### Gray Color Scheme
```css
.card-color-gray {
  /* Container */
  background-color: var(--bg-secondary);    /* #eceeef (neutral-100) */
  box-shadow: var(--shadow-subtle);         /* Same shadow */
  
  /* Icon Color */
  --icon-color: navy;                       /* Same as default */
  
  /* Text Colors - Same as Default */
  --heading: var(--text-heading);           /* #1b1464 */
  --body: var(--text-body);                 /* #51585e */
  
  /* Button Colors - Same as Default */
}
```

### Reverse Color Scheme
```css
.card-color-reverse {
  /* Container */
  background-color: var(--bg-brand);        /* #1b1464 (primary-700) */
  box-shadow: var(--shadow-subtle);         /* Same shadow */
  
  /* Icon Color */
  --icon-color: white;                      /* Uses data-color="white" */
  
  /* Text Colors - Inverted */
  --heading: var(--text-reverse);           /* #ffffff */
  --body: var(--text-muted);                /* #c7cbcf - NOTE: Different from Card/Teaser */
  
  /* Button Colors - Special for Reverse */
  --default: var(--color-accent-500);       /* #d4af37 - Gold button */
  --reverse: var(--text-heading);           /* #1b1464 - Navy text on gold */
}
```

## Icon Integration

The Card/ParagraphOptions uses the icon-display molecule with these specifications:

```html
<!-- Default/Gray variants -->
<div class="icon-display icon-display--large" data-icon="[icon-name]" data-color="navy"></div>

<!-- Reverse variant -->
<div class="icon-display icon-display--large" data-icon="[icon-name]" data-color="white"></div>
```

Available icon names from symbolic sprite:
- accelerate, attract, contact, delight, download
- efficiency, email, engage, exit, expertise
- inbound, momentum, news, persona, professional
- roi, schedule, strategy, unit, value, webinar

## Key Differences from Card/Teaser

1. **Padding Reduction**: Uses 32px padding vs Card/Teaser's 40px top, 48px horizontal
2. **Icon Addition**: Includes 90px decorative icon in headline
3. **Layout Change**: Mobile switches to vertical icon/heading stack
4. **Reverse Body Text**: Uses muted color (#c7cbcf) instead of pure white
5. **Gold Button in Reverse**: Reverse variant uses gold button with navy text

## Token Dependencies

### Existing Tokens Used
- ✅ All color tokens from Card/Teaser
- ✅ All typography tokens from Card/Teaser
- ✅ Spacing tokens (space-8, space-16)
- ✅ Shadow and radius tokens
- ✅ Icon display classes (icon-display--large)
- ✅ New token discovered: --text-muted for reverse body text

### Tokens Requiring Addition

Add to variables-v3.0-20251023.css:

```css
/* =================================================
   CARD COMPONENT TOKENS
   ================================================= */
:root {
  /* Card/Teaser specific (from previous documentation) */
  --card-heading-height: 45px;           /* Desktop card heading line height */
  --card-heading-height-mobile: 30.5px;  /* Mobile card heading line height */
  --padding-button-card: 16px 80px;      /* Wide CTAs in cards */
  --padding-button-card-mobile: 8px 64px; /* Mobile card CTAs */
  --padding-card-teaser: var(--space-10) var(--space-12) var(--space-16); /* 40px 48px 64px */
  
  /* Card/ParagraphOptions specific */
  --padding-card-paragraph: var(--space-8) var(--space-8) var(--space-16); /* 32px 32px 64px */
  --card-content-gap: var(--space-8);    /* Gap between all card elements - 32px */
  --card-icon-size: 90px;                /* Decorative icon size */
  --card-button-height: 50px;            /* Desktop button height */
  --card-button-height-mobile: 34px;     /* Mobile button height */
}
```

## Responsive Implementation Strategy

### Container Width Management
```css
.card-paragraph {
  /* Base styles */
  width: 100%;
  max-width: var(--card-max-width);
}

/* Breakpoint-specific widths */
@media (max-width: 767px) {
  .card-paragraph { 
    --card-max-width: 320px;
    /* Mobile: Vertical icon/heading layout */
  }
}

@media (min-width: 768px) and (max-width: 1149px) {
  .card-paragraph { 
    --card-max-width: 360px;
    /* Tablet: Horizontal layout maintained */
  }
}

@media (min-width: 1150px) and (max-width: 1919px) {
  .card-paragraph { 
    --card-max-width: 440px;
    /* Desktop: Medium width */
  }
}

@media (min-width: 1920px) {
  .card-paragraph { 
    --card-max-width: 600px;
    /* DesktopPlus: Full width */
  }
}
```

### Mobile Layout Switch
```css
/* Desktop: Horizontal layout */
.card-paragraph__headline {
  display: flex;
  flex-direction: row;
  gap: var(--card-content-gap);
  align-items: flex-start;
}

/* Mobile: Vertical layout */
@media (max-width: 767px) {
  .card-paragraph__headline {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
  
  .card-paragraph__heading {
    font-size: var(--text-h5-size);
    line-height: var(--card-heading-height-mobile);
  }
  
  .card-paragraph__button {
    height: var(--card-button-height-mobile);
    padding: var(--padding-button-card-mobile);
  }
}
```

## HTML Structure Example

```html
<div class="card-paragraph card-paragraph--default">
  <div class="card-paragraph__headline">
    <div class="icon-display icon-display--large" 
         data-icon="strategy" 
         data-color="navy"></div>
    <h3 class="card-paragraph__heading">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit
    </h3>
  </div>
  
  <div class="card-paragraph__body">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
    <p>Risus in hendrerit gravida rutrum quisque...</p>
  </div>
  
  <button class="card-paragraph__button">
    Button Text
  </button>
</div>
```

## Implementation Notes

1. **Icon Selection**: Each card instance should specify appropriate icon via `data-icon` attribute
2. **Color Coordination**: Icon color changes automatically with color scheme variant
3. **Mobile Optimization**: Critical layout change at mobile breakpoint requires flexbox direction switch
4. **Button Consistency**: Despite size changes, button text remains 18px across all breakpoints
5. **Content Constraints**: Body text widths are explicitly constrained to maintain readability

## Testing Checklist

- [ ] Verify icon displays correctly in all color schemes
- [ ] Test mobile layout switch (horizontal → vertical)
- [ ] Confirm heading size reduction on mobile
- [ ] Validate button height changes across breakpoints
- [ ] Check text color contrast in reverse variant
- [ ] Test with all 21 available symbolic icons
- [ ] Verify padding differences from Card/Teaser
- [ ] Confirm gold button appearance in reverse scheme

## Next Steps

1. Add missing tokens to variables-v3.0-20251023.css
2. Create component CSS file with responsive styles
3. Build JavaScript for dynamic icon selection
4. Test integration with page section containers
5. Document usage patterns for content authors
6. Create Storybook/demo page showing all variants