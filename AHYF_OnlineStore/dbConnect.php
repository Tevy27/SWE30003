<?php
// Database Connection Details
$dbHost = 'localhost';
$dbUsername = 'id20850068_admin';
$dbPassword = 'Crutch%31Sword';
$dbName = 'id20850068_swe30003';

// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
