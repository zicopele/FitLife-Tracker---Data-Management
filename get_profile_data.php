<?php
// get_profile_data.php
include 'db_connect.php'; // Include your database connection script
session_start();

$userId = $_SESSION['user_id']; // Get the user ID from the session

$stmt = $conn->prepare("SELECT first_name, last_name, email, weight, height, age FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();

echo json_encode($userData); // Send the user data back as JSON

$stmt->close();
$conn->close();
?>
