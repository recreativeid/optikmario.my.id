<!-- TOP UTILITY STRIP -->
<div class="bg-carbon text-canvas text-xs py-2 px-4 border-b border-carbon/10 hidden sm:block">
  <div class="max-w-7xl mx-auto flex justify-between items-center text-[11px] tracking-wide font-medium">
    <div class="flex items-center gap-6">
      <span class="flex items-center gap-1.5 text-stone-300">
        <i class="fa-solid fa-location-dot text-neonLime"></i>
        <span>Cabang Resmi: <strong>Singkawang</strong> (Jl. P. Diponegoro 35) & <strong>Mempawah</strong> (Jl. Daeng Manambon 16)</span>
      </span>
    </div>
    <div class="flex items-center gap-5">
      <!-- Instagram Link -->
      <a href="https://www.instagram.com/optik_mario?fqnt=MWF0dnl3OWFvYmpycQ==" target="_blank" rel="noopener" class="text-stone-300 hover:text-neonLime transition flex items-center gap-1.5">
        <i class="fa-brands fa-instagram text-neonLime text-xs"></i>
        <span>@optik_mario</span>
      </a>
      <span class="text-white/20">|</span>
      <!-- Shopee Link -->
      <a href="https://shopee.co.id/lunivaeyewear" target="_blank" rel="noopener" class="text-stone-300 hover:text-neonLime transition flex items-center gap-1.5">
        <i class="fa-solid fa-bag-shopping text-neonLime text-xs"></i>
        <span>Shopee: lunivaeyewear</span>
      </a>
      <span class="text-white/20">|</span>
      <a href="mailto:marioopt09@gmail.com" class="text-stone-300 hover:text-white transition flex items-center gap-1">
        <i class="fa-regular fa-envelope text-neonLime"></i>
        <span>marioopt09@gmail.com</span>
      </a>
    </div>
  </div>
</div>

