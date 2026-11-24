<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LocationController;

/*
|--------------------------------------------------------------------------
| Web Routes - Optik Mario
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');

// Services
Route::get('/layanan', [ServiceController::class, 'index'])->name('services.index');
Route::get('/layanan-klinis', [ServiceController::class, 'index'])->name('services.clinical');
Route::get('/myopia-low-vision', [ServiceController::class, 'myopiaLowVision'])->name('services.myopia');
Route::get('/home-care', [ServiceController::class, 'homeCare'])->name('services.homecare');

// Portal & Education
Route::get('/portal', [PortalController::class, 'index'])->name('portal.index');
Route::get('/news', [PortalController::class, 'index'])->name('portal.news');
Route::get('/portal/{slug}', [PortalController::class, 'show'])->name('portal.show');

// Brand & Locations
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about');
Route::get('/testimoni', [AboutController::class, 'testimonials'])->name('testimonials');
Route::get('/lokasi', [LocationController::class, 'index'])->name('locations');
Route::get('/kontak', [LocationController::class, 'index'])->name('contact');
