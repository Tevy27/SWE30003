<?php
class UserRepository {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserByEmail($email) {
        $sql = "SELECT name, email, address, phoneNumber FROM accounts WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            return new User($data['name'], $data['email'], $data['address'], $data['phoneNumber']);
        } else {
            throw new Exception("No account found with this email.");
        }
    }
}
?>
