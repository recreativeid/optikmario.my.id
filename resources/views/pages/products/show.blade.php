<section class="py-8 sm:py-14 bg-canvas">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- BREADCRUMBS -->
    <nav class="flex items-center gap-2 text-xs text-stoneMuted mb-8 uppercase font-bold tracking-wider">
      <a href="<?php echo route_url('/'); ?>" class="hover:text-carbon transition">Beranda</a>
      <span>/</span>
      <a href="<?php echo route_url('/produk'); ?>" class="hover:text-carbon transition">Katalog Kacamata</a>
      <span>/</span>
      <span class="text-carbon font-extrabold line-clamp-1"><?php echo htmlspecialchars($product['name']); ?></span>
    </nav>

    <!-- MAIN PRODUCT DETAIL GRID (GALLERY SLIDER ON LEFT, SPECS & ORDER ON RIGHT) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 mb-16 items-start">
      
      <!-- ================================================================= -->
      <!-- LEFT: INTERACTIVE MULTI-IMAGE GALLERY SLIDER (SLIDE GAMBAR DIATAS) -->
      <!-- ================================================================= -->
      <div class="lg:col-span-7 space-y-4">
        
        <?php 
          $gallery = !empty($product['gallery']) ? $product['gallery'] : [$product['image']];
        ?>

        <!-- MAIN SLIDE DISPLAY VIEWPORT -->
        <div class="relative rounded-3xl overflow-hidden aspect-[4/3] sm:aspect-[16/11] bg-surface border border-borderSubtle shadow-md group">
          
          <!-- Slide Images Container -->
          <div id="slider-track" class="w-full h-full relative">
            <?php foreach ($gallery as $index => $img): ?>
              <div class="slide-item absolute inset-0 w-full h-full transition-opacity duration-300 flex items-center justify-center <?php echo $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0 pointer-events-none'; ?>" 
                   data-slide-index="<?php echo $index; ?>">
                <img src="<?php echo htmlspecialchars($img); ?>" 
                     alt="<?php echo htmlspecialchars($product['name']); ?> - Slide <?php echo $index + 1; ?>" 
                     class="w-full h-full object-cover object-center transform hover:scale-105 transition-transform duration-500 cursor-zoom-in">
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Slide Counter Badge (Top-Left) -->
          <div class="absolute top-4 left-4 z-20 bg-carbon/80 backdrop-blur-md text-white text-[11px] font-bold px-3 py-1 rounded-full shadow-sm">
            <span id="current-slide-num">1</span> / <span><?php echo count($gallery); ?> Foto</span>
          </div>

          <!-- Shopee Tag Badge (Top-Right) -->
          <a href="<?php echo htmlspecialchars($product['shopee_url']); ?>" target="_blank" rel="noopener" 
             class="absolute top-4 right-4 z-20 bg-orange-600 hover:bg-orange-700 text-white text-[11px] font-bold px-3.5 py-1.5 rounded-full shadow-md flex items-center gap-1.5 transition">
            <i class="fa-solid fa-store text-xs"></i>
            <span>Etalase Shopee Resmi</span>
          </a>

          <!-- Prev Button -->
          <button type="button" id="slider-prev" aria-label="Foto Sebelumnya"
                  class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/90 hover:bg-white text-carbon flex items-center justify-center shadow-lg backdrop-blur-sm transition opacity-80 hover:opacity-100 hover:scale-105">
            <i class="fa-solid fa-chevron-left text-xs"></i>
          </button>

          <!-- Next Button -->
          <button type="button" id="slider-next" aria-label="Foto Berikutnya"
                  class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/90 hover:bg-white text-carbon flex items-center justify-center shadow-lg backdrop-blur-sm transition opacity-80 hover:opacity-100 hover:scale-105">
            <i class="fa-solid fa-chevron-right text-xs"></i>
          </button>

          <!-- Bottom Soft Hint -->
          <div class="absolute bottom-3 left-1/2 -translate-x-1/2 z-20 bg-white/80 backdrop-blur-sm px-3 py-1 rounded-full text-[10px] font-semibold text-carbon/80 shadow-xs pointer-events-none">
            Geser atau klik thumbnail di bawah untuk melihat sudut frame & kemasan
          </div>
        </div>

        <!-- THUMBNAIL STRIP (KLIK UNTUK PINDAH SLIDE) -->
        <div class="flex items-center gap-2.5 overflow-x-auto no-scrollbar py-1">
          <?php foreach ($gallery as $index => $img): ?>
            <button type="button" 
                    class="thumb-btn flex-shrink-0 w-20 h-16 sm:w-24 sm:h-20 rounded-2xl overflow-hidden border-2 transition <?php echo $index === 0 ? 'border-carbon shadow-md scale-102 ring-2 ring-neonLime' : 'border-borderSubtle opacity-70 hover:opacity-100'; ?>"
                    data-thumb-index="<?php echo $index; ?>"
                    aria-label="Lihat foto slide <?php echo $index + 1; ?>">
              <img src="<?php echo htmlspecialchars($img); ?>" 
                   alt="Thumbnail <?php echo $index + 1; ?>" 
                   class="w-full h-full object-cover">
            </button>
          <?php endforeach; ?>
        </div>

        <!-- BENEFIT HIGHLIGHTS CARDS (UNDER SLIDER) -->
        <div class="grid grid-cols-3 gap-3 pt-4">
          <div class="bg-surface p-3.5 rounded-2xl border border-borderSubtle text-center">
            <i class="fa-solid fa-shield-halved text-emerald-700 text-sm mb-1 block"></i>
            <div class="text-[11px] font-bold text-carbon">100% Original</div>
            <div class="text-[10px] text-stoneMuted">Luniva Eyewear Official</div>
          </div>
          <div class="bg-surface p-3.5 rounded-2xl border border-borderSubtle text-center">
            <i class="fa-solid fa-award text-amber-600 text-sm mb-1 block"></i>
            <div class="text-[11px] font-bold text-carbon">Garansi 30 Hari</div>
            <div class="text-[10px] text-stoneMuted">Adaptasi Kenyamanan</div>
          </div>
          <div class="bg-surface p-3.5 rounded-2xl border border-borderSubtle text-center">
            <i class="fa-solid fa-truck-fast text-sky-600 text-sm mb-1 block"></i>
            <div class="text-[11px] font-bold text-carbon">Ready Stock</div>
            <div class="text-[10px] text-stoneMuted">Singkawang & Mempawah</div>
          </div>
        </div>

      </div>

      <!-- ================================================================= -->
      <!-- RIGHT: SPECS, PRICING, SHOPEE & WHATSAPP ACTIONS                  -->
      <!-- ================================================================= -->
      <div class="lg:col-span-5 flex flex-col justify-between">
        <div>
          
          <!-- Category & Stock Badge -->
          <div class="flex items-center justify-between mb-3">
            <span class="text-[11px] font-black uppercase tracking-wider text-carbon bg-surface px-3.5 py-1 rounded-full border border-borderSubtle">
              <?php echo htmlspecialchars($product['category_name'] ?? 'Frame Kacamata'); ?>
            </span>
            <div class="flex items-center gap-1.5 text-xs text-emerald-700 font-extrabold bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
              <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
              <span>Stok Tersedia</span>
            </div>
          </div>

          <!-- Product Name Headline -->
          <h1 class="text-2xl sm:text-4xl font-black text-carbon tracking-tight leading-tight mb-2">
            <?php echo htmlspecialchars($product['name']); ?>
          </h1>

          <!-- Rating & Sold Count (Shopee Style) -->
          <div class="flex items-center gap-3 text-xs text-stoneMuted mb-5">
            <div class="flex items-center gap-1 text-amber-500 font-bold">
              <i class="fa-solid fa-star"></i>
              <span class="text-carbon font-extrabold">4.9</span>
            </div>
            <span>•</span>
            <span class="text-stoneMuted">98+ Ulasan Terverifikasi</span>
            <span>•</span>
            <span class="text-emerald-700 font-semibold">Toko Resmi Luniva</span>
          </div>

          <!-- Verified Price Box -->
          <div class="bg-surface p-4 sm:p-5 rounded-2xl border border-borderSubtle mb-6 flex items-baseline justify-between">
            <div>
              <div class="text-[10px] font-black uppercase tracking-wider text-stoneMuted mb-0.5">Harga Resmi Shopee:</div>
              <div class="text-2xl sm:text-3xl font-black text-carbon">
                <?php echo htmlspecialchars($product['price_formatted']); ?>
              </div>
            </div>
            <div class="text-right">
              <span class="inline-block text-[11px] font-bold text-orange-700 bg-orange-100 border border-orange-200 px-2.5 py-1 rounded-full">
                Gratis Ongkir & COD
              </span>
            </div>
          </div>

          <!-- Available Colors Selector -->
          <?php if (!empty($product['colors_available'])): ?>
            <div class="mb-6">
              <div class="text-xs font-bold text-carbon mb-2">Pilihan Warna Frame:</div>
              <div class="flex flex-wrap gap-2">
                <?php foreach ($product['colors_available'] as $ci => $color): ?>
                  <span class="px-3.5 py-1.5 rounded-full text-xs font-semibold bg-white border border-borderSubtle text-carbon shadow-xs flex items-center gap-1.5">
                    <span class="w-2.5 h-2.5 rounded-full bg-stone-700 inline-block"></span>
                    <span><?php echo htmlspecialchars($color); ?></span>
                  </span>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>

          <!-- Key Quick Specs -->
          <div class="space-y-2.5 text-xs text-carbon mb-6 bg-canvas p-4 rounded-2xl border border-borderSubtle">
            <div class="flex justify-between py-1 border-b border-borderSubtle/60">
              <span class="text-stoneMuted font-medium">Bentuk / Siluet:</span>
              <strong class="font-bold"><?php echo htmlspecialchars($product['shape'] ?? '-'); ?></strong>
            </div>
            <div class="flex justify-between py-1 border-b border-borderSubtle/60">
              <span class="text-stoneMuted font-medium">Material Frame:</span>
              <strong class="font-bold"><?php echo htmlspecialchars($product['material'] ?? '-'); ?></strong>
            </div>
            <div class="flex justify-between py-1 border-b border-borderSubtle/60">
              <span class="text-stoneMuted font-medium">Bobot Ringan:</span>
              <strong class="font-bold"><?php echo htmlspecialchars($product['weight'] ?? '16 gram'); ?></strong>
            </div>
            <div class="flex justify-between py-1">
              <span class="text-stoneMuted font-medium">Kesesuaian Wajah:</span>
              <strong class="font-bold text-emerald-800">Oval, Bulat, Persegi (Unisex)</strong>
            </div>
          </div>

          <!-- Notice Resep Kacamata Optik Mario -->
          <div class="bg-neonLime/15 border border-neonLime/40 p-4 rounded-2xl mb-6">
            <div class="flex items-center gap-2 text-xs font-black text-carbon mb-1 uppercase tracking-wider">
              <i class="fa-solid fa-glasses text-carbon"></i>
              <span>Ingin Sekalian Pasang Lensa Resep?</span>
            </div>
            <p class="text-xs text-carbon/90 leading-relaxed">
              Optik Mario melayani pemasangan lensa <strong>Blue-Ray</strong>, <strong>Bluechromic</strong>, <strong>Photochromic</strong>, maupun <strong>Progresif</strong> dengan faset digital presisi bergaransi. Kirimkan foto kertas resep dokter via WhatsApp!
            </p>
          </div>

        </div>

        <!-- ACTION BUTTONS: DIRECT SHOPEE & WHATSAPP ORDERS -->
        <div class="space-y-3 pt-4 border-t border-borderSubtle">
          
          <!-- Primary Shopee Purchase Button -->
          <a href="<?php echo htmlspecialchars($product['shopee_url']); ?>" 
             target="_blank" rel="noopener" 
             class="w-full py-4 px-6 rounded-full bg-orange-600 hover:bg-orange-700 text-white font-black text-xs sm:text-sm uppercase tracking-wider transition shadow-md flex items-center justify-center gap-2 transform hover:-translate-y-0.5">
            <i class="fa-solid fa-store text-base"></i>
            <span>Beli Langsung di Toko Shopee Resmi</span>
            <i class="fa-solid fa-arrow-up-right-from-square text-xs ml-1 opacity-80"></i>
          </a>

          <!-- Secondary WhatsApp Order Button -->
          <a href="https://wa.me/62895708675050?text=Halo%20Optik%20Mario,%20saya%20ingin%20memesan%20produk%20<?php echo urlencode($product['name']); ?>%20(Harga%20<?php echo urlencode($product['price_formatted']); ?>)%20dan%20ingin%20konsultasi%20pemasangan%20lensa%20resep%20saya" 
             target="_blank" rel="noopener" 
             class="w-full py-3.5 px-6 rounded-full bg-carbon hover:bg-black text-canvas font-black text-xs uppercase tracking-wider transition shadow-sm flex items-center justify-center gap-2">
            <i class="fa-brands fa-whatsapp text-lg text-neonLime"></i>
            <span>Pesan / Pasang Lensa via WhatsApp (0895 7086 75050)</span>
          </a>

          <!-- Cabang Store Notice -->
          <div class="text-center text-[11px] text-stoneMuted pt-1">
            <i class="fa-solid fa-location-dot text-carbon mr-1"></i>
            Bisa coba langsung di toko: <strong>Singkawang</strong> (Jl. Diponegoro 35) & <strong>Mempawah</strong> (Jl. Daeng Manambon 16).
          </div>

        </div>

      </div>

    </div>

    <!-- ================================================================= -->
    <!-- DETAILED TABS: DESKRIPSI LENGKAP SHOPEE, UKURAN, & KELENGKAPAN     -->
    <!-- ================================================================= -->
    <div class="bg-surface rounded-3xl p-6 sm:p-10 border border-borderSubtle shadow-sm mb-16">
      
      <!-- Tab Navigation Buttons -->
      <div class="flex items-center gap-3 border-b border-borderSubtle pb-4 mb-8 overflow-x-auto no-scrollbar">
        <button type="button" class="tab-btn px-5 py-2.5 rounded-full text-xs font-black uppercase tracking-wider bg-carbon text-canvas transition" data-target="tab-deskripsi">
          Deskripsi Lengkap
        </button>
        <button type="button" class="tab-btn px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider bg-canvas text-carbon hover:bg-white border border-borderSubtle transition" data-target="tab-ukuran">
          Ukuran & Dimensi
        </button>
        <button type="button" class="tab-btn px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider bg-canvas text-carbon hover:bg-white border border-borderSubtle transition" data-target="tab-lensa">
          Pilihan Lensa Optik
        </button>
        <button type="button" class="tab-btn px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider bg-canvas text-carbon hover:bg-white border border-borderSubtle transition" data-target="tab-garansi">
          Garansi & Kelengkapan
        </button>
      </div>

      <!-- Tab Content 1: Deskripsi Lengkap -->
      <div id="tab-deskripsi" class="tab-pane block space-y-4 text-xs sm:text-sm text-stoneMuted leading-relaxed">
        <h3 class="text-base sm:text-lg font-black text-carbon">Tentang <?php echo htmlspecialchars($product['name']); ?></h3>
        <p>
          <?php echo nl2br(htmlspecialchars($product['description'])); ?>
        </p>
        <div class="mt-4 pt-4 border-t border-borderSubtle">
          <h4 class="font-bold text-carbon text-xs uppercase tracking-wider mb-2">Karakteristik & Keunggulan Produk:</h4>
          <ul class="list-disc list-inside space-y-1.5 text-xs text-stoneMuted">
            <li>Dibuat dari material <strong><?php echo htmlspecialchars($product['material'] ?? 'Plastik Acetate Berkualitas'); ?></strong> yang tahan benturan, fleksibel, dan sangat ringan di hidung.</li>
            <li>Nosepad dirancang ergonomis meminimalisir bekas merah pada tulang hidung meski dipakai lebih dari 10 jam sehari.</li>
            <li>Engsel (*solid hinges*) kokoh dan awet, menjaga kestabilan posisi kacamata di wajah.</li>
            <li>Kompatibel untuk dipasang segala jenis lensa: Minus, Silinder, Plus, Lensa Blue-Ray, Photochromic, maupun Lensa Progresif tanpa batas.</li>
          </ul>
        </div>
      </div>

      <!-- Tab Content 2: Ukuran & Dimensi -->
      <div id="tab-ukuran" class="tab-pane hidden space-y-4 text-xs sm:text-sm text-stoneMuted leading-relaxed">
        <h3 class="text-base sm:text-lg font-black text-carbon">Panduan Ukuran & Dimensi Frame Presisi</h3>
        <p>Ukuran presisi frame memastikan kacamata duduk seimbang dan proporsional terhadap kontur wajah Anda:</p>
        
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-2">
          <div class="bg-canvas p-4 rounded-2xl border border-borderSubtle text-center">
            <span class="text-[10px] uppercase font-bold text-stoneMuted block mb-1">Lebar Lensa</span>
            <span class="text-base font-black text-carbon"><?php echo $product['measurements']['lens_width'] ?? '51 mm'; ?></span>
          </div>
          <div class="bg-canvas p-4 rounded-2xl border border-borderSubtle text-center">
            <span class="text-[10px] uppercase font-bold text-stoneMuted block mb-1">Jarak Hidung (Bridge)</span>
            <span class="text-base font-black text-carbon"><?php echo $product['measurements']['bridge'] ?? '18 mm'; ?></span>
          </div>
          <div class="bg-canvas p-4 rounded-2xl border border-borderSubtle text-center">
            <span class="text-[10px] uppercase font-bold text-stoneMuted block mb-1">Panjang Tangkai</span>
            <span class="text-base font-black text-carbon"><?php echo $product['measurements']['temple'] ?? '145 mm'; ?></span>
          </div>
          <div class="bg-canvas p-4 rounded-2xl border border-borderSubtle text-center">
            <span class="text-[10px] uppercase font-bold text-stoneMuted block mb-1">Bobot Total</span>
            <span class="text-base font-black text-carbon"><?php echo $product['weight'] ?? '16 gram'; ?></span>
          </div>
        </div>
      </div>

      <!-- Tab Content 3: Pilihan Lensa -->
      <div id="tab-lensa" class="tab-pane hidden space-y-4 text-xs sm:text-sm text-stoneMuted leading-relaxed">
        <h3 class="text-base sm:text-lg font-black text-carbon">Pilihan Lensa Presisi di Optik Mario</h3>
        <p>Setiap frame Luniva Eyewear dapat dipadukan dengan ragam opsi lensa laboratorium optometri berstandar resmi:</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
          <div class="bg-canvas p-4 rounded-2xl border border-borderSubtle">
            <div class="font-black text-carbon text-xs uppercase mb-1">1. Lensa Anti-Radiasi Blue-Ray</div>
            <p class="text-xs text-stoneMuted">Menangkal 95% radiasi sinar biru berlebih dari layar smartphone, laptop, dan TV. Mencegah mata perih, cepat lelah, dan sakit kepala.</p>
          </div>
          <div class="bg-canvas p-4 rounded-2xl border border-borderSubtle">
            <div class="font-black text-carbon text-xs uppercase mb-1">2. Lensa Bluechromic (All-in-One)</div>
            <p class="text-xs text-stoneMuted">Gabungan proteksi radiasi sinar biru di dalam ruangan dan transisi otomatis menjadi gelap saat terkena terik matahari di luar ruangan.</p>
          </div>
          <div class="bg-canvas p-4 rounded-2xl border border-borderSubtle">
            <div class="font-black text-carbon text-xs uppercase mb-1">3. Lensa Photochromic UV400</div>
            <p class="text-xs text-stoneMuted">Lensa bening di dalam ruangan yang cepat berubah menjadi gelap teduh saat terpapar sinar UV matahari.</p>
          </div>
          <div class="bg-canvas p-4 rounded-2xl border border-borderSubtle">
            <div class="font-black text-carbon text-xs uppercase mb-1">4. Lensa Progresif Multifokus</div>
            <p class="text-xs text-stoneMuted">Solusi penglihatan jarak jauh, menengah, dan baca dekat tanpa garis pembatas yang terlihat, memberikan transisi pandang yang mulus.</p>
          </div>
        </div>
      </div>

      <!-- Tab Content 4: Garansi & Kelengkapan -->
      <div id="tab-garansi" class="tab-pane hidden space-y-4 text-xs sm:text-sm text-stoneMuted leading-relaxed">
        <h3 class="text-base sm:text-lg font-black text-carbon">Kelengkapan Paket & Jaminan Garansi Resmi</h3>
        <p>Setiap pemesanan produk Luniva Eyewear melalui Optik Mario sudah termasuk:</p>
        <div class="bg-canvas p-5 rounded-2xl border border-borderSubtle space-y-2 text-xs">
          <div class="flex items-center gap-2 text-carbon font-semibold">
            <i class="fa-solid fa-circle-check text-emerald-600"></i>
            <span>Hardcase Kotak Kacamata Luniva Eksklusif</span>
          </div>
          <div class="flex items-center gap-2 text-carbon font-semibold">
            <i class="fa-solid fa-circle-check text-emerald-600"></i>
            <span>Kain Lap Mikrofiber Halus Anti-Gores</span>
          </div>
          <div class="flex items-center gap-2 text-carbon font-semibold">
            <i class="fa-solid fa-circle-check text-emerald-600"></i>
            <span>Kartu Garansi Resmi & Pemasangan Lensa Presisi</span>
          </div>
          <div class="flex items-center gap-2 text-carbon font-semibold">
            <i class="fa-solid fa-circle-check text-emerald-600"></i>
            <span>Layanan Gratis Penyetelan Frame Berkala di Cabang Singkawang & Mempawah</span>
          </div>
        </div>
      </div>

    </div>

    <!-- ================================================================= -->
    <!-- RELATED PRODUCTS COLLECTION                                       -->
    <!-- ================================================================= -->
    <div class="pt-8 border-t border-borderSubtle">
      <div class="flex items-center justify-between mb-8">
        <div>
          <span class="text-[10px] font-black uppercase tracking-[0.2em] text-stoneMuted mb-1 block">✦ KOLEKSI SERUPA</span>
          <h2 class="text-2xl sm:text-3xl font-black text-carbon tracking-tight">Koleksi Luniva Terkait Lainnya</h2>
        </div>
        <a href="<?php echo route_url('/produk'); ?>" class="text-xs font-black uppercase tracking-wider text-carbon hover:text-stoneMuted transition">Lihat Semua →</a>
      </div>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <?php foreach (array_slice($relatedProducts ?? [], 0, 4) as $p): ?>
          <?php $product = $p; include __DIR__ . '/../../components/product-card.blade.php'; ?>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>

