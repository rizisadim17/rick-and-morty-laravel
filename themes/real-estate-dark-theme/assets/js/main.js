console.log('Main.js loaded!');

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded!');
    
    // Get elements
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const navigation = document.querySelector('.main-navigation');
    const body = document.body;
    
    // Log what we found
    console.log('Menu Toggle:', menuToggle);
    console.log('Navigation:', navigation);
    
    // Check if elements exist
    if (!menuToggle) {
        console.error('Mobile menu toggle button not found!');
        return;
    }
    
    if (!navigation) {
        console.error('Main navigation not found!');
        return;
    }
    
    console.log('Both elements found! Setting up click listener...');
    
    // Toggle menu function
    function toggleMenu() {
        const isOpen = navigation.classList.contains('menu-open');
        
        if (isOpen) {
            // Close menu
            navigation.classList.remove('menu-open');
            body.classList.remove('menu-open');
            menuToggle.setAttribute('aria-expanded', 'false');
            console.log('Menu CLOSED');
        } else {
            // Open menu
            navigation.classList.add('menu-open');
            body.classList.add('menu-open');
            menuToggle.setAttribute('aria-expanded', 'true');
            console.log('Menu OPENED');
        }
    }
    
    // Click event on hamburger
    menuToggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        console.log('Hamburger clicked!');
        toggleMenu();
    });
    
    console.log('Click listener set up successfully!');
    
    // Close menu when clicking outside (on overlay)
    document.addEventListener('click', function(e) {
        const isClickInsideNav = navigation.contains(e.target);
        const isClickOnToggle = menuToggle.contains(e.target);
        const isMenuOpen = navigation.classList.contains('menu-open');
        
        if (isMenuOpen && !isClickInsideNav && !isClickOnToggle) {
            console.log('Clicked outside - closing menu');
            navigation.classList.remove('menu-open');
            body.classList.remove('menu-open');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });
    
    // Close menu when clicking menu links
    const menuLinks = navigation.querySelectorAll('a');
    console.log('Found', menuLinks.length, 'menu links');
    
    menuLinks.forEach(function(link) {
        link.addEventListener('click', function() {
            console.log('Menu link clicked - closing menu');
            navigation.classList.remove('menu-open');
            body.classList.remove('menu-open');
            menuToggle.setAttribute('aria-expanded', 'false');
        });
    });
    
    // Close menu on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && navigation.classList.contains('menu-open')) {
            console.log('ESC pressed - closing menu');
            navigation.classList.remove('menu-open');
            body.classList.remove('menu-open');
            menuToggle.setAttribute('aria-expanded', 'false');
        }
    });
    
    // Active menu highlighting
    const currentUrl = window.location.pathname;
    const menuLinksAll = document.querySelectorAll('.nav-menu a, .page_item a');
    
    menuLinksAll.forEach(function(link) {
        const linkUrl = new URL(link.href).pathname;
        
        if (currentUrl === linkUrl || (currentUrl === '/' && linkUrl === '/')) {
            link.classList.add('active-link');
        }
    });
    
    console.log('All event listeners set up!');
});