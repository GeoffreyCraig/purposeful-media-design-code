/**
 * Blog Group WordPress Adapter
 * Purposeful Media Promotions
 * 
 * Purpose: Connect the static Blog Group component to WordPress REST API
 * Version: 1.0
 * Date: October 2, 2025
 * 
 * Usage: Include this script after the blog-group HTML is loaded
 * Dependencies: WordPress REST API v2 enabled
 */

// ============================================
// Configuration
// ============================================

const BlogGroupAdapter = {
    // WordPress REST API endpoint (update with your domain in production)
    apiBase: '/wp-json/wp/v2',
    
    // Category mapping (update IDs after WordPress setup)
    categories: {
        'email-marketing': null,      // Set ID after WP category creation
        'content-creation': null,      // Set ID after WP category creation
        'ai-marketing': null,          // Set ID after WP category creation
        'succession-planning': null,   // Set ID after WP category creation
        'webinar-production': null,    // Set ID after WP category creation
        'seo-optimization': null,      // Set ID after WP category creation
        'lead-generation': null,       // Set ID after WP category creation
        'professional-development': null // Set ID after WP category creation
    },
    
    // Post display settings
    settings: {
        excerptLength: 150,  // Characters to show in excerpt
        dateFormat: 'long',  // 'long' = "October 2, 2025", 'short' = "10/2/25"
        defaultAuthor: 'Purposeful Media',
        readMoreText: '[Read more]'
    }
};

// ============================================
// Core Functions
// ============================================

/**
 * Initialize the blog group with WordPress content
 * @param {string} mode - 'teaser', 'frontpage', or 'infinite'
 * @param {string} containerSelector - CSS selector for the blog group container
 * @param {object} options - Additional options (category, postsPerPage, etc.)
 */
async function initializeBlogGroup(mode = 'frontpage', containerSelector = '.blog-group', options = {}) {
    try {
        const container = document.querySelector(containerSelector);
        if (!container) {
            console.error('Blog Group container not found:', containerSelector);
            return;
        }
        
        // Determine number of posts based on mode and viewport
        const postsToLoad = getPostCount(mode);
        
        // Build API query
        const apiUrl = buildApiUrl(postsToLoad, options);
        
        // Fetch posts from WordPress
        const posts = await fetchWordPressPosts(apiUrl);
        
        // Render the posts
        if (posts && posts.length > 0) {
            await renderBlogPosts(container, posts, mode);
        } else {
            renderEmptyState(container);
        }
        
        // Set up pagination if needed
        if (mode === 'frontpage') {
            setupPagination(container, options);
        }
        
        console.log(`Blog Group initialized in ${mode} mode with ${posts.length} posts`);
        
    } catch (error) {
        console.error('Error initializing blog group:', error);
        renderErrorState(container);
    }
}

/**
 * Determine number of posts based on mode and viewport
 */
function getPostCount(mode) {
    if (mode === 'teaser') return 2;
    if (mode === 'infinite') return 100; // Fetch max allowed
    
    // FrontPage mode - responsive post count
    const width = window.innerWidth;
    if (width < 768) return 4;  // Mobile
    if (width < 1150) return 6;  // Tablet
    return 8;  // Desktop/DesktopPlus
}

/**
 * Build WordPress API URL with parameters
 */
function buildApiUrl(perPage, options = {}) {
    let url = `${BlogGroupAdapter.apiBase}/posts?per_page=${perPage}`;
    
    // Add category filter if specified
    if (options.category && BlogGroupAdapter.categories[options.category]) {
        url += `&categories=${BlogGroupAdapter.categories[options.category]}`;
    }
    
    // Add pagination
    if (options.page && options.page > 1) {
        url += `&page=${options.page}`;
    }
    
    // Add search query if specified
    if (options.search) {
        url += `&search=${encodeURIComponent(options.search)}`;
    }
    
    // Ensure we get the data we need
    url += '&_embed'; // Include featured media, author, categories
    
    return url;
}

/**
 * Fetch posts from WordPress REST API
 */
async function fetchWordPressPosts(url) {
    try {
        const response = await fetch(url);
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const posts = await response.json();
        
        // Store pagination info from headers
        const totalPages = response.headers.get('X-WP-TotalPages');
        const totalPosts = response.headers.get('X-WP-Total');
        
        if (totalPages) {
            BlogGroupAdapter.pagination = {
                totalPages: parseInt(totalPages),
                totalPosts: parseInt(totalPosts),
                currentPage: 1
            };
        }
        
        return posts;
        
    } catch (error) {
        console.error('Error fetching WordPress posts:', error);
        return [];
    }
}

