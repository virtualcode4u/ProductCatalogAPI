<?php

namespace App\Repositories;

use App\Models\Product;
use App\BusinessObjects\ProductBO;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllPaginated($category_id = null, $search = null)
    {
        $query = Product::query();
        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        return $query->paginate(10);
    }

    public function getById($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        $product = Product::create($data);
        return new ProductBO($product->id, $product->name, $product->description, $product->sku, $product->price, $product->category_id, $product->created_at, $product->updated_at);
    }

    public function update($id, array $data): bool
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return false;
        }
        return $product->update($data);
    }

    public function delete($id): bool
    {
        $product = Product::find($id);

        if (!$product) {
            return false;
        }

        return (bool) $product->delete();
    }
}
