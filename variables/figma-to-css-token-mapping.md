# Figma to CSS Design Token Mapping
## Phase 1 MVW - Organism Level Components

**Generated:** October 24, 2025  
**Source CSS:** `variables-v3.0-20251023.css`  
**Purpose:** Map Figma design variables to CSS custom properties for consistent implementation

---

## Mapping Legend

### Color Variable Patterns
| Figma Variable | CSS Token | Hex Value | Usage |
|----------------|-----------|-----------|-------|
| Brand | `--color-primary-700` | #1b1464 | Primary navy blue |
| Primary | `--color-white` | #ffffff | White backgrounds |
| Secondary | `--color-neutral-100` | #eceeef | Light gray backgrounds |
| Accent | `--color-accent-500` | #d4af37 | Gold accent |
| Heading | `--text-heading` → `--color-primary-700` | #1b1464 | Heading text |
| Body | `--text-body` → `--color-neutral-600` | #51585e | Body text |
| Default | Various contexts | - | Context-dependent |
| Reverse | `--text-reverse` → `--color-white` | #ffffff | White text on dark |
| Muted | `--text-muted` → `--color-neutral-500` | #6c757d | Muted text |
| Disabled | `--text-disabled` → `--color-neutral-300` | #a2a9af | Disabled states |
| Hover | `--state-hover` → `--color-accent-400` | #dcbe5d | Hover states |
| HoverDrop | `--color-primary-500` | #1d50de | Dropdown hover |

### Spacing Variable Patterns
| Figma Variable | CSS Token | Value | Usage |
|----------------|-----------|-------|-------|
| space-0 | `--space-0` | 0 | No spacing |
| space-1 | `--space-1` | 4px | Minimal spacing |
| space-2 | `--space-2` | 8px | Tight spacing |
| space-3 | `--space-3` | 12px | Small spacing |
| space-4 | `--space-4` | 16px | Base spacing |
| space-5 | `--space-5` | 20px | Medium spacing |
| space-6 | `--space-6` | 24px | Large spacing |
| space-8 | `--space-8` | 32px | XL spacing |
| space-10 | `--space-10` | 40px | 2XL spacing |
| space-12 | `--space-12` | 48px | 3XL spacing |
| space-16 | `--space-16` | 64px | 4XL spacing |
| space-20 | `--space-20` | 80px | 5XL spacing |
| space-24 | `--space-24` | 96px | 6XL spacing |

### Numeric Color Scales
| Figma | CSS Token | Hex | Notes |
|-------|-----------|-----|-------|
| 100 | `--color-accent-100` | #f4ebcd | Light gold tint |
| 200 | `--color-neutral-200` | #c7cbcf | Light gray |
| 400 | `--color-neutral-400` | #868f97 | Medium gray |
| 500 | `--color-accent-500` | #d4af37 | Gold accent |
| 900 | `--color-primary-900` | #06102b | Darkest navy |

---

## Page Shell Sections

### 1. Carousel/Hero (Node: 4111:1257)

**Figma Variables Used:**
```json
{
  "400": "#868f97",
  "Hover": "#dcbe5d",
  "space-3": "12",
  "space-0": "0",
  "space-5": "20",
  "space-2": "8",
  "Secondary": "#d4af37",
  "Reverse": "#ffffff",
  "Heading": "#1b1464",
  "Default": "#1b1464",
  "Body": "#51585e"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--color-neutral-400: #868f97;        /* Figma: 400 */
--state-hover: #dcbe5d;              /* Figma: Hover */
--color-accent-500: #d4af37;         /* Figma: Secondary */
--text-reverse: #ffffff;             /* Figma: Reverse */
--text-heading: #1b1464;             /* Figma: Heading */
--text-body: #51585e;                /* Figma: Body */

/* Spacing */
--space-3: 0.75rem;   /* 12px - Figma: space-3 */
--space-0: 0;         /* 0px - Figma: space-0 */
--space-5: 1.25rem;   /* 20px - Figma: space-5 */
--space-2: 0.5rem;    /* 8px - Figma: space-2 */

/* Component-Specific */
--container-standard: 1920px;
--button-primary-hover: var(--color-primary-500);
--button-secondary-bg: var(--color-accent-500);
--shadow-medium: 4px 4px 12px 0px rgba(0, 0, 0, 0.2);
--transition-base: 0.2s ease-in-out;
```

