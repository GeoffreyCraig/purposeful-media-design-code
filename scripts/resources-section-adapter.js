/**
 * Resources Section WordPress Adapter
 * Purposeful Media Promotions
 * 
 * Purpose: Connect the static Resources Section component to WordPress REST API
 *          Automatically populate resource cards from WordPress custom post type
 * 
 * Version: 1.0 (Skeleton)
 * Date: October 8, 2025
 * 
 * Usage: Include this script in WordPress theme after resources section HTML
 * 
 * Dependencies:
 *   - WordPress REST API v2 enabled
 *   - Custom Post Type "Resources" registered in WordPress
 *   - Custom fields configured (see CUSTOM_FIELDS section below)
 *   - icon-display.js for icon initialization
 * 
 * Related Components:
 *   - section-resources.html (organism)
 *   - card-resources.html (molecule)
 *   - icon-display.html (molecule)
 * 
 * Related Styles:
 *   - organisms-section-resources.css
 *   - molecules-cards-resources.css
 *   - molecules-icon-display.css
 */

// ============================================
// CONFIGURATION
// ============================================

const ResourcesAdapter = {
    // WordPress REST API endpoint
    // NOTE: Update 'resources' to match your custom post type slug in WordPress
    apiBase: '/wp-json/wp/v2/resources',
    
    // Custom Post Type Configuration
    // NOTE: These should match your WordPress custom post type registration
    postType: {
        slug: 'resources',              // Custom post type slug
        supportsFeatureImage: true,     // Whether CPT uses featured images
        taxonomies: ['resource-category'] // Custom taxonomies (optional)
    },
    
    // Custom Field Mapping
    // NOTE: Update these keys to match your ACF or custom field names in WordPress
    customFields: {
        resourceTitle: 'resource_title',           // Heading text (or use post_title)
        resourceDescription: 'resource_description', // CTA copy for card
        resourceIcon: 'resource_icon',              // Icon name (dropdown in WP admin)
        resourceButtonText: 'resource_button_text',  // Button CTA text
        resourceLandingUrl: 'resource_landing_url',  // URL to landing page
        resourceThumbnail: 'resource_thumbnail',     // Featured image (or custom)
        resourceFeatured: 'resource_featured',       // Boolean: show on homepage
        resourceOrder: 'resource_order'              // Manual sort order (optional)
    },
    
    // Display Settings
    settings: {
        // Number of resources to display
        defaultCount: 8,              // 2 rows × 4 cards (desktop+)
        
        // Ordering
        orderBy: 'date',              // Options: 'date', 'menu_order', 'title', 'modified'
        order: 'desc',                // Options: 'desc' (newest first), 'asc' (oldest first)
        
        // Filtering
        showFeaturedOnly: false,      // If true, only show resources with featured = true
        categoryFilter: null,         // Set to category slug to filter by category
        
        // Fallbacks
        defaultIcon: 'roi',           // Default icon if none specified
        defaultButtonText: 'Learn More', // Default button text if none specified
        defaultThumbnail: '/assets/images/image-blank-lg-portrait-TN.png', // Fallback image
        
        // Error handling
        showErrorMessages: true,      // Display error messages to user
        fallbackToPlaceholder: true   // Show placeholder cards on error
    },
    
    // Icon Validation
    // Available icon names from icon-display molecule
    availableIcons: [
        'accelerate', 'attract', 'contact', 'delight', 'download', 
        'efficiency', 'email', 'engage', 'exit', 'expertise', 
        'inbound', 'momentum', 'news', 'persona', 'professional', 
        'roi', 'schedule', 'strategy', 'unit', 'value', 'webinar'
    ]
};

// ============================================
// CORE INITIALIZATION FUNCTION
// ============================================