<!-- MAIN TREXLENS-STYLE NAVBAR (BAHASA INDONESIA MENU) -->
<header class="sticky top-0 z-40 bg-canvas/90 backdrop-blur-md border-b border-borderSubtle transition-all duration-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
    
    <!-- BRAND WORDMARK -->
    <a href="<?php echo route_url('/'); ?>" class="flex items-center gap-2 group">
      <span class="text-2xl font-black tracking-tight text-carbon font-sans">
        OPTIK<span class="font-normal text-stoneMuted">MARIO</span>
      </span>
      <span class="w-2 h-2 rounded-full bg-neonLime inline-block animate-pulse"></span>
    </a>

    <!-- CENTER NAVIGATION LINKS (BAHASA INDONESIA: BERANDA, PRODUK, LAYANAN KLINIS, TENTANG KAMI, KONTAK) -->
    <nav class="hidden md:flex items-center gap-8 text-xs font-bold uppercase tracking-wider text-carbon/80">
      <a href="<?php echo route_url('/'); ?>" class="hover:text-carbon transition <?php echo is_active('/') ? 'text-carbon font-black border-b-2 border-carbon pb-1' : ''; ?>">
        Beranda
      </a>
      <a href="<?php echo route_url('/produk'); ?>" class="hover:text-carbon transition <?php echo is_active('/produk') ? 'text-carbon font-black border-b-2 border-carbon pb-1' : ''; ?>">
        Produk
      </a>
      <a href="<?php echo route_url('/layanan'); ?>" class="hover:text-carbon transition <?php echo is_active('/layanan') ? 'text-carbon font-black border-b-2 border-carbon pb-1' : ''; ?>">
        Layanan Klinis
      </a>
      <a href="<?php echo route_url('/tentang-kami'); ?>" class="hover:text-carbon transition <?php echo is_active('/tentang-kami') ? 'text-carbon font-black border-b-2 border-carbon pb-1' : ''; ?>">
        Tentang Kami
      </a>
      <a href="<?php echo route_url('/lokasi'); ?>" class="hover:text-carbon transition <?php echo is_active('/lokasi') ? 'text-carbon font-black border-b-2 border-carbon pb-1' : ''; ?>">
        Kontak
      </a>
    </nav>

    <!-- RIGHT ACTION: SHOPEE BAG BUTTON & SIGNATURE NEON LIME PILL BUTTON -->
    <div class="flex items-center gap-3">
      <!-- Soft Pill Shopping Bag Button (Shopee Luniva Eyewear) -->
      <a href="https://shopee.co.id/lunivaeyewear" target="_blank" rel="noopener" 
         class="h-10 px-3.5 rounded-full bg-pink-100/70 hover:bg-pink-100 text-carbon flex items-center gap-1.5 text-xs font-bold border border-pink-200/60 transition shadow-sm"
         title="Buka Toko Shopee Luniva Eyewear">
        <i class="fa-solid fa-bag-shopping text-sm text-carbon/80"></i>
        <span>(0)</span>
      </a>

      <!-- Primary Neon Lime Pill Button: [ 👓 Belanja Sekarang ] -->
      <a href="<?php echo route_url('/produk'); ?>" 
         class="inline-flex items-center gap-2 bg-neonLime hover:bg-neonLimeHover text-carbon text-xs font-black uppercase tracking-wider px-5 py-2.5 rounded-full shadow-sm hover:shadow transition transform hover:-translate-y-0.5">
        <i class="fa-solid fa-glasses text-sm"></i>
        <span>Belanja Sekarang</span>
      </a>

      <!-- Mobile Hamburger Toggle -->
      <button type="button" id="mobile-menu-toggle" aria-label="Buka Menu" 
              class="md:hidden w-10 h-10 rounded-full border border-borderSubtle bg-white flex items-center justify-center text-carbon hover:bg-surface transition">
        <i class="fa-solid fa-bars text-sm" id="hamburger-icon"></i>
      </button>
    </div>

  </div>

  <!-- MOBILE NAVIGATION DRAWER (BAHASA INDONESIA) -->
  <div id="mobile-drawer" class="hidden md:hidden bg-canvas border-b border-borderSubtle px-4 pt-4 pb-6">
    <div class="flex flex-col space-y-3 text-xs font-bold uppercase tracking-wider text-carbon">
      <a href="<?php echo route_url('/'); ?>" class="py-2.5 px-4 rounded-xl bg-surface transition">Beranda</a>
      <a href="<?php echo route_url('/produk'); ?>" class="py-2.5 px-4 rounded-xl bg-surface transition">Produk (Luniva Eyewear)</a>
      <a href="<?php echo route_url('/layanan'); ?>" class="py-2.5 px-4 rounded-xl bg-surface transition">Layanan Klinis & Optometri</a>
      <a href="<?php echo route_url('/tentang-kami'); ?>" class="py-2.5 px-4 rounded-xl bg-surface transition">Tentang Kami</a>
      <a href="<?php echo route_url('/lokasi'); ?>" class="py-2.5 px-4 rounded-xl bg-surface transition">Kontak & Lokasi Cabang</a>
      
      <div class="pt-3 border-t border-borderSubtle flex flex-col gap-2">
        <a href="https://www.instagram.com/optik_mario?fqnt=MWF0dnl3OWFvYmpycQ==" target="_blank" rel="noopener" class="w-full text-center py-2.5 rounded-full bg-canvas border border-borderSubtle text-carbon font-bold text-xs">
          <i class="fa-brands fa-instagram text-rose-600 mr-1.5"></i> Instagram @optik_mario
        </a>
        <a href="https://shopee.co.id/lunivaeyewear" target="_blank" rel="noopener" class="w-full text-center py-2.5 rounded-full bg-pink-100 text-carbon font-bold text-xs">
          <i class="fa-solid fa-store text-orange-600 mr-1.5"></i> Shopee: lunivaeyewear
        </a>
        <a href="https://wa.me/62895708675050" target="_blank" rel="noopener" class="w-full text-center py-2.5 rounded-full bg-neonLime text-carbon font-black text-xs">
          <i class="fa-brands fa-whatsapp text-sm mr-1.5"></i> WA Mempawah (0895 708675050)
        </a>
        <a href="https://wa.me/62895320119379" target="_blank" rel="noopener" class="w-full text-center py-2.5 rounded-full bg-carbon text-canvas font-bold text-xs">
          <i class="fa-brands fa-whatsapp text-sm text-neonLime mr-1.5"></i> WA Singkawang (0895 3201 19379)
        </a>
      </div>
    </div>
  </div>
</header>
