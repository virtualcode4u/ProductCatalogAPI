<?php

namespace App\BusinessObjects;

class ProductBO
{
    public $name;
    public $description;
    public $sku;
    public $price;
    public $category_id;
    public $created_at;
    public $updated_at;

    public function __construct(
        $name,
        $description,
        $sku,
        $price,
        $category_id,
        $created_at,
        $updated_at
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->sku = $sku;
        $this->price = $price;
        $this->category_id = $category_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }
}