<!-- JAVASCRIPT: SLIDER CAROUSEL & TABS INTERACTION -->
<script>
  // SLIDER LOGIC
  const slides = document.querySelectorAll('.slide-item');
  const thumbs = document.querySelectorAll('.thumb-btn');
  const currentNumEl = document.getElementById('current-slide-num');
  const totalSlides = slides.length;
  let activeIndex = 0;

  function showSlide(index) {
    if (index < 0) index = totalSlides - 1;
    if (index >= totalSlides) index = 0;
    activeIndex = index;

    slides.forEach((s, idx) => {
      if (idx === activeIndex) {
        s.classList.remove('opacity-0', 'z-0', 'pointer-events-none');
        s.classList.add('opacity-100', 'z-10');
      } else {
        s.classList.remove('opacity-100', 'z-10');
        s.classList.add('opacity-0', 'z-0', 'pointer-events-none');
      }
    });

    thumbs.forEach((t, idx) => {
      if (idx === activeIndex) {
        t.classList.remove('border-borderSubtle', 'opacity-70');
        t.classList.add('border-carbon', 'shadow-md', 'scale-102', 'ring-2', 'ring-neonLime', 'opacity-100');
      } else {
        t.classList.remove('border-carbon', 'shadow-md', 'scale-102', 'ring-2', 'ring-neonLime', 'opacity-100');
        t.classList.add('border-borderSubtle', 'opacity-70');
      }
    });

    if (currentNumEl) {
      currentNumEl.innerText = activeIndex + 1;
    }
  }

  document.getElementById('slider-prev')?.addEventListener('click', () => {
    showSlide(activeIndex - 1);
  });

  document.getElementById('slider-next')?.addEventListener('click', () => {
    showSlide(activeIndex + 1);
  });

  thumbs.forEach(t => {
    t.addEventListener('click', function() {
      const idx = parseInt(this.getAttribute('data-thumb-index'));
      showSlide(idx);
    });
  });

  // TABS LOGIC
  const tabBtns = document.querySelectorAll('.tab-btn');
  const tabPanes = document.querySelectorAll('.tab-pane');

  tabBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      const targetId = this.getAttribute('data-target');

      tabBtns.forEach(b => {
        b.classList.remove('bg-carbon', 'text-canvas', 'font-black');
        b.classList.add('bg-canvas', 'text-carbon', 'font-bold', 'border', 'border-borderSubtle');
      });

      this.classList.remove('bg-canvas', 'text-carbon', 'font-bold', 'border', 'border-borderSubtle');
      this.classList.add('bg-carbon', 'text-canvas', 'font-black');

      tabPanes.forEach(p => {
        if (p.id === targetId) {
          p.classList.remove('hidden');
          p.classList.add('block');
        } else {
          p.classList.remove('block');
          p.classList.add('hidden');
        }
      });
    });
  });
</script>
