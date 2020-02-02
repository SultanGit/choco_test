<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController
{

    public function index(Request $request): array
    {
        $products = Product::query()
            ->when($request->has('color'), function (Builder $query) use ($request) {
                $query->where('color', $request->input('color'));
            })
            ->when($request->has('min_weight'), function (Builder $query) use ($request) {
                $query->where('weight', '>', $request->input('min_weight'));
            })
            ->when($request->has('max_weight'), function (Builder $query) use ($request) {
                $query->where('weight', '<', $request->input('max_weight'));
            })
            ->when($request->has('min_price'), function (Builder $query) use ($request) {
                $query->where('price', '>', $request->input('min_price'));
            })
            ->when($request->has('max_price'), function (Builder $query) use ($request) {
                $query->where('price', '<', $request->input('max_price'));
            })
            ->get();

        return [
            'success' => true,
            'data' => $products,
        ];
    }

    public function tags(Product $product): array
    {
        return [
            'success' => true,
//            'data' => new ProductTags($product),
            'data' => $product->tags,
        ];
    }
}
