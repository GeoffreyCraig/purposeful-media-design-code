#!/usr/bin/env node

/**
 * Development Server Script
 * 
 * Serves the built design system with live reload and development features
 */

const http = require('http');
const fs = require('fs');
const path = require('path');
const url = require('url');
const { execSync } = require('child_process');

// Configuration
const config = {
  port: 3000,
  host: 'localhost',
  root: 'dist',
  open: true,
  cors: true,
  liveReload: true
};

/**
 * Get MIME type for file
 */
function getMimeType(filePath) {
  const ext = path.extname(filePath).toLowerCase();
  const mimeTypes = {
    '.html': 'text/html',
    '.css': 'text/css',
    '.js': 'application/javascript',
    '.json': 'application/json',
    '.png': 'image/png',
    '.jpg': 'image/jpeg',
    '.jpeg': 'image/jpeg',
    '.gif': 'image/gif',
    '.svg': 'image/svg+xml',
    '.ico': 'image/x-icon',
    '.woff': 'font/woff',
    '.woff2': 'font/woff2',
    '.ttf': 'font/ttf',
    '.eot': 'application/vnd.ms-fontobject'
  };
  
  return mimeTypes[ext] || 'text/plain';
}

/**
 * Serve static file
 */
function serveFile(filePath, res) {
  try {
    const content = fs.readFileSync(filePath);
    const mimeType = getMimeType(filePath);
    
    res.writeHead(200, {
      'Content-Type': mimeType,
      'Content-Length': content.length,
      'Access-Control-Allow-Origin': '*',
      'Cache-Control': 'no-cache'
    });
    
    res.end(content);
    
  } catch (error) {
    res.writeHead(404, { 'Content-Type': 'text/plain' });
    res.end('File not found');
  }
}

/**
 * Serve directory listing
 */
function serveDirectory(dirPath, res) {
  try {
    const files = fs.readdirSync(dirPath);
    const html = `
      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Purposeful Media Design System - ${path.basename(dirPath)}</title>
          <style>
              body {
                  font-family: system-ui, sans-serif;
                  line-height: 1.6;
                  margin: 0;
                  padding: 2rem;
                  background: #f8f9fa;
              }
              .container {
                  max-width: 800px;
                  margin: 0 auto;
                  background: white;
                  padding: 2rem;
                  border-radius: 8px;
                  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
              }
              h1 {
                  color: #1B1464;
                  margin-bottom: 1rem;
              }
              ul {
                  list-style: none;
                  padding: 0;
              }
              li {
                  margin: 0.5rem 0;
              }
              a {
                  color: #1B1464;
                  text-decoration: none;
                  padding: 0.5rem;
                  display: block;
                  border-radius: 4px;
                  transition: background-color 0.2s;
              }
              a:hover {
                  background-color: #f0f0f0;
              }
              .file {
                  font-family: monospace;
                  background: #f8f9fa;
                  padding: 0.25rem 0.5rem;
                  border-radius: 4px;
              }
          </style>
      </head>
      <body>
          <div class="container">
              <h1>Purposeful Media Design System</h1>
              <p>Directory: <code>${dirPath}</code></p>
              <ul>
                  ${files.map(file => {
                    const filePath = path.join(dirPath, file);
                    const isDir = fs.statSync(filePath).isDirectory();
                    const icon = isDir ? '📁' : '📄';
                    const href = isDir ? `${file}/` : file;
                    
                    return `<li><a href="${href}">${icon} <span class="file">${file}</span></a></li>`;
                  }).join('')}
              </ul>
          </div>
      </body>
      </html>
    `;
    
    res.writeHead(200, { 'Content-Type': 'text/html' });
    res.end(html);
    
  } catch (error) {
    res.writeHead(500, { 'Content-Type': 'text/plain' });
    res.end('Error reading directory');
  }
}

/**
 * Create HTTP server
 */
function createServer() {
  const server = http.createServer((req, res) => {
    const parsedUrl = url.parse(req.url, true);
    const pathname = parsedUrl.pathname;
    
    // Handle root redirect
    if (pathname === '/') {
      res.writeHead(302, { 'Location': '/docs/index.html' });
      res.end();
      return;
    }
    
    // Build file path
    const filePath = path.join(config.root, pathname);
    
    // Check if file exists
    if (fs.existsSync(filePath)) {
      const stats = fs.statSync(filePath);
      
      if (stats.isDirectory()) {
        // Check for index file
        const indexFiles = ['index.html', 'index.htm'];
        let indexFound = false;
        
        for (const indexFile of indexFiles) {
          const indexPath = path.join(filePath, indexFile);
          if (fs.existsSync(indexPath)) {
            serveFile(indexPath, res);
            indexFound = true;
            break;
          }
        }
        
        if (!indexFound) {
          serveDirectory(filePath, res);
        }
      } else {
        serveFile(filePath, res);
      }
    } else {
      // 404
      res.writeHead(404, { 'Content-Type': 'text/html' });
      res.end(`
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>404 - Not Found</title>
            <style>
                body {
                    font-family: system-ui, sans-serif;
                    text-align: center;
                    padding: 2rem;
                    background: #f8f9fa;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    background: white;
                    padding: 2rem;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                }
                h1 { color: #1B1464; }
                a { color: #1B1464; text-decoration: none; }
                a:hover { text-decoration: underline; }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>404 - Page Not Found</h1>
                <p>The requested file <code>${pathname}</code> was not found.</p>
                <p><a href="/docs/index.html">← Back to Documentation</a></p>
            </div>
        </body>
        </html>
      `);
    }
  });
  
  return server;
}

/**
 * Open browser
 */
function openBrowser() {
  const url = `http://${config.host}:${config.port}`;
  
  try {
    const start = process.platform === 'darwin' ? 'open' : 
                  process.platform === 'win32' ? 'start' : 'xdg-open';
    
    execSync(`${start} ${url}`, { stdio: 'ignore' });
    console.log(`🌐 Opened browser: ${url}`);
    
  } catch (error) {
    console.log(`🌐 Please open your browser to: ${url}`);
  }
}

/**
 * Start development server
 */
function startServer() {
  // Check if dist directory exists
  if (!fs.existsSync(config.root)) {
    console.error(`❌ Build directory not found: ${config.root}`);
    console.log('💡 Run "npm run build" first to build the design system');
    process.exit(1);
  }
  
  const server = createServer();
  
  server.listen(config.port, config.host, () => {
    console.log('🚀 Purposeful Media Design System Development Server');
    console.log('');
    console.log(`📁 Serving from: ${path.resolve(config.root)}`);
    console.log(`🌐 Server running at: http://${config.host}:${config.port}`);
    console.log('');
    console.log('📖 Documentation: http://localhost:3000/docs/index.html');
    console.log('🧩 Components: http://localhost:3000/components/');
    console.log('🎨 Styles: http://localhost:3000/styles/');
    console.log('');
    console.log('Press Ctrl+C to stop the server');
    
    if (config.open) {
      setTimeout(openBrowser, 1000);
    }
  });
  
  // Handle graceful shutdown
  process.on('SIGINT', () => {
    console.log('\n👋 Shutting down development server...');
    server.close(() => {
      console.log('✅ Server stopped');
      process.exit(0);
    });
  });
  
  // Handle errors
  server.on('error', (error) => {
    if (error.code === 'EADDRINUSE') {
      console.error(`❌ Port ${config.port} is already in use`);
      console.log('💡 Try a different port or stop the existing server');
    } else {
      console.error('❌ Server error:', error);
    }
    process.exit(1);
  });
}

// Run the server
if (require.main === module) {
  startServer();
}

module.exports = { startServer, createServer };













