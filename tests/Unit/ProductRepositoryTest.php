<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Category;
use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected ProductRepository $product_repo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->product_repo = new ProductRepository();
    }

    /**
     * Test get all products.
     */
    public function test_get_all_products()
    {
        Product::factory()->create();

        $products = $this->product_repo->getAllPaginated();

        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $products);
        $this->assertCount(1, $products->items());
    }

    /**
     * Test find product by ID.
     */
    public function test_find_product_by_id()
    {
        $product = Product::factory()->create();

        $result = $this->product_repo->getById($product->id);

        $this->assertEquals($product->id, $result->id);
        $this->assertEquals($product->name, $result->name);
    }

    /**
     * Test create product.
     */
    public function test_create_product()
    {
        $category = Category::factory()->create();

        $product_data = [
            'name' => 'New Product',
            'description' => 'Test description',
            'sku' => 'SKU12345',
            'price' => 100,
            'category_id' => $category->id, // ✅ Assign valid category_id
        ];

        $product = Product::create($product_data);

        // ✅ Check if product was created
        $this->assertDatabaseHas('products', ['name' => 'New Product']);
        $this->assertEquals('New Product', $product->name);
    }

    /**
     * Test update product.
     */
    public function test_update_product()
    {
        $product = Product::factory()->create();

        $updated = $this->product_repo->update($product->id, ['name' => 'Updated Product']);

        $this->assertTrue($updated);
        $this->assertDatabaseHas('products', ['id' => $product->id, 'name' => 'Updated Product']);
    }

    /**
     * Test delete product.
     */
    public function test_delete_product()
    {
        $product = Product::factory()->create();

        $deleted = $this->product_repo->delete($product->id);

        $this->assertTrue($deleted);
    }
}
