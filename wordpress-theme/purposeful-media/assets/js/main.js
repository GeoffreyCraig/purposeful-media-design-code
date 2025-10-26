/**
 * Purposeful Media Main JavaScript
 * 
 * Handles:
 * - Desktop dropdown navigation
 * - Mobile/tablet accordion navigation  
 * - Footer mobile navigation
 * - Return to top button
 * - Icon display initialization
 * 
 * @package Purposeful_Media
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ Purposeful Media theme initializing...');
    
    /* ==========================================
       ICON DISPLAY INITIALIZATION
       ========================================== */
    const icons = document.querySelectorAll('.icon-display');
    icons.forEach(icon => {
        const iconName = icon.getAttribute('data-icon');
        const color = icon.getAttribute('data-color');
        
        if (iconName && color) {
            icon.classList.add(`icon--${iconName}-${color}`);
            console.log(`✅ Applied icon class: icon--${iconName}-${color}`);
        }
    });
    
    /* ==========================================
       HEADER DESKTOP DROPDOWN FUNCTIONALITY
       ========================================== */
    const menuDropdowns = document.querySelectorAll('.desktop-nav .menu-item-dropdown');
    
    menuDropdowns.forEach(item => {
        const menuText = item.querySelector('.menu-text');
        const dropdown = item.querySelector('.dropdown-container');
        
        if (menuText && dropdown) {
            menuText.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Close all other dropdowns first
                document.querySelectorAll('.dropdown-container').forEach(otherDropdown => {
                    if (otherDropdown !== dropdown) {
                        otherDropdown.classList.remove('open');
                    }
                });
                
                // Toggle current dropdown
                dropdown.classList.toggle('open');
            });
        }
    });
    
    // Click outside to close all dropdowns
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.menu-item-dropdown')) {
            document.querySelectorAll('.dropdown-container').forEach(dropdown => {
                dropdown.classList.remove('open');
            });
        }
    });
    
    // Prevent dropdown from closing when clicking inside
    document.querySelectorAll('.dropdown-container').forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });
    
    /* ==========================================
       HEADER MOBILE MENU TOGGLE
       ========================================== */
    const hamburgerButton = document.querySelector('.hamburger-button');
    const mobileAccordion = document.querySelector('.mobile-accordion');
    const mainMenu = document.querySelector('.main-menu');
    
    if (hamburgerButton && mobileAccordion) {
        hamburgerButton.addEventListener('click', function() {
            const isOpen = mobileAccordion.classList.contains('active');
            mobileAccordion.classList.toggle('active', !isOpen);
            if (mainMenu) {
                mainMenu.classList.toggle('menu-open', !isOpen);
            }
            hamburgerButton.setAttribute('aria-expanded', !isOpen);
        });
    }
    
    /* ==========================================
       MOBILE ACCORDION SCROLL BEHAVIOR
       ========================================== */
    function handleMobileAccordionScroll() {
        // Only run on mobile breakpoint
        if (window.innerWidth < 768 && mobileAccordion) {
            const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
            const headerHeight = 125; // Header height in pixels
            
            // Calculate new top position (moves up with scroll)
            const newTop = Math.max(0, headerHeight - scrollPosition);
            
            // Update accordion position
            mobileAccordion.style.top = newTop + 'px';
        }
    }
    
    // Add scroll listener for mobile accordion
    window.addEventListener('scroll', handleMobileAccordionScroll);
    
    // Initial check
    handleMobileAccordionScroll();
    
    /* ==========================================
       HEADER MOBILE ACCORDION FUNCTIONALITY
       ========================================== */
    document.querySelectorAll('.accordion-header[data-accordion]').forEach(header => {
        header.addEventListener('click', function() {
            const accordionId = this.dataset.accordion;
            const content = document.getElementById(accordionId + '-content');
            if (content) {
                content.classList.toggle('active');
            }
        });
    });
    
    /* ==========================================
       FOOTER MOBILE NAVIGATION
       ========================================== */
    class MobileFooterNav {
        constructor() {
            this.navItems = document.querySelectorAll('.footer-mobile__nav-item[data-dropdown]');
            this.activeDropdown = null;
            this.init();
        }
        
        init() {
            this.navItems.forEach(item => {
                item.addEventListener('click', (e) => this.toggleDropdown(e));
            });
            
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.footer-mobile__nav')) {
                    this.closeAllDropdowns();
                }
            });
            
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.closeAllDropdowns();
                }
            });
        }
        
        toggleDropdown(event) {
            event.stopPropagation();
            const item = event.currentTarget;
            const dropdownId = item.getAttribute('data-dropdown');
            const dropdown = document.getElementById(`dropdown-${dropdownId}`);
            
            if (!dropdown) return;
            
            if (dropdown.classList.contains('active')) {
                this.closeDropdown(dropdown);
                item.classList.remove('active');
                item.setAttribute('aria-expanded', 'false');
            } else {
                this.closeAllDropdowns();
                this.openDropdown(dropdown);
                item.classList.add('active');
                item.setAttribute('aria-expanded', 'true');
                this.activeDropdown = dropdown;
            }
        }
        
        openDropdown(dropdown) {
            dropdown.classList.add('active');
            dropdown.setAttribute('aria-hidden', 'false');
            
            const firstLink = dropdown.querySelector('.dropdown-mobile__link:not(.dropdown-mobile__link--disabled)');
            if (firstLink) {
                firstLink.focus();
            }
        }
        
        closeDropdown(dropdown) {
            dropdown.classList.remove('active');
            dropdown.setAttribute('aria-hidden', 'true');
        }
        
        closeAllDropdowns() {
            document.querySelectorAll('.dropdown-mobile').forEach(dropdown => {
                this.closeDropdown(dropdown);
            });
            
            document.querySelectorAll('.footer-mobile__nav-item').forEach(item => {
                item.classList.remove('active');
                item.setAttribute('aria-expanded', 'false');
            });
            
            this.activeDropdown = null;
        }
    }
    
    // Initialize mobile footer navigation
    if (document.querySelector('.footer-mobile__nav')) {
        new MobileFooterNav();
    }
    
    /* ==========================================
       RETURN TO TOP BUTTON FUNCTIONALITY
       ========================================== */
    const returnButton = document.getElementById('returnButton');
    
    if (returnButton) {
        // Show/hide button based on scroll position
        function handleScroll() {
            const scrollPosition = window.pageYOffset;
            const showThreshold = 300; // Show button after scrolling 300px
            
            if (scrollPosition > showThreshold) {
                returnButton.classList.add('visible');
            } else {
                returnButton.classList.remove('visible');
            }
        }
        
        // Smooth scroll to top
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        
        // Event listeners
        window.addEventListener('scroll', handleScroll);
        returnButton.addEventListener('click', scrollToTop);
        
        // Initial check
        handleScroll();
    }
    
    console.log('✅ Purposeful Media theme initialized successfully');
});

