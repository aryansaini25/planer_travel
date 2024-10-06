// search.js

// Function to filter items based on user input
function filterItems() {
    const searchInput = document.getElementById('search-input').value.toLowerCase();
    const items = document.querySelectorAll('.item'); // Assuming items have the class "item"

    items.forEach(item => {
        const title = item.querySelector('.item-title').textContent.toLowerCase();
        if (title.includes(searchInput)) {
            item.style.display = ''; // Show the item
        } else {
            item.style.display = 'none'; // Hide the item
        }
    });
}

// Event listener for search input
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search-input');

    searchInput.addEventListener('input', filterItems);
});
