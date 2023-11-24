<?php
session_start(); // Start the session at the very top of the script.

include 'db_connect.php'; // This includes your database connection script.

// Retrieve the username and password from the POST data.
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare a SQL statement to prevent SQL injection.
$stmt = $conn->prepare("SELECT id, password_hash FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    // Verify the password.
    if (password_verify($password, $user['password_hash'])) {
        // Set the user_id session variable.
        $_SESSION['user_id'] = $user['id'];

        // Redirect to the profile page or wherever you want to send the user after login.
        header("Location: profile.html");
        exit;
    } else {
        // Handle incorrect password.
        header("Location: login.html?error=incorrectpassword");
        exit;
    }
} else {
    // Handle username not found.
    header("Location: login.html?error=usernamenotfound");
    exit;
}

$stmt->close();
$conn->close();
?>
