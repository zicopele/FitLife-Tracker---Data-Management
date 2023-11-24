// profile.js
document.addEventListener('DOMContentLoaded', function() {
    // This code runs after the page is fully loaded
    fetch('get_profile_data.php') // Make a request to the PHP script
    .then(response => response.json()) // Parse the JSON returned by the PHP script
    .then(data => {
        // Assuming 'data' is an object with the user's profile information:
        document.getElementById('first-name').value = data.first_name; // Set the value of the 'first-name' input to the first name
        document.getElementById('last-name').value = data.last_name; // Do the same for last name
        // Repeat for other fields...
    });
});
