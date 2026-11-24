<?php

// Enable Static Export mode so route_url() produces relative .html paths
if (!defined('STATIC_EXPORT')) {
    define('STATIC_EXPORT', true);
}

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

    // Also generate directory-based index.html for clean URL support
    $baseName = str_replace('.html', '', $file);
    if ($baseName !== 'index') {
        $dir = __DIR__ . '/' . $baseName;
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        // In folder/index.html, inject <base href="../"> right after <head>
        $dirHtml = preg_replace('/<head>/i', "<head>\n  <base href=\"../\">", $html, 1);
        file_put_contents($dir . '/index.html', $dirHtml);
        echo "   📁 {$baseName}/index.html created (with <base href=\"../\">)\n";
    }
}

// Create dedicated 404.html for GitHub Pages SPA routing fallback
$notFoundHtml = <<<'HTML'
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mengarahkan... — Optik Mario</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script>
    (function() {
      // Automatic SPA / Subpath Routing for GitHub Pages
      const pathname = window.location.pathname;
      const search = window.location.search || '';
      const hash = window.location.hash || '';

      const isGH = window.location.hostname.endsWith('github.io');
      const segments = pathname.split('/').filter(Boolean);
      let repoPrefix = '';
      if (isGH && segments.length > 0) {
        repoPrefix = '/' + segments[0];
      }

      const cleanPath = pathname.toLowerCase();
      let target = null;

      if (cleanPath.includes('/produk')) {
        target = 'produk.html';
      } else if (cleanPath.includes('/layanan') || cleanPath.includes('/myopia') || cleanPath.includes('/home-care')) {
        target = 'layanan.html';
      } else if (cleanPath.includes('/lokasi') || cleanPath.includes('/kontak')) {
        target = 'lokasi.html';
      } else if (cleanPath.includes('/tentang')) {
        target = 'tentang-kami.html';
      } else if (cleanPath.includes('/portal')) {
        target = 'portal.html';
      }

      if (target) {
        const dest = (repoPrefix ? repoPrefix + '/' : '') + target + search + hash;
        window.location.replace(dest);
      }
    })();
  </script>
</head>
<body class="bg-[#F8F6F0] text-[#181917] min-h-screen flex items-center justify-center p-6 font-['Plus_Jakarta_Sans']">
  <div class="max-w-md w-full bg-white rounded-3xl p-8 sm:p-10 text-center shadow-xl border border-[#E5E1D6]">
    <div class="mb-6 flex justify-center">
      <img src="/optikmario.my.id/public/images/logo/optik_mario_logo.png" 
           onerror="this.onerror=null; if(this.src.includes('/optikmario.my.id/')) this.src=this.src.replace('/optikmario.my.id/', '/'); else this.src='public/images/logo/optik_mario_logo.png';" 
           alt="Optik Mario" 
           class="h-12 w-auto object-contain">
    </div>
    <span class="text-xs font-black uppercase tracking-[0.2em] text-[#686B63] mb-2 block">404 NOT FOUND</span>
    <h1 class="text-2xl sm:text-3xl font-black mb-3 text-[#181917]">Halaman Tidak Ditemukan</h1>
    <p class="text-xs sm:text-sm text-[#686B63] mb-8 leading-relaxed">
      Halaman yang Anda tuju mungkin telah dipindahkan atau tautan belum tersedia. Silakan kembali ke katalog kacamata atau beranda Optik Mario.
    </p>
    <div class="flex flex-col gap-3">
      <a href="produk.html" class="w-full py-3.5 px-6 rounded-full bg-[#D4F868] hover:bg-[#C2E850] text-[#181917] font-black text-xs uppercase tracking-wider transition shadow-sm flex items-center justify-center gap-2">
        <i class="fa-solid fa-bag-shopping"></i>
        <span>Buka Katalog Produk</span>
      </a>
      <a href="index.html" class="w-full py-3 px-6 rounded-full bg-[#EFECE3] hover:bg-[#E5E1D6] text-[#181917] font-bold text-xs uppercase tracking-wider transition">
        Kembali ke Beranda
      </a>
    </div>
  </div>
</body>
</html>
HTML;

file_put_contents(__DIR__ . '/404.html', $notFoundHtml);
echo "✅ 404.html exported with smart subpath redirector\n";

echo "🎉 All HTML pages regenerated successfully!\n";
