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
    <title>Acount</title>
</head>
<body>
    <header>
        <?php require 'navigation.php' ?>
        <h1 id = "contactHeader">Your Account Details</h1>
    </header>
    
    <footer>
        <?php require 'footer.php'?>
    </footer>
</body>
</html>