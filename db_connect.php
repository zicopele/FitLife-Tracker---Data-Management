<?php
$servername = "localhost"; // or your server's host name
$username = "root"; // your database username
$password = "user"; // your database password
$dbname = "fitness_tracker"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
