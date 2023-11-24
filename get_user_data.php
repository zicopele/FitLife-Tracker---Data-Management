<?php
session_start();
include 'db_connect.php'; // Ensure this file has the correct database connection setup

header('Content-Type: application/json'); // Specify the correct content type for JSON

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id']; // Get the user ID from the session

    // Prepare a SQL statement to get user data
    $stmt = $conn->prepare("SELECT weight, height, age FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $userData = $result->fetch_assoc(); // Fetch the data as an associative array
        echo json_encode($userData); // Encode the data as JSON and output it
    } else {
        echo json_encode(['error' => 'User not found.']); // Handle the case where user data is not found
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'Not logged in.']); // Handle the case where the user is not logged in
}

$conn->close();
?>
