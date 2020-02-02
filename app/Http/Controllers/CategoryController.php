<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController
{

    public function index(): array
    {
        return [
            'success' => true,
            'data' => Category::all(),
        ];
    }

    public function products(Category $category): array
    {
        return [
            'success' => true,
            'data' => $category->products,
        ];
    }

    public function tags(Category $category): array
    {
        return [
            'success' => true,
            'data' => $category->tags,
        ];
    }
}
