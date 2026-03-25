const dropdown = document.getElementById('language-dropdown');
const dropdownItems = dropdown.querySelectorAll('li:not(:first-child)');

dropdown.addEventListener('click', () => {
    dropdown.classList.toggle('active-dropdown');
    dropdownItems.forEach(item => {
        item.classList.toggle('hidden');
    });

    // Close the dropdown if the user clicks outside of it
    window.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target)) {
            dropdown.classList.remove('active-dropdown');
            dropdownItems.forEach(item => {
                item.classList.add('hidden');
            });
        }
    });
});
