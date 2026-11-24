<?php

function renderRoute($uri, $scriptName = '/optikmario.my.id/index.php') {
    $_SERVER['REQUEST_URI'] = $uri;
    $_SERVER['SCRIPT_NAME'] = $scriptName;
    $_SERVER['HTTP_HOST'] = 'localhost';
    $_GET = [];

    $parts = explode('?', $uri);
    if (isset($parts[1])) {
        parse_str($parts[1], $_GET);
    }

    ob_start();
    require __DIR__ . '/index.php';
    return ob_get_clean();
}

$pages = [
    'index.html' => '/optikmario.my.id/',
    'produk.html' => '/optikmario.my.id/produk',
    'layanan.html' => '/optikmario.my.id/layanan',
    'lokasi.html' => '/optikmario.my.id/lokasi',
    'tentang-kami.html' => '/optikmario.my.id/tentang-kami',
    'portal.html' => '/optikmario.my.id/portal'
];

foreach ($pages as $file => $uri) {
    $html = renderRoute($uri);
    file_put_contents(__DIR__ . '/' . $file, $html);
    echo "✅ {$file} exported: " . strlen($html) . " bytes\n";
}

echo "🎉 All HTML pages regenerated successfully!\n";
