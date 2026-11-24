<?php

namespace App\Models;

class Location
{
    public static function all()
    {
        return optik_config('locations') ?? [];
    }

    public static function find($id)
    {
        $all = self::all();
        return $all[$id] ?? null;
    }
}
