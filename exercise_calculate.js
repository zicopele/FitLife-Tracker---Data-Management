// Assume this script is included on each exercise page with an element to display results
function calculateCalories(weight, height, age, duration, MET) {
    // The duration should be in hours; if duration is in minutes, divide by 60.
    const hours = duration / 60;
    const caloriesBurned = MET * weight * hours;
    return caloriesBurned.toFixed(2); // Rounds to two decimal places
}

// Example usage:
document.addEventListener('DOMContentLoaded', function() {
    // Fetch user data from backend
    fetch('get_user_data.php')
    .then(response => response.json())
    .then(data => {
        // Assume you get the duration from the user input or exercise duration
        const duration = 30; // Example duration in minutes
        const MET = 7; // Example MET value for jogging

        // Calculate calories burned
        const calories = calculateCalories(data.weight, data.height, data.age, duration, MET);
        
        // Display the result
        document.getElementById('calories-burned').textContent = `Calories Burned: ${calories}`;
    });
});
