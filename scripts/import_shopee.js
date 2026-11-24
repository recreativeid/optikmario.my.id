const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

const jsonPath = path.join(__dirname, '..', 'shopee_products_merged.json');
const productsDir = path.join(__dirname, '..', 'public', 'images', 'products');

if (!fs.existsSync(productsDir)) {
  fs.mkdirSync(productsDir, { recursive: true });
}

if (!fs.existsSync(jsonPath)) {
  console.error('File shopee_products_merged.json tidak ditemukan!');
  process.exit(1);
}

const rawData = fs.readFileSync(jsonPath, 'utf8');
const items = JSON.parse(rawData);

console.log(`Mengkonfigurasi ${items.length} produk Shopee Luniva...`);

function slugify(text) {
  return text
    .toString()
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, '-')
    .replace(/(^-|-$)+/g, '')
    .substring(0, 55);
}

function cleanPrice(priceStr) {
  if (typeof priceStr === 'number') return priceStr;
  if (!priceStr) return 0;
  const num = priceStr.toString().replace(/[^\d]/g, '');
  return parseInt(num, 10) || 0;
}

function formatPriceRupiah(num) {
  return 'Rp ' + num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

function determineCategory(name) {
  const nameLower = name.toLowerCase();
  if (nameLower.includes('lensa') || nameLower.includes('progresif') || nameLower.includes('bluechromic') || nameLower.includes('bluray') || nameLower.includes('photochromic')) {
    return { category: 'lensa-kacamata', categoryName: 'Lensa Kacamata' };
  }
  if (nameLower.includes('baca') || nameLower.includes('katarak')) {
    return { category: 'kacamata-khusus', categoryName: 'Kacamata Baca & Khusus' };
  }
  if (nameLower.includes('cleaner') || nameLower.includes('lap') || nameLower.includes('antifog') || nameLower.includes('nosepad') || nameLower.includes('box') || nameLower.includes('tissue') || nameLower.includes('case')) {
    return { category: 'aksesoris', categoryName: 'Aksesori & Anti-Fog' };
  }
  return { category: 'frame-kacamata', categoryName: 'Frame Kacamata' };
}

function inferShape(name) {
  const nl = name.toLowerCase();
  if (nl.includes('cat eye') || nl.includes('cateye')) return 'Cat-Eye Modern';
  if (nl.includes('hexagon')) return 'Hexagonal Geometris';
  if (nl.includes('round') || nl.includes('bulat')) return 'Round / Lingkar Klasik';
  if (nl.includes('aviator')) return 'Aviator Pilot Classic';
  if (nl.includes('kotak') || nl.includes('square')) return 'Square Modern';
  if (nl.includes('persegi')) return 'Rectangular Formal';
  if (nl.includes('katarak')) return 'Wrap-Around Protective';
  if (nl.includes('baca')) return 'Slim Rectangular';
  if (nl.includes('lensa')) return 'Precision Edging Digital';
  if (nl.includes('cleaner') || nl.includes('lap') || nl.includes('tissue')) return 'Aksesori Perawatan Lensa';
  return 'Modern Ergonomic';
}

function inferMaterial(name) {
  const nl = name.toLowerCase();
  if (nl.includes('asetat') || nl.includes('cobra') || nl.includes('young')) return 'Handcrafted Premium Cellulose Acetate';
  if (nl.includes('plastik') || nl.includes('ebony') || nl.includes('arkema') || nl.includes('faye')) return 'High-Grade TR90 Ultra-Lentur';
  if (nl.includes('kids') || nl.includes('anak')) return 'Silikon Food-Grade & TR Lentur Anti-Patah';
  if (nl.includes('bluechromic')) return 'Dual Hybrid 420nm Blue Block & UV Transition Matrix';
  if (nl.includes('photochromic')) return 'Fast UV Transition Molecule Matrix (Clear to Dark)';
  if (nl.includes('progresif')) return 'Free-Form Digital Backside Progressive';
  if (nl.includes('bluray')) return 'High-Index 1.56 Blue Shield Anti-Glare';
  if (nl.includes('clear')) return 'CR-39 Multi-Coated Hard Anti-Scratch';
  if (nl.includes('cleaner')) return 'Formula Cairan Pembersih Lensa Lembut Anti Jamur';
  if (nl.includes('antifog') || nl.includes('lap')) return 'Kain Mikrofiber Nano Anti Embun Reusable';
  if (nl.includes('nosepad')) return 'Medical-Grade Soft Air Cushion Silicone';
  if (nl.includes('tissue')) return 'Wet Wipes Steril Cepat Kering Anti Gores';
  if (nl.includes('box')) return 'Plastik Polimer Tebal Penahan Benturan';
  return 'Asetat & Titanium Alloy Berkualitas Tinggi';
}

// Check which products should be featured on the homepage (best seller frames & lenses)
function isFeaturedProduct(title) {
  const tl = title.toLowerCase();
  if (tl.includes('young horien') || 
      tl.includes('cobra b007') || 
      tl.includes('republik 8807') || 
      tl.includes('republik 8808') || 
      tl.includes('arkema 6084') || 
      tl.includes('ebony 8128') || 
      tl.includes('xyara') || 
      tl.includes('faye 8503') || 
      tl.includes('bluechromic') || 
      tl.includes('progresif multifokus')) {
    return true;
  }
  return false;
}

const processedProducts = [];

items.forEach((item, index) => {
  const rawTitle = item.title ? item.title.trim().replace(/\s+/g, ' ') : `Produk Luniva ${index + 1}`;
  const slug = slugify(rawTitle);
  const priceNum = cleanPrice(item.price);
  const priceFormatted = formatPriceRupiah(priceNum);
  const shopeeUrl = item.shopee_url ? item.shopee_url.split('?')[0] : 'https://shopee.co.id/lunivaeyewear';

  const imgFilename = `${slug}.jpg`;
  const imgLocalPath = path.join(productsDir, imgFilename);
  const imgWebPath = `/optikmario.my.id/public/images/products/${imgFilename}`;

  // If image does not exist yet, download it
  if (!fs.existsSync(imgLocalPath)) {
    let rawImg = item.image_url || '';
    if (rawImg.startsWith('//')) rawImg = 'https:' + rawImg;
    let fullResImg = rawImg
      .replace(/@resize_w\d+_[a-z0-9]+\.webp$/i, '')
      .replace(/_tn(\.[a-z0-9]+)?(\?.*)?$/i, '')
      .replace(/_tn$/i, '');
    try {
      execSync(`curl.exe -s -L -o "${imgLocalPath}" "${fullResImg}"`);
    } catch (e) {}
  }

  const { category, categoryName } = determineCategory(rawTitle);
  const shape = inferShape(rawTitle);
  const material = inferMaterial(rawTitle);
  const featured = isFeaturedProduct(rawTitle);
  
  let weight = '15.5 gram';
  if (category === 'lensa-kacamata') weight = 'High Index Tipis';
  else if (category === 'aksesoris') weight = 'Praktis & Ringan';
  else if (rawTitle.toLowerCase().includes('kids')) weight = '11.0 gram';
  else if (rawTitle.toLowerCase().includes('cobra') || rawTitle.toLowerCase().includes('young')) weight = '24.0 gram';

  const desc = `Koleksi original ${rawTitle}. Produk resmi Luniva Eyewear yang terjamin keaslian dan presisinya, siap dikombinasikan dengan pemasangan lensa berstandar optometri resmi di Optik Mario Singkawang & Mempawah.`;

  processedProducts.push({
    id: index + 1,
    slug: slug,
    name: rawTitle,
    category: category,
    category_name: categoryName,
    price: priceNum,
    price_formatted: priceFormatted,
    material: material,
    shape: shape,
    weight: weight,
    colors_available: ['Hitam Glossy', 'Abu-Abu Transparan', 'Tortoise Vintage'],
    shopee_url: shopeeUrl,
    image: imgWebPath,
    model_image: imgWebPath,
    description: desc,
    is_featured: featured,
    gallery: [imgWebPath],
    measurements: {
      lens_width: '51 mm',
      bridge: '18 mm',
      temple: '145 mm',
      frame_width: '138 mm',
      lens_height: '42 mm'
    },
    inclusions: [
      'Hardcase Kotak Kacamata Luniva Eksklusif',
      'Lap Pembersih Lensa Mikrofiber Halus',
      'Kartu Garansi Resmi & Pemasangan Lensa Optik Mario',
      'Free Service Penyetelan Frame Berkala'
    ]
  });
});

// Update config/optik.php
const configPath = path.join(__dirname, '..', 'config', 'optik.php');
let configContent = fs.readFileSync(configPath, 'utf8');

const phpArrayParts = processedProducts.map((p, idx) => {
  return `    ${idx} => \n    array (\n` +
    `      'id' => ${p.id},\n` +
    `      'slug' => '${p.slug}',\n` +
    `      'name' => '${p.name.replace(/'/g, "\\'")}',\n` +
    `      'category' => '${p.category}',\n` +
    `      'category_name' => '${p.category_name}',\n` +
    `      'price' => ${p.price},\n` +
    `      'price_formatted' => '${p.price_formatted}',\n` +
    `      'material' => '${p.material.replace(/'/g, "\\'")}',\n` +
    `      'shape' => '${p.shape.replace(/'/g, "\\'")}',\n` +
    `      'weight' => '${p.weight}',\n` +
    `      'colors_available' => \n      array (\n        0 => 'Hitam Glossy',\n        1 => 'Abu-Abu Transparan',\n        2 => 'Tortoise Vintage',\n      ),\n` +
    `      'shopee_url' => '${p.shopee_url}',\n` +
    `      'image' => '${p.image}',\n` +
    `      'model_image' => '${p.model_image}',\n` +
    `      'description' => '${p.description.replace(/'/g, "\\'")}',\n` +
    `      'is_featured' => ${p.is_featured ? 'true' : 'false'},\n` +
    `      'gallery' => \n      array (\n        0 => '${p.image}',\n      ),\n` +
    `      'measurements' => \n      array (\n        'lens_width' => '51 mm',\n        'bridge' => '18 mm',\n        'temple' => '145 mm',\n        'frame_width' => '138 mm',\n        'lens_height' => '42 mm',\n      ),\n` +
    `      'inclusions' => \n      array (\n        0 => 'Hardcase Kotak Kacamata Luniva Eksklusif',\n        1 => 'Lap Pembersih Lensa Mikrofiber Halus',\n        2 => 'Kartu Garansi Resmi & Pemasangan Lensa Optik Mario',\n        3 => 'Free Service Penyetelan Frame Berkala',\n      ),\n` +
    `    ),`;
}).join('\n');

const newProductsBlock = `'products' => \n  array (\n${phpArrayParts}\n  ),`;

const regex = /'products'\s*=>\s*array\s*\([\s\S]*?\n  \),\n  'services'/;
if (regex.test(configContent)) {
  configContent = configContent.replace(regex, `${newProductsBlock}\n  'services'`);
  fs.writeFileSync(configPath, configContent, 'utf8');
  console.log(`✅ config/optik.php sukses diperbarui!`);
}

// Re-generate HTML
try {
  console.log('Meregenerasi halaman HTML...');
  execSync('C:\\xampp\\php\\php.exe export_html.php', { stdio: 'inherit', cwd: path.join(__dirname, '..') });
} catch (e) {
  console.warn('Gagal mengekspor HTML otomatis:', e.message);
}
