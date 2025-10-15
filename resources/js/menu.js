class Menu {
    constructor(element) {
        this.element = element;
        this.mobileMenu = element.querySelector('[data-target="mobileMenu"]');
        this.mobileBtn = element.querySelector('[data-target="mobileBtn"]');
        
        this.init();
    }
    
    init() {
        if (this.mobileBtn) {
            this.mobileBtn.addEventListener('click', () => this.toggleMobile());
        }
        
        // Close mobile menu when clicking menu items
        if (this.mobileMenu) {
            const menuLinks = this.mobileMenu.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', () => this.closeMobile());
            });
        }
    }
    
    toggleMobile() {
        this.mobileMenu?.classList.toggle('hidden');
    }
    
    closeMobile() {
        this.mobileMenu?.classList.add('hidden');
    }
    
    setActive(section) {
        console.log(`Navigating to ${section}`);
    }
}

// Initialize all menu elements
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-controller="menu"]').forEach(element => {
        new Menu(element);
    });
});