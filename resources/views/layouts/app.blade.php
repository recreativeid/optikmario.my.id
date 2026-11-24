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

  <!-- Instant Theme Initializer (prevents flash of default theme) -->
  <script>
    (function() {
      const savedTheme = localStorage.getItem('optik_theme') || 'warm';
      document.documentElement.setAttribute('data-theme', savedTheme);
    })();
  </script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            canvas: 'rgb(var(--color-canvas) / <alpha-value>)',
            surface: 'rgb(var(--color-surface) / <alpha-value>)',
            surfaceLight: 'rgb(var(--color-surface-light) / <alpha-value>)',
            surfaceCard: 'rgb(var(--color-surface-card) / <alpha-value>)',
            carbon: 'rgb(var(--color-carbon) / <alpha-value>)',
            stoneMuted: 'rgb(var(--color-stone-muted) / <alpha-value>)',
            neonLime: 'rgb(var(--color-neon-lime) / <alpha-value>)',
            neonLimeHover: 'rgb(var(--color-neon-lime-hover) / <alpha-value>)',
            forestDark: 'rgb(var(--color-forest-dark) / <alpha-value>)',
            borderSubtle: 'rgb(var(--color-border-subtle) / <alpha-value>)',
            pinkSoft: 'rgb(var(--color-pink-soft) / <alpha-value>)',
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
    /* ========================================================================= */
    /* DUAL THEME COLOR TOKENS: WARM CREAM (DEFAULT) VS ZEST FRESH GREEN         */
    /* ========================================================================= */
    :root, html[data-theme="warm"] {
      --color-canvas: 248 246 240;        /* #F8F6F0 Warm Cream */
      --color-surface: 239 236 227;       /* #EFECE3 Muted Bone */
      --color-surface-light: 244 241 232; /* #F4F1E8 Soft Card */
      --color-surface-card: 255 255 255;  /* #FFFFFF Pure White */
      --color-carbon: 24 25 23;           /* #181917 Deep Charcoal */
      --color-stone-muted: 104 107 99;    /* #686B63 Olive Slate */
      --color-neon-lime: 212 248 104;     /* #D4F868 Neon Lime */
      --color-neon-lime-hover: 194 232 80;/* #C2E850 */
      --color-forest-dark: 36 51 40;      /* #243328 Forest Acetate */
      --color-border-subtle: 229 225 214; /* #E5E1D6 Border Divider */
      --color-pink-soft: 246 229 229;     /* #F6E5E5 Soft Pill Bag */
    }

    html[data-theme="fresh-green"] {
      --color-canvas: 242 248 234;        /* #F2F8EA Fresh Pale Crisp Green */
      --color-surface: 227 240 211;       /* #E3F0D3 Fresh Leaf Surface */
      --color-surface-light: 237 246 226; /* #EDF6E2 Crisp Tint Card */
      --color-surface-card: 255 255 255;  /* #FFFFFF Clean Pure White */
      --color-carbon: 22 40 11;           /* #16280B Deep Organic Green Dark */
      --color-stone-muted: 81 113 53;     /* #517135 Natural Foliage Muted */
      --color-neon-lime: 123 173 50;      /* #7BAD32 Signature Zest Fresh Green Tone */
      --color-neon-lime-hover: 109 158 42;/* #6D9E2A Deep Green Hover */
      --color-forest-dark: 25 49 12;      /* #19310C Dark Evergreen */
      --color-border-subtle: 210 231 189; /* #D2E7BD Spring Green Border */
      --color-pink-soft: 224 242 203;     /* #E0F2CB Fresh Lime Pill Bag */
    }

    html {
      transition: background-color 0.4s ease, color 0.4s ease;
    }

    /* Exact Trexlens Dribbble Visual Language */
    body {
      background-color: rgb(var(--color-canvas));
      color: rgb(var(--color-carbon));
      font-family: 'Plus Jakarta Sans', sans-serif;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
      transition: background-color 0.4s ease, color 0.4s ease;
    }

    ::selection {
      background-color: rgb(var(--color-neon-lime));
      color: rgb(var(--color-carbon));
    }

    html[data-theme="fresh-green"] ::selection {
      background-color: rgb(var(--color-neon-lime));
      color: #FFFFFF;
    }

    html[data-theme="fresh-green"] .bg-neonLime {
      color: #FFFFFF !important;
    }
    html[data-theme="fresh-green"] .bg-neonLime * {
      color: #FFFFFF !important;
    }
    html[data-theme="fresh-green"] .text-neonLime {
      color: #7BAD32 !important;
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

    /* ========================================================================= */
    /* SCROLL-DRIVEN BLUR REVEAL ANIMATION (Smooth Top-to-Bottom Entrance)       */
    /* ========================================================================= */
    .scroll-blur-init {
      opacity: 0;
      filter: blur(14px);
      transform: translateY(32px);
      transition: opacity 0.85s cubic-bezier(0.16, 1, 0.3, 1),
                  filter 0.85s cubic-bezier(0.16, 1, 0.3, 1),
                  transform 0.85s cubic-bezier(0.16, 1, 0.3, 1);
      will-change: opacity, filter, transform;
    }

    .scroll-blur-visible {
      opacity: 1 !important;
      filter: blur(0px) !important;
      transform: translateY(0px) !important;
    }

    @media (prefers-reduced-motion: reduce) {
      .scroll-blur-init {
        opacity: 1 !important;
        filter: none !important;
        transform: none !important;
        transition: none !important;
      }
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

  <!-- FLOATING QUICK THEME TOGGLE (BOTTOM LEFT) -->
  <aside aria-label="Ganti Tema Cepat" class="fixed bottom-5 left-5 z-40">
    <button type="button" id="floating-theme-toggle-btn"
            class="group bg-surface/90 hover:bg-surface text-carbon border border-borderSubtle backdrop-blur-md px-3 sm:px-3.5 py-2 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-2 text-xs font-bold transform hover:scale-105 cursor-pointer"
            title="Ganti Tema Warna (Warm Classic / Zest Fresh Green)">
      <span id="floating-theme-indicator" class="w-2.5 h-2.5 rounded-full bg-neonLime inline-block shadow-xs border border-carbon/20"></span>
      <span class="text-[11px] font-extrabold uppercase tracking-wider hidden sm:inline" id="floating-theme-label">Tema</span>
      <i class="fa-solid fa-palette text-stoneMuted text-xs"></i>
    </button>
  </aside>

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

    // Scroll-Driven Blur Reveal Animation across all sections and menus
    document.addEventListener('DOMContentLoaded', () => {
      const animatedElements = document.querySelectorAll('main > section, main > div, .scroll-blur');
      
      if (!('IntersectionObserver' in window)) {
        animatedElements.forEach(el => el.classList.add('scroll-blur-visible'));
        return;
      }

      animatedElements.forEach((el, index) => {
        const rect = el.getBoundingClientRect();
        // If element is already in the viewport on initial page load
        if (rect.top < window.innerHeight && rect.bottom > 0) {
          el.classList.add('scroll-blur-init');
          setTimeout(() => el.classList.add('scroll-blur-visible'), 50 * index);
        } else {
          el.classList.add('scroll-blur-init');
        }
      });

      const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('scroll-blur-visible');
            scrollObserver.unobserve(entry.target);
          }
        });
      }, {
        rootMargin: '0px 0px -40px 0px',
        threshold: 0.08
      });

      animatedElements.forEach(el => scrollObserver.observe(el));

      // Header dynamic glassmorphic blur when scrolling from top to bottom
      const headerEl = document.querySelector('header');
      if (headerEl) {
        window.addEventListener('scroll', () => {
          if (window.scrollY > 25) {
            headerEl.classList.add('shadow-md', 'backdrop-blur-xl', 'bg-canvas/95');
            headerEl.classList.remove('bg-canvas/90');
          } else {
            headerEl.classList.remove('shadow-md', 'backdrop-blur-xl', 'bg-canvas/95');
            headerEl.classList.add('bg-canvas/90');
          }
        }, { passive: true });
      }
    });

    // DUAL THEME SWITCHER (Warm Cream <-> Zest Fresh Green)
    function applyTheme(theme) {
      document.documentElement.setAttribute('data-theme', theme);
      try {
        localStorage.setItem('optik_theme', theme);
      } catch (e) {}

      const isGreen = theme === 'fresh-green';
      const label = document.getElementById('theme-toggle-label');
      const mobileLabel = document.getElementById('mobile-theme-name');
      const indicator = document.getElementById('theme-color-indicator');
      const floatingLabel = document.getElementById('floating-theme-label');
      const floatingIndicator = document.getElementById('floating-theme-indicator');

      if (label) label.textContent = isGreen ? 'Zest Green' : 'Warm Cream';
      if (mobileLabel) mobileLabel.textContent = isGreen ? '🌿 Zest Green' : '🌾 Warm Cream';
      if (floatingLabel) floatingLabel.textContent = isGreen ? 'Zest Green' : 'Warm Cream';
      
      const themeColor = isGreen ? '#7BAD32' : '#D4F868';
      if (indicator) indicator.style.backgroundColor = themeColor;
      if (floatingIndicator) floatingIndicator.style.backgroundColor = themeColor;
    }

    function initThemeSwitcher() {
      const savedTheme = localStorage.getItem('optik_theme') || 'warm';
      applyTheme(savedTheme);

      const desktopBtn = document.getElementById('theme-toggle-btn');
      const mobileBtn = document.getElementById('mobile-theme-toggle-btn');
      const floatingBtn = document.getElementById('floating-theme-toggle-btn');

      function toggleTheme() {
        const active = document.documentElement.getAttribute('data-theme') || 'warm';
        const next = active === 'warm' ? 'fresh-green' : 'warm';
        applyTheme(next);
      }

      if (desktopBtn) desktopBtn.addEventListener('click', toggleTheme);
      if (mobileBtn) mobileBtn.addEventListener('click', toggleTheme);
      if (floatingBtn) floatingBtn.addEventListener('click', toggleTheme);
    }

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', initThemeSwitcher);
    } else {
      initThemeSwitcher();
    }
  </script>
</body>
</html>
