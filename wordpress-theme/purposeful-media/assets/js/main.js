/**
 * Main Theme JavaScript
 * Purposeful Media Promotions
 *
 * Updated: November 8, 2025
 * Consolidates header navigation and return-to-top functionality
 *
 * @package Purposeful_Media
 * @version 2.0.0
 */

(function() {
    'use strict';

    /**
     * Header Navigation Functionality
     * Handles hamburger menu, desktop dropdowns, and mobile submenus
     */
    function initHeaderNavigation() {
        // Hamburger menu toggle
        const hamburger = document.querySelector('.banner-header__hamburger');
        const mobileMenu = document.querySelector('.banner-header__mobile-menu');

        if (hamburger && mobileMenu) {
            hamburger.addEventListener('click', function() {
                const isExpanded = hamburger.getAttribute('aria-expanded') === 'true';
                hamburger.setAttribute('aria-expanded', !isExpanded);
                hamburger.classList.toggle('banner-header__hamburger--active');
                mobileMenu.classList.toggle('banner-header__mobile-menu--active');
            });
        }

        // Desktop dropdown click functionality
        document.querySelectorAll('.banner-header__menu-item').forEach(menuItem => {
            const menuLink = menuItem.querySelector('.banner-header__menu-link:not([href])');
            const dropdown = menuItem.querySelector('.banner-header__dropdown');

            if (menuLink && dropdown) {
                menuLink.style.cursor = 'pointer';

                // Toggle dropdown on click
                menuLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Check if this dropdown is currently open
                    const isOpen = dropdown.style.display === 'block';

                    // Close all other dropdowns and remove active state from all menu links
                    document.querySelectorAll('.banner-header__dropdown').forEach(otherDropdown => {
                        otherDropdown.style.display = 'none';
                    });
                    document.querySelectorAll('.banner-header__menu-link').forEach(link => {
                        link.classList.remove('banner-header__menu-link--active');
                    });

                    // Toggle current dropdown and active state
                    if (!isOpen) {
                        dropdown.style.display = 'block';
                        menuLink.classList.add('banner-header__menu-link--active');
                    }
                });
            }
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.banner-header__menu-item')) {
                document.querySelectorAll('.banner-header__dropdown').forEach(dropdown => {
                    dropdown.style.display = 'none';
                });
                document.querySelectorAll('.banner-header__menu-link').forEach(link => {
                    link.classList.remove('banner-header__menu-link--active');
                });
            }
        });

        // Prevent dropdown from closing when clicking inside
        document.querySelectorAll('.banner-header__dropdown').forEach(dropdown => {
            dropdown.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });

        // Mobile submenu toggles
        document.querySelectorAll('.mobile-menu__trigger').forEach(trigger => {
            trigger.addEventListener('click', function() {
                const submenu = this.parentElement;
                submenu.classList.toggle('mobile-menu__submenu--expanded');
            });
        });

        // Active state based on current page
        const currentPath = window.location.pathname;

        document.querySelectorAll('[data-page]').forEach(item => {
            const page = item.getAttribute('data-page');
            if (currentPath === '/' && page === 'home') {
                item.classList.add('active');
                item.closest('.banner-header__menu-link')?.classList.add('banner-header__menu-link--active');
                item.closest('.mobile-menu__link')?.classList.add('mobile-menu__link--active');
            } else if (currentPath.includes('/' + page)) {
                item.classList.add('active');
                item.closest('.banner-header__menu-link')?.classList.add('banner-header__menu-link--active');
                item.closest('.mobile-menu__link')?.classList.add('mobile-menu__link--active');
            }
        });

        // Handle window resize - close mobile menu when expanding to desktop
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                // Close mobile menu if viewport is desktop width (1150px+)
                if (window.innerWidth >= 1150) {
                    if (mobileMenu) {
                        mobileMenu.classList.remove('banner-header__mobile-menu--active');
                    }
                    if (hamburger) {
                        hamburger.classList.remove('banner-header__hamburger--active');
                        hamburger.setAttribute('aria-expanded', 'false');
                    }
                    // Close any open submenus
                    document.querySelectorAll('.mobile-menu__submenu').forEach(submenu => {
                        submenu.classList.remove('mobile-menu__submenu--expanded');
                    });
                }
            }, 250); // Debounce for smooth performance
        });
    }

    /**
     * Return to Top Button Functionality
     * Shows button after scrolling 300px, smooth scrolls back to top
     */
    function initReturnButton() {
        const returnButton = document.getElementById('returnButton');

        if (!returnButton) return;

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

    /**
     * Initialize all functionality when DOM is ready
     */
    document.addEventListener('DOMContentLoaded', function() {
        initHeaderNavigation();
        initReturnButton();
    });

})();