---

### 2. Hero (Node: 2378:1038)

**Figma Variables Used:**
```json
{
  "500": "#d4af37",
  "Reverse": "#ffffff",
  "space-0": "0",
  "Brand": "#1b1464",
  "Accent": "#d4af37",
  "hero-padding-x": "40",
  "hero-padding-mobile": "0",
  "Heading": "#1b1464",
  "Secondary": "#d4af37",
  "space-4": "16",
  "space-20": "80",
  "Default": "#d4af37",
  "space-8": "32",
  "space-16": "64",
  "space-3": "12",
  "space-6": "24",
  "space-2": "8",
  "space-12": "48",
  "space-5": "20"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--color-accent-500: #d4af37;         /* Figma: 500, Accent, Secondary, Default */
--text-reverse: #ffffff;             /* Figma: Reverse */
--color-primary-700: #1b1464;        /* Figma: Brand, Heading */

/* Spacing */
--space-0: 0;
--space-2: 0.5rem;    /* 8px */
--space-3: 0.75rem;   /* 12px */
--space-4: 1rem;      /* 16px */
--space-5: 1.25rem;   /* 20px */
--space-6: 1.5rem;    /* 24px */
--space-8: 2rem;      /* 32px */
--space-12: 3rem;     /* 48px */
--space-16: 4rem;     /* 64px */
--space-20: 5rem;     /* 80px */

/* Component-Specific */
--hero-padding-x: 40px;              /* Custom Figma variable */
--hero-padding-mobile: 0;            /* Custom Figma variable */
--container-standard: 1920px;
--text-h1-size: 48px;
--text-h1-mobile-size: 36px;
--button-primary-bg: var(--color-primary-700);
--button-secondary-bg: var(--color-accent-500);
```

---

### 3. Banner/Header (Node: 2051:1914)

**Figma Variables Used:**
```json
{
  "100": "#f4ebcd",
  "Reverse": "#ffffff",
  "space-0": "0",
  "MenuSimple": "#ffffff",
  "H2 Headline 30 45h": "Font(family: 'Lato', style: Heavy, size: 30, weight: 800, lineHeight: 45)",
  "space-3": "12",
  "Brand": "#1b1464",
  "Accent": "#d4af37",
  "Heading": "#1b1464",
  "Default": "#d4af37",
  "AccentSimple": "#d4af37",
  "space-5": "20",
  "MenuDrop": "#1b1464",
  "Secondary": "#eceeef",
  "HoverDrop": "#1d50de"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--color-accent-100: #f4ebcd;         /* Figma: 100 */
--text-reverse: #ffffff;             /* Figma: Reverse, MenuSimple */
--color-primary-700: #1b1464;        /* Figma: Brand, Heading, MenuDrop */
--color-accent-500: #d4af37;         /* Figma: Accent, Default, AccentSimple */
--color-neutral-100: #eceeef;        /* Figma: Secondary */
--color-primary-500: #1d50de;        /* Figma: HoverDrop */

/* Spacing */
--space-0: 0;
--space-3: 0.75rem;   /* 12px */
--space-5: 1.25rem;   /* 20px */

/* Navigation-Specific */
--nav-link-color: var(--color-white);
--nav-link-hover: var(--color-accent-400);
--nav-dropdown-bg: var(--color-neutral-100);
--z-sticky: 1020;
--shadow-subtle: 4px 4px 12px 0px rgba(0, 0, 0, 0.1);

/* Typography */
--text-h2-size: 36px;                /* From Figma H2 Headline reference */
--text-h2-height: 36px;
--font-primary: 'Lato', sans-serif;
--link-menu-size: 21px;
--link-menu-weight: 400;
```

---

