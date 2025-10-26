# Card/Teaser Component Variable Mapping
## Component Overview
**Date:** October 25, 2025  
**Component:** Card/Teaser  
**Variants:** 12 total (4 sizes × 3 color schemes)

## Component Structure

The Card/Teaser component consists of:
1. **Container** - Main card wrapper with background, padding, shadow
2. **Heading** - Title text (varies by size)
3. **Body Text** - Description paragraph  
4. **Button** - CTA button (varies by color scheme)

## Size Variants & Token Mapping

### Large Cards (5785:18574, 5785:18610, 5785:18646)
```css
.card-teaser-large {
  /* Container */
  padding-top: var(--space-10);     /* 40px */
  padding-bottom: var(--space-16);  /* 64px */
  padding-left: var(--space-12);    /* 48px */
  padding-right: var(--space-12);   /* 48px */
  gap: var(--space-8);              /* 32px */
  border-radius: var(--radius-small); /* 4px */
  
  /* Heading Typography */
  font-size: var(--text-h3-size);   /* 30px */
  line-height: 45px;                 /* Custom - not tokenized */
  font-weight: var(--font-weight-black); /* 900 - Heavy */
  font-family: var(--font-primary);  /* Lato */
  text-transform: uppercase;
  
  /* Body Typography */
  font-size: var(--text-default-size);     /* 18px */
  line-height: var(--text-default-height); /* 27px */
  font-weight: var(--font-weight-regular); /* 400 */
  font-family: var(--font-secondary);      /* Open Sans */
  
  /* Button */
  padding: 16px 80px;                /* Custom padding */
  font-size: var(--text-default-size); /* 18px */
  line-height: var(--text-default-size); /* 18px */
  font-weight: var(--font-weight-bold); /* 700 */
  font-family: var(--font-primary);     /* Lato */
}
```

### Medium Cards (5785:18682, 5785:18718, 5785:18754)
```css
.card-teaser-medium {
  /* Container - Same as Large */
  padding-top: var(--space-10);     /* 40px */
  padding-bottom: var(--space-16);  /* 64px */
  padding-left: var(--space-12);    /* 48px */
  padding-right: var(--space-12);   /* 48px */
  gap: var(--space-8);              /* 32px */
  border-radius: var(--radius-small); /* 4px */
  
  /* Typography - Same as Large */
  /* Button - Same as Large */
}
```

### Small Cards (5785:18790, 5785:18826, 5785:18862)
```css
.card-teaser-small {
  /* Container - Same as Large/Medium */
  padding-top: var(--space-10);     /* 40px */
  padding-bottom: var(--space-16);  /* 64px */
  padding-left: var(--space-12);    /* 48px */
  padding-right: var(--space-12);   /* 48px */
  gap: var(--space-8);              /* 32px */
  border-radius: var(--radius-small); /* 4px */
  
  /* Typography - Same as Large/Medium */
  /* Button - Same as Large/Medium */
}
```

### Mobile Cards (5785:18898, 5785:18934, 5785:18970)
```css
.card-teaser-mobile {
  /* Container - Same padding as larger sizes */
  padding-top: var(--space-10);     /* 40px */
  padding-bottom: var(--space-16);  /* 64px */
  padding-left: var(--space-12);    /* 48px */
  padding-right: var(--space-12);   /* 48px */
  gap: var(--space-8);              /* 32px */
  border-radius: var(--radius-small); /* 4px */
  
  /* Heading Typography - Reduced for mobile */
  font-size: var(--text-h5-size);   /* 21px */
  line-height: 30.5px;               /* Custom - not tokenized */
  font-weight: var(--font-weight-black); /* 900 - Heavy */
  font-family: var(--font-primary);  /* Lato */
  text-transform: uppercase;
  
  /* Body Typography - Same as larger sizes */
  font-size: var(--text-default-size);     /* 18px */
  line-height: var(--text-default-height); /* 27px */
  
  /* Button - Reduced padding */
  padding: 8px 64px;                 /* Reduced vertical/horizontal */
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
  
  /* Text Colors */
  --heading: var(--text-heading);           /* #1b1464 */
  --body: var(--text-body);                 /* #51585e */
  
  /* Button - Default state */
  --default: var(--button-primary-bg);      /* #1b1464 */
  --reverse: var(--text-reverse);           /* #ffffff */
  
  /* Button - Hover state (in Large variant) */
  --hover: var(--button-primary-hover);     /* #1d50de */
}
```

### Gray Color Scheme
```css
.card-color-gray {
  /* Container */
  background-color: var(--bg-secondary);    /* #eceeef (neutral-100) */
  box-shadow: var(--shadow-subtle);         /* Same shadow */
  
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
  
  /* Text Colors - Inverted */
  --heading: var(--text-reverse);           /* #ffffff */
  --body: var(--text-reverse);              /* #ffffff */
  
  /* Button Colors - Inverted */
  --default: var(--bg-primary);             /* #ffffff */
  --reverse: var(--text-heading);           /* #1b1464 */
}
```

## Token Dependencies

### Existing Tokens Used
- ✅ Color tokens (primary, neutral, white)
- ✅ Text color semantic aliases
- ✅ Background semantic aliases  
- ✅ Typography size tokens (h3, h5, default)
- ✅ Font family tokens (primary, secondary)
- ✅ Font weight tokens
- ✅ Spacing tokens (space-8, space-10, space-12, space-16)
- ✅ Shadow tokens (shadow-subtle)
- ✅ Border radius tokens (radius-small)

### Analysis of Missing Tokens vs Available Tokens

