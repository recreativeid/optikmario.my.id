<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <title><?php echo isset($title) ? $title . ' — Optik Mario' : 'Optik Mario — Modern Eyewear & Precision Optical Brand'; ?></title>
  <meta name="description" content="Optik Mario: Brand kacamata presisi dan optik modern di Singkawang dan Mempawah. Menampilkan koleksi frame resmi Luniva Eyewear, lensa optometri terstandar, dan layanan refraksi mata terpercaya.">
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts: Plus Jakarta Sans & Playfair Display (The Iconic Trexlens Editorial Pairing) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,400;1,600;1,700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- FontAwesome 6 Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            canvas: '#F8F6F0',          // Warm Cream / Oatmeal from Dribbble Trexlens
            surface: '#EFECE3',         // Muted bone surface from shot
            surfaceLight: '#F4F1E8',    // Soft card background
            surfaceCard: '#FFFFFF',
            carbon: '#181917',          // Deep charcoal graphite
            stoneMuted: '#686B63',      // Editorial olive slate
            neonLime: '#D4F868',        // Signature glowing lime pill button
            neonLimeHover: '#c2e850',   // Hover state
            forestDark: '#243328',      // Deep acetate forest
            borderSubtle: '#E5E1D6',    // Delicate line divider
            pinkSoft: '#F6E5E5',        // Soft pink bag icon background
          },
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
            serif: ['"Playfair Display"', 'serif'],
          }
        }
      }
    }
  </script>

  <style>
    /* Exact Trexlens Dribbble Visual Language */
    body {
      background-color: #F8F6F0;
      color: #181917;
      font-family: 'Plus Jakarta Sans', sans-serif;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    ::selection {
      background-color: #D4F868;
      color: #181917;
    }

    /* The Signature Serif Italic Accent */
    .font-serif-accent {
      font-family: 'Playfair Display', serif;
      font-style: italic;
      font-weight: 400;
    }

    /* Soft Organic Lens Glow */
    .lens-glow {
      background: radial-gradient(circle, rgba(212, 248, 104, 0.35) 0%, rgba(212, 248, 104, 0) 70%);
    }

    /* Glassmorphic Hotspot Tag */
    .hotspot-tag {
      background: rgba(255, 255, 255, 0.90);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.75);
      box-shadow: 0 6px 24px -2px rgba(24, 25, 23, 0.08);
    }

    /* Horizontal Reel without Scrollbar */
    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }
    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    /* Subtle image hover zoom */
    .img-zoom {
      transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .group:hover .img-zoom {
      transform: scale(1.04);
    }

    .line-clamp-2 {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
  </style>
</head>
<body class="bg-canvas text-carbon flex flex-col min-h-screen">

  <!-- MASTER HEADER -->
  <?php include __DIR__ . '/header.blade.php'; ?>

  <!-- MAIN PAGE CONTENT INJECTION -->
  <main class="flex-grow pb-16 sm:pb-0">
    <?php echo $content ?? ''; ?>
  </main>

  <!-- MASTER FOOTER -->
  <?php include __DIR__ . '/footer.blade.php'; ?>

  <!-- STICKY WHATSAPP ON MOBILE -->
  <?php include __DIR__ . '/../components/sticky-wa.blade.php'; ?>

  <!-- JAVASCRIPT LOGIC FOR NAVIGATION & INTERACTIONS -->
  <script>
    // Mobile Drawer Toggle
    const toggleBtn = document.getElementById('mobile-menu-toggle');
    const drawer = document.getElementById('mobile-drawer');
    const icon = document.getElementById('hamburger-icon');

    if (toggleBtn && drawer) {
      toggleBtn.addEventListener('click', () => {
        drawer.classList.toggle('hidden');
        if (drawer.classList.contains('hidden')) {
          icon.classList.remove('fa-xmark');
          icon.classList.add('fa-bars');
        } else {
          icon.classList.remove('fa-bars');
          icon.classList.add('fa-xmark');
        }
      });
    }
  </script>
</body>
</html>
