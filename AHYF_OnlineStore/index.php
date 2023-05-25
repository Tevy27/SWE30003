<?php

// Fetch data for the featured products
$sql = "SELECT id, name, price, image FROM products WHERE featured = 1";
$result = $conn->query($sql);

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
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Online Store</title>
    <!-- Add your CSS here -->
</head>
<body>
    <header>
        <h1>All Your Healthy Food!</h1>
        <!-- Add navigation links here -->
    </header>

    <main>
        <h2>Featured Products</h2>
        <div class="product-list">
            <?php foreach ($featuredProducts as $product): ?>
                <div class="product-item">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <h3><?php echo $product['name']; ?></h3>
                    <p>$<?php echo number_format($product['price'], 2); ?></p>
                    <a href="product.php?id=<?php echo $product['id']; ?>">View Product</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <!-- Add footer content here -->
    </footer>
</body>
</html>
