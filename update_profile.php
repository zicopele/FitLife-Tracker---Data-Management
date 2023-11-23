<?php
// Connection parameters
$server = "localhost";
$username = "root";
$password = "wissam79";
$database = "fitlifetracker";

// Create connection
$conn = new mysqli($server, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $age = $_POST["age"];

    // SQL query to insert data into the table
    $sql = "INSERT INTO user_profiles (first_name, last_name, username, email, weight, height, age)
            VALUES ('$first_name', '$last_name', '$username', '$email', $weight, $height, $age)";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>
