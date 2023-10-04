<?php
class Product{
    public $id;
    public $name;
    public $price;
    public function __construct(int $id,string $name, float $price){
        $this->id = $id;
        $this->name = $name;
        $this->price  =$price;
    }

    public function getFormattedPrice(){
        return "Price: $".number_format($this->price,2);
    }
    public function showDetails(){
        echo "ID: {$this->id}\n";
        echo "Name: {$this->name}\n";
        echo "{$this->getFormattedPrice()}\n";
    }
}
$product = new Product(1,"T-shirt",19.99);
$product->showDetails();