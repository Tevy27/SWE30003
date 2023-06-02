<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'dbConnect.php';
// require 'Product.php';
// require 'ProductRepository.php';

// $productRepository = new ProductRepository($conn);
// $products = $productRepository->getAllProducts();
 
class Database {
    protected $conn;

    public function __construct() {
        require 'dbConnect.php';
        $this->conn = $conn;
    }
 
     public function getProducts() {
         $sql = "SELECT productId, name, price, image FROM Products";
         $result = $this->conn->query($sql);
 
         if ($result) {
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                     $featuredProducts[] = $row;
                 }
                 return $featuredProducts;
             } else {
                 echo "0 results";
             }
         } else {
             echo "Error: ";
         }
     }
 }
 $categories = [
    ['name' => 'Meal', 'img' => 'images/food.jpg', 'desc' => 'Ready-to-Eat Meal', 'info' => 'Fresh, Delicious, Organic'],
    ['name' => 'VegiesFruits', 'img' => 'images/vegetable.jpg', 'desc' => 'Vegetables & Fruits', 'info' => 'Organic Vegetables'],
    ['name' => 'VegiesFruits', 'img' => 'images/meat.jpg', 'desc' => 'Meat', 'info' => 'Organic Meat'],
    ['name' => 'VegiesFruits', 'img' => 'images/dairy.jpg', 'desc' => 'Dairy', 'info' => 'Organic Dairy Products'],
    ['name' => 'VegiesFruits', 'img' => 'images/drinks.jpg', 'desc' => 'Drinks', 'info' => 'Healthy & Delicous Drinks<'],
    ['name' => 'VegiesFruits', 'img' => 'images/nuts.jpg', 'desc' => 'Nuts & Seeds', 'info' => 'Add our healthy nuts and seeds to your diet'],
];

 
 $db = new Database();
 $products = $db->getProducts();
 
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
        
        

<?php
if(isset($_SESSION['signup_success'])) {
    echo '<script type="text/javascript">alert("' . $_SESSION['signup_success'] . '");</script>';
    unset($_SESSION['signup_success']);
}
?> 

    

            

<div class="container">
    <div class="row">
        <?php foreach($categories as $category): ?>
            <div class="col-xs-4">
                <div class="thumbnail">
                    <a href="catalog.php?category=<?php echo htmlspecialchars($category['name']); ?>">
                        <img src="<?php echo htmlspecialchars($category['img']); ?>" alt="<?php echo htmlspecialchars($category['desc']); ?>">
                    </a>
                    <center>
                        <div class="caption">
                            <p id="autoResize"><?php echo htmlspecialchars($category['desc']); ?></p>
                            <p><?php echo htmlspecialchars($category['info']); ?></p>
                        </div>
                    </center>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    </main>

    <footer>
        <?php require 'footer.php'?>
    </footer>
</body>
</html>
