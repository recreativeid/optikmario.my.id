<section class="py-12 sm:py-20 bg-canvas">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- HEADER -->
    <div class="text-center max-w-3xl mx-auto mb-14">
      <span class="text-[11px] font-black uppercase tracking-[0.2em] text-stoneMuted mb-2 block">✦ THE COLLECTION</span>
      <h1 class="text-3xl sm:text-5xl font-black text-carbon tracking-tight mb-4">
        Frames for however <em class="font-serif-accent font-normal italic">you see</em> the world.
      </h1>
      <p class="text-xs sm:text-base text-stoneMuted leading-relaxed">
        Setiap frame siap dipasangi lensa resep dokter mata, Blue-light filtering untuk layar digital, maupun Polarized sun lenses di Optik Mario atau dipesan langsung via toko Shopee resmi.
      </p>
    </div>

    <!-- SEARCH & FILTER TOOLBAR (PILL STYLING) -->
    <div class="bg-surface p-4 sm:p-6 rounded-3xl border border-borderSubtle shadow-sm mb-12">
      
      <!-- Search Input Form -->
      <form action="<?php echo route_url('/produk'); ?>" method="GET" class="mb-5">
        <div class="flex items-center gap-2 bg-canvas border border-borderSubtle rounded-full px-4 py-3 focus-within:border-carbon transition shadow-inner">
          <i class="fa-solid fa-magnifying-glass text-stoneMuted text-xs ml-1"></i>
          <input type="text" name="search" value="<?php echo htmlspecialchars($search ?? ''); ?>" 
                 placeholder="Cari frame: Fossil Round, Raptor Angular, Cat-Eye, atau material..." 
                 class="bg-transparent border-none text-xs sm:text-sm text-carbon w-full focus:outline-none">
          <?php if (!empty($search)): ?>
            <a href="<?php echo route_url('/produk'); ?>" class="text-[11px] text-stoneMuted hover:text-carbon px-2 py-1 font-semibold">Reset</a>
          <?php endif; ?>
          <button type="submit" class="bg-carbon hover:bg-black text-canvas text-xs font-black uppercase tracking-wider px-6 py-2 rounded-full transition shadow-sm">
            Cari
          </button>
        </div>
      </form>

      <!-- Category Filter Pills (Horizontal Scroll) -->
      <div class="flex items-center gap-2 overflow-x-auto no-scrollbar pb-1">
        <?php foreach ($categories as $cat): ?>
          <?php $isActive = ($category === $cat['slug']); ?>
          <a href="<?php echo route_url('/produk?kategori=' . $cat['slug']); ?>" 
             class="category-pill whitespace-nowrap px-4 py-2 rounded-full text-xs font-bold transition border <?php echo $isActive ? 'bg-neonLime text-carbon border-neonLime font-black shadow-sm' : 'bg-canvas text-carbon hover:bg-white border-borderSubtle'; ?>"
             data-slug="<?php echo $cat['slug']; ?>">
            <?php echo $cat['name']; ?>
          </a>
        <?php endforeach; ?>
      </div>

    </div>

    <!-- PRODUCT COUNT & STATUS -->
    <div class="flex items-center justify-between text-xs text-stoneMuted mb-8 px-1">
      <div>
        Menampilkan <strong id="product-count-display"><?php echo count($products); ?></strong> model frame terverifikasi
      </div>
      <div class="flex items-center gap-2">
        <span class="w-2 h-2 rounded-full bg-neonLime"></span>
        <span class="text-[11px] font-bold text-carbon">Ready Stock & Lens Fitting</span>
      </div>
    </div>

    <!-- PRODUCT GRID (2 COLS ON MOBILE, 4 COLS ON DESKTOP) -->
    <?php if (empty($products)): ?>
      <div class="bg-surface rounded-3xl p-12 text-center border border-borderSubtle">
        <div class="w-14 h-14 rounded-full bg-canvas text-stoneMuted flex items-center justify-center mx-auto mb-4 border border-borderSubtle">
          <i class="fa-solid fa-magnifying-glass text-xl"></i>
        </div>
        <h3 class="text-base font-bold text-carbon mb-1">Model Frame Tidak Ditemukan</h3>
        <p class="text-xs text-stoneMuted mb-6 max-w-sm mx-auto">
          Tidak ada kacamata yang sesuai dengan pencarian tersebut. Silakan pilih kategori lain atau reset filter.
        </p>
        <a href="<?php echo route_url('/produk'); ?>" class="inline-flex items-center gap-2 bg-neonLime text-carbon font-black text-xs uppercase tracking-wider px-6 py-3 rounded-full shadow-sm">
          Lihat Semua Frame
        </a>
      </div>
    <?php else: ?>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <?php foreach ($products as $product): ?>
          <?php include __DIR__ . '/../../components/product-card.blade.php'; ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <!-- ASSISTANCE CALLOUT -->
    <div class="mt-20 bg-carbon text-canvas rounded-3xl p-8 sm:p-12 border border-borderSubtle flex flex-col md:flex-row items-center justify-between gap-8 shadow-xl">
      <div class="max-w-xl">
        <span class="text-[10px] font-black uppercase tracking-[0.2em] text-neonLime mb-2 block">✦ RX CONSULTATION</span>
        <h3 class="text-xl sm:text-2xl font-black text-white mb-2">Punya Foto Kertas Resep Dokter Mata?</h3>
        <p class="text-xs sm:text-sm text-stone-300 leading-relaxed">
          Kirimkan lembar resep mata Anda ke WhatsApp Optik Mario. Kami akan menghitungkan ketebalan lensa dan merekomendasikan pilihan lensa yang paling aman untuk mata Anda.
        </p>
      </div>
      <div class="flex flex-col sm:flex-row gap-3.5 w-full md:w-auto">
        <a href="https://wa.me/62895708675050?text=Halo%20Optik%20Mario,%20saya%20ingin%20konsultasi%20foto%20resep%20kacamata%20saya" 
           target="_blank" rel="noopener"
           class="inline-flex items-center justify-center gap-2 bg-neonLime hover:bg-neonLimeHover text-carbon text-xs sm:text-sm font-black uppercase tracking-wider px-8 py-3.5 rounded-full transition shadow-md">
          <i class="fa-brands fa-whatsapp text-base"></i>
          <span>Chat Resep Dokter</span>
        </a>
        <a href="https://shopee.co.id/lunivaeyewear" target="_blank" rel="noopener"
           class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white text-xs sm:text-sm font-bold uppercase tracking-wider px-6 py-3.5 rounded-full border border-white/20 transition">
          <i class="fa-solid fa-store text-neonLime text-xs"></i>
          <span>Shopee Resmi</span>
        </a>
      </div>
    </div>

  </div>

  <script>
    // Instant client-side search & category filtering for static GitHub Pages hosting
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.querySelector('input[name="search"]');
      const categoryLinks = document.querySelectorAll('.category-pill');
      const productItems = document.querySelectorAll('.product-item');
      const countDisplay = document.getElementById('product-count-display');
      const searchForm = document.querySelector('form[action*="produk"]');

      if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
          e.preventDefault();
          applyFilter();
        });
      }

      function getActiveCat() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('kategori') || 'semua';
      }

      function applyFilter() {
        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
        const activeCat = getActiveCat();

        let visibleCount = 0;
        productItems.forEach(item => {
          const cat = item.getAttribute('data-category') || '';
          const title = item.getAttribute('data-title') || '';
          const shape = item.getAttribute('data-shape') || '';

          const matchesCat = (activeCat === 'semua' || cat === activeCat);
          const matchesQuery = !query || title.includes(query) || shape.includes(query);

          if (matchesCat && matchesQuery) {
            item.style.display = '';
            visibleCount++;
          } else {
            item.style.display = 'none';
          }
        });

        if (countDisplay) {
          countDisplay.textContent = visibleCount;
        }

        // Update pill active visual state
        categoryLinks.forEach(link => {
          const slug = link.getAttribute('data-slug');
          if (slug === activeCat) {
            link.className = 'category-pill whitespace-nowrap px-4 py-2 rounded-full text-xs font-black transition border bg-neonLime text-carbon border-neonLime shadow-sm';
          } else {
            link.className = 'category-pill whitespace-nowrap px-4 py-2 rounded-full text-xs font-bold transition border bg-canvas text-carbon hover:bg-white border-borderSubtle';
          }
        });
      }

      if (searchInput) {
        searchInput.addEventListener('input', applyFilter);
      }

      // Intercept category pill clicks for instant client filtering without page reload
      categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          const slug = this.getAttribute('data-slug');
          const newUrl = new URL(window.location.href);
          if (slug === 'semua') {
            newUrl.searchParams.delete('kategori');
          } else {
            newUrl.searchParams.set('kategori', slug);
          }
          window.history.pushState({}, '', newUrl.toString());
          applyFilter();
        });
      });

      // Initial filter on load if query param exists
      const initialCat = getActiveCat();
      const initialSearch = (searchInput ? searchInput.value : '').trim();
      if (initialCat !== 'semua' || initialSearch !== '') {
        applyFilter();
      }
    });
  </script>
</section>
