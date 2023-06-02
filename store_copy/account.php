<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

require 'dbConnect.php';
require 'classes/userClass.php';
require 'classes/userRepositoryClass.php';

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('location: login.php');
    exit;
}

$userRepository = new UserRepository($conn);
$user = $userRepository->getUserByEmail($_SESSION['email']);
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php' ?>
    <title>Account</title>
</head>
<body>
    <header>
        
        <?php require 'navigation.php' ?>
    </header>
        <h1 id = "contactHeader">Account Details</h1>     
        <pre> 
        <b>Name:</b>    <?php echo htmlspecialchars($user->name); ?><br><br><br>
        <b>Email:</b>   <?php echo htmlspecialchars($user->email); ?><br><br><br>
        <b>Address:</b> <?php echo htmlspecialchars($user->address); ?><br><br><br>
        <b>Phone:</b>   <?php echo htmlspecialchars($user->phoneNumber); ?><br><br><br>
        </pre>

    </body>
    <footer>
    <?php require 'footer.php' ?>
    </footer>
</html>

