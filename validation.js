// validation.js

// Function to validate form inputs
function validateForm() {
    const destination = document.getElementById('destination').value;
    const departureDate = document.getElementById('departure-date').value;
    const returnDate = document.getElementById('return-date').value;

    let valid = true;

    // Check if destination is empty
    if (destination.trim() === '') {
        alert('Destination is required.');
        valid = false;
    }

    // Check if departure date is valid
    if (new Date(departureDate) < new Date()) {
        alert('Departure date must be in the future.');
        valid = false;
    }

    // Check if return date is after departure date
    if (new Date(returnDate) <= new Date(departureDate)) {
        alert('Return date must be after the departure date.');
        valid = false;
    }

    return valid;
}

// Attach validation to form submission
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('trip-form');

    form.addEventListener('submit', (event) => {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if invalid
        }
    });
});
