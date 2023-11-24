<?php
session_start();
include 'db_connect.php'; // Include your database connection

// Check if the user is logged in by checking the session variable
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page with an error message if not logged in
    header("Location: login.html?error=notloggedin");
    exit;
}

// Retrieve user input from the form
$userId = $_SESSION['user_id'];
$firstName = isset($_POST['first_name']) ? $conn->real_escape_string($_POST['first_name']) : '';
$lastName = isset($_POST['last_name']) ? $conn->real_escape_string($_POST['last_name']) : '';
$username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : '';
$email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
$weight = isset($_POST['weight']) ? (float)$_POST['weight'] : 0;
$height = isset($_POST['height']) ? (float)$_POST['height'] : 0;
$age = isset($_POST['age']) ? (int)$_POST['age'] : 0;

// Prepare the UPDATE statement
$stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, username = ?, email = ?, weight = ?, height = ?, age = ? WHERE id = ?");
$stmt->bind_param("ssssddii", $firstName, $lastName, $username, $email, $weight, $height, $age, $userId);

// Execute the statement and check for success
if ($stmt->execute()) {
    // Redirect to the profile page with a success message
    header("Location: profile.html?success=1");
} else {
    // Handle error, e.g., redirect back with an error message
    header("Location: profile.html?error=1");
}

$stmt->close();
$conn->close();
?>
