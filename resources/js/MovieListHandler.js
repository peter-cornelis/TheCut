import { FlashMessage } from "./FlashMessage";

class MovieListHandler {
    constructor(isInList) {
        this.#toggleButton(isInList);
    }

    async toggle(event, id, action) {
        event.preventDefault();

        const response = await fetch(`/movies/${id}/${action}`, {
            method: 'POST',
            headers: { 'Accept': 'application/json' },
            body: new FormData(document.getElementById(`${action}-movie-form`)),
        });
        const result = await response.json();
        if (!response.ok) {
            console.log('An error occurred while adding the movie!');
            return;
        }
        if (!result.success) {
            new FlashMessage(result.error, 'error');
            return;
        }
        new FlashMessage(result.message, 'success');
        this.#toggleButton(action === 'add');
    }

    #toggleButton(isInList) {
        if( isInList ) {
            document.getElementById('add-movie-form').classList.add('hidden');
            document.getElementById('remove-movie-form').classList.remove('hidden');
        } else {
            document.getElementById('add-movie-form').classList.remove('hidden');
            document.getElementById('remove-movie-form').classList.add('hidden');
        }
    }
}
export default MovieListHandler;
