class CharacterToggle {
    constructor(element) {
        this.element = element;
        this.overlay = element.querySelector('[data-target="overlay"]');
        this.image = element.querySelector('[data-target="image"]');
        this.container = element.querySelector('[data-target="container"]');
        
        this.init();
    }
    
    init() {
        if (this.container && this.overlay) {
            this.container.addEventListener('mouseenter', () => {
                this.showDetails();
            });
            this.container.addEventListener('mouseleave', () => {
                this.hideDetails();
            });
        }
    }
    
    showDetails() {
        if (this.overlay) {
            this.overlay.classList.remove('opacity-0', 'translate-y-2');
            this.overlay.classList.add('opacity-100', 'translate-y-0');
        }
        if (this.image) {
            this.image.classList.add('scale-110');
        }
    }
    
    hideDetails() {
        if (this.overlay) {
            this.overlay.classList.remove('opacity-100', 'translate-y-0');
            this.overlay.classList.add('opacity-0', 'translate-y-2');
        }
        if (this.image) {
            this.image.classList.remove('scale-110');
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll('[data-controller="character-toggle"]');
    elements.forEach(element => {
        new CharacterToggle(element);
    });
});