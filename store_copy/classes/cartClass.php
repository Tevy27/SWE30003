<?php

class Cart
{
    public function __construct()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addProduct($productId)
    {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]++;
        } else {
            $_SESSION['cart'][$productId] = 1;
        }
    }

    public function removeProduct($productId)
    {
        if (isset($_SESSION['cart'][$productId])) {
            if ($_SESSION['cart'][$productId] > 1) {
                $_SESSION['cart'][$productId]--;
            }
        }
    }

    public function deleteProduct($productId)
    {
        unset($_SESSION['cart'][$productId]);
    }

    public function getProducts()
    {
        return $_SESSION['cart'];
    }
}
