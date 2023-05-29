<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// signup_process.php
require 'dbConnect.php';

// Get POST data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}
if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{6,}$/", $password)) {
    echo "Invalid password";

    exit;
}

// Prepare SQL statement
$sql = "INSERT INTO Customers (name, email, password ) VALUES (?, ?, ?)";

// Use a prepared statement to protect against SQL injection
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo "Error: " . $conn->error;
    exit;
}

$stmt->bind_param("sss", $name, $email, $password);

// Execute the statement
if ($stmt->execute()) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    // echo "User successfully registered";
    // $_SESSION['signup_success'] = "You have successfully signed up!";
    header("location: index.php"); // Redirect to the next page
} else {
    echo "Error: " . $stmt->error;
}


// Close the statement and connection
$stmt->close();
$conn->close();
?>
