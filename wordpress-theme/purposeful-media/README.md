# Purposeful Media WordPress Theme

**Version:** 1.0.0  
**Created:** October 14, 2025  
**Author:** Purposeful Media Promotions

## Theme Overview

Custom WordPress theme for Purposeful Media B2B marketing website. Built with atomic design methodology and strict adherence to the Purposeful Media Design System.

## Installation Instructions

### 1. Prepare Theme Package

Before uploading to WordPress, you need to:

1. **Copy Assets** (see checklist below)
2. **Create Screenshot** (optional but recommended)
3. **Zip the theme folder**

### 2. Required Assets to Copy

Copy the following assets from your development directory into the theme:

#### **Logos (Required)**
Copy from: `/assets/svg/logos/`
Copy to: `/wordpress-theme/purposeful-media/assets/svg/logos/`

Required files:
- `purposeful-media-logo-white-mobile.svg`
- `purposeful-media-logo-white-tablet.svg`
- `purposeful-media-logo-white-desktop.svg`

#### **Videos (Required)**
Copy from: `/assets/videos/`
Copy to: `/wordpress-theme/purposeful-media/assets/videos/`

Required files:
- `3427717167-preview.mp4` (Slide 1)
- `3432135943-preview.mp4` (Slide 2)
- `3539535235-preview.mp4` (Slide 3)

**NOTE:** These are watermarked preview videos. Replace with licensed versions before production launch.

#### **Images (Required)**
Copy from: `/assets/images/`
Copy to: `/wordpress-theme/purposeful-media/assets/images/`

Required files:
- `shutterstock_2492759463.jpg` (Slide 1 fallback)
- `shutterstock_2454682663.jpg` (Slide 2 fallback)
- `shutterstock_2618933959.jpg` (Slide 3 fallback)
- `shutterstock_1421446100.jpg` (Featured Resource background)
- `shutterstock_2085055825.jpg` (2-Column Graphic background)
- `four-hour-marketing-plan-TN.png` (Featured Resource thumbnail)

**NOTE:** Purchase licenses for all Shutterstock images before production use.

#### **Icon Sprite Sheets (if needed)**
Copy from: `/assets/svg/`
Copy to: `/wordpress-theme/purposeful-media/assets/svg/`

Files:
- Icon sprite sheets (if using SVG sprites)

### 3. Create Theme Screenshot (Optional)

Create a screenshot of your homepage:
- Filename: `screenshot.png`
- Size: 1200x900px
- Format: PNG or JPG
- Place in theme root directory

This will show as the theme preview in WordPress admin.

### 4. Zip the Theme

**On macOS:**
```bash
cd "/Users/geoffreycraig/Library/CloudStorage/Dropbox/PURPOSEFUL MEDIA PROMOTIONS/WEBSITE PROJECT/Development Files/wordpress-theme"
zip -r purposeful-media.zip purposeful-media/
```

**On Windows:**
Right-click the `purposeful-media` folder → Send to → Compressed (zipped) folder

### 5. Upload to WordPress

1. Log into your WordPress admin panel
2. Navigate to: **Appearance → Themes**
3. Click **Add New** → **Upload Theme**
4. Choose the `purposeful-media.zip` file
5. Click **Install Now**
6. Once installed, click **Activate**

## WordPress Setup Checklist

After activating the theme:

### Homepage Setup
1. Go to **Pages → Add New**
2. Create a new page titled "Home"
3. Don't add any content (the template handles everything)
4. **Publish** the page
5. Go to **Settings → Reading**
6. Set "Your homepage displays" to **A static page**
7. Select "Home" as the homepage
8. **Save Changes**

### Navigation Menus
1. Go to **Appearance → Menus**
2. Create menu: **Primary Menu**
3. Add menu items:
   - Home
   - Solutions (with sub-items)
   - Resources (with sub-items)
   - Contact
4. Assign to **Primary Menu** location
5. **Save Menu**

### Recommended Plugins

#### Essential:
- **Advanced Custom Fields (ACF)** - For dynamic content management
  - Free: https://wordpress.org/plugins/advanced-custom-fields/
  - Pro: https://www.advancedcustomfields.com/ ($49)

