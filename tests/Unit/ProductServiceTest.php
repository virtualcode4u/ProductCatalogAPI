<?php

namespace Tests\Unit\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\BusinessObjects\ProductBO;
use App\Models\Category;
use Mockery;
use App\Services\ProductService;
use App\Repositories\ProductRepository;
use App\Models\Product;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;
    protected $product_service;
    protected $product_repo_mock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        $this->product_repo_mock = Mockery::mock(ProductRepository::class);
        $this->product_service = new ProductService($this->product_repo_mock);
    }

    public function test_get_all_products()
    {
        $this->product_repo_mock
            ->shouldReceive('getAllPaginated')
            ->with(null, null)
            ->once()
            ->andReturn(collect([]));

        $product_service = new ProductService($this->product_repo_mock);
        $products = $product_service->getAllProductsPaginated();
        $this->assertIsIterable($products);
    }

    public function test_find_product_by_id()
    {
        $product = Product::factory()->create();

        $this->product_repo_mock
            ->shouldReceive('getById')
            ->with($product->id)
            ->once()
            ->andReturn($product);

        $product_service = new ProductService($this->product_repo_mock);
        $found_product = $product_service->getProductById($product->id);

        $this->assertNotNull($found_product);
        $this->assertEquals($product->name, $found_product->name);
    }

    public function test_create_product()
    {
        $productData = ['name' => 'New Product', 'price' => 100];

        $this->product_repo_mock
            ->shouldReceive('create')
            ->once()
            ->with($productData)
            ->andReturn(new Product(['id' => 1, 'name' => 'New Product']));

        $product = $this->product_service->createProduct($productData);
        $this->assertEquals('New Product', $product->name);
    }

    public function test_update_product()
    {
        $category = Category::factory()->create();

        $product = Product::factory()->create([
            'name' => 'Old Product',
            'description' => 'Old description',
            'sku' => 'OLD123',
            'price' => 50.00,
            'category_id' => $category->id,
        ]);

        $product_bo = new ProductBO(
            'Updated Product',
            'Updated description',
            'TEST123',
            99.99,
            $product->category_id,
            now(),
            now()
        );

        $product_repository = new ProductRepository();
        $product_service = new ProductService($product_repository);
        $updated = $product_service->updateProduct($product->id, $product_bo);

        $this->assertTrue($updated);
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Product',
            'description' => 'Updated description',
            'sku' => 'TEST123',
            'price' => 99.99,
        ]);
    }

    public function test_delete_product()
    {
        $product = Product::factory()->create();

        // ✅ Tell Mockery to expect delete() call and return true
        $this->product_repo_mock
            ->shouldReceive('delete')
            ->with($product->id)
            ->once()
            ->andReturn(true);
    
        // ✅ Inject the mock repository into ProductService
        $product_service = new ProductService($this->product_repo_mock);
    
        // ✅ Call deleteProduct and assert the result
        $deleted = $product_service->deleteProduct($product->id);
        $this->assertTrue($deleted, "Product deletion failed");

    }
}
