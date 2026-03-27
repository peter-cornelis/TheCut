import './bootstrap';
import './LanguageHandler';
import MovieListHandler from './MovieListHandler';

const movieAction = document.getElementById('movie-action');
if (movieAction) {
    // Gobal scope MovieListHandler for use in inline onclick handlers
    window.MovieListHandler = new MovieListHandler(movieAction.dataset.inList === 'true');
}
