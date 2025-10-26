/**
 * Sticky Menu JavaScript
 * Handles sticky navigation behavior for service/solution pages
 * Version: 1.0
 * Date: October 24, 2025
 */

(function() {
    'use strict';

    // Configuration from CSS variables
    const config = {
        scrollThreshold: 100, // Pixels before sticky background appears
        sectionOffset: 100, // Offset for section detection
        mobileBreakpoint: 768, // Mobile menu breakpoint
        animationDuration: 300 // Milliseconds for transitions
    };

    // Cache DOM elements
    const elements = {
        stickyMenu: null,
        menuItems: null,
        sections: null,
        hamburger: null,
        dropdown: null,
        closeBtn: null,
        dropdownItems: null,
        currentSectionDisplay: null
    };

    // State management
    const state = {
        isScrolled: false,
        isMobileMenuOpen: false,
        currentSection: null,
        isMobile: false,
        scrollTimeout: null
    };

    /**
     * Initialize sticky menu functionality
     */
    function init() {
        // Cache DOM elements
        if (!cacheElements()) {
            console.warn('Sticky menu elements not found');
            return;
        }

        // Set initial state
        checkViewport();
        updateScrollState();
        updateActiveSection();

        // Bind event listeners
        bindEvents();

        // Initialize smooth scroll
        initSmoothScroll();
    }

    /**
     * Cache DOM elements for performance
     */
    function cacheElements() {
        elements.stickyMenu = document.querySelector('.sticky-menu');
        if (!elements.stickyMenu) return false;

        elements.menuItems = document.querySelectorAll('.sticky-menu-item');
        elements.sections = document.querySelectorAll('section[id]');
        elements.hamburger = document.querySelector('.hamburger-menu');
        elements.dropdown = document.querySelector('.sticky-dropdown');
        elements.closeBtn = document.querySelector('.sticky-close');
        elements.dropdownItems = document.querySelectorAll('.dropdown-item');
        elements.currentSectionDisplay = document.querySelector('.dropdown-current-section');

        return true;
    }

    /**
     * Bind all event listeners
     */
    function bindEvents() {
        // Scroll events
        window.addEventListener('scroll', handleScroll);
        window.addEventListener('scroll', throttle(updateActiveSection, 100));

        // Resize events
        window.addEventListener('resize', debounce(handleResize, 250));

        // Mobile menu events
        if (elements.hamburger) {
            elements.hamburger.addEventListener('click', toggleMobileMenu);
            elements.hamburger.addEventListener('keydown', handleHamburgerKeydown);
        }

        if (elements.closeBtn) {
            elements.closeBtn.addEventListener('click', closeMobileMenu);
        }

        // Dropdown menu item clicks
        elements.dropdownItems.forEach(item => {
            item.addEventListener('click', handleDropdownItemClick);
        });

        // Close mobile menu on outside click
        document.addEventListener('click', handleOutsideClick);

        // Close mobile menu on escape key
        document.addEventListener('keydown', handleEscapeKey);

        // Handle focus trap for mobile menu
        if (elements.dropdown) {
            elements.dropdown.addEventListener('keydown', handleFocusTrap);
        }
    }

    /**
     * Handle scroll events
     */
    function handleScroll() {
        updateScrollState();
    }

    /**
     * Update sticky menu background on scroll
     */
    function updateScrollState() {
        const scrollY = window.pageYOffset || document.documentElement.scrollTop;
        const shouldBeScrolled = scrollY > config.scrollThreshold;

        if (shouldBeScrolled !== state.isScrolled) {
            state.isScrolled = shouldBeScrolled;
            
            if (shouldBeScrolled) {
                elements.stickyMenu.classList.add('scrolled');
            } else {
                elements.stickyMenu.classList.remove('scrolled');
            }
        }
    }

    /**
     * Update active section based on scroll position
     */
    function updateActiveSection() {
        if (!elements.sections.length) return;

        const scrollPosition = window.pageYOffset + config.sectionOffset;
        let currentSection = null;

        // Find current section
        elements.sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                currentSection = sectionId;
            }
        });

        // Fallback to first section if at top of page
        if (!currentSection && window.pageYOffset < config.sectionOffset) {
            currentSection = elements.sections[0]?.getAttribute('id');
        }

        // Update if section changed
        if (currentSection !== state.currentSection) {
            state.currentSection = currentSection;
            highlightCurrentSection(currentSection);
        }
    }

    /**
     * Highlight current section in menu
     */
    function highlightCurrentSection(sectionId) {
        if (!sectionId) return;

        // Update desktop menu items
        elements.menuItems.forEach(item => {
            const href = item.getAttribute('href');
            if (href === `#${sectionId}`) {
                item.classList.add('active');
                item.setAttribute('aria-current', 'true');
            } else {
                item.classList.remove('active');
                item.removeAttribute('aria-current');
            }
        });

        // Update mobile dropdown items
        elements.dropdownItems.forEach(item => {
            const href = item.getAttribute('href');
            if (href === `#${sectionId}`) {
                item.classList.add('active');
                item.setAttribute('aria-current', 'true');
            } else {
                item.classList.remove('active');
                item.removeAttribute('aria-current');
            }
        });

        // Update current section display in mobile dropdown
        if (elements.currentSectionDisplay) {
            const sectionName = sectionId.charAt(0).toUpperCase() + sectionId.slice(1);
            elements.currentSectionDisplay.textContent = sectionName;
        }
    }

    /**
     * Toggle mobile menu open/closed
     */
    function toggleMobileMenu(e) {
        e.stopPropagation();
        
        if (state.isMobileMenuOpen) {
            closeMobileMenu();
        } else {
            openMobileMenu();
        }
    }

    /**
     * Open mobile menu
     */
    function openMobileMenu() {
        state.isMobileMenuOpen = true;
        
        // Update hamburger button
        elements.hamburger.classList.add('active');
        elements.hamburger.setAttribute('aria-expanded', 'true');
        
        // Show dropdown
        elements.dropdown.classList.add('open');
        elements.dropdown.setAttribute('aria-hidden', 'false');
        
        // Prevent body scroll
        document.body.style.overflow = 'hidden';
        
        // Focus management
        setTimeout(() => {
            const firstItem = elements.dropdown.querySelector('a, button');
            if (firstItem) firstItem.focus();
        }, config.animationDuration);
    }

    /**
     * Close mobile menu
     */
    function closeMobileMenu() {
        state.isMobileMenuOpen = false;
        
        // Update hamburger button
        elements.hamburger.classList.remove('active');
        elements.hamburger.setAttribute('aria-expanded', 'false');
        
        // Hide dropdown
        elements.dropdown.classList.remove('open');
        elements.dropdown.setAttribute('aria-hidden', 'true');
        
        // Restore body scroll
        document.body.style.overflow = '';
        
        // Return focus to hamburger
        elements.hamburger.focus();
    }

    /**
     * Handle dropdown item click
     */
    function handleDropdownItemClick(e) {
        // Close mobile menu after selection
        if (state.isMobile) {
            closeMobileMenu();
        }
        
        // Let smooth scroll handle the navigation
        // Default prevented in initSmoothScroll
    }

    /**
     * Handle clicks outside mobile menu
     */
    function handleOutsideClick(e) {
        if (!state.isMobileMenuOpen) return;
        
        const isClickInsideMenu = elements.dropdown.contains(e.target);
        const isClickOnHamburger = elements.hamburger.contains(e.target);
        
        if (!isClickInsideMenu && !isClickOnHamburger) {
            closeMobileMenu();
        }
    }

    /**
     * Handle escape key to close mobile menu
     */
    function handleEscapeKey(e) {
        if (e.key === 'Escape' && state.isMobileMenuOpen) {
            closeMobileMenu();
        }
    }

    /**
     * Handle keyboard navigation for hamburger
     */
    function handleHamburgerKeydown(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggleMobileMenu(e);
        }
    }

    /**
     * Handle focus trap in mobile menu
     */
    function handleFocusTrap(e) {
        if (!state.isMobileMenuOpen || e.key !== 'Tab') return;
        
        const focusableElements = elements.dropdown.querySelectorAll(
            'a, button, [tabindex]:not([tabindex="-1"])'
        );
        
        if (!focusableElements.length) return;
        
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];
        
        if (e.shiftKey && document.activeElement === firstElement) {
            e.preventDefault();
            lastElement.focus();
        } else if (!e.shiftKey && document.activeElement === lastElement) {
            e.preventDefault();
            firstElement.focus();
        }
    }

    /**
     * Handle viewport resize
     */
    function handleResize() {
        checkViewport();
        
        // Close mobile menu if resizing to desktop
        if (!state.isMobile && state.isMobileMenuOpen) {
            closeMobileMenu();
        }
    }

    /**
     * Check if viewport is mobile
     */
    function checkViewport() {
        state.isMobile = window.innerWidth < config.mobileBreakpoint;
    }

    /**
     * Initialize smooth scrolling for menu links
     */
    function initSmoothScroll() {
        const allMenuLinks = document.querySelectorAll('.sticky-menu-item, .dropdown-item');
        
        allMenuLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                // Only handle hash links
                if (!href || !href.startsWith('#')) return;
                
                e.preventDefault();
                
                const targetId = href.slice(1);
                const targetSection = document.getElementById(targetId);
                
                if (targetSection) {
                    smoothScrollToSection(targetSection);
                }
            });
        });
    }

    /**
     * Smooth scroll to section
     */
    function smoothScrollToSection(targetSection) {
        const targetPosition = targetSection.offsetTop - elements.stickyMenu.offsetHeight;
        const startPosition = window.pageYOffset;
        const distance = targetPosition - startPosition;
        const duration = 800; // Milliseconds
        let startTime = null;
        
        function scrollAnimation(currentTime) {
            if (startTime === null) startTime = currentTime;
            
            const timeElapsed = currentTime - startTime;
            const progress = Math.min(timeElapsed / duration, 1);
            
            // Easing function (ease-in-out)
            const easeProgress = progress < 0.5
                ? 2 * progress * progress
                : -1 + (4 - 2 * progress) * progress;
            
            window.scrollTo(0, startPosition + distance * easeProgress);
            
            if (timeElapsed < duration) {
                requestAnimationFrame(scrollAnimation);
            }
        }
        
        requestAnimationFrame(scrollAnimation);
    }

    /**
     * Throttle function for performance
     */
    function throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    /**
     * Debounce function for performance
     */
    function debounce(func, wait) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
    }

    /**
     * Public API
     */
    const StickyMenu = {
        init: init,
        openMenu: openMobileMenu,
        closeMenu: closeMobileMenu,
        getCurrentSection: () => state.currentSection,
        scrollToSection: (sectionId) => {
            const section = document.getElementById(sectionId);
            if (section) smoothScrollToSection(section);
        }
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Expose to global scope if needed
    window.StickyMenu = StickyMenu;

})();
