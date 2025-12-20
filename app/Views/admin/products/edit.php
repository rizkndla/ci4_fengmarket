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
    
    /* ===== FORM CONTAINER ===== */
    .form-container {
        background: var(--color-card-bg);
        backdrop-filter: blur(25px);
        border-radius: 18px;
        border: 1px solid var(--color-border);
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.35);
        animation: fadeIn 0.6s ease;
        margin-bottom: 40px;
    }
    
    .form-header {
        padding: 22px 30px;
        background: linear-gradient(135deg, rgba(10, 25, 47, 0.7), rgba(17, 34, 64, 0.8));
        border-bottom: 1px solid var(--color-border);
        position: relative;
    }
    
    .form-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: linear-gradient(to bottom, var(--color-teal), var(--color-cyan));
    }
    
    .form-header h2 {
        color: var(--color-text-primary);
        font-size: 20px;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 12px;
        padding-left: 10px;
    }
    
    .form-header h2 i {
        color: var(--color-teal);
        font-size: 18px;
    }
    
    /* ===== FORM BODY - PERBAIKAN LAYOUT ===== */
    .form-body {
        padding: 30px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px; /* 🔥 INCREASED GAP */
        position: relative;
    }
    
    /* Garis pembatas antar kolom */
    .form-body::before {
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
    
    /* Kolom kiri dan kanan */
    .form-column {
        display: flex;
        flex-direction: column;
        gap: 25px; /* 🔥 SPACING ANTAR FORM GROUP */
    }
    
    /* ===== FORM GROUPS ===== */
    .form-group {
        background: rgba(10, 25, 47, 0.3);
        border-radius: 14px;
        padding: 20px;
        border: 1px solid rgba(100, 255, 218, 0.1);
        transition: all 0.3s ease;
        position: relative;
    }
    
    .form-group:hover {
        border-color: rgba(100, 255, 218, 0.2);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .form-group label {
        display: block;
        color: var(--color-text-primary);
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .form-group label i {
        color: var(--color-teal);
        font-size: 14px;
        width: 18px;
        text-align: center;
    }
    
    .form-group .input-wrapper {
        position: relative;
    }
    
    .form-control {
        width: 100%;
        padding: 14px 18px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid var(--color-border);
        border-radius: 12px;
        color: var(--color-text-primary);
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }
    
    .form-control:focus {
        outline: none;
        border-color: var(--color-teal);
        box-shadow: 0 0 0 3px rgba(0, 255, 204, 0.15);
        background: rgba(255, 255, 255, 0.09);
    }
    
    .form-control::placeholder {
        color: var(--color-text-muted);
        opacity: 0.7;
    }
    
    .form-control:hover {
        border-color: rgba(100, 255, 218, 0.3);
    }
    
    textarea.form-control {
        min-height: 140px;
        resize: vertical;
        line-height: 1.6;
        padding: 16px;
    }
    
    input[type="number"].form-control {
        -moz-appearance: textfield;
    }
    
    input[type="number"].form-control::-webkit-outer-spin-button,
    input[type="number"].form-control::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    /* ===== INFO TEXT ===== */
    .form-info {
        color: var(--color-text-secondary);
        font-size: 13px;
        margin-top: 8px;
        padding-left: 5px;
        display: flex;
        align-items: center;
        gap: 8px;
        opacity: 0.8;
    }
    
    .form-info i {
        font-size: 12px;
        color: var(--color-teal-light);
    }
    
    /* ===== FILE UPLOAD STYLES ===== */
    .file-upload-container {
        background: rgba(255, 255, 255, 0.04);
        border: 2px dashed var(--color-border);
        border-radius: 12px;
        padding: 25px;
        text-align: center;
        transition: all 0.3s ease;
        margin-top: 10px;
        cursor: pointer;
    }
    
    .file-upload-container:hover {
        border-color: var(--color-teal);
        background: rgba(0, 255, 204, 0.05);
        transform: translateY(-2px);
    }
    
    .file-upload-container.dragover {
        border-color: var(--color-teal);
        background: rgba(0, 255, 204, 0.08);
        transform: scale(1.01);
    }
    
    .file-upload-label {
        display: block;
        cursor: pointer;
        color: var(--color-text-secondary);
        font-size: 15px;
    }
    
    .file-upload-label i {
        font-size: 28px;
        color: var(--color-teal);
        margin-bottom: 12px;
        display: block;
        opacity: 0.8;
    }
    
    /* ===== CURRENT IMAGE PREVIEW ===== */
    .current-image-container {
        background: rgba(10, 25, 47, 0.5);
        border-radius: 12px;
        padding: 20px;
        margin-top: 15px;
        border: 1px solid var(--color-border);
        text-align: center;
    }
    
    .current-image-label {
        color: var(--color-text-secondary);
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    
    .current-image-label i {
        color: var(--color-teal);
        font-size: 14px;
    }
    
    .image-preview {
        position: relative;
        width: 100%;
        max-width: 280px;
        margin: 0 auto;
    }
    
    .image-preview img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        border: 1px solid var(--color-border);
        display: block;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    .image-info {
        color: var(--color-text-muted);
        font-size: 12px;
        text-align: center;
        margin-top: 12px;
        word-break: break-all;
        padding: 0 10px;
    }
    
    /* ===== NEW IMAGE PREVIEW ===== */
    #imagePreview {
        margin-top: 20px;
        background: rgba(10, 25, 47, 0.4);
        border-radius: 12px;
        padding: 18px;
        border: 1px solid rgba(100, 255, 218, 0.2);
        animation: fadeIn 0.4s ease;
    }
    
    #imagePreview > div:first-child {
        color: var(--color-teal-light);
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    /* ===== FORM ACTIONS ===== */
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 25px 30px;
        background: linear-gradient(135deg, rgba(10, 25, 47, 0.7), rgba(17, 34, 64, 0.8));
        border-top: 1px solid var(--color-border);
        gap: 20px;
        position: relative;
    }
    
    .form-actions::before {
        content: '';
        position: absolute;
        top: -1px;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, 
            transparent 0%, 
            var(--color-border) 50%,
            transparent 100%);
    }
    
    .btn {
        padding: 14px 32px;
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
        min-width: 150px;
        letter-spacing: 0.3px;
    }
    
    .btn-cancel {
        background: rgba(255, 255, 255, 0.08);
        color: var(--color-text-primary);
        border: 1px solid var(--color-border);
    }
    
    .btn-cancel:hover {
        background: rgba(255, 255, 255, 0.12);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    .btn-submit {
        background: linear-gradient(135deg, var(--color-teal), var(--color-cyan));
        color: var(--color-navy);
        border: none;
        box-shadow: 0 5px 25px rgba(0, 255, 204, 0.35);
        font-weight: 700;
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(0, 255, 204, 0.5);
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .dashboard-wrapper {
            padding: 20px;
        }
        
        .form-body {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 25px;
        }
        
        .form-body::before {
            display: none;
        }
        
        .form-column {
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
        
        .form-header, .form-body, .form-actions {
            padding: 20px;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 15px;
        }
        
        .btn {
            width: 100%;
            min-width: auto;
        }
        
        .form-group {
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
        
        .form-header h2 {
            font-size: 18px;
        }
        
        .form-control {
            padding: 12px 15px;
            font-size: 14px;
        }
        
        .btn {
            padding: 12px 20px;
            font-size: 14px;
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
            <h1><i class="fas fa-edit"></i> Edit Produk</h1>
            <p>Perbarui informasi produk FENG MARKET</p>
        </div>
    </div>

    <!-- FORM -->
    <form action="/admin/products/update/<?= $product['id'] ?>" method="post" enctype="multipart/form-data" class="form-container">
        
        <!-- FORM HEADER -->
        <div class="form-header">
            <h2><i class="fas fa-pencil-alt"></i> Edit Informasi Produk</h2>
        </div>

        <!-- FORM BODY - 2 KOLOM -->
        <div class="form-body">
            
            <!-- KOLOM KIRI - INFORMASI PRODUK -->
            <div class="form-column">
                
                <!-- NAMA PRODUK -->
                <div class="form-group">
                    <label for="name"><i class="fas fa-tag"></i> Nama Produk</label>
                    <div class="input-wrapper">
                        <input type="text" 
                               id="name" 
                               name="name" 
                               class="form-control"
                               value="<?= esc($product['name']) ?>" 
                               placeholder="Contoh: RF 7 DAY UNIVERSAL CODE VIP"
                               required>
                    </div>
                    <div class="form-info">
                        <i class="fas fa-info-circle"></i> Masukkan nama produk yang jelas
                    </div>
                </div>

                <!-- HARGA -->
                <div class="form-group">
                    <label for="price"><i class="fas fa-money-bill-wave"></i> Harga (Rp)</label>
                    <div class="input-wrapper">
                        <input type="number" 
                               id="price" 
                               name="price" 
                               class="form-control"
                               value="<?= esc($product['price']) ?>" 
                               placeholder="Contoh: 22000"
                               min="0"
                               required>
                    </div>
                    <div class="form-info">
                        <i class="fas fa-info-circle"></i> Harga dalam Rupiah (tanpa titik/koma)
                    </div>
                </div>

                <!-- STOK -->
                <div class="form-group">
                    <label for="stock"><i class="fas fa-boxes"></i> Stok</label>
                    <div class="input-wrapper">
                        <input type="number" 
                               id="stock" 
                               name="stock" 
                               class="form-control"
                               value="<?= esc($product['stock']) ?>" 
                               placeholder="Contoh: 50"
                               min="0"
                               required>
                    </div>
                    <div class="form-info">
                        <i class="fas fa-exclamation-circle"></i> Masukkan 0 jika produk habis
                    </div>
                </div>

                <!-- DESKRIPSI -->
                <div class="form-group">
                    <label for="description"><i class="fas fa-align-left"></i> Deskripsi / Spesifikasi</label>
                    <div class="input-wrapper">
                        <textarea id="description" 
                                  name="description" 
                                  class="form-control"
                                  placeholder="Contoh: 4GB RAM - OS UNLOCK ANDROID (8.1.10, 12.15) - 8 core cpu - 64gb ROM - 64 bit ..."
                                  rows="6"><?= esc($product['description']) ?></textarea>
                    </div>
                    <div class="form-info">
                        <i class="fas fa-lightbulb"></i> Gunakan format yang sama untuk konsistensi tampilan
                    </div>
                </div>

            </div>

            <!-- KOLOM KANAN - GAMBAR -->
            <div class="form-column">
                
                <!-- GAMBAR SAAT INI -->
                <div class="form-group">
                    <label><i class="fas fa-image"></i> Gambar Saat Ini</label>
                    
                    <?php if ($product['image'] && file_exists(FCPATH . 'uploads/products/' . $product['image'])) : ?>
                        <div class="current-image-container">
                            <div class="current-image-label">
                                <i class="fas fa-photo-video"></i> Gambar Produk
                            </div>
                            <div class="image-preview">
                                <img src="<?= base_url('uploads/products/' . $product['image']) ?>" 
                                     alt="<?= esc($product['name']) ?>"
                                     onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMzAwIiBoZWlnaHQ9IjIwMCIgZmlsbD0iIzBhMTkyZiIvPjx0ZXh0IHg9IjUwJSIgeT0iNTAlIiBkb21pbmFudC1iYXNlbGluZT0ibWlkZGxlIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBmaWxsPSIjNjQ2NDY0IiBmb250LWZhbWlseT0iQXJpYWwiIGZvbnQtc2l6ZT0iMTQiPkdhbWJhciBUaWRhayBEaXRlbXVrYW48L3RleHQ+PC9zdmc+'">
                            </div>
                            <div class="image-info">
                                <i class="fas fa-file-image"></i> <?= $product['image'] ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="current-image-container">
                            <div class="current-image-label">
                                <i class="fas fa-image"></i> Gambar Produk
                            </div>
                            <i class="fas fa-image" style="font-size: 60px; color: var(--color-text-muted); opacity: 0.2; margin: 20px 0;"></i>
                            <p style="color: var(--color-text-secondary); font-size: 15px; margin: 10px 0 0;">
                                Tidak ada gambar yang diupload
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- UPLOAD GAMBAR BARU -->
                <div class="form-group">
                    <label for="image"><i class="fas fa-upload"></i> Upload Gambar Baru</label>
                    
                    <div class="file-upload-container" id="fileUploadContainer">
                        <label for="image" class="file-upload-label">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span style="display: block; margin-top: 10px; margin-bottom: 5px;">Klik atau drag & drop file</span>
                            <span style="font-size: 13px; color: var(--color-text-muted);">
                                Format: JPG, PNG, GIF (Maks: 2MB)
                            </span>
                        </label>
                        <input type="file" 
                               id="image" 
                               name="image" 
                               class="form-control"
                               accept=".jpg,.jpeg,.png,.gif,.webp"
                               onchange="previewImage(event)"
                               style="display: none;">
                    </div>
                    
                    <!-- PREVIEW GAMBAR BARU -->
                    <div id="imagePreview" style="display: none;">
                        <div>
                            <i class="fas fa-eye"></i> Preview Gambar Baru
                        </div>
                        <div class="image-preview">
                            <img id="previewImage" src="" alt="Preview">
                        </div>
                    </div>

                    <div class="form-info">
                        <i class="fas fa-info-circle"></i> Kosongkan jika tidak ingin mengganti gambar
                    </div>
                </div>

            </div>

        </div>

        <!-- FORM ACTIONS -->
        <div class="form-actions">
            <a href="/admin/products" class="btn btn-cancel">
                <i class="fas fa-times"></i> Batal
            </a>
            <button type="submit" class="btn btn-submit">
                <i class="fas fa-save"></i> Update Produk
            </button>
        </div>

    </form>

</div>

<script>
// Function untuk preview gambar baru
function previewImage(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('previewImage');
    const previewContainer = document.getElementById('imagePreview');
    
    if (file) {
        // Validasi ukuran file (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
            Swal.fire({
                title: 'File Terlalu Besar',
                text: 'Ukuran file maksimal 2MB',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            event.target.value = '';
            return;
        }
        
        // Validasi tipe file
        const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!validTypes.includes(file.type)) {
            Swal.fire({
                title: 'Format Tidak Didukung',
                text: 'Hanya file JPG, PNG, GIF, atau WebP yang diperbolehkan',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            event.target.value = '';
            return;
        }
        
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.style.display = 'block';
            
            // Animasi fade in
            previewContainer.style.opacity = '0';
            previewContainer.style.transform = 'translateY(10px)';
            setTimeout(() => {
                previewContainer.style.transition = 'all 0.4s ease';
                previewContainer.style.opacity = '1';
                previewContainer.style.transform = 'translateY(0)';
            }, 10);
        }
        
        reader.readAsDataURL(file);
    } else {
        previewContainer.style.display = 'none';
    }
}

// Drag and drop functionality
const fileUploadContainer = document.getElementById('fileUploadContainer');
const fileInput = document.getElementById('image');
const fileUploadLabel = fileUploadContainer.querySelector('.file-upload-label');

fileUploadContainer.addEventListener('click', () => {
    fileInput.click();
});

fileUploadContainer.addEventListener('dragover', (e) => {
    e.preventDefault();
    e.stopPropagation();
    fileUploadContainer.classList.add('dragover');
});

fileUploadContainer.addEventListener('dragleave', (e) => {
    e.preventDefault();
    e.stopPropagation();
    fileUploadContainer.classList.remove('dragover');
});

fileUploadContainer.addEventListener('drop', (e) => {
    e.preventDefault();
    e.stopPropagation();
    fileUploadContainer.classList.remove('dragover');
    
    if (e.dataTransfer.files.length) {
        fileInput.files = e.dataTransfer.files;
        const event = new Event('change', { bubbles: true });
        fileInput.dispatchEvent(event);
        
        // Feedback visual
        fileUploadLabel.innerHTML = `
            <i class="fas fa-check-circle" style="color: var(--color-teal);"></i>
            <span style="display: block; margin-top: 10px; margin-bottom: 5px;">File siap diupload!</span>
            <span style="font-size: 13px; color: var(--color-text-muted);">
                ${e.dataTransfer.files[0].name}
            </span>
        `;
    }
});

// Format harga secara real-time
const priceInput = document.getElementById('price');
priceInput.addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    e.target.value = value;
});

// Format stok secara real-time
const stockInput = document.getElementById('stock');
stockInput.addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    e.target.value = value;
});

// Confirm before leaving if changes were made
let formChanged = false;
const formControls = document.querySelectorAll('.form-control');
formControls.forEach(control => {
    const originalValue = control.value;
    control.addEventListener('input', () => {
        formChanged = control.value !== originalValue;
    });
});

const cancelBtn = document.querySelector('.btn-cancel');
cancelBtn.addEventListener('click', function(e) {
    if (formChanged) {
        e.preventDefault();
        Swal.fire({
            title: 'Ada Perubahan',
            text: 'Anda memiliki perubahan yang belum disimpan. Yakin ingin keluar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Keluar',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = this.href;
            }
        });
    }
});

// Auto-resize textarea
const textarea = document.getElementById('description');
textarea.addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

// Set tinggi awal textarea
setTimeout(() => {
    textarea.style.height = 'auto';
    textarea.style.height = (textarea.scrollHeight) + 'px';
}, 100);

// Form submission confirmation
const form = document.querySelector('form');
form.addEventListener('submit', function(e) {
    // Optional: Add loading state
    const submitBtn = this.querySelector('.btn-submit');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
    submitBtn.disabled = true;
    
    // Reset after 5 seconds if form doesn't submit (fallback)
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 5000);
});
</script>

<?= $this->endSection() ?>