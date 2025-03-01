<?php

namespace App\BusinessObjects;

class CategoryBO
{
    public $id;
    public $name;
    public $parent_category_id;

    public function __construct($id, $name, $parent_category_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent_category_id = $parent_category_id;
    }
}
