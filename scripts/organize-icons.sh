#!/bin/bash
# Icon Organization Script for Purposeful Media
# This script will organize all icons into a clean structure

# Base paths
SOURCE_PATH="/Users/geoffreycraig/Library/CloudStorage/Dropbox/PURPOSEFUL MEDIA PROMOTIONS/BRAND ASSETS/Logos & Identity/Iconography/Exports/SVG"
DEST_PATH="/Users/geoffreycraig/Library/CloudStorage/Dropbox/PURPOSEFUL MEDIA PROMOTIONS/WEBSITE PROJECT/Development Files/assets/svg"

# Create directory structure
echo "Creating directory structure..."
mkdir -p "$DEST_PATH/decorative-icons/blue"
mkdir -p "$DEST_PATH/decorative-icons/white"
mkdir -p "$DEST_PATH/decorative-icons/gray"
mkdir -p "$DEST_PATH/decorative-icons/dark"
mkdir -p "$DEST_PATH/decorative-icons/sprite"

mkdir -p "$DEST_PATH/ui-icons/navigation"
mkdir -p "$DEST_PATH/ui-icons/menu"
mkdir -p "$DEST_PATH/ui-icons/search"
mkdir -p "$DEST_PATH/ui-icons/bullets"
mkdir -p "$DEST_PATH/ui-icons/sprite"

# Copy decorative icons by color
echo "Copying decorative icons..."

# Blue icons
cp "$SOURCE_PATH"/icon-*-blue.svg "$DEST_PATH/decorative-icons/blue/" 2>/dev/null
cp "$SOURCE_PATH"/Icon-*-blue.svg "$DEST_PATH/decorative-icons/blue/" 2>/dev/null

# White icons
cp "$SOURCE_PATH"/icon-*-white.svg "$DEST_PATH/decorative-icons/white/" 2>/dev/null
cp "$SOURCE_PATH"/Icon-*-white.svg "$DEST_PATH/decorative-icons/white/" 2>/dev/null

# Gray icons
cp "$SOURCE_PATH"/icon-*-gray.svg "$DEST_PATH/decorative-icons/gray/" 2>/dev/null
cp "$SOURCE_PATH"/Icon-*-gray.svg "$DEST_PATH/decorative-icons/gray/" 2>/dev/null

# Dark icons
cp "$SOURCE_PATH"/icon-*-dark.svg "$DEST_PATH/decorative-icons/dark/" 2>/dev/null
cp "$SOURCE_PATH"/Icon-*-dark.svg "$DEST_PATH/decorative-icons/dark/" 2>/dev/null

# Copy UI icons
echo "Copying UI icons..."

# Navigation icons
cp "$SOURCE_PATH/Navigation Icons"/*.svg "$DEST_PATH/ui-icons/navigation/" 2>/dev/null

# Menu icons
cp "$SOURCE_PATH/Tablet and Mobile Menu Icons"/icon-hamburger*.svg "$DEST_PATH/ui-icons/menu/" 2>/dev/null
cp "$SOURCE_PATH/Tablet and Mobile Menu Icons"/icon-close*.svg "$DEST_PATH/ui-icons/menu/" 2>/dev/null

# Special items (bullets, search if they exist)
cp "$SOURCE_PATH"/bullet-*.svg "$DEST_PATH/ui-icons/bullets/" 2>/dev/null

echo "Icon organization complete!"
echo ""
echo "Structure created:"
echo "$DEST_PATH/"
echo "├── decorative-icons/"
echo "│   ├── blue/        ($(ls -1 "$DEST_PATH/decorative-icons/blue" 2>/dev/null | wc -l) files)"
echo "│   ├── white/       ($(ls -1 "$DEST_PATH/decorative-icons/white" 2>/dev/null | wc -l) files)"
echo "│   ├── gray/        ($(ls -1 "$DEST_PATH/decorative-icons/gray" 2>/dev/null | wc -l) files)"
echo "│   ├── dark/        ($(ls -1 "$DEST_PATH/decorative-icons/dark" 2>/dev/null | wc -l) files)"
echo "│   └── sprite/      (for future sprite sheets)"
echo "└── ui-icons/"
echo "    ├── navigation/  ($(ls -1 "$DEST_PATH/ui-icons/navigation" 2>/dev/null | wc -l) files)"
echo "    ├── menu/        ($(ls -1 "$DEST_PATH/ui-icons/menu" 2>/dev/null | wc -l) files)"
echo "    ├── bullets/     ($(ls -1 "$DEST_PATH/ui-icons/bullets" 2>/dev/null | wc -l) files)"
echo "    └── sprite/      (for future sprite sheets)"
