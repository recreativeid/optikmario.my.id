<?php

namespace App\Http\Controllers;

use App\Models\Location;

class LocationController
{
    public function index()
    {
        $locations = Location::all();
        $brand = optik_config('brand') ?? [];

        return [
            'view' => 'pages.locations',
            'data' => compact('locations', 'brand')
        ];
    }
}
