<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'dbConnect.php';
require 'classes/productClass.php';
require 'classes/productRepositoryClass.php';

$productRepository = new ProductRepository($conn);
$products = $productRepository->getAllProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php' ?>
    <title>Product</title>
</head>
<body>
    <header>
        
        <?php require 'navigation.php' ?>
    </header>
    <style>
    .quantity-input {
        width: 10%; /* Adjust as needed */
        margin-left: 50%;
    }
</style>


    
    <!-- Your HTML code -->

    <div class="container">
        <div id="cataImg">
            <?php foreach($products as $product): ?>
                <div class="cataProduct">
                    <strong><?= $product->name ?></strong><br>
                    <img src="<?= $product->image ?>" alt="<?= $product->name ?>"><br>
                    <?= $product->description ?><br>
                    $<?= $product->price ?><br>
                    
                    <!-- Add Quantity buttons and Add to Cart button -->
                    <button onclick="decreaseQuantity('<?= $product->productId ?>')">-</button>
                    <input type="hidden" id="quantity_<?= $product->productId ?>" value="1" class="quantity-input">
                    <button onclick="increaseQuantity('<?= $product->productId ?>')">+</button>
                    <form action="cart.php" method="post" id="form_<?= $product->productId ?>">
                        <input type="hidden" name="productId" value="<?= $product->productId ?>">
                        <input type="text" id="productQuantity_<?= $product->productId ?>" name="quantity" value="1">
                        <input type="hidden" name="action" value="add">
                        <input type="submit" value="Add to Cart">
                    </form>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <!-- More of your HTML code -->
    
    <script>
  function decreaseQuantity(productId) {
    var quantityInput = document.getElementById('quantity_'+productId);
    var quantity = Number(quantityInput.value);
    if (quantity > 1) {
      quantityInput.value = quantity - 1;
      document.getElementById('productQuantity_'+productId).value = quantity - 1;
    }
}

function increaseQuantity(productId) {
    var quantityInput = document.getElementById('quantity_'+productId);
    var quantity = Number(quantityInput.value);
    quantityInput.value = quantity + 1;
    document.getElementById('productQuantity_'+productId).value = quantity + 1;
}


function updateQuantity(productId) {
    var quantityInput = document.getElementById('quantity_'+productId);
    var quantityFormInput = document.getElementById('productQuantity_'+productId);
    quantityFormInput.value = quantityInput.value;
}






    </script>
    
           
        
        
</body>
</html>