### 4. Footer/Main (Node: 4424:1012)

**Figma Variables Used:**
```json
{
  "200": "#c7cbcf",
  "900": "#06102b",
  "space-0": "0",
  "MenuSimple": "#ffffff",
  "Disabled": "#868f97",
  "space-4": "16",
  "space-3": "12",
  "Brand": "#1b1464",
  "Heading": "#1b1464",
  "Body": "#51585e",
  "Default": "#1b1464",
  "space-2": "8",
  "Reverse": "#ffffff",
  "space-6": "24",
  "space-8": "32",
  "Secondary": "#eceeef",
  "space-12": "48",
  "Accent": "#d4af37",
  "Muted": "#c7cbcf",
  "space-1": "4",
  "Primary": "#1b1464",
  "space-5": "20"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--color-neutral-200: #c7cbcf;        /* Figma: 200, Muted */
--color-primary-900: #06102b;        /* Figma: 900 */
--text-reverse: #ffffff;             /* Figma: MenuSimple, Reverse */
--text-disabled: #868f97;            /* Figma: Disabled */
--color-primary-700: #1b1464;        /* Figma: Brand, Heading, Default, Primary */
--text-body: #51585e;                /* Figma: Body */
--color-neutral-100: #eceeef;        /* Figma: Secondary */
--color-accent-500: #d4af37;         /* Figma: Accent */

/* Spacing */
--space-0: 0;
--space-1: 0.25rem;   /* 4px */
--space-2: 0.5rem;    /* 8px */
--space-3: 0.75rem;   /* 12px */
--space-4: 1rem;      /* 16px */
--space-5: 1.25rem;   /* 20px */
--space-6: 1.5rem;    /* 24px */
--space-8: 2rem;      /* 32px */
--space-12: 3rem;     /* 48px */

/* Footer-Specific */
--bg-brand: var(--color-primary-700);
--link-text-size: 18px;
--link-attribution-size: 14px;
--text-small-size: 12px;
--icon-size-small: 16px;
--border-subtle: var(--color-neutral-200);
```

---

### 5. Footer/Simple (Node: 4243:9975)

**Figma Variables Used:**
```json
{
  "200": "#c7cbcf",
  "900": "#06102b",
  "space-0": "0",
  "space-8": "32",
  "Muted": "#c7cbcf",
  "space-3": "12",
  "space-12": "48",
  "Brand": "#1b1464",
  "Accent": "#d4af37",
  "space-2": "8",
  "space-6": "24",
  "space-5": "20",
  "space-1": "4",
  "Secondary": "#eceeef",
  "Default": "#a2a9af"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--color-neutral-200: #c7cbcf;        /* Figma: 200, Muted */
--color-primary-900: #06102b;        /* Figma: 900 */
--color-primary-700: #1b1464;        /* Figma: Brand */
--color-accent-500: #d4af37;         /* Figma: Accent */
--color-neutral-100: #eceeef;        /* Figma: Secondary */
--color-neutral-300: #a2a9af;        /* Figma: Default */

/* Spacing */
--space-0: 0;
--space-1: 0.25rem;   /* 4px */
--space-2: 0.5rem;    /* 8px */
--space-3: 0.75rem;   /* 12px */
--space-5: 1.25rem;   /* 20px */
--space-6: 1.5rem;    /* 24px */
--space-8: 2rem;      /* 32px */
--space-12: 3rem;     /* 48px */

/* Footer Simple-Specific */
--bg-secondary: var(--color-neutral-100);
--text-small-size: 12px;
--text-caption-size: 10px;
--border-subtle: var(--color-neutral-200);
```

---

### 6. MobileNewsSignUp (Node: 12259:9654)

**Figma Variables Used:**
```json
{}
```