/**
 * Render blog posts in the container
 */
async function renderBlogPosts(container, posts, mode) {
    const cardsContainer = container.querySelector('.blog-group__cards .blog-group__inner');
    
    if (!cardsContainer) {
        console.error('Blog cards container not found');
        return;
    }
    
    // Clear existing posts
    cardsContainer.innerHTML = '';
    
    // Add appropriate mode class
    container.className = `blog-group blog-group--${mode}`;
    if (mode === 'frontpage') {
        const responsiveClass = getResponsiveClass();
        container.classList.add(responsiveClass);
    }
    
    // Render each post
    posts.forEach(post => {
        const blogCard = createBlogCard(post);
        cardsContainer.appendChild(blogCard);
    });
}

/**
 * Create a blog card element from WordPress post data
 */
function createBlogCard(post) {
    const article = document.createElement('article');
    article.className = 'blog-card';
    article.dataset.postId = post.id;
    
    // Extract data with fallbacks
    const title = post.title.rendered || 'Untitled Post';
    const excerpt = stripHtml(post.excerpt.rendered) || '';
    const link = post.link || '#';
    const date = formatDate(post.date);
    const author = getAuthorName(post);
    const category = getCategoryName(post);
    
    // Build the card HTML
    article.innerHTML = `
        <div class="blog-card__top">
            <h3 class="blog-card__title">${title}</h3>
            <div class="blog-card__meta">
                Category: ${category} | Date: ${date} | Author: ${author}
            </div>
        </div>
        <div class="blog-card__content">
            <p class="blog-card__excerpt">
                ${truncateExcerpt(excerpt, BlogGroupAdapter.settings.excerptLength)}
                <a href="${link}" class="blog-card__read-more">${BlogGroupAdapter.settings.readMoreText}</a>
            </p>
        </div>
    `;
    
    // Add click handler
    article.addEventListener('click', function(e) {
        if (!e.target.classList.contains('blog-card__read-more')) {
            window.location.href = link;
        }
    });
    
    return article;
}

// ============================================
// Helper Functions
// ============================================

/**
 * Get responsive class for frontpage mode
 */
function getResponsiveClass() {
    const width = window.innerWidth;
    if (width < 768) return 'blog-group--frontpage-mobile';
    if (width < 1150) return 'blog-group--frontpage-tablet';
    return 'blog-group--frontpage-desktop';
}

/**
 * Strip HTML tags from string
 */
function stripHtml(html) {
    const tmp = document.createElement('div');
    tmp.innerHTML = html;
    return tmp.textContent || tmp.innerText || '';
}

/**
 * Format date for display
 */
function formatDate(dateString) {
    const date = new Date(dateString);
    const options = BlogGroupAdapter.settings.dateFormat === 'long' 
        ? { year: 'numeric', month: 'long', day: 'numeric' }
        : { year: 'numeric', month: '2-digit', day: '2-digit' };
    
    return date.toLocaleDateString('en-US', options);
}

/**
 * Get author name from post data
 */
function getAuthorName(post) {
    // Check if author data is embedded
    if (post._embedded && post._embedded.author && post._embedded.author[0]) {
        return post._embedded.author[0].name;
    }
    return BlogGroupAdapter.settings.defaultAuthor;
}

/**
 * Get category name from post data
 */
function getCategoryName(post) {
    // Check if category data is embedded
    if (post._embedded && post._embedded['wp:term'] && post._embedded['wp:term'][0]) {
        const categories = post._embedded['wp:term'][0];
        if (categories.length > 0) {
            return categories[0].name;
        }
    }
    return 'Uncategorized';
}

/**
 * Truncate excerpt to specified length
 */
function truncateExcerpt(text, maxLength) {
    if (text.length <= maxLength) return text;
    
    // Truncate at last complete word
    const truncated = text.substr(0, maxLength);
    const lastSpace = truncated.lastIndexOf(' ');
    
    return truncated.substr(0, lastSpace) + '...';
}

// ============================================
// Pagination Functions
// ============================================

/**
 * Set up pagination controls
 */