1. **Line Heights - MISSING IN CURRENT VARIABLES**
   - **Card needs:** `45px` for Large/Medium/Small heading 
   - **Available:** `--text-h3-height: 30px` (doesn't match)
   - **Card needs:** `30.5px` for Mobile heading
   - **Available:** `--text-h5-height: 21px` (doesn't match)
   - **INTERESTING DISCOVERY:** `--quote-oversize-height: 45px` exists and matches desktop card heading height!
   - **RECOMMENDATION:** Add card-specific line height tokens to variables file:
     ```css
     /* Card-specific line heights */
     --card-heading-height: 45px;      /* Desktop cards - matches quote-oversize */
     --card-heading-height-mobile: 30.5px; /* Mobile cards */
     ```
   
2. **Button Padding - PARTIALLY AVAILABLE**
   - **Card needs:** `16px 80px` for desktop cards, `8px 64px` for mobile
   - **Available generic tokens:**
     - `--padding-button: 16px 24px` (vertical matches, horizontal differs)
     - `--padding-button-small: 12px 16px` (doesn't match mobile)
     - `--padding-button-large: 20px 32px` (doesn't match)
   - **Analysis:** Cards use much wider horizontal padding (80px vs 24px) for visual impact
   - **RECOMMENDATION:** Add card-specific button padding tokens:
     ```css
     /* Card button-specific padding */
     --padding-button-card: 16px 80px;      /* Wide CTAs in cards */
     --padding-button-card-mobile: 8px 64px; /* Mobile card CTAs */
     ```

3. **Component-Specific Tokens - PARTIALLY AVAILABLE**
   - **Padding Tokens:**
     - Card uses: `40px 48px 64px` (top, horizontal, bottom)
     - Available: Individual spacing tokens exist (`--space-10: 40px`, `--space-12: 48px`, `--space-16: 64px`)
     - Generic `--padding-card: 1.5rem` (24px) exists but doesn't match card requirements
   - **RECOMMENDATION:** Add semantic card padding token:
     ```css
     /* Card-specific padding */
     --padding-card-teaser: var(--space-10) var(--space-12) var(--space-16);
     ```

### Summary of Required Additions to variables-v3.0-20251023.css

Add the following tokens to the Component-Specific Tokens section:

```css
/* =================================================
   CARD/TEASER COMPONENT TOKENS
   ================================================= */
:root {
  /* Card-specific line heights */
  --card-heading-height: 45px;           /* Desktop card heading line height */
  --card-heading-height-mobile: 30.5px;  /* Mobile card heading line height */
  
  /* Card-specific button padding */
  --padding-button-card: 16px 80px;      /* Wide CTAs in cards */
  --padding-button-card-mobile: 8px 64px; /* Mobile card CTAs */
  
  /* Card container spacing */
  --padding-card-teaser: var(--space-10) var(--space-12) var(--space-16); /* 40px 48px 64px */
  --card-content-gap: var(--space-8);    /* Gap between card elements - 32px */
}
```

## Responsive Behavior Notes

1. **Size Variants**: While we have 4 size variants (Large, Medium, Small, Mobile), the actual dimensions appear to be controlled by their container width rather than internal changes (except Mobile).

2. **Mobile Optimization**: The Mobile variant has specific changes:
   - Reduced heading size (21px vs 30px)
   - Adjusted line height (30.5px vs 45px)
   - Smaller button padding (8px vs 16px vertical)

3. **Breakpoint Application**: These cards should be used within responsive containers that switch between variants at:
   - Mobile: 380-767px → Use Mobile variant
   - Tablet: 768-1149px → Use Small variant
   - Desktop: 1150-1919px → Use Medium variant
   - DesktopPlus: 1920px+ → Use Large variant

## Implementation Recommendations

1. **Create Card Component Classes**
   ```css
   .card-teaser {
     /* Base styles using tokens */
     padding: var(--padding-card-teaser);
     gap: var(--card-content-gap);
     border-radius: var(--radius-small);
     box-shadow: var(--shadow-subtle);
   }
   ```

2. **Size Modifiers**
   ```css
   .card-teaser--mobile { /* Mobile-specific overrides */ }
   .card-teaser--small { /* Small variant styles */ }
   .card-teaser--medium { /* Medium variant styles */ }
   .card-teaser--large { /* Large variant styles */ }
   ```

3. **Color Scheme Modifiers**
   ```css
   .card-teaser--default { /* Default colors */ }
   .card-teaser--gray { /* Gray background */ }
   .card-teaser--reverse { /* Dark background */ }
   ```

4. **Responsive Wrapper**
   Consider using a wrapper that automatically switches card size based on viewport:
   ```css
   @media (max-width: 767px) {
     .card-teaser-responsive { /* Apply mobile variant */ }
   }
   @media (min-width: 768px) and (max-width: 1149px) {
     .card-teaser-responsive { /* Apply small variant */ }
   }
   @media (min-width: 1150px) and (max-width: 1919px) {
     .card-teaser-responsive { /* Apply medium variant */ }
   }
   @media (min-width: 1920px) {
     .card-teaser-responsive { /* Apply large variant */ }
   }
   ```

## Next Steps

1. **Token Addition**: Add the 6 missing tokens to `variables-v3.0-20251023.css`
2. **Component Creation**: Build reusable card component using mapped tokens
3. **Testing**: Verify all variants render correctly across breakpoints
4. **Documentation**: Update component library with usage guidelines
5. **Integration**: Apply cards within page section containers

## Notes

- The 45px line height for desktop cards interestingly matches `--quote-oversize-height`, suggesting this may be a design system pattern for oversized display text
- Card buttons use significantly wider padding than standard buttons to create visual prominence
- The generic `--padding-card: 1.5rem` token exists but doesn't match these teaser cards, suggesting different card types may have different padding requirements
