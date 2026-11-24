<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\Article;
use App\Models\Location;

class HomeController
{
    public function index()
    {
        $featuredProducts = Product::featured();
        $services = Service::all();
        $articles = Article::all();
        $locations = Location::all();
        $testimonials = optik_config('testimonials') ?? [];
        $categories = optik_config('categories') ?? [];
        $brand = optik_config('brand') ?? [];
        $reels = optik_config('reels') ?? [];

        return [
            'view' => 'pages.home',
            'data' => compact('featuredProducts', 'services', 'articles', 'locations', 'testimonials', 'categories', 'brand', 'reels')
        ];
    }
}
