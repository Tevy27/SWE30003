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

    <div class="container">
        <div id = "cataImg">
        <?php
    
    // fetch product details
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="cataProduct">';
                echo '<strong>'.$row["name"].'</strong>'. "<br>";
                echo '<img src="'.$row['image'].'" alt="'.$row['name'].'"><br>'. $row["description"]. " "."<br>";
                echo "$".$row["price"]." "."<br>";
                 // Add Quantity buttons and Add to cart button
                 echo '
                <button onclick="decreaseQuantity(\''.$row["productId"].'\')">-</button>
                <input type="text" id="quantity_'.$row["productId"].'" value="1" class="quantity-input">
                <button onclick="increaseQuantity(\''.$row["productId"].'\')">+</button><br>
                <button onclick="addToCart(\''.$row["productId"].'\')">Add to Cart</button>
                ';


            }
        } else {
            echo "No products found.";
        }
        $conn->close();
        ?>
        <script>
  function decreaseQuantity(productId) {
    var quantityInput = document.getElementById('quantity_'+productId);
    var quantity = Number(quantityInput.value);
    if (quantity > 1) {
      quantityInput.value = quantity - 1;
    }
  }

  function increaseQuantity(productId) {
    var quantityInput = document.getElementById('quantity_'+productId);
    var quantity = Number(quantityInput.value);
    quantityInput.value = quantity + 1;
  }

  function addToCart(productId) {
    var quantityInput = document.getElementById('quantity_'+productId);
    var quantity = Number(quantityInput.value);
    // Add your code here to add the item and quantity to the cart
    console.log("Added to cart, quantity: " + quantity);
  }
</script>
           
        
                </div>
    </div>
</body>
</html>
