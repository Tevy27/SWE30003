<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL& ~E_NOTICE);
session_start();

// Check if user is logged in and is a manager
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'manager') {
    header("Location: login.php");
    exit;
}

require 'dbConnect.php';

$editProduct = null;

// Check if a product is being edited
if (isset($_SESSION['editProductId'])) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE productId = ?");
    $stmt->bind_param("i", $_SESSION['editProductId']);
    $stmt->execute();
    $editProduct = $stmt->get_result()->fetch_assoc();
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['addProduct'])) {
        // Add a new product
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, quantity, categories, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssddss", $_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['categories'], $_POST['image']);
        if ($stmt->execute()) {
            echo "New product has been added successfully";
        } else {
            echo "Error add new product: " . $stmt->error;
        }
    }
    elseif (isset($_POST['deleteProduct'])) {
        // Delete a product
        $stmt = $conn->prepare("DELETE FROM products WHERE productId = ?");
        $stmt->bind_param("i", $_POST['productId']);
        $stmt->execute();
    } 
    elseif (isset($_POST['exportSalesToCSV'])) {
        // Export products to CSV
        $result = $conn->query("SELECT * FROM sales");
        $fp = fopen('/tmp/sales.csv', 'w');
    
        if ($fp === false) {
            echo "Error: Unable to open file for writing.";
            exit;
        }
        // write the column headers
        fputcsv($fp, array('salesId', 'productId', 'quantity', 'saleDate', 'totalPrice'));
    
        while ($row = $result->fetch_assoc()) {
            fputcsv($fp, $row);
        }
        fclose($fp);
        echo "Sales data exported successfully to sales.csv";
    }
    elseif (isset($_POST['editProduct'])) {
        $_SESSION['editProductId'] = $_POST['productId'];
    }
    // Update button was clicked
    elseif (isset($_POST['updateProduct'])) {
        // Update an existing product
        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, quantity=?, categories=?, image =? WHERE productId = ?");
        $stmt->bind_param("ssddssi", $_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['categories'], $_POST['image'], $_SESSION['editProductId']);
        $stmt->execute();
        
        // Clear the edit state
        unset($_SESSION['editProductId']);

        // Refresh the edit product data
        if (isset($_SESSION['editProductId'])) {
            $stmt = $conn->prepare("SELECT * FROM products WHERE productId = ?");
            $stmt->bind_param("i", $_SESSION['editProductId']);
            $stmt->execute();
            $editProduct = $stmt->get_result()->fetch_assoc();
        }
    }
    // Redirect to the same page to avoid form resubmission issues
    header("Location: managerPortal.php");
    exit;


}

// Get all products
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php' ?>
    <title>Sign Up</title>
</head>
<body>
    <header>
        
        <?php require 'navigation.php' ?>
        <h1>Manager Portal</h1>
    </header>
    
<!-- List all products -->
<h2>Products</h2>
<!-- Edit a product -->
<?php if (isset($editProduct)): ?>
        <h2>Edit Product</h2>
        <form method="POST">
            <input type="text" name="name" value="<?php echo $editProduct['name']; ?>">
            <input type="text" name="description" value="<?php echo $editProduct['description']; ?>">
            <input type="number" name="price" step="0.01" value="<?php echo $editProduct['price']; ?>">
            <input type="number" name="quantity" value="<?php echo $editProduct['quantity']; ?>">
            <input type="text" name="categories" value="<?php echo $editProduct['categories']; ?>">
            <input type="text" name="image" value="<?php echo $editProduct['image']; ?>">
            <button type="submit" name="updateProduct">Update Product</button> 
        </form>
    <?php endif; ?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>categories</th>
        <th>image path</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['productId']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['categories']; ?></td>
            <td><?php echo $row['image']; ?></td>
            <td>
                <!-- Edit and Delete buttons -->
                <form method="POST">
                    <input type="hidden" name="productId" value="<?php echo $row['productId']; ?>">
                    <button type="submit" name="editProduct">Edit</button>
                    <button type="submit" name="deleteProduct">Delete</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
    </table>
    
<!-- Add a new product -->
<h2>Add Product</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Name" style="display: inline-block; width: 15%;">
    <input type="text" name="description" placeholder="Description" style="display: inline-block; width: 15%;">
    <input type="number" name="price" placeholder="Price" step="0.01"style="display: inline-block; width: 15%;">
    <input type="number" name="quantity" placeholder="quantity"style="display: inline-block; width: 15%;">
    <input type="text" name="categories" placeholder="categories"style="display: inline-block; width: 15%;">
    <input type="text" name="image" placeholder="image"style="display: inline-block; width: 15%;">
    <button type="submit" name="addProduct">Add Product</button> 
</form>

<!-- Export to CSV -->
<br><br><h2>Export Sales to CSV</h2>
<form method="POST">
    <button type="submit" name="exportSalesToCSV">Export Sales to CSV</button>
</form>
<footer>
    <?php require 'footer.php' ?>
    </footer>
</body>
</html>
