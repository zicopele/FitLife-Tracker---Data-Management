<?php

// Database connection details
$host = '127.0.0.1';
$user = 'root';
$password = 'Password';
$database = 'petpal';

// Create a connection to the database
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the connection is successful, you can perform database operations here

// For example, let's insert a health record into a hypothetical 'health_records' table
$user_id = 1; // Assuming you have a user with ID 1
$heart_rate = 80; // Replace with actual health data
$blood_pressure = '120/80'; // Replace with actual health data

$sql = "INSERT INTO health_records (user_id, heart_rate, blood_pressure) VALUES ('$user_id', '$heart_rate', '$blood_pressure')";

if ($conn->query($sql) === TRUE) {
    echo "Health record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
