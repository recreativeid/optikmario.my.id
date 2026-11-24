// ==============================================================================
// SCRIPT EKSTRAKTOR PRODUK & FOTO HD SHOPEE LUNIVA EYEWEAR
// ==============================================================================
// Cara Pakai:
// 1. Buka browser Anda di halaman: https://shopee.co.id/lunivaeyewear?page=1&sortBy=pop&tab=0
//    (Scroll halaman ke bawah agar semua produk muncul / termuat sempurna).
// 2. Tekan tombol F12 pada keyboard (atau Klik Kanan -> Inspect -> tab 'Console').
// 3. Salin (Copy) seluruh kode di bawah ini, lalu Paste di Console dan tekan ENTER.
// 4. File "shopee_products.json" akan OTOMATIS terdownload di folder Downloads Anda!
// ==============================================================================

(() => {
  const items = [];
  const seenUrls = new Set();
  
  // Mencari semua link produk Shopee
  const links = Array.from(document.querySelectorAll('a[href*="-i."], a[href*="i.1511744249"]'));
  
  links.forEach(a => {
    let href = a.href;
    if (!href || seenUrls.has(href)) return;
    
    // Ambil elemen gambar
    const img = a.querySelector('img');
    let imgSrc = img ? (img.currentSrc || img.src || img.getAttribute('data-src') || '') : '';
    
    // Ambil URL resolusi tinggi (hapus suffix _tn)
    let fullImgSrc = imgSrc.replace(/_tn(\.[a-z0-9]+)?(\?.*)?$/i, '').replace(/_tn$/i, '');
    if (fullImgSrc.startsWith('//')) {
      fullImgSrc = 'https:' + fullImgSrc;
    }
    
    // Ambil judul produk
    let title = (img && img.alt) ? img.alt.trim() : '';
    if (!title || title.length < 3) {
      const texts = Array.from(a.querySelectorAll('div, span, p'))
        .map(el => el.innerText ? el.innerText.trim() : '')
        .filter(t => t.length > 5 && !t.startsWith('Rp') && !t.includes('%') && !t.includes('Terjual') && !t.includes('Diskon'));
      if (texts.length > 0) title = texts[0];
    }
    
    // Ambil harga produk
    let price = '';
    const allText = a.innerText || '';
    const priceMatch = allText.match(/Rp\s*([\d\.]+)/);
    if (priceMatch) {
      price = priceMatch[0];
    }
    
    if (title && href && fullImgSrc) {
      seenUrls.add(href);
      items.push({
        title: title,
        price: price,
        shopee_url: href,
        image_url: fullImgSrc
      });
    }
  });

  if (items.length === 0) {
    alert("Belum ada produk yang terdeteksi. Silakan scroll halaman ke bawah agar produk termuat, lalu jalankan script ini kembali.");
    return;
  }

  const jsonStr = JSON.stringify(items, null, 2);
  
  // Otomatis download file shopee_products.json
  const blob = new Blob([jsonStr], { type: 'application/json' });
  const url = URL.createObjectURL(blob);
  const a = document.createElement('a');
  a.href = url;
  a.download = 'shopee_products.json';
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  URL.revokeObjectURL(url);

  // Juga copy ke clipboard
  if (navigator.clipboard) {
    navigator.clipboard.writeText(jsonStr);
  }

  console.log(`✅ BERHASIL! Ditemukan ${items.length} produk Shopee lengkap dengan link gambar HD!`);
  alert(`✅ BERHASIL!\n\nSebanyak ${items.length} produk Shopee beserta link gambar HD asli telah tersimpan ke file "shopee_products.json" di folder Downloads Anda.\n\nCukup pindahkan file tersebut ke folder project website Anda, atau paste teksnya ke chat!`);
})();
