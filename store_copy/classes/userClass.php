<?php
class User {
    public $name;
    public $email;
    public $address;
    public $phoneNumber;
    protected static $table; // Make this property static

    public function __construct($name, $email, $address, $phoneNumber) {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
    }

    public static function fetchUserDetails($conn, $email) {
        $stmt = $conn->prepare("SELECT name, email, address, phoneNumber
        FROM accounts WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $Accounts = $result->fetch_assoc();
            return new User($Accounts['name'], $Accounts['email'], $Accounts['address'], $Accounts['phoneNumber']);
        } else {
            return null;
        }
    }

    public static function authenticate($conn, $email, $password) {
        $sql = "SELECT * FROM " . static::$table . " WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if($stmt === false) {
            die("Error in SQL: " . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $Accounts = $result->fetch_assoc();
    
        if ($Accounts && password_verify($password, $Accounts['password'])) {
            return new static($Accounts['name'], $Accounts['email'], $Accounts['address'], $Accounts['phoneNumber']);
        } else {
            return null;
        }
    }
    
}

class Manager extends User {
    protected static $table = "Managers"; }

class Customer extends User {
    protected static $table = "Accounts"; 
}
?>

    