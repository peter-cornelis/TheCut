class FlashMessage {
    constructor(message, type) {
        this.flashMessage = document.getElementById('flash-message');
        this.message = message;
        this.color = type === 'success' ? 'bg-emerald-700' : 'bg-rose-700';
        this.#init();
    }

    #init() {
        this.flashMessage.classList.add(this.color);
        this.flashMessage.classList.remove('opacity-0');
        this.flashMessage.textContent = this.message;
        setTimeout(() => this.#reset(), 4000);
    }

    #reset() {
        this.flashMessage.textContent = '';
        this.flashMessage.classList.remove(this.color);
        this.flashMessage.classList.add('opacity-0');
    }
}
export {FlashMessage};
