module.exports = {
  plugins: [
    // Process @import statements
    require('postcss-import')({
      path: ['styles']
    }),
    
    // Add vendor prefixes automatically
    require('autoprefixer')({
      overrideBrowserslist: [
        'last 2 versions',
        'Safari >= 12',
        'iOS >= 12',
        'not dead',
        'not op_mini all'
      ]
    }),
    
    // Minify CSS for production
    require('cssnano')({
      preset: ['default', {
        discardComments: {
          removeAll: true
        },
        normalizeWhitespace: true,
        reduceIdents: false, // Keep @keyframe names
        zindex: false // Don't mess with z-index values
      }]
    })
  ]
};


