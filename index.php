<?php

/**
 * OPTIK MARIO — Universal Laravel Front Controller & Dispatcher
 * Compatible with Apache XAMPP & Standard Laravel Architecture
 */

if (!defined('OPTIK_ROOT')) {
    define('OPTIK_ROOT', __DIR__);
}

// Config Helper
if (!function_exists('optik_config')) {
    function optik_config($key = null) {
        static $config = null;
        if ($config === null) {
            $config = require OPTIK_ROOT . '/config/optik.php';
        }
        if ($key === null) return $config;
        return $config[$key] ?? null;
    }
}

// Autoload Classes from app/ and Models
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/app/';
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
});

// Determine Base Path for subdirectories in XAMPP
if (php_sapi_name() === 'cli' && !isset($_SERVER['HTTP_HOST'])) {
    $basePath = '/optikmario.my.id';
} else {
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $basePath = ($scriptDir === '/' || $scriptDir === '.') ? '' : rtrim($scriptDir, '/');
}

// Helper to generate consistent URLs
if (!function_exists('route_url')) {
    function route_url($path = '/') {
        global $basePath;
        $path = '/' . ltrim($path, '/');
        if ($path === '//') $path = '/';
        return $basePath . $path;
    }
}

// Current Request Path
$requestUri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if (!empty($basePath) && strpos($requestUri, $basePath) === 0) {
    $path = substr($requestUri, strlen($basePath));
} else {
    $path = $requestUri;
}
$path = '/' . trim($path, '/');
if (empty($path) || $path === '//') {
    $path = '/';
}

// Support query parameter fallback (e.g. ?p=produk) if mod_rewrite is disabled
if (isset($_GET['p'])) {
    $path = '/' . trim($_GET['p'], '/');
}

// Active link helper
if (!function_exists('is_active')) {
    function is_active($route) {
        global $path;
        $route = '/' . trim($route, '/');
        if ($route === '/' && $path === '/') return true;
        if ($route !== '/' && strpos($path, $route) === 0) return true;
        return false;
    }
}

// ROUTING DISPATCHER
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LocationController;

$routeResult = null;
$title = 'Optik Mario — Eyewear, Periksa Mata & Layanan Optik Presisi';

if ($path === '/' || $path === '/beranda') {
    $controller = new HomeController();
    $routeResult = $controller->index();
    $title = 'Beranda — Optik Mario (Singkawang & Mempawah)';

} elseif ($path === '/produk') {
    $category = $_GET['kategori'] ?? 'semua';
    $search = $_GET['search'] ?? '';
    $controller = new ProductController();
    $routeResult = $controller->index($category, $search);
    $title = 'Katalog Kacamata & Frame — Optik Mario';

} elseif (preg_match('#^/produk/([a-zA-Z0-9_-]+)$#', $path, $matches)) {
    $controller = new ProductController();
    $routeResult = $controller->show($matches[1]);
    $title = $routeResult['data']['product']['name'] ?? 'Detail Produk';

} elseif ($path === '/layanan' || $path === '/layanan-klinis') {
    $controller = new ServiceController();
    $routeResult = $controller->index();
    $title = 'Layanan Mata & Optometri — Optik Mario';

} elseif ($path === '/myopia-low-vision') {
    $controller = new ServiceController();
    $routeResult = $controller->myopiaLowVision();
    $title = 'Konsultasi Myopia & Low Vision — Optik Mario';

} elseif ($path === '/home-care') {
    $controller = new ServiceController();
    $routeResult = $controller->homeCare();
    $title = 'Layanan Optik Home Care Singkawang & Mempawah — Optik Mario';

} elseif ($path === '/portal' || $path === '/news' || $path === '/protal') {
    $controller = new PortalController();
    $routeResult = $controller->index();
    $title = 'Portal Edukasi & Berita Mata — Optik Mario';

} elseif (preg_match('#^/portal/([a-zA-Z0-9_-]+)$#', $path, $matches)) {
    $controller = new PortalController();
    $routeResult = $controller->show($matches[1]);
    $title = $routeResult['data']['article']['title'] ?? 'Artikel Edukasi Mata';

} elseif ($path === '/tentang-kami') {
    $controller = new AboutController();
    $routeResult = $controller->index();
    $title = 'Tentang Kami — Optik Mario';

} elseif ($path === '/testimoni') {
    $controller = new AboutController();
    $routeResult = $controller->testimonials();
    $title = 'Testimoni Pelanggan — Optik Mario';

} elseif ($path === '/lokasi' || $path === '/kontak') {
    $controller = new LocationController();
    $routeResult = $controller->index();
    $title = 'Lokasi Cabang Singkawang & Mempawah — Optik Mario';

} else {
    // 404 Fallback to Home
    $controller = new HomeController();
    $routeResult = $controller->index();
    $title = 'Optik Mario — Eyewear, Periksa Mata & Layanan Optik Presisi';
}

// RENDER BLADE VIEW
$viewPath = __DIR__ . '/resources/views/' . str_replace('.', '/', $routeResult['view']) . '.blade.php';

// Extract data variables into local scope for the view
extract($routeResult['data']);

// Buffer the page content
ob_start();
if (file_exists($viewPath)) {
    include $viewPath;
} else {
    echo "View [{$routeResult['view']}] not found.";
}
$content = ob_get_clean();

// Render with Master Layout
include __DIR__ . '/resources/views/layouts/app.blade.php';
