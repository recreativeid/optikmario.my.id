<section class="py-12 sm:py-20 bg-canvas">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- HEADER -->
    <div class="text-center max-w-2xl mx-auto mb-16">
      <span class="text-[11px] font-black uppercase tracking-[0.2em] text-stoneMuted mb-2 block">✦ ULASAN AUTENTIK PELANGGAN</span>
      <h1 class="text-3xl sm:text-5xl font-black text-carbon tracking-tight mb-4">
        Apa Kata Pelanggan <em class="font-serif-accent font-normal italic">Optik Mario?</em>
      </h1>
      <p class="text-xs sm:text-base text-stoneMuted leading-relaxed">
        Kepuasan dan kenyamanan penglihatan warga Singkawang dan Mempawah adalah bukti nyata dedikasi layanan optometri presisi kami.
      </p>
    </div>

    <!-- TESTIMONIALS GRID (CARDS WITH TREXLENS AESTHETICS) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 mb-16">
      <?php foreach ($testimonials as $t): ?>
        <div class="bg-surface p-7 sm:p-9 rounded-3xl border border-borderSubtle shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
          <div>
            <div class="flex items-center justify-between mb-4">
              <div class="flex text-amber-500 text-xs gap-0.5">
                <?php for ($i = 0; $i < $t['rating']; $i++): ?>
                  <i class="fa-solid fa-star"></i>
                <?php endfor; ?>
              </div>
              <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full">
                Ulasan Terverifikasi
              </span>
            </div>

            <p class="text-xs sm:text-sm text-carbon leading-relaxed mb-6 font-medium">
              "<?php echo htmlspecialchars($t['quote']); ?>"
            </p>
          </div>

          <div class="pt-5 border-t border-borderSubtle flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-full bg-neonLime text-carbon font-black text-xs flex items-center justify-center shadow-xs">
                <?php 
                  $initials = '';
                  $parts = explode(' ', $t['name']);
                  foreach ($parts as $p) {
                    if (!empty($p)) $initials .= strtoupper($p[0]);
                  }
                  echo htmlspecialchars(substr($initials, 0, 2));
                ?>
              </div>
              <div>
                <div class="font-extrabold text-xs text-carbon"><?php echo htmlspecialchars($t['name']); ?></div>
                <div class="text-[11px] text-stoneMuted"><?php echo htmlspecialchars($t['role']); ?></div>
              </div>
            </div>
            
            <div class="text-right">
              <div class="text-[11px] font-bold text-carbon"><?php echo htmlspecialchars($t['branch']); ?></div>
              <div class="text-[10px] text-stoneMuted">Frame: <strong class="text-carbon"><?php echo htmlspecialchars($t['frame']); ?></strong></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- CTA BANNER (CARBON & NEON LIME ACCENTS) -->
    <div class="bg-carbon text-canvas rounded-3xl p-8 sm:p-12 text-center max-w-3xl mx-auto shadow-xl relative overflow-hidden border border-borderSubtle">
      <div class="absolute -top-10 -right-10 w-48 h-48 bg-neonLime/20 rounded-full blur-3xl pointer-events-none"></div>

      <span class="text-[10px] font-black uppercase tracking-[0.2em] text-neonLime mb-2 block">✦ LAYANAN MATA RAMAH & TERPERCAYA</span>
      <h3 class="text-2xl sm:text-3xl font-black text-white mb-3">Ingin Merasakan Penglihatan Nyaman?</h3>
      <p class="text-xs sm:text-sm text-stone-300 mb-8 max-w-lg mx-auto leading-relaxed">
        Konsultasikan resep kacamata Anda secara gratis via WhatsApp atau kunjungi cabang kami di Singkawang dan Mempawah.
      </p>

      <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="https://wa.me/62895708675050?text=Halo%20Optik%20Mario,%20saya%20ingin%20konsultasi%20kacamata" 
           target="_blank" rel="noopener"
           class="inline-flex items-center gap-2 bg-neonLime hover:bg-neonLimeHover text-carbon text-xs sm:text-sm font-black uppercase tracking-wider px-8 py-3.5 rounded-full transition shadow-md">
          <i class="fa-brands fa-whatsapp text-base"></i>
          <span>Chat WA Mempawah (0895 7086 75050)</span>
        </a>

        <a href="https://wa.me/62895320119379?text=Halo%20Optik%20Mario,%20saya%20ingin%20konsultasi%20kacamata" 
           target="_blank" rel="noopener"
           class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white text-xs sm:text-sm font-bold uppercase tracking-wider px-6 py-3.5 rounded-full border border-white/20 transition">
          <i class="fa-brands fa-whatsapp text-neonLime text-base"></i>
          <span>WA Singkawang (0895 3201 19379)</span>
        </a>
      </div>
    </div>

  </div>
</section>
