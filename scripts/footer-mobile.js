/* ============================================
   MOBILE FOOTER NAVIGATION
   Purposeful Media Design System
   Version: 1.0
   Last Updated: 2025-09-25
   ============================================ */

class MobileFooterNav {
  constructor() {
    this.navItems = document.querySelectorAll('.footer-mobile__nav-item[data-dropdown]');
    this.activeDropdown = null;
    
    this.init();
  }
  
  init() {
    // Add click handlers to navigation items
    this.navItems.forEach(item => {
      item.addEventListener('click', (e) => this.toggleDropdown(e));
    });
    
    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.footer-mobile__nav')) {
        this.closeAllDropdowns();
      }
    });
    
    // Handle escape key
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
    
    // Focus first link in dropdown for accessibility
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

// Initialize when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    new MobileFooterNav();
  });
} else {
  // DOM is already ready
  new MobileFooterNav();
}