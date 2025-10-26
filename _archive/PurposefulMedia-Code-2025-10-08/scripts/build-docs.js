#!/usr/bin/env node

/**
 * Build Documentation Script
 * 
 * This script processes and optimizes documentation files
 * for production use and generates a comprehensive documentation site.
 */

const fs = require('fs');
const path = require('path');

// Configuration
const config = {
  inputDir: 'docs',
  outputDir: 'dist/docs',
  templateDir: 'docs/templates'
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
 * Copy file with processing
 */
function copyFile(inputPath, outputPath, processContent = null) {
  try {
    let content = fs.readFileSync(inputPath, 'utf8');
    
    if (processContent) {
      content = processContent(content);
    }
    
    fs.writeFileSync(outputPath, content);
    console.log(`✅ Copied: ${outputPath}`);
    
  } catch (error) {
    console.error(`❌ Error copying file: ${error.message}`);
    process.exit(1);
  }
}

/**
 * Process markdown content
 */
function processMarkdown(content) {
  // Update relative links to point to processed files
  content = content.replace(/href="\.\.\/\.\.\/styles\/tokens\/unified-design-tokens\.css"/g, 'href="../styles/design-tokens.css"');
  content = content.replace(/href="\.\.\/\.\.\/styles\/utilities\/utility-classes\.css"/g, 'href="../styles/utilities.css"');
  
  // Update component links
  content = content.replace(/href="\.\.\/\.\.\/components\/atoms\/cleaned\/([^"]+)\.css"/g, 'href="../components/atoms/$1.css"');
  content = content.replace(/href="\.\.\/\.\.\/components\/molecules\/cleaned\/([^"]+)\.css"/g, 'href="../components/molecules/$1.css"');
  content = content.replace(/href="\.\.\/\.\.\/components\/organisms\/cleaned\/([^"]+)\.css"/g, 'href="../components/organisms/$1.css"');
  
  // Add build timestamp
  content = content.replace(/Last updated: .*?$/gm, `Last updated: ${new Date().toLocaleDateString()}`);
  
  return content;
}

/**
 * Generate documentation index
 */
function generateDocsIndex() {
  const indexPath = path.join(config.outputDir, 'index.html');
  
  const html = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purposeful Media Design System Documentation</title>
    <link rel="stylesheet" href="../styles/design-tokens.css">
    <link rel="stylesheet" href="../styles/utilities.css">
    <link rel="stylesheet" href="../components/atoms/button-component.css">
    <link rel="stylesheet" href="../components/molecules/card-component.css">
    <style>
        body {
            font-family: var(--font-primary);
            line-height: var(--line-height-normal);
            color: var(--text-primary);
            background: var(--bg-primary);
            margin: 0;
            padding: 0;
        }
        
        .docs-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: var(--space-8);
        }
        
        .docs-header {
            text-align: center;
            margin-bottom: var(--space-16);
            padding: var(--space-8) 0;
            background: var(--gradient-brand);
            color: var(--text-reverse);
        }
        
        .docs-nav {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--space-6);
            margin-bottom: var(--space-16);
        }
        
        .docs-card {
            background: var(--bg-primary);
            border: var(--border-default);
            border-radius: var(--radius-md);
            padding: var(--space-6);
            text-decoration: none;
            color: inherit;
            transition: all 0.2s ease;
        }
        
        .docs-card:hover {
            border-color: var(--brand);
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }
        
        .docs-card h3 {
            color: var(--brand);
            margin-bottom: var(--space-3);
        }
        
        .docs-footer {
            text-align: center;
            padding: var(--space-8) 0;
            border-top: var(--border-default);
            margin-top: var(--space-16);
        }
    </style>
