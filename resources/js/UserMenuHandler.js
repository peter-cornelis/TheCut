class UserMenuHandler {
    constructor() {
        this.menuButton = document.getElementById('user-menu-button');
        this.menu = document.getElementById('user-settings');
        window.addEventListener('click', (event) => this.#handleOutsideClick(event));
    }

    toggleMenu() {
        this.menu.classList.toggle('hidden');
        this.menu.classList.toggle('grid');
    }

    makeApiKey() {
        // API key generation logic
    }

    copyApiKey() {
        // API key copy logic
    }

    #handleOutsideClick(event) {
        if (!this.menu.contains(event.target) && !this.menuButton.contains(event.target) && !this.menu.classList.contains('hidden')) {
            this.toggleMenu();
        }
    }
}

export default UserMenuHandler;
