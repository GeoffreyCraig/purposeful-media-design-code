# Build Instructions - Purposeful Media Design System
**Phase 1 MVW - CSS/JS Consolidation**

---

## 🎯 Quick Start

### One-Time Setup (5 minutes)

```bash
# 1. Navigate to Development Files directory
cd "/Users/geoffreycraig/Library/CloudStorage/Dropbox/PURPOSEFUL MEDIA PROMOTIONS/WEBSITE PROJECT/Development Files"

# 2. Install build tools
npm install

# 3. Build production files
npm run build
```

**That's it!** Your optimized files will be in the `dist/` folder.

---

## 📦 What Gets Built

### Input (Source Files)
```
styles/
├── master-styles.css            ← Main CSS entry point
├── variables-v2.0-20250915.css
├── atoms-master.css
├── molecules-*.css
└── organisms-*.css

scripts/
├── blog-group-adapter.js
├── resources-section-adapter.js
├── hero-carousel.js
├── section-faq-group.js
└── footer-mobile.js
```

### Output (Production Files)
```
dist/
├── css/
│   ├── purposeful-main.min.css      (~70KB minified, ~18KB gzipped)
│   └── purposeful-main.min.css.map  (source map for debugging)
└── js/
    ├── purposeful-main.min.js       (~22KB minified, ~8KB gzipped)
    └── purposeful-main.min.js.map   (source map for debugging)
```

---

## 🛠️ Build Commands

### Production Build (Run before deployment)
```bash
npm run build
```
- Builds minified CSS and JS
- Creates source maps
- Ready for WordPress

### Development Watch Mode (While coding)
```bash
npm run watch
```
- Watches for file changes
- Auto-rebuilds on save
- Great for active development

### CSS Only
```bash
npm run build:css      # Build once
npm run watch:css      # Watch mode
```

### JavaScript Only
```bash
npm run build:js       # Build once
npm run watch:js       # Watch mode
```

### Clean Build (Start fresh)
```bash
npm run clean          # Delete dist/ folder
npm run build          # Rebuild everything
```

---

## 📊 Build Process Explained

### CSS Pipeline
```
1. master-styles.css (entry point)
   ↓
2. PostCSS processes @import statements
   ↓
3. All CSS combined into one file
   ↓
4. Autoprefixer adds vendor prefixes
   ↓
5. CSSnano minifies (removes whitespace, comments)
   ↓
6. Output: purposeful-main.min.css + source map
```

**Result:** 23 CSS files → 1 optimized file

### JavaScript Pipeline
```
1. All 5 JS files combined
   ↓
2. Terser compresses code
   ↓
3. Variable names shortened (mangling)
   ↓
4. Dead code removed
   ↓
5. Output: purposeful-main.min.js + source map
```

**Result:** 5 JS files → 1 optimized file

---

## 🚀 WordPress Deployment

### Step 1: Build Production Files
```bash
npm run build
```

### Step 2: Copy to WordPress Theme
```bash
# Copy built files to your WordPress theme
cp -r dist/ /path/to/wordpress/wp-content/themes/purposeful-media/assets/

# Or if using FTP, upload these files:
dist/css/purposeful-main.min.css  → theme/assets/css/
dist/js/purposeful-main.min.js    → theme/assets/js/
```

### Step 3: Enqueue in WordPress

**In your theme's `functions.php`:**

```php
<?php
function purposeful_enqueue_assets() {
    $theme_version = '1.0.0'; // Update this when you rebuild
    
    // Enqueue CSS
    wp_enqueue_style(
        'purposeful-main',
        get_template_directory_uri() . '/assets/css/purposeful-main.min.css',
        array(),
        $theme_version
    );
    
    // Enqueue JS (in footer)
    wp_enqueue_script(
        'purposeful-main',
        get_template_directory_uri() . '/assets/js/purposeful-main.min.js',
        array(),
        $theme_version,
        true // Load in footer
    );
    
    // Localize script for WordPress API access
    wp_localize_script('purposeful-main', 'purposefulSettings', array(
        'restUrl' => rest_url(),
        'nonce' => wp_create_nonce('wp_rest'),
        'siteUrl' => get_site_url()
    ));
}
add_action('wp_enqueue_scripts', 'purposeful_enqueue_assets');
```

