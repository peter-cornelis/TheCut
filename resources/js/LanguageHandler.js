class LanguageHandler {
    constructor() {
        this.dropdown = document.getElementById('language-dropdown');
        this.dropdownItems = this.dropdown.querySelectorAll('li:not(:first-child)');

        this.dropdown.addEventListener('click', () => this.#toggle());
        window.addEventListener('click', (event) => this.#handleOutsideClick(event));
    }

    #toggle() {
        this.dropdown.classList.toggle('active-dropdown');
        this.dropdownItems.forEach(item => item.classList.toggle('hidden'));
    }

    #handleOutsideClick(event) {
        if (!this.dropdown.contains(event.target) && this.dropdown.classList.contains('active-dropdown')) {
            this.#toggle();
        }
    }
} export default new LanguageHandler();
