<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Location;

class ServiceController
{
    public function index()
    {
        $services = Service::all();
        $locations = Location::all();
        $brand = optik_config('brand') ?? [];

        return [
            'view' => 'pages.services.index',
            'data' => compact('services', 'locations', 'brand')
        ];
    }

    public function myopiaLowVision()
    {
        $service = Service::findBySlug('myopia-low-vision');
        $locations = Location::all();
        $brand = optik_config('brand') ?? [];

        return [
            'view' => 'pages.services.myopia-low-vision',
            'data' => compact('service', 'locations', 'brand')
        ];
    }

    public function homeCare()
    {
        $service = Service::findBySlug('home-care');
        $locations = Location::all();
        $brand = optik_config('brand') ?? [];

        return [
            'view' => 'pages.services.home-care',
            'data' => compact('service', 'locations', 'brand')
        ];
    }
}
