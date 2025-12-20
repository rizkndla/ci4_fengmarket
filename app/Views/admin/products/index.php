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
    }
    
    /* ===== BACKGROUND ===== */
    body {
        background: var(--color-navy);
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
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
    
    /* ===== DASHBOARD WRAPPER ===== */
    .dashboard-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px;
        position: relative;
        z-index: 10;
        animation: fadeIn 0.6s ease;
    }
    
    /* ===== HEADER ===== */
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        padding: 25px 30px;
        background: rgba(17, 34, 64, 0.6);
        backdrop-filter: blur(20px);
        border-radius: 18px;
        border: 1px solid var(--color-border);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        position: relative;
    }
    
    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, 
            transparent, 
            var(--color-teal), 
            transparent);
    }
    
    .header-title h1 {
        color: var(--color-text-primary);
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .header-title p {
        color: var(--color-text-secondary);
        font-size: 15px;
    }
    
    .header-stats {
        background: rgba(0, 255, 204, 0.1);
        border: 1px solid var(--color-border);
        border-radius: 14px;
        padding: 20px 25px;
        text-align: center;
        min-width: 160px;
        backdrop-filter: blur(10px);
    }
    
    .stats-number {
        color: var(--color-teal);
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
    }
    
    .stats-label {
        color: var(--color-text-secondary);
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 500;
    }
    
    /* ===== CREATE BUTTON ===== */
    .btn-create {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 28px;
        background: linear-gradient(135deg, var(--color-teal), var(--color-cyan));
        color: var(--color-navy);
        text-decoration: none;
        border-radius: 12px;
        font-weight: 700;
        font-size: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(0, 255, 204, 0.3);
        margin-bottom: 30px;
    }
    
    .btn-create:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(0, 255, 204, 0.5);
    }
    
    /* ===== PRODUCTS GRID ===== */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
        margin-top: 20px;
    }
    
    /* ===== PRODUCT CARD ===== */
    .product-card {
        background: var(--color-card-bg);
        backdrop-filter: blur(20px);
        border-radius: 18px;
        border: 1px solid var(--color-border);
        overflow: hidden;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    .product-card:hover {
        transform: translateY(-8px);
        border-color: var(--color-teal);
        box-shadow: 
            0 20px 50px rgba(0, 0, 0, 0.4),
            0 0 30px rgba(0, 255, 204, 0.15);
    }
    
    /* ===== GAMBAR PRODUK - FIXED VERSION ===== */
    .product-image-wrapper {
        height: 180px;
        position: relative;
        overflow: hidden;
        background: #0a192f;
    }
    
    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.6s ease;
    }
    
    .product-card:hover .product-image {
        transform: scale(1.05);
    }
    
    .image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: var(--color-teal);
        background: #0a192f;
    }
    
    .placeholder-icon {
        font-size: 48px;
        margin-bottom: 10px;
        opacity: 0.6;
    }
    
    .placeholder-text {
        font-size: 12px;
        color: var(--color-text-muted);
    }
    
    /* ===== PRODUCT BODY ===== */
    .product-body {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .product-title {
        color: var(--color-text-primary);
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 12px;
        line-height: 1.4;
        min-height: 45px;
    }
    
    /* HARGA & STOK */
    .product-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid var(--color-border);
    }
    
    .price {
        font-size: 18px;
        font-weight: 700;
        color: var(--color-teal);
    }
    
    .stock {
        padding: 4px 12px;
        background: rgba(0, 255, 204, 0.1);
        color: var(--color-teal);
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid rgba(0, 255, 204, 0.2);
    }
    
    .stock.low {
        background: rgba(239, 68, 68, 0.1);
        color: #f87171;
        border-color: rgba(239, 68, 68, 0.2);
    }
    
    .stock.out {
        background: rgba(239, 68, 68, 0.15);
        color: #ef4444;
        border-color: rgba(239, 68, 68, 0.3);
    }
    
    /* ===== PRODUCT ACTIONS ===== */
    .product-actions {
        display: flex;
        gap: 10px;
        padding-top: 15px;
        border-top: 1px solid var(--color-border);
    }
    
    .btn-action {
        flex: 1;
        padding: 10px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 13px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        border: none;
        cursor: pointer;
    }
    
    .btn-edit {
        background: rgba(255, 255, 255, 0.08);
        color: var(--color-text-primary);
        border: 1px solid var(--color-border);
    }
    
    .btn-edit:hover {
        background: rgba(255, 255, 255, 0.15);
        transform: translateY(-2px);
    }
    
    .btn-view {
        background: rgba(0, 255, 204, 0.1);
        color: var(--color-teal);
        border: 1px solid rgba(0, 255, 204, 0.2);
    }
    
    .btn-view:hover {
        background: rgba(0, 255, 204, 0.15);
        transform: translateY(-2px);
    }
    
    .btn-delete {
        background: rgba(239, 68, 68, 0.1);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }
    
    .btn-delete:hover {
        background: rgba(239, 68, 68, 0.15);
        transform: translateY(-2px);
    }
    
    /* FORM DELETE STYLE */
    .delete-form {
        flex: 1;
        margin: 0;
        padding: 0;
        display: block;
    }
    
    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center;
        padding: 70px 30px;
        background: var(--color-card-bg);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 2px dashed var(--color-border);
        margin-top: 30px;
    }
    
    .empty-icon {
        font-size: 72px;
        color: var(--color-teal);
        margin-bottom: 25px;
    }
    
    .empty-title {
        color: var(--color-text-primary);
        font-size: 24px;
        margin-bottom: 15px;
        font-weight: 600;
    }
    
    .empty-description {
        color: var(--color-text-secondary);
        font-size: 15px;
        max-width: 400px;
        margin: 0 auto 35px;
        line-height: 1.5;
    }
    
    /* ===== CUSTOM SWEETALERT STYLE ===== */
    .swal2-popup {
        background: var(--color-navy-light) !important;
        border: 1px solid var(--color-border) !important;
        border-radius: 16px !important;
        color: var(--color-text-primary) !important;
        backdrop-filter: blur(20px) !important;
        padding: 25px !important;
        max-width: 420px !important;
    }
    
    .swal2-title {
        color: var(--color-teal) !important;
        font-size: 22px !important;
        margin-bottom: 15px !important;
        text-align: center !important;
    }
    
    .swal2-html-container {
        color: var(--color-text-secondary) !important;
        font-size: 15px !important;
        line-height: 1.6 !important;
        margin: 0 0 25px !important;
        text-align: center !important;
    }
    
    .swal2-actions {
        gap: 20px !important; /* 🔥 INI KUNCI: JARAK ANTAR TOMBOL */
        margin-top: 10px !important;
        justify-content: center !important;
    }
    
    .swal2-confirm {
        background: linear-gradient(135deg, var(--color-teal), var(--color-cyan)) !important;
        color: var(--color-navy) !important;
        border: none !important;
        border-radius: 10px !important;
        font-weight: 600 !important;
        padding: 12px 28px !important;
        font-size: 14px !important;
        min-width: 120px !important;
        transition: all 0.3s ease !important;
        margin: 0 !important;
    }
    
    .swal2-confirm:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 5px 15px rgba(0, 255, 204, 0.3) !important;
    }
    
    .swal2-cancel {
        background: rgba(255, 255, 255, 0.08) !important;
        color: var(--color-text-primary) !important;
        border: 1px solid var(--color-border) !important;
        border-radius: 10px !important;
        font-weight: 600 !important;
        padding: 12px 28px !important;
        font-size: 14px !important;
        min-width: 120px !important;
        transition: all 0.3s ease !important;
        margin: 0 !important;
    }
    
    .swal2-cancel:hover {
        background: rgba(255, 255, 255, 0.12) !important;
        transform: translateY(-2px) !important;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .dashboard-wrapper {
            padding: 20px;
        }
        
        .dashboard-header {
            flex-direction: column;
            gap: 20px;
            padding: 20px;
        }
        
        .header-stats {
            width: 100%;
        }
        
        .products-grid {
            grid-template-columns: 1fr;
        }
        
        .product-image-wrapper {
            height: 160px;
        }
        
        .swal2-popup {
            width: 90% !important;
            margin: 0 20px !important;
        }
        
        .swal2-actions {
            flex-direction: column !important;
            gap: 10px !important;
        }
        
        .swal2-confirm,
        .swal2-cancel {
            width: 100% !important;
        }
    }
