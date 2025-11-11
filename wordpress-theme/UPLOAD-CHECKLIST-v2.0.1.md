# Quick Upload Checklist - Theme v2.0.1
**Package:** purposeful-media-v2.0.1-batch-fixes.zip (17MB)

---

## ✅ Pre-Upload

- [ ] Backup current theme in cPanel (compress purposeful-media folder)
- [ ] Download backup to local machine
- [ ] Note current WordPress admin login (you'll stay logged in)

---

## 📤 Upload Steps (5 minutes)

1. **cPanel File Manager** → `/public_html/wp-content/themes/`
2. **Delete** current `purposeful-media` folder
3. **Upload** `purposeful-media-v2.0.1-batch-fixes.zip`
4. **Extract** ZIP file
5. **Delete** ZIP file after extraction
6. **Refresh** WordPress dashboard (will show v2.0.1)

---

## 🧪 Quick Test (10 minutes)

### Test Each Template (refresh page with Cmd+Shift+R):

| Page | URL | What to Check |
|------|-----|---------------|
| **Resources** | /purposeful-resources-library | Section 4 = "Start the Conversation" banner + 2-column card (no form) |
| **Pillar** | /pillar-page-test | Bottom section = 2 teaser cards side-by-side (no form) |
| **Homepage** | / | Hero videos + eBook thumbnail visible |
| **About** | /about-and-contact | Page loads correctly |
| **Blog** | /blogs | Page loads correctly |
| **Interior** | /policy-page | Page loads correctly |

### Check Console (F12 → Console tab):

**Should be GONE:**
- ❌ purposeful-sprite-ui.svg 404
- ❌ Tile cell .png 404
- ❌ hero-slide-*-fallback.jpg 404 (x3)
- ❌ sample-ebook-cover.jpg 404

**Still Present (EXPECTED, OK to ignore):**
- ⚠️ Video autoplay errors (browser behavior)
- ⚠️ background-redux-new.js (Chrome extension)

---

## 🎯 Success Criteria

✅ **All pages load without fatal errors**
✅ **No 404 errors for assets in console**
✅ **Resources Page Section 4 looks different (no form)**
✅ **Pillar Page bottom has 2 cards (not form)**
✅ **Homepage eBook thumbnail visible**

---

## 🆘 If Something Goes Wrong

**Theme doesn't activate:**
- Re-extract the ZIP file
- Check folder name is exactly "purposeful-media"

**Still seeing old version:**
- Clear WordPress cache (if caching plugin installed)
- Hard refresh browser (Cmd+Shift+R)

**404 errors persist:**
- Verify extraction created `assets/` folder with subfolders
- Check file permissions (644 for files, 755 for folders)

**Need to rollback:**
- Delete new `purposeful-media` folder
- Upload backup ZIP
- Extract backup

---

**Time Estimate:** 15 minutes total (5 upload + 10 testing)
