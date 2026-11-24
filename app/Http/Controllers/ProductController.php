<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController
{
    public function index($category = 'semua', $search = '')
    {
        $categories = optik_config('categories') ?? [];
        $brand = optik_config('brand') ?? [];

        if (!empty($search)) {
            $products = Product::search($search);
        } else {
            $products = Product::getByCategory($category);
        }

        return [
            'view' => 'pages.products.index',
            'data' => compact('products', 'categories', 'category', 'search', 'brand')
        ];
    }

    public function show($slug)
    {
        $product = Product::findBySlug($slug);
        $brand = optik_config('brand') ?? [];
        $relatedProducts = Product::featured();

        if (!$product) {
            $product = Product::all()[0];
        }

        return [
            'view' => 'pages.products.show',
            'data' => compact('product', 'relatedProducts', 'brand')
        ];
    }
}
