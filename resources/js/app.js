import './bootstrap';
import './LanguageHandler';
import MovieListHandler from './MovieListHandler';

if (document.getElementById('movie-action') || document.getElementById('movie-list')) {
    // Global scope MovieListHandler for use in inline onclick handlers
    window.MovieListHandler = new MovieListHandler();
}
