<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PortalController
{
    public function index()
    {
        $articles = Article::all();
        $brand = optik_config('brand') ?? [];

        return [
            'view' => 'pages.portal.index',
            'data' => compact('articles', 'brand')
        ];
    }

    public function show($slug)
    {
        $article = Article::findBySlug($slug);
        $articles = Article::all();
        $brand = optik_config('brand') ?? [];

        if (!$article) {
            $article = $articles[0];
        }

        return [
            'view' => 'pages.portal.show',
            'data' => compact('article', 'articles', 'brand')
        ];
    }
}
