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
    <title>Home Page</title>
</head>
<body>
    <header>
        
        <?php require 'navigation.php' ?>
    </header>

    <main>
    <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>Explore Our Healthy Recipe</h1>
                       <p>30% OFF on every Delicous Dishes</p>
                       <a href="products.php" class="btn btn-danger">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>
        <h2>Featured Products</h2>
        
        <div class="product-list">
            <?php 
            $sql = "SELECT productId, name, price, image FROM products";
            $result = $conn->query($sql);
            
            if ($result === FALSE) {
                echo "Error: " . $conn->error;
            } else {
                $featuredProducts = [];

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $featuredProducts[] = $row;
            }
                } else {
                    echo "0 results";
                }
             $conn->close();
            }
        
            ?>
            <!-- <?php foreach ($featuredProducts as $product): ?>
                <div class="product-item">
                    <img class= "ProductImage" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p>$<?php echo number_format($product['price'], 2); ?></p>
                    <a href="product.php?id=<?php echo $product['productId']; ?>">View Product</a>
                </div>
            <?php endforeach; ?> -->

            <div class="container">
               <div class="row">
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                           <a href="product.php">
                                <img  src="images/vegetable.jpg" alt="Vegetables">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize">Vegetables</p>
                                        <p>Fresh vegetables everyday</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="images/meat.jpg" alt="Meat">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">Meat</p>
                                    <p>Fresh meat everyday.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="images/diary.jpg" alt="Diary">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Diary</p>
                                   <p>Fresh dairy product.</p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </main>

    <footer>
        <?php require 'footer.php'?>
    </footer>
</body>
</html>