/**
 * Initialize the Resources Section with WordPress content
 * 
 * This is the main entry point. Call this function on DOMContentLoaded
 * to populate the resources section with WordPress data.
 * 
 * @param {string} containerSelector - CSS selector for the resources section container
 * @param {object} options - Override default settings
 * @returns {Promise<void>}
 * 
 * @example
 * // Basic usage (uses default settings)
 * initializeResourcesSection('.section-resources');
 * 
 * @example
 * // With custom options
 * initializeResourcesSection('.section-resources', {
 *     count: 12,
 *     orderBy: 'menu_order',
 *     showFeaturedOnly: true
 * });
 */
async function initializeResourcesSection(containerSelector = '.section-resources', options = {}) {
    try {
        console.log('Initializing Resources Section...');
        
        // Find the container element
        const container = document.querySelector(containerSelector);
        if (!container) {
            console.error('Resources Section container not found:', containerSelector);
            return;
        }
        
        // Merge options with defaults
        const config = { ...ResourcesAdapter.settings, ...options };
        
        // Build API query URL
        const apiUrl = buildResourcesApiUrl(config);
        console.log('Fetching from:', apiUrl);
        
        // Fetch resources from WordPress
        const resources = await fetchWordPressResources(apiUrl);
        
        // Validate and process resources
        const processedResources = processResources(resources);
        
        // Render the resource cards
        if (processedResources && processedResources.length > 0) {
            await renderResourceCards(container, processedResources);
            
            // Initialize icon-display elements
            initializeIcons();
            
            console.log(`✅ Resources Section loaded with ${processedResources.length} resources`);
        } else {
            renderEmptyState(container);
        }
        
    } catch (error) {
        console.error('❌ Error initializing Resources Section:', error);
        
        if (ResourcesAdapter.settings.showErrorMessages) {
            renderErrorState(container, error);
        } else if (ResourcesAdapter.settings.fallbackToPlaceholder) {
            renderPlaceholderCards(container, 4);
        }
    }
}

// ============================================
// API FUNCTIONS
// ============================================

/**
 * Build the WordPress REST API URL with query parameters
 * 
 * @param {object} config - Configuration object with query parameters
 * @returns {string} - Complete API URL with query string
 * 
 * @example
 * // Returns: "/wp-json/wp/v2/resources?per_page=8&orderby=date&order=desc"
 */
function buildResourcesApiUrl(config) {
    const params = new URLSearchParams({
        per_page: config.count || config.defaultCount,
        orderby: config.orderBy,
        order: config.order,
        _embed: true  // Include featured images and other embedded data
    });
    
    // Add featured filter if enabled
    if (config.showFeaturedOnly) {
        // NOTE: This requires a custom endpoint or meta_query in WordPress
        // params.append('meta_key', ResourcesAdapter.customFields.resourceFeatured);
        // params.append('meta_value', '1');
    }
    
    // Add category filter if specified
    if (config.categoryFilter) {
        // NOTE: Update 'resource-category' to match your taxonomy
        params.append('resource-category', config.categoryFilter);
    }
    
    return `${ResourcesAdapter.apiBase}?${params.toString()}`;
}

/**
 * Fetch resources from WordPress REST API
 * 
 * @param {string} url - Complete API URL
 * @returns {Promise<Array>} - Array of resource objects from WordPress
 * @throws {Error} - If fetch fails or returns non-200 status
 */
async function fetchWordPressResources(url) {
    try {
        const response = await fetch(url);
        
        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }
        
        const data = await response.json();
        return data;
        
    } catch (error) {
        console.error('Error fetching resources:', error);
        throw error;
    }
}

// ============================================
// DATA PROCESSING FUNCTIONS
// ============================================

/**
 * Process raw WordPress data into component-ready format
 * 
 * Maps WordPress custom fields to the structure needed by card-resources component
 * 
 * @param {Array} rawResources - Raw resource objects from WordPress API
 * @returns {Array} - Processed resource objects ready for rendering
 */
function processResources(rawResources) {
    if (!rawResources || !Array.isArray(rawResources)) {
        return [];
    }
    
    return rawResources.map(resource => processResource(resource));
}

