<?php

namespace App\Models;

class Service
{
    public static function all()
    {
        return optik_config('services') ?? [];
    }

    public static function findBySlug($slug)
    {
        foreach (self::all() as $service) {
            if ($service['slug'] === $slug || $service['id'] === $slug) {
                return $service;
            }
        }
        return null;
    }
}
