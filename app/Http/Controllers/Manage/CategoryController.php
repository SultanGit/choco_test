<?php

namespace App\Http\Controllers\Manage;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{

    public function store(Request $request): array
    {
        Category::create([
           'name' => $request->input('name'),
           'tags' => $request->input('tags'),
        ]);

        return [
            'success' => true,
        ];
    }

    public function update(Request $request, Category $category): array
    {
        $category->update([
            'name' => $request->input('name'),
            'tags' => $request->input('tags'),
        ]);

        return [
            'success' => true,
        ];
    }

    public function destroy(Category $category): array
    {
        $category->products()->detach();
        $category->delete();

        return [
            'success' => true,
        ];
    }
}