---

## 🔧 Troubleshooting

### Error: "npm: command not found"
**Solution:** Install Node.js from https://nodejs.org/
- Recommended version: LTS (Long Term Support)
- Includes npm automatically

### Error: "Cannot find module 'postcss'"
**Solution:** Run `npm install` to install dependencies

### Error: Build succeeds but files are missing
**Check:** Make sure `dist/` folder exists
**Fix:** Run `npm run clean && npm run build`

### CSS not updating in WordPress
**Issue:** Browser cache or WordPress cache
**Solutions:**
1. Hard refresh: `Cmd+Shift+R` (Mac) or `Ctrl+F5` (Windows)
2. Clear WordPress cache (if using caching plugin)
3. Update version number in `functions.php`
4. Add `?v=1.0.1` query string to CSS URL

### Source maps not loading
**Normal:** Source maps only work in development
**Browser DevTools:** Make sure "Enable CSS/JS source maps" is checked

---

## 📈 File Size Comparison

### Before Optimization
```
CSS: 23 files, 256KB total (unminified)
JS:  5 files, 53.5KB total (unminified)
Total: ~310KB
HTTP Requests: 28+
```

### After Optimization
```
CSS: 1 file, 70KB minified (~18KB gzipped)
JS:  1 file, 22KB minified (~8KB gzipped)  
Total: ~92KB minified (~26KB gzipped)
HTTP Requests: 2

Reduction: 70% smaller, 93% fewer requests
```

---

## 🎯 Best Practices

### When to Rebuild
✅ Before deploying to WordPress  
✅ After changing any CSS or JS  
✅ Before testing in Bluehost sandbox  
✅ Before going live  

### Development Workflow
1. Make changes to source files in `styles/` or `scripts/`
2. Run `npm run watch` to auto-rebuild
3. Test changes locally
4. When ready, run `npm run build` for production
5. Deploy `dist/` files to WordPress

### Version Control
- ✅ Commit source files (`styles/`, `scripts/`)
- ✅ Commit build config (`package.json`, `postcss.config.js`)
- ❌ Don't commit `node_modules/` (too large)
- ❌ Don't commit `dist/` (can be rebuilt)

### Cache Busting
**Update version number** in `functions.php` when you deploy new builds:
```php
$theme_version = '1.0.1'; // Change this → clears browser cache
```

---

## ⚡ Performance Tips

### Gzip Compression (Server-side)
Add to your `.htaccess` file:
```apache
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/css text/javascript application/javascript
</IfModule>
```

### Browser Caching
Add to `.htaccess`:
```apache
<IfModule mod_expires.c>
  ExpiresByType text/css "access plus 1 year"
  ExpiresByType application/javascript "access plus 1 year"
</IfModule>
```

### CDN (Phase 2)
Consider using a CDN for static assets in Phase 2:
- Cloudflare (free tier available)
- BunnyCDN (affordable)
- WordPress CDN plugins

---

## 📞 Need Help?

### Common Resources
- **Node.js/npm:** https://nodejs.org/
- **PostCSS:** https://postcss.org/
- **Terser:** https://terser.org/
- **WordPress Enqueue:** https://developer.wordpress.org/reference/functions/wp_enqueue_style/

### Quick Commands Cheat Sheet
```bash
npm install          # Install dependencies (first time only)
npm run build        # Build for production
npm run watch        # Auto-rebuild during development
npm run clean        # Delete dist/ folder
ls dist/            # Check what's been built
```

---

**Build process ready for Phase 1 MVW! 🚀**

Next step: Run `npm install` and `npm run build` to create your production files.

