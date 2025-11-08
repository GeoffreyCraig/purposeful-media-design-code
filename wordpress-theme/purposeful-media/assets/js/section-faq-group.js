/**
 * Section/FAQ Group Component JavaScript
 * Purposeful Media Design System
 * Version: 1.0
 * Updated: October 2025
 * 
 * Purpose: Handles FAQ accordion interactions with smooth animations
 * Features: Accordion behavior, keyboard navigation, ARIA support
 */

(function() {
    'use strict';
    
    /**
     * Initialize FAQ Group functionality
     */
    function initFAQGroup() {
        // Get all FAQ sections on the page
        const faqSections = document.querySelectorAll('.section-faq-group');
        
        if (faqSections.length === 0) {
            console.log('No FAQ sections found on page');
            return;
        }
        
        console.log(`Initializing ${faqSections.length} FAQ section(s)`);
        
        // Initialize each FAQ section
        faqSections.forEach((section, sectionIndex) => {
            initializeFAQSection(section, sectionIndex);
        });
    }
    
    /**
     * Initialize a single FAQ section
     * @param {HTMLElement} section - The FAQ section element
     * @param {number} sectionIndex - Index of the section
     */
    function initializeFAQSection(section, sectionIndex) {
        const faqItems = section.querySelectorAll('.card-faq');
        
        if (faqItems.length === 0) {
            console.warn(`No FAQ items found in section ${sectionIndex}`);
            return;
        }
        
        console.log(`Section ${sectionIndex}: Found ${faqItems.length} FAQ items`);
        
        // Initialize each FAQ item
        faqItems.forEach((item, itemIndex) => {
            initializeFAQItem(item, section, sectionIndex, itemIndex);
        });
        
        // Calculate and set initial max-heights for smooth animations
        calculateMaxHeights(section);
        
        // Add resize handler for responsive behavior
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                calculateMaxHeights(section);
                updateBreakpointClass(section);
            }, 250);
        });
        
        // Set initial breakpoint class
        updateBreakpointClass(section);
    }
    
    /**
     * Initialize a single FAQ item
     * @param {HTMLElement} item - The FAQ item element
     * @param {HTMLElement} section - Parent section element
     * @param {number} sectionIndex - Index of the section
     * @param {number} itemIndex - Index of the item
     */
    function initializeFAQItem(item, section, sectionIndex, itemIndex) {
        const question = item.querySelector('.card-faq__question');
        const answer = item.querySelector('.card-faq__answer');
        const arrow = item.querySelector('.card-faq__arrow');
        
        if (!question || !answer) {
            console.warn(`Incomplete FAQ item at section ${sectionIndex}, item ${itemIndex}`);
            return;
        }
        
        // Set unique IDs for ARIA
        const answerId = `faq-answer-${sectionIndex}-${itemIndex}`;
        answer.id = answerId;
        question.setAttribute('aria-controls', answerId);
        
        // Toggle function
        function toggleFAQ(event) {
            const isOpen = item.classList.contains('card-faq--open');
            
            // Get accordion behavior setting (true = only one open at a time)
            const isAccordion = section.dataset.accordion !== 'false';
            
            // Close other items if accordion mode
            if (isAccordion && !isOpen) {
                const otherItems = section.querySelectorAll('.card-faq');
                otherItems.forEach(otherItem => {
                    if (otherItem !== item && otherItem.classList.contains('card-faq--open')) {
                        closeFAQItem(otherItem);
                    }
                });
            }
            
            // Toggle current item
            if (isOpen) {
                closeFAQItem(item);
            } else {
                openFAQItem(item, section);
            }
            
            // Log interaction
            logInteraction(item, isOpen ? 'closed' : 'opened');
        }
        
        // Click handler
        question.addEventListener('click', toggleFAQ);
        
        // Keyboard handler
        question.addEventListener('keydown', function(event) {
            const key = event.key;
            
            // Toggle on Enter or Space
            if (key === 'Enter' || key === ' ') {
                event.preventDefault();
                toggleFAQ(event);
            }
            
            // Arrow navigation
            if (key === 'ArrowDown' || key === 'ArrowUp') {
                event.preventDefault();
                navigateFAQItems(item, section, key === 'ArrowDown');
            }
        });
        
        // Ensure initial state is set correctly
        if (item.classList.contains('card-faq--open')) {
            openFAQItem(item, section, false);
        } else {
            closeFAQItem(item, false);
        }
    }
    
    /**
     * Open an FAQ item
     * @param {HTMLElement} item - The FAQ item to open
     * @param {HTMLElement} section - Parent section element
     * @param {boolean} animate - Whether to animate the opening
     */
    function openFAQItem(item, section, animate = true) {
        const question = item.querySelector('.card-faq__question');
        const answer = item.querySelector('.card-faq__answer');
        const answerContent = answer.querySelector('.card-faq__answer-content');
        
        item.classList.add('card-faq--open');
        question.setAttribute('aria-expanded', 'true');
        answer.setAttribute('aria-hidden', 'false');
        
        // Calculate and set max-height for animation
        if (answerContent) {
            const contentHeight = answerContent.scrollHeight + 20; // Add padding
            answer.style.maxHeight = animate ? `${contentHeight}px` : `${contentHeight}px`;
            
            if (!animate) {
                answer.style.transition = 'none';
                setTimeout(() => {
                    answer.style.transition = '';
                }, 50);
            }
        }
    }
    
    /**
     * Close an FAQ item
     * @param {HTMLElement} item - The FAQ item to close
     * @param {boolean} animate - Whether to animate the closing
     */
    function closeFAQItem(item, animate = true) {
        const question = item.querySelector('.card-faq__question');
        const answer = item.querySelector('.card-faq__answer');
        
        item.classList.remove('card-faq--open');
        question.setAttribute('aria-expanded', 'false');
        answer.setAttribute('aria-hidden', 'true');
        
        answer.style.maxHeight = '0';
        
        if (!animate) {
            answer.style.transition = 'none';
            setTimeout(() => {
                answer.style.transition = '';
            }, 50);
        }
    }
    
    /**
     * Navigate between FAQ items using arrow keys
     * @param {HTMLElement} currentItem - Current FAQ item
     * @param {HTMLElement} section - Parent section
     * @param {boolean} isDown - True for down arrow, false for up
     */
    function navigateFAQItems(currentItem, section, isDown) {
        const items = Array.from(section.querySelectorAll('.card-faq'));
        const currentIndex = items.indexOf(currentItem);
        
        let nextIndex;
        if (isDown) {
            nextIndex = currentIndex < items.length - 1 ? currentIndex + 1 : 0;
        } else {
            nextIndex = currentIndex > 0 ? currentIndex - 1 : items.length - 1;
        }
        
        const nextQuestion = items[nextIndex].querySelector('.card-faq__question');
        if (nextQuestion) {
            nextQuestion.focus();
        }
    }
    
    /**
     * Calculate max heights for all FAQ answers in a section
     * @param {HTMLElement} section - The FAQ section
     */
    function calculateMaxHeights(section) {
        const faqItems = section.querySelectorAll('.card-faq');
        
        faqItems.forEach(item => {
            const answer = item.querySelector('.card-faq__answer');
            const answerContent = item.querySelector('.card-faq__answer-content');
            
            if (answer && answerContent) {
                // Temporarily show to calculate height
                const isOpen = item.classList.contains('card-faq--open');
                const originalMaxHeight = answer.style.maxHeight;
                const originalTransition = answer.style.transition;
                
                answer.style.transition = 'none';
                answer.style.maxHeight = 'none';
                
                const contentHeight = answerContent.scrollHeight + 20;
                
                // Restore state
                if (isOpen) {
                    answer.style.maxHeight = `${contentHeight}px`;
                } else {
                    answer.style.maxHeight = '0';
                }
                
                // Restore transition after a frame
                requestAnimationFrame(() => {
                    answer.style.transition = originalTransition;
                });
            }
        });
    }
    
    /**
     * Update breakpoint class based on viewport width
     * @param {HTMLElement} section - The FAQ section
     */
    function updateBreakpointClass(section) {
        const width = window.innerWidth;
        
        // Remove existing breakpoint classes
        section.classList.remove(
            'section-faq-group--mobile',
            'section-faq-group--tablet',
            'section-faq-group--desktop',
            'section-faq-group--desktop-plus'
        );
        
        // Add appropriate breakpoint class
        if (width >= 1920) {
            section.classList.add('section-faq-group--desktop-plus');
        } else if (width >= 1150) {
            section.classList.add('section-faq-group--desktop');
        } else if (width >= 768) {
            section.classList.add('section-faq-group--tablet');
        } else {
            section.classList.add('section-faq-group--mobile');
        }
    }
    
    /**
     * Log FAQ interaction for analytics
     * @param {HTMLElement} item - The FAQ item
     * @param {string} action - The action performed
     */
    function logInteraction(item, action) {
        const questionText = item.querySelector('.card-faq__question-text');
        if (questionText) {
            const text = questionText.textContent.trim();
            console.log(`FAQ ${action}: "${text.substring(0, 50)}..."`);
            
            // Trigger custom event for analytics
            const event = new CustomEvent('faqInteraction', {
                detail: {
                    action: action,
                    question: text
                }
            });
            document.dispatchEvent(event);
        }
    }
    
    /**
     * Public API
     */
    window.FAQGroup = {
        init: initFAQGroup,
        open: openFAQItem,
        close: closeFAQItem,
        calculateHeights: calculateMaxHeights
    };
    
    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFAQGroup);
    } else {
        initFAQGroup();
    }
    
    // Log component load
    console.log('Section/FAQ Group component loaded successfully');
    
})();