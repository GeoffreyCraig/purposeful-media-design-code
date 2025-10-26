# Card/BlogPost Component Variable Mapping Documentation

## Component Overview
The BlogPost card is a responsive organism component designed to display blog content teasers across the website. It features structured content hierarchy with title, metadata, excerpt text, and a read more link. The component adapts seamlessly across all breakpoints with appropriate state variations for user interaction.

## Component Structure

### Anatomy
```
Card/BlogPost
├── CardTop (Header Section)
│   ├── Title (Lato Heavy, uppercase)
│   └── Metadata (Open Sans Regular, category | date | author)
└── Content Area
    └── Excerpt Text with [Read more] link
```

## Design Token Mapping

### Container Properties

#### Background Colors
| State | Token | Value | Notes |
|-------|-------|-------|-------|
| Default | `--bg-primary` | `#FFFFFF` | Clean white background |
| Hover | `--color-accent-50` | `#FAF5E6` | Subtle warm highlight |
| Active | `--color-accent-100` | `#F4EBCD` | Deeper engagement state |
| Disabled | `--color-neutral-100` | `#ECEEEF` | Muted inactive state |

#### Spacing & Padding
| Property | Token | Value | Application |
|----------|-------|-------|-------------|
| Container Padding X | `--space-4` | `16px` | Horizontal internal spacing |
| Container Padding Y | `--space-3` | `12px` | Vertical internal spacing |
| Section Gap | `--space-4` | `16px` | Between CardTop and Content |
| Content Bottom Padding | `--space-5` | `20px` | Extra breathing room at bottom |

#### Shadow Effects
| State | Token | Value |
|-------|-------|-------|
| Default | `--shadow-none` | `none` |
| Hover | `--shadow-subtle` | `4px 4px 12px 0px rgba(0, 0, 0, 0.1)` |
| Active | `--shadow-standard` | `4px 4px 12px 0px rgba(0, 0, 0, 0.15)` |
| Disabled | `--shadow-none` | `none` |

### Typography Mapping

#### Title Typography
| Breakpoint | Property | Token | Value |
|------------|----------|-------|-------|
| Desktop/Tablet | Font Family | `--font-primary` | `Lato` |
| Desktop/Tablet | Font Size | `--text-lead-size` | `21px` |
| Desktop/Tablet | Line Height | Custom | `30.5px` |
| Desktop/Tablet | Font Weight | `--font-weight-black` | `900` |
| Mobile | Font Size | Responsive | `16px` |
| Mobile | Line Height | Responsive | `24px` |

**Text Transform:** `uppercase` (hardcoded for titles)

#### Title Color States
| State | Token | Value | Description |
|-------|-------|-------|-------------|
| Default | `--text-heading` | `#1B1464` | Primary brand navy |
| Hover | `--text-body` | `#51585E` | Neutral dark for contrast |
| Active | `--text-heading` | `#1B1464` | Return to brand color |
| Disabled | `--text-disabled` | `#A2A9AF` | Muted gray |

#### Metadata Typography
| Property | Token | Value |
|----------|-------|-------|
| Font Family | `--font-secondary` | `Open Sans` |
| Font Size | `--text-small-size` | `12px` |
| Line Height | `--text-small-height` | `18px` |
| Font Weight | `--font-weight-regular` | `400` |
| Color (Default) | `--text-heading` | `#1B1464` |
| Color (Hover/Active) | `--text-body` | `#51585E` |
| Color (Disabled) | `--text-disabled` | `#A2A9AF` |

#### Body/Excerpt Typography
| Property | Token | Value |
|----------|-------|-------|
| Font Family | `--font-secondary` | `Open Sans` |
| Font Size | `--text-default-size` | `18px` |
| Line Height | `--text-default-height` | `27px` |
| Font Weight | `--font-weight-regular` | `400` |
| Color | `--text-body` | `#51585E` |

#### Read More Link Colors
| State | Token | Value | Description |
|-------|-------|-------|-------------|
| Default | `--color-primary-500` | `#1D50DE` | Bright blue link |
| Hover | `--color-teal-500` | `#39CCCC` | Teal for interaction |
| Active | `--color-primary-600` | `#1740B0` | Deeper blue on click |
| Disabled | `--text-disabled` | `#A2A9AF` | Muted when inactive |

