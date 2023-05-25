<?php

// fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Catalog</title>
</head>
<body>
    <h1>Product Catalog</h1>

    <?php while($product = $result->fetch_assoc()): ?>
        <div>
            <h2><a href="product.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></h2>
            <p><?php echo $product['description']; ?></p>
            <p>$<?php echo $product['price']; ?></p>
        </div>
    <?php endwhile; ?>
</body>
</html>
