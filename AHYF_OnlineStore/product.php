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
                echo '<br><a href="add_to_cart.php?id='.'">Add to Cart</a><br><br><br>';
                echo '</div>';
            }
        } else {
            echo "No products found.";
        }
        $conn->close();
        ?>
        
                </div>
    </div>
</body>
</html>
