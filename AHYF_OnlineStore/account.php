<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
 require 'dbConnect.php'
?>
    <?php
    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header('location: login.php');
        exit;
    }

    // Establish a connection to the database
    require 'dbConnect.php';
    
    // Query to fetch user details
    $sql = "SELECT name, email, address, phoneNumber
    FROM accounts WHERE email = ?";

    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $_SESSION['email']);
        $stmt->execute();
        
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $Accounts = $result->fetch_assoc();
        } else {
            echo "No account found with this email.";
            exit;
        }
    } else {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
    
    
    // Close connection
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <?php require 'head.php' ?>
    <title>Acount</title>
</head>
<body>
    <header>
        <?php require 'navigation.php' ?>
        <h1 id = "contactHeader">Your Account Details</h1>
        <div class="page-header">
        <!-- <h3 id="">Hi, <b><?php echo htmlspecialchars($Accounts['name']); ?></b>. Welcome to our site.</h1> -->
    </div>
    <div class="accInfo">
        <p>
            <pre>
            <b>Name:</b>    <?php echo htmlspecialchars($Accounts['name']); ?><br><br><br>
            <b>Email:</b>   <?php echo htmlspecialchars($Accounts['email']); ?><br><br><br>
            <b>Address:</b> <?php echo htmlspecialchars($Accounts['address']); ?><br><br><br>
            <b>Phone:</b>   <?php echo htmlspecialchars($Accounts['phoneNumber']); ?><br><br><br>
            </pre>
        </p>
    </div>
    


    </header>
    
    <footer>
        <?php require 'footer.php'?>
    </footer>
</body>
</html>