<?php
class ProductRepository
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllProducts()
    {
        $products = [];
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $products[] = new Product($row["productId"], $row["name"], $row["description"], $row["image"], $row["price"]);
            }
        }

        return $products;
    }
    public function getProductById($productId)
    {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE productId = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Product($row['productId'], $row['name'], $row['description'], $row['image'], $row['price']);
        }

        return null;
    }
    public function getProductsByCategory($category) {
        $sql = "SELECT * FROM products WHERE categories = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $category);
        $stmt->execute();

        $result = $stmt->get_result();
        $products = [];
        while($row = $result->fetch_assoc()) {
            $products[] = new Product($row['productId'], $row['name'], $row['description'],$row['image'], $row['price'], $row['categories']);
        }

        return $products;
    }
    

}
?>