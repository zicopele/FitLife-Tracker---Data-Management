<?php
include 'db_connect.php'; // Your database connection

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$email = $_POST['email'];

// Insert into database
$sql = "INSERT INTO users (username, password_hash, email) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $email);

// Check for successful insertion and handle potential errors
if ($stmt->execute()) {
    // Redirect to login page
    header("Location: login.html");
    exit(); // Always call exit after header redirects to ensure the script terminates.
} else {
    echo "Error: " . $stmt->error;
    // Handle error, such as by displaying a message to the user
}

$stmt->close();
$conn->close();
?>
