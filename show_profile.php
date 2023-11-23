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

// Fetch data from the database
$sql = "SELECT * FROM user_profiles";
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>