**CSS Token Mapping:**
```css
/* No explicit Figma variables returned - using standard form tokens */

/* Form Components */
--bg-form-container: var(--color-neutral-100);
--bg-form-field: var(--color-white);
--form-border-default: 2px solid var(--color-neutral-300);
--form-border-focus: 2px solid var(--color-primary-700);
--form-border-error: 2px solid var(--color-error-500);
--form-input-height-medium: 36px;
--form-container-padding-mobile: 16px 12px;

/* Buttons */
--button-secondary-bg: var(--color-accent-500);
--button-tertiary-bg: var(--color-teal-500);
--button-height-medium: 48px;

/* Typography */
--text-form-size: 18px;
--label-form-size: 14px;
--label-form-weight: 700;

/* Spacing */
--space-4: 1rem;      /* 16px */
--space-6: 1.5rem;    /* 24px */
```

---

## Contextual Shell Sections

### 7. Section/Resources (Node: 5019:26410)

**Figma Variables Used:**
```json
{
  "Reverse": "#ffffff",
  "space-0": "0",
  "Heading": "#1b1464",
  "Default": "#d4af37",
  "space-8": "32",
  "space-3": "12",
  "space-12": "48",
  "space-4": "16",
  "space-1": "4",
  "Accent": "#d4af37",
  "Secondary": "#eceeef"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--text-reverse: #ffffff;             /* Figma: Reverse */
--text-heading: #1b1464;             /* Figma: Heading */
--color-accent-500: #d4af37;         /* Figma: Default, Accent */
--color-neutral-100: #eceeef;        /* Figma: Secondary */

/* Spacing */
--space-0: 0;
--space-1: 0.25rem;   /* 4px */
--space-3: 0.75rem;   /* 12px */
--space-4: 1rem;      /* 16px */
--space-8: 2rem;      /* 32px */
--space-12: 3rem;     /* 48px */

/* Resources-Specific */
--container-standard: 1920px;
--text-h2-size: 36px;
--text-h3-size: 30px;
--text-default-size: 18px;
--padding-card: 1.5rem;
--shadow-standard: 4px 4px 12px 0px rgba(0, 0, 0, 0.15);
--icon-size-large: 32px;
```

---

### 8. Section/FAQGroupBranded (Node: 4677:23940)

**Figma Variables Used:**
```json
{
  "100": "#f4ebcd",
  "Dark": "#51585e",
  "space-3": "12",
  "space-2": "8",
  "Body": "#51585e",
  "space-0": "0",
  "space-8": "32",
  "space-4": "16",
  "space-6": "24",
  "space-20": "80",
  "space-16": "64",
  "Secondary": "#eceeef",
  "space-24": "96",
  "space-12": "48",
  "space-5": "20"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--color-accent-100: #f4ebcd;         /* Figma: 100 */
--color-neutral-600: #51585e;        /* Figma: Dark, Body */
--color-neutral-100: #eceeef;        /* Figma: Secondary */

/* Spacing */
--space-0: 0;
--space-2: 0.5rem;    /* 8px */
--space-3: 0.75rem;   /* 12px */
--space-4: 1rem;      /* 16px */
--space-5: 1.25rem;   /* 20px */
--space-6: 1.5rem;    /* 24px */
--space-8: 2rem;      /* 32px */
--space-12: 3rem;     /* 48px */
--space-16: 4rem;     /* 64px */
--space-20: 5rem;     /* 80px */
--space-24: 6rem;     /* 96px */

/* FAQ-Specific */
--text-h3-size: 30px;
--text-h4-size: 24px;
--text-default-size: 18px;
--border-default: var(--color-neutral-300);
--color-accent-500: #d4af37;         /* For expand/collapse branding */
--transition-base: 0.2s ease-in-out;
--icon-size-medium: 24px;
```

---

### 9. Content/ResourceOffer (Node: 5398:2646)

