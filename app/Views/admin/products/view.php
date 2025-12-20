<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<style>
    /* ===== VARIABEL WARNA ===== */
    :root {
        --color-navy: #0a192f;
        --color-navy-light: #112240;
        --color-teal: #00ffcc;
        --color-teal-light: #64ffda;
        --color-cyan: #08d9ff;
        --color-glow: rgba(0, 255, 204, 0.4);
        --color-text-primary: #e6f1ff;
        --color-text-secondary: #a8b2d1;
        --color-text-muted: #8892b0;
        --color-border: rgba(100, 255, 218, 0.15);
        --color-card-bg: rgba(17, 34, 64, 0.7);
        --color-danger: #ef4444;
        --color-warning: #f59e0b;
        --color-success: #10b981;
    }
    
    /* ===== BACKGROUND ===== */
    body {
        background: var(--color-navy);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        font-family: 'Inter', sans-serif;
    }
    
    body::before {
        content: '';
        position: fixed;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, 
            rgba(10, 25, 47, 0) 0%, 
            rgba(0, 255, 204, 0.08) 50%, 
            rgba(8, 217, 255, 0.05) 100%);
        filter: blur(80px);
        animation: floatBlob 25s infinite alternate ease-in-out;
        z-index: 0;
        top: -300px;
        left: -300px;
        pointer-events: none;
    }
    
    @keyframes floatBlob {
        0%, 100% { transform: translate(0, 0) scale(1); }
        50% { transform: translate(30px, -40px) scale(1.05); }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* ===== DASHBOARD WRAPPER ===== */
    .dashboard-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 25px;
        position: relative;
        z-index: 10;
    }
    
    /* ===== HEADER ===== */
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 35px;
        padding: 22px 30px;
        background: rgba(17, 34, 64, 0.85);
        backdrop-filter: blur(25px);
        border-radius: 18px;
        border: 1px solid var(--color-border);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        position: relative;
        animation: fadeIn 0.5s ease;
        overflow: hidden;
    }
    
    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            var(--color-teal) 25%, 
            var(--color-cyan) 50%,
            var(--color-teal) 75%,
            transparent 100%);
        animation: slideLine 3s infinite linear;
    }
    
    @keyframes slideLine {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    .header-title h1 {
        color: var(--color-text-primary);
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    
    .header-title p {
        color: var(--color-text-secondary);
        font-size: 15px;
        margin: 0;
        opacity: 0.9;
    }
    
    /* ===== DETAILS CONTAINER ===== */
    .details-container {
        background: var(--color-card-bg);
        backdrop-filter: blur(25px);
        border-radius: 18px;
        border: 1px solid var(--color-border);
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.35);
        animation: fadeIn 0.6s ease;
        margin-bottom: 40px;
    }
    
    .details-header {
        padding: 22px 30px;
        background: linear-gradient(135deg, rgba(10, 25, 47, 0.7), rgba(17, 34, 64, 0.8));
        border-bottom: 1px solid var(--color-border);
        position: relative;
    }
    
    .details-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: linear-gradient(to bottom, var(--color-teal), var(--color-cyan));
    }
    
    .details-header h2 {
        color: var(--color-text-primary);
        font-size: 20px;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
        padding-left: 10px;
    }
    
    .details-header h2 i {
        color: var(--color-teal);
        font-size: 18px;
    }
    
    /* ===== DETAILS CONTENT ===== */
    .details-content {
        padding: 30px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        position: relative;
    }
    
    /* Garis pembatas antar kolom */
    .details-content::before {
        content: '';
        position: absolute;
        top: 30px;
        bottom: 30px;
        left: 50%;
        width: 1px;
        background: linear-gradient(to bottom, 
            transparent 0%, 
            var(--color-border) 10%, 
            var(--color-border) 90%, 
            transparent 100%);
        transform: translateX(-50%);
    }
    
    /* ===== PRODUCT INFO SECTION ===== */
    .product-info-section {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
    
    .product-title {
        background: rgba(10, 25, 47, 0.3);
        border-radius: 14px;
        padding: 20px;
        border: 1px solid rgba(100, 255, 218, 0.1);
    }
    
    .product-title h3 {
        color: var(--color-text-primary);
        font-size: 24px;
        font-weight: 700;
        margin: 0 0 10px 0;
        line-height: 1.3;
    }
    
    .product-meta {
        display: flex;
        gap: 25px;
        margin-top: 15px;
        flex-wrap: wrap;
    }
    
    .meta-item {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    
    .meta-label {
        color: var(--color-text-secondary);
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .meta-label i {
        color: var(--color-teal);
        font-size: 12px;
    }
    
    .meta-value {
        color: var(--color-text-primary);
        font-size: 18px;
        font-weight: 700;
    }
    
    .price-tag {
        color: var(--color-teal);
        font-size: 22px;
        font-weight: 700;
    }
    
    .stock-indicator {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        margin-left: 10px;
    }
    
    .stock-in {
        background: rgba(16, 185, 129, 0.15);
        color: var(--color-success);
        border: 1px solid rgba(16, 185, 129, 0.3);
    }
    
    .stock-out {
        background: rgba(239, 68, 68, 0.15);
        color: var(--color-danger);
        border: 1px solid rgba(239, 68, 68, 0.3);
    }
    
    /* ===== DESCRIPTION SECTION ===== */
    .description-section {
        background: rgba(10, 25, 47, 0.3);
        border-radius: 14px;
        padding: 20px;
        border: 1px solid rgba(100, 255, 218, 0.1);
    }
    
    .section-title {
        color: var(--color-text-primary);
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--color-border);
    }
    
    .section-title i {
        color: var(--color-teal);
        font-size: 14px;
    }
    
    .description-content {
        color: var(--color-text-secondary);
        font-size: 15px;
        line-height: 1.7;
        white-space: pre-line;
    }
    
    .spec-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .spec-list li {
        padding: 8px 0;
        padding-left: 20px;
        position: relative;
        color: var(--color-text-secondary);
        font-size: 14px;
    }
    
    .spec-list li::before {
        content: '▸';
        position: absolute;
        left: 0;
        color: var(--color-teal);
        font-size: 12px;
    }
    
    /* ===== IMAGE SECTION ===== */
    .image-section {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }
    
    .image-container {
        background: rgba(10, 25, 47, 0.5);
        border-radius: 14px;
        padding: 25px;
        border: 1px solid rgba(100, 255, 218, 0.1);
        text-align: center;
    }
    
    .image-preview-wrapper {
        position: relative;
        width: 100%;
        max-width: 350px;
        margin: 0 auto;
    }
    
    .image-preview-wrapper img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        border: 1px solid var(--color-border);
        display: block;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease;
    }
    
    .image-preview-wrapper img:hover {
        transform: scale(1.02);
    }
    
    .image-info {
        color: var(--color-text-muted);
        font-size: 13px;
        text-align: center;
        margin-top: 15px;
        word-break: break-all;
        padding: 0 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .no-image {
        padding: 40px 20px;
    }
    
    .no-image i {
        font-size: 64px;
        color: var(--color-text-muted);
        opacity: 0.2;
        margin-bottom: 20px;
        display: block;
    }
    
    .no-image p {
        color: var(--color-text-secondary);
        font-size: 16px;
        margin: 0;
    }
    
    /* ===== ACTION BUTTONS ===== */
    .action-buttons {
        background: rgba(10, 25, 47, 0.3);
        border-radius: 14px;
        padding: 20px;
        border: 1px solid rgba(100, 255, 218, 0.1);
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .btn-group {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .btn {
        padding: 14px 28px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: none;
        cursor: pointer;
        min-width: 140px;
        letter-spacing: 0.3px;
    }
    
    .btn-back {
        background: rgba(255, 255, 255, 0.08);
        color: var(--color-text-primary);
        border: 1px solid var(--color-border);
        text-decoration: none;
    }
    
    .btn-back:hover {
        background: rgba(255, 255, 255, 0.12);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        text-decoration: none;
    }
    
    .btn-edit {
        background: linear-gradient(135deg, var(--color-teal), var(--color-cyan));
        color: var(--color-navy);
        border: none;
        box-shadow: 0 5px 25px rgba(0, 255, 204, 0.35);
        font-weight: 700;
        text-decoration: none;
    }
    
    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(0, 255, 204, 0.5);
        text-decoration: none;
    }
    
    .btn-delete {
        background: rgba(239, 68, 68, 0.15);
        color: var(--color-danger);
        border: 1px solid rgba(239, 68, 68, 0.3);
        text-decoration: none;
    }
    
    .btn-delete:hover {
        background: rgba(239, 68, 68, 0.25);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(239, 68, 68, 0.2);
        text-decoration: none;
    }
    
    /* ===== PRODUCT ID ===== */
    .product-id {
        color: var(--color-text-muted);
        font-size: 13px;
        margin-top: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
        padding-top: 10px;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }
    
    .product-id i {
        color: var(--color-cyan);
        font-size: 12px;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .dashboard-wrapper {
            padding: 20px;
        }
        
        .details-content {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 25px;
        }
        
        .details-content::before {
            display: none;
        }
        
        .product-info-section,
        .image-section {
            gap: 22px;
        }
    }
    
    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column;
            gap: 18px;
            padding: 20px;
            text-align: center;
        }
        
        .details-header, .details-content {
            padding: 20px;
        }
        
        .product-meta {
            flex-direction: column;
            gap: 20px;
        }
        
        .btn-group {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
            min-width: auto;
        }
        
        .product-title,
        .description-section,
        .image-container,
        .action-buttons {
            padding: 18px;
        }
    }
    
    @media (max-width: 480px) {
        .dashboard-wrapper {
            padding: 15px;
        }
        
        .header-title h1 {
            font-size: 22px;
        }
        
        .details-header h2 {
            font-size: 18px;
        }
        
        .product-title h3 {
            font-size: 20px;
        }
        
        .meta-value {
            font-size: 16px;
        }
        
        .price-tag {
            font-size: 20px;
        }
    }
</style>

<!-- Load Icon & Font -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<div class="dashboard-wrapper">
    <!-- HEADER -->
    <div class="dashboard-header">
        <div class="header-title">
            <h1><i class="fas fa-info-circle"></i> Detail Produk</h1>
            <p>Informasi lengkap produk FENG MARKET</p>
        </div>
    </div>

    <!-- DETAILS CONTAINER -->
    <div class="details-container">
        
        <!-- DETAILS HEADER -->
        <div class="details-header">
            <h2><i class="fas fa-box-open"></i> Detail Produk</h2>
        </div>

        <!-- DETAILS CONTENT - 2 KOLOM -->
        <div class="details-content">
            
            <!-- KOLOM KIRI - INFORMASI PRODUK -->
            <div class="product-info-section">
                
                <!-- NAMA & META INFO -->
                <div class="product-title">
                    <h3><?= esc($product['name']) ?></h3>
                    
                    <div class="product-meta">
                        <div class="meta-item">
                            <div class="meta-label">
                                <i class="fas fa-money-bill-wave"></i> Harga
                            </div>
                            <div class="meta-value price-tag">
                                Rp <?= number_format($product['price'], 0, ',', '.') ?>
                            </div>
                        </div>
                        
                        <div class="meta-item">
                            <div class="meta-label">
                                <i class="fas fa-boxes"></i> Stok Tersedia
                            </div>
                            <div class="meta-value">
                                <?= esc($product['stock']) ?> unit
                                <span class="stock-indicator <?= $product['stock'] > 0 ? 'stock-in' : 'stock-out' ?>">
                                    <i class="fas <?= $product['stock'] > 0 ? 'fa-check' : 'fa-times' ?>"></i>
                                    <?= $product['stock'] > 0 ? 'Stok Tersedia' : 'Stok Habis' ?>
                                </span>
                            </div>
                        </div>
                        
                        <?php if (isset($product['created_at'])) : ?>
                        <div class="meta-item">
                            <div class="meta-label">
                                <i class="fas fa-calendar-plus"></i> Ditambahkan
                            </div>
                            <div class="meta-value">
                                <?= date('d M Y', strtotime($product['created_at'])) ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- DESKRIPSI -->
                <?php if (!empty($product['description'])) : ?>
                <div class="description-section">
                    <div class="section-title">
                        <i class="fas fa-align-left"></i> Deskripsi & Spesifikasi
                    </div>
                    
                    <div class="description-content">
                        <?php 
                        // Cek apakah deskripsi berbentuk list
                        $description = esc($product['description']);
                        if (strpos($description, '-') === 0 || strpos($description, '•') === 0) {
                            // Format sebagai list
                            $lines = explode("\n", $description);
                            echo '<ul class="spec-list">';
                            foreach ($lines as $line) {
                                $line = trim($line);
                                if (!empty($line)) {
                                    // Hapus karakter bullet
                                    $line = preg_replace('/^[-\•\*\>\s]+/', '', $line);
                                    echo '<li>' . htmlspecialchars($line) . '</li>';
                                }
                            }
                            echo '</ul>';
                        } else {
                            // Format biasa
                            echo nl2br($description);
                        }
                        ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- ACTION BUTTONS -->
                <div class="action-buttons">
                    <div class="btn-group">
                        <a href="/admin/products" class="btn btn-back">
                            <i class="fas fa-arrow-left"></i> Kembali ke Produk
                        </a>
                        <a href="/admin/products/edit/<?= $product['id'] ?>" class="btn btn-edit">
                            <i class="fas fa-edit"></i> Edit Produk
                        </a>
                        <!-- Optional: Delete Button
                        <a href="/admin/products/delete/<?= $product['id'] ?>" 
                           class="btn btn-delete"
                           onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                        -->
                    </div>
                    
                    <?php if (isset($product['id'])) : ?>
                    <div class="product-id">
                        <i class="fas fa-fingerprint"></i> ID Produk: <code><?= $product['id'] ?></code>
                    </div>
                    <?php endif; ?>
                </div>

            </div>

            <!-- KOLOM KANAN - GAMBAR -->
            <div class="image-section">
                
                <!-- GAMBAR PRODUK -->
                <div class="image-container">
                    <div class="section-title">
                        <i class="fas fa-image"></i> Gambar Produk
                    </div>
                    
                    <?php if (!empty($product['image']) && file_exists(FCPATH . 'uploads/products/' . $product['image'])) : ?>
                        <div class="image-preview-wrapper">
                            <img src="<?= base_url('uploads/products/' . $product['image']) ?>" 
                                 alt="<?= esc($product['name']) ?>"
                                 onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzBhMTkyZiIvPjx0ZXh0IHg9IjUwJSIgeT0iNTAlIiBkb21pbmFudC1iYXNlbGluZT0ibWlkZGxlIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSIjNjQ2NDY0IiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMTQiPkdhbWJhciBUaWRhayBEaXRlbXVrYW48L3RleHQ+PC9zdmc+'">
                        </div>
                        <div class="image-info">
                            <i class="fas fa-file-image"></i> <?= $product['image'] ?>
                        </div>
                    <?php else : ?>
                        <div class="no-image">
                            <i class="fas fa-image"></i>
                            <p>Tidak ada gambar yang diupload</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- INFO TAMBAHAN -->
                <div class="description-section">
                    <div class="section-title">
                        <i class="fas fa-info-circle"></i> Informasi
                    </div>
                    <div class="description-content">
                        <p>Produk ini dapat diedit atau dihapus kapan saja melalui panel admin.</p>
                        
                        <?php if (isset($product['updated_at']) && $product['updated_at'] != $product['created_at']) : ?>
                        <p style="margin-top: 10px; font-size: 13px; color: var(--color-text-muted);">
                            <i class="fas fa-history"></i> Terakhir diperbarui: 
                            <?= date('d M Y H:i', strtotime($product['updated_at'])) ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

<script>
// Animasi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    // Animasi fade in untuk konten
    const contentElements = document.querySelectorAll('.product-title, .description-section, .image-container, .action-buttons');
    
    contentElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            element.style.transition = 'all 0.5s ease';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, 100 + (index * 100));
    });
    
    // Highlight stok
    const stockIndicator = document.querySelector('.stock-indicator');
    if (stockIndicator) {
        if (stockIndicator.classList.contains('stock-out')) {
            // Animasi pulse untuk stok habis
            setInterval(() => {
                stockIndicator.style.boxShadow = '0 0 10px rgba(239, 68, 68, 0.5)';
                setTimeout(() => {
                    stockIndicator.style.boxShadow = 'none';
                }, 500);
            }, 2000);
        }
    }
    
    // Image zoom on click
    const productImage = document.querySelector('.image-preview-wrapper img');
    if (productImage) {
        productImage.addEventListener('click', function() {
            const src = this.src;
            
            // Create modal for image zoom
            const modal = document.createElement('div');
            modal.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.9);
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 1000;
                cursor: zoom-out;
                opacity: 0;
                transition: opacity 0.3s ease;
            `;
            
            const img = document.createElement('img');
            img.src = src;
            img.style.cssText = `
                max-width: 90%;
                max-height: 90%;
                border-radius: 8px;
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
                transform: scale(0.9);
                transition: transform 0.3s ease;
            `;
            
            modal.appendChild(img);
            document.body.appendChild(modal);
            
            // Trigger animation
            setTimeout(() => {
                modal.style.opacity = '1';
                img.style.transform = 'scale(1)';
            }, 10);
            
            // Close modal on click
            modal.addEventListener('click', function(e) {
                if (e.target === modal || e.target === img) {
                    modal.style.opacity = '0';
                    img.style.transform = 'scale(0.9)';
                    setTimeout(() => {
                        document.body.removeChild(modal);
                    }, 300);
                }
            });
        });
    }
});

// Copy product ID
const productId = document.querySelector('.product-id code');
if (productId) {
    productId.style.cursor = 'pointer';
    productId.title = 'Klik untuk menyalin ID';
    
    productId.addEventListener('click', function() {
        const id = this.textContent;
        navigator.clipboard.writeText(id).then(() => {
            const originalText = this.textContent;
            this.textContent = 'ID disalin!';
            this.style.color = 'var(--color-teal)';
            
            setTimeout(() => {
                this.textContent = originalText;
                this.style.color = '';
            }, 1500);
        });
    });
}
</script>

<?= $this->endSection() ?>