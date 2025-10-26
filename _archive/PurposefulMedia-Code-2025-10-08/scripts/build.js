#!/usr/bin/env node

/**
 * Main Build Script
 * 
 * Orchestrates the entire build process for the Purposeful Media Design System
 */

const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

// Import build modules
const { buildTokens } = require('./build-tokens');
const { buildUtilities } = require('./build-utilities');
const { buildComponents } = require('./build-components');
const { buildDocs } = require('./build-docs');

// Load configuration
const config = require('../build.config.js');

/**
 * Ensure directory exists
 */
function ensureDir(dirPath) {
  if (!fs.existsSync(dirPath)) {
    fs.mkdirSync(dirPath, { recursive: true });
    console.log(`✅ Created directory: ${dirPath}`);
  }
}

/**
 * Clean build directory
 */
function cleanBuild() {
  console.log('🧹 Cleaning build directory...');
  
  const { dist } = config.directories.output;
  
  if (fs.existsSync(dist)) {
    fs.rmSync(dist, { recursive: true, force: true });
    console.log(`✅ Cleaned directory: ${dist}`);
  }
  
  ensureDir(dist);
}

/**
 * Run linting
 */
function runLinting() {
  console.log('🔍 Running linting...');
  
  try {
    // Run CSS linting
    if (config.linting.css.enabled) {
      console.log('📝 Linting CSS...');
      execSync('npx stylelint "**/*.css" --fix', { stdio: 'inherit' });
      console.log('✅ CSS linting complete');
    }
    
    // Run HTML linting
    if (config.linting.html.enabled) {
      console.log('📝 Linting HTML...');
      execSync('npx htmlhint "**/*.html"', { stdio: 'inherit' });
      console.log('✅ HTML linting complete');
    }
    
  } catch (error) {
    console.error('❌ Linting failed:', error.message);
    process.exit(1);
  }
}

/**
 * Generate build manifest
 */
function generateManifest() {
  console.log('📋 Generating build manifest...');
  
  const manifest = {
    name: config.metadata.name,
    version: `${config.version.major}.${config.version.minor}.${config.version.patch}`,
    build: config.version.build,
    timestamp: new Date().toISOString(),
    files: {
      styles: [],
      components: [],
      docs: []
    }
  };
  
  // Scan built files
  const { dist } = config.directories.output;
  
  function scanDirectory(dir, category) {
    if (fs.existsSync(dir)) {
      const files = fs.readdirSync(dir, { withFileTypes: true });
      
      for (const file of files) {
        const filePath = path.join(dir, file.name);
        
        if (file.isDirectory()) {
          scanDirectory(filePath, category);
        } else {
          const relativePath = path.relative(dist, filePath);
          const stats = fs.statSync(filePath);
          
          manifest.files[category].push({
            path: relativePath,
            size: stats.size,
            modified: stats.mtime.toISOString()
          });
        }
      }
    }
  }
  
  scanDirectory(path.join(dist, 'styles'), 'styles');
  scanDirectory(path.join(dist, 'components'), 'components');
  scanDirectory(path.join(dist, 'docs'), 'docs');
  
  // Write manifest
  const manifestPath = path.join(dist, 'manifest.json');
  fs.writeFileSync(manifestPath, JSON.stringify(manifest, null, 2));
  
  console.log(`✅ Generated manifest: ${manifestPath}`);
}

/**
 * Generate usage guide
 */
function generateUsageGuide() {
  console.log('📖 Generating usage guide...');
  
  const usageGuide = `# Purposeful Media Design System - Usage Guide

## Quick Start

### 1. Include CSS Files

\`\`\`html
<!-- Design tokens (required) -->
<link rel="stylesheet" href="dist/styles/design-tokens.css">

<!-- Utility classes (recommended) -->
<link rel="stylesheet" href="dist/styles/utilities.css">

<!-- Individual components (as needed) -->
<link rel="stylesheet" href="dist/components/atoms/button-component.css">
<link rel="stylesheet" href="dist/components/molecules/card-component.css">
<link rel="stylesheet" href="dist/components/organisms/hero-component.css">
\`\`\`

### 2. Use Components

\`\`\`html
<!-- Button -->
<button class="btn btn--primary btn--medium">Click Me</button>

<!-- Card -->
<article class="card card--blog card--medium">
  <div class="card__header">
    <h3 class="card__title">Card Title</h3>
  </div>
  <div class="card__content">
    <p class="card__description">Card content</p>
  </div>
</article>

<!-- Hero -->
<section class="hero hero--simple hero--medium">
  <div class="hero__content">
    <h1 class="hero__title">Hero Title</h1>
  </div>
</section>
\`\`\`

## Bundle Options

### All Components Bundle
\`\`\`html
<link rel="stylesheet" href="dist/components/all-components.css">
\`\`\`

### Minified Versions
\`\`\`html
<link rel="stylesheet" href="dist/styles/design-tokens.min.css">
<link rel="stylesheet" href="dist/styles/utilities.min.css">
<link rel="stylesheet" href="dist/components/all-components.min.css">
\`\`\`

## JavaScript Integration

\`\`\`javascript
// Get design token value
const brandColor = getComputedStyle(document.documentElement)
  .getPropertyValue('--brand');

// Set design token value
document.documentElement.style.setProperty('--brand', '#FF0000');
\`\`\`

## Development

\`\`\`bash
# Install dependencies
npm install

# Build the design system
npm run build

# Start development server
npm run dev

# Watch for changes
npm run watch

# Run tests
npm run test
\`\`\`

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## License

MIT License - see LICENSE file for details.

---

Built: ${new Date().toISOString()}
Version: ${config.version.major}.${config.version.minor}.${config.version.patch}
`;
  
  const usagePath = path.join(config.directories.output.dist, 'USAGE.md');
  fs.writeFileSync(usagePath, usageGuide);
  
  console.log(`✅ Generated usage guide: ${usagePath}`);
}

/**
 * Main build function
 */
async function build() {
  const startTime = Date.now();
  
  console.log('🚀 Starting Purposeful Media Design System build...');
  console.log(`📅 Build started at: ${new Date().toISOString()}`);
  console.log(`🏷️  Version: ${config.version.major}.${config.version.minor}.${config.version.patch}`);
  console.log('');
  
  try {
    // Clean build directory
    cleanBuild();
    
    // Build design tokens
    console.log('🎨 Building design tokens...');
    await buildTokens();
    console.log('');
    
    // Build utility classes
    console.log('🔧 Building utility classes...');
    await buildUtilities();
    console.log('');
    
    // Build components
    console.log('🧩 Building components...');
    await buildComponents();
    console.log('');
    
    // Build documentation
    console.log('📚 Building documentation...');
    buildDocs();
    console.log('');
    
    // Generate build artifacts
    generateManifest();
    generateUsageGuide();
    
    // Run linting
    if (config.buildSteps.includes('lint')) {
      runLinting();
      console.log('');
    }
    
    const endTime = Date.now();
    const buildTime = ((endTime - startTime) / 1000).toFixed(2);
    
    console.log('🎉 Build completed successfully!');
    console.log(`⏱️  Build time: ${buildTime}s`);
    console.log('');
    console.log('📁 Output directory: dist/');
    console.log('🌐 Start development server: npm run serve');
    console.log('📖 View documentation: dist/docs/index.html');
    
  } catch (error) {
    console.error('❌ Build failed:', error);
    process.exit(1);
  }
}

// Run the build
if (require.main === module) {
  build();
}

module.exports = { build, cleanBuild, runLinting, generateManifest, generateUsageGuide };













