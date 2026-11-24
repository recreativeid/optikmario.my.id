<section class="py-8 sm:py-14 bg-canvas">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- BREADCRUMBS -->
    <nav class="flex items-center gap-2 text-xs text-slate-muted mb-8">
      <a href="<?php echo route_url('/'); ?>" class="hover:text-forest">Beranda</a>
      <span>/</span>
      <a href="<?php echo route_url('/portal'); ?>" class="hover:text-forest">Portal Edukasi</a>
      <span>/</span>
      <span class="text-charcoal font-semibold line-clamp-1"><?php echo htmlspecialchars($article['title']); ?></span>
    </nav>

    <!-- ARTICLE HEADER -->
    <div class="mb-8">
      <div class="flex items-center gap-3 text-xs text-forest font-bold mb-3">
        <span class="bg-forest-soft px-3 py-1 rounded"><?php echo $article['category']; ?></span>
        <span class="text-slate-muted font-normal">• <?php echo $article['read_time']; ?></span>
        <span class="text-slate-muted font-normal">• <?php echo $article['date']; ?></span>
      </div>

      <h1 class="text-2xl sm:text-4xl font-extrabold text-charcoal tracking-tight leading-snug mb-4">
        <?php echo $article['title']; ?>
      </h1>

      <p class="text-sm sm:text-base text-slate-muted italic border-l-2 border-forest pl-4 py-1">
        <?php echo $article['excerpt']; ?>
      </p>
    </div>

    <!-- FEATURED IMAGE -->
    <div class="rounded-2xl overflow-hidden aspect-[16/9] bg-white border border-border-subtle mb-10 shadow-sm">
      <img src="<?php echo $article['image']; ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="w-full h-full object-cover">
    </div>

    <!-- ARTICLE CONTENT -->
    <div class="bg-white p-6 sm:p-10 rounded-2xl border border-border-subtle shadow-sm mb-12 text-charcoal text-sm leading-relaxed space-y-5">
      <p>
        <?php echo nl2br(htmlspecialchars($article['content'])); ?>
      </p>

      <div class="mt-8 pt-6 border-t border-border-subtle bg-canvas p-5 rounded-xl">
        <h4 class="text-xs font-bold uppercase tracking-wider text-charcoal mb-2">Pesan Kesehatan dari Optik Mario:</h4>
        <p class="text-xs text-slate-muted leading-relaxed">
          Pemeriksaan mata secara berkala setiap 6 hingga 12 bulan sekali sangat disarankan untuk memastikan kondisi visus Anda tetap optimal. Kunjungi Optik Mario Singkawang atau Mempawah untuk periksa refraksi mata gratis saat pemasangan lensa.
        </p>
      </div>
    </div>

    <!-- SHARE & CONSULTATION CTA -->
    <div class="bg-forest-dark text-white p-6 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
      <div>
        <div class="font-bold text-sm">Punya Pertanyaan Mengenai Kesehatan Mata Anda?</div>
        <div class="text-xs text-white/70">Tim optometri kami siap berdiskusi langsung dengan Anda via WhatsApp.</div>
      </div>
      <a href="https://wa.me/62895708675050?text=Halo%20Optik%20Mario,%20saya%20membaca%20artikel%20<?php echo urlencode($article['title']); ?>%20dan%20ingin%20konsultasi" 
         target="_blank" rel="noopener"
         class="inline-flex items-center gap-2 bg-[#27945D] hover:bg-[#1f7c4c] text-white text-xs font-bold px-5 py-2.5 rounded-md transition whitespace-nowrap">
        <i class="fa-brands fa-whatsapp text-sm"></i>
        <span>Chat Tim Ahli</span>
      </a>
    </div>

  </div>
</section>
