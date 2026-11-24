<?php

namespace App\Http\Controllers;

use App\Models\Location;

class AboutController
{
    public function index()
    {
        $locations = Location::all();
        $brand = optik_config('brand') ?? [];
        $testimonials = optik_config('testimonials') ?? [];

        return [
            'view' => 'pages.about',
            'data' => compact('locations', 'brand', 'testimonials')
        ];
    }

    public function testimonials()
    {
        $testimonials = optik_config('testimonials') ?? [];
        $brand = optik_config('brand') ?? [];

        return [
            'view' => 'pages.testimonials',
            'data' => compact('testimonials', 'brand')
        ];
    }
}
