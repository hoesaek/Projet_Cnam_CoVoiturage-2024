// profileDropdown.js

document.querySelector('.profile-icon').addEventListener('click', function() {
    const dropdown = document.querySelector('.profile-dropdown');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
});

document.addEventListener('click', function(event) {
    const profileMenu = document.querySelector('.profile-menu');
    if (!profileMenu.contains(event.target)) {
        document.querySelector('.profile-dropdown').style.display = 'none';
    }
});
