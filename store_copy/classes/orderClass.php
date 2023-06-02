<?php
class Order
{
    public function placeOrder($name, $email, $address, $phoneNumber)
    {
        // Process the order, e.g., insert into database

        // Clear the cart
        $_SESSION['cart'] = array();
        header('Location: payment.php');
        exit;
    }
}
?>