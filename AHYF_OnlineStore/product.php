<?php

// get product id from query string
$productId = $_GET['id'];

// fetch product details
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productId);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
</head>
<body>
    <h1><?php echo $product['name']; ?></h1>
    <p><?php echo $product['description']; ?></p>
    <p>$<?php echo $product['price']; ?></p>
</body>
</html>
