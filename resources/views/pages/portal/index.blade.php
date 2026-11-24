<section class="py-8 sm:py-14 bg-canvas">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- HEADER -->
    <div class="max-w-3xl mb-12">
      <div class="inline-flex items-center gap-2 text-[10px] sm:text-[11px] font-bold tracking-[0.18em] uppercase text-forest bg-forest-soft px-3 py-1.5 rounded mb-3">
        Edukasi & Wawasan Optik
      </div>
      <h1 class="text-3xl sm:text-5xl font-extrabold text-charcoal tracking-tight mb-4">
        Portal Informasi & Kesehatan Mata
      </h1>
      <p class="text-xs sm:text-base text-slate-muted leading-relaxed">
        Kumpulan panduan praktis dari tim Optik Mario mengenai cara memilih kacamata yang pas, mengenal ragam teknologi lensa, hingga kebiasaan sehari-hari untuk menjaga kesehatan mata Anda.
      </p>
    </div>

    <!-- ARTICLES GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
      <?php foreach ($articles as $art): ?>
        <article class="bg-white rounded-2xl border border-border-subtle overflow-hidden flex flex-col justify-between hover:border-forest/50 transition duration-200">
          <div>
            <div class="aspect-[16/10] bg-canvas overflow-hidden">
              <img src="<?php echo $art['image']; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>" class="w-full h-full object-cover img-zoom">
            </div>
            
            <div class="p-5">
              <div class="flex items-center justify-between text-[10px] font-bold text-forest uppercase tracking-wider mb-2">
                <span><?php echo $art['category']; ?></span>
                <span class="text-slate-muted font-normal"><?php echo $art['read_time']; ?></span>
              </div>

              <h2 class="text-sm sm:text-base font-bold text-charcoal leading-snug mb-3 hover:text-forest transition">
                <a href="<?php echo route_url('/portal/' . $art['slug']); ?>">
                  <?php echo $art['title']; ?>
                </a>
              </h2>

              <p class="text-xs text-slate-muted line-clamp-3 leading-relaxed">
                <?php echo $art['excerpt']; ?>
              </p>
            </div>
          </div>

          <div class="p-5 pt-0 border-t border-border-subtle/50 mt-4 flex items-center justify-between">
            <span class="text-[11px] text-slate-muted"><?php echo $art['date']; ?></span>
            <a href="<?php echo route_url('/portal/' . $art['slug']); ?>" class="text-xs font-bold text-forest hover:underline">
              Baca Artikel →
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>
