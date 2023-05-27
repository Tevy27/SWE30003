<?php
// Database Connection Details
$dbHost = 'localhost:3306';
$dbUsername = 'root';
$dbPassword = '********';
$dbName = 'store';

// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
