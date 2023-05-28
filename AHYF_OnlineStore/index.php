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
    <title>Home</title>
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
                       <h1>Explore Our Healthy Meal</h1>
                       <a href="product.php" class="btn btn-danger">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>
        
        <div class="product-list">
            <?php 
            $sql = "SELECT productId, name, price, image FROM products";
            $result = $conn->query($sql);
            
            // if ($result === FALSE) {
            //     echo "Error: " . $conn->error;
            // } else {
            //     $featuredProducts = [];

            // if ($result->num_rows > 0) {
            //  output data of each row
            // while($row = $result->fetch_assoc()) {
            //     $featuredProducts[] = $row;
            // }
            //     } else {
            //         echo "0 results";
            //     }
            //  $conn->close();
            // }
            if ($result) {
                // Now it's safe to use $result->num_rows and other methods
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $featuredProducts[] = $row;
                    }
                        } else {
                            echo "0 results";
                        }
                     $conn->close();
            } else {
                // Query failed, handle the error
                echo "Error: ";
            }
            
        
            ?>
    

            

            <div class="container">
               <div class="row">
               <div class="col-xs-4">
                       <div class="thumbnail">
                       <a href="catalog.php?category=Meal">
                               <img src="images/food.jpg" alt="Food">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Ready-to-Eat Meal</p>
                                   <p>Cook Fresh, Delicous Recipes, Orgainc Ingredients</p>
                               </div>
                           </center>
                       </div>
                   </div>



                   <div class="col-xs-4">
                       <div  class="thumbnail">
                       <a href="catalog.php?category=VegiesFruits">
                                <img  src="images/vegetable.jpg" alt="Vegetables">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize">Vegetables & Fruits</p>
                                        <p>Organic Vegetables</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                       <a href="catalog.php?category=Meat">
                               <img src="images/meat.jpg" alt="Meat">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">Meat</p>
                                    <p>Oragnic Meat</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                       <a href="catalog.php?category=Dairy">
                               <img src="images/dairy.jpg" alt="Dairy">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Dairy</p>
                                   <p>Organic Dairy Products</p>
                               </div>
                           </center>
                       </div>
                   </div>

                   <div class="col-xs-4">
                       <div class="thumbnail">
                       <a href="catalog.php?category=Drink">
                               <img src="images/drinks.jpg" alt="Drinks">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Drinks</p>
                                   <p>Healthy & Delicous Drinks</p>
                               </div>
                           </center>
                       </div>
                   </div>

                   <div class="col-xs-4">
                       <div class="thumbnail">
                       <a href="catalog.php?category=Nuts">
                               <img src="images/nuts.jpg" alt="Nuts">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Nuts & Seeds</p>
                                   <p>Add our healthy nuts and seeds to your diet</p>
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
