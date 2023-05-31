<?php
// Start the session
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
require 'dbConnect.php';
   
session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    // Redirect the user to login page
    header('location: login.php');
    exit;
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
    <?php
    // Fetch user data
        $stmt = $conn->prepare("SELECT name, email, address, phoneNumber
        FROM accounts WHERE email = ?");
        $stmt->bind_param("s", $_SESSION['email']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $Accounts = $result->fetch_assoc();
        } else {
            die("Couldn't get user data");
        } 
        

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // You should add server-side form validation here
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber'];
        

        
        // Process the order, e.g., insert into database
    
        // Clear the cart
        $_SESSION['cart'] = array();
        header('Location: payment.php');
            exit;
    
        // echo "Order placed. Thank you for shopping with us!";
    } else {
        // Display checkout form
        ?>
            <form action="checkOut.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($Accounts['name']); ?>">
            </div>
                
            <div class="form-group">
            <label for="name">Email</label>
            <input type="text"  class="form-control"  name="email" value="<?php echo htmlspecialchars($Accounts['email']); ?>">
            </div>

            <div class="form-group">
            <label for="name">Address</label>
            <input type="text"  class="form-control"  name="address" value="<?php echo htmlspecialchars($Accounts['address']); ?>">
            </div>

            <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input type="text"  class="form-control"  name="phoneNumber" value="<?php echo htmlspecialchars($Accounts['phoneNumber']); ?>">
            </div>

            <input type="submit" value="Place Order">
            


    </form> 
        <?php
    }
    ?>
</body>
<footer>
    <?php require 'footer.php'?>
</footer>
</html>