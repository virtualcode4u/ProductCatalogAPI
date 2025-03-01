<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $product_service;

    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    public function index(Request $request)
    {
        $category_id = $request->query('category_id');
        $search = $request->query('search');
        $products = $this->product_service->getAllProductsPaginated($category_id, $search);

        return response()->json($products);
    }

    public function show($id)
    {
        $product = $this->product_service->getProductById($id);
        return response()->json($product);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->product_service->createProduct($request->validated());
        return response()->json($product, 201);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->product_service->updateProduct($id, $request->validated());
        return response()->json($product);
    }

    public function destroy($id)
    {
        $this->product_service->deleteProduct($id);
        return response()->json(['message' => 'Product deleted'], 200);
    }
}
