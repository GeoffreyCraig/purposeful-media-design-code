#!/usr/bin/env node

/**
 * Build Design Tokens Script
 * 
 * This script consolidates and optimizes design tokens from various sources
 * into a single, optimized CSS file for production use.
 */

const fs = require('fs');
const path = require('path');
const postcss = require('postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

// Configuration
const config = {
  inputDir: 'styles/tokens',
  outputDir: 'dist/styles',
  inputFile: 'unified-design-tokens.css',
  outputFile: 'design-tokens.css',
  minifiedFile: 'design-tokens.min.css'
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
    console.log(`✅ Built ${minify ? 'minified' : 'unminified'} CSS: ${outputPath} (${size}KB)`);
    
  } catch (error) {
    console.error(`❌ Error processing CSS: ${error.message}`);
    process.exit(1);
  }
}

/**
 * Generate token documentation
 */
function generateTokenDocs() {
  const tokenFile = path.join(config.inputDir, config.inputFile);
  
  if (!fs.existsSync(tokenFile)) {
    console.log(`⚠️  Token file not found: ${tokenFile}`);
    return;
  }
  
  const css = fs.readFileSync(tokenFile, 'utf8');
  const tokens = {};
  
  // Extract CSS custom properties
  const customPropertyRegex = /--([^:]+):\s*([^;]+);/g;
  let match;
  
  while ((match = customPropertyRegex.exec(css)) !== null) {
    const [, name, value] = match;
    const category = name.split('-')[0];
    
    if (!tokens[category]) {
      tokens[category] = {};
    }
    
    tokens[category][name] = {
      name: `--${name}`,
      value: value.trim(),
      category: category
    };
  }
  
  // Generate documentation
  const docs = `# Design Tokens Reference

This file is auto-generated from the design tokens. Last updated: ${new Date().toISOString()}

## Token Categories

${Object.keys(tokens).map(category => {
  const categoryTokens = tokens[category];
  return `### ${category.charAt(0).toUpperCase() + category.slice(1)} Tokens

${Object.values(categoryTokens).map(token => 
  `- \`${token.name}\`: ${token.value}`
).join('\n')}`;
}).join('\n\n')}

## Usage

\`\`\`css
/* Import the tokens */
@import 'design-tokens.css';

/* Use in your CSS */
.my-component {
  color: var(--text-primary);
  padding: var(--space-4);
  border-radius: var(--radius-md);
}
\`\`\`

## JavaScript Usage

\`\`\`javascript
// Get a token value
const brandColor = getComputedStyle(document.documentElement)
  .getPropertyValue('--brand');

// Set a token value
document.documentElement.style.setProperty('--brand', '#FF0000');
\`\`\`
`;
  
  const docsPath = path.join(config.outputDir, 'tokens.md');
  fs.writeFileSync(docsPath, docs);
  console.log(`✅ Generated token documentation: ${docsPath}`);
}

/**
 * Main build function
 */
async function buildTokens() {
  console.log('🏗️  Building design tokens...');
  
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
  generateTokenDocs();
  
  console.log('✅ Design tokens build complete!');
}

// Run the build
if (require.main === module) {
  buildTokens().catch(error => {
    console.error('❌ Build failed:', error);
    process.exit(1);
  });
}

module.exports = { buildTokens, processCSS, generateTokenDocs };













