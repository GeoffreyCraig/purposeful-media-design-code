#!/usr/bin/env node

/**
 * Build Components Script
 * 
 * This script consolidates and optimizes all component CSS files
 * into organized, optimized CSS files for production use.
 */

const fs = require('fs');
const path = require('path');
const postcss = require('postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

// Configuration
const config = {
  inputDir: 'components',
  outputDir: 'dist/components',
  processedDir: 'dist/processed'
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
    console.log(`✅ Built ${minify ? 'minified' : 'unminified'} component: ${outputPath} (${size}KB)`);
    
  } catch (error) {
    console.error(`❌ Error processing component CSS: ${error.message}`);
    process.exit(1);
  }
}

/**
 * Process HTML file and extract CSS
 */
function processHTML(inputPath, outputPath) {
  try {
    let html = fs.readFileSync(inputPath, 'utf8');
    
    // Extract inline CSS
    const cssRegex = /<style>([\s\S]*?)<\/style>/g;
    let cssContent = '';
    let match;
    
    while ((match = cssRegex.exec(html)) !== null) {
      cssContent += match[1] + '\n';
    }
    
    // Remove inline CSS from HTML
    html = html.replace(/<style>[\s\S]*?<\/style>/g, '');
    
    // Update CSS links to point to processed files
    html = html.replace(/href="\.\.\/\.\.\/styles\/tokens\/unified-design-tokens\.css"/g, 'href="../../dist/styles/design-tokens.css"');
    html = html.replace(/href="\.\.\/\.\.\/styles\/utilities\/utility-classes\.css"/g, 'href="../../dist/styles/utilities.css"');
    
    // Update component CSS links
    html = html.replace(/href="\.\.\/atoms\/cleaned\/([^"]+)\.css"/g, 'href="../../dist/components/atoms/$1.css"');
    html = html.replace(/href="\.\.\/molecules\/cleaned\/([^"]+)\.css"/g, 'href="../../dist/components/molecules/$1.css"');
    html = html.replace(/href="\.\.\/organisms\/cleaned\/([^"]+)\.css"/g, 'href="../../dist/components/organisms/$1.css"');
    
    // Write processed HTML
    fs.writeFileSync(outputPath, html);
    
    // Write extracted CSS if any
    if (cssContent.trim()) {
      const cssPath = outputPath.replace('.html', '.css');
      fs.writeFileSync(cssPath, cssContent);
      console.log(`✅ Extracted CSS from HTML: ${cssPath}`);
    }
    
    console.log(`✅ Processed HTML: ${outputPath}`);
    
  } catch (error) {
    console.error(`❌ Error processing HTML: ${error.message}`);
    process.exit(1);
  }
}

/**
 * Build component category (atoms, molecules, organisms, templates)
 */
async function buildComponentCategory(category, minify = false) {
  const categoryPath = path.join(config.inputDir, category, 'cleaned');
  const outputPath = path.join(config.outputDir, category);
  const processedPath = path.join(config.processedDir, category);
  
  if (!fs.existsSync(categoryPath)) {
    console.log(`⚠️  Category directory not found: ${categoryPath}`);
    return;
  }
  
  ensureDir(outputPath);
  ensureDir(processedPath);
  
  const files = fs.readdirSync(categoryPath);
  const cssFiles = files.filter(file => file.endsWith('.css'));
  const htmlFiles = files.filter(file => file.endsWith('.html'));
  
  // Process CSS files
  for (const file of cssFiles) {
    const inputPath = path.join(categoryPath, file);
    const outputFile = file;
    const outputPath = path.join(config.outputDir, category, outputFile);
    const minifiedPath = path.join(config.outputDir, category, file.replace('.css', '.min.css'));
    
    await processCSS(inputPath, outputPath, false);
    if (minify) {
      await processCSS(inputPath, minifiedPath, true);
    }
  }
  
  // Process HTML files
  for (const file of htmlFiles) {
    const inputPath = path.join(categoryPath, file);
    const outputPath = path.join(processedPath, file);
    processHTML(inputPath, outputPath);
  }
  
  console.log(`✅ Built ${category} components (${cssFiles.length} CSS, ${htmlFiles.length} HTML)`);
}

/**
 * Generate component index
 */
