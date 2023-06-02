<?php
// Start the session
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

// Check if the user is logged in, if not redirect to login page
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: login.php');
    exit;
}

require 'dbConnect.php';
require 'classes/userClass.php';
require 'classes/orderClass.php';

// Fetch user data
$user = User::fetchUserDetails($conn, $_SESSION['email']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // You should add server-side form validation here

    // Create an order and place it
    $order = new Order();
    $order->placeOrder($_POST['name'], $_POST['email'], $_POST['address'], $_POST['phoneNumber']);
} 
?>

<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php' ?>
    <title>Check Out</title>
</head>
<body>
    <header>
        <?php require 'navigation.php' ?>
    </header>
    <h1 id = "contactHeader">Check Out</h1><br><br>
    <p id = "infoVerify">Verify your information before placing order</p>

    <!-- Display checkout form -->

    <form action="checkOut.php" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($user->name); ?>">
        </div>
            
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text"  class="form-control"  name="email" value="<?php echo htmlspecialchars($user->email); ?>">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text"  class="form-control"  name="address" value="<?php echo htmlspecialchars($user->address); ?>">
        </div>

        <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input type="text"  class="form-control"  name="phoneNumber" value="<?php echo htmlspecialchars($user->phoneNumber); ?>">
        </div>

        <input type="submit" value="Place Order">
    </form> 
</body>
<footer>
    <?php require 'footer.php'?>
</footer>
</html>
