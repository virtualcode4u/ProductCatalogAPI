<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $category_repo;

    public function __construct(CategoryRepositoryInterface $category_repo)
    {
        $this->category_repo = $category_repo;
    }

    public function index()
    {
        $categories = $this->category_repo->getAll();
        return response()->json($categories);
    }
}
