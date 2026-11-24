<div class="product-item group bg-surface rounded-3xl p-3.5 sm:p-4 border border-borderSubtle hover:shadow-xl transition-all duration-300 flex flex-col justify-between"
     data-category="<?php echo htmlspecialchars($product['category'] ?? ''); ?>"
     data-title="<?php echo strtolower(htmlspecialchars($product['name'])); ?>"
     data-shape="<?php echo strtolower(htmlspecialchars($product['shape'] ?? '')); ?>">
  
  <div>
    <!-- Product Image Container: Klik membuka Halaman Resmi Shopee Luniva -->
    <a href="<?php echo htmlspecialchars($product['shopee_url']); ?>" target="_blank" rel="noopener"
       class="block relative rounded-2xl overflow-hidden aspect-[4/5] bg-canvas mb-3.5 group-hover:opacity-95 transition cursor-pointer"
       title="Lihat detail & beli di Shopee: <?php echo htmlspecialchars($product['name']); ?>">
      
      <img src="<?php echo htmlspecialchars($product['image']); ?>" 
           onerror="this.onerror=null; if(this.src.includes('/optikmario.my.id/')) this.src=this.src.replace('/optikmario.my.id/', '/'); else this.src='/optikmario.my.id'+this.getAttribute('src');"
           alt="<?php echo htmlspecialchars($product['name']); ?>" 
           loading="lazy"
           class="w-full h-full object-cover object-center img-zoom">
      
      <!-- Hover Overlay Badge: Buka Detail Shopee -->
      <div class="absolute inset-0 bg-carbon/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
        <span class="bg-carbon/90 text-canvas text-[11px] font-bold px-3.5 py-1.5 rounded-full shadow-lg flex items-center gap-1.5 backdrop-blur-sm transform group-hover:scale-105 transition">
          <i class="fa-solid fa-store text-[11px] text-neonLime"></i>
          <span>Lihat Produk di Shopee</span>
        </span>
      </div>

      <!-- Top-Right Shopee Direct Button -->
      <a href="<?php echo htmlspecialchars($product['shopee_url']); ?>" target="_blank" rel="noopener" 
         class="absolute top-3 right-3 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/90 hover:bg-orange-500 hover:text-white text-orange-600 flex items-center justify-center transition shadow-sm backdrop-blur-sm z-10"
         title="Beli langsung di Shopee: <?php echo htmlspecialchars($product['name']); ?>">
        <i class="fa-solid fa-store text-xs"></i>
      </a>

      <!-- Bottom-Left Star Rating Pill -->
      <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur-md px-2.5 py-1 rounded-full flex items-center gap-1 text-[11px] font-bold text-carbon shadow-sm pointer-events-none">
        <i class="fa-solid fa-star text-amber-500 text-[10px]"></i>
        <span>4.9</span>
      </div>
    </a>

    <!-- Product Info (Title, Subtitle Specs, Price) -->
    <div class="px-1 mb-2">
      <div class="flex items-center justify-between gap-2 mb-1">
        <a href="<?php echo htmlspecialchars($product['shopee_url']); ?>" target="_blank" rel="noopener"
           class="font-extrabold text-sm sm:text-base text-carbon hover:text-stoneMuted transition line-clamp-1" 
           title="<?php echo htmlspecialchars($product['name']); ?>">
          <?php echo htmlspecialchars($product['name']); ?>
        </a>
        <span class="text-sm sm:text-base font-black text-carbon shrink-0">
          <?php echo htmlspecialchars($product['price_formatted']); ?>
        </span>
      </div>
      
      <p class="text-xs text-stoneMuted line-clamp-1 mb-3">
        <?php echo htmlspecialchars($product['shape']); ?> · <?php echo htmlspecialchars($product['material']); ?>
      </p>
    </div>
  </div>

  <!-- Action Buttons: Detail, Shopee, and WhatsApp -->
  <div class="pt-2.5 border-t border-borderSubtle/60 flex items-center gap-1.5">
    <!-- Detail Page Link to Shopee -->
    <a href="<?php echo htmlspecialchars($product['shopee_url']); ?>" target="_blank" rel="noopener"
       class="flex-1 text-center py-2 px-1.5 rounded-full bg-canvas hover:bg-white text-carbon font-bold text-[11px] transition border border-borderSubtle flex items-center justify-center gap-1 shadow-xs">
      <i class="fa-solid fa-eye text-[10px] text-stoneMuted"></i>
      <span>Detail</span>
    </a>

    <!-- Shopee Direct Button -->
    <a href="<?php echo htmlspecialchars($product['shopee_url']); ?>" 
       target="_blank" rel="noopener" 
       class="flex-1 text-center py-2 px-1.5 rounded-full bg-orange-50 hover:bg-orange-100 text-orange-700 font-bold text-[11px] transition border border-orange-200 flex items-center justify-center gap-1 shadow-xs">
      <i class="fa-solid fa-store text-[10px] text-orange-600"></i>
      <span>Shopee</span>
    </a>

    <!-- WhatsApp Order Button -->
    <a href="https://wa.me/62895708675050?text=Halo%20Optik%20Mario,%20saya%20tertarik%20dengan%20kacamata%20<?php echo urlencode($product['name']); ?>%20(Harga%20<?php echo urlencode($product['price_formatted']); ?>).%20Apakah%20bisa%20sekalian%20pasang%20lensa%20resep?" 
       target="_blank" rel="noopener" 
       class="flex-1 text-center py-2 px-1.5 rounded-full bg-carbon hover:bg-black text-canvas font-bold text-[11px] transition flex items-center justify-center gap-1 shadow-sm">
      <i class="fa-brands fa-whatsapp text-xs text-neonLime"></i>
      <span>WA</span>
    </a>
  </div>

</div>
