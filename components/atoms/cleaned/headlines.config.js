/**
 * Headline Component Configuration
 * Node ID: 1425:1182
 * 
 * This configuration defines all available headline variants
 * for the Purposeful Media design system.
 */

const HeadlineConfig = {
  // Typography hierarchy with specifications
  sizes: {
    h1: {
      fontSize: '36px',
      lineHeight: '54px',
      mobileSize: '28px',
      tabletSize: '32px',
      desktopPlusSize: '40px'
    },
    h2: {
      fontSize: '30px',
      lineHeight: '45px',
      mobileSize: '24px',
      tabletSize: '28px',
      desktopPlusSize: '34px'
    },
    h3: {
      fontSize: '24px',
      lineHeight: '36px',
      mobileSize: '20px',
      tabletSize: '22px',
      desktopPlusSize: '28px'
    },
    h4: {
      fontSize: '21px',
      lineHeight: '30px',
      mobileSize: '18px',
      tabletSize: '20px',
      desktopPlusSize: '24px'
    },
    h5: {
      fontSize: '18px',
      lineHeight: '27px',
      mobileSize: '16px',
      tabletSize: '17px',
      desktopPlusSize: '20px'
    },
    h6: {
      fontSize: '16px',
      lineHeight: '24px',
      mobileSize: '14px',
      tabletSize: '15px',
      desktopPlusSize: '18px'
    }
  },

  // Color system
  colors: {
    default: '#1B1464',  // Brand Navy
    reverse: '#FFFFFF',  // White
    dark: '#51585E',     // Charcoal Gray
    gray: '#C7CBCF'      // Light Gray
  },

  // Text transform options
  transforms: {
    uppercase: 'uppercase',
    default: 'none'
  },

  // Generate all possible variants (48 total)
  getAllVariants() {
    const variants = [];
    const levels = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
    const colors = ['default', 'reverse', 'dark', 'gray'];
    const cases = ['uppercase', 'default'];

    levels.forEach(level => {
      colors.forEach(color => {
        cases.forEach(textCase => {
          variants.push({
            level,
            color,
            case: textCase,
            className: `headline ${level} ${color} ${textCase === 'default' ? '' : 'uppercase'}`.trim(),
            styles: {
              ...this.sizes[level],
              color: this.colors[color],
              textTransform: this.transforms[textCase]
            }
          });
        });
      });
    });

    return variants;
  },

  // Helper function to get specific variant
  getVariant(level, color = 'default', textCase = 'default') {
    return {
      className: `headline ${level} ${color} ${textCase === 'default' ? '' : 'uppercase'}`.trim(),
      styles: {
        ...this.sizes[level],
        color: this.colors[color],
        textTransform: this.transforms[textCase]
      }
    };
  },

  // Breakpoint definitions
  breakpoints: {
    mobile: { min: 380, max: 767 },
    tablet: { min: 768, max: 1149 },
    desktop: { min: 1150, max: 1919 },
    desktopPlus: { min: 1920 }
  }
};

// Export for use in build tools or frameworks
if (typeof module !== 'undefined' && module.exports) {
  module.exports = HeadlineConfig;
}
