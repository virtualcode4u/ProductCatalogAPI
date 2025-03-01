<?php

namespace App\Services;

use App\BusinessObjects\ProductBO;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    protected $product_repository;

    public function __construct(ProductRepository $product_repository)
    {
        $this->product_repository = $product_repository;
    }

    /**
     * Get all products paginated with caching
     */
    public function getAllProductsPaginated($category_id = null, $search = null)
    {
        $page = request()->get('page', 1);
        $cache_key = "products_page_{$page}_search_" . ($search ?? "all") . "_category_" . ($category_id ?? "all");

        return Cache::remember($cache_key, now()->addMinutes(10), function () use ($category_id, $search) {
            return $this->product_repository->getAllPaginated($category_id, $search);
        });
    }

    /**
     * Get product by ID with caching
     */
    public function getProductById(int $id): ?ProductBO
    {
        $cache_key = "product_{$id}";

        return Cache::remember($cache_key, now()->addMinutes(10), function () use ($id) {
            $product = $this->product_repository->getById($id);

            if (!$product) {
                return null;
            }
            return new ProductBO(
                // $product->id,
                $product->name,
                $product->description,
                $product->sku,
                (float) $product->price,
                $product->category_id,
                $product->created_at,
                $product->updated_at
            );
        }) ?: null;
    }

    /**
     * Create a new product and clear cache
     */
    public function createProduct(array $data): ProductBO
    {
        $product = $this->product_repository->create($data);
        Cache::forget('products_page_1');

        return new ProductBO(
            $product->name,
            $product->description,
            $product->sku,
            $product->price,
            $product->category_id,
            $product->created_at,
            $product->updated_at
        );
    }

    /**
     * Update an existing product and clear cache
     */
    public function updateProduct(int $id, array | ProductBO $product_bo): bool
    {
        if (is_array($product_bo)) {
            $product_bo = new ProductBO(
                $id,
                $product_bo['name'] ?? '',
                $product_bo['description'] ?? '',
                $product_bo['sku'] ?? '',
                (float) ($product_bo['price'] ?? 0),
                $product_bo['category_id'] ?? null,
                now(),
                now()
            );
        }

        $product = $this->product_repository->getById($id);
        if (!$product) {
            return false;
        }

        $updated = $this->product_repository->update($id, [
            'name' => $product_bo->name,
            'description' => $product_bo->description,
            'sku' => $product_bo->sku,
            'price' => $product_bo->price,
            'category_id' => $product_bo->category_id,
        ]);

        if ($updated) {
            Cache::forget("product_{$id}");
            Cache::forget('products_page_1');
        }

        return $updated;
    }

    /**
     * Delete a product and clear cache
     */
    public function deleteProduct(int $id)
    {
        $deleted = $this->product_repository->delete($id);

        if ($deleted) {
            Cache::forget("product_{$id}");
            Cache::forget('products_page_1');
        }

        return $deleted;
    }
}