function generateComponentIndex() {
  const categories = ['atoms', 'molecules', 'organisms', 'templates'];
  const components = {};
  
  for (const category of categories) {
    const categoryPath = path.join(config.inputDir, category, 'cleaned');
    if (fs.existsSync(categoryPath)) {
      const files = fs.readdirSync(categoryPath);
      const cssFiles = files.filter(file => file.endsWith('.css'));
      
      components[category] = cssFiles.map(file => ({
        name: file.replace('.css', ''),
        file: file,
        path: `dist/components/${category}/${file}`
      }));
    }
  }
  
  const index = `# Component Library

This file is auto-generated from the component build process. Last updated: ${new Date().toISOString()}

## Available Components

${Object.entries(components).map(([category, categoryComponents]) => {
  if (categoryComponents.length === 0) return '';
  
  return `### ${category.charAt(0).toUpperCase() + category.slice(1)}

${categoryComponents.map(component => 
  `- **${component.name}** - \`${component.path}\``
).join('\n')}`;
}).filter(Boolean).join('\n\n')}

## Usage

\`\`\`html
<!-- Include the design tokens first -->
<link rel="stylesheet" href="dist/styles/design-tokens.css">
<link rel="stylesheet" href="dist/styles/utilities.css">

<!-- Include specific components -->
<link rel="stylesheet" href="dist/components/atoms/button-component.css">
<link rel="stylesheet" href="dist/components/molecules/card-component.css">
\`\`\`

## All Components Bundle

For convenience, you can include all components at once:

\`\`\`html
<link rel="stylesheet" href="dist/components/all-components.css">
\`\`\`
`;
  
  const indexPath = path.join(config.outputDir, 'README.md');
  fs.writeFileSync(indexPath, index);
  console.log(`✅ Generated component index: ${indexPath}`);
}

/**
 * Generate all-components bundle
 */
async function generateAllComponentsBundle(minify = false) {
  const categories = ['atoms', 'molecules', 'organisms'];
  let bundleCSS = '';
  
  // Add header comment
  bundleCSS += `/* Purposeful Media Design System - All Components Bundle\n`;
  bundleCSS += ` * Generated: ${new Date().toISOString()}\n`;
  bundleCSS += ` * Version: 1.0.0\n */\n\n`;
  
  for (const category of categories) {
    const categoryPath = path.join(config.outputDir, category);
    if (fs.existsSync(categoryPath)) {
      const files = fs.readdirSync(categoryPath);
      const cssFiles = files.filter(file => file.endsWith('.css') && !file.endsWith('.min.css'));
      
      for (const file of cssFiles) {
        const filePath = path.join(categoryPath, file);
        const css = fs.readFileSync(filePath, 'utf8');
        bundleCSS += `/* ${category}/${file} */\n`;
        bundleCSS += css + '\n\n';
      }
    }
  }
  
  const outputFile = minify ? 'all-components.min.css' : 'all-components.css';
  const outputPath = path.join(config.outputDir, outputFile);
  
  if (minify) {
    await processCSS(outputPath, outputPath, true);
  } else {
    fs.writeFileSync(outputPath, bundleCSS);
  }
  
  const size = (fs.statSync(outputPath).size / 1024).toFixed(2);
  console.log(`✅ Generated ${minify ? 'minified' : 'unminified'} bundle: ${outputPath} (${size}KB)`);
}

/**
 * Main build function
 */
async function buildComponents() {
  console.log('🏗️  Building components...');
  
  // Ensure output directories exist
  ensureDir(config.outputDir);
  ensureDir(config.processedDir);
  
  // Build each component category
  await buildComponentCategory('atoms', true);
  await buildComponentCategory('molecules', true);
  await buildComponentCategory('organisms', true);
  await buildComponentCategory('templates', true);
  
  // Generate component index
  generateComponentIndex();
  
  // Generate all-components bundle
  await generateAllComponentsBundle(false);
  await generateAllComponentsBundle(true);
  
  console.log('✅ Components build complete!');
}

// Run the build
if (require.main === module) {
  buildComponents().catch(error => {
    console.error('❌ Build failed:', error);
    process.exit(1);
  });
}

module.exports = { buildComponents, buildComponentCategory, generateComponentIndex };













