<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<style>
    /* ===== HERO SECTION ===== */
    .hero-section {
        margin-bottom: 40px;
    }
    
    .hero-slider {
        background: linear-gradient(135deg, rgba(17, 34, 64, 0.9), rgba(10, 25, 47, 0.95));
        border-radius: 15px;
        overflow: hidden;
        position: relative;
        height: 300px;
        border: 1px solid var(--color-border);
    }
    
    .hero-slide {
        display: none;
        height: 100%;
        padding: 40px;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .hero-slide.active {
        display: block;
    }
    
    .hero-slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, rgba(10, 25, 47, 0.9) 0%, transparent 100%);
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 600px;
        color: white;
    }
    
    .hero-tag {
        display: inline-block;
        background: var(--gradient-danger);
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    
    .hero-title {
        font-size: 36px;
        font-weight: 800;
        margin-bottom: 15px;
        line-height: 1.2;
    }
    
    .hero-description {
        font-size: 16px;
        margin-bottom: 25px;
        opacity: 0.9;
    }
    
    .hero-button {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 30px;
        background: var(--gradient-primary);
        color: var(--color-navy);
        text-decoration: none;
        border-radius: 10px;
        font-weight: 700;
        transition: all 0.3s ease;
    }
    
    .hero-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 255, 204, 0.3);
    }
    
    .slider-dots {
        position: absolute;
        bottom: 20px;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        gap: 10px;
        z-index: 3;
    }
    
    .slider-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .slider-dot.active {
        background: var(--color-teal);
        width: 30px;
        border-radius: 6px;
    }
    
    /* ===== ANNOUNCEMENT BANNER ===== */
    .announcement-section {
        margin-bottom: 40px;
    }
    
    /* ===== FEATURED PRODUCTS ===== */
    .section-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--color-border);
    }
    
    .section-title h2 {
        font-size: 24px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .section-title h2 i {
        color: var(--color-teal);
    }
    
    .view-all {
        color: var(--color-teal);
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }
    
    .product-card {
        background: linear-gradient(135deg, rgba(17, 34, 64, 0.8), rgba(10, 25, 47, 0.9));
        border-radius: 15px;
        padding: 20px;
        border: 1px solid var(--color-border);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        border-color: var(--color-teal);
        box-shadow: 0 15px 30px rgba(0, 255, 204, 0.1);
    }
    
    .product-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--gradient-danger);
        color: white;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        z-index: 1;
    }
    
    .product-image {
        height: 120px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        overflow: hidden;
    }
    
    .product-image i {
        font-size: 50px;
        color: var(--color-teal);
        opacity: 0.7;
    }
    
    .product-category {
        display: inline-block;
        background: rgba(0, 255, 204, 0.1);
        color: var(--color-teal);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .product-name {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
        line-height: 1.4;
    }
    
    .product-price {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }
    
    .current-price {
        font-size: 20px;
        font-weight: 700;
        color: var(--color-teal);
    }
    
    .original-price {
        font-size: 14px;
        color: var(--color-text-muted);
        text-decoration: line-through;
    }
    
    .product-stock {
        font-size: 12px;
        color: var(--color-text-secondary);
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .product-stock.in-stock {
        color: var(--color-success);
    }
    
    .product-stock.low-stock {
        color: var(--color-warning);
    }
    
    .product-button {
        width: 100%;
        padding: 10px;
        background: linear-gradient(135deg, rgba(0, 255, 204, 0.1), rgba(0, 255, 204, 0.05));
        border: 1px solid var(--color-teal);
        color: var(--color-teal);
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .product-button:hover {
        background: var(--color-teal);
        color: var(--color-navy);
    }
    
    /* ===== CATEGORIES ===== */
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }
    
    .category-card {
        background: linear-gradient(135deg, rgba(17, 34, 64, 0.8), rgba(10, 25, 47, 0.9));
        border-radius: 15px;
        padding: 25px 20px;
        border: 1px solid var(--color-border);
        text-align: center;
        text-decoration: none;
        color: var(--color-text-primary);
        transition: all 0.3s ease;
    }
    
    .category-card:hover {
        transform: translateY(-5px);
        border-color: var(--color-purple);
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(10, 25, 47, 0.9));
    }
    
    .category-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-purple);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin: 0 auto 15px;
        color: white;
    }
    
    .category-name {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
    }
    
    .category-count {
        font-size: 12px;
        color: var(--color-text-secondary);
    }
    
    /* ===== FEATURES ===== */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 50px;
    }
    
    .feature-card {
        background: linear-gradient(135deg, rgba(17, 34, 64, 0.8), rgba(10, 25, 47, 0.9));
        border-radius: 15px;
        padding: 25px;
        border: 1px solid var(--color-border);
        text-align: center;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        border-color: var(--color-teal);
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-primary);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin: 0 auto 20px;
        color: var(--color-navy);
    }
    
    .feature-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
        color: var(--color-text-primary);
    }
    
    .feature-description {
        font-size: 14px;
        color: var(--color-text-secondary);
        line-height: 1.5;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 28px;
        }
        
        .hero-slide {
            padding: 30px 20px;
        }
        
        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
        
        .categories-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        }
    }
    
    @media (max-width: 480px) {
        .hero-title {
            font-size: 24px;
        }
        
        .hero-description {
            font-size: 14px;
        }
        
        .products-grid {
            grid-template-columns: 1fr;
        }
        
        .section-title {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>

<!-- ANNOUNCEMENT BANNER (Admin bisa edit) -->
<div class="announcement-section">
    <div class="announcement-banner">
        <div class="announcement-content">
            <div class="announcement-text">
                <i class="fas fa-fire announcement-icon"></i>
                <div>
                    <div class="announcement-title">🎮 GAS GACHA The Dahlia & Firefly!</div>
                    <div class="announcement-desc">Express Supply Pass - DISKON HINGGA 50% untuk semua produk game!</div>
                </div>
            </div>
            <div class="announcement-date">17-21 Dec 2024</div>
            <button class="announcement-close" onclick="closeAnnouncement('main')">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>

<!-- HERO SLIDER -->
<div class="hero-section">
    <div class="hero-slider">
        <div class="hero-slide active" style="background-image: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="hero-content">
                <span class="hero-tag">🔥 Hot Deal</span>
                <h1 class="hero-title">Top Up Game Murah & Cepat</h1>
                <p class="hero-description">Diamond, UC, Crystal, dan semua item game dengan harga termurah. Proses instan 1-5 menit!</p>
                <a href="/products" class="hero-button">
                    <i class="fas fa-gamepad"></i>
                    Top Up Sekarang
                </a>
            </div>
        </div>
        
        <div class="hero-slide" style="background-image: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="hero-content">
                <span class="hero-tag">🎉 Promo</span>
                <h1 class="hero-title">Diskon Hingga 50%</h1>
                <p class="hero-description">Promo spesial untuk member baru! Voucher, subscription, dan produk digital diskon besar-besaran.</p>
                <a href="/promo" class="hero-button">
                    <i class="fas fa-gift"></i>
                    Lihat Promo
                </a>
            </div>
        </div>
        
        <div class="hero-slide" style="background-image: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <div class="hero-content">
                <span class="hero-tag">⚡ Express</span>
                <h1 class="hero-title">Jasa Digital Professional</h1>
                <p class="hero-description">Design, programming, editing video, dan berbagai jasa digital dengan kualitas terbaik.</p>
                <a href="/services" class="hero-button">
                    <i class="fas fa-laptop-code"></i>
                    Explore Jasa
                </a>
            </div>
        </div>
        
        <div class="slider-dots">
            <button class="slider-dot active" onclick="showSlide(0)"></button>
            <button class="slider-dot" onclick="showSlide(1)"></button>
            <button class="slider-dot" onclick="showSlide(2)"></button>
        </div>
    </div>
</div>

<!-- FEATURED PRODUCTS -->
<div class="products-section">
    <div class="section-title">
        <h2><i class="fas fa-star"></i> Produk Terlaris</h2>
        <a href="/products" class="view-all">
            Lihat Semua <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    
    <div class="products-grid">
        <?php foreach ($featuredProducts as $product): ?>
        <div class="product-card">
            <?php if ($product['discount'] > 0): ?>
            <div class="product-badge">-<?= $product['discount'] ?>%</div>
            <?php endif; ?>
            
            <div class="product-image">
                <i class="fas fa-gamepad"></i>
            </div>
            
            <div class="product-category"><?= $product['category'] ?></div>
            <h3 class="product-name"><?= esc($product['name']) ?></h3>
            
            <div class="product-price">
                <span class="current-price">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
                <?php if ($product['original_price'] > $product['price']): ?>
                <span class="original-price">Rp <?= number_format($product['original_price'], 0, ',', '.') ?></span>
                <?php endif; ?>
            </div>
            
            <div class="product-stock <?= $product['stock'] > 10 ? 'in-stock' : 'low-stock' ?>">
                <i class="fas fa-box"></i>
                Stok: <?= $product['stock'] ?> unit
            </div>
            
            <button class="product-button" onclick="addToCart(<?= $product['id'] ?>)">
                <i class="fas fa-cart-plus"></i> Beli Sekarang
            </button>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- CATEGORIES -->
<div class="categories-section">
    <div class="section-title">
        <h2><i class="fas fa-th-large"></i> Kategori Produk</h2>
        <a href="/categories" class="view-all">
            Semua Kategori <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    
    <div class="categories-grid">
        <a href="/products/game" class="category-card">
            <div class="category-icon">
                <i class="fas fa-gamepad"></i>
            </div>
            <div class="category-name">Top Up Game</div>
            <div class="category-count">150+ Produk</div>
        </a>
        
        <a href="/products/voucher" class="category-card">
            <div class="category-icon">
                <i class="fas fa-ticket-alt"></i>
            </div>
            <div class="category-name">Voucher</div>
            <div class="category-count">80+ Produk</div>
        </a>
        
        <a href="/products/subscription" class="category-card">
            <div class="category-icon">
                <i class="fas fa-crown"></i>
            </div>
            <div class="category-name">Subscription</div>
            <div class="category-count">40+ Produk</div>
        </a>
        
        <a href="/products/digital" class="category-card">
            <div class="category-icon">
                <i class="fas fa-laptop-code"></i>
            </div>
            <div class="category-name">Produk Digital</div>
            <div class="category-count">60+ Produk</div>
        </a>
        
        <a href="/products/services" class="category-card">
            <div class="category-icon">
                <i class="fas fa-tools"></i>
            </div>
            <div class="category-name">Jasa</div>
            <div class="category-count">120+ Jasa</div>
        </a>
    </div>
</div>

<!-- WHY CHOOSE US -->
<div class="features-section">
    <div class="section-title">
        <h2><i class="fas fa-check-circle"></i> Kenapa Pilih FENGMARKET?</h2>
    </div>
    
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-bolt"></i>
            </div>
            <h3 class="feature-title">Proses Instan</h3>
            <p class="feature-description">Pengiriman produk dalam 1-10 menit setelah pembayaran berhasil</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h3 class="feature-title">100% Aman</h3>
            <p class="feature-description">Transaksi terenkripsi dengan sistem keamanan terbaik</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-headset"></i>
            </div>
            <h3 class="feature-title">Support 24/7</h3>
            <p class="feature-description">Customer Service siap membantu kapan saja</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-tag"></i>
            </div>
            <h3 class="feature-title">Harga Termurah</h3>
            <p class="feature-description">Harga kompetitif dengan diskon rutin setiap minggu</p>
        </div>
    </div>
</div>

<!-- NEW PRODUCTS -->
<div class="products-section">
    <div class="section-title">
        <h2><i class="fas fa-rocket"></i> Produk Terbaru</h2>
        <a href="/products/new" class="view-all">
            Lihat Semua <i class="fas fa-arrow-right"></i>
        </a>
    </div>
    
    <div class="products-grid">
        <?php foreach ($newProducts as $product): ?>
        <div class="product-card">
            <?php if ($product['is_new']): ?>
            <div class="product-badge" style="background: var(--gradient-warning);">NEW</div>
            <?php endif; ?>
            
            <div class="product-image">
                <i class="fas fa-gem"></i>
            </div>
            
            <div class="product-category"><?= $product['category'] ?></div>
            <h3 class="product-name"><?= esc($product['name']) ?></h3>
            
            <div class="product-price">
                <span class="current-price">Rp <?= number_format($product['price'], 0, ',', '.') ?></span>
            </div>
            
            <div class="product-stock in-stock">
                <i class="fas fa-box"></i>
                Stok: <?= $product['stock'] ?> unit
            </div>
            
            <button class="product-button" onclick="addToCart(<?= $product['id'] ?>)">
                <i class="fas fa-cart-plus"></i> Beli Sekarang
            </button>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Hero Slider
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slider-dot');
    
    function showSlide(n) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        currentSlide = n;
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }
    
    // Auto slide every 5 seconds
    setInterval(nextSlide, 5000);
    
    // Add to cart function
    function addToCart(productId) {
        // Find product data
        const productData = {
            id: productId,
            name: 'Product ' + productId,
            price: 100000,
            quantity: 1
        };
        
        let cart = JSON.parse(localStorage.getItem('cart') || '[]');
        const existingIndex = cart.findIndex(item => item.id === productId);
        
        if (existingIndex >= 0) {
            cart[existingIndex].quantity += 1;
        } else {
            cart.push(productData);
        }
        
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
        
        // Show notification
        showNotification('Produk berhasil ditambahkan ke keranjang!');
    }
    
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--gradient-primary);
            color: var(--color-navy);
            padding: 15px 20px;
            border-radius: 10px;
            font-weight: 600;
            z-index: 9999;
            animation: slideIn 0.3s ease;
            box-shadow: 0 10px 25px rgba(0, 255, 204, 0.3);
        `;
        
        notification.innerHTML = `
            <i class="fas fa-check-circle"></i> ${message}
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
    
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
    `;
    document.head.appendChild(style);
</script>
<?= $this->endSection() ?>