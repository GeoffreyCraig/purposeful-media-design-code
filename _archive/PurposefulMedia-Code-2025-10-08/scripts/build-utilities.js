#!/usr/bin/env node

/**
 * Build Utility Classes Script
 * 
 * This script consolidates and optimizes utility classes
 * into a single, optimized CSS file for production use.
 */

const fs = require('fs');
const path = require('path');
const postcss = require('postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

// Configuration
const config = {
  inputDir: 'styles/utilities',
  outputDir: 'dist/styles',
  inputFile: 'utility-classes.css',
  outputFile: 'utilities.css',
  minifiedFile: 'utilities.min.css'
};

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
 * Read and process CSS file
 */
async function processCSS(inputPath, outputPath, minify = false) {
  try {
    const css = fs.readFileSync(inputPath, 'utf8');
    
    const plugins = [
      autoprefixer({
        overrideBrowserslist: ['> 1%', 'last 2 versions', 'not dead']
      })
    ];
    
    if (minify) {
      plugins.push(cssnano({
        preset: ['default', {
          discardComments: {
            removeAll: true
          },
          normalizeWhitespace: true,
          colormin: true,
          convertValues: true,
          discardDuplicates: true,
          discardEmpty: true,
          mergeLonghand: true,
          mergeRules: true,
          minifyFontValues: true,
          minifyGradients: true,
          minifyParams: true,
          minifySelectors: true,
          normalizeCharset: true,
          normalizeDisplayValues: true,
          normalizePositions: true,
          normalizeRepeatStyle: true,
          normalizeString: true,
          normalizeTimingFunctions: true,
          normalizeUnicode: true,
          normalizeUrl: true,
          orderedValues: true,
          reduceIdents: true,
          reduceInitial: true,
          reduceTransforms: true,
          svgo: true,
          uniqueSelectors: true
        }]
      }));
    }
    
    const result = await postcss(plugins).process(css, {
      from: inputPath,
      to: outputPath
    });
    
    fs.writeFileSync(outputPath, result.css);
    
    if (result.map) {
      fs.writeFileSync(`${outputPath}.map`, result.map);
    }
    
    const size = (fs.statSync(outputPath).size / 1024).toFixed(2);
    console.log(`✅ Built ${minify ? 'minified' : 'unminified'} utilities: ${outputPath} (${size}KB)`);
    
  } catch (error) {
    console.error(`❌ Error processing utilities CSS: ${error.message}`);
    process.exit(1);
  }
}

/**
 * Generate utility class documentation
 */
function generateUtilityDocs() {
  const utilityFile = path.join(config.inputDir, config.inputFile);
  
  if (!fs.existsSync(utilityFile)) {
    console.log(`⚠️  Utility file not found: ${utilityFile}`);
    return;
  }
  
  const css = fs.readFileSync(utilityFile, 'utf8');
  const utilities = {
    spacing: [],
    typography: [],
    layout: [],
    colors: [],
    borders: [],
    shadows: [],
    responsive: []
  };
  
  // Extract utility classes
  const classRegex = /\.([a-zA-Z][a-zA-Z0-9_-]*)\s*\{[^}]*\}/g;
  let match;
  
  while ((match = classRegex.exec(css)) !== null) {
    const className = match[1];
    const classCSS = match[0];
    
    // Categorize utilities
    if (className.startsWith('m') || className.startsWith('p') || className.includes('gap')) {
      utilities.spacing.push({ name: className, css: classCSS });
    } else if (className.startsWith('text') || className.startsWith('font')) {
      utilities.typography.push({ name: className, css: classCSS });
    } else if (className.includes('grid') || className.includes('flex') || className.includes('block')) {
      utilities.layout.push({ name: className, css: classCSS });
    } else if (className.includes('bg-') || className.includes('text-')) {
      utilities.colors.push({ name: className, css: classCSS });
    } else if (className.startsWith('border') || className.startsWith('radius')) {
      utilities.borders.push({ name: className, css: classCSS });
    } else if (className.includes('shadow')) {
      utilities.shadows.push({ name: className, css: classCSS });
    } else if (className.includes('mobile') || className.includes('tablet') || className.includes('desktop')) {
      utilities.responsive.push({ name: className, css: classCSS });
    }
  }
  
  // Generate documentation
  const docs = `# Utility Classes Reference

This file is auto-generated from the utility classes. Last updated: ${new Date().toISOString()}

## Available Utility Classes

${Object.entries(utilities).map(([category, classes]) => {
  if (classes.length === 0) return '';
  
  return `### ${category.charAt(0).toUpperCase() + category.slice(1)} Utilities

${classes.map(util => `- \`.${util.name}\``).join('\n')}`;
}).filter(Boolean).join('\n\n')}

## Usage Examples

\`\`\`html
<!-- Spacing utilities -->
<div class="p-4 m-2">Padding and margin</div>

<!-- Typography utilities -->
<h1 class="text-h1 text-center text-brand">Large centered heading</h1>

<!-- Layout utilities -->
<div class="flex items-center justify-between">Flexbox layout</div>

<!-- Color utilities -->
<div class="bg-brand text-reverse">Brand background with white text</div>

<!-- Responsive utilities -->
<div class="mobile:hidden tablet:block desktop:flex">Responsive display</div>
\`\`\`

## Best Practices

1. **Use utilities for quick styling** - Great for prototyping and simple layouts
2. **Combine with components** - Use utilities to extend component functionality
3. **Be consistent** - Use the same utility patterns throughout your project
4. **Don't overuse** - For complex styling, prefer component classes
5. **Responsive first** - Use responsive utilities to create mobile-first designs
`;
  
  const docsPath = path.join(config.outputDir, 'utilities.md');
  fs.writeFileSync(docsPath, docs);
  console.log(`✅ Generated utility documentation: ${docsPath}`);
}

/**
 * Main build function
 */
async function buildUtilities() {
  console.log('🏗️  Building utility classes...');
  
  // Ensure output directory exists
  ensureDir(config.outputDir);
  
  // Check if input file exists
  const inputPath = path.join(config.inputDir, config.inputFile);
  if (!fs.existsSync(inputPath)) {
    console.error(`❌ Input file not found: ${inputPath}`);
    process.exit(1);
  }
  
  // Process unminified CSS
  const outputPath = path.join(config.outputDir, config.outputFile);
  await processCSS(inputPath, outputPath, false);
  
  // Process minified CSS
  const minifiedPath = path.join(config.outputDir, config.minifiedFile);
  await processCSS(inputPath, minifiedPath, true);
  
  // Generate documentation
  generateUtilityDocs();
  
  console.log('✅ Utility classes build complete!');
}

// Run the build
if (require.main === module) {
  buildUtilities().catch(error => {
    console.error('❌ Build failed:', error);
    process.exit(1);
  });
}

module.exports = { buildUtilities, processCSS, generateUtilityDocs };