**Figma Variables Used:**
```json
{
  "space-5": "20",
  "space-8": "32",
  "Primary": "#ffffff",
  "Heading": "#1b1464",
  "Body": "#51585e",
  "Reverse": "#ffffff",
  "Default": "#1b1464",
  "space-12": "48",
  "space-10": "40",
  "space-0": "0",
  "space-3": "12",
  "Secondary": "#eceeef",
  "space-6": "24"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--color-white: #ffffff;              /* Figma: Primary, Reverse */
--text-heading: #1b1464;             /* Figma: Heading, Default */
--text-body: #51585e;                /* Figma: Body */
--color-neutral-100: #eceeef;        /* Figma: Secondary */

/* Spacing */
--space-0: 0;
--space-3: 0.75rem;   /* 12px */
--space-5: 1.25rem;   /* 20px */
--space-6: 1.5rem;    /* 24px */
--space-8: 2rem;      /* 32px */
--space-10: 2.5rem;   /* 40px */
--space-12: 3rem;     /* 48px */

/* Resource Offer-Specific */
--container-narrow: 1200px;          /* Text-focused content */
--text-h3-size: 30px;
--text-h4-size: 24px;
--text-lead-size: 21px;
--text-large-size: 24px;
--button-primary-bg: var(--color-primary-700);
--button-height-large: 56px;
--shadow-medium: 4px 4px 12px 0px rgba(0, 0, 0, 0.2);
--bg-success-subtle: var(--color-teal-50);
--padding-card: 1.5rem;
```

---

### 10. Content/2ColumnContact (Node: 5411:36827)

**Figma Variables Used:**
```json
{
  "Heading": "#1b1464",
  "Body": "#51585e",
  "Reverse": "#ffffff",
  "Default": "#1b1464",
  "space-12": "48",
  "space-10": "40",
  "Primary": "#ffffff",
  "space-16": "64",
  "space-4": "16",
  "space-5": "20",
  "Secondary": "#eceeef",
  "space-0": "0"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--text-heading: #1b1464;             /* Figma: Heading, Default */
--text-body: #51585e;                /* Figma: Body */
--text-reverse: #ffffff;             /* Figma: Reverse */
--color-white: #ffffff;              /* Figma: Primary */
--color-neutral-100: #eceeef;        /* Figma: Secondary */

/* Spacing */
--space-0: 0;
--space-4: 1rem;      /* 16px */
--space-5: 1.25rem;   /* 20px */
--space-10: 2.5rem;   /* 40px */
--space-12: 3rem;     /* 48px */
--space-16: 4rem;     /* 64px */

/* 2-Column Contact-Specific */
--container-standard: 1920px;
--grid-columns: 12;
--grid-gap: var(--space-6);
--text-h3-size: 30px;
--form-border-default: 2px solid var(--color-neutral-300);
--form-border-focus: 2px solid var(--color-primary-700);
--form-input-height-large: 48px;
--form-container-padding-desktop: 29px 27px;
--form-container-padding-tablet: 24px 20px;
--form-container-padding-mobile: 16px 12px;
--bg-form-container: var(--color-neutral-100);
--button-primary-bg: var(--color-primary-700);
```

---

### 11. Section/ContactUs (Node: 5738:19405)

**Figma Variables Used:**
```json
{
  "Heading": "#1b1464",
  "Body": "#51585e",
  "Default": "#1b1464",
  "space-2": "8",
  "Reverse": "#ffffff",
  "Secondary": "#eceeef",
  "space-0": "0",
  "space-16": "64",
  "space-5": "20"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--text-heading: #1b1464;             /* Figma: Heading, Default */
--text-body: #51585e;                /* Figma: Body */
--text-reverse: #ffffff;             /* Figma: Reverse */
--color-neutral-100: #eceeef;        /* Figma: Secondary */

/* Spacing */
--space-0: 0;
--space-2: 0.5rem;    /* 8px */
--space-5: 1.25rem;   /* 20px */
--space-16: 4rem;     /* 64px */

/* Contact Section-Specific */
--text-h2-size: 36px;
--text-h3-size: 30px;
--form-border-default: 2px solid var(--color-neutral-300);
--form-border-focus: 2px solid var(--color-primary-700);
--form-border-error: 2px solid var(--color-error-500);
--form-container-padding-desktop: 29px 27px;
--bg-form-container: var(--color-neutral-100);
--bg-form-field: var(--color-white);
--button-primary-bg: var(--color-primary-700);
--button-height-large: 56px;
--shadow-subtle: 4px 4px 12px 0px rgba(0, 0, 0, 0.1);
```

