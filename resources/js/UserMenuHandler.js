import { FlashMessage } from "./FlashMessage";

class UserMenuHandler {
    constructor() {
        this.menuButton = document.getElementById('user-menu-button');
        this.menu = document.getElementById('user-settings');
        this.form = null;
        window.addEventListener('click', (event) => this.#handleOutsideClick(event));
    }

    toggleMenu() {
        this.menu.classList.toggle('hidden');
        this.menu.classList.toggle('grid');
    }

    async generateApiKey(event) {
        this.form = document.getElementById('generate-token-form');
        try {
            const result = await this.#post(event, '/api-keys');

            new FlashMessage(result.message, 'success');
            navigator.clipboard.writeText(result.token);

        } catch (error) {
            console.error('An error occurred while generating the API key:', error);
        }

    }

    async #post(event, path) {
        event.preventDefault();
        const response = await fetch(path, {
            method: 'POST',
            headers: { 'Accept': 'application/json' },
            body: new FormData(this.form),
        });
        const result = await response.json();
        if (!response.ok) {
            console.error(`An error occurred while posting to ${path}!`);
            return;
        }
        return result;
    }

    #handleOutsideClick(event) {
        if (!this.menu.contains(event.target) && !this.menuButton.contains(event.target) && !this.menu.classList.contains('hidden')) {
            this.toggleMenu();
        }
    }
}

export default UserMenuHandler;
