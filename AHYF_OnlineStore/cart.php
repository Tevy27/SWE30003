<?php
// Start the session
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
require 'dbConnect.php';
   
session_start();

// Initialize total price
$totalPrice = 0.0;
?>

<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php' ?>
    <title>Cart</title>
</head>
<body>
    <header>
        
        <?php require 'navigation.php' ?>
    </header>
    <h1 id = "contactHeader">Your Cart</h1><br><br>
    <?php 
        // In cart.php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
            // Get product ID and quantity from POST data
            $productId = $_POST['productId'];
            $action = $_POST['action'];
        
            if ($action == 'add') {
                // Check if productId is already in the cart
                if (isset($_SESSION['cart'][$productId])) {
                    $_SESSION['cart'][$productId]++;
                } else {
                    $_SESSION['cart'][$productId] = 1;
                }
            } elseif ($action == 'remove') {
                // Only try to decrease the quantity or remove the product if it's in the cart
                if (isset($_SESSION['cart'][$productId])) {
                    $_SESSION['cart'][$productId]--;
                    if ($_SESSION['cart'][$productId] <= 0) {
                        unset($_SESSION['cart'][$productId]);
                    }
                }
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }   

        // Display cart items
        echo '<table style="width:100%; border: 1px solid black;">';
        echo '<tr><th>Product Name</th><th>Description</th><th>Quantity</th><th>Retail Price</th><th>Sub-Total</th><th>Action</th></tr>';
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $quantity) {
                // Fetch product details from database
                $stmt = $conn->prepare("SELECT * FROM products WHERE productId = ?");
                $stmt->bind_param("i", $productId);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $product = $result->fetch_assoc();

                     // Calculate subtotal for this product and add it to the total price
                    $subtotal = $product['price'] * $quantity;
                    $totalPrice += $subtotal;

                    echo '<tr>';
                    echo '<td>' . $product['name'] . '</td>';
                    echo '<td>' . $product['description'] . '</td>';
                    echo '<td>' . $quantity. '</td>';
                    echo '<td>' . $product['price'] . '</td>';
                    echo '<td>' . $subtotal . '</td>';
                    echo '<td>';
                    echo '<form action="cart.php" method="post">';
                    echo '<input type="hidden" name="productId" value="' . $productId . '">';
                    echo '<button type="hidden" name="action" value="add">+</button>';
                    echo '<button type="hidden" name="action" value="remove">-</button>';
                    echo '</form>';
                    echo '</td>';  // Close the Actions column
                    echo '</tr>';  // Close the table row

                }
            }
                } else {
                    echo '<tr><td colspan="4">Cart is empty.</td></tr>';
                }
                echo '</table>';

        echo "<p id='totalPrice'><strong>Total Price: \${$totalPrice}</strong></p>";
    ?><br><br><br><br><br>
           
</body>
<footer>
    <?php require 'footer.php'?>
</footer>
</html>