/* =================================================
   CARD/BANNER-SPACER COMPONENT JAVASCRIPT
   Version: 3.0 (External JS)
   File: atoms-banner-spacer.js
   ================================================= */

/**
 * Create a BannerSpacer component dynamically
 * @param {string} variant - The variant type: 'spacer', 'headline-banner', or 'headline-reverse'
 * @param {string} text - The headline text (not used for spacer variant)
 * @param {string} headingLevel - The heading level: 'h1', 'h2', 'h3', etc.
 * @returns {HTMLElement} The created banner spacer element
 */
function createBannerSpacer(variant, text = '', headingLevel = 'h1') {
    const wrapper = document.createElement('div');
    wrapper.className = `card-banner-spacer variant-${variant}`;
    wrapper.setAttribute('data-component', 'card-banner-spacer');
    wrapper.setAttribute('data-variant', variant);
    
    // Add accessibility attributes for spacer variant
    if (variant === 'spacer') {
        wrapper.setAttribute('role', 'presentation');
        wrapper.setAttribute('aria-hidden', 'true');
    }
    
    const content = document.createElement('div');
    content.className = 'banner-spacer-content';
    
    // Add headline for non-spacer variants
    if (variant !== 'spacer' && text) {
        const heading = document.createElement(headingLevel);
        heading.className = 'banner-headline';
        heading.textContent = text;
        content.appendChild(heading);
    }
    
    wrapper.appendChild(content);
    return wrapper;
}

/**
 * Update an existing banner spacer's text
 * @param {HTMLElement} element - The banner spacer element
 * @param {string} newText - The new headline text
 */
function updateBannerText(element, newText) {
    const headline = element.querySelector('.banner-headline');
    if (headline) {
        headline.textContent = newText;
    }
}

/**
 * Switch between variants on an existing element
 * @param {HTMLElement} element - The banner spacer element
 * @param {string} newVariant - The new variant type
 */
function switchVariant(element, newVariant) {
    // Remove existing variant classes
    element.className = element.className.replace(/variant-[\w-]+/g, '');
    
    // Add new variant class
    element.classList.add(`variant-${newVariant}`);
    element.setAttribute('data-variant', newVariant);
    
    // Handle spacer variant (remove text and add accessibility attributes)
    if (newVariant === 'spacer') {
        const headline = element.querySelector('.banner-headline');
        if (headline) {
            headline.remove();
        }
        element.setAttribute('role', 'presentation');
        element.setAttribute('aria-hidden', 'true');
    } else {
        // Remove accessibility attributes for non-spacer variants
        element.removeAttribute('role');
        element.removeAttribute('aria-hidden');
    }
}

/**
 * Set custom height for spacer variant
 * @param {HTMLElement} element - The banner spacer element
 * @param {string} height - Height value (e.g., '60px', '80px')
 */
function setSpacerHeight(element, height) {
    if (element.getAttribute('data-variant') === 'spacer') {
        element.style.minHeight = height;
        const content = element.querySelector('.banner-spacer-content');
        if (content) {
            content.style.minHeight = height;
        }
    }
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('Card/BannerSpacer Component v3.0 (External) loaded');
    
    // Example usage:
    // const container = document.querySelector('.demo-container');
    // const newBanner = createBannerSpacer('headline-banner', 'Dynamic Banner Text', 'h2');
    // container.appendChild(newBanner);
    
    // Example: Change spacer height
    // const spacer = document.querySelector('.variant-spacer');
    // setSpacerHeight(spacer, '80px');
});