---

### 12. Content/2ColumnGraphic (Node: 5610:8138)

**Figma Variables Used:**
```json
{
  "Heading": "#1b1464",
  "Body": "#51585e",
  "Default": "#1b1464",
  "space-16": "64",
  "Primary": "#ffffff",
  "space-5": "20",
  "space-24": "96",
  "space-8": "32",
  "Hover": "#dcbe5d",
  "space-6": "24",
  "space-10": "40",
  "space-12": "48",
  "space-4": "16",
  "Reverse": "#ffffff",
  "space-0": "0"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--text-heading: #1b1464;             /* Figma: Heading, Default */
--text-body: #51585e;                /* Figma: Body */
--color-white: #ffffff;              /* Figma: Primary, Reverse */
--state-hover: #dcbe5d;              /* Figma: Hover */

/* Spacing */
--space-0: 0;
--space-4: 1rem;      /* 16px */
--space-5: 1.25rem;   /* 20px */
--space-6: 1.5rem;    /* 24px */
--space-8: 2rem;      /* 32px */
--space-10: 2.5rem;   /* 40px */
--space-12: 3rem;     /* 48px */
--space-16: 4rem;     /* 64px */
--space-24: 6rem;     /* 96px */

/* 2-Column Graphic-Specific */
--container-standard: 1920px;
--grid-columns: 12;
--grid-gap: var(--space-6);
--text-h3-size: 30px;
--text-h4-size: 24px;
--text-default-size: 18px;
--shadow-standard: 4px 4px 12px 0px rgba(0, 0, 0, 0.15);
--radius-medium: 8px;
--icon-size-large: 32px;
```

---

### 13. Section/BlogGroup (Node: 5143:17149)

**Figma Variables Used:**
```json
{
  "Heading": "#1b1464",
  "space-1": "4",
  "space-0": "0",
  "Body": "#51585e",
  "Feedback/Info": "#1d50de",
  "space-5": "20",
  "container-padding-x": "16",
  "space-4": "16",
  "space-3": "12",
  "space-16": "64",
  "Primary": "#ffffff",
  "space-8": "32",
  "space-20": "80",
  "Secondary": "#eceeef",
  "space-12": "48",
  "H6 Headline 16 24H": "Font(family: 'Lato', style: Heavy, size: 16, weight: 800, lineHeight: 24)"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--text-heading: #1b1464;             /* Figma: Heading */
--text-body: #51585e;                /* Figma: Body */
--color-primary-500: #1d50de;        /* Figma: Feedback/Info */
--color-white: #ffffff;              /* Figma: Primary */
--color-neutral-100: #eceeef;        /* Figma: Secondary */

/* Spacing */
--space-0: 0;
--space-1: 0.25rem;   /* 4px */
--space-3: 0.75rem;   /* 12px */
--space-4: 1rem;      /* 16px */
--space-5: 1.25rem;   /* 20px */
--space-8: 2rem;      /* 32px */
--space-12: 3rem;     /* 48px */
--space-16: 4rem;     /* 64px */
--space-20: 5rem;     /* 80px */

/* Blog Group-Specific */
--container-standard: 1920px;
--container-padding-x: 16px;         /* Custom Figma variable */
--text-h2-size: 36px;
--text-h3-size: 30px;
--text-h4-size: 24px;
--text-h6-size: 18px;                /* From H6 Headline reference */
--text-default-size: 18px;
--text-small-size: 12px;
--link-text-size: 18px;
--padding-card: 1.5rem;
--shadow-standard: 4px 4px 12px 0px rgba(0, 0, 0, 0.15);
--border-subtle: var(--color-neutral-200);
--bg-secondary: var(--color-neutral-100);
```

---

### 14. Section/PageContent (Node: 12554:11543)

