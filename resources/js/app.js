import './bootstrap';
import './LanguageHandler';
import MovieListHandler from './MovieListHandler';
import UserMenuHandler from './UserMenuHandler';

if (document.getElementById('movie-action') || document.getElementById('movie-list')) {
    // Global scope MovieListHandler for use in inline onclick handlers
    window.MovieListHandler = new MovieListHandler();
}

if (document.getElementById('user-menu-button')) {
    window.UserMenuHandler = new UserMenuHandler();
}