/**
 * Process a single resource object
 * 
 * @param {object} resource - Raw resource object from WordPress
 * @returns {object} - Processed resource object
 * 
 * Structure of processed resource:
 * {
 *   id: number,
 *   title: string,
 *   description: string,
 *   icon: string,
 *   thumbnail: string,
 *   buttonText: string,
 *   landingUrl: string,
 *   date: string
 * }
 */
function processResource(resource) {
    // Access custom fields from WordPress
    // NOTE: The exact path depends on how you're storing custom fields
    // ACF uses resource.acf.field_name
    // Native custom fields use resource.meta.field_name
    
    const customFields = resource.acf || resource.meta || {};
    
    return {
        id: resource.id,
        
        // Title: Use custom field or fall back to post title
        title: customFields[ResourcesAdapter.customFields.resourceTitle] 
               || resource.title.rendered 
               || 'Untitled Resource',
        
        // Description: CTA text for the card
        description: customFields[ResourcesAdapter.customFields.resourceDescription] 
                    || resource.excerpt.rendered 
                    || '',
        
        // Icon: Validate against available icons
        icon: validateIcon(customFields[ResourcesAdapter.customFields.resourceIcon]),
        
        // Thumbnail: Use custom field, featured image, or fallback
        thumbnail: getThumbnailUrl(resource, customFields),
        
        // Button Text
        buttonText: customFields[ResourcesAdapter.customFields.resourceButtonText] 
                   || ResourcesAdapter.settings.defaultButtonText,
        
        // Landing URL: Use custom field or permalink
        landingUrl: customFields[ResourcesAdapter.customFields.resourceLandingUrl] 
                   || resource.link 
                   || '#',
        
        // Metadata
        date: resource.date,
        featured: customFields[ResourcesAdapter.customFields.resourceFeatured] || false
    };
}

/**
 * Validate icon name against available icons
 * 
 * @param {string} iconName - Icon name from WordPress
 * @returns {string} - Valid icon name or default
 */
function validateIcon(iconName) {
    if (!iconName) {
        return ResourcesAdapter.settings.defaultIcon;
    }
    
    const cleanIconName = iconName.toLowerCase().trim();
    
    if (ResourcesAdapter.availableIcons.includes(cleanIconName)) {
        return cleanIconName;
    }
    
    console.warn(`Invalid icon "${iconName}", using default "${ResourcesAdapter.settings.defaultIcon}"`);
    return ResourcesAdapter.settings.defaultIcon;
}

/**
 * Get thumbnail URL from resource object
 * 
 * @param {object} resource - WordPress resource object
 * @param {object} customFields - Custom fields object
 * @returns {string} - Thumbnail URL
 */
function getThumbnailUrl(resource, customFields) {
    // Try custom thumbnail field first
    if (customFields[ResourcesAdapter.customFields.resourceThumbnail]) {
        return customFields[ResourcesAdapter.customFields.resourceThumbnail];
    }
    
    // Try featured image from embedded data
    if (resource._embedded && resource._embedded['wp:featuredmedia']) {
        const media = resource._embedded['wp:featuredmedia'][0];
        // Try to get medium_large size, fall back to full
        return media.media_details?.sizes?.medium_large?.source_url 
               || media.source_url;
    }
    
    // Use fallback image
    return ResourcesAdapter.settings.defaultThumbnail;
}

// ============================================
// RENDERING FUNCTIONS
// ============================================

/**
 * Render all resource cards into the section container
 * 
 * @param {HTMLElement} container - Section container element
 * @param {Array} resources - Processed resource objects
 * @returns {Promise<void>}
 */
async function renderResourceCards(container, resources) {
    // Find or create the grid container
    let grid = container.querySelector('.section-resources__grid');
    if (!grid) {
        grid = document.createElement('div');
        grid.className = 'section-resources__grid';
        container.appendChild(grid);
    }
    
    // Clear existing content
    grid.innerHTML = '';
    
    // Create a single row (cards will wrap automatically via CSS)
    const row = document.createElement('div');
    row.className = 'section-resources__row';
    
    // Generate card HTML for each resource
    resources.forEach(resource => {
        const cardHtml = createResourceCardHtml(resource);
        row.innerHTML += cardHtml;
    });
    
    grid.appendChild(row);
}