</head>
<body>
    <div class="docs-container">
        <header class="docs-header">
            <h1 class="text-h1">Purposeful Media Design System</h1>
            <p class="text-body">Comprehensive documentation and component library</p>
        </header>
        
        <nav class="docs-nav">
            <a href="README.html" class="docs-card">
                <h3 class="text-h3">Getting Started</h3>
                <p class="text-body">Complete guide to using the design system</p>
            </a>
            
            <a href="design-tokens.html" class="docs-card">
                <h3 class="text-h3">Design Tokens</h3>
                <p class="text-body">Colors, spacing, typography, and more</p>
            </a>
            
            <a href="accessibility-checklist.html" class="docs-card">
                <h3 class="text-h3">Accessibility</h3>
                <p class="text-body">WCAG 2.1 AA compliance guide</p>
            </a>
            
            <a href="component-examples.html" class="docs-card">
                <h3 class="text-h3">Component Examples</h3>
                <p class="text-body">Real-world usage examples</p>
            </a>
            
            <a href="components/button-component.html" class="docs-card">
                <h3 class="text-h3">Button Component</h3>
                <p class="text-body">Interactive button documentation</p>
            </a>
            
            <a href="components/card-component.html" class="docs-card">
                <h3 class="text-h3">Card Component</h3>
                <p class="text-body">Content card documentation</p>
            </a>
        </nav>
        
        <section class="docs-content">
            <h2 class="text-h2">Quick Start</h2>
            <p class="text-body">Get started with the Purposeful Media Design System in minutes:</p>
            
            <div class="code-block">
                <pre><code>&lt;!-- Include design tokens --&gt;
&lt;link rel="stylesheet" href="../styles/design-tokens.css"&gt;
&lt;link rel="stylesheet" href="../styles/utilities.css"&gt;

&lt;!-- Include components --&gt;
&lt;link rel="stylesheet" href="../components/atoms/button-component.css"&gt;
&lt;link rel="stylesheet" href="../components/molecules/card-component.css"&gt;

&lt;!-- Use components --&gt;
&lt;button class="btn btn--primary btn--medium"&gt;Get Started&lt;/button&gt;</code></pre>
            </div>
        </section>
        
        <footer class="docs-footer">
            <p class="text-small">Purposeful Media Design System v1.0.0</p>
            <p class="text-small">Last updated: ${new Date().toLocaleDateString()}</p>
        </footer>
    </div>
