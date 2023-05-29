<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 require 'dbConnect.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Protect against SQL injection
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Fetch the user from the database
$sql = "SELECT * FROM Customers WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();
$Customers = $result->fetch_assoc();

// Check if user exists
if ($Customers) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    header("location: index.php");
} else {
    // echo "Incorrect email or password.";
    header('location: login.php?login_error=true');
}
$conn->close();
?>
