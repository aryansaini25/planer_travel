// main.js

// Function to handle form submission
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('trip-form');

    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent default form submission
        // Perform additional actions before submission if needed
        alert('Trip plan submitted successfully!'); // Example action
        form.submit(); // Submit the form if needed
    });
});
