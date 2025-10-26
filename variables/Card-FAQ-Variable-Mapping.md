# Card/FAQ Component Variable Mapping Documentation

## Component Overview
The FAQ card is an interactive accordion-style component designed for frequently asked questions and answers. It features a collapsible interface with smooth state transitions, providing an intuitive user experience for content exploration. The component maintains consistent behavior across all breakpoints with appropriate touch targets and visual feedback.

## Component Structure

### Anatomy
```
Card/FAQ
├── Question Section (Always visible)
│   ├── Question Text (Lato Heavy)
│   └── Chevron Indicator (> symbol, rotates on open)
└── Answer Section (Toggleable)
    └── Answer Text (Open Sans Regular)
```

### State Behaviors
- **Default**: Collapsed, showing only question
- **Hover**: Background highlight with shadow
- **Open**: Expanded with answer visible, chevron rotated down

## Design Token Mapping

### Container Properties

#### Background Colors
| State | Token | Value | Notes |
|-------|-------|-------|-------|
| Default | `transparent` | `transparent` | No background |
| Hover | `--color-accent-100` | `#F4EBCD` | Warm highlight on interaction |
| Open | `transparent` | `transparent` | Focus on content |

#### Spacing & Padding
| Property | Token | Value | Application |
|----------|-------|-------|-------------|
| Container Padding X | `--space-3` | `12px` | Horizontal container spacing |
| Container Padding Y (Desktop) | `--space-4` | `16px` | Desktop vertical spacing |
| Container Padding Y (Mobile) | `--space-2` | `8px` | Mobile vertical spacing |
| Question Padding L | `--space-3` | `12px` | Left padding for question |
| Question Padding R | `--space-6` | `24px` | Right padding (chevron space) |
| Question Padding Y | `--space-2` | `8px` | Vertical question padding |
| Answer Padding L (Desktop) | `--space-8` | `32px` | Desktop answer indentation |
| Answer Padding L (Mobile) | `--space-5` | `20px` | Mobile answer indentation |
| Answer Padding R | `--space-2` | `8px` | Right padding for answer |
| Answer Padding Y | `--space-2` | `8px` | Vertical answer padding |

#### Visual Effects
| State | Property | Token | Value |
|-------|----------|-------|-------|
| Default | Border Radius | `--radius-medium` | `8px` |
| Hover | Box Shadow | `--shadow-subtle` | `4px 4px 12px 0px rgba(0, 0, 0, 0.1)` |
| Open | Box Shadow | `--shadow-none` | `none` |

### Typography Mapping

#### Question Typography
| Property | Token | Value |
|----------|-------|-------|
| Font Family | `--font-primary` | `Lato` |
| Font Size | `--text-lead-size` | `21px` |
| Line Height | Custom | `30.5px` |
| Font Weight | `--font-weight-black` | `900` (Heavy) |
| Color | `--text-body` | `#51585E` |

#### Answer Typography
| Property | Token | Value |
|----------|-------|-------|
| Font Family | `--font-secondary` | `Open Sans` |
| Font Size | `--text-default-size` | `18px` |
| Line Height | `--text-default-height` | `27px` |
| Font Weight | `--font-weight-regular` | `400` |
| Color | `--text-body` | `#51585E` |

#### Chevron Indicator
| Property | Token | Value | Notes |
|----------|-------|-------|-------|
| Font Family | `--font-primary` | `Lato` | Matches question font |
| Font Size | Custom | `30px` | Larger for visibility |
| Line Height | Custom | `45px` | Proper alignment |
| Font Weight | `--font-weight-black` | `900` | Bold indicator |
| Color | `--text-body` | `#51585E` | Matches question text |
| Rotation (Closed) | — | `0deg` | Points right |
| Rotation (Open) | — | `90deg` | Points down |

## Responsive Behavior

### Breakpoint Specifications

#### Desktop & DesktopPlus (1150px+)
```css
.faq-card {
  padding: var(--space-4) var(--space-3); /* 16px 12px */
}

.faq-answer {
  padding-left: var(--space-8); /* 32px indentation */
}
```

#### Tablet (768px - 1149px)
```css
.faq-card-tablet {
  padding: var(--space-4) var(--space-3); /* 16px 12px */
}

.faq-answer-tablet {
  padding-left: var(--space-8); /* 32px indentation */
}
```

#### Mobile (380px - 767px)
```css
.faq-card-mobile {
  padding: var(--space-2) var(--space-3); /* 8px 12px */
}

.faq-answer-mobile {
  padding-left: var(--space-5); /* 20px indentation */
}
```

## Interactive States Implementation

### CSS State Classes
```css
/* Base Structure */
.faq-card {
  display: flex;
  flex-direction: column;
  gap: 0;
  transition: all var(--transition-base);
}

/* Question Section */
.faq-question {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: var(--space-2) var(--space-6) var(--space-2) var(--space-3);
  border-radius: var(--radius-medium);
  cursor: pointer;
  background: transparent;
  transition: background-color var(--transition-base),
              box-shadow var(--transition-base);
}

/* Hover State */
.faq-question:hover {
  background: var(--color-accent-100);
  box-shadow: var(--shadow-subtle);
}

/* Chevron Indicator */
.faq-chevron {
  font-family: var(--font-primary);
  font-size: 30px;
  font-weight: var(--font-weight-black);
  line-height: 45px;
  color: var(--text-body);
  transform: rotate(0deg);
  transition: transform var(--transition-base);
}

/* Open State Chevron */
.faq-card.open .faq-chevron {
  transform: rotate(90deg);
}

/* Answer Section */
.faq-answer {
  max-height: 0;
  overflow: hidden;
  opacity: 0;
  padding: 0 var(--space-2) 0 var(--space-8);
  transition: max-height var(--transition-slow),
              opacity var(--transition-base),
              padding var(--transition-base);
}

/* Open State Answer */
.faq-card.open .faq-answer {
  max-height: 500px; /* Adjust based on content */
  opacity: 1;
  padding: var(--space-2) var(--space-2) var(--space-2) var(--space-8);
}

/* Mobile Answer Indentation */
@media (max-width: 767px) {
  .faq-answer {
    padding-left: var(--space-5);
  }
  
  .faq-card.open .faq-answer {
    padding-left: var(--space-5);
  }
}
```

