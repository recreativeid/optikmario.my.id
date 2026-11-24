<?php

namespace App\Models;

class Product
{
    public static function all()
    {
        return optik_config('products') ?? [];
    }

    public static function featured()
    {
        return array_filter(self::all(), function ($item) {
            return !empty($item['is_featured']);
        });
    }

    public static function findBySlug($slug)
    {
        foreach (self::all() as $product) {
            if ($product['slug'] === $slug) {
                return $product;
            }
        }
        return null;
    }

    public static function getByCategory($categorySlug)
    {
        if ($categorySlug === 'semua' || empty($categorySlug)) {
            return self::all();
        }
        return array_filter(self::all(), function ($item) use ($categorySlug) {
            return $item['category'] === $categorySlug;
        });
    }

    public static function search($keyword)
    {
        if (empty($keyword)) {
            return self::all();
        }
        $keyword = strtolower(trim($keyword));
        return array_filter(self::all(), function ($item) use ($keyword) {
            return strpos(strtolower($item['name']), $keyword) !== false ||
                   strpos(strtolower($item['description']), $keyword) !== false ||
                   strpos(strtolower($item['category_name']), $keyword) !== false;
        });
    }
}
