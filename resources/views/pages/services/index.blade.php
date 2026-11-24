<section class="py-12 sm:py-20 bg-canvas">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- HEADER -->
    <div class="text-center max-w-3xl mx-auto mb-16">
      <span class="text-[11px] font-black uppercase tracking-[0.2em] text-stoneMuted mb-2 block">✦ THE PRECISION LAB</span>
      <h1 class="text-3xl sm:text-5xl font-black text-carbon tracking-tight mb-4">
        Kesehatan Mata Dimulai dari <em class="font-serif-accent font-normal italic">Pilihan yang Tepat.</em>
      </h1>
      <p class="text-xs sm:text-base text-stoneMuted leading-relaxed">
        Optik Mario menyediakan layanan refraksi mata, bimbingan pemilihan lensa berstandar optis, dan perawatan kacamata harian. Kami berdedikasi menjaga kejernihan penglihatan Anda dengan prosedur yang cermat, jujur, dan bertanggung jawab tanpa klaim medis berlebihan.
      </p>
    </div>

    <!-- SERVICES LISTING GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
      <?php foreach ($services as $srv): ?>
        <div class="bg-surface rounded-3xl p-6 sm:p-8 border border-borderSubtle shadow-sm flex flex-col justify-between hover:shadow-md transition">
          <div>
            <div class="flex items-center justify-between mb-4">
              <div class="w-12 h-12 rounded-2xl bg-canvas text-carbon border border-borderSubtle flex items-center justify-center">
                <i class="fa-solid <?php echo $srv['icon']; ?> text-lg"></i>
              </div>
              <span class="text-[10px] font-black uppercase tracking-wider text-carbon bg-neonLime px-3 py-1 rounded-full">
                <?php echo $srv['badge']; ?>
              </span>
            </div>

            <h2 class="text-xl font-black text-carbon mb-2">
              <?php echo $srv['title']; ?>
            </h2>

            <p class="text-xs text-stoneMuted leading-relaxed mb-6">
              <?php echo $srv['full_desc']; ?>
            </p>
          </div>

          <div class="pt-4 border-t border-borderSubtle/60 flex items-center justify-between">
            <span class="text-xs text-stoneMuted font-mono">Singkawang & Mempawah</span>
            <a href="https://wa.me/62895708675050?text=Halo%20Optik%20Mario,%20saya%20ingin%20jadwalkan%20layanan%20<?php echo urlencode($srv['title']); ?>" 
               target="_blank" rel="noopener"
               class="inline-flex items-center gap-1.5 bg-carbon hover:bg-black text-canvas text-xs font-bold px-5 py-2.5 rounded-full transition shadow-sm">
              <i class="fa-brands fa-whatsapp text-xs text-neonLime"></i>
              <span>Konsultasi WA</span>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- DEDICATED SPOTLIGHT CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      
      <!-- Card Myopia -->
      <div class="bg-carbon text-canvas rounded-3xl p-8 sm:p-10 flex flex-col justify-between shadow-xl">
        <div>
          <span class="text-[10px] uppercase font-black text-neonLime tracking-wider mb-2 block">✦ SPECIALIZED CARE 01</span>
          <h3 class="text-2xl font-black mb-3">Konsultasi Myopia & Low Vision</h3>
          <p class="text-xs sm:text-sm text-stone-300 leading-relaxed mb-6">
            Edukasi pencegahan pertambahan mata minus pada anak usia sekolah serta alat bantu pembesar penglihatan untuk penderita low vision.
          </p>
        </div>
        <a href="<?php echo route_url('/myopia-low-vision'); ?>" class="inline-flex items-center gap-2 bg-neonLime hover:bg-neonLimeHover text-carbon text-xs font-black uppercase tracking-wider px-6 py-3 rounded-full transition w-max shadow-sm">
          <span>Pelajari Selengkapnya</span>
          <i class="fa-solid fa-arrow-right text-[10px]"></i>
        </a>
      </div>

      <!-- Card Home Care -->
      <div class="bg-surface rounded-3xl p-8 sm:p-10 border border-borderSubtle flex flex-col justify-between shadow-sm">
        <div>
          <span class="text-[10px] uppercase font-black text-stoneMuted tracking-wider mb-2 block">✦ DOORSTEP SERVICE 02</span>
          <h3 class="text-2xl font-black text-carbon mb-3">Layanan Kunjungan Home Care</h3>
          <p class="text-xs sm:text-sm text-stoneMuted leading-relaxed mb-6">
            Pemeriksaan mata ke rumah bagi lansia dan keluarga di wilayah Singkawang dan Mempawah yang memiliki kendala untuk berkunjung langsung ke toko.
          </p>
        </div>
        <a href="<?php echo route_url('/home-care'); ?>" class="inline-flex items-center gap-2 bg-carbon hover:bg-black text-canvas text-xs font-bold uppercase tracking-wider px-6 py-3 rounded-full transition w-max shadow-sm">
          <span>Pelajari Layanan Home Care</span>
          <i class="fa-solid fa-arrow-right text-[10px] text-neonLime"></i>
        </a>
      </div>

    </div>

  </div>
</section>