## Accessibility Implementation

### ARIA Attributes
```html
<div class="faq-card" role="region" aria-labelledby="faq-question-1">
  <button 
    class="faq-question"
    id="faq-question-1"
    aria-expanded="false"
    aria-controls="faq-answer-1"
  >
    <span class="faq-question-text">
      Lorem ipsum dolor sit amet?
    </span>
    <span class="faq-chevron" aria-hidden="true">›</span>
  </button>
  
  <div 
    class="faq-answer"
    id="faq-answer-1"
    role="region"
    aria-labelledby="faq-question-1"
    aria-hidden="true"
  >
    <p class="faq-answer-text">
      Turpis egestas integer eget aliquet...
    </p>
  </div>
</div>
```

### Keyboard Navigation
```javascript
// Toggle on Enter or Space
element.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' || e.key === ' ') {
    e.preventDefault();
    toggleFAQ(element);
  }
});

// Support for arrow keys in FAQ groups
if (e.key === 'ArrowDown') {
  // Focus next FAQ
}
if (e.key === 'ArrowUp') {
  // Focus previous FAQ
}
```

### Focus States
```css
.faq-question:focus-visible {
  outline: var(--focus-outline);
  outline-offset: var(--focus-outline-offset);
  border-radius: var(--radius-medium);
}
```

## JavaScript Interaction Pattern

### Toggle Functionality
```javascript
class FAQCard {
  constructor(element) {
    this.card = element;
    this.question = element.querySelector('.faq-question');
    this.answer = element.querySelector('.faq-answer');
    this.chevron = element.querySelector('.faq-chevron');
    this.isOpen = false;
    
    this.init();
  }
  
  init() {
    this.question.addEventListener('click', () => this.toggle());
  }
  
  toggle() {
    this.isOpen = !this.isOpen;
    
    // Update classes
    this.card.classList.toggle('open', this.isOpen);
    
    // Update ARIA
    this.question.setAttribute('aria-expanded', this.isOpen);
    this.answer.setAttribute('aria-hidden', !this.isOpen);
    
    // Smooth height animation
    if (this.isOpen) {
      this.answer.style.maxHeight = this.answer.scrollHeight + 'px';
    } else {
      this.answer.style.maxHeight = '0';
    }
  }
  
  // Optional: Close when another FAQ opens
  close() {
    if (this.isOpen) {
      this.toggle();
    }
  }
}

// Initialize all FAQ cards
document.querySelectorAll('.faq-card').forEach(card => {
  new FAQCard(card);
});
```

## Animation Timing

### Transition Variables
```css
:root {
  --faq-transition-speed: var(--transition-base); /* 0.2s */
  --faq-height-transition: var(--transition-slow); /* 0.3s */
  --faq-rotation-transition: var(--transition-base); /* 0.2s */
}
```

### Easing Functions
```css
.faq-answer {
  transition-timing-function: ease-in-out;
}

.faq-chevron {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
```

## Implementation Notes

### Variable Dependencies
All variables reference the central design system file:
```css
@import '../styles/variables-v3.0-20251023.css';
```

### Content Length Considerations
- Answer max-height should be dynamic based on content
- Consider using `scrollHeight` for JavaScript calculations
- Add scroll for very long answers if needed

### Group Behavior Options
1. **Independent**: Each FAQ operates independently
2. **Accordion**: Only one FAQ open at a time
3. **Mixed**: Allow multiple open with option to collapse all

### Performance Optimizations
```css
/* Use transform for chevron instead of rotation property */
.faq-chevron {
  will-change: transform;
}

/* Optimize repaints during animation */
.faq-answer {
  will-change: max-height, opacity;
}
```

## Testing Checklist

- [ ] Verify smooth expand/collapse animation
- [ ] Test keyboard navigation (Enter, Space, Arrow keys)
- [ ] Confirm proper ARIA attribute updates
- [ ] Validate hover state background and shadow
- [ ] Check chevron rotation animation
- [ ] Test touch interactions on mobile devices
- [ ] Verify answer text indentation at all breakpoints
- [ ] Confirm focus states for accessibility
- [ ] Test with varying content lengths
- [ ] Validate transition timing feels natural
- [ ] Check memory cleanup if FAQ is dynamically removed
- [ ] Test with screen readers for proper announcements

## Related Components
- `Card/BlogPost` - Content teaser cards
- `Text/BlockQuote` - For testimonial content
- `Accordion/Multi` - For grouped expandable content
- `Tab/Navigation` - Alternative content organization

## Usage Guidelines

### When to Use
- Frequently asked questions sections
- Help documentation
- Product feature explanations
- Terms and conditions breakdowns
- Tutorial or onboarding content

### Content Best Practices
- Keep questions concise and scannable
- Front-load keywords in questions
- Provide complete but brief answers
- Use consistent question format (e.g., all as questions)
- Group related FAQs together

### SEO Considerations
```html
<!-- Structured data for FAQ -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "Question text",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Answer text"
    }
  }]
}
</script>
```

## Version History
- **v1.0** (2025-10-25): Initial documentation and variable mapping
- Component IDs: Desktop (4666:1821), Tablet (4695:1889), Mobile (4695:1922)
- Design System Version: `variables-v3.0-20251023.css`
