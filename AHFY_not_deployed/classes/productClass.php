<?php
class Product
{
    public $productId;
    public $name;
    public $description;
    public $image;
    public $price;
    public $quantity;


    public function __construct($productId, $name, $description, $image, $price, $quantity = 0)
    {
        $this->productId = $productId;
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->quantity = $quantity; // And this line

    }
    

    // More methods related to product...
}
?>
