<?php

namespace App\Models;

class Article
{
    public static function all()
    {
        return optik_config('articles') ?? [];
    }

    public static function findBySlug($slug)
    {
        foreach (self::all() as $article) {
            if ($article['slug'] === $slug) {
                return $article;
            }
        }
        return null;
    }
}
