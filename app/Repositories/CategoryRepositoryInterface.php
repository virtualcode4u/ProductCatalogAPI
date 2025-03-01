<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function getById($id);
}