## Responsive Behavior

### Breakpoint-Specific Adjustments

#### Desktop & DesktopPlus (1150px+)
```css
.card-blogpost {
  width: 100%;
  max-width: 1150px;
  padding: var(--space-3) var(--space-4);
}
```

#### Tablet (768px - 1149px)
```css
.card-blogpost-tablet {
  width: 100%;
  max-width: 1149px;
  padding: var(--space-3) var(--space-4);
}
```

#### Mobile (380px - 767px)
```css
.card-blogpost-mobile {
  width: 100%;
  max-width: 767px;
  padding: var(--space-3) var(--space-4);
  
  /* Typography adjustments */
  .card-title {
    font-size: 16px;
    line-height: 24px;
  }
}
```

## Interactive States Implementation

### CSS State Classes
```css
/* Default State */
.card-blogpost {
  background: var(--bg-primary);
  box-shadow: var(--shadow-none);
  transition: all var(--transition-base);
}

/* Hover State */
.card-blogpost:hover {
  background: var(--color-accent-50);
  box-shadow: var(--shadow-subtle);
}

.card-blogpost:hover .card-title {
  color: var(--text-body);
}

.card-blogpost:hover .read-more {
  color: var(--color-teal-500);
}

/* Active State */
.card-blogpost:active {
  background: var(--color-accent-100);
  box-shadow: var(--shadow-standard);
}

/* Disabled State */
.card-blogpost.disabled {
  background: var(--color-neutral-100);
  pointer-events: none;
  opacity: 0.7;
}

.card-blogpost.disabled .card-title {
  color: var(--text-disabled);
}
```

## Component Nesting & Composition

### Parent Container Requirements
- Must provide proper width constraints
- Should handle grid/flex layout positioning
- Responsible for external margins/gaps between cards

### Child Component Tokens
```css
.card-top {
  display: flex;
  flex-direction: column;
  gap: var(--space-1); /* 4px between title and metadata */
}

.content-area {
  padding-bottom: var(--space-5);
  padding-top: 0;
}
```

## Accessibility Considerations

### Focus States
```css
.card-blogpost:focus-visible {
  outline: var(--focus-outline);
  outline-offset: var(--focus-outline-offset);
}
```

### Semantic HTML Structure
```html
<article class="card-blogpost" role="article">
  <header class="card-top">
    <h3 class="card-title">Title</h3>
    <div class="card-meta" aria-label="Article metadata">
      <span>Category</span>
      <time>Date</time>
      <span>Author</span>
    </div>
  </header>
  <div class="content-area">
    <p class="excerpt">Text content...</p>
    <a href="#" class="read-more" aria-label="Read full article">
      [Read more]
    </a>
  </div>
</article>
```

## Implementation Notes

### Variable Dependencies
All variables reference the central design system file:
```css
@import '../styles/variables-v3.0-20251023.css';
```

### Transition Timing
Uses consistent transition timing across all interactive elements:
```css
transition: all var(--transition-base); /* 0.2s ease-in-out */
```

### Text Truncation Pattern
The excerpt uses ellipsis pattern with inline read more link:
```css
.excerpt {
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
```

## Testing Checklist

- [ ] Verify all color tokens resolve correctly
- [ ] Test hover states across all breakpoints
- [ ] Confirm typography scales properly on mobile
- [ ] Validate shadow effects render correctly
- [ ] Check focus states for keyboard navigation
- [ ] Test disabled state styling
- [ ] Verify read more link color transitions
- [ ] Confirm padding and spacing consistency
- [ ] Test with varying content lengths
- [ ] Validate responsive behavior at each breakpoint

## Related Components
- `Card/Teaser` - Simpler variant without metadata
- `Card/FAQ` - Accordion-style Q&A cards
- `Card/Resource` - Featured resource teasers
- `Text/BlockQuote` - For testimonial-style content

## Version History
- **v1.0** (2025-10-25): Initial documentation and variable mapping
- Component ID: `5100:39645` (Figma reference)
- Design System Version: `variables-v3.0-20251023.css`