</style>

<!-- Load SweetAlert2 untuk Popup Keren -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Load Icon & Font -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<div class="dashboard-wrapper">
    <!-- HEADER DASHBOARD -->
    <div class="dashboard-header">
        <div class="header-title">
            <h1><i class="fas fa-boxes"></i> Manajemen Produk</h1>
            <p>Kelola semua produk FengMarket Anda di satu tempat</p>
        </div>
        
        <div class="header-stats">
            <div class="stats-number"><?= count($products) ?></div>
            <div class="stats-label">Total Produk</div>
        </div>
    </div>
    
    <!-- DAFTAR PRODUK -->
    <?php if (empty($products)) : ?>
        <!-- EMPTY STATE -->
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <h3 class="empty-title">Belum Ada Produk</h3>
            <p class="empty-description">
                Mulai bangun katalog FengMarket Anda dengan menambahkan produk pertama.
            </p>
            <a href="/admin/products/create" class="btn-create" style="margin-bottom: 0;">
                <i class="fas fa-plus-circle"></i>
                Tambah Produk Pertama
            </a>
        </div>
    <?php else : ?>
        <!-- CREATE BUTTON -->
        <a href="/admin/products/create" class="btn-create">
            <i class="fas fa-plus-circle"></i>
            Tambah Produk Baru
        </a>
        
        <!-- PRODUCTS GRID -->
        <div class="products-grid">
            <?php foreach ($products as $product) : ?>
                <div class="product-card">
                    <!-- PRODUCT IMAGE - ULTRA SIMPLE VERSION -->
                    <div class="product-image-wrapper">
                        <?php 
                        // SIMPLE & CLEAR LOGIC
                        if (!empty($product['image'])) {
                            $imageFile = $product['image'];
                            $imagePath = 'uploads/products/' . $imageFile;
                            $fullPath = FCPATH . $imagePath;
                            
                            if (file_exists($fullPath)) {
                                $imageUrl = base_url($imagePath);
                                ?>
                                <img src="<?= $imageUrl ?>" 
                                     alt="<?= esc($product['name']) ?>" 
                                     class="product-image">
                                <?php
                            } else {
                                // File tidak ditemukan di server
                                ?>
                                <div class="image-placeholder">
                                    <div class="placeholder-icon">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="placeholder-text">
                                        File: <?= $imageFile ?><br>
                                        <small>Tidak ditemukan</small>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            // Tidak ada gambar di database
                            ?>
                            <div class="image-placeholder">
                                <div class="placeholder-icon">
                                    <i class="fas fa-image"></i>
                                </div>
                                <div class="placeholder-text">
                                    Tidak ada gambar
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    
                    <!-- PRODUCT DETAILS -->
                    <div class="product-body">
                        <h3 class="product-title">
                            <?= esc($product['name']) ?>
                        </h3>
                        
                        <div class="product-meta">
                            <div class="price">Rp <?= number_format($product['price'], 0, ',', '.') ?></div>
                            <!-- STOCK WITH FALLBACK -->
                            <?php if (isset($product['stock'])) : ?>
                                <div class="stock <?= $product['stock'] == 0 ? 'out' : ($product['stock'] < 10 ? 'low' : '') ?>">
                                    <?= $product['stock'] == 0 ? 'Habis' : esc($product['stock']) . ' unit' ?>
                                </div>
                            <?php else : ?>
                                <div class="stock" style="background: rgba(255, 255, 255, 0.05); color: var(--color-text-muted);">
                                    Stok: -
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <?php if (!empty($product['description'])) : ?>
                            <p class="product-description">
                                <?= esc(substr($product['description'], 0, 100)) ?>
                                <?= strlen($product['description']) > 100 ? '...' : '' ?>
                            </p>
                        <?php endif; ?>
                        
                        <!-- ACTIONS - DENGAN POPUP MODERN -->
                        <div class="product-actions">
                            <a href="/admin/products/edit/<?= $product['id'] ?>" 
                               class="btn-action btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="/admin/products/view/<?= $product['id'] ?>" 
                               class="btn-action btn-view">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            
                            <!-- DELETE FORM - DENGAN SWEETALERT2 -->
                            <form action="/admin/products/delete/<?= $product['id'] ?>" 
                                  method="POST" 
                                  class="delete-form"
                                  id="delete-form-<?= $product['id'] ?>">
                                
                                <?= csrf_field() ?>
                                
                                <button type="button" 
                                        class="btn-action btn-delete"
                                        onclick="confirmDelete(<?= $product['id'] ?>, '<?= addslashes($product['name']) ?>')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script>
// FUNCTION POPUP DELETE MODERN
function confirmDelete(productId, productName) {
    Swal.fire({
        title: 'Hapus Produk?',
        html: `Apakah Anda yakin ingin menghapus produk <strong>"${productName}"</strong>?<br><br><small style="color: #8892b0;">Aksi ini tidak dapat dibatalkan.</small>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        customClass: {
            popup: 'swal2-popup',
            title: 'swal2-title',
            htmlContainer: 'swal2-html-container',
            confirmButton: 'swal2-confirm',
            cancelButton: 'swal2-cancel',
            actions: 'swal2-actions'
        },
        buttonsStyling: false,
        reverseButtons: true,
        focusCancel: true,
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit form jika user klik "Ya, Hapus!"
            document.getElementById(`delete-form-${productId}`).submit();
        }
    });
}
</script>

<?= $this->endSection() ?>