</body>
</html>`;
  
  fs.writeFileSync(indexPath, html);
  console.log(`✅ Generated documentation index: ${indexPath}`);
}

/**
 * Convert markdown to HTML
 */
function markdownToHTML(markdown) {
  // Simple markdown to HTML conversion
  let html = markdown
    // Headers
    .replace(/^### (.*$)/gim, '<h3 class="text-h3">$1</h3>')
    .replace(/^## (.*$)/gim, '<h2 class="text-h2">$1</h2>')
    .replace(/^# (.*$)/gim, '<h1 class="text-h1">$1</h1>')
    
    // Bold and italic
    .replace(/\*\*(.*)\*\*/gim, '<strong>$1</strong>')
    .replace(/\*(.*)\*/gim, '<em>$1</em>')
    
    // Code blocks
    .replace(/```([\s\S]*?)```/gim, '<pre><code>$1</code></pre>')
    .replace(/`(.*?)`/gim, '<code>$1</code>')
    
    // Links
    .replace(/\[([^\]]+)\]\(([^)]+)\)/gim, '<a href="$2">$1</a>')
    
    // Lists
    .replace(/^\* (.*$)/gim, '<li>$1</li>')
    .replace(/(<li>.*<\/li>)/s, '<ul>$1</ul>')
    
    // Paragraphs
    .replace(/\n\n/gim, '</p><p class="text-body">')
    .replace(/^(.+)$/gim, '<p class="text-body">$1</p>');
  
  return html;
}

/**
 * Generate HTML from markdown files
 */
function generateHTMLFromMarkdown(inputPath, outputPath) {
  try {
    const markdown = fs.readFileSync(inputPath, 'utf8');
    const processedMarkdown = processMarkdown(markdown);
    const html = markdownToHTML(processedMarkdown);
    
    // Wrap in HTML document
    const fullHTML = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>${path.basename(inputPath, '.md')} - Purposeful Media Design System</title>
    <link rel="stylesheet" href="../styles/design-tokens.css">
    <link rel="stylesheet" href="../styles/utilities.css">
    <link rel="stylesheet" href="../components/atoms/button-component.css">
    <link rel="stylesheet" href="../components/molecules/card-component.css">
    <style>
        body {
            font-family: var(--font-primary);
            line-height: var(--line-height-normal);
            color: var(--text-primary);
            background: var(--bg-primary);
            margin: 0;
            padding: var(--space-8);
        }
        
        .docs-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .docs-header {
            margin-bottom: var(--space-8);
            padding-bottom: var(--space-4);
            border-bottom: var(--border-default);
        }
        
        .docs-content {
            margin-bottom: var(--space-8);
        }
        
        .docs-nav {
            margin-bottom: var(--space-8);
        }
        
        .docs-nav a {
            color: var(--brand);
            text-decoration: none;
        }
        
        .docs-nav a:hover {
            text-decoration: underline;
        }
        
        pre {
            background: var(--bg-secondary);
            padding: var(--space-4);
            border-radius: var(--radius-sm);
            overflow-x: auto;
        }
        
        code {
            font-family: monospace;
            background: var(--bg-secondary);
            padding: 2px 4px;
            border-radius: 2px;
        }
        
        ul {
            padding-left: var(--space-6);
        }
        
        li {
            margin-bottom: var(--space-2);
        }
    </style>
</head>
<body>
    <div class="docs-container">
        <header class="docs-header">
            <nav class="docs-nav">
                <a href="index.html">← Back to Documentation</a>
            </nav>
        </header>
        
        <main class="docs-content">
            ${html}
        </main>
    </div>
</body>
</html>`;
    
    fs.writeFileSync(outputPath, fullHTML);
    console.log(`✅ Generated HTML: ${outputPath}`);
    
  } catch (error) {
    console.error(`❌ Error generating HTML: ${error.message}`);
    process.exit(1);
  }
}

/**
 * Main build function
 */
function buildDocs() {
  console.log('🏗️  Building documentation...');
  
  // Ensure output directory exists
  ensureDir(config.outputDir);
  
  // Check if input directory exists
  if (!fs.existsSync(config.inputDir)) {
    console.error(`❌ Input directory not found: ${config.inputDir}`);
    process.exit(1);
  }
  
  // Generate documentation index
  generateDocsIndex();
  
  // Process markdown files
  const files = fs.readdirSync(config.inputDir);
  const markdownFiles = files.filter(file => file.endsWith('.md'));
  
  for (const file of markdownFiles) {
    const inputPath = path.join(config.inputDir, file);
    const outputPath = path.join(config.outputDir, file.replace('.md', '.html'));
    generateHTMLFromMarkdown(inputPath, outputPath);
  }
  
  // Process component documentation
  const componentsDir = path.join(config.inputDir, 'components');
  if (fs.existsSync(componentsDir)) {
    const componentFiles = fs.readdirSync(componentsDir);
    const componentMarkdownFiles = componentFiles.filter(file => file.endsWith('.md'));
    
    const componentsOutputDir = path.join(config.outputDir, 'components');
    ensureDir(componentsOutputDir);
    
    for (const file of componentMarkdownFiles) {
      const inputPath = path.join(componentsDir, file);
      const outputPath = path.join(componentsOutputDir, file.replace('.md', '.html'));
      generateHTMLFromMarkdown(inputPath, outputPath);
    }
  }
  
  console.log('✅ Documentation build complete!');
}

// Run the build
if (require.main === module) {
  buildDocs();
}

module.exports = { buildDocs, generateDocsIndex, generateHTMLFromMarkdown };