function setupPagination(container, options) {
    const footer = container.querySelector('.blog-group__footer');
    if (!footer) return;
    
    const paginationLink = footer.querySelector('.blog-group__pagination');
    if (!paginationLink) return;
    
    // Check if there are more pages
    if (BlogGroupAdapter.pagination && BlogGroupAdapter.pagination.totalPages > 1) {
        paginationLink.style.display = 'block';
        
        paginationLink.addEventListener('click', async function(e) {
            e.preventDefault();
            
            // Load next page
            const nextPage = (BlogGroupAdapter.pagination.currentPage || 1) + 1;
            
            if (nextPage <= BlogGroupAdapter.pagination.totalPages) {
                const newOptions = { ...options, page: nextPage };
                const apiUrl = buildApiUrl(getPostCount('frontpage'), newOptions);
                const posts = await fetchWordPressPosts(apiUrl);
                
                if (posts && posts.length > 0) {
                    // Append new posts
                    const cardsContainer = container.querySelector('.blog-group__cards .blog-group__inner');
                    posts.forEach(post => {
                        const blogCard = createBlogCard(post);
                        cardsContainer.appendChild(blogCard);
                    });
                    
                    BlogGroupAdapter.pagination.currentPage = nextPage;
                    
                    // Hide pagination if we've loaded all pages
                    if (nextPage >= BlogGroupAdapter.pagination.totalPages) {
                        paginationLink.style.display = 'none';
                    }
                }
            }
        });
    } else {
        // Hide pagination if only one page
        paginationLink.style.display = 'none';
    }
}

// ============================================
// Empty and Error States
// ============================================

/**
 * Render empty state when no posts found
 */
function renderEmptyState(container) {
    const cardsContainer = container.querySelector('.blog-group__cards .blog-group__inner');
    if (cardsContainer) {
        cardsContainer.innerHTML = `
            <div class="blog-group__empty">
                <p style="text-align: center; padding: 40px 20px; color: #51585e; font-size: 18px;">
                    No blog posts found. Check back soon for new content!
                </p>
            </div>
        `;
    }
}

/**
 * Render error state when API fails
 */
function renderErrorState(container) {
    const cardsContainer = container.querySelector('.blog-group__cards .blog-group__inner');
    if (cardsContainer) {
        cardsContainer.innerHTML = `
            <div class="blog-group__error">
                <p style="text-align: center; padding: 40px 20px; color: #ef4444; font-size: 18px;">
                    Unable to load blog posts. Please try again later.
                </p>
            </div>
        `;
    }
}

// ============================================
// Auto-initialization
// ============================================

/**
 * Auto-initialize blog groups on page load
 * Looks for data attributes to configure each instance
 */
document.addEventListener('DOMContentLoaded', function() {
    // Find all blog group containers with data attributes
    const blogGroups = document.querySelectorAll('[data-blog-group]');
    
    blogGroups.forEach(container => {
        const mode = container.dataset.blogGroup || 'frontpage';
        const category = container.dataset.blogCategory || null;
        const autoInit = container.dataset.blogAutoInit !== 'false';
        
        if (autoInit) {
            initializeBlogGroup(mode, `#${container.id}`, { category });
        }
    });
});

// ============================================
// Public API
// ============================================

// Export for use in other scripts
window.BlogGroupAdapter = {
    initialize: initializeBlogGroup,
    refresh: async function(containerSelector) {
        const container = document.querySelector(containerSelector);
        if (container) {
            const mode = container.dataset.blogGroup || 'frontpage';
            const category = container.dataset.blogCategory || null;
            await initializeBlogGroup(mode, containerSelector, { category });
        }
    },
    config: BlogGroupAdapter
};

// ============================================
// Usage Examples (Remove in production)
// ============================================

/*
// Example 1: Initialize with data attributes in HTML
<section class="blog-group" id="blog-main" data-blog-group="frontpage" data-blog-category="email-marketing">
    <!-- Component HTML here -->
</section>

// Example 2: Manual initialization
BlogGroupAdapter.initialize('frontpage', '#blog-main', {
    category: 'email-marketing',
    page: 1
});

// Example 3: Refresh existing blog group
BlogGroupAdapter.refresh('#blog-main');

// Example 4: Update category IDs after WordPress setup
BlogGroupAdapter.config.categories['email-marketing'] = 5;
BlogGroupAdapter.config.categories['content-creation'] = 6;
*/