/**
 * Create HTML for a single resource card
 * 
 * Uses the standard card-resources component structure
 * 
 * @param {object} resource - Processed resource object
 * @returns {string} - HTML string for the card
 */
function createResourceCardHtml(resource) {
    return `
        <div class="section-resources__card" data-resource-id="${resource.id}">
            <div class="card-resources">
                <img class="card-resources__thumbnail" 
                     src="${escapeHtml(resource.thumbnail)}" 
                     alt="${escapeHtml(resource.title)}"
                     loading="lazy"
                     onerror="this.src='${ResourcesAdapter.settings.defaultThumbnail}'">
                <div class="card-resources__overlay"></div>
                <div class="card-resources__content">
                    <div class="card-resources__header">
                        <div class="icon-display icon-display--large" 
                             data-icon="${resource.icon}" 
                             data-color="white"></div>
                        <h3 class="card-resources__heading">${escapeHtml(resource.title)}</h3>
                    </div>
                    <p class="card-resources__cta">
                        ${escapeHtml(resource.description)}
                    </p>
                    <a href="${escapeHtml(resource.landingUrl)}" 
                       class="card-resources__button"
                       aria-label="${escapeHtml(resource.buttonText)} - ${escapeHtml(resource.title)}">
                        <span class="card-resources__button-text">
                            ${escapeHtml(resource.buttonText)}
                        </span>
                    </a>
                </div>
            </div>
        </div>
    `;
}

/**
 * Initialize icon-display elements after rendering
 * 
 * This applies the icon classes based on data attributes
 */
function initializeIcons() {
    const icons = document.querySelectorAll('.section-resources .icon-display');
    icons.forEach(icon => {
        const iconName = icon.getAttribute('data-icon');
        const color = icon.getAttribute('data-color');
        if (iconName && color) {
            icon.classList.add(`icon--${iconName}-${color}`);
        }
    });
}

// ============================================
// ERROR & EMPTY STATE HANDLING
// ============================================

/**
 * Render empty state when no resources are found
 * 
 * @param {HTMLElement} container - Section container element
 */
function renderEmptyState(container) {
    container.innerHTML = `
        <div class="section-resources__empty-state">
            <div class="empty-state-content">
                <h3>No Resources Available</h3>
                <p>Check back soon for new resources and guides.</p>
            </div>
        </div>
    `;
}

/**
 * Render error state when API fetch fails
 * 
 * @param {HTMLElement} container - Section container element
 * @param {Error} error - Error object
 */
function renderErrorState(container, error) {
    const errorMessage = ResourcesAdapter.settings.showErrorMessages 
        ? `Error loading resources: ${error.message}` 
        : 'Unable to load resources. Please try again later.';
    
    container.innerHTML = `
        <div class="section-resources__error-state">
            <div class="error-state-content">
                <h3>Oops!</h3>
                <p>${escapeHtml(errorMessage)}</p>
            </div>
        </div>
    `;
}

/**
 * Render placeholder cards as fallback
 * 
 * @param {HTMLElement} container - Section container element
 * @param {number} count - Number of placeholder cards to render
 */
function renderPlaceholderCards(container, count = 4) {
    const placeholderResources = Array(count).fill(null).map((_, index) => ({
        id: `placeholder-${index}`,
        title: 'Resource Title',
        description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        icon: ResourcesAdapter.settings.defaultIcon,
        thumbnail: ResourcesAdapter.settings.defaultThumbnail,
        buttonText: 'Learn More',
        landingUrl: '#'
    }));
    
    renderResourceCards(container, placeholderResources);
}

// ============================================
// UTILITY FUNCTIONS
// ============================================

/**
 * Escape HTML to prevent XSS attacks
 * 
 * @param {string} unsafe - Unsafe string from user input or API
 * @returns {string} - Escaped safe string
 */
