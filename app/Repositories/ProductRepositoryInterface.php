<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function getAllPaginated($category_id = null);
    public function getById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id): bool;
}