**Figma Variables Used:**
```json
{
  "Heading": "#1b1464",
  "Body": "#51585e",
  "space-3": "12",
  "space-4": "16",
  "space-6": "24",
  "Secondary": "#eceeef",
  "space-8": "32",
  "space-16": "64",
  "space-12": "48",
  "space-0": "0",
  "space-5": "20"
}
```

**CSS Token Mapping:**
```css
/* Colors */
--text-heading: #1b1464;             /* Figma: Heading */
--text-body: #51585e;                /* Figma: Body */
--color-neutral-100: #eceeef;        /* Figma: Secondary */

/* Spacing */
--space-0: 0;
--space-3: 0.75rem;   /* 12px */
--space-4: 1rem;      /* 16px */
--space-5: 1.25rem;   /* 20px */
--space-6: 1.5rem;    /* 24px */
--space-8: 2rem;      /* 32px */
--space-12: 3rem;     /* 48px */
--space-16: 4rem;     /* 64px */

/* Page Content-Specific */
--container-narrow: 1200px;          /* Text-focused content */
--container-standard: 1920px;        /* Alternative for wider layouts */
--text-h2-size: 36px;
--text-h3-size: 30px;
--text-h4-size: 24px;
--text-default-size: 18px;
--text-lead-size: 21px;
--margin-paragraph: 1.5rem;
--quote-large-size: 24px;
--quote-medium-size: 21px;
--link-text-size: 18px;
--bg-primary: var(--color-white);
```

---

## Key Observations & Implementation Notes

### 1. **Common Variable Patterns**
- **Heading** consistently maps to `--color-primary-700` (#1b1464)
- **Body** consistently maps to `--color-neutral-600` (#51585e)
- **Secondary** consistently maps to `--color-neutral-100` (#eceeef)
- **Reverse** consistently maps to `--color-white` (#ffffff)
- **Accent** consistently maps to `--color-accent-500` (#d4af37)

### 2. **Spacing Consistency**
All components use the same 8px-based spacing scale, confirming our design system's modular approach.

### 3. **Missing Variables**
- **MobileNewsSignUp** (12259:9654) returned an empty object, suggesting it may not be using Figma variables or they're not properly bound
- This component will need manual token assignment during implementation

### 4. **Custom Variables**
Some components have custom Figma variables not in the CSS:
- `hero-padding-x: 40`
- `hero-padding-mobile: 0`
- `container-padding-x: 16`

These should be added to `variables-v3.0-20251023.css` for consistency.

### 5. **Typography References**
Figma includes font references like:
- `H2 Headline 30 45h`
- `H6 Headline 16 24H`

These confirm our CSS typography tokens are correctly mapped.

### 6. **Contextual "Default" Usage**
The **Default** variable maps to different colors depending on context:
- Usually `#1b1464` (primary navy)
- Sometimes `#d4af37` (gold accent)
- Sometimes `#a2a9af` (neutral gray)

This suggests "Default" should be used contextually, not as a global token.

---

## Recommended Actions

1. **Add Missing Custom Variables** to `variables-v3.0-20251023.css`:
```css
:root {
  /* Hero Component Padding */
  --hero-padding-x: 40px;
  --hero-padding-mobile: 0;
  
  /* Blog Group Container */
  --container-padding-x: 16px;
}
```

2. **Audit MobileNewsSignUp Component** to ensure Figma variables are properly bound

3. **Create CSS Classes** that directly use these mapped tokens for each organism component

4. **Document Contextual Variables** like "Default" that change meaning based on usage

5. **Validate Responsive Behavior** since some variables (like `hero-padding-mobile`) suggest responsive variations

---

## Next Steps for Implementation

1. Generate component-specific CSS files using these mappings
2. Create PHP templates for WordPress that reference these CSS classes
3. Build ACF field groups that align with these design tokens
4. Test each organism in isolation before template integration
5. Consolidate any remaining inline styles into this centralized token system

---

**Document Version:** 1.0  
**Last Updated:** October 24, 2025  
**Maintained By:** Geoffrey Craig  
**Related Files:** 
- `/styles/variables-v3.0-20251023.css`
- `/components/organisms/` (future component files)
