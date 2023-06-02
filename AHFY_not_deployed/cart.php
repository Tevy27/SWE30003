<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

require 'dbConnect.php';
require 'classes/productClass.php';
require 'classes/productRepositoryClass.php';
require 'classes/cartClass.php';

session_start();
$cart = new Cart();
$productRepository = new ProductRepository($conn);

// Process actions
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $cart->addProduct($productId);
            break;
        case 'remove':
            $cart->removeProduct($productId);
            break;
        case 'delete':
            $cart->deleteProduct($productId);
            break;
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$productsInCart = [];
$totalPrice = 0.0;

// Get products in the cart
$cartProducts = $cart->getProducts();
foreach ($cartProducts as $productId => $quantity) {
    $product = $productRepository->getProductById($productId);
    if ($product) {
        $product->quantity = $quantity;  // You can directly set the quantity property now
        $productsInCart[] = $product;
        $totalPrice += $product->price * $quantity;
    }
}
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
        

        // Display cart items
        echo '<table style="width:96%; border: 1px solid black; margin: 20px;">';
        echo '<tr><th>Product Name</th><th>Description</th><th>Quantity</th><th>Retail Price</th><th>Sub-Total</th><th>Action</th></tr>';
        if (!empty($productsInCart)) {
            foreach ($productsInCart as $product) {
                // Calculate subtotal for this product and add it to the total price
                $subtotal = $product->price * $product->quantity;
                $totalPrice += $subtotal;
        
                echo '<tr>';
                echo '<td>' . $product->name . '</td>';
                echo '<td>' . $product->description . '</td>';
                echo '<td>' . $product->quantity . '</td>';
                echo '<td>' . $product->price . '</td>';
                echo '<td>' . $subtotal . '</td>';
                echo '<td>';
                echo '<form action="cart.php" method="post">';
                echo '<input type="hidden" name="productId" value="' . $product->productId . '">';
                echo '<input type="hidden" name="quantity" value="' . $product->quantity . '">';
                echo '<button type="submit" name="action" value="add">+</button>';
                echo '<button type="submit" name="action" value="remove">-</button>';
                echo '<button type="submit" name="action" value="delete">Remove</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';  // Close the table row
            }
        } else {
            echo '<p id="cartEmpty"> Your Cart is empty!</p>';
        }
        
                echo '</table>';

        echo "<p id='totalPrice'><strong>Total Price:&nbsp&nbsp&nbsp&nbsp&nbsp \${$totalPrice}</strong></p>";
    
    ?>
    <br><br><br>

    <a href="checkOut.php"class="btn btn-primary" style="float: right; margin-left: 50px;margin-right: 20px;">Check Out &gt;&gt;</a>
      <a href="product.php" class="btn btn-primary" style="float: right;">&lt;&lt; Back to Shopping</a>
       <br><br><br><br><br>   
</body>
<footer>
    <?php require 'footer.php'?>
</footer>
</html>
