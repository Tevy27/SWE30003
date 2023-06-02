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

// Fetch the user from the Managers database
$sql = "SELECT * FROM Managers WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();
$manager = $result->fetch_assoc();

if ($manager) {
    // Manager found
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['role'] = 'manager'; // set role to manager
    header("location: managerPortal.php"); // Redirect to manager portal
} else {
    // Manager not found, check in Customers database
    $sql = "SELECT * FROM Accounts WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $customer = $result->fetch_assoc();

    if ($customer) {
        // Customer found
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['role'] = 'customer'; // set role to customer
        header("location: index.php"); // Redirect to customer portal
    } else {
        // Neither customer nor manager found
        header('location: login.php?login_error=true');
    }
}
$conn->close();
?>