#### Recommended:
- **WPForms Lite** - For newsletter signup forms
- **Yoast SEO** - For SEO optimization
- **WP Rocket** or **W3 Total Cache** - For performance caching
- **ShortPixel Image Optimizer** - For automatic image compression
- **UpdraftPlus** - For backups

## File Structure

```
purposeful-media/
├── style.css                    # Theme metadata (required)
├── functions.php                # Theme setup and functions
├── header.php                   # Site header
├── footer.php                   # Site footer
├── front-page.php               # Homepage template
├── index.php                    # Fallback template
├── README.md                    # This file
├── screenshot.png               # Theme thumbnail (optional)
│
├── assets/
│   ├── css/
│   │   ├── variables.css                  # Design tokens
│   │   ├── components.css                 # Header, banners, sections
│   │   ├── organisms-heroes.css           # Hero carousel styles
│   │   ├── molecules-icon-display.css     # Icon component styles
│   │   ├── molecules-ui-icon-display.css  # UI icon styles
│   │   └── organisms-footers.css          # Footer styles
│   ├── js/
│   │   ├── hero-carousel.js    # Hero carousel functionality
│   │   └── main.js             # Navigation, footer, return-to-top
│   ├── images/                 # Background images, thumbnails
│   ├── videos/                 # Hero carousel videos
│   └── svg/                    # Logos and icons
│
├── template-parts/             # Reusable component templates (future)
│
└── inc/                        # Helper functions
    ├── enqueue.php             # CSS/JS enqueuing
    └── menus.php               # Menu registration and functions
```

## Current Features

### ✅ Implemented
- Fully responsive header with desktop dropdowns and mobile accordion
- Hero carousel with 3 video slides
- Banner headlines
- Text block sections
- Featured resource section
- Icon banner (Your Next Step)
- 2-column graphic CTA section
- Responsive footer with desktop columns and mobile accordion
- Newsletter signup form
- Return to top button
- Complete design system integration
- Mobile-first responsive design (4 breakpoints)

### 🔄 Planned / Future
- ACF integration for dynamic content
- Custom page templates (About, Services, Blog, Contact)
- Blog post templates
- Contact form integration
- WordPress menu walker for custom navigation structure
- Additional template parts for reusable components

## Design System Compliance

This theme strictly follows the Purposeful Media Design System:
- **Design Tokens:** All colors, spacing, typography from `variables.css`
- **BEM Naming:** All CSS classes use Block Element Modifier methodology
- **Atomic Design:** Component hierarchy (atoms → molecules → organisms → templates)
- **Mobile-First:** Responsive design starting from 380px
- **Accessibility:** WCAG AA compliant with proper ARIA labels and keyboard navigation

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile Safari (iOS)
- Mobile Chrome (Android)

## Breakpoints

- **Mobile:** 380px - 767px
- **Tablet:** 768px - 1149px
- **Desktop:** 1150px - 1919px
- **Desktop Plus:** 1920px+

## Support & Documentation

For additional documentation, see:
- `/docs/README.md` - Main project documentation
- `/docs/design-tokens.md` - Complete token reference
- `/docs/WORDPRESS-DEPLOYMENT-GUIDE.md` - Full deployment guide

## Troubleshooting

### Videos not playing:
- Ensure video files are uploaded to `/assets/videos/`
- Check file paths in `front-page.php`
- Verify videos have `muted` and `playsinline` attributes for mobile autoplay

### Styles not loading:
- Clear browser cache
- Clear WordPress cache (if caching plugin installed)
- Check file paths in `inc/enqueue.php`
- Verify all CSS files are present in `/assets/css/`

### Navigation dropdowns not working:
- Ensure `main.js` is loaded in footer
- Check browser console for JavaScript errors
- Verify menu structure in WordPress admin

### Images not displaying:
- Copy all required images to `/assets/images/`
- Check image paths in CSS files (use `get_template_directory_uri()`)
- Verify image file names match exactly (case-sensitive)

## License

Proprietary - All rights reserved © 2025 Purposeful Media Promotions

## Version History

- **1.0.0** (October 14, 2025) - Initial theme creation
  - Core theme structure
  - Homepage template
  - Header and footer
  - All main page sections
  - Complete design system integration

