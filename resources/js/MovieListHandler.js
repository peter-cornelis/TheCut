import { FlashMessage } from "./FlashMessage";

class MovieListHandler {
    async toggle(event, id, action) {
        try {
            const result = await this.#post(event, id, action);
            if (!result.success) {
                new FlashMessage(result.error, 'error');
                return;
            }
            new FlashMessage(result.message, 'success');
        } catch (error) {
            console.error(`An error occurred while ${action === 'add' ? 'adding' : 'removing'} the movie:`, error);
        }
        this.#toggleButton(action === 'add', id);
    }

    async remove(event, id) {
        try {
            const result = await this.#post(event, id, 'remove');
            if (!result.success) {
                new FlashMessage(result.error, 'error');
                return;
            }
            window.location.reload();
        } catch (error) {
            console.error('An error occurred while removing the movie:', error);
        }
    }

    async #post(event, id, action) {
        event.preventDefault();
        const response = await fetch(`/movies/${id}/${action}`, {
            method: 'POST',
            headers: { 'Accept': 'application/json' },
            body: new FormData(document.getElementById(`${action}-movie-form-${id}`)),
        });
        const result = await response.json();
        if (!response.ok) {
            console.log(`An error occurred while ${action === 'add' ? 'adding' : 'removing'} the movie!`);
            return;
        }
        return result;
    }

    #toggleButton(isInList, id) {
        if( isInList ) {
            document.getElementById(`add-movie-form-${id}`)?.classList.add('hidden');
            document.getElementById(`remove-movie-form-${id}`).classList.remove('hidden');
        } else {
            document.getElementById(`add-movie-form-${id}`)?.classList.remove('hidden');
            document.getElementById(`remove-movie-form-${id}`).classList.add('hidden');
        }
    }
}
export default MovieListHandler;
