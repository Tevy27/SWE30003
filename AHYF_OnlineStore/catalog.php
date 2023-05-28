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
    <title>Product Catalog</title>
</head>
<body>
    <header>
    <?php require 'navigation.php' ?>
    </header>
    <h1>Product Catalog</h1>

   
                <?php 
                $category = isset($_GET['category']) ? $_GET['category'] : 'VegiesFruits'; // You would replace this with the actual user's selected category

                if ($category == 'VegiesFruits') {
                    $sql = "SELECT * FROM products WHERE categories = ?";
                } else if ($category == 'Meat') {
                    $sql = "SELECT * FROM products WHERE categories = ?";
                } else if ($category == 'Nuts') {
                    $sql = "SELECT * FROM products WHERE categories = ?";
                }
                else if ($category == 'Dairy') {
                    $sql = "SELECT * FROM products WHERE categories = ?";
                }
                else if ($category == 'Drink') {
                    $sql = "SELECT * FROM products WHERE categories = ?";
                }
                else {
                    $sql = "SELECT * FROM products WHERE categories = ?";
                }

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $category);
                $stmt->execute();
                $result = $stmt->get_result();

                echo '<div class="container"><div id="cataImg">';

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="cataProduct">';
                            echo '<strong>'.$row["name"].'</strong>'. "<br>";
                            echo '<img src="'.$row['image'].'" alt="'.$row['name'].'"><br>'. $row["description"]. " "."<br>";
                            echo "$".$row["price"]." ".'per kg'."<br>";
                            echo '<br><a href="add_to_cart.php?id='.'">Add to Cart</a><br>';
                            echo '</div>';
                        }
                    } else {
                        echo "No products found for this category.";
                    }
                    $conn->close();
                    echo '</div></div>';
                ?>
</body>
</html>
