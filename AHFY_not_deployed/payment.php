<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 require 'dbConnect.php'
?>

<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php' ?>
    <title>Sign Up</title>
</head>
<body>
    <header>
        
        <?php require 'navigation.php' ?>
        <h1 id="contactHeader">Payment</h1>
    </header>
    
    <form action="paymentSuccess.php" method="post">
    <div class="form-group">
        <label for="name">Card Holder's Name:</label><br>
        <input type="text" class="form-control" name="name" required><br>
        </div>

        <div class="form-group">
        <label for="cardNumber">Card Number:</label><br>
        <input type="text" class="form-control" name="cardNumber" required><br>
        </div>

        <div class="form-group">
        <label for="expiry">Expiry Date:</label><br>
        <input type="month" class="form-control" name="expiry" required><br>
        </div>

        <div class="form-group">
        <label for="cvv">CVV:</label><br>
        <input type="text" class="form-control" name="cvv" required><br>
        </div>

        <a href="success.php" class="btn btn-primary">Pay</a>
    </form>
</body>
</html>
