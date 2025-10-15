class EpisodesToggle {
    constructor(element) {
        this.element = element;
        this.content = element.querySelector('[data-target="content"]');
        this.toggleButton = element.querySelector('[data-target="toggleButton"]');
        this.toggleText = element.querySelector('[data-target="toggleText"]');
        this.toggleIcon = element.querySelector('[data-target="toggleIcon"]');
        this.isExpanded = false;
        
        this.init();
    }
    
    init() {
        if (this.toggleButton) {
            this.toggleButton.addEventListener('click', () => this.toggle());
        }
    }
    
    toggle() {
        this.isExpanded = !this.isExpanded;
        
        if (this.isExpanded) {
            this.content?.classList.remove('hidden');
            if (this.toggleText) this.toggleText.textContent = 'Hide Episodes';
            this.toggleIcon?.classList.add('rotate-180');
        } else {
            this.content?.classList.add('hidden');
            if (this.toggleText) this.toggleText.textContent = 'Show Episodes';
            this.toggleIcon?.classList.remove('rotate-180');
        }
    }
}

// Initialize all episodes toggle elements
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-controller="episodes-toggle"]').forEach(element => {
        new EpisodesToggle(element);
    });
});