function escapeHtml(unsafe) {
    if (typeof unsafe !== 'string') return '';
    
    return unsafe
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

/**
 * Strip HTML tags from string
 * 
 * @param {string} html - HTML string
 * @returns {string} - Plain text
 */
function stripHtmlTags(html) {
    const div = document.createElement('div');
    div.innerHTML = html;
    return div.textContent || div.innerText || '';
}

/**
 * Truncate text to specified length
 * 
 * @param {string} text - Text to truncate
 * @param {number} maxLength - Maximum length
 * @returns {string} - Truncated text with ellipsis
 */
function truncateText(text, maxLength = 150) {
    if (text.length <= maxLength) return text;
    return text.substring(0, maxLength).trim() + '...';
}

// ============================================
// AUTO-INITIALIZATION
// ============================================

/**
 * Auto-initialize on DOMContentLoaded if container exists
 * 
 * This allows the script to work without manual initialization
 * Simply include the script and it will automatically populate
 * any .section-resources element on the page
 */
document.addEventListener('DOMContentLoaded', function() {
    // Check if resources section exists on the page
    const resourcesSection = document.querySelector('.section-resources');
    
    if (resourcesSection) {
        console.log('Resources Section detected, auto-initializing...');
        
        // Initialize with default settings
        initializeResourcesSection('.section-resources')
            .catch(error => {
                console.error('Auto-initialization failed:', error);
            });
    }
});

// ============================================
// EXPORT FOR MODULE USE (Optional)
// ============================================

// If using ES6 modules in your WordPress theme:
// export { initializeResourcesSection, ResourcesAdapter };

// ============================================
// WORDPRESS INTEGRATION NOTES
// ============================================

/**
 * PHASE 2 IMPLEMENTATION CHECKLIST:
 * 
 * 1. Register Custom Post Type in WordPress:
 *    - Post type slug: 'resources'
 *    - Supports: title, editor, featured-image
 *    - Enable REST API: 'show_in_rest' => true
 * 
 * 2. Create Custom Fields (using ACF or register_meta):
 *    - resource_title (text)
 *    - resource_description (textarea)
 *    - resource_icon (select dropdown with 21 icon options)
 *    - resource_button_text (text)
 *    - resource_landing_url (url)
 *    - resource_thumbnail (image)
 *    - resource_featured (checkbox)
 *    - resource_order (number, for manual sorting)
 * 
 * 3. Update Custom Field Keys:
 *    - Update ResourcesAdapter.customFields object above
 *    - Match keys to your ACF field names or meta keys
 * 
 * 4. Enqueue Script in WordPress Theme:
 *    wp_enqueue_script(
 *        'resources-adapter',
 *        get_template_directory_uri() . '/js/resources-section-adapter.js',
 *        array(),
 *        '1.0',
 *        true
 *    );
 * 
 * 5. Test with Sample Resources:
 *    - Create 4-8 sample resources in WordPress
 *    - Verify API endpoint: /wp-json/wp/v2/resources
 *    - Check that all fields populate correctly
 * 
 * 6. Configure Icon Dropdown in WordPress Admin:
 *    - Create ACF select field with all 21 icon options
 *    - Or use register_meta with enum validation
 * 
 * 7. Set Up Featured Image Guidelines:
 *    - Recommended size: 700px × 525px (4:3 ratio)
 *    - Minimum size: 350px × 263px
 *    - File format: JPG or PNG
 *    - Max file size: 500KB
 * 
 * 8. Optional Enhancements:
 *    - Add featured filter toggle in WordPress admin
 *    - Create custom taxonomy for resource categories
 *    - Add pagination for large resource libraries
 *    - Implement search/filter functionality
 *    - Add analytics tracking to card clicks
 * 
 * TESTING:
 *    - Test with 1, 4, 8, 12 resources
 *    - Test with missing thumbnails (fallback image)
 *    - Test with invalid icon names (default icon)
 *    - Test with very long titles and descriptions
 *    - Test responsive behavior at all breakpoints
 *    - Test with JavaScript disabled (graceful degradation)
 */

